@extends('layouts.public')

@section('title', 'Template Desain Lanyard Custom | Inspirasi Gaya & Konsultasi Desain Gratis')
@section('meta_description', 'Temukan inspirasi arah desain tali lanyard custom: Corporate, Event, Sekolah, Komunitas, Full Color, atau Minimalis. Dapatkan mockup digital gratis dari tim desainer Lanyard Palembang.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/template-desain')
@section('seo_og_image', '/uploads/template-design-lanyard-palembang.webp')

@push('head')
  <link rel="stylesheet" href="/css/template-page.css?v={{ file_exists(public_path('css/template-page.css')) ? filemtime(public_path('css/template-page.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@push('schema')
  @include('components.schema.template-desain')
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau konsultasi arah desain lanyard custom.');

  $templateSteps = [
    [
      'num' => '01',
      'title' => 'Pilih Arah Gaya & Karakter',
      'description' => 'Diskusikan tema visual yang paling pas dengan identitas brand Anda: Corporate, Event, Sekolah, Komunitas, Full Color, atau Minimalis.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>',
    ],
    [
      'num' => '02',
      'title' => 'Kirim Logo & Referensi Warna',
      'description' => 'Sertakan file master logo (AI, PDF, PNG resolusi tinggi), kode warna resmi (Pantone/HEX), atau gambar referensi visual yang Anda inginkan.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>',
    ],
    [
      'num' => '03',
      'title' => 'Terima Mockup 3D Gratis',
      'description' => 'Desainer profesional kami menyiapkan preview visual digital cetak bolak-balik secara gratis untuk disetujui sebelum mesin cetak massal beroperasi.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    ],
  ];

  $templateChoices = [
    [
      'title' => 'Corporate & Formal',
      'tag' => 'RAPI & PROFESIONAL',
      'subtitle' => 'Identitas Karyawan & BUMN',
      'copy' => 'Palet warna tenang dengan penempatan logo yang tegas, tipografi mudah terbaca, dan komposisi simetris untuk lingkungan kerja resmi.',
    ],
    [
      'title' => 'Event & Festival',
      'tag' => 'BERANI & ENERGIK',
      'subtitle' => 'Konser, Seminar, & Pameran',
      'copy' => 'Grafis berani full color dengan kontras tinggi yang langsung mencolok dari meja registrasi hingga panggung utama.',
    ],
    [
      'title' => 'Kampus & Sekolah',
      'tag' => 'FUNGSIONAL & CERIA',
      'subtitle' => 'Mahasiswa, Guru, & Civitas',
      'copy' => 'Menonjolkan warna almamater khas institusi pendidikan dengan tata letak logo dan informasi identitas yang rapi.',
    ],
    [
      'title' => 'Komunitas & Organisasi',
      'tag' => 'AKRAB & EKSPRESIF',
      'subtitle' => 'Klub, Hobi, & Komunitas',
      'copy' => 'Gaya visual yang mempererat rasa kebersamaan anggota dengan elemen grafis khas dan kebebasan paduan warna.',
    ],
    [
      'title' => 'Full Color Sublimasi',
      'tag' => 'ILUSTRATIF & MAKSIMAL',
      'subtitle' => 'Desain Pola & Gradasi Rumit',
      'copy' => 'Memaksimalkan keunggulan mesin cetak digital: gradasi halus, ilustrasi bebas, dan detail foto beresolusi tinggi.',
    ],
    [
      'title' => 'Minimalis Monokrom',
      'tag' => 'SEDERHANA & ELEGAN',
      'subtitle' => 'Brand Eksklusif & Modern',
      'copy' => 'Komposisi bersih bernuansa monokrom atau dual-tone untuk brand yang mengutamakan tampilan berkelas dan tidak ramai.',
    ],
  ];
@endphp

<div class="template-page">
  {{-- 1. HERO SECTION --}}
  <section class="template-hero" id="template-hero" aria-labelledby="template-title">
    <div class="home-shell home-shell--wide template-hero__container">
      <div class="template-hero__content">
        <div class="template-hero__eyebrow-wrap">
          <span class="template-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="template-hero__eyebrow">ATELIER · INSPIRASI GAYA DESAIN</span>
        </div>

        <h1 id="template-title" class="template-hero__title">
          Pilih Arah Gaya Lanyard Custom yang <span class="template-hero__title-accent">Mewakili Karakter Brand Anda.</span>
        </h1>

        <p class="template-hero__desc">
          Setiap instansi dan event memiliki karakter unik. Pilih salah satu arah visual sebagai titik awal konsultasi, dan tim desainer kami siap membuatkan mockup digital 3D siap cetak secara gratis.
        </p>

        <div class="template-hero__actions">
          <a class="template-btn template-btn--primary" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span class="template-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span>Konsultasi Arah Desain</span>
            <span class="template-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="template-btn template-btn--secondary" href="{{ route('portfolio') }}">
            <span>Lihat Portofolio Kami</span>
            <span class="template-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="template-hero__visual">
        <div class="template-hero__image-card">
          <img
            src="/uploads/template-design-lanyard-palembang.webp?v={{ file_exists(public_path('uploads/template-design-lanyard-palembang.webp')) ? filemtime(public_path('uploads/template-design-lanyard-palembang.webp')) : 1 }}"
            alt="Inspirasi berbagai template desain tali lanyard custom Lanyard Palembang"
            width="1672"
            height="941"
            loading="eager"
            fetchpriority="high"
            decoding="async"
          >
        </div>
      </div>
    </div>
  </section>

  {{-- 2. 3 LANGKAH KONSULTASI DESAIN --}}
  <section class="template-steps" id="template-steps" aria-label="Langkah memilih gaya desain lanyard">
    <div class="home-shell home-shell--wide">
      <div class="template-steps__grid" role="list">
        @foreach($templateSteps as $step)
          <article class="template-step-card" role="listitem">
            <div class="template-step-card__header">
              <span class="template-step-card__num">{{ $step['num'] }}</span>
              <div class="template-step-card__icon" aria-hidden="true">
                {!! $step['icon'] !!}
              </div>
            </div>
            <h3 class="template-step-card__title">{{ $step['title'] }}</h3>
            <p class="template-step-card__desc">{{ $step['description'] }}</p>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 3. GALERI 6 ARAH GAYA DESAIN --}}
  <section class="template-gallery" id="template-gallery" aria-labelledby="gallery-title">
    <div class="home-shell home-shell--wide">
      <header class="template-section-intro">
        <p class="template-section-eyebrow">INSPIRASI 6 ARAH GAYA</p>
        <h2 id="gallery-title" class="template-section-title">Setiap Brand Punya Karakter — Pilih yang Paling Cocok</h2>
        <p class="template-section-lead">Klik salah satu gaya di bawah untuk langsung terhubung ke tim desainer kami bersama referensi pilihan Anda.</p>
      </header>

      <div class="template-gallery__grid">
        @foreach($templateChoices as $choice)
          @php($message = 'Halo Lanyard Palembang, saya tertarik dengan arah gaya desain '.$choice['title'].' untuk lanyard custom. Mohon dibantu buatkan mockup digitalnya.')
          <article class="template-style-card">
            <div class="template-style-card__header">
              <span class="template-style-card__num">0{{ $loop->iteration }}</span>
              <span class="template-style-card__tag">{{ $choice['tag'] }}</span>
            </div>

            <h3 class="template-style-card__title">{{ $choice['title'] }}</h3>
            <span class="template-style-card__subtitle">{{ $choice['subtitle'] }}</span>
            <p class="template-style-card__copy">{{ $choice['copy'] }}</p>

            <a
              href="https://wa.me/6282210200700?text={{ rawurlencode($message) }}"
              target="_blank"
              rel="noopener noreferrer"
              class="template-style-card__btn"
            >
              <span>Pilih Gaya Ini</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
              </svg>
            </a>
          </article>
        @endforeach
      </div>

      {{-- 4. QUICK HELP STRIP --}}
      <div class="template-help">
        <div class="template-help__text">
          <strong>Belum yakin dengan arah gaya yang dipilih?</strong>
          <span>Kirimkan saja file logo Anda, desainer Lanyard Palembang siap membuatkan 2–3 opsi mockup secara gratis!</span>
        </div>
        <a class="template-help__btn" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
          <span>Konsultasi Arah Desain via WA</span>
          <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </section>

  {{-- 5. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')
@endsection
