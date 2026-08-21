@php
  $blogWhatsappUrl = 'https://wa.me/6282210200700?text='.rawurlencode('Halo Lanyard Medan, saya sudah membaca blog dan ingin konsultasi produk lanyard custom.');
@endphp

<section class="blog-archive-cta" aria-labelledby="blog-archive-cta-title">
  <div class="blog-archive-shell">
    <div class="blog-archive-cta__panel">
      <div>
        <h2 id="blog-archive-cta-title">Butuh Lanyard yang Sesuai Kebutuhan Anda?</h2>
        <p>Gunakan panduan di blog atau diskusikan konsep desain, pilihan bahan, dan jumlah pesanan langsung dengan tim spesialis kami.</p>
      </div>
      <div class="blog-archive-cta__actions">
        <a class="blog-archive-button blog-archive-button--light" href="{{ route('products.index') }}">
          <span>Lihat Katalog Produk</span>
          <span aria-hidden="true">&rarr;</span>
        </a>
        <a class="blog-archive-button blog-archive-button--outline" href="{{ $blogWhatsappUrl }}" target="_blank" rel="noopener noreferrer">
          <svg viewBox="0 0 24 24" fill="currentColor" width="18" height="18" aria-hidden="true">
            <path d="M12.04 2c-5.46 0-9.91 4.45-9.91 9.91 0 1.75.46 3.45 1.32 4.95L2.05 22l5.25-1.38c1.45.79 3.08 1.21 4.74 1.21 5.46 0 9.91-4.45 9.91-9.91 0-2.65-1.03-5.14-2.9-7.01A9.816 9.816 0 0 0 12.04 2z"/>
          </svg>
          <span>Chat WhatsApp</span>
        </a>
      </div>
    </div>
  </div>
</section>
