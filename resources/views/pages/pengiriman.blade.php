@extends('layouts.public')

@section('title', 'Layanan Pengiriman Lanyard Custom Cepat & Bergaransi | Lanyard Palembang')
@section('meta_description', 'Layanan ekspedisi dan pengiriman lanyard custom dari Palembang ke seluruh Indonesia: garansi packing anti-rusak, kemudahan cek nomor resi online, serta proteksi pengiriman terpercaya.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/pengiriman')
@section('seo_og_image', '/uploads/hero-pengiriman-lanyard-palembang.webp')

@push('head')
  <link rel="stylesheet" href="/css/shipping-index.css?v={{ file_exists(public_path('css/shipping-index.css')) ? filemtime(public_path('css/shipping-index.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau cek estimasi ongkos kirim dan jadwal ekspedisi lanyard custom.');

  $shippingServices = [
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="1" y="3" width="15" height="13" rx="1"/><polygon points="16 8 20 8 23 11 23 16 16 16 8"/><circle cx="5.5" cy="18.5" r="2.5"/><circle cx="18.5" cy="18.5" r="2.5"/></svg>',
      'badge' => 'PENGIRIMAN LOKAL',
      'title' => 'Kota Palembang & Sekitarnya',
      'description' => 'Solusi distribusi kilat untuk instansi perkantoran, BUMN, dan kepanitiaan event di Kota Palembang, Ogan Ilir, Banyuasin, Musi Banyuasin, hingga Prabumulih.',
      'points' => [
        'Estimasi 1–2 hari kerja setelah cetak tuntas',
        'Subsidi & promo gratis ongkos kirim reguler',
        'Tersedia opsi pengiriman Same Day via kurir instan',
        'Sangat tepat untuk kebutuhan deadline event mendesak',
      ],
    ],
    [
      'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/><path d="M14.05 2a9 9 0 0 1 7.95 7.95"/><path d="M14.05 6A5 5 0 0 1 18 9.95"/></svg>',
      'badge' => 'EKSPEDISI NASIONAL',
      'title' => 'Pengiriman se-Indonesia',
      'description' => 'Bermitra dengan operator kargo dan ekspedisi nasional terpercaya untuk menjamin pesanan sampai aman di pulau Sumatera, Jawa, Kalimantan, Sulawesi, hingga Papua.',
      'points' => [
        'Estimasi 2–5 hari kerja via JNE, J&T, SiCepat, atau Kargo',
        'Opsi kargo darat/udara ekonomis untuk order skala besar (500+ pcs)',
        'Packing waterproof berlapis bubble wrap tebal anti-basah',
        'Tracking resi real-time yang langsung dikirimkan ke kontak WhatsApp',
      ],
    ],
  ];

  $shippingSteps = [
    [
      'num' => '01',
      'title' => 'Validasi Data Penerima & Deadline',
      'description' => 'Memastikan kelengkapan nama PIC penerima, nomor kontak aktif, patokan alamat presisi, dan target waktu acara agar tidak meleset.',
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
      'title' => 'Proteksi Packing Kedap Air',
      'description' => 'Lanyard diikat rapi per 50 pcs dalam plastik seal tertutup, dimasukkan ke kardus kuat, dan dilapisi plastik bubble wrap tahan cuaca.',
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
      'area' => 'Kota Palembang & Sekitarnya (Ogan Ilir, Banyuasin, Prabumulih)',
      'estimate' => '1–2 Hari Kerja',
      'cost' => 'Gratis Ongkir Reguler / Tersedia Kurir Instan',
      'highlight' => true,
    ],
    [
      'area' => 'Kabupaten Lain di Sumatera Selatan (Muba, OKU, Lahat, Muara Enim)',
      'estimate' => '2–3 Hari Kerja',
      'cost' => 'Tarif Domestik Terjangkau via Kurir Lokal',
      'highlight' => false,
    ],
    [
      'area' => 'Provinsi Sumatera (Lampung, Jambi, Bengkulu, Riau, Sumbar, Sumut, Aceh)',
      'estimate' => '2–4 Hari Kerja',
      'cost' => 'Tersedia Subsidi Ongkir / Opsi Kargo Darat',
      'highlight' => false,
    ],
    [
      'area' => 'DKI Jakarta, Jawa Barat, Banten, Jateng, Jatim, & Bali',
      'estimate' => '2–4 Hari Kerja',
      'cost' => 'Pilihan Layanan Udara Cepat / Kargo Volume',
      'highlight' => false,
    ],
    [
      'area' => 'Kalimantan, Sulawesi, Nusa Tenggara, Maluku, & Papua',
      'estimate' => '3–6 Hari Kerja',
      'cost' => 'Kargo Udara / Laut Resmi dengan Tracking GPS',
      'highlight' => false,
    ],
  ];

  $shippingFaqs = config('seo.shipping_faq', []);
@endphp

