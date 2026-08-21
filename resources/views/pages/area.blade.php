@extends('layouts.public')

@section('title', 'Area Layanan Cetak Lanyard Custom Medan & Nasional | Lanyard Medan')
@section('meta_description', 'Lanyard Medan melayani pesanan tali lanyard custom untuk Kota Medan, Binjai, Deli Serdang, Pematang Siantar, serta pengiriman aman ke seluruh provinsi di Indonesia.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/area')
@section('seo_og_image', '/uploads/hero-area-lanyard-medan.webp')

@push('head')
  <link rel="stylesheet" href="/css/area-page.css?v={{ file_exists(public_path('css/area-page.css')) ? filemtime(public_path('css/area-page.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya mau tanya layanan dan pengiriman lanyard custom untuk wilayah saya.');

  $pillars = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
      'title' => 'Workshop Berbasis di Medan',
      'description' => 'Produksi langsung di Kota Medan, memudahkan koordinasi cetak cepat tanpa ketergantungan antrean vendor luar pulau.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
      'title' => 'Pengiriman Cepat se-Sumut',
      'description' => 'Tersedia opsi pengiriman kurir lokal instan/Same Day untuk Medan dan kargo darat 1 hari untuk kabupaten sekitar.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>',
      'title' => 'Jangkauan Ekspedisi Nasional',
      'description' => 'Bekerja sama dengan JNE, SiCepat, J&T, dan operator kargo volume besar untuk pengiriman aman ke seluruh Nusantara.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'title' => 'Garansi & Tracking Terpantau',
      'description' => 'Setiap paket dilindungi garansi cetak ulang dan dilengkapi nomor resi aktif yang dikirim langsung via WhatsApp.',
    ],
  ];

  $sumutAreas = [
    [
      'num' => '01',
      'name' => 'Kota Medan (Pusat Layanan)',
      'badge' => 'SAME DAY / INSTAN',
      'desc' => 'Pusat produksi dan operasional utama. Melayani instansi pemerintah, BUMN, perkantoran swasta, universitas, dan kepanitiaan event di seluruh kecamatan Kota Medan.',
      'points' => ['Gratis ongkir reguler dalam kota', 'Tersedia kurir Same Day / Instan', 'Waktu produksi kilat 1–2 hari kerja'],
    ],
    [
      'num' => '02',
      'name' => 'Kab. Deli Serdang & Percut Sei Tuan',
      'badge' => 'PENGIRIMAN HARIAN',
      'desc' => 'Pengiriman rutin harian untuk area perkantoran bandara Kualanamu, kampus, sekolah, dan instansi pemerintahan Deli Serdang.',
      'points' => ['Kurir lokal ekspres & reguler', 'Tarif terjangkau dan packing aman', 'Layanan sampel mockup gratis'],
    ],
    [
      'num' => '03',
      'name' => 'Kota Binjai',
      'badge' => 'KIRIM 1 HARI',
      'desc' => 'Distribusi cepat via armada darat lokal untuk kebutuhan seragam lanyard pegawai dinas, organisasi kepemudaan, dan instansi pendidikan.',
      'points' => ['Estimasi sampai 1 hari kerja', 'Pilihan bahan tissue & nylon komplit', 'Fasilitas konsultasi online mudah'],
    ],
    [
      'num' => '04',
      'name' => 'Lubuk Pakam & Kawasan Industri',
      'badge' => 'KORPORAT & PABRIK',
      'desc' => 'Spesialis pengadaan tali tanda pengenal karyawan pabrik, kartu akses pegawai industri, dan instansi komersial.',
      'points' => ['Paket bundling lanyard + ID card PVC', 'Diskon khusus order partai besar', 'Lengkap dengan safety breakaway buckle'],
    ],
    [
      'num' => '05',
      'name' => 'Pematang Siantar & Tebing Tinggi',
      'badge' => 'KARGO DARAT',
      'desc' => 'Rute ekspres darat harian untuk sekolah, rumah sakit, perbankan, dan kepanitiaan seminar di Siantar dan Tebing Tinggi.',
      'points' => ['Estimasi 1–2 hari kerja', 'Pengemasan kardus tahan benturan', 'Resi aktif terpantau real-time'],
    ],
    [
      'num' => '06',
      'name' => 'Seluruh Kabupaten di Sumatera Utara',
      'badge' => 'SUMUT LENGKAP',
      'desc' => 'Menjangkau Asahan, Labuhanbatu, Toba, Tapanuli, Karo, Dairi, Langkat, Simalungun, hingga Nias dengan jalur logistik resmi.',
      'points' => ['Pilihan ekspedisi reguler & kargo bus', 'Kemasan anti-air dan segel kuat', 'Jaminan garansi 100% ganti baru'],
    ],
  ];

  $nationalZones = [
    [
      'zone' => 'ZONA 1',
      'title' => 'Pulau Sumatera',
      'estimate' => '2–4 Hari Kerja',
      'coverage' => 'Aceh, Riau, Kepulauan Riau, Sumatera Barat, Jambi, Sumatera Selatan, Bengkulu, & Lampung.',
    ],
    [
      'zone' => 'ZONA 2',
      'title' => 'DKI Jakarta, Jawa & Bali',
      'estimate' => '2–4 Hari Kerja',
      'coverage' => 'Jakarta, Banten, Jawa Barat, Jawa Tengah, DI Yogyakarta, Jawa Timur, & Bali via kargo udara harian.',
    ],
    [
      'zone' => 'ZONA 3',
      'title' => 'Kalimantan & Sulawesi',
      'estimate' => '3–5 Hari Kerja',
      'coverage' => 'Pontianak, Banjarmasin, Balikpapan, Samarinda, Makassar, Manado, Palu, Kendari, & sekitarnya.',
    ],
    [
      'zone' => 'ZONA 4',
      'title' => 'Nusa Tenggara, Maluku & Papua',
      'estimate' => '4–7 Hari Kerja',
      'coverage' => 'Mataram, Kupang, Ambon, Ternate, Sorong, Jayapura, Timika, Merauke dengan kargo resmi ber-GPS.',
    ],
  ];
