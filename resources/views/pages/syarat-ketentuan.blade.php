@extends('layouts.public')

@section('title', 'Syarat & Ketentuan Pemesanan | Lanyard Medan')
@section('meta_description', 'Syarat pemesanan Lanyard Medan: persetujuan mockup, pembayaran, toleransi, pengiriman, pembatalan, dan garansi.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/syarat-ketentuan')
@section('seo_og_image', '/uploads/lanyard-medan-logo.webp')
@section('seo_noindex', '1')

@push('head')
  <link rel="stylesheet" href="/css/legal-pages.css?v={{ file_exists(public_path('css/legal-pages.css')) ? filemtime(public_path('css/legal-pages.css')) : 1 }}">
@endpush

@section('content')
@php $termsWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya ingin bertanya soal syarat pemesanan.'); $lastUpdated = '08 Agustus 2026'; @endphp
<div class="legal-page">
  <section class="legal-hero" aria-labelledby="terms-title">
    <div class="legal-shell">
      <div class="legal-hero__grid">
        <div class="legal-hero__content">
          <p class="legal-eyebrow">Syarat &amp; Ketentuan</p>
          <h1 id="terms-title">Syarat yang jelas sebelum produksi berjalan</h1>
          <p class="legal-hero__lead">Pahami persetujuan desain, pembayaran, toleransi produksi, pengiriman, dan garansi sebelum menyetujui pesanan.</p>
          <div class="legal-actions"><a class="legal-button legal-button--primary" href="{{ $termsWhatsappUrl }}" target="_blank" rel="noopener noreferrer">Mulai Konsultasi</a><a class="legal-button legal-button--secondary" href="{{ route('ordering') }}">Cara Pemesanan</a></div>
          <p class="legal-meta"><span class="legal-meta__dot" aria-hidden="true"></span> Terakhir diperbarui: {{ $lastUpdated }}</p>
        </div>
        <aside class="legal-hero__statement" aria-label="Ringkasan syarat cepat">
          <p>Mulai tanpa ragu</p>
          <strong>Produksi berjalan setelah mockup disetujui &amp; pembayaran terkonfirmasi.</strong>
          <span>Toleransi warna &amp; jahitan diinformasikan di awal; klaim garansi diperiksa lewat dokumentasi unboxing.</span>
        </aside>
      </div>
    </div>
  </section>

  <section class="legal-document" id="isi-ketentuan" aria-labelledby="document-title">
    <div class="legal-shell">
      <div class="legal-document__layout">
        <aside class="legal-toc" aria-label="Daftar isi syarat & ketentuan">
          <p class="legal-toc__label">Daftar isi</p>
          <nav><a href="#ketentuan-umum">Ketentuan umum</a><a href="#hak-cipta">Hak cipta &amp; desain</a><a href="#persetujuan-mockup">Persetujuan mockup</a><a href="#produksi-toleransi">Produksi &amp; toleransi</a><a href="#pembayaran">Pembayaran</a><a href="#ketentuan-pengiriman">Pengiriman</a><a href="#pembatalan-garansi">Pembatalan &amp; garansi</a></nav>
        </aside>
        <div>
          <details class="legal-mobile-toc"><summary>Daftar isi syarat pemesanan <span aria-hidden="true">+</span></summary><nav><a href="#ketentuan-umum">Ketentuan umum</a><a href="#hak-cipta">Hak cipta &amp; desain</a><a href="#persetujuan-mockup">Persetujuan mockup</a><a href="#produksi-toleransi">Produksi &amp; toleransi</a><a href="#pembayaran">Pembayaran</a><a href="#ketentuan-pengiriman">Pengiriman</a><a href="#pembatalan-garansi">Pembatalan &amp; garansi</a></nav></details>
          <header class="legal-document__header"><h2 id="document-title">Ketentuan lengkap pemesanan lanyard custom</h2><p>Ketentuan berikut menjadi dasar kesepakatan antara Lanyard Medan dan pemesan selama desain, produksi, pembayaran, serta pengiriman.</p></header>

          <article class="legal-article" id="ketentuan-umum"><span class="legal-article__number" aria-hidden="true">01</span><div><h2>Ketentuan umum</h2><p>Dengan memesan di Lanyard Medan, Anda menyetujui seluruh ketentuan di halaman ini sebagai kesepakatan transaksi jasa cetak. Jika ada bagian yang belum jelas, konsultasikan via WhatsApp sebelum menyetujui mockup.</p></div></article>
          <article class="legal-article" id="hak-cipta"><span class="legal-article__number" aria-hidden="true">02</span><div><h2>Hak cipta &amp; orisinalitas desain</h2><p>Jika Anda memberikan file siap cetak/logoelemen, berlaku:</p><ul class="legal-check-list"><li><span aria-hidden="true">✓</span><div><h3>Material Anda, tanggung jawab Anda</h3><p>Klien menjamin materi tidak melanggar hak cipta/merek pihak lain.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Bebas tuntutan ke percetakan</h3><p>Lanyard Medan dibebaskan dari tuntutan akibat materi yang diberikan klien.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Hak desain internal</h3><p>Desain yang dibuat tim menjadi milik klien setelah transaksi lunas.</p></div></li></ul></div></article>
          <article class="legal-article" id="persetujuan-mockup"><span class="legal-article__number" aria-hidden="true">03</span><div><h2>Persetujuan desain &amp; mockup</h2><div class="legal-note"><span class="legal-note__mark" aria-hidden="true">!</span><p><strong>Persetujuan mockup adalah tahap penting.</strong> Produksi belum berjalan sebelum desain final disetujui.</p></div><ul class="legal-check-list"><li><span aria-hidden="true">✓</span><div><h3>Visual dikirim untuk dicek</h3><p>Tim mengirim mockup final via WhatsApp/email. Periksa ejaan, logo, warna, dan tata letak.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Kesalahan setelah ACC menjadi tanggung jawab pemesan</h3><p>Typo/penempatan yang sudah disetujui tidak termasuk klaim produksi.</p></div></li></ul></div></article>
          <article class="legal-article" id="produksi-toleransi"><span class="legal-article__number" aria-hidden="true">04</span><div><h2>Produksi &amp; toleransi</h2><p>Produksi memakai cetak sublimasi digital dan rakitan yang sebagian manual; toleransi wajar diinformasikan sejak awal.</p><ul class="legal-check-list"><li><span aria-hidden="true">✓</span><div><h3>Toleransi warna 5–10%</h3><p>Perbedaan RGB layar vs kain sublimasi adalah hal normal.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Jahitan &amp; potong 1–2 mm</h3><p>Pergeseran kecil termasuk batas wajar produksi.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Estimasi produksi setelah ACC &amp; DP</h3><p>Waktu dihitung dari persetujuan mockup + pembayaran, bukan chat pertama.</p></div></li></ul></div></article>
          <article class="legal-article" id="pembayaran"><span class="legal-article__number" aria-hidden="true">05</span><div><h2>Pembayaran</h2><ul class="legal-check-list"><li><span aria-hidden="true">✓</span><div><h3>DP minimal 50%</h3><p>Produksi diproses setelah DP diterima.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Pelunasan sebelum kirim</h3><p>Sisa wajib lunas sebelum barang dikirim/diambil; tim dapat mengirim foto/video bukti jadi.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Rekening resmi</h3><p>Pembayaran via rekening di invoice resmi.</p></div></li></ul></div></article>
          <article class="legal-article" id="ketentuan-pengiriman"><span class="legal-article__number" aria-hidden="true">06</span><div><h2>Pengiriman</h2><p>Pesanan diserahkan ke ekspedisi setelah produksi, QC, kemas, dan pelunasan selesai. Nomor resi dibagikan setelah paket diserahkan.</p><div class="legal-check-list"><p><a class="legal-inline-link" href="{{ route('shipping') }}">Lihat informasi pengiriman →</a></p></div></div></article>
          <article class="legal-article" id="pembatalan-garansi"><span class="legal-article__number" aria-hidden="true">07</span><div><h2>Pembatalan &amp; garansi</h2><div class="legal-note legal-note--warning"><span class="legal-note__mark" aria-hidden="true">!</span><p><strong>Pembatalan:</strong> Tidak dapat dibatalkan setelah produksi dimulai; kain sudah dicetak/dipotong, DP hangus.</p></div><ul class="legal-check-list"><li><span aria-hidden="true">✓</span><div><h3>Cacat produksi</h3><p>Cetak pudar, tali putus, atau stopper rusak saat terima — dapat diperiksa.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Batas klaim 3×24 jam</h3><p>Sejak status paket diterima.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Bukti unboxing</h3><p>Foto/video paket dan produk dengan jelas.</p></div></li></ul><p><a class="legal-inline-link" href="{{ route('warranty') }}">Baca cakupan garansi →</a></p></div></article>
        </div>
      </div>
    </div>
  </section>

  <section class="legal-cta" aria-labelledby="cta-title">
    <div class="legal-shell">
      <div class="legal-cta__panel">
        <div><p class="legal-eyebrow">Konsultasi cepat</p><h2 id="cta-title">Siap memesan dengan syarat yang jelas?</h2><p>Diskusikan jumlah, bahan, desain, dan target waktu — quotation disiapkan tanpa biaya.</p></div>
        <a class="legal-button legal-button--light" href="{{ $termsWhatsappUrl }}" target="_blank" rel="noopener noreferrer">Konsultasi via WhatsApp →</a>
      </div>
    </div>
  </section>
</div>
@include('components.footer')
@push('schema')
  @include('components.schema.terms')
@endpush
@endsection
