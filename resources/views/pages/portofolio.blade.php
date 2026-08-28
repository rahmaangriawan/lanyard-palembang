@extends('layouts.public')

@section('title', 'Portofolio Lanyard Custom | Hasil Produksi Lanyard Palembang')
@section('meta_description', 'Lihat kumpulan hasil produksi tali lanyard custom Lanyard Palembang untuk perusahaan, BUMN, instansi pemerintah, universitas, event, dan komunitas di Indonesia.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/portofolio')
@section('seo_og_image', '/uploads/portfolio-home-corporate.webp')

@push('head')
  <link rel="stylesheet" href="/css/portfolio-page.css?v={{ file_exists(public_path('css/portfolio-page.css')) ? filemtime(public_path('css/portfolio-page.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@push('schema')
  @include('components.schema.portfolio', ['portfolios' => $portfolios])
@endpush

@section('content')
@php
  use App\Support\AssetUrl;

  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau konsultasi pembuatan lanyard custom.');

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
  {{-- 1. HERO SECTION --}}
  <section class="portfolio-hero" id="portfolio-hero" aria-labelledby="portfolio-title">
    <div class="home-shell home-shell--wide portfolio-hero__container">
      <div class="portfolio-hero__header">
        <div class="portfolio-hero__eyebrow-wrap">
          <span class="portfolio-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="portfolio-hero__eyebrow">BUKTI KUALITAS &amp; KARYA TERPILIH</span>
        </div>

        <h1 id="portfolio-title" class="portfolio-hero__title">
          Koleksi Hasil Cetak Lanyard Presisi untuk <span class="portfolio-hero__title-accent">Brand &amp; Instansi Terkemuka.</span>
        </h1>

        <p class="portfolio-hero__desc">
          Eksplorasi ragam hasil produksi tali lanyard printing sublimasi full color, polyester tebal, dan perlengkapan ID card yang telah dipercaya oleh berbagai perusahaan BUMN, kementerian, universitas, dan event nasional.
        </p>

        {{-- Live Highlights Metric Pills --}}
        <div class="portfolio-hero__pills">
          <span class="portfolio-hero__pill">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <strong>100+ Klien Nasional &amp; BUMN</strong>
          </span>
          <span class="portfolio-hero__pill">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <strong>Presisi Warna 98% CMYK</strong>
          </span>
          <span class="portfolio-hero__pill">
            <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
            <strong>Kapasitas Kilat 1–3 Hari</strong>
          </span>
        </div>
      </div>
    </div>
  </section>

  {{-- 2. GALLERY SECTION DENGAN FILTER TABS --}}
  <section class="portfolio-gallery" id="portfolio-gallery" aria-labelledby="gallery-title">
    <div class="home-shell home-shell--wide">
      <h2 id="gallery-title" class="sr-only">Daftar Karya Portofolio Lanyard Palembang</h2>

      {{-- Category Filter Pills --}}
      <nav class="portfolio-filters" id="portfolio-filter-nav" aria-label="Filter kategori portofolio">
        @foreach($categories as $cat)
          <button
            type="button"
            class="portfolio-filter-btn {{ $cat['key'] === 'all' ? 'is-active' : '' }}"
            data-filter="{{ $cat['key'] }}"
            aria-pressed="{{ $cat['key'] === 'all' ? 'true' : 'false' }}"
          >
            <span>{{ $cat['label'] }}</span>
          </button>
        @endforeach
      </nav>

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
              $image = AssetUrl::relative($item->imageUrl) ?: '/uploads/portfolio-home-corporate.webp';
              $itemWaUrl = 'https://wa.me/6282210200700?text=' . rawurlencode("Halo Lanyard Palembang, saya tertarik dengan portofolio lanyard model: {$item->title}. Mohon info estimasi harga dan spesifikasinya.");
            @endphp
            <article class="portfolio-card" data-category="{{ $categoryKey }}" role="listitem">
              <div class="portfolio-card__thumb">
                <img
                  src="{{ $image }}"
                  alt="{{ $item->title }} - Portofolio Lanyard Custom Lanyard Palembang"
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
                    class="portfolio-card__btn"
                  >
                    <span>Konsultasi Desain Serupa</span>
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

  {{-- 3. CLIENT TRUST GRID --}}
  <section class="portfolio-clients" id="portfolio-clients" aria-labelledby="clients-title">
    <div class="home-shell home-shell--wide">
      <header class="portfolio-clients__header">
        <p class="portfolio-clients__eyebrow">KOLABORASI &amp; REPUTASI</p>
        <h2 id="clients-title" class="portfolio-clients__title">Dipercaya oleh Ratusan Instansi &amp; Korporasi</h2>
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

  {{-- 4. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')

{{-- Vanilla JS Filter Script --}}
@push('scripts')
<script>
  (function () {
    const filterNav = document.getElementById('portfolio-filter-nav');
    const grid = document.getElementById('portfolio-grid');
    if (!filterNav || !grid) return;

    const filterBtns = filterNav.querySelectorAll('.portfolio-filter-btn');
    const cards = grid.querySelectorAll('.portfolio-card');

    filterBtns.forEach(btn => {
      btn.addEventListener('click', function () {
        const filterValue = this.getAttribute('data-filter');

        // Update active button state
        filterBtns.forEach(b => {
          b.classList.remove('is-active');
          b.setAttribute('aria-pressed', 'false');
        });
        this.classList.add('is-active');
        this.setAttribute('aria-pressed', 'true');

        // Filter cards
        cards.forEach(card => {
          const cardCategory = card.getAttribute('data-category');
          if (filterValue === 'all' || cardCategory === filterValue) {
            card.style.display = 'flex';
          } else {
            card.style.display = 'none';
          }
        });
      });
    });
  })();
</script>
@endpush
@endsection
