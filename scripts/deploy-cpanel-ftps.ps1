[CmdletBinding(SupportsShouldProcess)]
param(
    [Parameter(Mandatory)]
    [string]$FtpHost,

    [Parameter(Mandatory)]
    [string]$FtpUsername,

    [Parameter(Mandatory)]
    [AllowEmptyString()]
    [string]$RemoteRoot,

    [string]$FtpPassword = $env:LANYARD_SURABAYA_FTP_PASSWORD,

    [ValidateRange(1, 65535)]
    [int]$FtpPort = 21,

    [switch]$Initial,

    [switch]$BuildAssets,

    [ValidateRange(1, 8)]
    [int]$ParallelUploads = 4,

    [switch]$AllowInvalidCertificate
)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

if ([string]::IsNullOrWhiteSpace($FtpPassword)) {
    throw 'Set LANYARD_SURABAYA_FTP_PASSWORD or pass -FtpPassword. The password is never written to disk.'
}

# Parallel upload workers inherit only their parent process environment. Keep the
# supplied credential in this process so each worker can authenticate without
# exposing it on a command line or writing it to a queue file.
$env:LANYARD_SURABAYA_FTP_PASSWORD = $FtpPassword

$projectRoot = Split-Path -Parent $PSScriptRoot
$stageDrive = $null
$stageRoot = Join-Path $projectRoot ('.deploy-stage-' + [guid]::NewGuid().ToString('N'))
$localManifestPath = Join-Path $stageRoot '.deploy-manifest.json'
$remoteManifestName = '.deploy-manifest.json'
$remoteManifestPath = Join-Path $stageRoot 'remote-manifest.json'
$remoteRootNormalized = $RemoteRoot.Trim('/')

function Invoke-Robocopy {
    param([string]$Source, [string]$Destination, [string[]]$ExcludeDirectories, [string[]]$ExcludeFiles)

    New-Item -ItemType Directory -Path $Destination -Force | Out-Null
    $arguments = @($Source, $Destination, '/E', '/COPY:DAT', '/DCOPY:DAT', '/R:2', '/W:1', '/NFL', '/NDL', '/NJH', '/NJS', '/NP')
    if ($ExcludeDirectories.Count -gt 0) {
        $arguments += '/XD'
        $arguments += $ExcludeDirectories
    }
    if ($ExcludeFiles.Count -gt 0) {
        $arguments += '/XF'
        $arguments += $ExcludeFiles
    }

    & robocopy @arguments | Out-Null
    if ($LASTEXITCODE -gt 7) {
        throw "robocopy failed while staging $Source (exit code $LASTEXITCODE)."
    }
}

