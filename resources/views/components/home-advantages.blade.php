<section id="kebutuhan" class="home-needs" aria-labelledby="needs-title">
  <div class="home-needs__container">
    <div class="home-needs__layout">
      {{-- Gambar di sebelah kiri konten, menempel ke atas --}}
      <div class="home-needs__visual" aria-hidden="true">
        <img
          src="/uploads/home-needs-bg-left.webp"
          alt=""
          width="1536"
          height="1024"
          loading="lazy"
          decoding="async"
          class="home-needs__img"
        >
      </div>

      {{-- Konten Teks & 6 Kategori tepat di sebelah kanan gambar --}}
      <div class="home-needs__content">
        <header class="home-needs__header">
          <p class="home-needs__eyebrow">UNTUK BERBAGAI KEBUTUHAN</p>
          <h2 id="needs-title" class="home-needs__title">
            <span>Satu Lanyard,</span>
            <span>Banyak Cerita.</span>
          </h2>
          <p class="home-needs__description">
            Dari acara kecil hingga event besar, kami siap cetak lanyard yang
            mencerminkan identitas dan profesionalitas Anda.
          </p>
        </header>

        <div class="home-needs__categories" role="list" aria-label="Segmen kebutuhan lanyard custom">
          {{-- 1. Perusahaan --}}
          <div class="home-needs__category" role="listitem">
            <div class="home-needs__category-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <rect x="4" y="2" width="16" height="20" rx="2" ry="2"/>
                <path d="M9 22v-4h6v4"/>
                <line x1="8" y1="6" x2="10" y2="6"/>
                <line x1="14" y1="6" x2="16" y2="6"/>
                <line x1="8" y1="10" x2="10" y2="10"/>
                <line x1="14" y1="10" x2="16" y2="10"/>
                <line x1="8" y1="14" x2="10" y2="14"/>
                <line x1="14" y1="14" x2="16" y2="14"/>
              </svg>
            </div>
            <span class="home-needs__category-name">Perusahaan</span>
          </div>

          {{-- 2. Event & Seminar --}}
          <div class="home-needs__category" role="listitem">
            <div class="home-needs__category-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3z"/>
                <path d="M19 10v2a7 7 0 0 1-14 0v-2"/>
                <line x1="12" y1="19" x2="12" y2="23"/>
                <line x1="8" y1="23" x2="16" y2="23"/>
              </svg>
            </div>
            <span class="home-needs__category-name">Event &amp; Seminar</span>
          </div>

          {{-- 3. Kampus --}}
          <div class="home-needs__category" role="listitem">
            <div class="home-needs__category-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                <path d="M6 12v5c3 3 9 3 12 0v-5"/>
              </svg>
            </div>
            <span class="home-needs__category-name">Kampus</span>
          </div>

          {{-- 4. Komunitas --}}
          <div class="home-needs__category" role="listitem">
            <div class="home-needs__category-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                <circle cx="9" cy="7" r="4"/>
                <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
              </svg>
            </div>
            <span class="home-needs__category-name">Komunitas</span>
          </div>

          {{-- 5. Organisasi --}}
          <div class="home-needs__category" role="listitem">
            <div class="home-needs__category-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 15s1-1 4-1 5 2 8 2 4-1 4-1V3s-1 1-4 1-5-2-8-2-4 1-4 1z"/>
                <line x1="4" y1="22" x2="4" y2="15"/>
              </svg>
            </div>
            <span class="home-needs__category-name">Organisasi</span>
          </div>

          {{-- 6. Promosi Brand --}}
          <div class="home-needs__category" role="listitem">
            <div class="home-needs__category-icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                <line x1="9" y1="9" x2="15" y2="9"/>
                <line x1="9" y1="13" x2="13" y2="13"/>
              </svg>
            </div>
            <span class="home-needs__category-name">Promosi Brand</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
