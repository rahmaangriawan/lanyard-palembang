@php
  use App\Models\Testimonial;
  use Illuminate\Support\Facades\Schema;

  $testimonialNames = ['Rizky Pratama', 'Dewi Lestari', 'Andi Pratama'];

  $rows = Schema::hasTable('testimonial')
    ? \App\Support\HomePageCache::remember(
        'home_testimonials_asymmetric',
        fn () => Testimonial::whereIn('name', $testimonialNames)->get()->keyBy('name')
      )
    : collect();

  $fallbackData = [
    'Rizky Pratama' => ['role' => 'Koordinator Komunitas', 'quote' => 'Pesanan untuk kegiatan komunitas kami diproses dengan jelas dari awal. Timnya membantu menyesuaikan desain dan hasil akhirnya rapi saat dibagikan ke anggota.', 'avatar' => '/images/testimonials/rizky-pratama.webp'],
    'Dewi Lestari' => ['role' => 'Pemilik Brand Lokal', 'quote' => 'Kami butuh lanyard yang selaras dengan identitas brand. Warna dan detail desain diperhatikan dengan baik, jadi hasilnya terasa lebih profesional.', 'avatar' => '/images/testimonials/dewi-lestari.webp'],
    'Andi Pratama' => ['role' => 'Event Organizer', 'quote' => 'Pelayanan cepat dan hasil lanyardnya rapi. Warna sesuai desain, bahan nyaman dipakai, dan timnya responsif sampai barang diterima.', 'avatar' => '/uploads/testimoni-andi-pratama.webp'],
  ];

  $testimonialData = function (string $name) use ($rows, $fallbackData) {
    $row = $rows->get($name);
    $fallback = $fallbackData[$name];

    return [
      'name' => $name,
      'role' => $row->role ?? $fallback['role'],
      'quote' => trim(preg_replace('/\s+/', ' ', strip_tags((string) ($row->quote ?? $fallback['quote'])))),
      'avatar' => $row->imageUrl ?? $fallback['avatar'],
    ];
  };

  $featured = $testimonialData('Rizky Pratama');
  $supporting = [
    $testimonialData('Dewi Lestari'),
    $testimonialData('Andi Pratama'),
  ];
@endphp

<section class="home-testimonials" id="testimoni" aria-label="Testimoni pelanggan Lanyard Medan">
  <div class="home-shell home-shell--wide">
    <header class="home-testimonials__intro">
      <p class="home-testimonials__eyebrow">TESTIMONI PELANGGAN</p>
      <h2 class="home-testimonials__title">Apa Kata Mereka?</h2>
      <p class="home-testimonials__lead">Kepercayaan pelanggan adalah motivasi kami untuk terus memberikan produk dan layanan terbaik.</p>
    </header>

    <div class="home-testimonials__layout">
      {{-- Featured Testimonial (Kiri): Quotation Mark BESAR + Quote Besar --}}
      <article class="home-testimonials__featured">
        <div class="home-testimonials__mark-big" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="currentColor" focusable="false"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
        </div>
        <blockquote class="home-testimonials__featured-quote">
          <p>{{ $featured['quote'] }}</p>
        </blockquote>
        <div class="home-testimonials__stars" aria-label="Rating 5 dari 5">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
        <footer class="home-testimonials__person home-testimonials__person--featured">
          <img src="{{ $featured['avatar'] }}" alt="Foto {{ $featured['name'] }}" width="144" height="144" loading="lazy" decoding="async">
          <div class="home-testimonials__person-info">
            <strong class="home-testimonials__person-name">{{ $featured['name'] }}</strong>
            <span class="home-testimonials__person-role">{{ $featured['role'] }}</span>
          </div>
        </footer>
      </article>

      {{-- Dua Testimonial Compact (Kanan): Circle Merah + Quote di Kanan --}}
      <div class="home-testimonials__stack">
        @foreach ($supporting as $item)
          <article class="home-testimonials__mini">
            <span class="home-testimonials__mini-mark" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor" focusable="false"><path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/></svg>
            </span>
            <div class="home-testimonials__mini-body">
              <blockquote class="home-testimonials__mini-quote">
                <p>{{ $item['quote'] }}</p>
              </blockquote>
              <div class="home-testimonials__stars" aria-label="Rating 5 dari 5">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
              <footer class="home-testimonials__person home-testimonials__person--mini">
                <img src="{{ $item['avatar'] }}" alt="Foto {{ $item['name'] }}" width="96" height="96" loading="lazy" decoding="async">
                <div class="home-testimonials__person-info">
                  <strong class="home-testimonials__person-name">{{ $item['name'] }}</strong>
                  <span class="home-testimonials__person-role">{{ $item['role'] }}</span>
                </div>
              </footer>
            </div>
          </article>
        @endforeach
      </div>
    </div>
  </div>
</section>
