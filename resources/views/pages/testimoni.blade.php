@extends('layouts.public')

@section('title', 'Testimoni Pelanggan Lanyard Medan | Pengalaman & Kepuasan')
@section('meta_description', 'Cerita dan pengalaman langsung pelanggan mengenai hasil cetak lanyard custom, kecepatan produksi, dan kualitas pelayanan Lanyard Medan.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/testimoni')
@section('seo_og_image', '/uploads/hero-lanyard-medan.webp')

@push('schema')
  @include('components.schema.testimoni')
@endpush

@section('content')
@php
  $column1 = [
    [
      'quote' => 'Lanyard untuk event 500 pcs selesai tepat waktu. Cetakan sublimasi tajam dan warnanya persis dengan mockup desain kami. Timnya sangat responsif!',
      'name' => 'Rizky Pratama',
      'role' => 'Event Organizer, Medan',
      'avatar' => '/images/testimonials/rizky-pratama.webp',
      'rating' => 5,
    ],
    [
      'quote' => 'Pesan tali lanyard custom untuk MOS dan seragam guru. Bahannya lembut, nyaman dipakai seharian oleh siswa, dan tidak mudah berbulu.',
      'name' => 'Anggi Putri',
      'role' => 'Admin Sekolah, Medan',
      'avatar' => '/uploads/testimoni-anggi-putri.webp',
      'rating' => 5,
    ],
    [
      'quote' => 'Kualitas cetak selalu konsisten dan harga sangat kompetitif untuk pesanan kantor kami. Sangat terbantu dengan proses pembuatan yang transparan.',
      'name' => 'Dimas Nugroho',
      'role' => 'Owner UMKM, Sumatera Utara',
      'avatar' => '/uploads/testimoni-dimas-nugroho.webp',
      'rating' => 5,
    ],
  ];

  $column2 = [
    [
      'quote' => 'Kami butuh lanyard yang selaras dengan identitas brand. Detail warna gradasi dan logo presisi sekali. Hasil jadinya sangat premium dan profesional.',
      'name' => 'Dewi Lestari',
      'role' => 'Pemilik Brand Lokal',
      'avatar' => '/images/testimonials/dewi-lestari.webp',
      'rating' => 5,
    ],
    [
      'quote' => 'Pelayanan cepat dan ramah dari awal konsultasi ukuran sampai barang tiba. Stopper dan kait kokoh, sangat recommended untuk vendor lanyard.',
      'name' => 'Andi Pratama',
      'role' => 'Koordinator Komunitas',
      'avatar' => '/uploads/testimoni-andi-pratama.webp',
      'rating' => 5,
    ],
    [
      'quote' => 'Proses pengerjaan kilat 2 hari sangat menyelamatkan kebutuhan seminar nasional kami. Kemasan rapi per satuan, tinggal dibagikan ke peserta.',
      'name' => 'Wahyu Santoso',
      'role' => 'Panitia Seminar Nasional',
      'avatar' => '/uploads/testimoni-wahyu-santoso.webp',
      'rating' => 5,
    ],
  ];

  $column3 = [
    [
      'quote' => 'Pesan 1.200 pcs untuk kebutuhan karyawan kantor cabang. Kualitas bahan tissue 2 cm sangat halus dan awet dicuci berulang kali tanpa pudar.',
      'name' => 'Septiana Andini',
      'role' => 'HRD Perusahaan Swasta',
      'avatar' => '/images/testimonials/septiana-andini.webp',
      'rating' => 5,
    ],
    [
      'quote' => 'Hasil cetak full color bolak-balik sangat presisi. Desain bebas tanpa batasan warna dan gratis biaya layout mockup sebelum naik cetak.',
      'name' => 'Budi Kurniawan',
      'role' => 'Ketua BEM Universitas',
      'avatar' => '/uploads/testimoni-lanyard.webp',
      'rating' => 5,
    ],
    [
      'quote' => 'Administrasi faktur dan invoice pengadaan instansi kami dilayani dengan sangat tertib. Barang sampai tepat jadwal dengan packaging aman.',
      'name' => 'Siti Rahmawati',
      'role' => 'Procurement Officer BUMN',
      'avatar' => '/uploads/testimonial-lanyard-anggi.webp',
      'rating' => 5,
    ],
  ];
@endphp

