@extends('layouts.public')

@section('title', 'Layanan Pengiriman Lanyard Custom Cepat & Bergaransi | Lanyard Medan')
@section('meta_description', 'Layanan ekspedisi dan pengiriman lanyard custom dari Medan ke seluruh Indonesia: garansi packing anti-rusak, kemudahan cek nomor resi online, serta proteksi pengiriman terpercaya.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/pengiriman')
@section('seo_og_image', '/uploads/hero-pengiriman-lanyard-medan.webp')

@push('head')
  <link rel="stylesheet" href="/css/shipping-index.css?v={{ file_exists(public_path('css/shipping-index.css')) ? filemtime(public_path('css/shipping-index.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya mau cek estimasi ongkos kirim dan jadwal ekspedisi lanyard custom.');

  $shippingServices = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
      'badge' => 'PENGIRIMAN LOKAL',
      'title' => 'Wilayah Medan & Sekitarnya',
      'description' => 'Solusi distribusi kilat untuk instansi perkantoran dan kepanitiaan event di Kota Medan, Binjai, Deli Serdang, hingga Karo.',
      'points' => [
        'Estimasi 1–2 hari kerja setelah cetak tuntas',
        'Subsidi & promo gratis ongkos kirim reguler',
        'Tersedia opsi kirim instan Same Day via kurir lokal',
        'Sangat tepat untuk kebutuhan deadline event mendesak',
      ],
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/><path d="M14.05 2a9 9 0 0 1 7.95 7.95"/><path d="M14.05 6A5 5 0 0 1 18 9.95"/></svg>',
      'badge' => 'EKSPEDISI ANTAR PULAU',
      'title' => 'Pengiriman Nasional se-Indonesia',
      'description' => 'Bermitra dengan operator kargo dan kurir nasional untuk menjamin paket sampai selamat di pulau Sumatera, Jawa, Kalimantan, Sulawesi, hingga Papua.',
      'points' => [
        'Estimasi 2–6 hari kerja via JNE, J&T, SiCepat, atau Cargo',
        'Opsi kargo darat/udara ekonomis untuk order skala besar (1.000+ pcs)',
        'Packing waterproof berlapis bubble wrap tebal anti-basah',
        'Tracking resi real-time yang langsung dikirimkan ke kontak WhatsApp',
      ],
    ],
  ];

  $shippingSteps = [
    [
      'num' => '01',
      'title' => 'Validasi Data Penerima & Deadline',
      'description' => 'Memastikan kelengkapan nama PIC penerima, nomor telepon aktif, patokan alamat presisi, dan tanggal waktu kegiatan agar tidak terlambat.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>',
    ],
    [
      'num' => '02',
      'title' => 'Pemeriksaan Kualitas Fisik (QC)',
      'description' => 'Menghitung ulang total kuantitas lanyard, ketajaman cetakan bolak-balik, dan kekuatan jepitan kait stopper sebelum dibungkus.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>',
    ],
    [
      'num' => '03',
      'title' => 'Proteksi Packing Ekstra Tebal',
      'description' => 'Lanyard diikat rapi per 50/100 pcs dalam plastik seal tertutup, dimasukkan ke kardus kuat, dan dilapisi plastik bubble wrap tahan hujan.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/></svg>',
    ],
    [
      'num' => '04',
      'title' => 'Drop Ekspedisi & Kirim Resi Resmi',
      'description' => 'Paket diserahkan ke agen ekspedisi dan bukti resi fisik beserta nomor tracking digital langsung dibagikan ke WhatsApp pemesan.',
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
    ],
  ];

  $shippingEstimates = [
    [
      'area' => 'Kota Medan, Binjai, & Deli Serdang',
      'estimate' => '1–2 Hari Kerja',
      'cost' => 'Gratis Ongkir Reguler / Tersedia Kurir Instan',
      'highlight' => true,
    ],
    [
      'area' => 'Kabupaten Lain di Sumatera Utara',
      'estimate' => '2–3 Hari Kerja',
      'cost' => 'Tarif Domestik Terjangkau via Kurir Lokal',
      'highlight' => false,
    ],
    [
      'area' => 'Provinsi Sumatera (Aceh, Riau, Sumbar, Sumsel, Lampung)',
      'estimate' => '2–4 Hari Kerja',
      'cost' => 'Tersedia Promo Subsidi Ongkir / Kargo Bus & Darat',
      'highlight' => false,
    ],
    [
      'area' => 'DKI Jakarta, Jawa Barat, Jateng, Jatim, & Bali',
      'estimate' => '3–5 Hari Kerja',
      'cost' => 'Pilihan Layanan Udara Cepat / Kargo Volume',
      'highlight' => false,
    ],
    [
      'area' => 'Kalimantan, Sulawesi, Maluku, & Papua',
      'estimate' => '4–7 Hari Kerja',
      'cost' => 'Kargo Udara / Laut Resmi dengan Tracking GPS',
      'highlight' => false,
    ],
  ];

  $shippingFaqs = config('seo.shipping_faq', []);
