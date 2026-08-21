@extends('layouts.public')

@section('title', 'Katalog Produk Tali Lanyard Custom & Aksesoris | Lanyard Medan')
@section('meta_description', 'Eksplorasi varian tali lanyard custom sublimasi full color, polyester, sablon, ID card holder, dan aksesoris terlengkap di Medan. Produksi kilat 1–3 hari.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/produk')
@section('seo_og_image', '/uploads/hero-produk-lanyard.webp')

@php $produkHasSearch = !empty(request('q')) || !empty(request('kategori')) || (int) request('page', 1) > 1; @endphp
@if($produkHasSearch)
  @section('seo_noindex', '1')
@endif

@push('head')
  <link rel="stylesheet" href="/css/product-index.css?v={{ file_exists(public_path('css/product-index.css')) ? filemtime(public_path('css/product-index.css')) : 1 }}">
@endpush

@section('content')
@php
  use App\Models\Product;

  $search = trim((string) request('q', ''));
  $categoryFilter = trim((string) request('kategori', ''));
  $page = max(1, (int) request('page', 1));
  $perPage = 9;
  $query = Product::query()->with('category')->where('published', true);

  if ($search !== '') {
    $escapedSearch = str_replace(['!', '%', '_'], ['!!', '!%', '!_'], $search);
    $query->where(function ($builder) use ($escapedSearch) {
      $pattern = "%{$escapedSearch}%";
      $builder->whereRaw('name LIKE ? ESCAPE \'!\'', [$pattern])
        ->orWhereRaw('sku LIKE ? ESCAPE \'!\'', [$pattern])
        ->orWhereRaw('shortDescription LIKE ? ESCAPE \'!\'', [$pattern])
        ->orWhereRaw('specs LIKE ? ESCAPE \'!\'', [$pattern]);
    });
  }

  if ($categoryFilter !== '') {
    $escapedCategory = str_replace(['!', '%', '_'], ['!!', '!%', '!_'], $categoryFilter);
    $query->whereHas('category', function ($builder) use ($escapedCategory) {
      $pattern = "%{$escapedCategory}%";
      $builder->whereRaw('name LIKE ? ESCAPE \'!\'', [$pattern])
        ->orWhereRaw('slug LIKE ? ESCAPE \'!\'', [$pattern]);
    });
  }

  $query->orderBy('sortOrder')->orderByDesc('createdAt');
  $total = $query->count();
  $products = $query->skip(($page - 1) * $perPage)->take($perPage)->get();
  $nextPage = ($page * $perPage) < $total ? $page + 1 : null;

  if ($products->isEmpty() && $search === '' && $categoryFilter === '') {
    $products = collect([
      (object) [
        'name' => 'Lanyard Tissue Sublimasi Full Color',
        'slug' => 'lanyard-tissue',
        'sku' => 'LT-001',
        'shortDescription' => 'Bahan tissue ultra halus dengan cetak digital sublimasi bolak-balik beresolusi tinggi. Warna cerah, tajam, dan tidak luntur dicuci.',
        'featuredImage' => '/uploads/hero-lanyard-slider-01.webp',
        'basePrice' => 'Mulai Rp 5.000 / pcs',
        'category' => (object) ['name' => 'Lanyard Tissue']
      ],
      (object) [
        'name' => 'Lanyard Polyester Standar Event',
        'slug' => 'lanyard-polyester',
        'sku' => 'LP-001',
        'shortDescription' => 'Pilihan tali lanyard ekonomis dengan serat polyester tebal dan kuat. Sangat pas untuk kebutuhan panitia seminar, konser, dan MOS sekolah.',
        'featuredImage' => '/uploads/hero-lanyard-slider-02.webp',
        'basePrice' => 'Mulai Rp 3.500 / pcs',
        'category' => (object) ['name' => 'Lanyard Polyester']
      ],
      (object) [
        'name' => 'Lanyard Sablon High Density',
        'slug' => 'lanyard-sablon',
        'sku' => 'LS-001',
        'shortDescription' => 'Cetak sablon manual berdaya rekat tinggi pada bahan polyester kilap. Hasil sablon timbul, rapi, dan cocok untuk logo 1–2 warna solid.',
        'featuredImage' => '/uploads/hero-lanyard-medan.webp',
        'basePrice' => 'Mulai Rp 4.500 / pcs',
        'category' => (object) ['name' => 'Lanyard Sablon']
      ],
      (object) [
        'name' => 'ID Card Holder Kulit Sintetis Premium',
        'slug' => 'id-card-holder',
        'sku' => 'IC-001',
        'shortDescription' => 'Tempat kartu nama berbahan kulit sintetis double slot dengan jahitan tepi rapi. Memberi kesan profesional untuk seragam kantor dan instansi.',
        'featuredImage' => '/uploads/aset-produk.webp',
        'basePrice' => 'Mulai Rp 12.000 / pcs',
        'category' => (object) ['name' => 'ID Card']
      ],
      (object) [
        'name' => 'Hook Metal Oval Chrome Lanyard',
        'slug' => 'hook-metal',
        'sku' => 'AH-001',
        'shortDescription' => 'Pengait logam berkualitas tebal dengan finishing chrome mengkilap. Pegas kuat, tidak mudah berkarat, dan tahan beban pemakaian harian.',
        'featuredImage' => '/uploads/hero-lanyard-slider-02.webp',
        'basePrice' => 'Mulai Rp 1.500 / pcs',
        'category' => (object) ['name' => 'Aksesoris']
      ],
      (object) [
        'name' => 'Stopper Putar & Safety Breakaway',
        'slug' => 'stopper-silikon',
        'sku' => 'AS-001',
        'shortDescription' => 'Aksesoris sambungan tali lepas-pasang praktis berbahan plastik polyacetal elastis. Menambah kenyamanan saat tap ID card di gerbang pintu.',
        'featuredImage' => '/uploads/hero-lanyard-slider-01.webp',
        'basePrice' => 'Mulai Rp 1.000 / pcs',
        'category' => (object) ['name' => 'Aksesoris']
      ],
    ]);
    $total = $products->count();
    $nextPage = null;
  }

  $asset = fn ($value) => \App\Support\AssetUrl::relative($value, '/uploads/aset-produk.webp');
  $plain = fn ($value) => trim((string) preg_replace('/\s+/u', ' ', strip_tags((string) $value)));

  $categories = [
    ['slug' => '', 'name' => 'Semua Produk'],
    ['slug' => 'tissue', 'name' => 'Lanyard Tissue'],
    ['slug' => 'polyester', 'name' => 'Lanyard Polyester'],
    ['slug' => 'sablon', 'name' => 'Lanyard Sablon'],
    ['slug' => 'id-card', 'name' => 'ID Card & Holder'],
    ['slug' => 'aksesoris', 'name' => 'Aksesoris'],
  ];
