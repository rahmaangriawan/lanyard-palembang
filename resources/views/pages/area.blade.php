@extends('layouts.public')

@section('title', 'Area Layanan Cetak Lanyard Custom Palembang & Nasional | Lanyard Palembang')
@section('meta_description', 'Lanyard Palembang melayani pesanan tali lanyard custom untuk Kota Palembang, Banyuasin, Ogan Ilir, Prabumulih, Muara Enim, hingga pengiriman aman ke seluruh provinsi di Indonesia.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/area')
@section('seo_og_image', '/uploads/hero-area-lanyard-palembang.webp')

@push('head')
  <link rel="stylesheet" href="/css/area-page.css?v={{ file_exists(public_path('css/area-page.css')) ? filemtime(public_path('css/area-page.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau tanya layanan dan pengiriman lanyard custom untuk wilayah saya.');

  $pillars = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
      'title' => 'Workshop Berbasis di Palembang',
      'description' => 'Produksi langsung di Kota Palembang, memudahkan koordinasi cetak cepat tanpa ketergantungan antrean vendor luar pulau.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
      'title' => 'Pengiriman Kilat se-Sumsel',
      'description' => 'Tersedia opsi pengiriman kurir instan Same Day dalam kota dan kargo darat 1 hari untuk kabupaten tetangga di Sumatera Selatan.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>',
      'title' => 'Jangkauan Ekspedisi Nasional',
      'description' => 'Bermitra resmi dengan JNE, J&T, SiCepat, dan operator kargo volume besar untuk pengiriman aman ke seluruh provinsi di Indonesia.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'title' => 'Garansi & Tracking Terpantau',
      'description' => 'Setiap paket dilindungi garansi cetak ulang 100% dan dilengkapi nomor resi aktif yang dikirim langsung via WhatsApp.',
    ],
  ];

  $sumselAreas = [
    [
      'num' => '01',
      'name' => 'Kota Palembang (Pusat Layanan)',
      'badge' => 'SAME DAY / INSTAN',
      'desc' => 'Pusat produksi dan operasional utama. Melayani instansi pemerintah, BUMN, perkantoran swasta, universitas, dan kepanitiaan event di seluruh kecamatan Kota Palembang.',
      'points' => ['Gratis ongkir reguler dalam kota', 'Tersedia kurir Same Day / Instan', 'Waktu produksi kilat 1–2 hari kerja'],
    ],
    [
      'num' => '02',
      'name' => 'Kab. Banyuasin & Pangkalan Balai',
      'badge' => 'KARGO DARAT HARIAN',
      'desc' => 'Distribusi rutin via armada kargo lokal untuk perusahaan perkebunan, pertambangan, dan kantor pemerintahan di wilayah Banyuasin.',
      'points' => ['Estimasi sampai 1 hari kerja', 'Tarif subsidi terjangkau', 'Packing kardus lapis bubble wrap anti benturan'],
    ],
    [
      'num' => '03',
      'name' => 'Kab. Ogan Ilir & Indralaya (UNSRI)',
      'badge' => 'KORPORAT & KAMPUS',
      'desc' => 'Spesialis tali lanyard untuk perkantoran, dosen, mahasiswa, dan kepanitiaan event Universitas Sriwijaya serta kawasan Indralaya.',
      'points' => ['Kurir reguler harian', 'Paket bundling + ID card PVC tersedia', 'Layanan desain mockup 3D gratis'],
    ],
    [
      'num' => '04',
      'name' => 'Kota Prabumulih & Zona Industri Energi',
      'badge' => 'KURIR EKSPRES',
      'desc' => 'Pengiriman aman untuk perusahaan migas, perkantoran Pertamina, dan kegiatan operasional di area Prabumulih serta Sumatera Selatan bagian tengah.',
      'points' => ['Kurir langsung via tol Trans Sumatera', 'Layanan konsultasi desain instan', 'Diskon khusus order perusahaan'],
    ],
    [
      'num' => '05',
      'name' => 'Kab. Muara Enim & Lahat',
      'badge' => 'KARGO DARAT',
      'desc' => 'Rute pengiriman reguler untuk perusahaan tambang batu bara, perkantoran, dan rumah sakit rujukan di Muara Enim hingga Lahat.',
      'points' => ['Pengiriman via ekspedisi kargo bus', 'Packing kardus tahan getaran', 'Resi real-time terhubung WhatsApp'],
    ],
    [
      'num' => '06',
      'name' => 'Seluruh Kabupaten se-Sumatera Selatan',
      'badge' => 'LIPUTAN LENGKAP',
      'desc' => 'Mencakup Muba, OKU, OKU Timur, OKU Selatan, OKI, PALI, Lubuklinggau, Pagar Alam, Musi Rawas, dan Empat Lawang dengan jalur logistik resmi.',
      'points' => ['Pilihan ekspedisi reguler & kargo', 'Kemasan anti-air dan segel kuat', 'Jaminan garansi 100% ganti baru'],
    ],
  ];

  $nationalZones = [
    [
      'zone' => 'ZONA 1',
      'title' => 'Pulau Sumatera',
      'estimate' => '2–4 Hari Kerja',
      'coverage' => 'Aceh, Riau, Kepulauan Riau, Sumatera Barat, Jambi, Bengkulu, & Lampung via kargo darat dan udara.',
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
  {{-- 1. HERO SECTION --}}
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
          Pusat Cetak Tali Lanyard Palembang dengan Jangkauan <span class="area-hero__title-accent">Nasional.</span>
        </h1>

        <p class="area-hero__desc">
          Berbasis langsung di Kota Palembang, kami melayani pengadaan tali lanyard printing custom untuk instansi perkantoran, BUMN, universitas, dinas pemerintahan, dan kepanitiaan event di seluruh Sumatera Selatan hingga provinsi lain di Indonesia.
        </p>

        <div class="area-hero__actions">
          <a class="area-btn area-btn--primary" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span class="area-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span>Cek Layanan Area Anda via WA</span>
            <span class="area-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="area-btn area-btn--secondary" href="{{ route('products.index') }}">
            <span>Eksplor Pilihan Produk</span>
            <span class="area-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="area-hero__visual">
        <div class="area-hero__image-card">
          <img
            src="/uploads/hero-area-lanyard-palembang.webp?v={{ file_exists(public_path('uploads/hero-area-lanyard-palembang.webp')) ? filemtime(public_path('uploads/hero-area-lanyard-palembang.webp')) : 1 }}"
            alt="Cakupan area layanan cetak lanyard custom Lanyard Palembang"
            width="1536"
            height="1024"
            loading="eager"
            fetchpriority="high"
            decoding="async"
          >
        </div>
      </div>
    </div>
  </section>

  {{-- 2. 4 PILLAR KEUNGGULAN DISTRIBUSI --}}
  <section class="area-pillars" id="keunggulan-distribusi" aria-label="Keunggulan distribusi Lanyard Palembang">
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

  {{-- 3. PRIORITAS WILAYAH SUMATERA SELATAN (6 Card Grid) --}}
  <section class="area-local" id="area-sumsel" aria-labelledby="local-title">
    <div class="home-shell home-shell--wide">
      <header class="area-section-intro">
        <p class="area-section-eyebrow">PRIORITAS SUMATERA SELATAN</p>
        <h2 id="local-title" class="area-section-title">Layanan Cepat untuk Palembang &amp; Kabupaten se-Sumsel</h2>
        <p class="area-section-lead">Didukung workshop di Palembang, kami memastikan pengiriman pesanan dalam kota dan ke seluruh kabupaten di Sumatera Selatan berjalan super cepat.</p>
      </header>

      <div class="area-local__grid">
        @foreach($sumselAreas as $area)
          <article class="area-local-card">
            <div class="area-local-card__header">
              <span class="area-local-card__num">{{ $area['num'] }}</span>
              <span class="area-local-card__badge">{{ $area['badge'] }}</span>
            </div>
            <h3 class="area-local-card__name">{{ $area['name'] }}</h3>
            <p class="area-local-card__desc">{{ $area['desc'] }}</p>

            <ul class="area-local-card__points">
              @foreach($area['points'] as $point)
                <li>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="20 6 9 17 4 12"/>
                  </svg>
                  <span>{{ $point }}</span>
                </li>
              @endforeach
            </ul>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 4. 4 ZONA NASIONAL --}}
  <section class="area-zones" id="area-zona-nasional" aria-labelledby="zones-title">
    <div class="home-shell home-shell--wide">
      <header class="area-section-intro">
        <p class="area-section-eyebrow">JANGKAUAN NASIONAL</p>
        <h2 id="zones-title" class="area-section-title">4 Zona Ekspedisi ke Seluruh Indonesia</h2>
        <p class="area-section-lead">Estimasi waktu tiba dihitung sejak paket diserahkan ke agen logistik resmi. Kami merekomendasikan opsi ekspedisi paling efisien untuk kebutuhan mendesak Anda.</p>
      </header>

      <div class="area-zones__grid">
        @foreach($nationalZones as $zone)
          <article class="area-zone-card">
            <div class="area-zone-card__header">
              <span class="area-zone-card__tag">{{ $zone['zone'] }}</span>
              <span class="area-zone-card__estimate">{{ $zone['estimate'] }}</span>
            </div>
            <h3 class="area-zone-card__title">{{ $zone['title'] }}</h3>
            <p class="area-zone-card__coverage">{{ $zone['coverage'] }}</p>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 5. DIREKTORI HALAMAN KOTA (CityPage DB-driven) --}}
  @if($cityPages->isNotEmpty())
    <section class="area-cities" id="area-direktori-kota" aria-labelledby="cities-title">
      <div class="home-shell home-shell--wide">
        <header class="area-section-intro">
          <p class="area-section-eyebrow">DIREKTORI HALAMAN</p>
          <h2 id="cities-title" class="area-section-title">Cek Halaman Detail Wilayah Spesifik</h2>
          <p class="area-section-lead">Pelajari cakupan layanan, estimasi ongkir, dan rekomendasi produk untuk tiap kota yang sudah memiliki halaman khusus.</p>
        </header>

        <nav class="area-cities__grid" aria-label="Pilih halaman kota">
          @foreach($cityPages as $city)
            <a href="{{ route('area.show', $city->slug) }}" class="area-city-link">
              <span>{{ $city->title }}</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
              </svg>
            </a>
          @endforeach
        </nav>
      </div>
    </section>
  @endif

  {{-- 6. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')

@push('schema')
  @include('components.schema.area')
@endpush
@endsection
