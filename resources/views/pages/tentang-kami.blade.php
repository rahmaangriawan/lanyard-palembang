@extends('layouts.public')

@section('title', 'Tentang Lanyard Medan | Pabrik Lanyard Custom di Medan')
@section('meta_description', 'Kenali workshop Lanyard Medan, pabrik tali lanyard custom untuk kantor, event, sekolah, dan komunitas di seluruh Indonesia. Proses produksi 1-3 hari, minimum order 50 pcs, desain gratis.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/tentang-kami')
@section('seo_og_image', '/uploads/tentang-lanyard.webp')

@push('head')
  <link rel="stylesheet" href="/css/about-page.css?v={{ file_exists(public_path('css/about-page.css')) ? filemtime(public_path('css/about-page.css')) : 1 }}">
@endpush

@section('content')
@php
  $aboutWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya ingin berdiskusi tentang pemesanan lanyard custom.');

  $processSteps = [
    [
      'num' => '01',
      'title' => 'Konsultasi Desain Gratis',
      'description' => 'Ceritakan kebutuhan Anda via WhatsApp: jumlah, bahan, dan referensi desain. Tim kami memberi masukan material dan layout dalam satu hari kerja.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>',
    ],
    [
      'num' => '02',
      'title' => 'Mockup Digital & Persetujuan',
      'description' => 'Desainer kami mengirim preview visual dengan posisi logo, warna, dan ukuran tali. Produksi baru kami mulai setelah Anda menyetujui file akhir.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>',
    ],
    [
      'num' => '03',
      'title' => 'Cetak & Quality Control',
      'description' => 'Tali dicetak dengan mesin sublimasi dan press panas, lalu melewati pengecekan jahitan, warna, dan aksesoris sebelum dikemas rapi.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
    ],
    [
      'num' => '04',
      'title' => 'Pengiriman ke Alamat Anda',
      'description' => 'Paket dikemas rapi dan dikirim lewat ekspedisi terpercaya ke seluruh Indonesia. Nomor resi kami kirim begitu paket keluar dari workshop.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    ],
  ];

  $commitments = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
      'title' => 'Respon 1x24 Jam Kerja',
      'description' => 'Setiap pesan WhatsApp dibalas oleh staf, bukan bot, dalam satu hari kerja. Estimasi harga dan jadwal produksi dikirim lengkap di pesan pertama.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'title' => 'Garansi Cetak Ulang',
      'description' => 'Tali yang mengalami cacat cetak, jahitan lepas, atau kuantitas kurang akan kami cetak ulang tanpa biaya tambahan. Prosedur lengkap di halaman Garansi.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h18M3 12h18M3 17h12"/></svg>',
      'title' => 'Minimum Order 50 Pcs',
      'description' => 'Anda bisa pesan mulai 50 pcs untuk uji coba event kecil, hingga ribuan pcs untuk kebutuhan korporat. Tidak ada biaya desain untuk pesanan apapun.',
    ],
  ];
@endphp

