# Development Log — 2026-08-15

## Scope

- E2E alur artikel blog sampai CTA WhatsApp.
- Cross-browser compatibility review.
- Review index dan query publik.
- Dokumentasi audit dan changelog.

## Completed

- Memperbaiki canonical redirect `/blog` agar `q` dan `page` tidak hilang.
- Mempersempit kandidat query `/tag/{slug}` dengan binding `LIKE` sebelum
  exact-match tag di PHP.
- Memvalidasi request lokal untuk pencarian `nylon`, detail artikel, route tag,
  serta href CTA WhatsApp tanpa mengirim pesan.
- Memeriksa bahwa homepage portfolio memakai inline SVG, bukan fallback nama
  Material Symbols yang rusak.
- Memeriksa slider artikel homepage: swipe/pointer, progress control,
  keyboard, dan reduced-motion sudah tersedia di source.
- Mendokumentasikan coverage browser yang tersedia dan yang masih pending.

## Database and deployment boundary

- Index existing untuk post, product, comment, city page, testimonial, dan
  portfolio direview.
- Migration/database tidak dijalankan.
- Tidak ada deployment, perubahan `.env`, atau perubahan server.

## Follow-up

- Jalankan smoke matrix di Firefox, Safari, Android, dan iOS pada perangkat atau
  layanan browser yang tersedia.
- Jalankan `EXPLAIN` pada database target sebelum menambah index baru.
- Tambahkan regression test khusus agar `q`/`page` tetap dipertahankan pada
  `/blog` dan parameter random tetap dibersihkan.
