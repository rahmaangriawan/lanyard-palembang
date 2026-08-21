@extends('layouts.public')

@section('title', 'Alur & Cara Pemesanan Tali Lanyard Custom | Lanyard Medan')
@section('meta_description', 'Panduan lengkap cara pesan tali lanyard custom di Lanyard Medan: konsultasi kebutuhan, approval mockup digital gratis, produksi kilat 1–3 hari, dan pengiriman aman bergaransi.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/cara-pemesanan')
@section('seo_og_image', '/uploads/hero-cara-pemesanan-lanyard.webp')

@push('head')
  <link rel="stylesheet" href="/css/ordering-index.css?v={{ file_exists(public_path('css/ordering-index.css')) ? filemtime(public_path('css/ordering-index.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya ingin konsultasi alur pemesanan tali lanyard custom.');

  $trustItems = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>',
      'title' => 'Konsultasi 1-on-1',
      'description' => 'Pendampingan pemilihan bahan & ukuran',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
      'title' => 'Mockup Digital Gratis',
      'description' => 'Preview layout visual sebelum naik cetak',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'title' => 'Garansi Kualitas QC',
      'description' => 'Pengecekan fisik teliti sebelum dikemas',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
      'title' => 'Ekspedisi Terpantau',
      'description' => 'Resi resmi langsung dibagikan via WhatsApp',
    ],
  ];

  $orderSteps = [
    [
      'num' => '01',
      'title' => 'Diskusikan Rencana & Kebutuhan Event',
      'description' => 'Sampaikan konsep kegiatan Anda, perkiraan kuantitas (mulai dari 50 pcs hingga ribuan), serta target deadline acara kepada tim sales kami.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>',
    ],
    [
      'num' => '02',
      'title' => 'Pilih Karakter Bahan & Aksesoris',
      'description' => 'Tentukan tekstur bahan (Polyester Tissue halus atau Nylon tebal), lebar tali yang diinginkan (1.5 cm / 2 cm / 2.5 cm), serta kelengkapan kait hook dan safety buckle stopper.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>',
    ],
    [
      'num' => '03',
      'title' => 'Serahkan File Logo & Panduan Warna Brand',
      'description' => 'Kirimkan master logo (format AI, PDF, CDR, atau PNG transparan) beserta kode warna brand agar hasil cetakan warna seragam dengan identitas resmi instansi Anda.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M8 14s1.5 2 4 2 4-2 4-2"/><line x1="9" y1="9" x2="9.01" y2="9"/><line x1="15" y1="9" x2="15.01" y2="9"/></svg>',
    ],
    [
      'num' => '04',
      'title' => 'Persetujuan Mockup Digital & Invoice Transparan',
      'description' => 'Desainer kami menyiapkan visual preview 3D cetak bolak-balik untuk di-review. Setelah desain cocok, kami terbitkan quotation resmi tanpa biaya tersembunyi.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    ],
    [
      'num' => '05',
      'title' => 'Konfirmasi DP & Masuk Antrean Cetak',
      'description' => 'Lakukan konfirmasi pembayaran uang muka (DP) melalui rekening resmi perusahaan kami untuk memulai proses produksi cetak massal secara terencana.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"/><line x1="1" y1="10" x2="23" y2="10"/></svg>',
    ],
    [
      'num' => '06',
      'title' => 'Produksi Kilat, Quality Control, & Kirim Resi',
      'description' => 'Mesin sublimasi modern mencetak pesanan Anda dalam 1–3 hari kerja. Tiap lanyard di-packing steril per ikat dan dikirimkan dengan nomor resi aktif.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    ],
  ];

  $preparationItems = [
    'Estimasi kuantitas pesanan (minimal 50 pcs / order partai)',
    'Lebar tali pilihan (1.5 cm / 2.0 cm / 2.5 cm)',
    'File master logo resolusi tinggi (PNG / PDF / AI / CDR)',
    'Target tanggal lanyard harus tiba di lokasi',
    'Alamat lengkap pengiriman untuk pengecekan ekspedisi tercepat',
  ];

  $orderFaqs = config('seo.faq', []);
@endphp

<div class="ordering-page">
  {{-- Hero Section --}}
  <section class="ordering-hero" id="ordering-hero" aria-labelledby="ordering-title">
    <div class="home-shell home-shell--wide ordering-hero__container">
      <div class="ordering-hero__content">
        <div class="ordering-hero__eyebrow-wrap">
          <span class="ordering-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="ordering-hero__eyebrow">PANDUAN PEMESANAN PRAKTIS</span>
        </div>

        <h1 id="ordering-title" class="ordering-hero__title">
          Tahapan Pesan Lanyard Custom yang <span class="ordering-hero__title-accent">Jelas &amp; Transparan.</span>
        </h1>

        <p class="ordering-hero__desc">
          Kami memandu setiap proses dari konsultasi desain awal, pemilihan bahan lanyard terbaik, produksi kilat 1–3 hari, hingga paket pesanan mendarat aman di meja kantor Anda.
        </p>

        <div class="ordering-hero__actions">
          <a class="ordering-btn ordering-btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="ordering-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Mulai Konsultasi Desain</span>
            <span class="ordering-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="ordering-btn ordering-btn--secondary ptl-button-motion" href="{{ route('products.index') }}" data-button-motion>
            <span data-button-label>Eksplor Pilihan Produk</span>
            <span class="ordering-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="ordering-hero__visual">
        <div class="ordering-hero__image-card">
          <img
            src="/uploads/hero-cara-pemesanan-lanyard.webp"
            alt="Proses pemesanan tali lanyard custom Lanyard Medan dengan standar kualitas tinggi"
            width="1448"
            height="1086"
            loading="eager"
            fetchpriority="high"
            decoding="async"
          >
        </div>
      </div>
    </div>
  </section>

  {{-- Trust & Jaminan Proses Bar --}}
  <section class="ordering-facts" id="ordering-trust" aria-label="Kepastian proses pemesanan Lanyard Medan">
    <div class="home-shell home-shell--wide">
      <ul class="ordering-facts__grid">
        @foreach($trustItems as $item)
          <li class="ordering-facts__item">
            <div class="ordering-facts__icon" aria-hidden="true">
              {!! $item['icon'] !!}
            </div>
            <div class="ordering-facts__text">
              <strong>{{ $item['title'] }}</strong>
              <small>{{ $item['description'] }}</small>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </section>

  {{-- Main Alur 6 Tahap Pemesanan --}}
  <section class="ordering-process" id="ordering-process" aria-labelledby="ordering-process-title">
    <div class="home-shell home-shell--wide">
      <header class="ordering-process__intro">
        <p class="ordering-process__eyebrow">WORKFLOW PRODUKSI</p>
        <h2 id="ordering-process-title" class="ordering-process__title">
          6 Langkah Sederhana Menuju Lanyard Berkualitas
        </h2>
        <p class="ordering-process__lead">
          Setiap detail logo, ketajaman warna, dan spesifikasi aksesoris divalidasi bersama Anda sebelum mesin cetak beroperasi demi hasil akhir yang sempurna.
        </p>
      </header>

      <div class="ordering-process__layout">
        {{-- Sisi Kiri: Sticky Preparation Guide Card --}}
        <aside class="ordering-prep-card" aria-labelledby="ordering-prep-title">
          <div class="ordering-prep-card__header">
            <span class="ordering-prep-card__tag">CHECKLIST PERSIAPAN</span>
            <h3 id="ordering-prep-title">Hal yang Perlu Disiapkan</h3>
            <p>Agar proses approval dan penawaran harga berjalan super cepat, siapkan rincian singkat berikut sebelum menghubungi kami:</p>
          </div>

          <ul class="ordering-prep-card__list">
            @foreach($preparationItems as $item)
              <li>
                <span class="ordering-prep-card__check" aria-hidden="true">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                </span>
                <span>{{ $item }}</span>
              </li>
            @endforeach
          </ul>

          <a class="ordering-prep-card__btn ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="ordering-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Kirim Rincian via WhatsApp</span>
            <span class="ordering-btn__arrow" aria-hidden="true">→</span>
          </a>
        </aside>

        {{-- Sisi Kanan: 6 Steps List --}}
        <div class="ordering-steps" role="list">
          @foreach($orderSteps as $step)
            <article class="ordering-step-card" role="listitem">
              <div class="ordering-step-card__meta">
                <span class="ordering-step-card__num">{{ $step['num'] }}</span>
                <div class="ordering-step-card__icon" aria-hidden="true">
                  {!! $step['icon'] !!}
                </div>
              </div>
              <div class="ordering-step-card__body">
                <h3 class="ordering-step-card__title">{{ $step['title'] }}</h3>
                <p class="ordering-step-card__desc">{{ $step['description'] }}</p>
              </div>
            </article>
          @endforeach
        </div>
      </div>
    </div>
  </section>

  {{-- FAQ Section --}}
  <section class="ordering-faq" id="ordering-faq" aria-labelledby="ordering-faq-title">
    <div class="home-shell home-shell--wide ordering-faq__container">
      <header class="ordering-faq__intro">
        <p class="ordering-faq__eyebrow">TANYA JAWAB CEPAT</p>
        <h2 id="ordering-faq-title" class="ordering-faq__title">Hal yang Sering Ditanyakan Calon Pemesan</h2>
        <p class="ordering-faq__lead">Informasi praktis seputar fleksibilitas jumlah order, pembuatan sampel, dan ketepatan jadwal produksi.</p>
      </header>

      <div class="ordering-faq__list">
        @foreach($orderFaqs as $faq)
          <details class="ordering-faq__item">
            <summary class="ordering-faq__summary">
              <span>{{ $faq['question'] }}</span>
              <span class="ordering-faq__chevron" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
              </span>
            </summary>
            <div class="ordering-faq__content">
              <p>{{ $faq['answer'] }}</p>
            </div>
          </details>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Closing CTA Card --}}
  <section class="home-cta" id="cta-section" aria-labelledby="home-cta-title">
    <div class="home-shell home-shell--wide">
      <div class="home-cta__card">
        <div class="home-cta__content">
          <div class="home-cta__eyebrow-wrap">
            <span class="home-cta__sparkle-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
            </span>
            <span class="home-cta__eyebrow">KONSULTASI MUDAH &amp; RESPONSIF</span>
          </div>

          <h2 id="home-cta-title" class="home-cta__title">
            Siap Mewujudkan Lanyard Brand Anda <span class="home-cta__title-accent">Sekarang?</span>
          </h2>

          <p class="home-cta__desc">
            Kirimkan ide desain atau logo instansi Anda hari ini. Tim spesialis Lanyard Medan akan merespons cepat dengan penawaran harga terbaik dan sampel layout gratis.
          </p>

          <div class="home-cta__buttons">
            <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
              </span>
              <span data-button-label>Hubungi Tim via WhatsApp</span>
              <span class="home-cta__btn-arrow" aria-hidden="true">→</span>
            </a>

            <a class="home-cta__btn home-cta__btn--secondary ptl-button-motion" href="{{ route('products.index') }}" data-button-motion>
              <span data-button-label>Lihat Katalog Produk</span>
              <span class="home-cta__btn-arrow" aria-hidden="true">→</span>
            </a>
          </div>

          <div class="home-cta__benefits">
            <div class="home-cta__benefit-item">
              <span class="home-cta__check-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
              </span>
              <span>Desain Gratis</span>
            </div>
            <span class="home-cta__benefit-divider" aria-hidden="true"></span>

            <div class="home-cta__benefit-item">
              <span class="home-cta__check-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
              </span>
              <span>Produksi Cepat 1–3 Hari</span>
            </div>
            <span class="home-cta__benefit-divider" aria-hidden="true"></span>

            <div class="home-cta__benefit-item">
              <span class="home-cta__check-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
              </span>
              <span>Bahan Premium</span>
            </div>
          </div>
        </div>

        <div class="home-cta__visual">
          <img
            class="home-cta__img"
            src="/uploads/home-cta-banner.webp"
            alt="Lanyard custom berkualitas tinggi Lanyard Medan"
            width="800"
            height="600"
            loading="lazy"
            decoding="async"
          >
        </div>
      </div>
    </div>
  </section>
</div>

@include('components.footer')

@push('schema')
  @include('components.schema.ordering', ['orderSteps' => $orderSteps, 'orderFaqs' => $orderFaqs])
@endpush
@endsection
