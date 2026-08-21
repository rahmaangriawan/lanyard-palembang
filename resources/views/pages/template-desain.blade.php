@extends('layouts.public')

@section('title', 'Template Desain Lanyard Custom | Inspirasi Gaya & Konsultasi Desain Gratis')
@section('meta_description', 'Temukan inspirasi arah desain tali lanyard custom: Corporate, Event, Sekolah, Komunitas, Full Color, atau Minimalis. Dapatkan mockup digital gratis dari tim desainer Lanyard Medan.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/template-desain')
@section('seo_og_image', '/uploads/template-design-lanyard-medan.webp')

@push('head')
  <link rel="stylesheet" href="/css/template-page.css?v={{ file_exists(public_path('css/template-page.css')) ? filemtime(public_path('css/template-page.css')) : 1 }}">
@endpush

@push('schema')
  @include('components.schema.template-desain')
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya mau konsultasi arah desain lanyard custom.');

  $templateSteps = [
    [
      'num' => '01',
      'title' => 'Pilih Arah Gaya',
      'description' => 'Tentukan karakter visual yang paling dekat dengan kebutuhan brand Anda: Corporate, Event, Sekolah, Komunitas, Full Color, atau Minimalis.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 19l7-7 3 3-7 7-3-3z"/><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/><path d="M2 2l7.586 7.586"/><circle cx="11" cy="11" r="2"/></svg>',
    ],
    [
      'num' => '02',
      'title' => 'Kirim Logo & Referensi',
      'description' => 'Sertakan file master logo (AI, PDF, PNG), kode warna brand, atau gambar referensi visual yang ingin dikembangkan oleh tim desainer kami.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"/></svg>',
    ],
    [
      'num' => '03',
      'title' => 'Terima Mockup Digital Gratis',
      'description' => 'Desainer kami menyiapkan preview visual lanyard secara cuma-cuma untuk direvisi hingga final sebelum proses produksi dicetak massal.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
    ],
  ];

  $templateChoices = [
    [
      'title' => 'Corporate',
      'tag' => 'Rapi & Profesional',
      'copy' => 'Palet warna tenang, logo tercetak tegas, dan tata letak yang mudah dibaca untuk kebutuhan tim kerja serta identitas pegawai.',
    ],
    [
      'title' => 'Event',
      'tag' => 'Berani & Mudah Dikenali',
      'copy' => 'Desain full color mencolok yang membawa energi acara dari meja registrasi sampai panggung utama.',
    ],
    [
      'title' => 'Sekolah',
      'tag' => 'Ceria & Fungsional',
      'copy' => 'Warna institusi khas sekolah/kampus dengan informasi penting yang tersusun rapi dan nyaman dipakai seharian.',
    ],
    [
      'title' => 'Komunitas',
      'tag' => 'Akrab & Ekspresif',
      'copy' => 'Gaya visual yang memperkuat rasa kebersamaan anggota komunitas tanpa menghilangkan karakter khas kelompok.',
    ],
    [
      'title' => 'Full Color',
      'tag' => 'Ilustratif & Maksimal',
      'copy' => 'Ruang cetak penuh untuk pola, ilustrasi, foto, atau gradasi warna yang merepresentasikan identitas brand secara maksimal.',
    ],
    [
      'title' => 'Minimalis',
      'tag' => 'Sederhana & Berkelas',
      'copy' => 'Komposisi bersih dan elegan untuk brand yang menginginkan tampilan premium, tenang, dan tidak ramai.',
    ],
  ];
@endphp

<div class="template-page">
  {{-- Hero Section --}}
  <section class="template-hero" id="template-hero" aria-labelledby="template-title">
    <div class="home-shell home-shell--wide template-hero__container">
      <div class="template-hero__content">
        <div class="template-hero__eyebrow-wrap">
          <span class="template-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="template-hero__eyebrow">ARAH VISUAL &amp; GAYA DESAIN</span>
        </div>

        <h1 id="template-title" class="template-hero__title">
          Mulai dari Gaya Desain Lanyard yang <span class="template-hero__title-accent">Paling Cocok untuk Brand Anda.</span>
        </h1>

        <p class="template-hero__desc">
          Pilih salah satu arah visual sebagai titik awal konsultasi. Tim desainer Lanyard Medan siap menerjemahkan referensi dan gaya pilihan Anda menjadi mockup digital siap produksi secara gratis.
        </p>

        <div class="template-hero__actions">
          <a class="template-btn template-btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="template-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Konsultasi Desain via WhatsApp</span>
            <span class="template-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="template-btn template-btn--secondary ptl-button-motion" href="{{ route('portfolio') }}" data-button-motion>
            <span data-button-label>Lihat Portofolio Kami</span>
            <span class="template-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="template-hero__visual">
        <div class="template-hero__image-card">
          <img
            src="/uploads/template-design-lanyard-medan.webp"
            alt="Berbagai pilihan template desain tali lanyard custom Lanyard Medan"
            width="1200"
            height="800"
            loading="eager"
            fetchpriority="high"
            decoding="async"
          >
        </div>
      </div>
    </div>
  </section>

  {{-- 3 Langkah Memilih Gaya Desain --}}
  <section class="template-steps" id="template-steps" aria-label="Langkah memilih gaya desain lanyard">
    <div class="home-shell home-shell--wide">
      <div class="template-steps__grid" role="list">
        @foreach($templateSteps as $step)
          <article class="template-step-card" role="listitem">
            <div class="template-step-card__meta">
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

  {{-- Galeri 6 Arah Gaya Desain --}}
  <section class="template-gallery" id="template-gallery" aria-labelledby="gallery-title">
    <div class="home-shell home-shell--wide">
      <header class="template-section-intro">
        <p class="template-section-eyebrow">PILIH TITIK AWAL</p>
        <h2 id="gallery-title" class="template-section-title">Enam Arah Desain, Satu Identitas yang Kuat</h2>
        <p class="template-section-lead">Klik salah satu gaya di bawah untuk langsung terhubung ke tim desainer kami bersama referensi pilihan Anda.</p>
      </header>

      <div class="template-gallery__grid">
        @foreach($templateChoices as $choice)
          @php($message = 'Halo Lanyard Medan, saya tertarik dengan arah gaya desain '.$choice['title'].' untuk lanyard custom. Mohon dibantu buatkan mockup digitalnya.')
          <article class="template-style-card">
            <div class="template-style-card__header">
              <span class="template-style-card__num">0{{ $loop->iteration }}</span>
              <span class="template-style-card__tag">{{ $choice['tag'] }}</span>
            </div>

            <h3 class="template-style-card__title">{{ $choice['title'] }}</h3>
            <p class="template-style-card__desc">{{ $choice['copy'] }}</p>

            <div class="template-style-card__footer">
              <a href="https://wa.me/6282210200700?text={{ rawurlencode($message) }}" target="_blank" rel="noopener noreferrer" class="template-style-card__btn ptl-button-motion" data-button-motion>
                <span data-button-label>Konsultasi Gaya Ini</span>
                <span class="template-style-card__btn-arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </article>
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
            Punya Ide Desain Sendiri untuk <span class="home-cta__title-accent">Lanyard Anda?</span>
          </h2>

          <p class="home-cta__desc">
            Kirimkan sketsa, referensi, atau bahkan ide di kepala Anda. Desainer Lanyard Medan siap mewujudkannya menjadi mockup digital gratis sebelum produksi dimulai.
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
            alt="Contoh hasil desain lanyard custom berkualitas tinggi Lanyard Medan"
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
