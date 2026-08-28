@php
  $ctaWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau konsultasi desain dan harga lanyard custom.');
@endphp

<section class="home-cta" id="cta-section" aria-labelledby="home-cta-title">
  <div class="home-shell home-shell--wide">
    <div class="home-cta__card">
      {{-- Kolom Kiri: Copy & Actions --}}
      <div class="home-cta__content">
        {{-- Eyebrow with Sparkle Icon --}}
        <div class="home-cta__eyebrow-wrap">
          <span class="home-cta__sparkle-icon" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/>
            </svg>
          </span>
          <span class="home-cta__eyebrow">WUJUDKAN IDENTITAS BRAND ANDA</span>
        </div>

        {{-- Headline --}}
        <h2 id="home-cta-title" class="home-cta__title">
          Wujudkan Lanyard Impian Anda <span class="home-cta__title-accent">Sekarang.</span>
        </h2>

        {{-- Description --}}
        <p class="home-cta__desc">
          Konsultasi desain gratis, produksi 1–3 hari, dan gratis ongkir ke seluruh Indonesia.
        </p>

        {{-- Buttons --}}
        <div class="home-cta__buttons">
          <a class="home-cta__btn home-cta__btn--primary ptl-button-motion" href="{{ $ctaWhatsappUrl }}" target="_blank" rel="noopener noreferrer" data-button-motion>
            <span class="home-cta__btn-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
              </svg>
            </span>
            <span class="ptl-button-motion__label" data-button-label>Chat WhatsApp</span>
            <span class="home-cta__btn-arrow" aria-hidden="true">→</span>
          </a>

          <a class="home-cta__btn home-cta__btn--secondary ptl-button-motion" href="#kalkulator-harga" data-button-motion>
            <span class="home-cta__btn-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
              </svg>
            </span>
            <span class="ptl-button-motion__label" data-button-label>Cek Harga Dulu</span>
            <span class="home-cta__btn-arrow" aria-hidden="true">→</span>
          </a>
        </div>

        {{-- Benefits Row --}}
        <div class="home-cta__benefits">
          <div class="home-cta__benefit-item">
            <span class="home-cta__check-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
            </span>
            <span>Desain Gratis</span>
          </div>
          <span class="home-cta__benefit-divider" aria-hidden="true"></span>

          <div class="home-cta__benefit-item">
            <span class="home-cta__check-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
            </span>
            <span>Produksi Cepat</span>
          </div>
          <span class="home-cta__benefit-divider" aria-hidden="true"></span>

          <div class="home-cta__benefit-item">
            <span class="home-cta__check-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
              </svg>
            </span>
            <span>Bahan Premium</span>
          </div>
        </div>
      </div>

      {{-- Kolom Kanan: Product Visual --}}
      <div class="home-cta__visual">
        <div class="home-cta__visual-bg" aria-hidden="true"></div>
        <img
          class="home-cta__img"
          src="/uploads/home-cta-banner.webp"
          alt="Lanyard custom berkualitas tinggi Lanyard Palembang"
          width="800"
          height="600"
          loading="lazy"
          decoding="async"
        >
      </div>
    </div>
  </div>
</section>
