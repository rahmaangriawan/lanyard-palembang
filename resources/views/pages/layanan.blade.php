@extends('layouts.public')

@section('title', 'Layanan Cetak Tali Lanyard Custom & ID Card Palembang | Lanyard Palembang')
@section('meta_description', 'Solusi cetak tali lanyard custom dan ID card terpercaya di Kota Palembang: teknik sublimasi HD full color anti luntur, bahan tissue lembut, garansi kualitas, dan pengerjaan kilat 1–3 hari.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/layanan')
@section('seo_og_image', '/uploads/hero-layanan-lanyard-palembang.webp')

@push('head')
  <link rel="stylesheet" href="/css/services-index.css?v={{ file_exists(public_path('css/services-index.css')) ? filemtime(public_path('css/services-index.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau konsultasi layanan cetak lanyard custom & ID card.');

  $pillars = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="M12 2a14.5 14.5 0 0 0 0 20 14.5 14.5 0 0 0 0-20"/><path d="M2 12h20"/></svg>',
      'title' => 'Sublimasi HD Full Color',
      'description' => 'Mencetak warna tajam 2 sisi tanpa batasan gradasi, detail logo presisi, serta tahan luntur walau dicuci berkali-kali.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.42 4.58a5.4 5.4 0 0 0-7.65 0l-.77.78-.77-.78a5.4 5.4 0 0 0-7.65 7.65l.77.78L12 20.66l7.65-7.65.77-.78a5.4 5.4 0 0 0 0-7.65z"/></svg>',
      'title' => 'Material Tissue Grade A',
      'description' => 'Serat kain poliester lembut dan padat, sangat nyaman menempel di leher seharian tanpa menimbulkan rasa gatal.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/><polyline points="10 9 9 9 8 9"/></svg>',
      'title' => 'Mockup Digital Gratis',
      'description' => 'Desainer kami membuatkan preview tata letak 3D secara cuma-cuma sebelum proses cetak massal dijalankan.',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>',
      'title' => 'Produksi Cepat 1–3 Hari',
      'description' => 'Kapasitas produksi mesin industri berkecepatan tinggi dengan quality control ganda untuk ketepatan waktu deadline.',
    ],
  ];

  $serviceCatalog = [
    [
      'badge' => 'BEST SELLER',
      'title' => 'Tali Lanyard Printing Sublimasi',
      'description' => 'Pilihan utama instansi korporat dan kepanitiaan acara. Mencetak desain bebas full color bolak-balik pada kain tissue lembut berstandar premium.',
      'points' => [
        'Cetak 2 sisi (depan & belakang) full color',
        'Pilihan lebar tali: 1.5 cm, 2.0 cm, dan 2.5 cm',
        'Dilengkapi kait nikel oval & stopper putar lepas-cepat',
        'Cocok untuk karyawan kantor, seminar, & pameran',
      ],
      'link' => route('products.index'),
    ],
    [
      'badge' => 'EKONOMIS & SOLID',
      'title' => 'Lanyard Polyester Sublimasi Standar',
      'description' => 'Solusi tepat untuk kebutuhan tali lanyard dengan bahan polyester kuat dan cetak sublimasi tajam untuk jumlah pemesanan skala besar.',
      'points' => [
        'Hasil cetak sublimasi awet dan tidak mudah pudar',
        'Bahan poliester nilon kuat berdaya tahan tinggi',
        'Biaya produksi sangat hemat untuk partai ribuan pcs',
        'Cocok untuk seragam pabrik, sekolah, & organisasi',
      ],
      'link' => route('products.index'),
    ],
    [
      'badge' => 'PAKET LENGKAP',
      'title' => 'Bundling Lanyard + ID Card PVC',
      'description' => 'Paket all-in-one praktis berisi tali lanyard custom lengkap dengan kartu identitas PVC standar kartu ATM dan wadah casing pelindung.',
      'points' => [
        'Cetak kartu PVC tebal anti patah & waterproof',
        'Pilihan casing: Mika bening, Hardcase doff, atau Kulit sintetis',
        'Langsung siap pakai tanpa perlu repot merakit sendiri',
        'Ideal untuk kartu akses pegawai, member VIP, & panitia',
      ],
      'link' => route('products.index'),
    ],
    [
      'badge' => 'DEADLINE KILAT',
      'title' => 'Layanan Prioritas & Express Event',
      'description' => 'Jalur antrean khusus bagi kepanitiaan event atau perusahaan yang membutuhkan lanyard siap pakai dalam tempo singkat 24–48 jam.',
      'points' => [
        'Penanganan prioritas oleh tim produksi khusus',
        'Proses approval desain kilat di hari yang sama',
        'Opsi pengiriman Same Day / kurir instan area Palembang',
        'Menyelamatkan kebutuhan acara mendadak tanpa kompromi kualitas',
      ],
      'link' => 'https://wa.me/6282210200700?text=' . rawurlencode('Halo Lanyard Palembang, saya ada kebutuhan pesanan lanyard express mendesak.'),
    ],
  ];

  $customizationSpecs = [
    [
      'num' => '01',
      'title' => 'Pilihan Lebar Tali (1.5 / 2.0 / 2.5 cm)',
      'description' => 'Sesuaikan dengan kebutuhan visual brand Anda. Ukuran 2.0 cm adalah standar korporat paling populer, sedangkan 2.5 cm memberikan ruang cetak ekstra luas.',
    ],
    [
      'num' => '02',
      'title' => 'Kait Besi Nikel Kuat (Hook Oval / Lobster)',
      'description' => 'Pengait logam berkualitas anti karat yang kokoh menjepit ID card holder maupun gantungan kunci agar tidak mudah lepas saat beraktivitas.',
    ],
    [
      'num' => '03',
      'title' => 'Stopper Putar & Safety Breakaway Buckle',
      'description' => 'Aksesoris sambungan plastik ergonomis yang memudahkan pelepasan kartu akses tap-in, serta opsi safety buckle pelepas otomatis demi keselamatan kerja.',
    ],
    [
      'num' => '04',
      'title' => 'Pilihan Casing Holder ID Card Variatif',
      'description' => 'Sedia card holder hardcase plastik doff 1-sisi/2-sisi, plastik mika lentur waterproof, hingga bahan kulit sintetis premium untuk kesan eksekutif.',
    ],
  ];

  $audiences = [
    [
      'title' => 'Perusahaan & Korporasi',
      'desc' => 'Tali tanda pengenal profesional karyawan, kartu akses tapping gedung kantor, dan paket onboarding staff baru.',
    ],
    [
      'title' => 'Instansi Pemerintah & BUMN',
      'desc' => 'Atribut resmi identitas ASN, kartu keanggotaan dinas, lanyard kegiatan kunjungan kerja, dan pelatihan instansi.',
    ],
    [
      'title' => 'Universitas & Sekolah',
      'desc' => 'Tali kartu tanda mahasiswa (KTM), identitas siswa & guru sekolah, kepanitiaan wisuda, serta orientasi kampus.',
    ],
    [
      'title' => 'Event Organizer & Komunitas',
      'desc' => 'Pass lanyard peserta seminar, ID panitia konser/festival, merchandise komunitas hobi, dan tanda peserta pameran.',
    ],
  ];

  $serviceFaqs = config('seo.faq', []);
