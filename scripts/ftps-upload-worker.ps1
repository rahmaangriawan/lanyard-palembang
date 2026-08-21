[CmdletBinding()]
param(
    [Parameter(Mandatory)]
    [string]$QueuePath,

    [Parameter(Mandatory)]
    [string]$FtpHost,

    [Parameter(Mandatory)]
    [string]$FtpUsername,

    [Parameter(Mandatory)]
    [AllowEmptyString()]
    [string]$RemoteRoot,

    [int]$FtpPort = 21,

    [switch]$AllowInvalidCertificate
)

Set-StrictMode -Version Latest
$ErrorActionPreference = 'Stop'

$ftpPassword = $env:LANYARD_SURABAYA_FTP_PASSWORD
if ([string]::IsNullOrWhiteSpace($ftpPassword)) {
    throw 'LANYARD_SURABAYA_FTP_PASSWORD is not available to the upload worker.'
}

$remoteRootNormalized = $RemoteRoot.Trim('/')
$queueData = ConvertFrom-Json -InputObject (Get-Content -LiteralPath $QueuePath -Raw)
$queue = if ($queueData -is [System.Array]) { $queueData } else { @($queueData) }
$curlConfigPath = Join-Path (Split-Path -Parent $QueuePath) ('curl-' + [guid]::NewGuid().ToString('N') + '.conf')
$credential = ("$FtpUsername`:$ftpPassword").Replace('\\', '\\\\').Replace('"', '\\"')
$curlConfig = @(
    'fail',
    'silent',
    'show-error',
    'ssl-reqd',
    ('user = "{0}"' -f $credential)
)
if ($AllowInvalidCertificate) {
    $curlConfig += 'insecure'
}

[System.IO.File]::WriteAllLines($curlConfigPath, $curlConfig, [System.Text.UTF8Encoding]::new($false))

try {
    foreach ($file in $queue) {
        if (-not (Test-Path -LiteralPath $file.source)) {
            throw "Local staged file is missing: $($file.path)"
        }

        $pieces = @()
        if (-not [string]::IsNullOrWhiteSpace($remoteRootNormalized)) {
            $pieces += $remoteRootNormalized.Split('/') | ForEach-Object { [uri]::EscapeDataString($_) }
        }
        $pieces += $file.path.Split('/') | ForEach-Object { [uri]::EscapeDataString($_) }
        $url = "ftp://$FtpHost`:$FtpPort/" + ($pieces -join '/')

        $curlArguments = @('--config', $curlConfigPath, '--ftp-create-dirs', '--upload-file', $file.source, $url)

        try {
            & curl.exe @curlArguments
        }
        catch {
            throw "Could not start curl for $($file.path): $($_.Exception.Message)"
        }
        if ($LASTEXITCODE -ne 0) {
            throw "Upload failed for $($file.path)."
        }
    }
}
finally {
    Remove-Item -LiteralPath $curlConfigPath -Force -ErrorAction SilentlyContinue
}
