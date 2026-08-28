@extends('layouts.public')

@section('title', 'Alur & Cara Pemesanan Tali Lanyard Custom | Lanyard Palembang')
@section('meta_description', 'Panduan lengkap cara pesan tali lanyard custom di Lanyard Palembang: konsultasi kebutuhan, approval mockup digital gratis, produksi kilat 1–3 hari, dan pengiriman aman bergaransi.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/cara-pemesanan')
@section('seo_og_image', '/uploads/hero-cara-pemesanan-lanyard.webp')

@push('head')
  <link rel="stylesheet" href="/css/ordering-index.css?v={{ file_exists(public_path('css/ordering-index.css')) ? filemtime(public_path('css/ordering-index.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya ingin konsultasi alur pemesanan tali lanyard custom.');

  $quickStats = [
    ['title' => 'Gratis Mockup 3D', 'desc' => 'Preview layout sebelum naik cetak'],
    ['title' => 'Min. Order 50 Pcs', 'desc' => 'Fleksibel instansi & kepanitiaan'],
    ['title' => '1–3 Hari Produksi', 'desc' => 'Mesin sublimasi kapasitas tinggi'],
    ['title' => 'Garansi QC 100%', 'desc' => 'Jaminan ganti baru jika cacat fisik'],
  ];

  $readinessPillars = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 20h9"/><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"/></svg>',
      'title' => '1. Desain & Warna Brand',
      'items' => [
        'File master logo resolusi tinggi (PNG / PDF / AI / CDR)',
        'Kode warna resmi instansi (HEX atau Pantone)',
        'Teks / slogan tambahan pada sisi sebalik tali',
      ],
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20.59 13.41l-7.17 7.17a2 2 0 0 1-2.83 0L2 12V2h10l8.59 8.59a2 2 0 0 1 0 2.82z"/><line x1="7" y1="7" x2="7.01" y2="7"/></svg>',
      'title' => '2. Spesifikasi Fisik Tali',
      'items' => [
        'Pilihan lebar tali: 1.5 cm / 2.0 cm / 2.5 cm',
        'Karakter bahan: Tissue ultra-halus atau Nylon kuat',
        'Aksesoris: Pengait oval, stopper putar, safety buckle',
      ],
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
      'title' => '3. Timeline & Pengiriman',
      'items' => [
        'Perkiraan jumlah kuantitas (mulai 50 pcs hingga ribuan)',
        'Target tanggal pesanan harus tiba di lokasi acara',
        'Alamat lengkap pengiriman untuk cek ekspedisi tercepat',
      ],
    ],
  ];

  $orderPhases = [
    [
      'phaseTag' => 'FASE 01',
      'phaseTitle' => 'Konsultasi & Digital Prototyping',
      'phaseSla' => 'Estimasi: 1–3 Jam',
      'steps' => [
        [
          'num' => '01',
          'title' => 'Konsultasi Kebutuhan & Rekomendasi Bahan',
          'description' => 'Sampaikan konsep kebutuhan lanyard Anda bersama sales spesialis kami. Kami akan merekomendasikan opsi bahan terbaik, lebar tali ideal, dan perhitungan budget paling efisien.',
        ],
        [
          'num' => '02',
          'title' => 'Kirim File & Pembuatan Mockup 3D Gratis',
          'description' => 'Kirimkan master logo Anda. Tim kreatif kami akan langsung memproses digital mockup cetak bolak-balik beresolusi tinggi untuk Anda review tanpa pungutan biaya.',
        ],
      ],
    ],
    [
      'phaseTag' => 'FASE 02',
      'phaseTitle' => 'Validasi & Produksi Presisi',
      'phaseSla' => 'Estimasi: 1–3 Hari Kerja',
      'steps' => [
        [
          'num' => '03',
          'title' => 'Persetujuan Mockup & Invoice Transparan',
          'description' => 'Setelah layout visual dan warna telah Anda setujui (ACC Desain), kami terbitkan invoice penawaran resmi yang jelas, transparan, dan tanpa biaya siluman.',
        ],
        [
          'num' => '04',
          'title' => 'Konfirmasi DP & Antrean Cetak Massal',
          'description' => 'Konfirmasi pembayaran uang muka (DP) via rekening resmi perusahaan kami. Pesanan Anda langsung masuk ke antrean mesin cetak digital sublimasi beresolusi tinggi.',
        ],
      ],
    ],
    [
      'phaseTag' => 'FASE 03',
      'phaseTitle' => 'Quality Assurance & Distribusi Aman',
      'phaseSla' => 'Estimasi: Drop Same-Day / 1–3 Hari',
      'steps' => [
        [
          'num' => '05',
          'title' => 'Quality Control Ketat & Finishing Aksesoris',
          'description' => 'Setiap helai lanyard dirakit presisi, dipasangi aksesoris pilihan, serta melalui double QC untuk memastikan ketajaman cetak, kerapian jahitan, dan fungsi hardware.',
        ],
        [
          'num' => '06',
          'title' => 'Packing Kedap & Pengiriman Nomor Resi Aktif',
          'description' => 'Lanyard di-packing steril kedap air per 50 pcs, dibungkus kardus tebal berlapis bubble wrap, dan nomor resi ekspedisi resmi langsung dikirimkan via WhatsApp.',
        ],
      ],
    ],
  ];

  $qualityGates = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"/><path d="m9 12 2 2 4-4"/></svg>',
      'title' => 'Presisi Warna 98%',
      'desc' => 'Kalibrasi cetak CMYK akurat',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
      'title' => 'Bahan Tissue Lembut',
      'desc' => 'Nyaman seharian di leher',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="m9 12 2 2 4-4"/></svg>',
      'title' => 'Hardware Anti-Karat',
      'desc' => 'Pengait tebal & pegas kokoh',
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16Z"/><path d="m3.3 7 8.7 5 8.7-5"/><path d="M12 22V12"/></svg>',
      'title' => 'Packing Seal Kedap',
      'desc' => 'Aman dari benturan & hujan',
    ],
  ];

  $orderFaqs = config('seo.faq', []);