<div class="shipping-page">
  {{-- 1. HERO SECTION --}}
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
          Dari Kota Palembang langsung menuju pintu kantor Anda. Kami memastikan tiap paket pesanan tali ID card melewati kontrol kualitas ganda, dibungkus kedap air, dan terlindungi penuh hingga tujuan.
        </p>

        <div class="shipping-hero__actions">
          <a class="shipping-btn shipping-btn--primary" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span class="shipping-btn__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span>Konsultasi Ongkir via WhatsApp</span>
            <span class="shipping-btn__arrow" aria-hidden="true">→</span>
          </a>

          <a class="shipping-btn shipping-btn--secondary" href="{{ route('area') }}">
            <span>Jangkauan Wilayah Layanan</span>
            <span class="shipping-btn__arrow" aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      <div class="shipping-hero__visual">
        <div class="shipping-hero__image-card">
          <img
            src="/uploads/hero-pengiriman-lanyard-palembang.webp?v={{ file_exists(public_path('uploads/hero-pengiriman-lanyard-palembang.webp')) ? filemtime(public_path('uploads/hero-pengiriman-lanyard-palembang.webp')) : 1 }}"
            alt="Proses pengemasan dan ekspedisi tali lanyard custom Lanyard Palembang"
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

  {{-- 2. SERVICES SECTION --}}
  <section class="shipping-services" id="layanan-pengiriman" aria-labelledby="shipping-services-title">
    <div class="home-shell home-shell--wide">
      <header class="shipping-services__intro">
        <p class="shipping-services__eyebrow">PILIHAN LOGISTIK</p>
        <h2 id="shipping-services-title" class="shipping-services__title">Opsi Pengiriman yang Fleksibel &amp; Ekonomis</h2>
      </header>

      <div class="shipping-services__grid">
        @foreach($shippingServices as $service)
          <article class="shipping-service-card">
            <div class="shipping-service-card__header">
              <span class="shipping-service-card__badge">{{ $service['badge'] }}</span>
              <div class="shipping-service-card__icon" aria-hidden="true">
                {!! $service['icon'] !!}
              </div>
            </div>

            <h3 class="shipping-service-card__title">{{ $service['title'] }}</h3>
            <p class="shipping-service-card__desc">{{ $service['description'] }}</p>

            <ul class="shipping-service-card__list">
              @foreach($service['points'] as $point)
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

  {{-- 3. PACKAGING PROCESS SECTION --}}
  <section class="shipping-process" id="alur-pengiriman" aria-labelledby="shipping-process-title">
    <div class="home-shell home-shell--wide">
      <header class="shipping-process__intro">
        <p class="shipping-process__eyebrow">STANDARISASI PACKING</p>
        <h2 id="shipping-process-title" class="shipping-process__title">Prosedur Pengemasan 4 Lapis Perlindungan</h2>
      </header>

      <div class="shipping-process__grid">
        @foreach($shippingSteps as $step)
          <article class="shipping-step-card">
            <div class="shipping-step-card__header">
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

  {{-- 4. ESTIMATES TABLE SECTION --}}
  <section class="shipping-estimates" id="estimasi-pengiriman" aria-labelledby="shipping-estimates-title">
    <div class="home-shell home-shell--wide shipping-estimates__layout">
      <aside class="shipping-estimates__intro-card">
        <p class="shipping-estimates__eyebrow">ESTIMASI WAKTU TIBA</p>
        <h2 id="shipping-estimates-title" class="shipping-estimates__title">Perkiraan Waktu Tiba ke Lokasi Anda</h2>
        <p class="shipping-estimates__lead">
          Jadwal estimasi pengiriman dihitung sejak paket diserahkan ke agen logistik. Kami siap merekomendasikan opsi ekspedisi tercepat untuk kebutuhan mendesak.
        </p>

        <a class="shipping-btn shipping-btn--primary" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
          <span>Cek Ongkir Tujuan Anda</span>
          <span class="shipping-btn__arrow" aria-hidden="true">→</span>
        </a>
      </aside>

      <div class="shipping-estimates__table-card">
        <div class="shipping-table-wrap">
          <table class="shipping-table">
            <thead>
              <tr>
                <th scope="col">Wilayah Tujuan</th>
                <th scope="col">Estimasi Perjalanan</th>
                <th scope="col">Opsi Ongkir</th>
              </tr>
            </thead>
            <tbody>
              @foreach($shippingEstimates as $row)
                <tr class="{{ $row['highlight'] ? 'is-highlight' : '' }}">
                  <td>
                    <div class="shipping-table__area">{{ $row['area'] }}</div>
                    @if($row['highlight'])
                      <span class="shipping-table__promo-badge">PROMO PALEMBANG</span>
                    @endif
                  </td>
                  <td>{{ $row['estimate'] }}</td>
                  <td>{{ $row['cost'] }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </section>

  {{-- 5. FAQ SECTION --}}
  <section class="shipping-faq" id="faq-pengiriman" aria-labelledby="shipping-faq-title">
    <div class="home-shell home-shell--wide shipping-faq__container">
      <header class="shipping-faq__intro">
        <p class="shipping-faq__eyebrow">FAQ EKSPEDISI</p>
        <h2 id="shipping-faq-title" class="shipping-faq__title">Pertanyaan Seputar Pengiriman &amp; Ekspedisi</h2>
        <p class="shipping-faq__lead">Informasi praktis mengenai pengiriman hari yang sama, pelacakan nomor resi, dan asuransi proteksi paket.</p>
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

  {{-- 6. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')

@push('schema')
  @include('components.schema.shipping', ['shippingFaqs' => $shippingFaqs])
@endpush
@endsection