@endphp

<div class="area-page">
  {{-- Hero Section --}}
  <section class="area-hero" id="area-hero" aria-labelledby="area-title">
    <div class="home-shell home-shell--wide area-hero__container">
      <div class="area-hero__content">
        <div class="area-hero__eyebrow-wrap">
          <span class="area-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="area-hero__eyebrow">CAKUPAN LAYANAN &amp; DISTRIBUSI</span>
        </div>

        <h1 id="area-title" class="area-hero__title">
          Pusat Cetak Tali Lanyard Medan dengan Jangkauan <span class="area-hero__title-accent">Nasional.</span>
        </h1>

        <p class="area-hero__desc">
          Berbasis di Kota Medan, kami melayani pemesanan tali lanyard printing custom untuk instansi perkantoran, universitas, sekolah, dan event di seluruh Sumatera Utara hingga seluruh provinsi di Indonesia.
        </p>

        <div class="area-hero__actions">
          <a class="area-btn area-btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="area-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Cek Layanan Area Anda via WA</span>
            <span class="area-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="area-btn area-btn--secondary ptl-button-motion" href="{{ route('products.index') }}" data-button-motion>
            <span data-button-label>Eksplor Pilihan Produk</span>
            <span class="area-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="area-hero__visual">
        <div class="area-hero__image-card">
          <picture>
            <source srcset="/uploads/hero-area-lanyard-medan-1280w.webp 1280w, /uploads/hero-area-lanyard-medan-960w.webp 960w, /uploads/hero-area-lanyard-medan-640w.webp 640w" sizes="(max-width: 767px) 100vw, 560px" type="image/webp">
            <img
              src="/uploads/hero-area-lanyard-medan.webp"
              alt="Cakupan area layanan cetak lanyard custom Lanyard Medan"
              width="1448"
              height="1086"
              loading="eager"
              fetchpriority="high"
              decoding="async"
            >
          </picture>
        </div>
      </div>
    </div>
  </section>

  {{-- 4 Pilar Distribusi --}}
  <section class="area-pillars" id="keunggulan-distribusi" aria-label="Keunggulan distribusi Lanyard Medan">
    <div class="home-shell home-shell--wide">
      <div class="area-pillars__grid">
        @foreach($pillars as $pillar)
          <div class="area-pillar-card">
            <div class="area-pillar-card__icon" aria-hidden="true">
              {!! $pillar['icon'] !!}
            </div>
            <h3 class="area-pillar-card__title">{{ $pillar['title'] }}</h3>
            <p class="area-pillar-card__desc">{{ $pillar['description'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Prioritas Wilayah Sumatera Utara (6 Card Grid) --}}
  <section class="area-local" id="area-sumut" aria-labelledby="local-title">
    <div class="home-shell home-shell--wide">
      <header class="area-section-intro">
        <p class="area-section-eyebrow">PRIORITAS WILAYAH SUMATERA UTARA</p>
        <h2 id="local-title" class="area-section-title">Layanan Cepat untuk Medan &amp; Sekitarnya</h2>
        <p class="area-section-lead">Didukung lokasi workshop di Medan yang strategis untuk memastikan pengiriman pesanan dalam kota dan sekitarnya berjalan super cepat.</p>
      </header>

      <div class="area-local__grid">
        @foreach($sumutAreas as $area)
          <article class="area-local-card">
            <div class="area-local-card__header">
              <span class="area-local-card__num">{{ $area['num'] }}</span>
              <span class="area-local-card__badge">{{ $area['badge'] }}</span>
            </div>

            <h3 class="area-local-card__title">{{ $area['name'] }}</h3>
            <p class="area-local-card__desc">{{ $area['desc'] }}</p>

            <ul class="area-local-card__points">
              @foreach($area['points'] as $point)
                <li>
                  <span class="area-local-card__check" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                  </span>
                  <span>{{ $point }}</span>
                </li>
              @endforeach
            </ul>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Distribusi Nasional Antar Pulau (4 Zona) --}}
  <section class="area-zones" id="area-nasional" aria-labelledby="zones-title">
    <div class="home-shell home-shell--wide">
      <header class="area-section-intro">
        <p class="area-section-eyebrow">DISTRIBUSI NASIONAL</p>
        <h2 id="zones-title" class="area-section-title">Siap Kirim ke Seluruh Pelosok Indonesia</h2>
        <p class="area-section-lead">Kemitraan ekspedisi darat, udara, dan laut untuk menjangkau kantor cabang, kampus, dan kepanitiaan event Anda di berbagai pulau.</p>
      </header>

      <div class="area-zones__grid">
        @foreach($nationalZones as $zone)
          <div class="area-zone-card">
            <div class="area-zone-card__header">
              <span class="area-zone-card__badge">{{ $zone['zone'] }}</span>
              <span class="area-zone-card__estimate">{{ $zone['estimate'] }}</span>
            </div>
            <h3 class="area-zone-card__title">{{ $zone['title'] }}</h3>
            <p class="area-zone-card__coverage">{{ $zone['coverage'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Dynamic City Pages Index (Jika ada di database) --}}
  @if($cityPages->isNotEmpty())
    <section class="area-cities" aria-labelledby="cities-title">
      <div class="home-shell home-shell--wide">
        <header class="area-section-intro">
          <p class="area-section-eyebrow">HALAMAN KOTA SPESIFIK</p>
          <h2 id="cities-title" class="area-section-title">Informasi Layanan Per Kota</h2>
          <p class="area-section-lead">Pilih kota untuk melihat informasi layanan dan penawaran spesifik di daerah Anda.</p>
        </header>

        <div class="area-cities__grid">
          @foreach($cityPages as $cityPage)
            <a href="{{ route('area.show', $cityPage->slug) }}" class="area-city-link">
              <span>{{ $cityPage->title }}</span>
              <span class="area-city-link__arrow" aria-hidden="true">→</span>
            </a>
          @endforeach
        </div>
      </div>
    </section>
  @endif

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
            Mau Pesan Lanyard Custom untuk <span class="home-cta__title-accent">Wilayah Anda?</span>
          </h2>

          <p class="home-cta__desc">
            Sampaikan kota lokasi dan batas waktu kebutuhan acara Anda. Tim Lanyard Medan siap memberikan rekomendasi spesifikasi terbaik, sampel mockup digital gratis, dan estimasi ongkir paling hemat.
          </p>

          <div class="home-cta__buttons">
            <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
              </span>
              <span data-button-label>Konsultasi via WhatsApp</span>
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
            alt="Layanan cetak tali lanyard custom berkualitas tinggi Lanyard Medan"
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
  @include('components.schema.area')
@endpush
@endsection