@endphp

<div class="ordering-page">
  {{-- 1. HERO SECTION --}}
  <section class="ordering-hero" id="ordering-hero" aria-labelledby="ordering-title">
    <div class="home-shell home-shell--wide ordering-hero__container">
      <div class="ordering-hero__content">
        <div class="ordering-hero__eyebrow-wrap">
          <span class="ordering-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="ordering-hero__eyebrow">PANDUAN LENGKAP &amp; ALUR TRANSAKSI</span>
        </div>

        <h1 id="ordering-title" class="ordering-hero__title">
          Dari Konsep Desain Hingga Lanyard Tiba di Meja Anda.
        </h1>

        <p class="ordering-hero__desc">
          Kami memandu setiap tahapan dengan transparan: konsultasi spesifikasi bahan, pembuatan layout digital 3D gratis sebelum bayar, produksi cetak presisi 1–3 hari, hingga paket mendarat aman bergaransi.
        </p>

        <div class="ordering-hero__actions">
          <a class="ordering-btn ordering-btn--primary" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span class="ordering-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span>Mulai Konsultasi WhatsApp</span>
            <span class="ordering-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="ordering-btn ordering-btn--secondary" href="{{ route('products.index') }}">
            <span>Lihat Katalog Produk</span>
            <span class="ordering-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>

        {{-- Quick Stats Ribbon --}}
        <div class="ordering-hero__stats">
          @foreach($quickStats as $stat)
            <div class="ordering-hero__stat-pill">
              <strong>{{ $stat['title'] }}</strong>
              <span>{{ $stat['desc'] }}</span>
            </div>
          @endforeach
        </div>
      </div>

      <div class="ordering-hero__visual">
        <div class="ordering-hero__image-card">
          <img
            src="/uploads/hero-cara-pemesanan-lanyard.webp?v={{ file_exists(public_path('uploads/hero-cara-pemesanan-lanyard.webp')) ? filemtime(public_path('uploads/hero-cara-pemesanan-lanyard.webp')) : 1 }}"
            alt="Proses pemesanan tali lanyard custom Lanyard Palembang dengan standar kualitas tinggi"
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

  {{-- 2. PRE-ORDER READINESS HUB (3-COLUMN MATRIX) --}}
  <section class="ordering-readiness" id="readiness-hub" aria-labelledby="ordering-readiness-title">
    <div class="home-shell home-shell--wide ordering-readiness__container">
      <header class="ordering-readiness__header">
        <p class="ordering-readiness__eyebrow">CHECKLIST PRA-PEMESANAN</p>
        <h2 id="ordering-readiness-title" class="ordering-readiness__title">
          3 Hal Sederhana yang Perlu Anda Siapkan
        </h2>
        <p class="ordering-readiness__lead">
          Agar pembuatan mockup gratis dan penerbitan penawaran harga berjalan dalam hitungan menit, pastikan rincian berikut sudah siap:
        </p>
      </header>

      <div class="ordering-readiness__matrix">
        @foreach($readinessPillars as $pillar)
          <div class="ordering-readiness__card">
            <div class="ordering-readiness__card-icon" aria-hidden="true">
              {!! $pillar['icon'] !!}
            </div>
            <h3 class="ordering-readiness__card-title">{{ $pillar['title'] }}</h3>
            <ul class="ordering-readiness__card-list">
              @foreach($pillar['items'] as $item)
                <li>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <polyline points="20 6 9 17 4 12"/>
                  </svg>
                  <span>{{ $item }}</span>
                </li>
              @endforeach
            </ul>
          </div>
        @endforeach
      </div>

      {{-- Action Bar --}}
      <div class="ordering-readiness__action-bar">
        <div class="ordering-readiness__action-text">
          <strong>Belum punya file desain siap cetak?</strong>
          <span>Tenang, tim desainer Lanyard Palembang siap bantu tata letak logo Anda 100% gratis!</span>
        </div>
        <a class="ordering-readiness__action-btn" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
          <span>Kirim Logo via WhatsApp</span>
          <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </section>

  {{-- 3. MASTER 3-PHASE MILESTONE WORKFLOW SECTION --}}
  <section class="ordering-phases" id="ordering-workflow" aria-labelledby="ordering-phases-title">
    <div class="home-shell home-shell--wide">
      <header class="ordering-phases__intro">
        <p class="ordering-phases__eyebrow">WORKFLOW &amp; TIMELINE PRODUKSI</p>
        <h2 id="ordering-phases-title" class="ordering-phases__title">
          Alur 3 Fase Menuju Lanyard Berkualitas Tinggi
        </h2>
        <p class="ordering-phases__lead">
          Transparansi penuh di setiap milestone. Anda memiliki kontrol approval 100% sebelum mesin cetak massal dijalankan.
        </p>
      </header>

      <div class="ordering-phases__list">
        @foreach($orderPhases as $phase)
          <div class="ordering-phase-block">
            <div class="ordering-phase-block__header">
              <div class="ordering-phase-block__badge-wrap">
                <span class="ordering-phase-block__tag">{{ $phase['phaseTag'] }}</span>
                <h3 class="ordering-phase-block__title">{{ $phase['phaseTitle'] }}</h3>
              </div>
              <span class="ordering-phase-block__sla">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <circle cx="12" cy="12" r="10"/>
                  <polyline points="12 6 12 12 16 14"/>
                </svg>
                <span>{{ $phase['phaseSla'] }}</span>
              </span>
            </div>

            <div class="ordering-phase-block__grid">
              @foreach($phase['steps'] as $step)
                <article class="ordering-phase-card">
                  <div class="ordering-phase-card__num-box">
                    <span>{{ $step['num'] }}</span>
                  </div>
                  <div class="ordering-phase-card__body">
                    <h4 class="ordering-phase-card__title">{{ $step['title'] }}</h4>
                    <p class="ordering-phase-card__desc">{{ $step['description'] }}</p>
                  </div>
                </article>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 4. QUALITY GATES / STANDAR MUTU STRIP --}}
  <section class="ordering-quality-gates" aria-label="Standar jaminan kualitas produksi Lanyard Palembang">
    <div class="home-shell home-shell--wide">
      <ul class="ordering-quality-gates__grid">
        @foreach($qualityGates as $gate)
          <li class="ordering-quality-gates__item">
            <div class="ordering-quality-gates__icon" aria-hidden="true">
              {!! $gate['icon'] !!}
            </div>
            <div class="ordering-quality-gates__text">
              <strong>{{ $gate['title'] }}</strong>
              <span>{{ $gate['desc'] }}</span>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </section>

  {{-- 5. FAQ SECTION (2-COLUMN BALANCED) --}}
  <section class="ordering-faq" id="ordering-faq" aria-labelledby="ordering-faq-title">
    <div class="home-shell home-shell--wide ordering-faq__container">
      <header class="ordering-faq__intro">
        <p class="ordering-faq__eyebrow">TANYA JAWAB CEPAT</p>
        <h2 id="ordering-faq-title" class="ordering-faq__title">Hal yang Sering Ditanyakan Calon Pemesan</h2>
        <p class="ordering-faq__lead">Informasi seputar fleksibilitas jumlah pesanan, revisi desain mockup, dan estimasi waktu kirim.</p>
      </header>

      <div class="ordering-faq__list">
        @foreach($orderFaqs as $faq)
          <details class="ordering-faq__item">
            <summary class="ordering-faq__summary">
              <span>{{ $faq['question'] }}</span>
              <span class="ordering-faq__chevron" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
              </span>
            </summary>
            <div class="ordering-faq__content">
              <p>{{ $faq['answer'] }}</p>
            </div>
          </details>
        @endforeach
      </div>
    </div>
  </section>

  {{-- 6. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')

@push('schema')
  @php
    $allFlatSteps = [];
    foreach($orderPhases as $ph) {
      foreach($ph['steps'] as $st) {
        $allFlatSteps[] = $st;
      }
    }
  @endphp
  @include('components.schema.ordering', ['orderSteps' => $allFlatSteps, 'orderFaqs' => $orderFaqs])
@endpush
@endsection
