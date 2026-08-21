@php
  $headerLinks = [
    ['label' => 'Beranda', 'href' => route('home'), 'patterns' => ['/']],
    ['label' => 'Produk', 'href' => route('products.index'), 'patterns' => ['produk*']],
    ['label' => 'Proses Order', 'href' => route('ordering'), 'patterns' => ['cara-pemesanan*']],
    ['label' => 'Portfolio', 'href' => route('portfolio'), 'patterns' => ['portofolio*']],
    ['label' => 'Testimoni', 'href' => route('testimonials'), 'patterns' => ['testimoni*']],
    ['label' => 'FAQ', 'href' => route('faq'), 'patterns' => ['faq*']],
  ];

  $quotationUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya mau konsultasi lanyard custom.');
@endphp

<div class="site-header__sentinel" id="site-header-sentinel" aria-hidden="true"></div>

<header class="site-header" id="site-header">
  <div class="site-header__surface">
    <nav class="site-header__nav" aria-label="Navigasi utama">
      <a href="{{ route('home') }}" class="site-header__logo" aria-label="Lanyard Medan, kembali ke beranda">
        <img
          src="/uploads/lanyard-medan-logo-160w.webp"
          srcset="/uploads/lanyard-medan-logo-160w.webp 160w, /uploads/lanyard-medan-logo-256w.webp 256w, /uploads/lanyard-medan-logo.webp 500w"
          sizes="138px"
          alt="Lanyard Medan"
          width="500"
          height="122"
          loading="eager"
          fetchpriority="high"
          decoding="async"
        />
      </a>

      <div class="site-header__links">
        @foreach ($headerLinks as $item)
          @php($isActive = !empty($item['patterns']) && (request()->is(...$item['patterns']) || (empty($item['patterns']) && false)))
          @if ($item['label'] === 'Beranda' && request()->routeIs('home'))
            @php($isActive = true)
          @endif
          <a
            href="{{ $item['href'] }}"
            class="site-header__link"
            @if ($isActive) aria-current="page" @endif
          >
            <span>{{ $item['label'] }}</span>
          </a>
        @endforeach
      </div>

      <a
        href="{{ $quotationUrl }}"
        target="_blank"
        rel="noopener noreferrer"
        class="site-header__btn site-header__btn--whatsapp site-header__desktop-cta"
      >
        <span>Pesan via WhatsApp</span>
        <svg class="site-header__btn-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
          <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
        </svg>
      </a>

      <button
        type="button"
        class="site-header__hamburger"
        id="menu-toggle"
        aria-label="Buka menu navigasi"
        aria-controls="mobile-menu"
        aria-expanded="false"
      >
        <span class="hamburger-line hamburger-line--top"></span>
        <span class="hamburger-line hamburger-line--middle"></span>
        <span class="hamburger-line hamburger-line--bottom"></span>
      </button>
    </nav>
  </div>

  <button class="site-header__backdrop" id="menu-backdrop" type="button" aria-label="Tutup menu" tabindex="-1"></button>

  <div class="site-header__mobile" id="mobile-menu" aria-hidden="true">
    <div class="site-header__mobile-inner">
      <nav class="site-header__mobile-links" aria-label="Navigasi seluler">
        @foreach ($headerLinks as $item)
          @php($isActive = (!empty($item['patterns']) && request()->is(...$item['patterns'])) || ($item['label'] === 'Beranda' && request()->routeIs('home')))
          <a
            href="{{ $item['href'] }}"
            class="site-header__link site-header__link--mobile"
            @if ($isActive) aria-current="page" @endif
          >
            <span>{{ $item['label'] }}</span>
            <span class="site-header__link-arrow" aria-hidden="true">
              <svg viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                <line x1="5" y1="12" x2="19" y2="12"></line>
                <polyline points="12 5 19 12 12 19"></polyline>
              </svg>
            </span>
          </a>
        @endforeach
      </nav>

      <div class="site-header__mobile-contact">
        <p>Butuh rekomendasi bahan atau ukuran?</p>
        <a
          href="{{ $quotationUrl }}"
          target="_blank"
          rel="noopener noreferrer"
          class="site-header__btn site-header__btn--primary site-header__btn--full"
        >
          <svg class="site-header__btn-icon" viewBox="0 0 24 24" width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
          </svg>
          <span>Pesan via WhatsApp</span>
        </a>
      </div>
    </div>
  </div>
</header>
