@extends('layouts.public')

@section('title', 'Testimoni Pelanggan Lanyard Palembang | Pengalaman & Kepuasan')
@section('meta_description', 'Cerita dan pengalaman langsung pelanggan mengenai hasil cetak lanyard custom, kecepatan produksi, dan kualitas pelayanan Lanyard Palembang.')
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/testimoni')
@section('seo_og_image', '/uploads/hero-lanyard-palembang-gold.webp')

@push('head')
  <link rel="stylesheet" href="/css/testimonials-page.css?v={{ file_exists(public_path('css/testimonials-page.css')) ? filemtime(public_path('css/testimonials-page.css')) : 1 }}">
  <link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ file_exists(public_path('css/home-cta-editorial.css')) ? filemtime(public_path('css/home-cta-editorial.css')) : 1 }}">
@endpush

@push('schema')
  @include('components.schema.testimoni')
@endpush

@section('content')
<div class="testimonials-wall-page">
  {{-- 1. HERO SECTION --}}
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
          Apa Kata Mereka Tentang <span class="testimonials-hero__title-accent">Lanyard Palembang?</span>
        </h1>

        <p class="testimonials-hero__desc">
          Kepercayaan lebih dari 9.000+ pesanan lanyard custom dari perusahaan, BUMN, kampus, instansi, dan event organizer adalah bukti komitmen kami dalam menjaga ketajaman cetak dan pengerjaan tepat waktu.
        </p>

        <div class="testimonials-hero__rating-badge">
          <div class="testimonials-hero__stars" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
          <span><strong>5.0 / 5.0</strong> dari 9.000+ Pesanan Sukses</span>
        </div>
      </div>
    </div>
  </section>

  {{-- 2. REUSABLE BLADE TESTIMONIAL MARQUEE (PURE CSS) --}}
  <x-ui.testimonial-marquee :reviews="$testimonials" />

  {{-- 3. CLOSING CTA SECTION --}}
  @include('components.home-cta-editorial')
</div>

@include('components.footer')
@endsection
