@extends('layouts.public')

@section('title', 'Pusat Bantuan & FAQ Lanyard Custom | Lanyard Medan')
@section('meta_description', 'Pertanyaan yang sering diajukan seputar pemesanan tali lanyard custom: minimal order, jenis bahan tissue vs nylon, biaya desain, waktu produksi 1–3 hari, dan garansi cetak.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/faq')
@section('seo_og_image', '/uploads/hero-faq-lanyard.webp')

@push('head')
  <link rel="stylesheet" href="/css/faq-index.css?v={{ file_exists(public_path('css/faq-index.css')) ? filemtime(public_path('css/faq-index.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya ingin menanyakan hal terkait pemesanan tali lanyard custom.');

  $faqCategories = [
    ['key' => 'all', 'label' => 'Semua Pertanyaan', 'count' => 12],
    ['key' => 'produk', 'label' => 'Bahan & Spesifikasi Cetak', 'count' => 4],
    ['key' => 'pengiriman', 'label' => 'Ongkir & Tracking Resi', 'count' => 4],
    ['key' => 'garansi', 'label' => 'Jaminan & Garansi Produk', 'count' => 4],
  ];

  $faqs = [
    // 1. Produk & Spesifikasi
    [
      'category' => 'produk',
      'category_label' => 'Bahan & Spesifikasi Cetak',
      'question' => 'Apakah bisa cetak logo instansi dengan banyak warna / gradasi?',
      'answer' => 'Sangat bisa. Kami menggunakan mesin digital printing sublimasi berteknologi tinggi yang mampu mencetak logo full color, foto, pola gradasi, dan detail tulisan kecil dengan tingkat ketajaman maksimal tanpa batasan jumlah warna.',
    ],
    [
      'category' => 'produk',
      'category_label' => 'Bahan & Spesifikasi Cetak',
      'question' => 'Berapa hari waktu yang dibutuhkan untuk proses produksi?',
      'answer' => 'Standar pengerjaan adalah 1–3 hari kerja terhitung sejak persetujuan (approval) mockup digital dan pembayaran uang muka (DP) kami terima. Untuk pesanan urgent partai besar, tersedia antrean prioritas setelah dikonfirmasi oleh tim produksi.',
    ],
    [
      'category' => 'produk',
      'category_label' => 'Bahan & Spesifikasi Cetak',
      'question' => 'Apakah ada biaya tambahan untuk pembuatan sampel desain mockup?',
      'answer' => 'Tidak ada (100% Gratis). Tim desainer kami siap membuatkan visualisasi mockup 3D preview tali lanyard secara cuma-cuma sebelum proses cetak massal dijalankan.',
    ],
    [
      'category' => 'produk',
      'category_label' => 'Bahan & Spesifikasi Cetak',
      'question' => 'Apa saja pilihan aksesoris pengait dan stopper yang tersedia?',
      'answer' => 'Pilihan aksesoris kami sangat lengkap: kait besi oval, kait lobster tebal, ring O (mata itik), stopper putar lepas-cepat, safety breakaway buckle (pengaman leher), serta casing ID card plastik / kulit sintetis.',
    ],

    // 2. Pengiriman & Resi
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Tracking Resi',
      'question' => 'Bagaimana ketentuan promo gratis ongkos kirim di Lanyard Medan?',
      'answer' => 'Kami memberikan fasilitas subsidi dan gratis ongkos kirim reguler untuk seluruh pemesanan area Kota Medan dan sekitarnya, serta potongan ongkir khusus untuk pengiriman ke kota-kota lain di seluruh Indonesia.',
    ],
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Tracking Resi',
      'question' => 'Apakah melayani pengiriman mendesak (Same Day / Instant)?',
      'answer' => 'Bisa. Khusus alamat di wilayah Kota Medan dan sekitarnya, paket yang selesai diproduksi dapat langsung dikirimkan menggunakan armada kurir instan lokal (Grab/Gojek/Lalamove) agar sampai di hari yang sama.',
    ],
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Tracking Resi',
      'question' => 'Kapan dan lewat apa nomor resi pengiriman dibagikan?',
      'answer' => 'Nomor resi resmi beserta foto bukti timbangan dan packing paket akan langsung dikirimkan oleh tim customer service kami melalui kontak WhatsApp Anda sesaat setelah paket diproses agen ekspedisi.',
    ],
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Tracking Resi',
      'question' => 'Bagaimana jika kurir ekspedisi mengalami keterlambatan pengiriman?',
      'answer' => 'Tim kami secara aktif memantau status resi Anda dan siap membantu melakukan eskalasi serta pelacakan langsung ke pihak manajemen ekspedisi terkait hingga paket tiba di alamat Anda.',
    ],

    // 3. Garansi & Klaim
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi Produk',
      'question' => 'Apa saja jaminan kualitas yang dilindungi oleh garansi Lanyard Medan?',
      'answer' => 'Kami memberikan garansi 100% ganti baru jika ditemukan cacat produksi seperti warna cetakan luntur, hasil cetak berbayang, aksesoris kait patah sebelum dipakai, atau salah ukuran yang tidak sesuai dengan mockup approval.',
    ],
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi Produk',
      'question' => 'Berapa lama batas waktu maksimal untuk mengajukan klaim?',
      'answer' => 'Klaim garansi dapat diajukan dalam kurun waktu 3x24 jam setelah paket diterima berdasarkan catatan status sistem ekspedisi.',
    ],
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi Produk',
      'question' => 'Bagaimana prosedur dan syarat pengajuan klaim garansi?',
      'answer' => 'Cukup kirimkan rekaman video unboxing singkat atau foto jelas yang memperlihatkan bagian reject kepada nomor WhatsApp customer service kami. Tim kami akan merespons dalam hitungan jam.',
    ],
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi Produk',
      'question' => 'Berapa lama waktu penyelesaian pencetakan ulang produk garansi?',
      'answer' => 'Barang pengganti akan langsung kami prioritaskan dan diproduksi ulang dalam 1–2 hari kerja tanpa dipungut biaya sepeser pun, termasuk ongkos kirim ulang.',
    ],
  ];

  $allFaqs = collect($faqs)->map(fn ($item) => ['question' => $item['question'], 'answer' => $item['answer']])->values();
