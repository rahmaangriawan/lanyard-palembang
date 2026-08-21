@extends('layouts.public')

@section('title', 'Garansi Kualitas Cetak & Kepuasan 100% | Lanyard Medan')
@section('meta_description', 'Informasi jaminan garansi produksi Lanyard Medan: cetak ulang 100% gratis jika cacat produksi, kepastian akurasi jumlah, aksesoris kokoh, dan klaim praktis via WhatsApp.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/garansi')
@section('seo_og_image', '/uploads/hero-garansi-lanyard-medan.webp')

@push('head')
  <link rel="stylesheet" href="/css/warranty-page.css?v={{ file_exists(public_path('css/warranty-page.css')) ? filemtime(public_path('css/warranty-page.css')) : 1 }}">
@endpush

@section('content')
@php
  $claimWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya ingin konsultasi atau mengajukan klaim garansi untuk pesanan lanyard.');

  $commitments = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21.5 2v6h-6"/><path d="M21.34 15.57a10 10 0 1 1-.57-8.38l5.67-5.67"/></svg>',
      'title' => 'Cetak Ulang 100% Gratis',
      'description' => 'Kami mencetak ulang unit baru tanpa dipungut biaya tambahan jika ditemukan kesalahan cetak atau warna luntur dari pihak kami.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
      'title' => 'Respon Cepat 1x24 Jam',
      'description' => 'Customer service kami sigap menanggapi dan memvalidasi laporan kendala pesanan Anda tanpa proses birokrasi berbelit-belit.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
      'title' => 'Akurasi Jumlah Pesanan',
      'description' => 'Jumlah tali lanyard yang tiba dijamin pas dan sesuai dengan kuantitas yang tercantum pada nota invoice pemesanan Anda.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'title' => 'Aksesoris & Jahitan Kuat',
      'description' => 'Kait nikel tebal anti karat dan stopper safety kokoh yang telah lolos quality control uji fisik sebelum proses pengemasan.',
    ],
  ];

  $coveredItems = [
    'Tali lanyard robek, jahitan terlepas, atau cacat bahan saat pertama kali diterima.',
    'Hasil cetak buram, berbayang parah, atau warna luntur akibat kegagalan mesin press.',
    'Aksesoris kait besi, stopper putar, atau card holder patah saat unboxing paket.',
    'Kuantitas barang yang diterima kurang dari jumlah resmi yang disepakati pada invoice.',
    'Posisi cetak logo meleset secara signifikan di luar layout mockup yang telah di-approve.',
  ];

  $excludedItems = [
    'Perbedaan saturasi warna 5–10% akibat konversi profil warna digital RGB ke mesin cetak CMYK.',
    'Toleransi pergeseran potong kain 1–2 mm dalam batas standar industri percetakan tekstil.',
    'Kesalahan ketik teks/logo yang sudah disetujui pemesan saat tahap approval mockup digital.',
    'Kerusakan fisik paket akibat benturan kurir ekspedisi (dibantu via klaim asuransi ekspedisi).',
    'Klaim kendala yang dilaporkan melewati batas maksimal 3x24 jam sejak paket diterima.',
  ];

  $claimSteps = [
    [
      'num' => '01',
      'title' => 'Dokumentasikan Video Unboxing',
      'description' => 'Rekam video saat membuka paket dan ambil foto jelas pada bagian tali atau cetakan yang mengalami ketidaksesuaian.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M23 7l-7 5 7 5V7z"/><rect x="1" y="5" width="15" height="14" rx="2" ry="2"/></svg>',
    ],
    [
      'num' => '02',
      'title' => 'Kirim Bukti via WhatsApp CS',
      'description' => 'Hubungi nomor WhatsApp resmi Lanyard Medan dalam batas waktu 3x24 jam setelah paket dinyatakan tiba oleh ekspedisi.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
      </svg>',
    ],
    [
      'num' => '03',
      'title' => 'Validasi Cepat oleh Tim QC',
      'description' => 'Tim penjamin mutu kami memeriksa bukti fisik dan mencocokkannya dengan file approval mockup maksimal 1 hari kerja.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
    ],
    [
      'num' => '04',
      'title' => 'Cetak Ulang & Kirim Pengganti',
      'description' => 'Unit pengganti langsung diproduksi secara prioritas dan dikirimkan kembali ke alamat Anda tanpa biaya tambahan.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    ],
  ];

  $warrantyFaqs = config('seo.warranty_faq', []);
@endphp

<div class="warranty-page">
  {{-- Hero Section --}}
  <section class="warranty-hero" id="warranty-hero" aria-labelledby="warranty-title">
    <div class="home-shell home-shell--wide warranty-hero__container">
      <div class="warranty-hero__content">
        <div class="warranty-hero__eyebrow-wrap">
          <span class="warranty-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="warranty-hero__eyebrow">JAMINAN KUALITAS &amp; KEPUASAN 100%</span>
        </div>

        <h1 id="warranty-title" class="warranty-hero__title">
          Garansi Kualitas Cetak &amp; Kepuasan Produksi di <span class="warranty-hero__title-accent">Lanyard Medan.</span>
        </h1>

        <p class="warranty-hero__desc">
          Kami berkomitmen memberikan hasil cetak tali lanyard terbaik dengan warna tajam, bahan tissue halus, dan aksesoris kokoh. Jika ada cacat produksi, kami cetak ulang secara gratis tanpa kompromi.
        </p>

        <div class="warranty-hero__actions">
          <a class="warranty-btn warranty-btn--primary ptl-button-motion" href="{{ $claimWhatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="warranty-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Klaim Garansi via WhatsApp</span>
            <span class="warranty-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="warranty-btn warranty-btn--secondary ptl-button-motion" href="{{ route('terms') }}" data-button-motion>
            <span data-button-label>Pelajari Syarat &amp; Ketentuan</span>
            <span class="warranty-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="warranty-hero__visual">
        <div class="warranty-hero__image-card">
          <picture>
            <source srcset="/uploads/hero-garansi-lanyard-medan-1280w.webp 1280w, /uploads/hero-garansi-lanyard-medan-960w.webp 960w, /uploads/hero-garansi-lanyard-medan-640w.webp 640w" sizes="(max-width: 767px) 100vw, 560px" type="image/webp">
            <img
              src="/uploads/hero-garansi-lanyard-medan.webp"
              alt="Jaminan garansi kualitas cetak tali lanyard custom Lanyard Medan"
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

  {{-- 4 Pilar Komitmen Garansi --}}
  <section class="warranty-commitments" id="komitmen-garansi" aria-label="Komitmen garansi kualitas Lanyard Medan">
    <div class="home-shell home-shell--wide">
      <div class="warranty-commitments__grid">
        @foreach($commitments as $item)
          <div class="warranty-commitment-card">
            <div class="warranty-commitment-card__icon" aria-hidden="true">
              {!! $item['icon'] !!}
            </div>
            <h3 class="warranty-commitment-card__title">{{ $item['title'] }}</h3>
            <p class="warranty-commitment-card__desc">{{ $item['description'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Matriks Cakupan Garansi (2 Card Komparasi Seimbang) --}}
  <section class="warranty-coverage" id="cakupan-garansi" aria-labelledby="coverage-title">
    <div class="home-shell home-shell--wide">
      <header class="warranty-section-intro">
        <p class="warranty-section-eyebrow">TRANSPARANSI KUALITAS</p>
        <h2 id="coverage-title" class="warranty-section-title">Cakupan Garansi &amp; Ketentuan Standar Produksi</h2>
        <p class="warranty-section-lead">Kami menjamin hak Anda sebagai pemesan dengan kejelasan rincian cacat yang dilindungi dan batasan toleransi industri.</p>
      </header>

      <div class="warranty-coverage__grid">
        {{-- Card 1: Dijamin (Covered) --}}
        <article class="warranty-coverage-card warranty-coverage-card--covered">
          <div class="warranty-coverage-card__header">
            <div class="warranty-coverage-card__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
            </div>
            <div>
              <span class="warranty-coverage-card__badge warranty-coverage-card__badge--covered">DILINDUNGI PENUH</span>
              <h3 class="warranty-coverage-card__title">Cacat Produksi yang Dijamin</h3>
            </div>
          </div>

          <ul class="warranty-coverage-card__list">
            @foreach($coveredItems as $item)
              <li>
                <span class="warranty-coverage-card__check" aria-hidden="true">
                  <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                </span>
                <span>{{ $item }}</span>
              </li>
            @endforeach
          </ul>
        </article>

        {{-- Card 2: Batasan & Toleransi (Excluded/Limits) --}}
        <article class="warranty-coverage-card warranty-coverage-card--excluded">
          <div class="warranty-coverage-card__header">
            <div class="warranty-coverage-card__icon warranty-coverage-card__icon--excluded" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><line x1="12" y1="8" x2="12" y2="12"/><line x1="12" y1="16" x2="12.01" y2="16"/></svg>
            </div>
            <div>
              <span class="warranty-coverage-card__badge warranty-coverage-card__badge--excluded">KETENTUAN &amp; TOLERANSI</span>
              <h3 class="warranty-coverage-card__title">Kondisi di Luar Cakupan</h3>
            </div>
          </div>

          <ul class="warranty-coverage-card__list warranty-coverage-card__list--excluded">
            @foreach($excludedItems as $item)
              <li>
                <span class="warranty-coverage-card__bullet" aria-hidden="true">•</span>
                <span>{{ $item }}</span>
              </li>
            @endforeach
          </ul>
        </article>
      </div>
    </div>
  </section>

  {{-- Alur Klaim Garansi 4 Langkah Mudah --}}
  <section class="warranty-steps" id="alur-klaim" aria-labelledby="steps-title">
    <div class="home-shell home-shell--wide">
      <header class="warranty-section-intro">
        <p class="warranty-section-eyebrow">PROSEDUR MUDAH</p>
        <h2 id="steps-title" class="warranty-section-title">4 Langkah Pengajuan Klaim Tanpa Ribet</h2>
        <p class="warranty-section-lead">Cukup kirimkan dokumentasi unboxing via WhatsApp, tim kami segera memproses unit pengganti untuk Anda.</p>
      </header>

      <div class="warranty-steps__grid" role="list">
        @foreach($claimSteps as $step)
          <article class="warranty-step-card" role="listitem">
            <div class="warranty-step-card__meta">
              <span class="warranty-step-card__num">{{ $step['num'] }}</span>
              <div class="warranty-step-card__icon" aria-hidden="true">
                {!! $step['icon'] !!}
              </div>
            </div>
            <h3 class="warranty-step-card__title">{{ $step['title'] }}</h3>
            <p class="warranty-step-card__desc">{{ $step['description'] }}</p>
          </article>
        @endforeach
      </div>

      <div class="warranty-steps__notice">
        <span class="warranty-steps__notice-icon" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="10"/>
            <polyline points="12 6 12 12 16 14"/>
          </svg>
        </span>
        <p><strong>Batas Waktu Klaim:</strong> Pengajuan klaim garansi dapat diproses maksimal <strong>3x24 jam</strong> sejak paket dinyatakan sampai oleh sistem ekspedisi demi kemudahan investigasi kualitas.</p>
      </div>
    </div>
  </section>

  {{-- FAQ Garansi --}}
  <section class="warranty-faq" id="faq-garansi" aria-labelledby="faq-title">
    <div class="home-shell home-shell--wide warranty-faq__container">
      <header class="warranty-faq__intro">
        <p class="warranty-faq__eyebrow">FAQ GARANSI</p>
        <h2 id="faq-title" class="warranty-faq__title">Hal yang Sering Ditanyakan Seputar Garansi</h2>
        <p class="warranty-faq__lead">Rangkuman informasi prosedur klaim, penggantian unit, dan syarat video unboxing.</p>
      </header>

      <div class="warranty-faq__list">
        @foreach($warrantyFaqs as $faq)
          <details class="warranty-faq__item">
            <summary class="warranty-faq__summary">
              <span>{{ $faq['question'] }}</span>
              <span class="warranty-faq__chevron" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
              </span>
            </summary>
            <div class="warranty-faq__answer">
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
            <span class="home-cta__eyebrow">PRODUKSI AMAN &amp; BERGARANSI</span>
          </div>

          <h2 id="home-cta-title" class="home-cta__title">
            Pesan Lanyard Custom dengan Rasa <span class="home-cta__title-accent">Tenang &amp; Pasti.</span>
          </h2>

          <p class="home-cta__desc">
            Dapatkan jaminan kualitas cetak terbaik dan proteksi garansi 100% dari Lanyard Medan. Hubungi kami sekarang untuk penawaran harga dan konsultasi gratis.
          </p>

          <div class="home-cta__buttons">
            <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $claimWhatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
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
            alt="Garansi kualitas cetak tali lanyard custom Lanyard Medan"
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
  @include('components.schema.warranty', ['warrantyFaqs' => $warrantyFaqs])
@endpush
@endsection
