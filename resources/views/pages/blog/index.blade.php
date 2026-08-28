@extends('layouts.public')

@php
  $page = $posts->currentPage();
  $total = $posts->total();
  $latestPost = $posts->first();
  $defaultDescription = 'Catatan praktis dari workshop Lanyard Palembang: perbandingan bahan tissue vs polyester, cara menyiapkan file siap cetak, dan tips komunikasi dengan vendor lanyard.';
  $ogImage = $latestPost?->featuredImage ?: '/uploads/lanyard-palembang-logo.webp';
  $archiveCssPath = public_path('css/blog-archive.css');
  $archiveCssVersion = file_exists($archiveCssPath) ? filemtime($archiveCssPath) : 1;
@endphp

@section('title', 'Catatan Workshop Lanyard Palembang | Blog')
@section('meta_description', $defaultDescription)
@section('seo_canonical', route('blog.index'))
@section('seo_og_image', $ogImage)
@if($search !== '' || $page > 1)
  @section('seo_noindex', '1')
@endif

@push('head')
  <link rel="stylesheet" href="/css/blog-archive.css?v={{ $archiveCssVersion }}">
@endpush

@push('schema')
  @include('components.schema.blog-index', ['posts' => $posts])
@endpush

@section('content')
<div class="blog-archive-page">
  {{-- 1. HERO SECTION --}}
  <section class="blog-archive-hero" aria-labelledby="blog-page-title">
    <div class="blog-archive-shell blog-archive-hero__layout">
      <div class="blog-archive-hero__copy">
        <div class="blog-archive-eyebrow">
          <span class="blog-archive-sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/>
            </svg>
          </span>
          <span>CATATAN DARI WORKSHOP LANYARD PALEMBANG</span>
        </div>

        <h1 id="blog-page-title">
          Wawasan Praktis untuk <span class="blog-title-accent">Pemesan Lanyard yang Tepat.</span>
        </h1>

        <p>
          Tulisan singkat dari tim produksi & desainer kami: perbandingan bahan, cara menyiapkan file siap cetak, dan hal-hal yang sering ditanyakan calon pemesan sebelum memesan tali lanyard.
        </p>
      </div>

      {{-- Search Panel --}}
      <div class="blog-archive-search-panel">
        <form class="blog-archive-search" role="search" method="GET" action="{{ route('blog.index') }}">
          <label for="blog-search-input">Cari dari {{ $total }} catatan terbit</label>
          <div class="blog-archive-search__control">
            <span class="blog-archive-search__icon" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="11" cy="11" r="8"/>
                <line x1="21" y1="21" x2="16.65" y2="16.65"/>
              </svg>
            </span>
            <input
              id="blog-search-input"
              type="search"
              name="q"
              value="{{ $search }}"
              maxlength="255"
              placeholder="Cari bahan, aksesoris, atau tips desain..."
              autocomplete="off"
            >
            <button type="submit">
              <span>Cari</span>
            </button>
          </div>
        </form>

        @if($search !== '')
          <div class="blog-archive-search__status">
            <p>Menampilkan {{ $total }} hasil untuk “{{ $search }}”</p>
            <a href="{{ route('blog.index') }}">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14" aria-hidden="true">
                <line x1="18" y1="6" x2="6" y2="18"/>
                <line x1="6" y1="6" x2="18" y2="18"/>
              </svg>
              <span>Hapus pencarian</span>
            </a>
          </div>
        @else
          <p class="blog-archive-search__hint">Catatan baru ditulis setiap kali kami menemukan hal yang berguna untuk calon pemesan.</p>
        @endif
      </div>
    </div>
  </section>

  {{-- 2. LISTING SECTION --}}
  <section class="blog-archive-section" aria-labelledby="blog-listing-title">
    <div class="blog-archive-shell">
      <header class="blog-archive-heading">
        <div>
          <h2 id="blog-listing-title">
            {{ $search !== '' ? 'Hasil Pencarian Catatan' : 'Catatan &amp; Wawasan Terbaru' }}
          </h2>
          <p>
            {{ $search !== '' ? 'Kumpulan catatan yang sesuai dengan kata kunci pencarian Anda.' : 'Pengalaman nyata tim produksi & desainer saat menangani pesanan lanyard setiap pekannya.' }}
          </p>
        </div>
        <span class="blog-archive-heading__count">{{ $total }} Catatan</span>
      </header>

      <x-blog.archive-list
        :posts="$posts"
        empty-title="Catatan tidak ditemukan"
        empty-text="Coba gunakan kata kunci yang lebih umum atau kembali ke seluruh daftar arsip."
      />
    </div>
  </section>

  {{-- 3. CLOSING CTA --}}
  <x-blog.archive-cta />
</div>

@include('components.footer')
@endsection
