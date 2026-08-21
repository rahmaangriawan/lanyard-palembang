@php
  $portfolioItems = [
    [
      'class' => 'home-portfolio__tile--featured',
      'src' => '/uploads/portfolio-home-corporate.webp',
      'alt' => 'Lanyard custom untuk kebutuhan perusahaan dan kantor',
      'width' => 1314,
      'height' => 1197,
      'icon' => 'business',
      'label' => 'Corporate',
      'detail' => 'Perusahaan & Kantor',
    ],
    [
      'src' => '/uploads/portfolio-home-kampus.webp',
      'alt' => 'Lanyard custom biru untuk kebutuhan kampus dan sekolah',
      'width' => 1511,
      'height' => 1041,
      'icon' => 'school',
      'label' => 'Kampus',
      'detail' => 'Universitas & Sekolah',
    ],
    [
      'src' => '/uploads/portfolio-home-instansi.webp',
      'alt' => 'Lanyard custom untuk kebutuhan instansi dan BUMN',
      'width' => 1537,
      'height' => 1023,
      'icon' => 'location_city',
      'label' => 'Instansi',
      'detail' => 'Pemerintah & BUMN',
    ],
    [
      'src' => '/uploads/portfolio-home-event.webp',
      'alt' => 'Lanyard custom full color untuk event dan seminar',
      'width' => 1537,
      'height' => 1023,
      'icon' => 'event',
      'label' => 'Event',
      'detail' => 'Seminar & Konser',
    ],
    [
      'src' => '/uploads/portfolio-home-custom.webp',
      'alt' => 'Lanyard custom ungu dengan identitas visual yang ekspresif',
      'width' => 1495,
      'height' => 1052,
      'icon' => 'palette',
      'label' => 'Custom',
      'detail' => 'Exhibition & Community',
    ],
  ];

  $featuredPortfolio = $portfolioItems[0];
  $supportPortfolio = array_slice($portfolioItems, 1);
@endphp

<section id="portfolio-home" class="home-portfolio" aria-labelledby="home-portfolio-title">
  <div class="home-portfolio__ambient home-portfolio__ambient--right" aria-hidden="true"></div>

  <div class="home-portfolio__shell">
    <header class="home-portfolio__header">
      <div class="home-portfolio__intro">
        <p class="home-portfolio__eyebrow">Karya Terbaik Kami</p>
        <h2 id="home-portfolio-title">Lanyard Custom, <span>Dibuat Sesuai Identitas Brand</span></h2>
        <p class="home-portfolio__description">Setiap lanyard kami produksi dengan detail terbaik, menyesuaikan desain, warna, dan kebutuhan Anda.</p>
      </div>

      <a class="home-portfolio__cta" href="{{ route('portfolio') }}">
        <span>Lihat Semua Portofolio</span>
        <span class="material-symbols-outlined" aria-hidden="true">arrow_forward</span>
      </a>
    </header>

    <div class="home-portfolio__gallery" aria-label="Karya portfolio lanyard custom">
      <a class="home-portfolio__tile home-portfolio__tile--featured" href="{{ route('portfolio') }}" aria-label="{{ $featuredPortfolio['label'] }}: {{ $featuredPortfolio['detail'] }}">
        <figure>
          <img
            src="{{ $featuredPortfolio['src'] }}"
            @if ($portfolioSrcset = \App\Support\ResponsiveImage::srcset($featuredPortfolio['src'], [320, 640, 960]))
              srcset="{{ $portfolioSrcset }}"
              sizes="(min-width: 1024px) 48vw, 92vw"
            @endif
            alt="{{ $featuredPortfolio['alt'] }}"
            width="{{ $featuredPortfolio['width'] }}"
            height="{{ $featuredPortfolio['height'] }}"
            loading="lazy"
            decoding="async"
          >
          <figcaption>
            <x-home-portfolio-icon :name="$featuredPortfolio['icon']" />
            <span class="home-portfolio__tile-copy">
              <strong>{{ $featuredPortfolio['label'] }}</strong>
              <small>{{ $featuredPortfolio['detail'] }}</small>
            </span>
          </figcaption>
        </figure>
      </a>

      <div class="home-portfolio__support-grid">
        @foreach($supportPortfolio as $item)
          <a class="home-portfolio__tile" href="{{ route('portfolio') }}" aria-label="{{ $item['label'] }}: {{ $item['detail'] }}">
            <figure>
              <img
                src="{{ $item['src'] }}"
                @if ($portfolioSrcset = \App\Support\ResponsiveImage::srcset($item['src'], [320, 640, 960]))
                  srcset="{{ $portfolioSrcset }}"
                  sizes="(min-width: 1024px) 24vw, (min-width: 640px) 45vw, 92vw"
                @endif
                alt="{{ $item['alt'] }}"
                width="{{ $item['width'] }}"
                height="{{ $item['height'] }}"
                loading="lazy"
                decoding="async"
              >
              <figcaption>
                <x-home-portfolio-icon :name="$item['icon']" />
                <span class="home-portfolio__tile-copy">
                  <strong>{{ $item['label'] }}</strong>
                  <small>{{ $item['detail'] }}</small>
                </span>
              </figcaption>
            </figure>
          </a>
        @endforeach
      </div>
    </div>

  </div>
</section>
