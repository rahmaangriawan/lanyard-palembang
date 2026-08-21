<footer class="site-footer" id="site-footer" aria-labelledby="site-footer-title">
  <h2 class="sr-only" id="site-footer-title">Informasi Footer Lanyard Medan</h2>

  <div class="site-footer__container">
    {{-- Bagian Utama: 3 Area (Brand, Navigasi, Kontak) --}}
    <div class="site-footer__main">
      {{-- Area 1: Brand --}}
      <div class="site-footer__brand">
        <a class="site-footer__logo" href="{{ route('home') }}" aria-label="Lanyard Medan, kembali ke beranda">
          <img
            src="/uploads/lanyard-medan-logo-160w.webp"
            srcset="/uploads/lanyard-medan-logo-160w.webp 160w, /uploads/lanyard-medan-logo-256w.webp 256w, /uploads/lanyard-medan-logo.webp 500w"
            sizes="160px"
            alt="Lanyard Medan"
            width="160"
            height="40"
            loading="lazy"
            decoding="async"
          />
        </a>
        <p class="site-footer__desc">
          Vendor lanyard custom untuk kebutuhan kantor, event, sekolah, dan komunitas dengan proses yang jelas.
        </p>
      </div>

      {{-- Area 2: Navigasi (Layanan & Jelajahi) --}}
      <nav class="site-footer__nav" aria-label="Navigasi footer">
        <div class="site-footer__nav-group">
          <h3 class="site-footer__heading">Layanan</h3>
          <ul class="site-footer__links">
            <li><a href="{{ route('services') }}">Layanan</a></li>
            <li><a href="{{ route('products.index') }}">Produk</a></li>
            <li><a href="{{ route('shipping') }}">Pengiriman</a></li>
            <li><a href="{{ route('warranty') }}">Garansi</a></li>
            <li><a href="{{ route('faq') }}">FAQ</a></li>
            <li><a href="{{ route('ordering') }}">Cara Pemesanan</a></li>
          </ul>
        </div>

        <div class="site-footer__nav-group">
          <h3 class="site-footer__heading">Jelajahi</h3>
          <ul class="site-footer__links">
            <li><a href="{{ route('blog.index') }}">Blog</a></li>
            <li><a href="{{ route('area') }}">Area Layanan</a></li>
            <li><a href="{{ route('design-templates') }}">Template Desain</a></li>
            <li><a href="{{ route('portfolio') }}">Portofolio</a></li>
            <li><a href="{{ route('about') }}">Tentang Kami</a></li>
            <li><a href="{{ route('testimonials') }}">Testimoni Pelanggan</a></li>
          </ul>
        </div>
      </nav>

      {{-- Area 3: Kontak --}}
      <div class="site-footer__contact-col">
        <h3 class="site-footer__heading">Kontak Kami</h3>
        <ul class="site-footer__contact-list">
          <li>
            <a href="https://wa.me/6282210200700" target="_blank" rel="noopener noreferrer" class="site-footer__contact-link">
              <span class="site-footer__contact-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/>
                </svg>
              </span>
              <span>+62 822-1020-0700</span>
            </a>
          </li>
          <li>
            <a href="mailto:info@lanyardmedan.com" class="site-footer__contact-link">
              <span class="site-footer__contact-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                  <polyline points="22,6 12,13 2,6"/>
                </svg>
              </span>
              <span>info@lanyardmedan.com</span>
            </a>
          </li>
          <li>
            <div class="site-footer__contact-item">
              <span class="site-footer__contact-icon" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                  <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
                  <circle cx="12" cy="10" r="3"/>
                </svg>
              </span>
              <span>Medan, Sumatera Utara</span>
            </div>
          </li>
        </ul>
      </div>
    </div>

    {{-- Bottom Footer: Divider, Copyright & Legal Links --}}
    <div class="site-footer__bottom">
      <p class="site-footer__copyright">&copy; {{ date('Y') }} Lanyard Medan. Seluruh hak dilindungi.</p>
      <div class="site-footer__legal">
        <a href="{{ route('privacy') }}">Kebijakan Privasi</a>
        <span class="site-footer__legal-sep" aria-hidden="true">&bull;</span>
        <a href="{{ route('terms') }}">Syarat &amp; Ketentuan</a>
      </div>
    </div>
  </div>
</footer>
