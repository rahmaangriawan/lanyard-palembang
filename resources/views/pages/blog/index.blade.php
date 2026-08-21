@extends('layouts.public')

@php
  $page = $posts->currentPage();
  $total = $posts->total();
  $latestPost = $posts->first();
  $defaultDescription = 'Kumpulan artikel, tips desain, panduan bahan tissue vs polyester, dan wawasan cetak tali lanyard custom dari workshop Lanyard Medan.';
  $ogImage = $latestPost?->featuredImage ?: '/uploads/lanyard-medan-logo.webp';
  $archiveCssPath = public_path('css/blog-archive.css');
  $archiveCssVersion = file_exists($archiveCssPath) ? filemtime($archiveCssPath) : 1;
@endphp

@section('title', 'Blog & Wawasan Tali Lanyard Custom | Lanyard Medan')
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
          <span>BLOG &amp; WAWASAN LANYARD</span>
        </div>

        <h1 id="blog-page-title">
          Panduan Praktis &amp; Wawasan <span class="blog-title-accent">Lanyard Custom.</span>
        </h1>

        <p>
          Pelajari perbandingan bahan, tips layout desain logo, rekomendasi aksesoris, dan alur produksi sebelum Anda memesan tali lanyard kantor atau event.
        </p>
      </div>

      {{-- Search Panel --}}
      <div class="blog-archive-search-panel">
        <form class="blog-archive-search" role="search" method="GET" action="{{ route('blog.index') }}">
          <label for="blog-search-input">Cari dari {{ $total }} artikel terbit</label>
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
          <p class="blog-archive-search__hint">Wawasan selalu diperbarui oleh tim produksi &amp; desainer Lanyard Medan.</p>
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
            {{ $search !== '' ? 'Hasil Pencarian Artikel' : 'Artikel & Wawasan Terbaru' }}
          </h2>
          <p>
            {{ $search !== '' ? 'Kumpulan panduan yang sesuai dengan kata kunci pencarian Anda.' : 'Panduan informatif seputar material, desain grafis, dan teknik cetak tali lanyard.' }}
          </p>
        </div>
        <span class="blog-archive-heading__count">{{ $total }} Artikel</span>
      </header>

      <x-blog.archive-list
        :posts="$posts"
        empty-title="Artikel tidak ditemukan"
        empty-text="Coba gunakan kata kunci yang lebih umum atau kembali ke seluruh daftar arsip blog."
      />
    </div>
  </section>

  {{-- 3. CLOSING CTA --}}
  <x-blog.archive-cta />
</div>

@include('components.footer')
@endsection
