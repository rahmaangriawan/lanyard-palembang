@extends('layouts.public')

@section('title', 'Portofolio Lanyard Custom | Hasil Produksi Lanyard Medan')
@section('meta_description', 'Lihat kumpulan hasil produksi tali lanyard custom Lanyard Medan untuk perusahaan, BUMN, instansi pemerintah, universitas, event, dan komunitas di Indonesia.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/portofolio')
@section('seo_og_image', '/uploads/portfolio-home-corporate.webp')

@push('head')
  <link rel="stylesheet" href="/css/portfolio-page.css?v={{ file_exists(public_path('css/portfolio-page.css')) ? filemtime(public_path('css/portfolio-page.css')) : 1 }}">
@endpush

@push('schema')
  @include('components.schema.portfolio', ['portfolios' => $portfolios])
@endpush

@section('content')
@php
  use App\Support\AssetUrl;

  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya mau konsultasi pembuatan lanyard custom.');

  // Helper untuk menentukan kategori item portofolio berdasarkan judul/deskripsi
  $categorize = function ($item) {
    $text = strtolower(($item->title ?? '') . ' ' . ($item->description ?? '') . ' ' . ($item->logoText ?? ''));
    if (str_contains($text, 'bank') || str_contains($text, 'telkomsel') || str_contains($text, 'bca') || str_contains($text, 'corporate') || str_contains($text, 'perusahaan') || str_contains($text, 'bumn')) {
      return 'corporate';
    }
    if (str_contains($text, 'kemenkes') || str_contains($text, 'pemerintah') || str_contains($text, 'dinas') || str_contains($text, 'kementerian') || str_contains($text, 'instansi')) {
      return 'instansi';
    }
    if (str_contains($text, 'universitas') || str_contains($text, 'ugm') || str_contains($text, 'kampus') || str_contains($text, 'sekolah') || str_contains($text, 'ui')) {
      return 'kampus';
    }
    return 'komunitas';
  };

  // Helper untuk logo SVG/PNG klien jika tersedia
  $clientLogo = function ($item) {
    $text = strtolower(($item->title ?? '') . ' ' . ($item->logoText ?? ''));
    if (str_contains($text, 'bank indonesia') || str_contains($text, 'bi')) return '/images/logos/bank-indonesia.svg';
    if (str_contains($text, 'telkomsel')) return '/images/logos/telkomsel.svg';
    if (str_contains($text, 'kemenkes')) return '/images/logos/kemenkes.svg';
    if (str_contains($text, 'universitas indonesia') || str_contains($text, 'ui')) return '/images/logos/universitas-indonesia.png';
    if (str_contains($text, 'bca')) return '/images/logos/bca.svg';
    if (str_contains($text, 'biznet')) return '/images/logos/biznet.svg';
    if (str_contains($text, 'bumn')) return '/images/logos/bumn.svg';
    if (str_contains($text, 'komdigi')) return '/images/logos/komdigi.svg';
    return null;
  };

  $categories = [
    ['key' => 'all', 'label' => 'Semua Karya'],
    ['key' => 'corporate', 'label' => 'Perusahaan & BUMN'],
    ['key' => 'instansi', 'label' => 'Instansi Pemerintah'],
    ['key' => 'kampus', 'label' => 'Universitas & Kampus'],
    ['key' => 'komunitas', 'label' => 'Komunitas & Event'],
  ];

  $trustLogos = [
    ['name' => 'Bank Indonesia', 'src' => '/images/logos/bank-indonesia.svg'],
    ['name' => 'Telkomsel', 'src' => '/images/logos/telkomsel.svg'],
    ['name' => 'Kemenkes RI', 'src' => '/images/logos/kemenkes.svg'],
    ['name' => 'BCA', 'src' => '/images/logos/bca.svg'],
    ['name' => 'Universitas Indonesia', 'src' => '/images/logos/universitas-indonesia.png'],
    ['name' => 'Kementerian Komdigi', 'src' => '/images/logos/komdigi.svg'],
    ['name' => 'BUMN', 'src' => '/images/logos/bumn.svg'],
    ['name' => 'Biznet', 'src' => '/images/logos/biznet.svg'],
  ];
@endphp

