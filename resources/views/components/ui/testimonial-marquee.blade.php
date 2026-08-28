@props([
  'reviews' => null,
  'title' => 'Dipercaya untuk Berbagai Kebutuhan.',
  'eyebrow' => 'APA KATA MEREKA',
  'description' => 'Dari kebutuhan perusahaan, kepanitiaan event, hingga instansi, kami membantu mewujudkan lanyard custom yang presisi dan berkualitas.',
])

@php
  use App\Support\AssetUrl;

  $defaultReviews = [
    [
      'name' => 'Andi Pratama',
      'username' => 'Event Organizer',
      'body' => 'Pesanan lanyard 500 pcs untuk event kami hasilnya sangat rapi dan presisi. Proses konsultasi cepat dan mockup gratisnya sangat membantu.',
      'profile' => '/images/testimonials/rizky-pratama.webp',
    ],
    [
      'name' => 'Rina Putri',
      'username' => 'Marketing Officer',
      'body' => 'Hasil cetak sublimasi bolak-balik sangat tajam dan warnanya persis sesuai guideline brand kami. Selesai tepat waktu!',
      'profile' => '/images/testimonials/dewi-lestari.webp',
    ],
    [
      'name' => 'Dimas Saputra',
      'username' => 'Kepanitiaan Kampus',
      'body' => 'Pesan untuk kebutuhan seminar kampus. Kualitas bahan tissue 2 cm lembut di leher, nyaman dipakai seharian oleh peserta.',
      'profile' => '/uploads/testimoni-andi-pratama.webp',
    ],
    [
      'name' => 'Fajar Ramadhan',
      'username' => 'HRD Perusahaan Swasta',
      'body' => 'Lanyard custom untuk seragam kantor cabang kami terlihat sangat eksklusif. Stopper dan kait logamnya kokoh dan tahan lama.',
      'profile' => '/uploads/testimoni-dimas-nugroho.webp',
    ],
    [
      'name' => 'Dewi Lestari',
      'username' => 'Brand Owner',
      'body' => 'Pelayanan ramah dan responsif dari awal penentuan lebar tali sampai paket tiba. Packaging per ikat rapi dan aman.',
      'profile' => '/uploads/testimoni-anggi-putri.webp',
    ],
    [
      'name' => 'Septiana Andini',
      'username' => 'Procurement Staff BUMN',
      'body' => 'Proses invoice dan administrasi pengadaan instansi dilayani dengan sangat tertib. Pengerjaan kilat 2 hari terselesaikan tanpa kendala.',
      'profile' => '/images/testimonials/septiana-andini.webp',
    ],
    [
      'name' => 'Wahyu Santoso',
      'username' => 'Panitia Acara Nasional',
      'body' => 'Sangat puas dengan ketajaman warna logo dan presisi pemotongan tali. Rekomendasi vendor percetakan lanyard terbaik di Palembang.',
      'profile' => '/uploads/testimoni-wahyu-santoso.webp',
    ],
    [
      'name' => 'Siti Rahmawati',
      'username' => 'Pengurus Organisasi',
      'body' => 'Bahan lembut tidak bikin gatal di leher. Desain full color bebas tanpa batasan warna. Pasti akan order lagi untuk kegiatan berikutnya.',
      'profile' => '/uploads/testimoni-lanyard.webp',
    ],
  ];

  $items = [];
  if ($reviews instanceof \Illuminate\Support\Collection && $reviews->isNotEmpty()) {
    $items = $reviews->map(function ($item) {
      return [
        'name' => $item->name ?? 'Pelanggan',
        'username' => $item->role ?? 'Klien Terverifikasi',
        'body' => trim(preg_replace('/\s+/', ' ', strip_tags((string) ($item->quote ?? '')))),
        'profile' => AssetUrl::relative($item->imageUrl ?? null) ?: '/images/testimonials/rizky-pratama.webp',
      ];
    })->all();
  } elseif (is_array($reviews) && !empty($reviews)) {
    $items = $reviews;
  } else {
    $items = $defaultReviews;
  }

  // Gandakan data agar jumlah item mencukupi lebar viewport (minimal 8 item per row)
  while (count($items) < 12) {
    $items = array_merge($items, $items);
  }

  $total = count($items);
  $half = (int) ceil($total / 2);
  $firstRow = array_slice($items, 0, $half);
  $secondRow = array_slice($items, $half);