function Get-Manifest {
    param([string]$Root)

    $files = Get-ChildItem -LiteralPath $Root -Recurse -File |
        Where-Object { $_.FullName -notmatch '\\.deploy-manifest\.json$' } |
        ForEach-Object {
            $relative = $_.FullName.Substring($Root.Length).TrimStart('\', '/') -replace '\\', '/'
            [pscustomobject]@{
                path = $relative
                sha256 = (Get-FileHash -LiteralPath $_.FullName -Algorithm SHA256).Hash.ToLowerInvariant()
                size = $_.Length
            }
        }

    return @($files | Sort-Object path)
}

function Get-RemoteUrl {
    param([string]$RelativePath)

    $pieces = @()
    if (-not [string]::IsNullOrWhiteSpace($remoteRootNormalized)) {
        $pieces += $remoteRootNormalized.Split('/') | ForEach-Object { [uri]::EscapeDataString($_) }
    }
    $pieces += $RelativePath.Split('/') | ForEach-Object { [uri]::EscapeDataString($_) }
    return "ftp://$FtpHost`:$FtpPort/" + ($pieces -join '/')
}

function Invoke-FtpUpload {
    param([string]$LocalPath, [string]$RelativePath)

    $arguments = @('--fail', '--silent', '--show-error', '--ssl-reqd', '--user', "$FtpUsername`:$FtpPassword", '--ftp-create-dirs', '--upload-file', $LocalPath, (Get-RemoteUrl $RelativePath))
    if ($AllowInvalidCertificate) {
        $arguments = @('--insecure') + $arguments
    }

    & curl.exe @arguments
    if ($LASTEXITCODE -ne 0) {
        throw "Upload failed for $RelativePath. The remote manifest was not updated."
    }
}

try {
    if ($BuildAssets) {
        Write-Host 'Building production assets locally...'
        Push-Location $projectRoot
        try {
            & npm.cmd run build
            if ($LASTEXITCODE -ne 0) {
                throw 'Local production asset build failed.'
            }
        }
        finally {
            Pop-Location
        }
    }

    Write-Host 'Staging production release locally...'
    $excludeDirectories = @('.git', '.github', '.agents', '.codex', '.deploy-stage-*', 'node_modules', 'tests', 'storage', 'bootstrap\\cache', 'public\\hot')
    if (-not $Initial) {
        $excludeDirectories += 'public\\uploads'
    }
    $excludeFiles = @('.env', '.env.*', '*.sql', '.deploy-manifest.json')
    Invoke-Robocopy -Source $projectRoot -Destination $stageRoot -ExcludeDirectories $excludeDirectories -ExcludeFiles $excludeFiles

    @('storage\\app', 'storage\\framework\\cache', 'storage\\framework\\sessions', 'storage\\framework\\views', 'storage\\logs', 'bootstrap\\cache') |
        ForEach-Object { New-Item -ItemType Directory -Path (Join-Path $stageRoot $_) -Force | Out-Null }

    if (-not (Test-Path -LiteralPath (Join-Path $stageRoot 'vendor\\autoload.php'))) {
        throw 'vendor/autoload.php is missing from the staged release. Install Composer dependencies locally first.'
    }
    if (-not (Test-Path -LiteralPath (Join-Path $stageRoot 'public\\build\\manifest.json'))) {
        throw 'public/build/manifest.json is missing. Run the local asset build with -BuildAssets.'
    }

    $localManifest = Get-Manifest -Root $stageRoot
    $localManifestJson = [pscustomobject]@{ version = 1; generated_at = (Get-Date).ToUniversalTime().ToString('o'); files = $localManifest } |
        ConvertTo-Json -Depth 4
    [System.IO.File]::WriteAllText($localManifestPath, $localManifestJson, [System.Text.UTF8Encoding]::new($false))

    $remoteManifest = @{}
    if (-not $Initial) {
        $curlDownloadArgs = @('--fail', '--silent', '--show-error', '--ssl-reqd', '--user', "$FtpUsername`:$FtpPassword", '--output', $remoteManifestPath, (Get-RemoteUrl $remoteManifestName))
        if ($AllowInvalidCertificate) {
            $curlDownloadArgs = @('--insecure') + $curlDownloadArgs
        }

        $remoteManifestFetchError = Join-Path $stageRoot 'remote-manifest-fetch.err'
        try {
            & curl.exe @curlDownloadArgs 2>$remoteManifestFetchError
        }
        catch {
            throw 'Could not retrieve the remote deployment manifest.'
        }

        if ($LASTEXITCODE -eq 0 -and (Test-Path -LiteralPath $remoteManifestPath)) {
            try {
                $remoteManifestJson = Get-Content -LiteralPath $remoteManifestPath -Raw | ConvertFrom-Json
                foreach ($item in @($remoteManifestJson.files)) {
                    $remoteManifest[$item.path] = $item.sha256
                }
            }
            catch {
                throw 'The remote deployment manifest is invalid. Resolve it before continuing.'
            }
        }
        else {
            throw 'No remote deployment manifest found. Run the first deployment with -Initial.'
        }
    }

    $changedFiles = @($localManifest | Where-Object { -not $remoteManifest.ContainsKey($_.path) -or $remoteManifest[$_.path] -ne $_.sha256 })
    Write-Host ("Files to upload: {0}" -f $changedFiles.Count)

    if ($changedFiles.Count -gt 0) {
        $queues = @()
        for ($index = 0; $index -lt $ParallelUploads; $index++) {
            $queues += ,([System.Collections.Generic.List[object]]::new())
        }
        for ($index = 0; $index -lt $changedFiles.Count; $index++) {
            $file = $changedFiles[$index]
            $source = Join-Path $stageRoot ($file.path -replace '/', [string][System.IO.Path]::DirectorySeparatorChar)
            $queues[$index % $ParallelUploads].Add([pscustomobject]@{ path = $file.path; source = $source })
        }

        $workerScript = Join-Path $PSScriptRoot 'ftps-upload-worker.ps1'
        $workers = @()
        for ($index = 0; $index -lt $queues.Count; $index++) {
            if ($queues[$index].Count -eq 0) {
                continue
            }

            $queuePath = Join-Path $stageRoot ("upload-queue-$index.json")
            # Serialize the list itself, rather than a single object with array-valued
            # path/source properties. Each worker must receive one file per queue item.
            [System.IO.File]::WriteAllText($queuePath, ($queues[$index].ToArray() | ForEach-Object { $_ } | ConvertTo-Json -Depth 3), [System.Text.UTF8Encoding]::new($false))
            $stdout = Join-Path $stageRoot ("upload-worker-$index.out.log")
            $stderr = Join-Path $stageRoot ("upload-worker-$index.err.log")
            $argumentLine = "-NoProfile -ExecutionPolicy Bypass -File `"$workerScript`" -QueuePath `"$queuePath`" -FtpHost $FtpHost -FtpUsername $FtpUsername -RemoteRoot `"$RemoteRoot`" -FtpPort $FtpPort"
            if ($AllowInvalidCertificate) {
                $argumentLine += ' -AllowInvalidCertificate'
            }
            $workers += [pscustomobject]@{
                Process = Start-Process -FilePath 'powershell.exe' -ArgumentList $argumentLine -WindowStyle Hidden -RedirectStandardOutput $stdout -RedirectStandardError $stderr -PassThru
                ErrorLog = $stderr
            }
        }

        foreach ($worker in $workers) {
            $worker.Process.WaitForExit()
            if ($worker.Process.ExitCode -ne 0) {
                $detail = if (Test-Path -LiteralPath $worker.ErrorLog) { Get-Content -LiteralPath $worker.ErrorLog -Raw } else { 'No worker error output was produced.' }
                throw "A parallel FTPS upload worker failed. $detail"
            }
        }
    }

    if ($PSCmdlet.ShouldProcess($remoteManifestName, 'Publish deployment manifest')) {
        Invoke-FtpUpload -LocalPath $localManifestPath -RelativePath $remoteManifestName
    }

    Write-Host 'Deployment completed. Only files changed since the previous manifest were uploaded.'
}
finally {
    if (Test-Path -LiteralPath $stageRoot) {
        Remove-Item -LiteralPath $stageRoot -Recurse -Force
    }
    if ($stageDrive) {
        & subst.exe "$stageDrive`:" /D | Out-Null
    }
}
