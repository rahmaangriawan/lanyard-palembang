@extends('layouts.public')

@php
  use App\Support\AssetUrl;
  use App\Support\ResponsiveImage;
  use Illuminate\Support\Str;

  $normalizeCopy = static function ($value): string {
      $plain = html_entity_decode(strip_tags((string) $value), ENT_QUOTES | ENT_HTML5, 'UTF-8');
      $plain = str_replace(
          ['IndoLanyard', 'Pusat Tali Lanyard', 'PusatTaliLanyard', '—', '–'],
          ['Lanyard Medan', 'Lanyard Medan', 'Lanyard Medan', '-', '-'],
          $plain
      );

      return trim((string) preg_replace('/\s+/u', ' ', $plain));
  };

  $parseProductList = static function ($value) use ($normalizeCopy): array {
      if (is_array($value)) {
          $items = $value;
      } else {
          $raw = trim((string) $value);
          $decoded = $raw !== '' ? json_decode($raw, true) : null;
          $items = is_array($decoded) ? $decoded : preg_split('/(?:\r\n|\r|\n|;|\|)+/u', $raw, -1, PREG_SPLIT_NO_EMPTY);
      }

      $normalized = [];
      foreach ((array) $items as $key => $item) {
          if (is_array($item)) {
              $item = implode(': ', array_filter(array_map($normalizeCopy, $item)));
          } elseif (! is_int($key) && ! ctype_digit((string) $key)) {
              $item = $normalizeCopy($key).': '.$normalizeCopy($item);
          } else {
              $item = $normalizeCopy($item);
          }

          if ($item !== '') {
              $normalized[] = $item;
          }
      }

      return array_values(array_unique($normalized));
  };

  $productName = $normalizeCopy($product->name ?: 'Lanyard Custom');
  $categoryName = $normalizeCopy($product->category?->name ?: 'Lanyard Custom');
  $sku = $normalizeCopy($product->sku);
  $price = $normalizeCopy($product->basePrice) ?: 'Minta Penawaran';
  $minimumOrder = $normalizeCopy($product->minOrder) ?: '50 pcs';
  $description = $normalizeCopy($product->description ?: $product->shortDescription);
  $description = $description ?: 'Informasi bahan, ukuran, aksesori, dan kebutuhan produksi dapat dikonsultasikan langsung dengan tim Lanyard Medan.';
  $descriptionHtml = Str::markdown($description, [
      'html_input' => 'strip',
      'allow_unsafe_links' => false,
  ]);
  $shortDescription = $normalizeCopy($product->shortDescription) ?: Str::limit($description, 150, '');
  $specifications = $parseProductList($product->specs);
  $accessories = $parseProductList($product->accessories);

  $hasFeaturedImage = filled($product->featuredImage);
  $heroImage = AssetUrl::relative($product->featuredImage, '/uploads/aset-produk.webp');
  $heroSrcset = ResponsiveImage::srcset($heroImage);
  $heroAlt = $hasFeaturedImage ? 'Foto '.$productName.' hasil produksi Lanyard Medan' : 'Contoh hasil tali lanyard custom Lanyard Medan';

  $waNumber = \App\Models\Setting::query()->where('key', 'wa_number')->value('value') ?: '6282210200700';
  $productContext = "Halo Lanyard Medan, saya tertarik untuk memesan produk ini:\n\n"
      ."• Produk: {$productName}\n"
      .($sku ? "• SKU: {$sku}\n" : '')
      .($price ? "• Estimasi Harga: {$price}\n" : '')
      ."• Jumlah Pesanan: \n"
      ."• Deadline Acara: \n\n"
      ."Mohon dibantu info penawaran harga terbaik dan layout mockup gratisnya. Terima kasih!";
  $waOrderLink = 'https://wa.me/'.$waNumber.'?text='.rawurlencode($productContext);
  $title = filled($product->metaTitle) ? $normalizeCopy($product->metaTitle) : $productName.' | Lanyard Medan';
  $metaDescription = filled($product->metaDescription)
      ? $normalizeCopy($product->metaDescription)
      : Str::limit($shortDescription, 155, '');
