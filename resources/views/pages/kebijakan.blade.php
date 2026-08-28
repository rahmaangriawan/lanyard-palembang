@extends('layouts.public')

@section('title', 'Kebijakan Privasi & Perlindungan Data | Lanyard Palembang')
@section('meta_description', 'Kebijakan privasi Lanyard Palembang: apa yang kami simpan dari pesanan Anda, berapa lama, dan bagaimana Anda meminta datanya dihapus.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/kebijakan')
@section('seo_og_image', '/uploads/lanyard-palembang-logo.webp')
@section('seo_noindex', '1')

@push('head')
  <link rel="stylesheet" href="/css/legal-pages.css?v={{ file_exists(public_path('css/legal-pages.css')) ? filemtime(public_path('css/legal-pages.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@section('content')
@php
  $privacyWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya ingin bertanya mengenai privasi dan keamanan file desain pesanan saya.');
  $lastUpdated = '25 Agustus 2026';
@endphp

<div class="legal-page">
  {{-- 1. HERO SECTION --}}
  <section class="legal-hero" id="privacy-hero" aria-labelledby="privacy-title">
    <div class="legal-shell">
      <div class="legal-hero__grid">
        <div class="legal-hero__content">
          <div class="legal-eyebrow">KEBIJAKAN PRIVASI · LANYARD PALEMBANG</div>
          <h1 id="privacy-title">Data Pesanan, File Logo, dan Nomor Resi — Kami Tangani Secara Tertutup.</h1>
          <p class="legal-hero__lead">Halaman ini mendaftar apa saja yang kami simpan saat Anda memesan lanyard, berapa lama kami menyimpannya, dan bagaimana Anda bisa meminta datanya dihapus.</p>
          <div class="legal-actions">
            <a class="legal-button legal-button--primary" href="#isi-kebijakan">Baca Dokumen</a>
            <a class="legal-button legal-button--secondary" href="{{ $privacyWhatsappUrl }}" target="_blank" rel="noopener noreferrer">Tanya via WhatsApp</a>
          </div>
          <p class="legal-meta"><span class="legal-meta__dot" aria-hidden="true"></span> Berlaku sejak: {{ $lastUpdated }}</p>
        </div>
        <aside class="legal-hero__statement" aria-label="Ringkasan singkat kebijakan privasi">
          <p>YANG TIDAK KAMI LAKUKAN</p>
          <strong>File logo Anda tidak akan dipakai untuk pesanan orang lain, di-posting ke portofolio sebelum Anda mengizinkan, atau dibagikan ke vendor ketiga manapun.</strong>
          <span>Yang kami simpan hanya data produksi, file desain, dan nomor resi — maksimal 30 hari setelah barang diterima.</span>
        </aside>
      </div>
    </div>
  </section>

  {{-- 2. DOKUMEN + STICKY TOC --}}
  <section class="legal-document" id="isi-kebijakan" aria-labelledby="document-title">
    <div class="legal-shell">
      <div class="legal-document__layout">
        <aside class="legal-toc" aria-label="Daftar isi kebijakan privasi">
          <p class="legal-toc__label">DAFTAR ISI</p>
          <nav>
            <a href="#pendahuluan">01. Lingkup Dokumen</a>
            <a href="#data-dikumpulkan">02. Data yang Kami Simpan</a>
            <a href="#penggunaan-data">03. Untuk Apa Data Ini Dipakai</a>
            <a href="#file-desain">04. File Logo &amp; Master Desain</a>
            <a href="#keamanan-data">05. Pembatasan Akses Data</a>
            <a href="#cookie">06. Cookie pada Website</a>
            <a href="#hak-pemesan">07. Hak Anda sebagai Pemesan</a>
          </nav>
        </aside>

        <div>
          <details class="legal-mobile-toc">
            <summary>Daftar Isi Kebijakan Privasi <span aria-hidden="true">+</span></summary>
            <nav>
              <a href="#pendahuluan">01. Lingkup Dokumen</a>
              <a href="#data-dikumpulkan">02. Data yang Kami Simpan</a>
              <a href="#penggunaan-data">03. Untuk Apa Data Ini Dipakai</a>
              <a href="#file-desain">04. File Logo &amp; Master Desain</a>
              <a href="#keamanan-data">05. Pembatasan Akses Data</a>
              <a href="#cookie">06. Cookie pada Website</a>
              <a href="#hak-pemesan">07. Hak Anda sebagai Pemesan</a>
            </nav>
          </details>

          <header class="legal-document__header">
            <h2 id="document-title">Apa yang Kami Simpan &amp; Berapa Lama</h2>
            <p>Ketentuan ini berlaku untuk seluruh pesanan yang masuk melalui situs web ini, kontak WhatsApp, email, atau komunikasi langsung dengan tim Lanyard Palembang.</p>
          </header>

          <article class="legal-article" id="pendahuluan">
            <span class="legal-article__number" aria-hidden="true">01</span>
            <div>
              <h2>Lingkup Dokumen</h2>
              <p>Halaman ini menjelaskan bagaimana data pribadi dan file desain Anda dikelola sejak pertama kali menghubungi tim Lanyard Palembang — baik lewat formulir di website, chat WhatsApp, email, maupun pertemuan langsung di workshop — sampai dengan proses produksi, pengiriman, dan klaim garansi selesai.</p>
            </div>
          </article>

          <article class="legal-article" id="data-dikumpulkan">
            <span class="legal-article__number" aria-hidden="true">02</span>
            <div>
              <h2>Data yang Kami Simpan</h2>
              <p>Kami hanya menyimpan informasi yang benar-benar dibutuhkan untuk memproduksi dan mengirim pesanan Anda:</p>
              <ul class="legal-list">
                <li><p><strong>PIC pemesan:</strong> nama, nomor WhatsApp, email, alamat ekspedisi.</p></li>
                <li><p><strong>Identitas di lanyard:</strong> nama perusahaan, kementerian, universitas, atau kepanitiaan yang ingin dicetak.</p></li>
                <li><p><strong>File desain:</strong> logo vektor (AI/CDR/PDF) atau gambar (PNG) resolusi cetak, termasuk kode warna Pantone/HEX bila ada.</p></li>
                <li><p><strong>Detail produksi:</strong> jumlah pcs, jenis bahan, lebar tali, model aksesoris (hook, stopper, ID card).</p></li>
                <li><p><strong>Riwayat transaksi:</strong> tanggal, nomor invoice, status pembayaran, dan nomor resi.</p></li>
              </ul>
            </div>
          </article>

          <article class="legal-article" id="penggunaan-data">
            <span class="legal-article__number" aria-hidden="true">03</span>
            <div>
              <h2>Untuk Apa Data Ini Dipakai</h2>
              <p>Data pesanan dipakai untuk:</p>
              <ul class="legal-list">
                <li><p>Membuat dan mengirim penawaran harga serta invoice.</p></li>
                <li><p>Membuat mockup 3D untuk persetujuan cetak (ACC).</p></li>
                <li><p>Mengirim nomor resi kurir lewat WhatsApp begitu paket keluar dari workshop.</p></li>
                <li><p>Memproses klaim garansi cetak ulang bila ditemukan cacat produksi.</p></li>
                <li><p>Memenuhi kewajiban perpajakan dan administrasi pembukuan internal.</p></li>
              </ul>
              <div class="legal-note">
                <p>Kami tidak pernah menjual, menyewakan, atau memberikan data kontak Anda ke pihak lain untuk kepentingan pemasaran. Pesan promo dari kami hanya dikirim jika Anda sebelumnya meminta untuk ikut mailing list.</p>
              </div>
            </div>
          </article>

          <article class="legal-article" id="file-desain">
            <span class="legal-article__number" aria-hidden="true">04</span>
            <div>
              <h2>File Logo &amp; Master Desain Anda</h2>
              <p>Logo dan artwork pesanan Anda hanya dipakai untuk mencetak lanyard pesanan itu sendiri.</p>
              <ul class="legal-check-list">
                <li>
                  <h3>Tidak untuk Pesanan Lain</h3>
                  <p>File tidak akan digunakan kembali untuk pesanan dari pemesan lain tanpa izin tertulis.</p>
                </li>
                <li>
                  <h3>Foto Showcase Ditahan</h3>
                  <p>Kami menahan publikasi foto produk ke portofolio atau media sosial sampai Anda memberi izin (default setelah acara selesai).</p>
                </li>
                <li>
                  <h3>Retensi 30 Hari</h3>
                  <p>File master disimpan 30 hari setelah pesanan dikirim untuk memudahkan re-order, lalu diarsipkan.</p>
                </li>
              </ul>
            </div>
          </article>

          <article class="legal-article" id="keamanan-data">
            <span class="legal-article__number" aria-hidden="true">05</span>
            <div>
              <h2>Bagaimana Kami Menjaga Akses Data</h2>
              <p>Kami membatasi siapa saja yang dapat melihat data Anda:</p>
              <ul class="legal-list">
                <li><p>Pertukaran data di website ini terenkripsi HTTPS.</p></li>
                <li><p>File master hanya diakses desainer dan operator produksi yang menangani pesanan Anda.</p></li>
                <li><p>Server kami berada di tempat penyimpanan dengan firewall dan diaudit secara berkala.</p></li>
              </ul>
              <p class="legal-article__footnote">Tidak ada sistem yang 100% aman, namun kami terus meningkatkan prosedur untuk menekan risiko seminimal mungkin.</p>
            </div>
          </article>

          <article class="legal-article" id="cookie">
            <span class="legal-article__number" aria-hidden="true">06</span>
            <div>
              <h2>Cookie pada Website</h2>
              <p>Cookie yang kami pakai bersifat fungsional: menyimpan filter katalog, status pre-order, dan preferensi tampilan. Kami tidak memasang iklan bertarget dari pihak ketiga. Anda bisa menghapus cookie melalui pengaturan peramban tanpa kehilangan akses membaca informasi produk di website ini.</p>
            </div>
          </article>

          <article class="legal-article" id="hak-pemesan">
            <span class="legal-article__number" aria-hidden="true">07</span>
            <div>
              <h2>Hak Anda sebagai Pemesan</h2>
              <p>Anda dapat sewaktu-waktu:</p>
              <ul class="legal-list">
                <li><p>Meminta salinan data produksi yang kami simpan tentang pesanan Anda.</p></li>
                <li><p>Memperbarui alamat atau nomor kontak sebelum nomor resi keluar.</p></li>
                <li><p>Meminta penghapusan permanen file master logo lebih awal dari retensi 30 hari.</p></li>
              </ul>
              <p>Semua permintaan di atas dapat ditujukan ke customer service kami melalui WhatsApp resmi. Kami akan merespon dalam 1×24 jam kerja.</p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  {{-- 3. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')

@push('schema')
  @include('components.schema.privacy')
@endpush
@endsection
