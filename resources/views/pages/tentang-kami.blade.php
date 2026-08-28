@extends('layouts.public')

@section('title', 'Tentang Lanyard Palembang | Workshop Tali Lanyard Custom')
@section('meta_description', 'Mengenal workshop Lanyard Palembang: atelier percetakan tali lanyard custom untuk perusahaan, BUMN, universitas, dan event di seluruh Indonesia dengan presisi cetak 1–3 hari.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/tentang-kami')
@section('seo_og_image', '/uploads/tentang-lanyard.webp')

@push('head')
  <link rel="stylesheet" href="/css/about-page.css?v={{ file_exists(public_path('css/about-page.css')) ? filemtime(public_path('css/about-page.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@push('schema')
  @include('components.schema.about')
@endpush

@section('content')
@php
  $aboutWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya ingin berdiskusi tentang pemesanan tali lanyard custom untuk kebutuhan instansi kami.');

  $processSteps = [
    [
      'num' => '01',
      'title' => 'Konsultasi & Referensi Desain',
      'description' => 'Ceritakan konsep, jumlah, dan target acara Anda via WhatsApp. Tim desainer akan memetakan arah visual yang sesuai dengan karakter brand Anda.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>',
    ],
    [
      'num' => '02',
      'title' => 'Mockup 3D Digital & Persetujuan',
      'description' => 'Desainer kami siapkan preview visual 3D cetak bolak-balik gratis untuk Anda review. Produksi cetak baru berjalan setelah Anda menyetujui file akhir.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M3 9h18"/><path d="M9 21V9"/></svg>',
    ],
    [
      'num' => '03',
      'title' => 'Cetak Sublimasi & Quality Control',
      'description' => 'Tali dicetak dengan mesin sublimasi digital beresolusi tinggi, kemudian melewati double QC: ketajaman warna, kerapian jahitan, dan kekuatan kait stopper.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
    ],
    [
      'num' => '04',
      'title' => 'Pengemasan & Pengiriman Resmi',
      'description' => 'Paket dikemas kedap air per ikat, kemudian dikirim lewat ekspedisi resmi ke seluruh Indonesia. Nomor resi aktif langsung dikirim ke WhatsApp Anda.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    ],
  ];

  $commitments = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
      'title' => 'Respon Manusia dalam 1×24 Jam',
      'description' => 'Setiap pesan dijawab oleh tim sales & desainer profesional, bukan bot. Estimasi harga, jadwal, dan revisi dibahas dengan jelas dari pesan pertama.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'title' => 'Garansi Cetak Ulang 100%',
      'description' => 'Tali yang mengalami cacat cetak, jahitan terlepas, atau kuantitas kurang akan kami cetak ulang tanpa pungutan biaya tambahan. Detail lengkap di halaman Garansi.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 7h18M3 12h18M3 17h12"/></svg>',
      'title' => 'Minimum Order 50 Pcs',
      'description' => 'Mulai 50 pcs untuk uji coba event kecil, hingga ribuan pcs untuk kebutuhan korporat dan dinas. Tidak ada biaya desain untuk seluruh skala pesanan.',
    ],
  ];

  $storyMetrics = [
    ['title' => 'Bermitra Sejak Pelopor Lanyard Lokal', 'desc' => 'Bermula dari produksi kecil di workshop Palembang dan berkembang melayani seluruh Indonesia.'],
    ['title' => '1–3 Hari Produksi Kilat', 'desc' => 'Mesin digital printing sublimasi modern dan tim terampil yang terlatih mengelola antrean cetak secara efisien.'],
    ['title' => 'Quality Control 100% Manual', 'desc' => 'Setiap helai tali dicek fisik, warna, jahitan, dan aksesorisnya sebelum dikemas dan dikirimkan ke alamat Anda.'],
  ];
@endphp

