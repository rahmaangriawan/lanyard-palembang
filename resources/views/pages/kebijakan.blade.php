@extends('layouts.public')

@section('title', 'Kebijakan Privasi | Lanyard Medan')
@section('meta_description', 'Pelajari cara Lanyard Medan mengumpulkan, menggunakan, menyimpan, dan melindungi data pribadi serta file desain pelanggan.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/kebijakan')
@section('seo_og_image', '/uploads/lanyard-medan-logo.webp')
@section('seo_noindex', '1')

@push('head')
  <link rel="stylesheet" href="/css/legal-pages.css?v={{ file_exists(public_path('css/legal-pages.css')) ? filemtime(public_path('css/legal-pages.css')) : 1 }}">
@endpush

@section('content')
@php
  $privacyWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya ingin bertanya mengenai kebijakan privasi dan data saya.');
  $lastUpdated = '08 Agustus 2026';
@endphp

<div class="legal-page">
  {{-- Hero --}}
  <section class="legal-hero" id="privacy-hero" aria-labelledby="privacy-title">
    <div class="legal-shell">
      <div class="legal-hero__grid">
        <div class="legal-hero__content">
          <p class="legal-eyebrow">Kebijakan Privasi</p>
          <h1 id="privacy-title">Kebijakan privasi yang jelas dan transparan</h1>
          <p class="legal-hero__lead">Ketahui data yang kami perlukan, tujuan penggunaannya, serta cara kami menjaga informasi dan file desain Anda.</p>
          <div class="legal-actions">
            <a class="legal-button legal-button--primary" href="#isi-kebijakan">Baca kebijakan</a>
            <a class="legal-button legal-button--secondary" href="{{ $privacyWhatsappUrl }}" target="_blank" rel="noopener noreferrer">Tanya Tim Kami</a>
          </div>
          <p class="legal-meta"><span class="legal-meta__dot" aria-hidden="true"></span> Terakhir diperbarui: {{ $lastUpdated }}</p>
        </div>
        <aside class="legal-hero__statement" aria-label="Komitmen privasi singkat">
          <p>Komitmen privasi</p>
          <strong>Data tidak dijual. File desain hanya dipakai untuk pesanan Anda.</strong>
          <span>Retensi file desain maksimal 30 hari setelah serah terima, dengan opsi hapus lebih awal via WhatsApp.</span>
        </aside>
      </div>
    </div>
  </section>

  {{-- Dokumen + TOC --}}
  <section class="legal-document" id="isi-kebijakan" aria-labelledby="document-title">
    <div class="legal-shell">
      <div class="legal-document__layout">
        <aside class="legal-toc" aria-label="Daftar isi kebijakan privasi">
          <p class="legal-toc__label">Daftar isi</p>
          <nav>
            <a href="#pendahuluan">Pendahuluan</a>
            <a href="#data-dikumpulkan">Data yang dikumpulkan</a>
            <a href="#penggunaan-data">Penggunaan data</a>
            <a href="#file-desain">Perlindungan file desain</a>
            <a href="#keamanan-data">Keamanan data</a>
            <a href="#cookie">Cookie dan pelacakan</a>
            <a href="#pembaruan">Pembaruan kebijakan</a>
          </nav>
        </aside>

        <div>
          <details class="legal-mobile-toc">
            <summary>Daftar isi kebijakan <span aria-hidden="true">+</span></summary>
            <nav>
              <a href="#pendahuluan">Pendahuluan</a><a href="#data-dikumpulkan">Data yang dikumpulkan</a><a href="#penggunaan-data">Penggunaan data</a><a href="#file-desain">Perlindungan file desain</a><a href="#keamanan-data">Keamanan data</a><a href="#cookie">Cookie dan pelacakan</a><a href="#pembaruan">Pembaruan kebijakan</a>
            </nav>
          </details>

          <header class="legal-document__header">
            <h2 id="document-title">Bagaimana kami mengelola informasi Anda</h2>
            <p>Penjelasan ini berlaku untuk interaksi melalui website, WhatsApp, email, dan komunikasi langsung dengan Lanyard Medan.</p>
          </header>

          <article class="legal-article" id="pendahuluan">
            <span class="legal-article__number" aria-hidden="true">01</span>
            <div><h2>Pendahuluan</h2><p>Selamat datang di Lanyard Medan. Kebijakan Privasi ini menjelaskan komitmen kami dalam menjaga kerahasiaan data dan informasi yang Anda berikan saat menggunakan layanan kami, baik melalui website, WhatsApp, email, maupun komunikasi langsung. Dengan menggunakan layanan kami, Anda menyetujui pengumpulan dan penggunaan informasi sesuai kebijakan ini.</p></div>
          </article>

          <article class="legal-article" id="data-dikumpulkan">
            <span class="legal-article__number" aria-hidden="true">02</span>
            <div><h2>Informasi yang kami kumpulkan</h2><p>Dalam proses pemesanan lanyard custom, kami dapat mengumpulkan:</p>
              <ul class="legal-list"><li><span aria-hidden="true"></span><p><strong>Data pribadi:</strong> nama lengkap, nomor WhatsApp/telepon, email, dan alamat pengiriman.</p></li><li><span aria-hidden="true"></span><p><strong>Data bisnis:</strong> nama perusahaan, instansi, sekolah, atau komunitas pada desain.</p></li><li><span aria-hidden="true"></span><p><strong>File desain:</strong> logo, artwork, dan mockup untuk produksi.</p></li><li><span aria-hidden="true"></span><p><strong>Data pemesanan:</strong> bahan, kuantitas, warna, aksesori, dan riwayat transaksi.</p></li><li><span aria-hidden="true"></span><p><strong>Data teknis:</strong> alamat IP, jenis browser, halaman yang dikunjungi, dan durasi kunjungan melalui cookie.</p></li></ul></div>
          </article>

          <article class="legal-article" id="penggunaan-data">
            <span class="legal-article__number" aria-hidden="true">03</span>
            <div><h2>Penggunaan data</h2><p>Informasi digunakan untuk:</p>
              <ul class="legal-list">
                <li><span aria-hidden="true"></span><p>Memproses dan mengelola pesanan dari konsultasi hingga pengiriman.</p></li>
                <li><span aria-hidden="true"></span><p>Berkomunikasi terkait status pesanan, konfirmasi desain, dan estimasi produksi.</p></li>
                <li><span aria-hidden="true"></span><p>Mengirim promo atau pembaruan layanan hanya bila Anda menyetujuinya.</p></li>
                <li><span aria-hidden="true"></span><p>Meningkatkan kualitas layanan dan pengalaman website.</p></li>
                <li><span aria-hidden="true"></span><p>Memenuhi kewajiban hukum yang berlaku.</p></li>
              </ul>
              <div class="legal-note"><span class="legal-note__mark" aria-hidden="true">✓</span><p><strong>Komitmen kami:</strong> Kami tidak menjual, menyewakan, atau membagikan data pribadi kepada pihak ketiga untuk pemasaran tanpa izin eksplisit.</p></div>
            </div>
          </article>

          <article class="legal-article" id="file-desain">
            <span class="legal-article__number" aria-hidden="true">04</span>
            <div><h2>Perlindungan file desain</h2><p>Logo dan desain Anda adalah aset berharga.</p>
              <ul class="legal-check-list"><li><span aria-hidden="true">✓</span><div><h3>Hanya untuk produksi</h3><p>File logo, artwork, dan mockup hanya digunakan untuk pesanan Anda.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Tidak dipakai ulang</h3><p>Tidak diperbanyak atau dijadikan sampel tanpa izin tertulis.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Retensi 30 hari</h3><p>Setelah serah terima, file disimpan 30 hari lalu dihapus. Anda dapat meminta penghapusan lebih awal via WhatsApp.</p></div></li></ul>
            </div>
          </article>

          <article class="legal-article" id="keamanan-data">
            <span class="legal-article__number" aria-hidden="true">05</span>
            <div><h2>Keamanan data</h2><p>Kami menerapkan langkah teknis dan organisasional untuk mengurangi risiko akses atau perusakan data tanpa izin. Komunikasi website dilindungi melalui HTTPS dan akses file desain dibatasi.</p>
              <ul class="legal-check-list"><li><span aria-hidden="true">✓</span><div><h3>Saluran terenkripsi</h3><p>HTTPS aktif untuk website dan transfer file.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Akses terbatas</h3><p>Hanya staf yang menangani pesanan memiliki akses.</p></div></li><li><span aria-hidden="true">✓</span><div><h3>Proteksi file</h3><p>Penyimpanan dengan pembatasan akses dan audit berkala.</p></div></li></ul>
              <p class="legal-article__footnote">Tidak ada metode transmisi yang sepenuhnya aman; kami terus meningkatkan sistem proteksi.</p>
            </div>
          </article>

          <article class="legal-article" id="cookie">
            <span class="legal-article__number" aria-hidden="true">06</span>
            <div><h2>Cookie dan teknologi pelacakan</h2><p>Website dapat menggunakan cookie untuk mengingat preferensi, menganalisis trafik, dan menjaga fungsi esensial. Anda dapat menonaktifkannya melalui pengaturan browser, namun beberapa fitur mungkin tidak berfungsi optimal.</p></div>
          </article>

          <article class="legal-article" id="pembaruan">
            <span class="legal-article__number" aria-hidden="true">07</span>
            <div><h2>Pembaruan kebijakan</h2><p>Kami dapat memperbarui kebijakan ini dari waktu ke waktu. Perubahan diumumkan di halaman ini dengan mencantumkan tanggal pembaruan. Silakan meninjau secara berkala; penggunaan layanan setelah perubahan berarti Anda menyetujui kebijakan yang diperbarui.</p></div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section class="legal-cta" aria-labelledby="privacy-cta-title">
    <div class="legal-shell">
      <div class="legal-cta__panel">
        <div><p class="legal-eyebrow">Tanya jawab privasi</p><h2 id="privacy-cta-title">Masih ada pertanyaan tentang data Anda?</h2><p>Sampaikan pertanyaan atau permintaan Anda, tim kami akan membantu dengan informasi yang relevan.</p></div>
        <a class="legal-button legal-button--light" href="{{ $privacyWhatsappUrl }}" target="_blank" rel="noopener noreferrer">Hubungi via WhatsApp →</a>
      </div>
    </div>
  </section>
</div>
@include('components.footer')
@push('schema')
  @include('components.schema.privacy')
@endpush
@endsection
