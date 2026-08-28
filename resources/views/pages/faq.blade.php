@extends('layouts.public')

@section('title', 'Pusat Bantuan & FAQ Lanyard Custom | Lanyard Palembang')
@section('meta_description', 'Pertanyaan yang sering diajukan seputar pemesanan tali lanyard custom: minimal order, jenis bahan tissue vs nylon, biaya desain, waktu produksi 1–3 hari, dan garansi cetak.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/faq')
@section('seo_og_image', '/uploads/hero-faq-lanyard.webp')

@push('head')
  <link rel="stylesheet" href="/css/faq-index.css?v={{ file_exists(public_path('css/faq-index.css')) ? filemtime(public_path('css/faq-index.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@section('content')
@php
  $whatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya ingin menanyakan hal terkait pemesanan tali lanyard custom.');

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
      'category_label' => 'Bahan & Cetak',
      'question' => 'Apakah bisa cetak logo instansi dengan banyak warna / gradasi?',
      'answer' => 'Sangat bisa. Kami menggunakan mesin digital printing sublimasi berteknologi tinggi yang mampu mencetak logo full color, foto, pola gradasi, dan detail tulisan kecil dengan tingkat ketajaman maksimal tanpa batasan jumlah warna.',
    ],
    [
      'category' => 'produk',
      'category_label' => 'Bahan & Cetak',
      'question' => 'Berapa hari waktu yang dibutuhkan untuk proses produksi?',
      'answer' => 'Standar pengerjaan adalah 1–3 hari kerja terhitung sejak persetujuan (approval) mockup digital dan pembayaran uang muka (DP) kami terima. Untuk pesanan urgent partai besar, tersedia antrean prioritas setelah dikonfirmasi oleh tim produksi.',
    ],
    [
      'category' => 'produk',
      'category_label' => 'Bahan & Cetak',
      'question' => 'Apakah ada biaya tambahan untuk pembuatan sampel desain mockup?',
      'answer' => 'Tidak ada (100% Gratis). Tim desainer kami siap membuatkan visualisasi mockup 3D preview tali lanyard secara cuma-cuma sebelum proses cetak massal dijalankan.',
    ],
    [
      'category' => 'produk',
      'category_label' => 'Bahan & Cetak',
      'question' => 'Apa saja pilihan aksesoris pengait dan stopper yang tersedia?',
      'answer' => 'Pilihan aksesoris kami sangat lengkap: kait besi oval, kait lobster tebal, ring O (mata itik), stopper putar lepas-cepat, safety breakaway buckle (pengaman leher), serta casing ID card plastik / kulit sintetis.',
    ],

    // 2. Pengiriman & Resi
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Resi',
      'question' => 'Bagaimana ketentuan promo gratis ongkos kirim di Lanyard Palembang?',
      'answer' => 'Kami memberikan fasilitas subsidi dan gratis ongkos kirim reguler untuk seluruh pemesanan area Kota Palembang dan sekitarnya, serta potongan ongkir khusus untuk pengiriman ke kota-kota lain di seluruh Indonesia.',
    ],
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Resi',
      'question' => 'Apakah melayani pengiriman mendesak (Same Day / Instant)?',
      'answer' => 'Bisa. Khusus alamat di wilayah Kota Palembang dan sekitarnya, paket yang selesai diproduksi dapat langsung dikirimkan menggunakan armada kurir instan lokal (Grab/Gojek/Maxim) agar sampai di hari yang sama.',
    ],
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Resi',
      'question' => 'Kapan dan lewat apa nomor resi pengiriman dibagikan?',
      'answer' => 'Nomor resi resmi beserta foto bukti timbangan dan packing paket akan langsung dikirimkan oleh tim customer service kami melalui kontak WhatsApp Anda sesaat setelah paket diproses agen ekspedisi.',
    ],
    [
      'category' => 'pengiriman',
      'category_label' => 'Ongkir & Resi',
      'question' => 'Bagaimana jika kurir ekspedisi mengalami keterlambatan pengiriman?',
      'answer' => 'Tim kami secara aktif memantau status resi Anda dan siap membantu melakukan eskalasi serta pelacakan langsung ke pihak manajemen ekspedisi terkait hingga paket tiba di alamat Anda.',
    ],

    // 3. Garansi & Klaim
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi',
      'question' => 'Apa saja jaminan kualitas yang dilindungi oleh garansi Lanyard Palembang?',
      'answer' => 'Kami memberikan garansi 100% ganti baru jika ditemukan cacat produksi seperti warna cetakan luntur, hasil cetak berbayang, aksesoris kait patah sebelum dipakai, atau salah ukuran yang tidak sesuai dengan mockup approval.',
    ],
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi',
      'question' => 'Berapa lama batas waktu maksimal untuk mengajukan klaim?',
      'answer' => 'Klaim garansi dapat diajukan dalam kurun waktu 3x24 jam setelah paket diterima berdasarkan catatan status sistem ekspedisi.',
    ],
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi',
      'question' => 'Bagaimana prosedur dan syarat pengajuan klaim garansi?',
      'answer' => 'Cukup kirimkan rekaman video unboxing singkat atau foto jelas yang memperlihatkan bagian reject kepada nomor WhatsApp customer service kami. Tim kami akan merespons dalam hitungan jam.',
    ],
    [
      'category' => 'garansi',
      'category_label' => 'Jaminan & Garansi',
      'question' => 'Berapa lama waktu penyelesaian pencetakan ulang produk garansi?',
      'answer' => 'Barang pengganti akan langsung kami prioritaskan dan diproduksi ulang dalam 1–2 hari kerja tanpa dipungut biaya sepeser pun, termasuk ongkos kirim ulang.',
    ],
  ];

  $allFaqs = collect($faqs)->map(fn ($item) => ['question' => $item['question'], 'answer' => $item['answer']])->values();