@endphp

<div class="faq-page">
  {{-- Hero Section Terpusat --}}
  <section class="faq-hero" id="faq-hero" aria-labelledby="faq-title">
    <div class="home-shell home-shell--wide faq-hero__container">
      <div class="faq-hero__header">
        <div class="faq-hero__eyebrow-wrap">
          <span class="faq-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="faq-hero__eyebrow">PUSAT INFORMASI &amp; JAWABAN CEPAT</span>
        </div>

        <h1 id="faq-title" class="faq-hero__title">
          Segala Hal yang Ingin Anda Ketahui Seputar <span class="faq-hero__title-accent">Lanyard Custom.</span>
        </h1>

        <p class="faq-hero__desc">
          Mulai dari panduan pemilihan bahan tissue yang nyaman, transparansi biaya tanpa biaya tersembunyi, kecepatan cetak kilat 1–3 hari, hingga perlindungan garansi anti-luntur.
        </p>

        {{-- Live Search Box Terpusat --}}
        <div class="faq-search-box">
          <div class="faq-search-input-wrap">
            <span class="faq-search-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            </span>
            <input
              type="text"
              id="faq-search-input"
              class="faq-search-input"
              placeholder="Ketik kata kunci pertanyaan... (contoh: resi, ongkir, mockup, stopper, garansi)"
              aria-label="Cari pertanyaan FAQ"
              autocomplete="off"
            >
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Sticky Filter Tabs Bar (Berdiri sendiri & sticky di bawah header saat scroll) --}}
  <nav class="faq-tabs-bar" id="faq-tabs-bar" aria-label="Filter kategori pertanyaan">
    <div class="home-shell home-shell--wide">
      <div class="faq-tabs-nav">
        @foreach($faqCategories as $cat)
          <button
            type="button"
            class="faq-tab-btn {{ $loop->first ? 'is-active' : '' }}"
            data-filter="{{ $cat['key'] }}"
          >
            <span>{{ $cat['label'] }}</span>
            <small class="faq-tab-btn__count">({{ $cat['count'] }})</small>
          </button>
        @endforeach
      </div>
    </div>
  </nav>

  {{-- 1 Kolom Accordion Terpusat (Max Width 860px) --}}
  <main class="faq-content-section" id="faq-content">
    <div class="home-shell home-shell--wide">
      <div class="faq-accordion-wrap" role="list">
        @foreach($faqs as $index => $faq)
          @php
            $questionId = 'faq-q-'.$index;
            $answerId = 'faq-a-'.$index;
          @endphp
          <details class="faq-card-item" data-category="{{ $faq['category'] }}" data-faq-item role="listitem">
            <summary class="faq-card-item__summary" id="{{ $questionId }}" aria-controls="{{ $answerId }}">
              <div class="faq-card-item__heading">
                <span class="faq-card-item__badge">{{ $faq['category_label'] }}</span>
                <h3 class="faq-card-item__question">{{ $faq['question'] }}</h3>
              </div>
              <span class="faq-card-item__chevron" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"><polyline points="6 9 12 15 18 9"/></svg>
              </span>
            </summary>
            <div class="faq-card-item__answer" id="{{ $answerId }}" aria-labelledby="{{ $questionId }}">
              <p>{{ $faq['answer'] }}</p>
            </div>
          </details>
        @endforeach

        <div class="faq-empty-state" id="faq-empty-state" style="display: none;">
          <div class="faq-empty-state__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          </div>
          <h3>Topik Pertanyaan Tidak Ditemukan</h3>
          <p>Coba gunakan istilah kata kunci lain, atau hubungi customer service Lanyard Medan langsung untuk konsultasi instan.</p>
          <a class="home-cta__btn home-cta__btn--primary" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span>Tanya Customer Service via WA</span>
          </a>
        </div>
      </div>
    </div>
  </main>

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
            Masih Butuh Informasi Tambahan untuk <span class="home-cta__title-accent">Pesanan Anda?</span>
          </h2>

          <p class="home-cta__desc">
            Jangan ragu untuk mengobrol dengan tim kami. Kami siap mendiskusikan anggaran, pilihan aksesoris tali, hingga membuatkan sampel mockup digital secara gratis.
          </p>

          <div class="home-cta__buttons">
            <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
              </span>
              <span data-button-label>Tanya Tim Lanyard Medan</span>
              <span class="home-cta__btn-arrow" aria-hidden="true">→</span>
            </a>

            <a class="home-cta__btn home-cta__btn--secondary ptl-button-motion" href="/#kalkulator-harga" data-button-motion>
              <span class="home-cta__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                  <line x1="16" y1="2" x2="16" y2="6"/>
                  <line x1="8" y1="2" x2="8" y2="6"/>
                  <line x1="3" y1="10" x2="21" y2="10"/>
                </svg>
              </span>
              <span data-button-label>Cek Estimasi Harga</span>
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
            alt="Lanyard custom berkualitas tinggi Lanyard Medan"
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
  @include('components.schema.faq', ['allFaqs' => $allFaqs])