<div class="about-page">
  {{-- 1. Hero --}}
  <section class="about-hero" id="about-hero" aria-labelledby="about-title">
    <div class="home-shell home-shell--wide about-hero__container">
      <div class="about-hero__content">
        <div class="about-hero__eyebrow-wrap">
          <span class="about-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="about-hero__eyebrow">TENTANG LANYARD MEDAN</span>
        </div>

        <h1 id="about-title" class="about-hero__title">
          Pabrik Lanyard Custom di <span class="about-hero__title-accent">Medan untuk Seluruh Indonesia.</span>
        </h1>

        <p class="about-hero__desc">
          Kami memproduksi tali lanyard custom untuk kantor, event, sekolah, dan komunitas. Mulai dari 50 pcs, desain gratis, dan siap kirim ke alamat Anda.
        </p>

        <div class="about-hero__actions">
          <a class="about-btn about-btn--primary ptl-button-motion" href="{{ $aboutWhatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="about-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Diskusikan Desain via WhatsApp</span>
          </a>

          <a class="about-btn about-btn--secondary ptl-button-motion" href="{{ route('ordering') }}" data-button-motion>
            <span data-button-label>Lihat Alur Pemesanan</span>
          </a>
        </div>
      </div>

      <div class="about-hero__visual">
        <div class="about-hero__image-card">
          <picture>
            <source srcset="/uploads/tentang-lanyard-1280w.webp 1280w, /uploads/tentang-lanyard-960w.webp 960w, /uploads/tentang-lanyard-640w.webp 640w, /uploads/tentang-lanyard-320w.webp 320w" sizes="(max-width: 767px) 100vw, 560px" type="image/webp">
            <img
              src="/uploads/tentang-lanyard.webp"
              alt="Berbagai tali lanyard custom hasil produksi Lanyard Medan"
              width="1000"
              height="1080"
              loading="eager"
              fetchpriority="high"
              decoding="async"
            >
          </picture>
        </div>
      </div>
    </div>
  </section>

  {{-- 2. Cerita Singkat --}}
  <section class="about-story" aria-labelledby="story-title">
    <div class="home-shell home-shell--wide about-story__container">
      <div class="about-story__copy">
        <p class="about-section-eyebrow">CERITA SINGKAT</p>
        <h2 id="story-title" class="about-section-title">Mulai dari Satu Pesanan, Kami Pertahankan Detailnya</h2>
        <p class="about-story__lead">
          Lanyard Medan berdiri sebagai workshop kecil di Kota Medan yang melayani pesanan tali lanyard untuk event kampus. Seiring waktu, klien kami bertambah dari perkantoran, sekolah, komunitas, hingga event organizer di luar Sumatera.
        </p>
        <p class="about-story__body">
          Yang kami jaga sampai sekarang tetap sama: setiap tali melewati satu tim yang sama dari konsultasi sampai quality control. Tidak ada bagian produksi yang dilepas ke pihak ketiga.
        </p>
      </div>

      <aside class="about-story__panel" aria-label="Kebijakan operasional workshop Lanyard Medan">
        <div class="about-story__panel-row">
          <span class="about-story__panel-num">100%</span>
          <span class="about-story__panel-label">Produksi di workshop kami sendiri, bukan di lepas ke maklon</span>
        </div>
        <div class="about-story__panel-row">
          <span class="about-story__panel-num">1x24 jam</span>
          <span class="about-story__panel-label">Waktu respon rata-rata untuk konsultasi dan penawaran harga</span>
        </div>
        <div class="about-story__panel-row">
          <span class="about-story__panel-num">50 pcs</span>
          <span class="about-story__panel-label">Minimum pemesanan, cocok untuk uji coba event kecil</span>
        </div>
        <p class="about-story__panel-note">
          Angka di atas adalah kebijakan internal kami yang berlaku saat ini, bukan klaim pemasaran. Hubungi tim untuk konfirmasi pesanan spesifik.
        </p>
      </aside>
    </div>
  </section>

  {{-- 3. Proses Pemesanan --}}
  <section class="about-process" aria-labelledby="process-title">
    <div class="home-shell home-shell--wide">
      <header class="about-section-intro">
        <p class="about-section-eyebrow">PROSES PEMESANAN</p>
        <h2 id="process-title" class="about-section-title">Empat Langkah dari Chat Pertama sampai Paket Tiba</h2>
        <p class="about-section-lead">Tidak ada sistem yang berbelit. Anda berbicara dengan tim yang sama yang mengerjakan pesanan Anda.</p>
      </header>

      <ol class="about-process__grid" role="list">
        @foreach($processSteps as $step)
          <li class="about-step-card" role="listitem">
            <div class="about-step-card__meta">
              <span class="about-step-card__num">{{ $step['num'] }}</span>
              <span class="about-step-card__icon" aria-hidden="true">{!! $step['icon'] !!}</span>
            </div>
            <h3 class="about-step-card__title">{{ $step['title'] }}</h3>
            <p class="about-step-card__desc">{{ $step['description'] }}</p>
          </li>
        @endforeach
      </ol>
    </div>
  </section>

  {{-- 4. Komitmen Kami --}}
  <section class="about-commitments" aria-labelledby="commitments-title">
    <div class="home-shell home-shell--wide">
      <header class="about-section-intro">
        <p class="about-section-eyebrow">KOMITMEN KAMI</p>
        <h2 id="commitments-title" class="about-section-title">Tiga Hal yang Kami Jaga di Setiap Pesanan</h2>
        <p class="about-section-lead">Bukan slogan. Ini aturan kerja yang kami pegang sejak workshop pertama berdiri.</p>
      </header>

      <div class="about-commitments__grid">
        @foreach($commitments as $item)
          <article class="about-commitment-card">
            <span class="about-commitment-card__icon" aria-hidden="true">{!! $item['icon'] !!}</span>
            <h3 class="about-commitment-card__title">{{ $item['title'] }}</h3>
            <p class="about-commitment-card__desc">{{ $item['description'] }}</p>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 5. Dipercaya Klien --}}
  <section class="about-trust" aria-labelledby="trust-title">
    <div class="home-shell home-shell--wide about-trust__container">
      <div class="about-trust__copy">
        <p class="about-section-eyebrow">DIPERCAYA KLIEN</p>
        <h2 id="trust-title" class="about-section-title">Cerita Klien dari Berbagai Kota</h2>
        <p class="about-section-lead">Lihat apa yang mereka katakan tentang hasil cetakan, komunikasi, dan pengiriman kami. Halaman testimoni memuat kiriman foto dan pesan klien secara langsung.</p>
        <a class="about-btn about-btn--secondary ptl-button-motion" href="{{ route('testimonials') }}" data-button-motion>
          <span data-button-label>Baca Testimoni Klien</span>
        </a>
      </div>

      <figure class="about-trust__visual">
        <img
          src="/uploads/testimoni-lanyard.webp"
          alt="Kolase dokumentasi klien Lanyard Medan dari berbagai kota"
          width="762"
          height="246"
          loading="lazy"
          decoding="async"
        >
      </figure>
    </div>
  </section>

  {{-- 6. Closing CTA --}}
  <section class="home-cta" id="cta-section" aria-labelledby="home-cta-title">
    <div class="home-shell home-shell--wide">
      <div class="home-cta__card">
        <div class="home-cta__content">
          <div class="home-cta__eyebrow-wrap">
            <span class="home-cta__sparkle-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
            </span>
            <span class="home-cta__eyebrow">KONSULTASI GRATIS &amp; RESPONSIF</span>
          </div>

          <h2 id="home-cta-title" class="home-cta__title">
            Mulai dari Satu Pesanan, Selesai dengan Tali yang <span class="home-cta__title-accent">Siap Pakai.</span>
          </h2>

          <p class="home-cta__desc">
            Kirimkan referensi desain dan jumlah pesanan ke WhatsApp kami. Tim akan mengirim mockup dan estimasi dalam 1x24 jam kerja.
          </p>

          <div class="home-cta__buttons">
            <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $aboutWhatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
              </span>
              <span data-button-label>Diskusikan via WhatsApp</span>
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
              <span>Minimum 50 Pcs</span>
            </div>
            <span class="home-cta__benefit-divider" aria-hidden="true"></span>

            <div class="home-cta__benefit-item">
              <span class="home-cta__check-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
              </span>
              <span>Kirim ke Seluruh Indonesia</span>
            </div>
          </div>
        </div>

        <div class="home-cta__visual">
          <img
            class="home-cta__img"
            src="/uploads/home-cta-banner.webp"
            alt="Konsultasi pemesanan lanyard custom Lanyard Medan"
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
  @include('components.schema.about')
@endpush
@endsection