<div class="portfolio-page">
  {{-- Hero Section --}}
  <section class="portfolio-hero" id="portfolio-hero" aria-labelledby="portfolio-title">
    <div class="home-shell home-shell--wide portfolio-hero__container">
      <div class="portfolio-hero__header">
        <div class="portfolio-hero__eyebrow-wrap">
          <span class="portfolio-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="portfolio-hero__eyebrow">PORTOFOLIO & KARYA TERPILIH</span>
        </div>

        <h1 id="portfolio-title" class="portfolio-hero__title">
          Koleksi Lanyard Custom untuk <span class="portfolio-hero__title-accent">Berbagai Karakter Brand.</span>
        </h1>

        <p class="portfolio-hero__desc">
          Kumpulan hasil produksi tali lanyard printing berkualitas tinggi untuk kebutuhan identitas kantor, seminar, pameran, instansi, dan universitas di seluruh Indonesia.
        </p>

        {{-- Live Highlights Metric Pills --}}
        <div class="portfolio-hero__pills">
          <span class="portfolio-hero__pill">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <strong>{{ $portfolios->count() }}+ Karya Unggulan</strong>
          </span>
          <span class="portfolio-hero__pill">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <strong>100+ Klien Nasional & BUMN</strong>
          </span>
          <span class="portfolio-hero__pill">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <strong>100% Garansi Kualitas Cetak</strong>
          </span>
        </div>
      </div>
    </div>
  </section>

  {{-- Gallery Section --}}
  <section class="portfolio-gallery" id="portfolio-gallery" aria-labelledby="gallery-title">
    <div class="home-shell home-shell--wide">
      <h2 id="gallery-title" class="sr-only">Daftar Karya Portofolio Lanyard Medan</h2>

      {{-- Grid 3 Kolom Simetris --}}
      @if($portfolios->isNotEmpty())
        <div class="portfolio-grid" id="portfolio-grid" role="list">
          @foreach($portfolios as $item)
            @php
              $categoryKey = $categorize($item);
              $categoryName = match($categoryKey) {
                'corporate' => 'Perusahaan & BUMN',
                'instansi' => 'Instansi Pemerintah',
                'kampus' => 'Universitas & Kampus',
                default => 'Komunitas & Event',
              };
              $logoPath = $clientLogo($item) ?: ($item->logoUrl ? AssetUrl::relative($item->logoUrl) : null);
              $image = AssetUrl::relative($item->imageUrl) ?: '/uploads/portfolio-home-corporate.webp';
              $itemWaUrl = 'https://wa.me/6282210200700?text=' . rawurlencode("Halo Lanyard Medan, saya tertarik dengan portofolio lanyard model: {$item->title}. Mohon info estimasi harga dan spesifikasinya.");
            @endphp
            <article class="portfolio-card" data-category="{{ $categoryKey }}" role="listitem">
              <div class="portfolio-card__thumb">
                <img
                  src="{{ $image }}"
                  alt="{{ $item->title }} - Portofolio Lanyard Custom Lanyard Medan"
                  width="720"
                  height="540"
                  loading="lazy"
                  decoding="async"
                >
                <span class="portfolio-card__category-badge">{{ $categoryName }}</span>
              </div>

              <div class="portfolio-card__body">
                <h3 class="portfolio-card__title">{{ $item->title }}</h3>
                <p class="portfolio-card__desc">{{ $item->description }}</p>

                <div class="portfolio-card__footer">
                  <a
                    href="{{ $itemWaUrl }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="portfolio-card__btn ptl-button-motion"
                    data-button-motion
                  >
                    <span data-button-label>Konsultasi Desain Serupa</span>
                    <span class="portfolio-card__btn-arrow" aria-hidden="true">→</span>
                  </a>
                </div>
              </div>
            </article>
          @endforeach
        </div>
      @else
        <div class="portfolio-empty">
          <div class="portfolio-empty__icon">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
          </div>
          <h3>Koleksi Portofolio Baru Segera Hadir</h3>
          <p>Kami sedang menyiapkan pembaruan dokumentasi karya lanyard custom terbaru untuk ditampilkan.</p>
          <a class="ordering-btn ordering-btn--primary" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span>Mulai Konsultasi WhatsApp</span>
          </a>
        </div>
      @endif
    </div>
  </section>

  {{-- Client Trust Grid --}}
  <section class="portfolio-clients" id="portfolio-clients" aria-labelledby="clients-title">
    <div class="home-shell home-shell--wide">
      <header class="portfolio-clients__header">
        <p class="portfolio-clients__eyebrow">DIPERCAYA OLEH</p>
        <h2 id="clients-title" class="portfolio-clients__title">Klien &amp; Instansi yang Telah Bekerja Sama</h2>
      </header>

      <div class="portfolio-clients__grid">
        @foreach($trustLogos as $logo)
          <div class="portfolio-clients__item">
            <img src="{{ $logo['src'] }}" alt="Logo {{ $logo['name'] }}" loading="lazy" decoding="async">
          </div>
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
            <span class="home-cta__eyebrow">WUJUDKAN IDENTITAS BRAND ANDA</span>
          </div>

          <h2 id="home-cta-title" class="home-cta__title">
            Ingin Buat Lanyard Seperti Milik Klien Kami <span class="home-cta__title-accent">Sekarang?</span>
          </h2>

          <p class="home-cta__desc">
            Konsultasi desain gratis, produksi cepat 1–3 hari, garansi anti luntur, dan gratis ongkir ke seluruh Indonesia.
          </p>

          <div class="home-cta__buttons">
            <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
              </span>
              <span data-button-label>Chat WhatsApp Sekarang</span>
              <span class="home-cta__btn-arrow" aria-hidden="true">→</span>
            </a>

            <a class="home-cta__btn home-cta__btn--secondary ptl-button-motion" href="/#kalkulator-harga" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                  <line x1="16" y1="2" x2="16" y2="6"/>
                  <line x1="8" y1="2" x2="8" y2="6"/>
                  <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
              </span>
              <span data-button-label>Cek Estimasi Harga</span>
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
@endsection