@endphp

<div class="product-page">
  {{-- 1. HERO SECTION --}}
  <section class="product-hero" aria-labelledby="product-hero-title">
    <div class="home-shell home-shell--wide product-hero__container">
      <div class="product-hero__content">
        <div class="product-hero__eyebrow-wrap">
          <span class="product-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/>
            </svg>
          </span>
          <span class="product-hero__eyebrow">KATALOG &amp; VARIAN LENGKAP</span>
        </div>

        <h1 id="product-hero-title" class="product-hero__title">
          Pilihan Tali Lanyard Custom &amp; Aksesoris <span class="product-hero__title-accent">Terlengkap di Medan.</span>
        </h1>

        <p class="product-hero__desc">
          Eksplorasi ragam pilihan tali lanyard cetak sublimasi full color, polyester ekonomis, ID card holder, hingga aksesoris pengait metal. Bebas custom logo, gratis layout mockup, dan siap kirim ke seluruh Indonesia.
        </p>

        {{-- Form Pencarian Modern --}}
        <form class="product-hero__search" method="GET" action="{{ route('products.index') }}" role="search">
          @if($categoryFilter !== '')
            <input type="hidden" name="kategori" value="{{ $categoryFilter }}">
          @endif
          <div class="product-hero__search-bar">
            <span class="product-hero__search-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
              </svg>
            </span>
            <input
              id="product-search"
              class="product-hero__search-input"
              type="search"
              name="q"
              value="{{ $search }}"
              placeholder="Cari nama produk, bahan, atau SKU..."
              autocomplete="off"
            >
            <button type="submit" class="product-hero__search-btn">
              <span>Cari Produk</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
              </svg>
            </button>
          </div>
          @if($search !== '')
            <a class="product-hero__search-clear" href="{{ route('products.index', $categoryFilter ? ['kategori' => $categoryFilter] : []) }}">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
              </svg>
              <span>Hapus pencarian "{{ $search }}"</span>
            </a>
          @endif
        </form>
      </div>

      {{-- Visual Hero Card --}}
      <div class="product-hero__visual">
        <div class="product-hero__image-card">
          <picture>
            <source srcset="/uploads/hero-produk-lanyard-medan-1280w.webp 1280w, /uploads/hero-produk-lanyard-medan-960w.webp 960w, /uploads/hero-produk-lanyard-medan-640w.webp 640w, /uploads/hero-produk-lanyard-medan-320w.webp 320w" sizes="(max-width: 767px) 100vw, 560px" type="image/webp">
            <img
              src="/uploads/hero-produk-lanyard.webp"
              alt="Katalog produk tali lanyard custom dan id card holder Lanyard Medan"
              width="1448"
              height="1086"
              loading="eager"
              fetchpriority="high"
              decoding="async"
            >
          </picture>
        </div>

        <div class="product-hero__trust-badge">
          <span class="product-hero__trust-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
            </svg>
          </span>
          <div class="product-hero__trust-text">
            <strong>Garansi Kualitas 100%</strong>
            <span>Cetak tajam, warna awet, &amp; gratis mockup sebelum produksi.</span>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 2. CATEGORY TABS BAR --}}
  <section class="product-tabs-section" aria-label="Filter kategori produk">
    <div class="home-shell home-shell--wide">
      <nav class="product-tabs-nav" aria-label="Pilih kategori produk">
        @foreach($categories as $cat)
          @php
            $isActive = ($categoryFilter === $cat['slug']);
            $tabUrl = route('products.index', array_filter(['q' => $search ?: null, 'kategori' => $cat['slug'] ?: null]));
          @endphp
          <a
            href="{{ $tabUrl }}"
            class="product-tab-pill {{ $isActive ? 'is-active' : '' }}"
            @if($isActive) aria-current="page" @endif
          >
            <span>{{ $cat['name'] }}</span>
          </a>
        @endforeach
      </nav>
    </div>
  </section>

  {{-- 3. CATALOG GRID SECTION --}}
  <section class="product-catalog" aria-labelledby="product-catalog-title">
    <div class="home-shell home-shell--wide">
      <header class="product-catalog__header">
        <div class="product-catalog__intro">
          <p class="product-catalog__eyebrow">VARIAN SIAP CETAK</p>
          <h2 id="product-catalog-title" class="product-catalog__title">
            Katalog Lanyard &amp; Perlengkapan
          </h2>
          <p class="product-catalog__lead">
            @if($search !== '')
              Menampilkan {{ $total }} hasil untuk kata kunci “{{ $search }}”.
            @elseif($categoryFilter !== '')
              Menampilkan {{ $total }} pilihan produk untuk kategori yang dipilih.
            @else
              Tersedia {{ $total }} pilihan model lanyard dan perlengkapan ID card dengan jaminan cetak presisi tinggi dan bahan lembut di kulit.
            @endif
          </p>
        </div>

        <a href="{{ route('pricing') }}" class="product-catalog__pricing-link">
          <span>Lihat Tabel Harga</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
            <line x1="5" y1="12" x2="19" y2="12"/>
            <polyline points="12 5 19 12 12 19"/>
          </svg>
        </a>
      </header>

      @if($products->isEmpty())
        <div class="product-empty">
          <span class="product-empty__icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="11" cy="11" r="8"/>
              <line x1="21" y1="21" x2="16.65" y2="16.65"/>
              <line x1="8" y1="11" x2="14" y2="11"/>
            </svg>
          </span>
          <h3 class="product-empty__title">Produk Tidak Ditemukan</h3>
          <p class="product-empty__desc">
            Maaf, kami tidak dapat menemukan produk yang sesuai dengan pencarian “{{ $search }}”. Coba gunakan kata kunci lain seperti tissue, polyester, atau holder.
          </p>
          <a href="{{ route('products.index') }}" class="product-empty__btn">
            <span>Lihat Semua Produk</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </div>
      @else
        <ul class="product-grid" aria-label="Daftar produk Lanyard Medan">
          @foreach($products as $product)
            @php
              $image = $asset($product->featuredImage ?? null);
              $srcset = \App\Support\ResponsiveImage::srcset($image);
              $description = $plain($product->shortDescription ?? '');
              $categoryName = $product->category->name ?? 'Lanyard Custom';
            @endphp
            <li class="product-card">
              <a href="{{ route('products.show', ['slug' => $product->slug]) }}" class="product-card__link" aria-label="Lihat detail spesifikasi {{ $product->name }}">
                <figure class="product-card__thumb">
                  <span class="product-card__badge">{{ $categoryName }}</span>
                  <img
                    src="{{ $image }}"
                    @if($srcset) srcset="{{ $srcset }}" sizes="(max-width: 767px) 100vw, (max-width: 1100px) 50vw, 33vw" @endif
                    alt="{{ $product->name }} - Hasil cetak Lanyard Medan"
                    width="640"
                    height="480"
                    loading="lazy"
                    decoding="async"
                  >
                </figure>

                <div class="product-card__body">
                  <div class="product-card__meta">
                    @if(!empty($product->sku))
                      <span class="product-card__sku">{{ $product->sku }}</span>
                    @endif
                    <span>{{ $categoryName }}</span>
                  </div>

                  <h3 class="product-card__title">{{ $product->name }}</h3>
                  <p class="product-card__desc">
                    {{ $description ?: 'Pilihan produk tali lanyard custom berkualitas prima untuk kebutuhan kantor, event, dan komunitas Anda.' }}
                  </p>

                  <div class="product-card__footer">
                    <span class="product-card__price">
                      {{ !empty($product->basePrice) ? $product->basePrice : 'Minta Penawaran' }}
                    </span>
                    <span class="product-card__action">
                      <span>Detail</span>
                      <span class="product-card__action-arrow" aria-hidden="true">→</span>
                    </span>
                  </div>
                </div>
              </a>
            </li>
          @endforeach
        </ul>

        @if($nextPage)
          <div class="product-pagination">
            <a
              href="?{{ http_build_query(array_filter(['q' => $search ?: null, 'kategori' => $categoryFilter ?: null, 'page' => $nextPage])) }}"
              class="product-pagination__btn"
            >
              <span>Muat Lebih Banyak Produk</span>
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
                <line x1="5" y1="12" x2="19" y2="12"/>
                <polyline points="12 5 19 12 12 19"/>
              </svg>
            </a>
          </div>
        @endif
      @endif
    </div>
  </section>

  {{-- 4. CLOSING CTA SECTION --}}
  @include('components.cta')
</div>

@include('components.footer')

@push('schema')
  @include('components.schema.produk')
@endpush
@endsection
