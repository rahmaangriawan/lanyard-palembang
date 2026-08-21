# Performance Audit — 2026-08-15

## Scope and limitation

Audit dilakukan read-only terhadap production `https://lanyardmedan.com`.
Lighthouse binary/browser engine tidak tersedia pada sesi ini, sehingga metrik
Core Web Vitals seperti LCP, CLS, dan INP belum dapat diukur langsung. Angka di
bawah adalah response timing dan inspeksi markup/header production, bukan skor
Lighthouse.

## HTTP baseline

Tiga request per route, diambil 2026-08-15. Nilai adalah `TTFB / total / body`
dan dapat dipengaruhi cache edge, koneksi, serta kondisi origin.

| Route | Sampel | Observasi |
| --- | --- | --- |
| `/` | 2.49s/2.50s, 1.28s/1.29s, 1.38s/1.51s / 53 KB | TTFB paling tinggi dan bervariasi |
| `/produk` | 0.34s/0.35s, 0.37s/0.38s, 1.41s/1.52s / 39 KB | cache/origin variance |
| `/layanan` | 0.44s/0.45s, 0.33s/0.34s, 5.39s/12.96s / 34 KB | outlier origin perlu diselidiki |
| `/pengiriman` | 0.37s/0.37s, 0.29s/0.30s, 1.30s/1.30s / 33 KB | cache/origin variance |
| `/blog` | 0.39s/0.39s, 0.25s/0.27s, 0.35s/0.36s / 28 KB | relatif stabil |
| `/blog/polyester-vs-nylon-lanyard-medan` | 0.59s/0.60s, 0.67s/0.73s, 0.36s/0.36s / 36 KB | relatif baik setelah cache hangat |

Semua route yang diuji mengembalikan HTTP 200 saat verifikasi akhir.

## Header and asset findings

- HTML homepage memakai `Cache-Control: max-age=60, public, s-maxage=240,
  stale-while-revalidate=60`.
- Asset CSS/PNG memakai cache publik 7 hari.
- CSS dikirim gzip saat client mengirim `Accept-Encoding: gzip`.
- Homepage memuat `site.min.css`, `home.min.css`, dan `home.min.js` defer.
- Hero homepage memiliki preload, `fetchpriority=high`, `srcset` 320/640/960/1280,
  dan `sizes`.
- Asset homepage yang terdeteksi berukuran sekitar 2–139 KB per file WebP;
  tidak ditemukan hero JPEG besar pada daftar markup homepage.

## Prioritas optimasi

1. Investigasi outlier TTFB `/layanan` dan homepage pada origin log/PHP-FPM,
   bukan mengecilkan CSS terlebih dahulu.
2. Jalankan Lighthouse/CrUX dari Chrome atau PageSpeed pada production untuk
   mengukur LCP element, CLS sources, blocking time, dan unused bytes.
3. Tambahkan server-side cache hit/miss observability untuk membedakan cache
   edge dengan query/database lambat.
4. Jalankan `EXPLAIN` pada database production untuk homepage, blog, produk,
   dan layanan sebelum menambah index.
5. Setelah baseline release/manifest tersedia, ukur ulang setelah setiap
   perubahan dan bandingkan p75 mobile, bukan hanya satu request lokal.

## Quick wins applied

- Gambar portfolio homepage sekarang memakai varian WebP 320/640/960 melalui
  `srcset` dan `sizes`, sehingga browser tidak selalu mengambil file asli
  64-139 KB ketika ukuran tampilan lebih kecil.
- Visual CTA homepage sekarang memiliki varian WebP 480/720/960 melalui
  `<picture>`, dengan PNG lama tetap sebagai fallback. File PNG asli sekitar
  1.3 MB, sedangkan varian yang dipilih browser berada di bawah kebutuhan
  desktop/mobile masing-masing.
- Tidak ada perubahan pada route, markup CTA, teks, link, interaksi, atau
  layout. Perubahan hanya mengurangi overdelivery asset.

## Deployment note

Baseline FTPS penuh belum dipublikasikan karena remote belum memiliki manifest
dan upload satu-file-per-koneksi mendeteksi 11.330 file. Deploy incremental
perubahan audit tetap sudah tersimpan dan hash remote cocok; baseline penuh perlu
dilakukan dengan metode release yang lebih efisien atau akses SSH/cPanel extract.
