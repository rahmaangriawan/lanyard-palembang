@php
  use App\Models\Product;

  $products = Cache::store(config('cache.public_store', 'file'))->remember(
    'home_product_showcase_products',
    3600,
    fn () => Product::where('published', true)
      ->orderBy('sortOrder')
      ->orderByDesc('createdAt')
      ->take(4)
      ->get(),
  );

  if ($products->isEmpty()) {
    $products = collect([
      (object) ['name' => 'Lanyard Printing', 'slug' => 'lanyard-printing', 'shortDescription' => 'Lanyard custom dengan desain full color sesuai kebutuhan Anda.', 'featuredImage' => '/uploads/product-showcase-01.webp'],
      (object) ['name' => 'Lanyard Polyester', 'slug' => 'lanyard-polyester', 'shortDescription' => 'Pilihan ekonomis dengan bahan polyester yang kuat dan tahan lama.', 'featuredImage' => '/uploads/product-showcase-02.webp'],
      (object) ['name' => 'Lanyard Premium', 'slug' => 'lanyard-premium', 'shortDescription' => 'Material dan finishing premium untuk kebutuhan dengan tampilan eksklusif.', 'featuredImage' => '/uploads/product-showcase-03.webp'],
      (object) ['name' => 'Lanyard ID Card', 'slug' => 'lanyard-id-card', 'shortDescription' => 'Paket lanyard lengkap dengan holder ID card siap pakai.', 'featuredImage' => '/uploads/product-showcase-04.webp'],
    ]);
  }

  $fallbackImages = [
    '/uploads/product-showcase-01.webp',
    '/uploads/product-showcase-02.webp',
    '/uploads/product-showcase-03.webp',
    '/uploads/product-showcase-04.webp',
  ];

  $plain = fn ($value) => trim(preg_replace('/\s+/', ' ', strip_tags((string) $value)));
  $excerpt = function ($value, int $length = 90) use ($plain): string {
    $text = $plain($value);
    return mb_strlen($text) > $length ? mb_substr($text, 0, $length).'…' : $text;
  };
@endphp

<section id="produk" class="home-products-editorial" aria-labelledby="home-products-editorial-title">
  <div class="home-shell home-shell--wide">
    <header class="home-products-editorial__header">
      <p class="home-products-editorial__eyebrow">PRODUK KAMI</p>
      <h2 id="home-products-editorial-title" class="home-products-editorial__title">
        Pilihan Lanyard untuk Kebutuhan Anda
      </h2>
      <p class="home-products-editorial__desc">
        Berbagai pilihan lanyard yang dapat disesuaikan dengan kebutuhan event,
        perusahaan, komunitas, organisasi, dan berbagai kebutuhan lainnya.
      </p>
    </header>

    <div class="home-products-editorial__grid" role="list" aria-label="Produk lanyard pilihan">
      @foreach ($products as $index => $product)
        @php
          $image = \App\Support\AssetUrl::relative($product->featuredImage ?? null)
            ?: $fallbackImages[$index % count($fallbackImages)];
          $description = $excerpt($product->shortDescription ?? $product->description ?? '');
        @endphp
        <article class="home-products-editorial__card" role="listitem">
          <a
            href="{{ route('products.show', $product->slug) }}"
            class="home-products-editorial__link"
            aria-label="Lihat produk {{ $product->name }}"
          >
            <div class="home-products-editorial__image-wrap">
              <img
                src="{{ $image }}"
                @if ($srcset = \App\Support\ResponsiveImage::srcset($image))
                  srcset="{{ $srcset }}"
                  sizes="(min-width: 1024px) 280px, (min-width: 641px) 46vw, 300px"
                @endif
                alt="{{ $product->name }}"
                width="640"
                height="480"
                loading="lazy"
                decoding="async"
                class="home-products-editorial__img"
              >
              <span class="home-products-editorial__shade" aria-hidden="true"></span>
            </div>
            <div class="home-products-editorial__body">
              <h3 class="home-products-editorial__name">{{ $product->name }}</h3>
              @if ($description !== '')
                <p class="home-products-editorial__desc-text">{{ $description }}</p>
              @endif
              <span class="home-products-editorial__cta">
                <span>Lihat Produk</span>
                <svg class="home-products-editorial__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                  <line x1="5" y1="12" x2="19" y2="12"></line>
                  <polyline points="12 5 19 12 12 19"></polyline>
                </svg>
              </span>
            </div>
          </a>
        </article>
      @endforeach
    </div>

    <div class="home-products-editorial__all-wrap">
      <a href="{{ route('products.index') }}" class="home-products-editorial__all">
        <span>Lihat Semua Produk</span>
        <svg class="home-products-editorial__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <line x1="5" y1="12" x2="19" y2="12"></line>
          <polyline points="12 5 19 12 12 19"></polyline>
        </svg>
      </a>
    </div>
  </div>
</section>