@endphp

@section('title', $title)
@section('meta_description', $metaDescription)
@section('seo_og_image', $heroImage)
@section('seo_type', 'product')
@section('seo_canonical', config('app.url').'/produk/'.$product->slug)

@push('head')
  <link rel="preload" href="{{ $heroImage }}" as="image" fetchpriority="high">
  <link rel="stylesheet" href="/css/product-detail.css?v={{ file_exists(public_path('css/product-detail.css')) ? filemtime(public_path('css/product-detail.css')) : 1 }}">
@endpush

@push('schema')
  @include('components.schema.produk-detail', ['product' => $product])
@endpush

@section('content')
<div class="product-detail-page">
  {{-- 1. BREADCRUMBS --}}
  <section class="product-detail__breadcrumb-section" aria-label="Navigasi halaman">
    <div class="home-shell home-shell--wide">
      <nav class="product-detail__breadcrumb" aria-label="Breadcrumb">
        <ol>
          <li><a href="{{ route('home') }}">Beranda</a></li>
          <li class="product-detail__breadcrumb-separator" aria-hidden="true">/</li>
          <li><a href="{{ route('products.index') }}">Produk</a></li>
          <li class="product-detail__breadcrumb-separator" aria-hidden="true">/</li>
          @if($product->category)
            <li><a href="{{ route('products.index', ['kategori' => $product->category->slug ?: Str::slug($categoryName)]) }}">{{ $categoryName }}</a></li>
            <li class="product-detail__breadcrumb-separator" aria-hidden="true">/</li>
          @endif
          <li class="product-detail__breadcrumb-current" aria-current="page">{{ $productName }}</li>
        </ol>
      </nav>
    </div>
  </section>

  {{-- 2. HERO MARKETPLACE SECTION --}}
  <section class="product-detail__hero" aria-labelledby="product-detail-title">
    <div class="home-shell home-shell--wide">
      <div class="product-detail__marketplace">
        {{-- Kolom Kiri: Galeri / Gambar --}}
        <div class="product-detail__media">
          <div class="product-detail__gallery-frame">
            <span class="product-detail__category-badge">{{ $categoryName }}</span>
            <img
              src="{{ $heroImage }}"
              @if($heroSrcset) srcset="{{ $heroSrcset }}" sizes="(max-width: 767px) 100vw, 600px" @endif
              alt="{{ $heroAlt }}"
              width="1200"
              height="900"
              fetchpriority="high"
              decoding="async"
            >
          </div>

          <div class="product-detail__media-trust">
            <div class="product-detail__media-trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
              </svg>
              <span>Garansi Kualitas 100%</span>
            </div>
            <div class="product-detail__media-trust-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              <span>Gratis Mockup Desain</span>
            </div>
          </div>
        </div>

        {{-- Kolom Kanan: Detail & Purchase Panel --}}
        <aside class="product-detail__purchase" aria-label="Panel pemesanan produk">
          <div class="product-detail__meta-tags">
            @if($sku)
              <span class="product-detail__sku-pill">SKU: {{ $sku }}</span>
            @endif
            <span class="product-detail__status-pill">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <polyline points="20 6 9 17 4 12"/>
              </svg>
              <span>Produksi Custom &bull; ACC Mockup Cepat</span>
            </span>
          </div>

          <h1 id="product-detail-title" class="product-detail__title">{{ $productName }}</h1>
          <p class="product-detail__summary">{{ $shortDescription }}</p>

          <div class="product-detail__price-card">
            <span class="product-detail__price-label">Estimasi Harga</span>
            <strong class="product-detail__price-value">{{ $price }}</strong>
            <span class="product-detail__price-note">Harga akhir menyesuaikan jumlah kuantitas, lebar tali, dan pilihan aksesoris.</span>
          </div>

          <dl class="product-detail__quick-specs">
            <div class="product-detail__quick-item">
              <dt>Minimal Pesanan</dt>
              <dd>{{ $minimumOrder }}</dd>
            </div>
            <div class="product-detail__quick-item">
              <dt>Estimasi Produksi</dt>
              <dd>1&ndash;3 Hari Kerja</dd>
            </div>
            <div class="product-detail__quick-item">
              <dt>Teknik Cetak</dt>
              <dd>Digital Sublimasi / Sablon</dd>
            </div>
            <div class="product-detail__quick-item">
              <dt>Jangkauan Kirim</dt>
              <dd>Medan &amp; Seluruh Indonesia</dd>
            </div>
          </dl>

          <div class="product-detail__actions">
            <a class="product-detail__btn product-detail__btn--primary" href="{{ $waOrderLink }}" target="_blank" rel="noopener noreferrer">
              <span class="product-detail__btn-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="currentColor">
                  <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/>
                </svg>
              </span>
              <span>Pesan via WhatsApp Sekarang</span>
              <span aria-hidden="true">&rarr;</span>
            </a>
          </div>
        </aside>
      </div>
    </div>
  </section>

  {{-- 3. DOSSIER & SPESIFIKASI LENGKAP --}}
  <section id="informasi-produk" class="product-detail__dossier" aria-labelledby="product-dossier-title">
    <div class="home-shell home-shell--wide">
      <div class="product-detail__dossier-grid">
        {{-- Kolom Kiri: Deskripsi Lengkap --}}
        <article class="product-detail__article">
          <p class="product-detail__section-eyebrow">DETAIL LENGKAP</p>
          <h2 id="product-dossier-title" class="product-detail__section-title">Deskripsi &amp; Karakteristik Produk</h2>
          <div class="product-detail__prose">
            {!! $descriptionHtml !!}
          </div>
        </article>

        {{-- Kolom Kanan: Spesifikasi, Aksesoris & Workflow --}}
        <div class="product-detail__sidebar-cards">
          @if($specifications)
            <div class="product-detail__info-card">
              <div class="product-detail__info-card-header">
                <span class="product-detail__info-card-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                    <line x1="3" y1="9" x2="21" y2="9"/>
                    <line x1="9" y1="21" x2="9" y2="9"/>
                  </svg>
                </span>
                <h3 class="product-detail__info-card-title">Spesifikasi Material</h3>
              </div>
              <ul class="product-detail__spec-list">
                @foreach($specifications as $specification)
                  <li class="product-detail__spec-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    <span>{{ $specification }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          @endif

          @if($accessories)
            <div class="product-detail__info-card">
              <div class="product-detail__info-card-header">
                <span class="product-detail__info-card-icon" aria-hidden="true">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                    <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                    <line x1="12" y1="22.08" x2="12" y2="12"/>
                  </svg>
                </span>
                <h3 class="product-detail__info-card-title">Opsi Aksesoris &amp; Finishing</h3>
              </div>
              <ul class="product-detail__spec-list">
                @foreach($accessories as $accessory)
                  <li class="product-detail__spec-item">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                      <polyline points="20 6 9 17 4 12"/>
                    </svg>
                    <span>{{ $accessory }}</span>
                  </li>
                @endforeach
              </ul>
            </div>
          @endif

          {{-- Order Workflow Card --}}
          <div class="product-detail__workflow-card">
            <div class="product-detail__workflow-header">
              <p>PROSES MUDAH &amp; CEPAT</p>
              <h4>4 Tahap Pemesanan Lanyard</h4>
            </div>
            <ol class="product-detail__workflow-steps">
              <li class="product-detail__workflow-step">
                <span class="product-detail__workflow-num">1</span>
                <span class="product-detail__workflow-text">Konsultasi jumlah &amp; kirim logo via WhatsApp</span>
              </li>
              <li class="product-detail__workflow-step">
                <span class="product-detail__workflow-num">2</span>
                <span class="product-detail__workflow-text">Persetujuan mockup digital 100% gratis</span>
              </li>
              <li class="product-detail__workflow-step">
                <span class="product-detail__workflow-num">3</span>
                <span class="product-detail__workflow-text">Produksi kilat 1&ndash;3 hari dengan quality control</span>
              </li>
              <li class="product-detail__workflow-step">
                <span class="product-detail__workflow-num">4</span>
                <span class="product-detail__workflow-text">Pengiriman aman langsung ke alamat Anda</span>
              </li>
            </ol>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- 4. REKOMENDASI PRODUK TERKAIT --}}
  @if($relatedProducts->isNotEmpty())
    <section class="product-detail__related" aria-labelledby="related-products-title">
      <div class="home-shell home-shell--wide">
        <header class="product-detail__related-header">
          <div>
            <p class="product-detail__related-eyebrow">REKOMENDASI VARIAN</p>
            <h2 id="related-products-title" class="product-detail__related-title">Produk Serupa Lainnya</h2>
          </div>
          <a href="{{ route('products.index') }}" class="product-detail__related-all-link">
            <span>Lihat Semua Katalog</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
              <line x1="5" y1="12" x2="19" y2="12"/>
              <polyline points="12 5 19 12 12 19"/>
            </svg>
          </a>
        </header>

        <ul class="product-detail__related-grid" aria-label="Daftar produk serupa">
          @foreach($relatedProducts as $relatedProduct)
            @php
              $relatedName = $normalizeCopy($relatedProduct->name ?: 'Lanyard Custom');
              $relatedImage = AssetUrl::relative($relatedProduct->featuredImage, '/uploads/aset-produk.webp');
              $relatedSrcset = ResponsiveImage::srcset($relatedImage);
              $relatedAlt = filled($relatedProduct->featuredImage) ? 'Foto '.$relatedName : 'Contoh hasil lanyard custom Lanyard Medan';
              $relatedPrice = $normalizeCopy($relatedProduct->basePrice) ?: 'Minta Penawaran';
              $relatedCategory = $normalizeCopy($relatedProduct->category?->name ?: 'Lanyard Custom');
              $relatedShortDesc = $normalizeCopy($relatedProduct->shortDescription ?: 'Tali lanyard custom berkualitas tinggi.');
            @endphp
            <li class="product-detail__related-card">
              <a href="{{ route('products.show', $relatedProduct->slug) }}" class="product-detail__related-link" aria-label="Lihat detail {{ $relatedName }}">
                <figure class="product-detail__related-thumb">
                  <span class="product-detail__related-badge">{{ $relatedCategory }}</span>
                  <img
                    src="{{ $relatedImage }}"
                    @if($relatedSrcset) srcset="{{ $relatedSrcset }}" sizes="(max-width: 767px) 100vw, (max-width: 1100px) 50vw, 25vw" @endif
                    alt="{{ $relatedAlt }}"
                    width="480"
                    height="360"
                    loading="lazy"
                    decoding="async"
                  >
                </figure>
                <div class="product-detail__related-body">
                  <h3 class="product-detail__related-card-title">{{ $relatedName }}</h3>
                  <p class="product-detail__related-desc">{{ $relatedShortDesc }}</p>
                  <div class="product-detail__related-footer">
                    <span class="product-detail__related-price">{{ $relatedPrice }}</span>
                    <span class="product-detail__related-action">
                      <span>Detail</span>
                      <span aria-hidden="true">&rarr;</span>
                    </span>
                  </div>
                </div>
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </section>
  @endif

  {{-- 5. CLOSING CTA SECTION --}}
  @include('components.cta')
</div>

@include('components.footer')
@endsection