@endphp

<div class="shipping-page">
  {{-- Hero Section --}}
  <section class="shipping-hero" id="shipping-hero" aria-labelledby="shipping-title">
    <div class="home-shell home-shell--wide shipping-hero__container">
      <div class="shipping-hero__content">
        <div class="shipping-hero__eyebrow-wrap">
          <span class="shipping-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="shipping-hero__eyebrow">DISTRIBUSI AMAN &amp; TEPAT WAKTU</span>
        </div>

        <h1 id="shipping-title" class="shipping-hero__title">
          Pengiriman Tali Lanyard Terpercaya ke <span class="shipping-hero__title-accent">Seluruh Penjuru Nusantara.</span>
        </h1>

        <p class="shipping-hero__desc">
          Dari Kota Medan langsung menuju pintu kantor Anda. Kami memastikan tiap paket pesanan tali ID card melewati kontrol kualitas ganda, dibungkus kedap air, dan terlindungi penuh hingga tujuan.
        </p>

        <div class="shipping-hero__actions">
          <a class="shipping-btn shipping-btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="shipping-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span data-button-label>Konsultasi Ongkir via WhatsApp</span>
            <span class="shipping-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="shipping-btn shipping-btn--secondary ptl-button-motion" href="{{ route('area') }}" data-button-motion>
            <span data-button-label>Jangkauan Wilayah Layanan</span>
            <span class="shipping-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="shipping-hero__visual">
        <div class="shipping-hero__image-card">
          <img
            src="/uploads/hero-pengiriman-lanyard-medan.webp"
            alt="Proses pengemasan dan ekspedisi tali lanyard custom Lanyard Medan"
            width="1448"
            height="1086"
            loading="eager"
            fetchpriority="high"
            decoding="async"
          >
        </div>
      </div>
    </div>
  </section>

  {{-- Pilihan Layanan Pengiriman (2 Card Grid Seimbang) --}}
  <section class="shipping-services" id="layanan-pengiriman" aria-labelledby="shipping-services-title">
    <div class="home-shell home-shell--wide">
      <header class="shipping-section-intro">
        <p class="shipping-section-eyebrow">PILIHAN LOGISTIK</p>
        <h2 id="shipping-services-title" class="shipping-section-title">Opsi Pengiriman yang Fleksibel &amp; Ekonomis</h2>
        <p class="shipping-section-lead">Disesuaikan dengan batas waktu acara dan kuantitas order Anda, mulai dari kurir instan dalam kota hingga armada kargo antar pulau.</p>
      </header>

      <div class="shipping-services__grid">
        @foreach($shippingServices as $service)
          <article class="shipping-service-card">
            <div class="shipping-service-card__header">
              <div class="shipping-service-card__icon" aria-hidden="true">
                {!! $service['icon'] !!}
              </div>
              <span class="shipping-service-card__badge">{{ $service['badge'] }}</span>
            </div>

            <h3 class="shipping-service-card__title">{{ $service['title'] }}</h3>
            <p class="shipping-service-card__desc">{{ $service['description'] }}</p>

            <ul class="shipping-service-card__points">
              @foreach($service['points'] as $point)
                <li>
                  <span class="shipping-service-card__check" aria-hidden="true">
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

  {{-- Alur 4 Tahap Penanganan Paket --}}
  <section class="shipping-process" id="alur-pengiriman" aria-labelledby="shipping-process-title">
    <div class="home-shell home-shell--wide">
      <header class="shipping-section-intro">
        <p class="shipping-section-eyebrow">STANDARDISASI PACKING</p>
        <h2 id="shipping-process-title" class="shipping-section-title">Prosedur Pengemasan 4 Lapis Perlindungan</h2>
        <p class="shipping-section-lead">Menjaga lanyard tetap rapi, bersih, tidak kusut, dan terhindar dari air hujan selama dalam perjalanan ekspedisi.</p>
      </header>

      <div class="shipping-process__grid" role="list">
        @foreach($shippingSteps as $step)
          <article class="shipping-step-card" role="listitem">
            <div class="shipping-step-card__meta">
              <span class="shipping-step-card__num">{{ $step['num'] }}</span>
              <div class="shipping-step-card__icon" aria-hidden="true">
                {!! $step['icon'] !!}
              </div>
            </div>
            <h3 class="shipping-step-card__title">{{ $step['title'] }}</h3>
            <p class="shipping-step-card__desc">{{ $step['description'] }}</p>
          </article>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Tabel Estimasi Waktu & Biaya Pengiriman --}}
  <section class="shipping-estimates" id="estimasi-pengiriman" aria-labelledby="shipping-estimates-title">
    <div class="home-shell home-shell--wide shipping-estimates__layout">
      {{-- Sisi Kiri: Sticky Intro Card --}}
      <div class="shipping-estimates__intro-card">
        <span class="shipping-estimates__tag">PANDUAN TARIF &amp; DURASI</span>
        <h2 id="shipping-estimates-title">Perkiraan Waktu Tiba ke Lokasi Anda</h2>
        <p>Durasi pengiriman dihitung sejak paket diserahterimakan ke pihak ekspedisi rekanan. Estimasi dapat berbeda tergantung paket reguler atau opsi kargo kilat yang disepakati.</p>

        <a class="shipping-btn shipping-btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
          <span class="shipping-btn__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/></svg>
          </span>
          <span data-button-label>Cek Tarif ke Alamat Saya</span>
          <span class="shipping-btn__arrow" aria-hidden="true">→</span>
        </a>
      </div>

      {{-- Sisi Kanan: Tabel Modern --}}
      <div class="shipping-estimates__table-card">
        <table class="shipping-table">
          <caption class="sr-only">Tabel estimasi waktu dan biaya pengiriman lanyard Lanyard Medan</caption>
          <thead>
            <tr>
              <th scope="col">Wilayah Tujuan</th>
              <th scope="col">Estimasi Perjalanan</th>
              <th scope="col">Opsi Ongkir</th>
            </tr>
          </thead>
          <tbody>
            @foreach($shippingEstimates as $estimate)
              <tr class="{{ $estimate['highlight'] ? 'is-highlight' : '' }}">
                <th scope="row" data-label="Wilayah">
                  <div class="shipping-table__area">
                    <span>{{ $estimate['area'] }}</span>
                    @if($estimate['highlight'])
                      <span class="shipping-table__promo-pill">PROMO MEDAN</span>
                    @endif
                  </div>
                </th>
                <td data-label="Estimasi">{{ $estimate['estimate'] }}</td>
                <td data-label="Biaya" class="shipping-table__cost">{{ $estimate['cost'] }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>

        <div class="shipping-estimates__footer-note">
          <span class="shipping-estimates__note-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect x="1" y="3" width="15" height="13" rx="1"/>
              <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"/>
              <circle cx="5.5" cy="18.5" r="2.5"/>
              <circle cx="18.5" cy="18.5" r="2.5"/>
            </svg>
          </span>
          <p>Untuk pesanan berjumlah besar (di atas 1.000 pcs), kami menyediakan rute kargo khusus kereta/darat dan kapal laut dengan biaya ongkir yang jauh lebih hemat.</p>
        </div>
      </div>
    </div>
  </section>

  {{-- FAQ Pengiriman --}}
  <section class="shipping-faq" id="faq-pengiriman" aria-labelledby="shipping-faq-title">
    <div class="home-shell home-shell--wide shipping-faq__container">
      <header class="shipping-faq__intro">
        <p class="shipping-faq__eyebrow">FAQ EKSPEDISI</p>
        <h2 id="shipping-faq-title" class="shipping-faq__title">Pertanyaan Seputar Pengiriman &amp; Ekspedisi</h2>
        <p class="shipping-faq__lead">Informasi praktis mengenai pembagian nomor resi, asuransi paket hilang, dan jadwal pengiriman harian.</p>
      </header>

      <div class="shipping-faq__list">
        @foreach($shippingFaqs as $faq)
          <details class="shipping-faq__item">
            <summary class="shipping-faq__summary">
              <span>{{ $faq['question'] }}</span>
              <span class="shipping-faq__chevron" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
              </span>
            </summary>
            <div class="shipping-faq__answer">
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
            <span class="home-cta__eyebrow">DISTRIBUSI CEPAT &amp; AMAN</span>
          </div>

          <h2 id="home-cta-title" class="home-cta__title">
            Mau Cek Ongkir Terbaik untuk <span class="home-cta__title-accent">Pesanan Anda?</span>
          </h2>

          <p class="home-cta__desc">
            Sampaikan kota/kabupaten tujuan dan jumlah pesanan yang Anda butuhkan. Tim kami siap menghitungkan estimasi ongkir paling hemat serta merekomendasikan ekspedisi tercepat.
          </p>

          <div class="home-cta__buttons">
            <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
              </span>
              <span data-button-label>Tanya Ongkir via WhatsApp</span>
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
            alt="Pengiriman tali lanyard custom berkualitas tinggi Lanyard Medan"
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
  @include('components.schema.shipping', ['shippingFaqs' => $shippingFaqs])
@endpush
@endsection