@endphp

<div class="faq-page">
  {{-- 1. HERO SECTION --}}
  <section class="faq-hero" id="faq-hero" aria-labelledby="faq-title">
    <div class="home-shell home-shell--wide faq-hero__container">
      <div class="faq-hero__header">
        <div class="faq-hero__eyebrow-wrap">
          <span class="faq-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="faq-hero__eyebrow">PUSAT BANTUAN &amp; JAWABAN CEPAT</span>
        </div>

        <h1 id="faq-title" class="faq-hero__title">
          Pertanyaan yang Sering Diajukan Seputar <span class="faq-hero__title-accent">Lanyard Custom.</span>
        </h1>

        <p class="faq-hero__desc">
          Temukan jawaban praktis mengenai spesifikasi bahan tissue halus, simulasi desain gratis, kecepatan produksi 1–3 hari, tarif pengiriman, hingga garansi kualitas 100%.
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

  {{-- 2. STICKY FILTER TABS BAR --}}
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

  {{-- 3. 2-COLUMN BALANCED ACCORDION GRID --}}
  <main class="faq-content-section" id="faq-content">
    <div class="home-shell home-shell--wide">
      <div class="faq-accordion-grid" role="list">
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
          <p>Coba gunakan istilah kata kunci lain, atau hubungi customer service Lanyard Palembang langsung untuk konsultasi instan.</p>
          <a class="faq-empty-state__btn" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
            <span>Tanya Customer Service via WA</span>
            <span aria-hidden="true">→</span>
          </a>
        </div>
      </div>

      {{-- 4. QUICK HELP STRIP --}}
      <div class="faq-help-strip">
        <div class="faq-help-strip__text">
          <strong>Belum menemukan jawaban yang Anda cari?</strong>
          <span>Tim sales dan desainer kami siap menjawab seluruh pertanyaan spesifik terkait pesanan Anda.</span>
        </div>
        <a class="faq-help-strip__btn" href="{{ $whatsappUrl }}" target="_blank" rel="noopener noreferrer">
          <span>Konsultasi Langsung via WhatsApp</span>
          <span aria-hidden="true">→</span>
        </a>
      </div>
    </div>
  </main>

  {{-- 5. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')

@push('schema')
  @include('components.schema.faq', ['allFaqs' => $allFaqs])
@endpush

{{-- Interactive Client-Side Search & Filter Script --}}
@push('scripts')
<script>
  (function () {
    const searchInput = document.getElementById('faq-search-input');
    const tabs = document.querySelectorAll('.faq-tab-btn');
    const items = document.querySelectorAll('[data-faq-item]');
    const emptyState = document.getElementById('faq-empty-state');
    let activeCategory = 'all';

    function filterFaqs() {
      const keyword = (searchInput ? searchInput.value : '').toLowerCase().trim();
      let visibleCount = 0;

      items.forEach(item => {
        const itemCategory = item.getAttribute('data-category');
        const text = item.textContent.toLowerCase();

        const matchCategory = (activeCategory === 'all' || itemCategory === activeCategory);
        const matchKeyword = (keyword === '' || text.includes(keyword));

        if (matchCategory && matchKeyword) {
          item.style.display = 'block';
          visibleCount++;
          if (keyword !== '') {
            item.setAttribute('open', '');
          }
        } else {
          item.style.display = 'none';
        }
      });

      if (emptyState) {
        emptyState.style.display = visibleCount === 0 ? 'flex' : 'none';
      }
    }

    if (searchInput) {
      searchInput.addEventListener('input', filterFaqs);
    }

    tabs.forEach(tab => {
      tab.addEventListener('click', function () {
        tabs.forEach(t => t.classList.remove('is-active'));
        this.classList.add('is-active');
        activeCategory = this.getAttribute('data-filter') || 'all';
        filterFaqs();
      });
    });
  })();
</script>
@endpush
@endsection