@endphp

<section class="testimonial-marquee-section" aria-label="Ulasan kepuasan pelanggan Lanyard Palembang">
  {{-- Horizontal Marquee Wrapper dengan Edge Fade Mask --}}
  <div class="testimonial-marquee-container">
    {{-- Soft Left & Right Edge Fades --}}
    <div class="testimonial-marquee-fade testimonial-marquee-fade--left" aria-hidden="true"></div>
    <div class="testimonial-marquee-fade testimonial-marquee-fade--right" aria-hidden="true"></div>

    {{-- Row 1: Leftward Scrolling (Kiri <- Kanan) --}}
    <div class="testimonial-marquee" aria-label="Ulasan baris pertama">
      <div class="testimonial-marquee-track">
        @foreach($firstRow as $review)
          <article class="testimonial-marquee-card">
            <div class="testimonial-marquee-card__header">
              <img
                src="{{ $review['profile'] ?: '/images/testimonials/rizky-pratama.webp' }}"
                alt="Foto {{ $review['name'] }}"
                width="36"
                height="36"
                class="testimonial-marquee-card__avatar"
                loading="lazy"
                decoding="async"
              >
              <div class="testimonial-marquee-card__user">
                <h3 class="testimonial-marquee-card__name">{{ $review['name'] }}</h3>
                <span class="testimonial-marquee-card__role">{{ $review['username'] }}</span>
              </div>
            </div>
            <p class="testimonial-marquee-card__body">
              "{{ $review['body'] }}"
            </p>
          </article>
        @endforeach

        {{-- Duplikasi untuk Seamless Infinite Loop --}}
        @foreach($firstRow as $review)
          <article class="testimonial-marquee-card" aria-hidden="true">
            <div class="testimonial-marquee-card__header">
              <img
                src="{{ $review['profile'] ?: '/images/testimonials/rizky-pratama.webp' }}"
                alt=""
                width="36"
                height="36"
                class="testimonial-marquee-card__avatar"
                loading="lazy"
                decoding="async"
              >
              <div class="testimonial-marquee-card__user">
                <span class="testimonial-marquee-card__name">{{ $review['name'] }}</span>
                <span class="testimonial-marquee-card__role">{{ $review['username'] }}</span>
              </div>
            </div>
            <p class="testimonial-marquee-card__body">
              "{{ $review['body'] }}"
            </p>
          </article>
        @endforeach
      </div>
    </div>

    {{-- Row 2: Rightward Scrolling (Reverse: Kanan <- Kiri) --}}
    <div class="testimonial-marquee" aria-label="Ulasan baris kedua">
      <div class="testimonial-marquee-track testimonial-marquee-track--reverse">
        @foreach($secondRow as $review)
          <article class="testimonial-marquee-card">
            <div class="testimonial-marquee-card__header">
              <img
                src="{{ $review['profile'] ?: '/images/testimonials/dewi-lestari.webp' }}"
                alt="Foto {{ $review['name'] }}"
                width="36"
                height="36"
                class="testimonial-marquee-card__avatar"
                loading="lazy"
                decoding="async"
              >
              <div class="testimonial-marquee-card__user">
                <h3 class="testimonial-marquee-card__name">{{ $review['name'] }}</h3>
                <span class="testimonial-marquee-card__role">{{ $review['username'] }}</span>
              </div>
            </div>
            <p class="testimonial-marquee-card__body">
              "{{ $review['body'] }}"
            </p>
          </article>
        @endforeach

        {{-- Duplikasi untuk Seamless Infinite Loop --}}
        @foreach($secondRow as $review)
          <article class="testimonial-marquee-card" aria-hidden="true">
            <div class="testimonial-marquee-card__header">
              <img
                src="{{ $review['profile'] ?: '/images/testimonials/dewi-lestari.webp' }}"
                alt=""
                width="36"
                height="36"
                class="testimonial-marquee-card__avatar"
                loading="lazy"
                decoding="async"
              >
              <div class="testimonial-marquee-card__user">
                <span class="testimonial-marquee-card__name">{{ $review['name'] }}</span>
                <span class="testimonial-marquee-card__role">{{ $review['username'] }}</span>
              </div>
            </div>
            <p class="testimonial-marquee-card__body">
              "{{ $review['body'] }}"
            </p>
          </article>
        @endforeach
      </div>
    </div>
  </div>
</section>
