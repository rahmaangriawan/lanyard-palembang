@extends('layouts.public')

@section('title', 'Syarat & Ketentuan Pemesanan Lanyard | Lanyard Palembang')
@section('meta_description', 'Syarat pemesanan Lanyard Palembang: persetujuan mockup, pembayaran, toleransi produksi, pengiriman, pembatalan, dan garansi.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/syarat-ketentuan')
@section('seo_og_image', '/uploads/lanyard-palembang-logo.webp')
@section('seo_noindex', '1')

@push('head')
  <link rel="stylesheet" href="/css/legal-pages.css?v={{ file_exists(public_path('css/legal-pages.css')) ? filemtime(public_path('css/legal-pages.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@section('content')
@php
  $termsWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya ingin bertanya soal syarat pemesanan lanyard custom.');
  $lastUpdated = '25 Agustus 2026';
@endphp

<div class="legal-page">
  {{-- 1. HERO SECTION --}}
  <section class="legal-hero" id="terms-hero" aria-labelledby="terms-title">
    <div class="legal-shell">
      <div class="legal-hero__grid">
        <div class="legal-hero__content">
          <div class="legal-eyebrow">SYARAT &amp; KETENTUAN · LANYARD PALEMBANG</div>
          <h1 id="terms-title">Sebelum Produksi Dimulai, Ini yang Perlu Anda Setujui.</h1>
          <p class="legal-hero__lead">Halaman ini mendaftar aturan main pemesanan lanyard: persetujuan mockup, pembayaran, toleransi produksi, pengiriman, pembatalan, dan garansi.</p>
          <div class="legal-actions">
            <a class="legal-button legal-button--primary" href="{{ $termsWhatsappUrl }}" target="_blank" rel="noopener noreferrer">Konsultasi via WhatsApp</a>
            <a class="legal-button legal-button--secondary" href="{{ route('ordering') }}">Cara Pemesanan</a>
          </div>
          <p class="legal-meta"><span class="legal-meta__dot" aria-hidden="true"></span> Berlaku sejak: {{ $lastUpdated }}</p>
        </div>
        <aside class="legal-hero__statement" aria-label="Ringkasan singkat syarat & ketentuan">
          <p>URUTAN KERJA STANDAR</p>
          <strong>Mockup disetujui → DP kami terima → produksi berjalan → pelunasan → paket kami kirim.</strong>
          <span>Setelah mockup disetujui dan DP masuk, pesanan langsung masuk antrean cetak. Pembatalan setelah produksi dimulai tidak dapat dilakukan.</span>
        </aside>
      </div>
    </div>
  </section>

  {{-- 2. DOKUMEN + STICKY TOC --}}
  <section class="legal-document" id="isi-ketentuan" aria-labelledby="document-title">
    <div class="legal-shell">
      <div class="legal-document__layout">
        <aside class="legal-toc" aria-label="Daftar isi syarat & ketentuan">
          <p class="legal-toc__label">DAFTAR ISI</p>
          <nav>
            <a href="#ketentuan-umum">01. Ketentuan Umum</a>
            <a href="#hak-cipta">02. Hak Cipta &amp; Materi Desain</a>
            <a href="#persetujuan-mockup">03. Persetujuan Mockup</a>
            <a href="#produksi-toleransi">04. Produksi &amp; Toleransi</a>
            <a href="#pembayaran">05. Pembayaran</a>
            <a href="#ketentuan-pengiriman">06. Pengiriman</a>
            <a href="#pembatalan-garansi">07. Pembatalan &amp; Garansi</a>
          </nav>
        </aside>

        <div>
          <details class="legal-mobile-toc">
            <summary>Daftar Isi Syarat Pemesanan <span aria-hidden="true">+</span></summary>
            <nav>
              <a href="#ketentuan-umum">01. Ketentuan Umum</a>
              <a href="#hak-cipta">02. Hak Cipta &amp; Materi Desain</a>
              <a href="#persetujuan-mockup">03. Persetujuan Mockup</a>
              <a href="#produksi-toleransi">04. Produksi &amp; Toleransi</a>
              <a href="#pembayaran">05. Pembayaran</a>
              <a href="#ketentuan-pengiriman">06. Pengiriman</a>
              <a href="#pembatalan-garansi">07. Pembatalan &amp; Garansi</a>
            </nav>
          </details>

          <header class="legal-document__header">
            <h2 id="document-title">Aturan Main Pemesanan Lanyard Custom</h2>
            <p>Ketentuan di bawah ini adalah dasar kesepakatan antara Lanyard Palembang dan pemesan, mulai dari desain, produksi, hingga pengiriman dan garansi.</p>
          </header>

          <article class="legal-article" id="ketentuan-umum">
            <span class="legal-article__number" aria-hidden="true">01</span>
            <div>
              <h2>Ketentuan Umum</h2>
              <p>Dengan memesan di Lanyard Palembang, Anda menyetujui seluruh ketentuan di halaman ini sebagai dasar transaksi jasa cetak. Bila ada bagian yang belum dipahami, konsultasikan lewat WhatsApp sebelum Anda menyetujui mockup final.</p>
            </div>
          </article>

          <article class="legal-article" id="hak-cipta">
            <span class="legal-article__number" aria-hidden="true">02</span>
            <div>
              <h2>Hak Cipta &amp; Materi Desain</h2>
              <p>Jika Anda menyediakan file siap cetak atau elemen visual, ketentuan ini berlaku:</p>
              <ul class="legal-check-list">
                <li>
                  <h3>Material Anda, Tanggung Jawab Anda</h3>
                  <p>Pemesan menjamin materi tidak melanggar hak cipta atau merek pihak lain.</p>
                </li>
                <li>
                  <h3>Bebas Tuntutan ke Percetakan</h3>
                  <p>Lanyard Palembang tidak bertanggung jawab atas klaim pihak ketiga terkait materi yang Anda berikan.</p>
                </li>
                <li>
                  <h3>Desain Buatan Tim</h3>
                  <p>Desain yang kami buat menjadi hak milik Anda setelah transaksi lunas. Kami tidak mempublikasikannya tanpa izin.</p>
                </li>
              </ul>
            </div>
          </article>

          <article class="legal-article" id="persetujuan-mockup">
            <span class="legal-article__number" aria-hidden="true">03</span>
            <div>
              <h2>Persetujuan Mockup</h2>
              <div class="legal-note">
                <p>Mockup yang Anda setujui adalah acuan produksi final. Periksa ejaan, posisi logo, warna, dan tata letak sebelum memberi ACC.</p>
              </div>
              <ul class="legal-list">
                <li><p>Tim kami mengirim mockup final via WhatsApp atau email. Anda dapat meminta revisi minor (maks. 2x) sebelum ACC.</p></li>
                <li><p>Kesalahan ejaan, penempatan, atau elemen desain yang sudah Anda setujui bukan menjadi tanggungan produksi.</p></li>
                <li><p>Setelah ACC, pesanan langsung masuk antrean cetak. Pembatalan tidak lagi dapat dilakukan.</p></li>
              </ul>
            </div>
          </article>

          <article class="legal-article" id="produksi-toleransi">
            <span class="legal-article__number" aria-hidden="true">04</span>
            <div>
              <h2>Produksi &amp; Toleransi</h2>
              <p>Produksi memakai cetak sublimasi digital dan rakitan yang sebagian manual; toleransi wajar diinformasikan sejak awal.</p>
              <ul class="legal-check-list">
                <li>
                  <h3>Toleransi Warna 5–10%</h3>
                  <p>Perbedaan tampilan RGB di layar monitor dengan hasil cetak pada kain sublimasi adalah hal normal.</p>
                </li>
                <li>
                  <h3>Jahitan &amp; Potong 1–2 mm</h3>
                  <p>Pergeseran minor pada proses potong dan jahit masuk batas standar industri tekstil.</p>
                </li>
                <li>
                  <h3>Estimasi Setelah ACC + DP</h3>
                  <p>Waktu produksi dihitung sejak mockup disetujui dan DP kami terima, bukan dari chat pertama.</p>
                </li>
              </ul>
            </div>
          </article>

          <article class="legal-article" id="pembayaran">
            <span class="legal-article__number" aria-hidden="true">05</span>
            <div>
              <h2>Pembayaran</h2>
              <ul class="legal-list">
                <li><p>Uang muka (DP) minimal 50% dari nilai invoice. Produksi diproses setelah DP kami terima.</p></li>
                <li><p>Pelunasan dilakukan sebelum paket dikirim atau diambil dari workshop. Tim dapat mengirim foto/video produk jadi sebagai bukti.</p></li>
                <li><p>Pembayaran hanya melalui rekening resmi yang tercantum pada invoice. Kami tidak menerima transfer ke rekening atas nama pribadi di luar invoice.</p></li>
              </ul>
            </div>
          </article>

          <article class="legal-article" id="ketentuan-pengiriman">
            <span class="legal-article__number" aria-hidden="true">06</span>
            <div>
              <h2>Pengiriman</h2>
              <p>Pesanan kami serahkan ke ekspedisi setelah proses cetak, quality control, pengemasan, dan pelunasan selesai. Nomor resi akan dibagikan via WhatsApp segera setelah paket keluar dari workshop.</p>
              <p class="legal-article__footnote">Detail ongkos kirim, estimasi waktu tiba, dan pilihan ekspedisi tersedia di halaman <a class="legal-inline-link" href="{{ route('shipping') }}">Informasi Pengiriman</a>.</p>
            </div>
          </article>

          <article class="legal-article" id="pembatalan-garansi">
            <span class="legal-article__number" aria-hidden="true">07</span>
            <div>
              <h2>Pembatalan &amp; Garansi</h2>
              <div class="legal-note">
                <p>Pesanan yang sudah masuk tahap produksi tidak dapat dibatalkan. Kain yang sudah dicetak/dipotong menjadi tanggungan pemesan.</p>
              </div>
              <ul class="legal-check-list">
                <li>
                  <h3>Cacat Produksi Dijamin</h3>
                  <p>Hasil cetak pudar, jahitan terlepas, atau aksesoris rusak yang ditemukan saat unboxing akan diganti tanpa biaya.</p>
                </li>
                <li>
                  <h3>Batas Klaim 3×24 Jam</h3>
                  <p>Sejak status resi ekspedisi menunjukkan paket telah diterima di alamat Anda.</p>
                </li>
                <li>
                  <h3>Bukti Unboxing Wajib</h3>
                  <p>Foto atau video pendek kondisi paket saat unboxing dikirim via WhatsApp resmi kami.</p>
                </li>
              </ul>
              <p class="legal-article__footnote">Detail lengkap tersedia di halaman <a class="legal-inline-link" href="{{ route('warranty') }}">Garansi &amp; Jaminan Kualitas</a>.</p>
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
  @include('components.schema.terms')
@endpush
@endsection
