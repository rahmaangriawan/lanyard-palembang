@php
  $ctaWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Palembang, saya mau konsultasi desain dan harga lanyard custom.');
@endphp

<section id="cta-section" class="home-cta-editorial" aria-labelledby="home-cta-editorial-title">
  <div class="home-shell home-shell--wide">
    <div class="home-cta-editorial__panel">
      <div class="home-cta-editorial__content">
        <p class="home-cta-editorial__eyebrow">SIAP WUJUDKAN IDENTITAS BRAND ANDA?</p>
        <h2 id="home-cta-editorial-title" class="home-cta-editorial__title">
          <span>Buat Lanyard Custom</span>
          <span class="home-cta-editorial__title-accent">Sekarang Juga.</span>
        </h2>
        <p class="home-cta-editorial__desc">
          Kami siap membantu Anda dari konsultasi, desain, hingga produksi dengan kualitas terbaik dan pengerjaan tepat waktu.
        </p>

        <div class="home-cta-editorial__actions">
          <a href="{{ $ctaWhatsappUrl }}" class="home-cta-editorial__btn home-cta-editorial__btn--primary" target="_blank" rel="noopener noreferrer">
            <span>Konsultasi Sekarang</span>
            <span aria-hidden="true">→</span>
          </a>
          <a href="{{ route('portfolio') }}" class="home-cta-editorial__btn home-cta-editorial__btn--secondary">
            <span>Lihat Portofolio</span>
            <span aria-hidden="true">→</span>
          </a>
        </div>



      </div>

      <div class="home-cta-editorial__visual" aria-hidden="true">
        <span class="home-cta-editorial__line"></span>
        <img
          src="/uploads/home-cta-lanyard-palembang.webp"
          alt="Lanyard custom hitam dengan aksen gold Lanyard Palembang"
          width="1536"
          height="1024"
          loading="lazy"
          decoding="async"
        >
      </div>
    </div>
  </div>
</section>
