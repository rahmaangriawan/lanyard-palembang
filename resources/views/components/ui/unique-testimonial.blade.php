@php
  $fallbackAvatars = [
    '/images/testimonials/rizky-pratama.webp',
    '/images/testimonials/dewi-lestari.webp',
    '/uploads/testimoni-andi-pratama.webp',
  ];

  $fallbackTestimonials = [
    [
      'id' => 1,
      'quote' => 'Pesanan untuk kegiatan komunitas kami diproses dengan jelas dari awal. Timnya membantu menyesuaikan desain dan hasil akhirnya rapi saat dibagikan ke anggota.',
      'author' => 'Rizky Pratama',
      'role' => 'Koordinator Komunitas',
      'avatar' => $fallbackAvatars[0],
    ],
    [
      'id' => 2,
      'quote' => 'Kami butuh lanyard yang selaras dengan identitas brand. Warna dan detail desain diperhatikan dengan baik, jadi hasilnya terasa lebih profesional.',
      'author' => 'Dewi Lestari',
      'role' => 'Pemilik Brand Lokal',
      'avatar' => $fallbackAvatars[1],
    ],
    [
      'id' => 3,
      'quote' => 'Pelayanan cepat dan hasil lanyardnya rapi. Warna sesuai desain, bahan nyaman dipakai, dan timnya responsif sampai barang diterima.',
      'author' => 'Andi Pratama',
      'role' => 'Event Organizer',
      'avatar' => $fallbackAvatars[2],
    ],
  ];

  $publishedRows = \Illuminate\Support\Facades\Schema::hasTable('testimonial')
    ? \App\Support\HomePageCache::remember(
        'home_testimonials',
        fn () => \App\Models\Testimonial::query()
          ->where('published', true)
          ->orderBy('sortOrder')
          ->orderByDesc('createdAt')
          ->take(3)
          ->get(),
      )
    : collect();

  $resolvedTestimonials = $publishedRows->isNotEmpty()
    ? $publishedRows->values()->map(function ($testimonial, $index) use ($fallbackTestimonials, $fallbackAvatars): array {
        $fallback = $fallbackTestimonials[$index % count($fallbackTestimonials)];
        return [
          'id' => $testimonial->id,
          'quote' => trim(preg_replace('/\s+/', ' ', strip_tags((string) $testimonial->quote))) ?: $fallback['quote'],
          'author' => $testimonial->name ?: $fallback['author'],
          'role' => $testimonial->role ?: $fallback['role'],
          'avatar' => \App\Support\AssetUrl::relative($testimonial->imageUrl) ?: $fallbackAvatars[$index % count($fallbackAvatars)],
        ];
      })->all()
    : $fallbackTestimonials;
@endphp

<section
  class="unique-testimonial"
  data-unique-testimonial='@json($resolvedTestimonials)'
  aria-label="Testimoni pelanggan Lanyard Palembang"
>
  <div class="unique-testimonial__inner">
    <div class="unique-testimonial__quote-area">
      <span class="unique-testimonial__quote-mark unique-testimonial__quote-mark--left" aria-hidden="true">"</span>
      <span class="unique-testimonial__quote-mark unique-testimonial__quote-mark--right" aria-hidden="true">"</span>

      <blockquote class="unique-testimonial__quote unique-testimonial__quote--visible">
        <span data-unique-testimonial-quote>{{ $resolvedTestimonials[0]['quote'] ?? '' }}</span>
      </blockquote>

      <p class="unique-testimonial__role unique-testimonial__role--visible" data-unique-testimonial-role>{{ $resolvedTestimonials[0]['role'] ?? '' }}</p>
    </div>

    <div class="unique-testimonial__avatars">
      @foreach ($resolvedTestimonials as $index => $testimonial)
        @php($author = $testimonial['author'] ?? 'Testimonial')
        <button
          type="button"
          class="unique-testimonial__avatar-btn"
          data-unique-testimonial-index="{{ $index }}"
          aria-pressed="{{ $index === 0 ? 'true' : 'false' }}"
          aria-label="Lihat testimoni dari {{ $author }}"
        >
          <img
            src="{{ $testimonial['avatar'] ?? '' }}"
            alt="{{ $author }}"
            class="unique-testimonial__avatar-img"
          >
          <span class="unique-testimonial__avatar-name">{{ $author }}</span>
        </button>
      @endforeach
    </div>
  </div>
</section>
