@php
  use App\Models\Product;

  $products = \App\Support\HomePageCache::remember(
    'home_product_showcase_products',
    fn () => Product::where('published', true)
      ->orderBy('sortOrder')
      ->take(4)
      ->get()
  );

  if ($products->isEmpty()) {
    $products = collect([
      (object) ['name' => 'Tali Lanyard Custom 1.5 cm', 'slug' => 'tali-lanyard-custom', 'shortDescription' => 'Lanyard custom berkualitas dengan hasil cetak tajam dan awet.', 'basePrice' => 'Rp 12.000', 'featuredImage' => null],
      (object) ['name' => 'Tali Lanyard Custom 2 cm', 'slug' => 'tali-lanyard-custom-2', 'shortDescription' => 'Ukuran standar untuk kebutuhan identitas dan promosi harian.', 'basePrice' => 'Rp 13.000', 'featuredImage' => null],
      (object) ['name' => 'Wristband Custom', 'slug' => 'wristband-custom', 'shortDescription' => 'Wristband custom untuk identitas acara yang lebih praktis.', 'basePrice' => 'Rp 5.000', 'featuredImage' => null],
      (object) ['name' => 'Card Holder Mika', 'slug' => 'card-holder-mika', 'shortDescription' => 'Pelindung kartu identitas untuk kantor dan kegiatan.', 'basePrice' => 'Rp 3.000', 'featuredImage' => null],
    ]);
  }

  $fallbackImages = [
      '/uploads/product-showcase-01.webp',
      '/uploads/product-showcase-02.webp',
      '/uploads/product-showcase-03.webp',
      '/uploads/product-showcase-04.webp',
  ];

  $badgeFor = function ($name) {
      $n = mb_strtolower((string) $name);
      return match (true) {
          str_contains($n, 'key chain') => 'KEY CHAIN',
          str_contains($n, 'card holder') => 'CARD HOLDER',
          str_contains($n, 'wristband') => 'WRISTBAND',
          str_contains($n, 'id card') => 'ID CARD',
          str_contains($n, 'name tag') => 'NAME TAG',
          default => 'LANYARD CUSTOM',
      };
  };

  $plain = fn ($value) => trim(preg_replace('/\s+/', ' ', strip_tags((string) $value)));
@endphp

<section id="produk" class="home-product-showcase" aria-labelledby="home-product-showcase-title">
  <div class="home-shell home-shell--wide">
    <header class="home-product-showcase__header">
      <p class="home-product-showcase__eyebrow">PRODUK KAMI</p>
      <h2 id="home-product-showcase-title" class="home-product-showcase__title">
        <span>Lanyard Custom untuk</span>
        <span class="home-product-showcase__title-accent">Setiap Kebutuhan Anda</span>
      </h2>
      <p class="home-product-showcase__desc">
        Berbagai pilihan lanyard berkualitas dengan desain custom, nyaman digunakan dan cocok untuk berbagai kebutuhan.
      </p>
    </header>

    <div class="home-product-showcase__grid" role="list">
      @foreach ($products as $index => $product)
        @php
          $image = $product->featuredImage ?: $fallbackImages[$index % count($fallbackImages)];
          $description = $plain($product->shortDescription ?? '') ?: 'Lanyard custom berkualitas untuk kebutuhan identitas dan promosi Anda.';
          $detailUrl = route('products.show', ['slug' => $product->slug]);
        @endphp
        <article class="home-product-showcase__card" role="listitem">
          {{-- Image Box --}}
          <div class="home-product-showcase__image-wrap">
            <img
              src="{{ $image }}"
              alt="{{ $product->name }}"
              class="home-product-showcase__img"
              width="600"
              height="480"
              loading="lazy"
              decoding="async"
            >
          </div>

          {{-- Content Box --}}
          <div class="home-product-showcase__content">
            <span class="home-product-showcase__badge">{{ $badgeFor($product->name) }}</span>
            <h3 class="home-product-showcase__name">{{ $product->name }}</h3>
            <p class="home-product-showcase__card-desc">{{ $description }}</p>

            {{-- Footer: Price + Button --}}
            <div class="home-product-showcase__footer">
              <div class="home-product-showcase__price-box">
                <span class="home-product-showcase__price-label">Mulai dari</span>
                <strong class="home-product-showcase__price-val">{{ $product->basePrice ?? 'Minta quotation' }}</strong>
              </div>
              <a href="{{ $detailUrl }}" class="home-product-showcase__btn">
                <span>Lihat Detail</span>
                <span class="home-product-showcase__btn-arrow" aria-hidden="true">&rarr;</span>
              </a>
            </div>
          </div>
        </article>
      @endforeach
    </div>
  </div>
</section>