<div class="testimonials-wall-page">
  {{-- Hero Section --}}
  <section class="testimonials-hero" aria-labelledby="testimonials-title">
    <div class="home-shell home-shell--wide">
      <div class="testimonials-hero__header">
        <div class="testimonials-hero__eyebrow-wrap">
          <span class="testimonials-hero__sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/></svg>
          </span>
          <span class="testimonials-hero__eyebrow">ULASAN &amp; KEPUASAN PELANGGAN</span>
        </div>

        <h1 id="testimonials-title" class="testimonials-hero__title">
          Apa Kata Mereka Tentang <span class="testimonials-hero__title-accent">Lanyard Medan?</span>
        </h1>

        <p class="testimonials-hero__desc">
          Kepercayaan lebih dari 9.000+ pelanggan perusahaan, kampus, instansi, dan event organizer di seluruh Indonesia adalah motivasi kami untuk terus menjaga kualitas cetak dan kecepatan pelayanan.
        </p>

        <div class="testimonials-hero__rating-badge">
          <div class="testimonials-hero__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          <span><strong>5.0 / 5.0</strong> dari 9.000+ Pesanan Sukses</span>
        </div>
      </div>
    </div>
  </section>

  {{-- Vertical Marquee Wall --}}
  <div class="home-shell home-shell--wide">
    <div class="testimonials-wall" aria-label="Daftar testimoni kepuasan pelanggan">
      {{-- Kolom 1 (Durasi ~28s) --}}
      <div class="testimonials-col testimonials-col--1">
        <div class="testimonials-col__track">
          @foreach($column1 as $item)
            <article class="testi-card">
              <div class="testi-card__stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
              <blockquote class="testi-card__quote">
                <p>{{ $item['quote'] }}</p>
              </blockquote>
              <footer class="testi-card__footer">
                <img src="{{ $item['avatar'] }}" alt="Foto {{ $item['name'] }}" class="testi-card__avatar" width="44" height="44" loading="lazy" decoding="async">
                <div class="testi-card__info">
                  <strong class="testi-card__name">{{ $item['name'] }}</strong>
                  <span class="testi-card__role">{{ $item['role'] }}</span>
                </div>
              </footer>
            </article>
          @endforeach

          {{-- Duplikasi untuk Seamless Infinite Loop --}}
          @foreach($column1 as $item)
            <article class="testi-card" aria-hidden="true">
              <div class="testi-card__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
              <blockquote class="testi-card__quote">
                <p>{{ $item['quote'] }}</p>
              </blockquote>
              <footer class="testi-card__footer">
                <img src="{{ $item['avatar'] }}" alt="" class="testi-card__avatar" width="44" height="44" loading="lazy" decoding="async">
                <div class="testi-card__info">
                  <strong class="testi-card__name">{{ $item['name'] }}</strong>
                  <span class="testi-card__role">{{ $item['role'] }}</span>
                </div>
              </footer>
            </article>
          @endforeach
        </div>
      </div>

      {{-- Kolom 2 (Durasi ~34s) --}}
      <div class="testimonials-col testimonials-col--2">
        <div class="testimonials-col__track">
          @foreach($column2 as $item)
            <article class="testi-card">
              <div class="testi-card__stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
              <blockquote class="testi-card__quote">
                <p>{{ $item['quote'] }}</p>
              </blockquote>
              <footer class="testi-card__footer">
                <img src="{{ $item['avatar'] }}" alt="Foto {{ $item['name'] }}" class="testi-card__avatar" width="44" height="44" loading="lazy" decoding="async">
                <div class="testi-card__info">
                  <strong class="testi-card__name">{{ $item['name'] }}</strong>
                  <span class="testi-card__role">{{ $item['role'] }}</span>
                </div>
              </footer>
            </article>
          @endforeach

          {{-- Duplikasi untuk Seamless Infinite Loop --}}
          @foreach($column2 as $item)
            <article class="testi-card" aria-hidden="true">
              <div class="testi-card__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
              <blockquote class="testi-card__quote">
                <p>{{ $item['quote'] }}</p>
              </blockquote>
              <footer class="testi-card__footer">
                <img src="{{ $item['avatar'] }}" alt="" class="testi-card__avatar" width="44" height="44" loading="lazy" decoding="async">
                <div class="testi-card__info">
                  <strong class="testi-card__name">{{ $item['name'] }}</strong>
                  <span class="testi-card__role">{{ $item['role'] }}</span>
                </div>
              </footer>
            </article>
          @endforeach
        </div>
      </div>

      {{-- Kolom 3 (Durasi ~30s) --}}
      <div class="testimonials-col testimonials-col--3">
        <div class="testimonials-col__track">
          @foreach($column3 as $item)
            <article class="testi-card">
              <div class="testi-card__stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
              <blockquote class="testi-card__quote">
                <p>{{ $item['quote'] }}</p>
              </blockquote>
              <footer class="testi-card__footer">
                <img src="{{ $item['avatar'] }}" alt="Foto {{ $item['name'] }}" class="testi-card__avatar" width="44" height="44" loading="lazy" decoding="async">
                <div class="testi-card__info">
                  <strong class="testi-card__name">{{ $item['name'] }}</strong>
                  <span class="testi-card__role">{{ $item['role'] }}</span>
                </div>
              </footer>
            </article>
          @endforeach

          {{-- Duplikasi untuk Seamless Infinite Loop --}}
          @foreach($column3 as $item)
            <article class="testi-card" aria-hidden="true">
              <div class="testi-card__stars">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
              <blockquote class="testi-card__quote">
                <p>{{ $item['quote'] }}</p>
              </blockquote>
              <footer class="testi-card__footer">
                <img src="{{ $item['avatar'] }}" alt="" class="testi-card__avatar" width="44" height="44" loading="lazy" decoding="async">
                <div class="testi-card__info">
                  <strong class="testi-card__name">{{ $item['name'] }}</strong>
                  <span class="testi-card__role">{{ $item['role'] }}</span>
                </div>
              </footer>
            </article>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>

@include('components.footer')
@endsection