@endphp

<div class="services-page">
  {{-- Hero Section --}}
  <section class="services-hero" id="services-hero" aria-labelledby="services-title">
    <div class="home-shell home-shell--wide services-hero__container">
      <div class="services-hero__content">
        <div class="services-hero__eyebrow-wrap">
          <span class="services-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="services-hero__eyebrow">LAYANAN CETAK LANYARD CUSTOM PALEMBANG</span>
        </div>

        <h1 id="services-title" class="services-hero__title">
          Solusi Cetak Tali Lanyard &amp; ID Card Berkualitas di <span class="services-hero__title-accent">Kota Palembang.</span>
        </h1>

        <p class="services-hero__desc">
          Kami menyediakan layanan produksi tali lanyard printing berkualitas tinggi dengan pilihan material premium, hasil cetak tajam anti-luntur, pembuatan mockup digital gratis, dan pengerjaan kilat 1–3 hari kerja.
        </p>

        <div class="services-hero__actions">
          <a class="services-btn services-btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="services-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Konsultasi Layanan via WhatsApp</span>
            <span class="services-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="services-btn services-btn--secondary ptl-button-motion" href="{{ route('products.index') }}" data-button-motion>
            <span data-button-label>Eksplor Pilihan Produk</span>
            <span class="services-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="services-hero__visual">
        <div class="services-hero__image-card">
          <picture>
            <source srcset="/uploads/hero-layanan-lanyard-palembang-1280w.webp 1280w, /uploads/hero-layanan-lanyard-palembang-960w.webp 960w, /uploads/hero-layanan-lanyard-palembang-640w.webp 640w" sizes="(max-width: 767px) 100vw, 560px" type="image/webp">
            <img
              src="/uploads/hero-layanan-lanyard-palembang.webp"
              alt="Layanan cetak tali lanyard custom dan ID card berkualitas Lanyard Palembang"
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

  {{-- 4 Pilar Keunggulan Produksi --}}
  <section class="services-pillars" id="keunggulan-layanan" aria-label="Keunggulan layanan produksi Lanyard Palembang">
    <div class="home-shell home-shell--wide">
      <div class="services-pillars__grid">
        @foreach($pillars as $pillar)
          <div class="services-pillar-card">
            <div class="services-pillar-card__icon" aria-hidden="true">
              {!! $pillar['icon'] !!}
            </div>
            <h3 class="services-pillar-card__title">{{ $pillar['title'] }}</h3>
            <p class="services-pillar-card__desc">{{ $pillar['description'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 4 Pilihan Produk Layanan Utama (2x2 Grid) --}}
  <section class="services-catalog" id="katalog-layanan" aria-labelledby="catalog-title">
    <div class="home-shell home-shell--wide">
      <header class="services-section-intro">
        <p class="services-section-eyebrow">KATALOG LAYANAN</p>
        <h2 id="catalog-title" class="services-section-title">Pilihan Layanan Cetak Sesuai Kebutuhan Brand</h2>
        <p class="services-section-lead">Pilih paket pembuatan tali lanyard sublimasi full color, polyester standar, hingga paket bundling kartu identitas siap pakai.</p>
      </header>

      <div class="services-catalog__grid">
        @foreach($serviceCatalog as $item)
          <article class="services-card">
            <div class="services-card__header">
              <span class="services-card__badge">{{ $item['badge'] }}</span>
            </div>

            <h3 class="services-card__title">{{ $item['title'] }}</h3>
            <p class="services-card__desc">{{ $item['description'] }}</p>

            <ul class="services-card__points">
              @foreach($item['points'] as $point)
                <li>
                  <span class="services-card__check" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                  </span>
                  <span>{{ $point }}</span>
                </li>
              @endforeach
            </ul>

            <div class="services-card__footer">
              <a href="{{ $item['link'] }}" class="services-card__btn ptl-button-motion" data-button-motion>
                <span data-button-label>Lihat Detail &amp; Pesan</span>
                <span class="services-card__btn-arrow" aria-hidden="true">→</span>
              </a>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Panduan Spesifikasi & Kustomisasi Teknis --}}
  <section class="services-specs" id="opsi-kustomisasi" aria-labelledby="specs-title">
    <div class="home-shell home-shell--wide services-specs__layout">
      {{-- Sisi Kiri: Sticky Intro Card --}}
      <div class="services-specs__intro-card">
        <span class="services-specs__tag">PANDUAN KUSTOMISASI</span>
        <h2 id="specs-title">Bebas Menyesuaikan Detail &amp; Aksesoris</h2>
        <p>Setiap komponen tali lanyard dapat dikustomisasi secara fleksibel, mulai dari lebar pita, model kait logam, stopper pengaman, hingga wadah kartu identitas.</p>

        <a class="services-btn services-btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
          <span class="services-btn__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
          </span>
          <span data-button-label>Minta Rekomendasi Spesifikasi</span>
          <span class="services-btn__arrow" aria-hidden="true">→</span>
        </a>
      </div>

      {{-- Sisi Kanan: 4 Kartu Spesifikasi --}}
      <div class="services-specs__list">
        @foreach($customizationSpecs as $spec)
          <article class="services-spec-item">
            <span class="services-spec-item__num">{{ $spec['num'] }}</span>
            <div class="services-spec-item__content">
              <h3 class="services-spec-item__title">{{ $spec['title'] }}</h3>
              <p class="services-spec-item__desc">{{ $spec['description'] }}</p>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Solusi Sektor Pengguna --}}
  <section class="services-audiences" id="sektor-pengguna" aria-labelledby="audiences-title">
    <div class="home-shell home-shell--wide">
      <header class="services-section-intro">
        <p class="services-section-eyebrow">SEKTOR &amp; INDUSTRI</p>
        <h2 id="audiences-title" class="services-section-title">Dipercaya Berbagai Organisasi di Indonesia</h2>
        <p class="services-section-lead">Mulai dari perusahaan multinasional, kementerian, universitas, hingga kepanitiaan event festival.</p>
      </header>

      <div class="services-audiences__grid">
        @foreach($audiences as $aud)
          <div class="services-audience-card">
            <h3 class="services-audience-card__title">{{ $aud['title'] }}</h3>
            <p class="services-audience-card__desc">{{ $aud['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- FAQ Layanan --}}
  <section class="services-faq" id="faq-layanan" aria-labelledby="faq-title">
    <div class="home-shell home-shell--wide services-faq__container">
      <header class="services-faq__intro">
        <p class="services-faq__eyebrow">FAQ LAYANAN</p>
        <h2 id="faq-title" class="services-faq__title">Hal yang Sering Ditanyakan Seputar Pemesanan</h2>
        <p class="services-faq__lead">Informasi praktis seputar minimal order, format file logo, dan waktu produksi kilat.</p>
      </header>

      <div class="services-faq__list">
        @foreach($serviceFaqs as $faq)
          <details class="services-faq__item">
            <summary class="services-faq__summary">
              <span>{{ $faq['question'] }}</span>
              <span class="services-faq__chevron" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
              </span>
            </summary>
            <div class="services-faq__answer">
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
            Siap Memproduksi Lanyard Custom untuk <span class="home-cta__title-accent">Acara Anda?</span>
          </h2>

          <p class="home-cta__desc">
            Diskusikan kebutuhan jumlah dan target waktu kegiatan Anda bersama tim kami. Dapatkan penawaran harga terbaik dan sampel mockup digital secara gratis hari ini.
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
            alt="Layanan cetak tali lanyard custom berkualitas tinggi Lanyard Palembang"
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
  @include('components.schema.services', ['serviceFaqs' => $serviceFaqs])
@endpush
@endsection