@endpush

<script>
(() => {
  const initFaqInteractions = () => {
    const searchInput = document.getElementById('faq-search-input');
    const tabsContainer = document.querySelector('.faq-tabs-nav');
    const faqItems = document.querySelectorAll('[data-faq-item]');
    const emptyState = document.getElementById('faq-empty-state');

    if (!faqItems.length) return;

    let currentFilter = 'all';

    const applyFilterAndSearch = () => {
      const term = (searchInput ? searchInput.value.toLowerCase().trim() : '');
      let visibleCount = 0;

      faqItems.forEach(item => {
        const category = item.getAttribute('data-category');
        const text = item.textContent.toLowerCase();

        const matchesFilter = (currentFilter === 'all' || category === currentFilter);
        const matchesSearch = (term === '' || text.includes(term));

        if (matchesFilter && matchesSearch) {
          item.style.display = 'block';
          visibleCount++;
          if (term !== '') {
            item.setAttribute('open', '');
          }
        } else {
          item.style.display = 'none';
        }
      });

      if (emptyState) {
        emptyState.style.display = (visibleCount === 0) ? 'flex' : 'none';
      }
    };

    if (tabsContainer) {
      tabsContainer.addEventListener('click', (e) => {
        const btn = e.target.closest('.faq-tab-btn');
        if (!btn) return;

        e.preventDefault();
        tabsContainer.querySelectorAll('.faq-tab-btn').forEach(b => b.classList.remove('is-active'));
        btn.classList.add('is-active');
        currentFilter = btn.getAttribute('data-filter') || 'all';
        applyFilterAndSearch();
      });
    }

    if (searchInput) {
      searchInput.addEventListener('input', applyFilterAndSearch);
    }
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initFaqInteractions, { once: true });
  } else {
    initFaqInteractions();
  }
})();
</script>
@endsection
