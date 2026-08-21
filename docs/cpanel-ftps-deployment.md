# Deploy Laravel ke cPanel melalui FTPS

Dokumen ini memakai skrip `scripts/deploy-cpanel-ftps.ps1`. Skrip membuat paket production di komputer lokal dan hanya mengunggah file yang hash-nya berubah. Kredensial tidak pernah disimpan dalam repository, manifest, maupun log deploy.

## Prasyarat sekali di cPanel

1. Pilih PHP **8.3** atau lebih baru untuk domain.
2. Atur document root domain ke direktori `public` aplikasi:
   `/home/lanyardb/lanyardmedan.com/surabayalanyard/public`
3. Buat database MySQL dan user khusus Surabaya. Import dump lokal `database/lanyard-medan-cloudpanel-20260811.sql` melalui phpMyAdmin.
4. Buat file `.env` langsung di server (jangan unggah dari lokal), lalu isi `APP_ENV=production`, `APP_DEBUG=false`, `APP_URL=https://lanyardmedan.com`, `APP_KEY`, serta kredensial database server.
5. Pastikan direktori `storage` dan `bootstrap/cache` dapat ditulis oleh PHP. Bila media memakai URL `storage`, buat symlink `public/storage` ke `storage/app/public` melalui fitur cPanel yang tersedia. Aset brand yang ada di `public/uploads` ikut pada deploy awal.

FTP tidak dapat menjalankan Artisan, migrasi, atau import database. Jika struktur database berubah di masa depan, import SQL yang sudah disiapkan melalui phpMyAdmin atau gunakan akses SSH terpisah.

## Deploy awal

Simpan password hanya untuk sesi PowerShell saat ini:

```powershell
$credential = Get-Credential -UserName 'surabayalanyard@lanyardmedan.com'
$env:LANYARD_SURABAYA_FTP_PASSWORD = $credential.GetNetworkCredential().Password
```

Kemudian jalankan dari root repository:

```powershell
.\scripts\deploy-cpanel-ftps.ps1 `
  -FtpHost 'ftp.lanyardbagus.com' `
  -FtpUsername 'surabayalanyard@lanyardmedan.com' `
  -RemoteRoot '' `
  -Initial `
  -BuildAssets `
  -AllowInvalidCertificate
```

`-AllowInvalidCertificate` hanya dipakai karena sertifikat FTPS server saat ini tidak cocok dengan hostname. Hapus opsi itu segera setelah sertifikat FTPS diperbaiki.

## Deploy perubahan berikutnya

```powershell
.\scripts\deploy-cpanel-ftps.ps1 `
  -FtpHost 'ftp.lanyardbagus.com' `
  -FtpUsername 'surabayalanyard@lanyardmedan.com' `
  -RemoteRoot '' `
  -BuildAssets `
  -AllowInvalidCertificate
```

Skrip membandingkan `.deploy-manifest.json` lokal dengan manifest remote dan hanya mengunggah file yang berubah. Skrip tidak menghapus file remote dan secara default tidak menyentuh `public/uploads` pada deploy lanjutan. Jika ada aset statis baru di folder tersebut, jalankan lagi dengan `-Initial` atau perluas skrip secara sadar untuk aset itu.

Unggahan menggunakan empat koneksi FTPS paralel secara default. Jika server membatasi koneksi, turunkan menjadi `-ParallelUploads 2`.

## Batasan penting

- Jangan unggah `.env`, dump SQL, `node_modules`, Git history, test, atau cache Laravel dari Windows.
- Jangan membuat cache config/route/view di komputer Windows lalu mengunggahnya ke Linux.
- Pastikan `APP_KEY` dibuat di server sekali saja dan tidak diubah ketika update file.
- Bila rilis terputus, manifest remote tidak diperbarui; jalankan ulang skrip untuk melanjutkan file yang belum terkirim.