<div class="about-page">
  {{-- 1. HERO SECTION --}}
  <section class="about-hero" id="about-hero" aria-labelledby="about-title">
    <div class="home-shell home-shell--wide about-hero__container">
      <div class="about-hero__content">
        <div class="about-hero__eyebrow-wrap">
          <span class="about-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="about-hero__eyebrow">WORKSHOP · ATELIER LANYARD PALEMBANG</span>
        </div>

        <h1 id="about-title" class="about-hero__title">
          Workshop Lanyard Palembang — Sublimasi, jahit, dan <span class="about-hero__title-accent">kirim lanyard custom dari Sumsel.</span>
        </h1>

        <p class="about-hero__desc">
          Dari workshop di Palembang kami cetak tali lanyard custom untuk perusahaan, BUMN, universitas, dan panitia acara di seluruh Indonesia. Pengerjaan 1–3 hari, minimum 50 pcs, garansi cetak ulang.
        </p>

        <div class="about-hero__actions">
          <a class="about-btn about-btn--primary" href="{{ $aboutWhatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span class="about-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span>Diskusikan Desain</span>
            <span class="about-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="about-btn about-btn--secondary" href="{{ route('ordering') }}">
            <span>Lihat Alur Pemesanan</span>
            <span class="about-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="about-hero__visual">
        <div class="about-hero__image-card">
          <img
            src="/uploads/tentang-lanyard.webp?v={{ file_exists(public_path('uploads/tentang-lanyard.webp')) ? filemtime(public_path('uploads/tentang-lanyard.webp')) : 1 }}"
            alt="Workshop tali lanyard custom Lanyard Palembang"
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

  {{-- 2. STORY SECTION --}}
  <section class="about-story" id="about-story" aria-labelledby="story-title">
    <div class="home-shell home-shell--wide about-story__grid">
      <div class="about-story__prose">
        <p class="about-section-eyebrow">CERITA KAMI</p>
        <h2 id="story-title" class="about-section-title">Berawal dari Kecintaan pada Kualitas Cetak Lokal.</h2>
        <p>
          Lanyard Palembang adalah atelier percetakan tali lanyard custom yang berbasis di Kota Palembang. Kami tumbuh dari keinginan sederhana: menghadirkan tali lanyard berkualitas ekspor dengan harga yang tetap ramah untuk instansi lokal.
        </p>
        <p>
          Setiap pesanan, mulai dari 50 pcs untuk event komunitas hingga ribuan pcs untuk kebutuhan korporat, kami perlakukan dengan proses dan kontrol kualitas yang sama. Presisi warna, kerapian jahitan, dan kekuatan aksesoris adalah janji yang tidak pernah kami kompromikan.
        </p>
      </div>

      <div class="about-story__metrics">
        @foreach($storyMetrics as $metric)
          <div class="about-story__metric">
            <strong>{{ $metric['title'] }}</strong>
            <span>{{ $metric['desc'] }}</span>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 3. 4 TAHAP WORKSHOP --}}
  <section class="about-process" id="about-process" aria-labelledby="process-title">
    <div class="home-shell home-shell--wide">
      <header class="about-section-intro">
        <p class="about-section-eyebrow">DI BALIK WORKSHOP</p>
        <h2 id="process-title" class="about-section-title">4 Tahap Pengerjaan yang Teliti &amp; Terukur</h2>
        <p class="about-section-lead">Setiap pesanan melewati proses yang jelas dan terdokumentasi, agar Anda mendapat tali lanyard dengan kualitas konsisten setiap kali.</p>
      </header>

      <div class="about-process__grid">
        @foreach($processSteps as $step)
          <article class="about-step-card">
            <div class="about-step-card__header">
              <span class="about-step-card__num">{{ $step['num'] }}</span>
              <div class="about-step-card__icon" aria-hidden="true">
                {!! $step['icon'] !!}
              </div>
            </div>
            <h3 class="about-step-card__title">{{ $step['title'] }}</h3>
            <p class="about-step-card__desc">{{ $step['description'] }}</p>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 4. KOMITMEN PELAYANAN --}}
  <section class="about-commitments" id="about-commitments" aria-labelledby="commitments-title">
    <div class="home-shell home-shell--wide">
      <header class="about-section-intro">
        <p class="about-section-eyebrow">KOMITMEN PELAYANAN</p>
        <h2 id="commitments-title" class="about-section-title">3 Pilar Komitmen Kami kepada Anda</h2>
        <p class="about-section-lead">Standar pelayanan yang konsisten untuk setiap pemesan, dari konsultasi hingga paket mendarat di alamat Anda.</p>
      </header>

      <div class="about-commitments__grid">
        @foreach($commitments as $commitment)
          <article class="about-commitment-card">
            <div class="about-commitment-card__icon" aria-hidden="true">
              {!! $commitment['icon'] !!}
            </div>
            <h3 class="about-commitment-card__title">{{ $commitment['title'] }}</h3>
            <p class="about-commitment-card__desc">{{ $commitment['description'] }}</p>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 5. QUICK HELP STRIP --}}
  <section class="about-help" id="about-help" aria-label="Konsultasi cepat Lanyard Palembang">
    <div class="home-shell home-shell--wide">
      <div class="about-help__bar">
        <div class="about-help__text">
          <strong>Siap mendiskusikan kebutuhan lanyard custom Anda?</strong>
          <span>Spesialis kami akan menjawab estimasi harga, pemilihan bahan, dan jadwal produksi dalam 1×24 jam.</span>
        </div>
        <a class="about-help__btn" href="{{ $aboutWhatsappUrl }}" target="_blank" rel="noopener noreferrer">
          <span>Konsultasi via WhatsApp</span>
          <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </section>

  {{-- 6. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')
@endsection
