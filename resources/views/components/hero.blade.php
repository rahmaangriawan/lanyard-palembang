@php
  $heroQuotationUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau pesan lanyard custom.');
@endphp

<section id="hero" class="ptl-hero" aria-labelledby="hero-title">
  <div class="ptl-hero__bg" aria-hidden="true">
    <picture>
      <source
        type="image/webp"
        srcset="
          /uploads/hero-lanyard-palembang-gold-640w.webp 640w,
          /uploads/hero-lanyard-palembang-gold-960w.webp 960w,
          /uploads/hero-lanyard-palembang-gold-1280w.webp 1280w,
          /uploads/hero-lanyard-palembang-gold.webp 1717w
        "
        sizes="100vw"
      >
      <img
        class="ptl-hero__bg-img"
        src="/uploads/hero-lanyard-palembang-gold.webp"
        alt=""
        width="1717"
        height="916"
        loading="eager"
        fetchpriority="high"
        decoding="async"
      >
    </picture>
    <div class="ptl-hero__overlay"></div>
  </div>

  <div class="ptl-hero__container">
    <div class="ptl-hero__content">
      <h1 id="hero-title" class="ptl-hero__title">
        <span class="ptl-hero__title-line ptl-hero__title-line--white">Lanyard Custom</span>
        <span class="ptl-hero__title-line ptl-hero__title-line--gold">Berkualitas,</span>
        <span class="ptl-hero__title-line ptl-hero__title-line--gold">Identitas Anda</span>
        <span class="ptl-hero__title-line ptl-hero__title-line--gold">Lebih Berkelas.</span>
      </h1>

      <p class="ptl-hero__description">
        Percetakan lanyard custom di Palembang untuk kebutuhan perusahaan, event,
        komunitas, kampus, organisasi, dan berbagai acara lainnya.
      </p>

      <div class="ptl-hero__actions">
        <a
          href="{{ $heroQuotationUrl }}"
          target="_blank"
          rel="noopener noreferrer"
          class="ptl-hero__cta ptl-hero__cta--whatsapp"
        >
          <svg class="ptl-hero__cta-icon" viewBox="0 0 24 24" width="19" height="19" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
          </svg>
          <span>Order via WhatsApp</span>
        </a>

        <a href="{{ route('portfolio') }}" class="ptl-hero__cta ptl-hero__cta--ghost">
          <span>Lihat Portfolio</span>
        </a>
      </div>

      <div class="ptl-hero__features" role="list">
        <div class="ptl-hero__feature-item" role="listitem">
          <div class="ptl-hero__feature-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 19l7-7 3 3-7 7-3-3z"/>
              <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"/>
              <path d="M2 2l7.586 7.586"/>
              <circle cx="11" cy="11" r="2"/>
            </svg>
          </div>
          <div>
            <strong>Desain Bebas</strong>
            <small>Sesuai kebutuhan</small>
          </div>
        </div>

        <div class="ptl-hero__feature-item" role="listitem">
          <div class="ptl-hero__feature-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10"/>
              <circle cx="12" cy="12" r="6"/>
              <circle cx="12" cy="12" r="2"/>
            </svg>
          </div>
          <div>
            <strong>Cetak Tajam</strong>
            <small>Warna tidak mudah pudar</small>
          </div>
        </div>

        <div class="ptl-hero__feature-item" role="listitem">
          <div class="ptl-hero__feature-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
              <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
              <line x1="12" y1="22.08" x2="12" y2="12"/>
            </svg>
          </div>
          <div>
            <strong>Pesanan Partai Besar</strong>
            <small>Siap untuk kebutuhan massal</small>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
