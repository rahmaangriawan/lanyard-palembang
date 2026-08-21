@extends('layouts.public')

@php
  $description = 'Kumpulan artikel dan panduan seputar '.strtolower($category->name).' dari Lanyard Medan untuk membantu Anda memahami spesifikasi dan proses produksi lanyard custom.';
  $ogImage = $posts->first()?->featuredImage ?: '/uploads/lanyard-medan-logo.webp';
  $archiveCssPath = public_path('css/blog-archive.css');
  $archiveCssVersion = file_exists($archiveCssPath) ? filemtime($archiveCssPath) : 1;
@endphp

@section('title', 'Kategori: '.$category->name.' | Blog Lanyard Medan')
@section('meta_description', $description)
@section('seo_canonical', route('blog.category', ['slug' => $category->slug]))
@section('seo_type', 'website')
@section('seo_og_image', $ogImage)
@if($posts->currentPage() > 1)
  @section('seo_noindex', '1')
@endif

@push('head')
  <link rel="stylesheet" href="/css/blog-archive.css?v={{ $archiveCssVersion }}">
@endpush
@push('schema')
  <x-schema.blog-archive
    :name="'Kategori '.$category->name.' | Blog Lanyard Medan'"
    :description="$description"
    :canonical-path="'/kategori/'.$category->slug"
    :breadcrumb-name="$category->name"
    :posts="$posts"
  />
@endpush

@section('content')
<div class="blog-archive-page">
  {{-- 1. COMPACT HERO SECTION --}}
  <section class="blog-archive-hero blog-archive-hero--compact" aria-labelledby="category-page-title">
    <div class="blog-archive-shell" style="text-align: center;">
      <nav class="blog-archive-breadcrumb" aria-label="Breadcrumb" style="justify-content: center;">
        <a href="{{ route('home') }}">Beranda</a>
        <span aria-hidden="true">/</span>
        <a href="{{ route('blog.index') }}">Blog</a>
        <span aria-hidden="true">/</span>
        <span aria-current="page">{{ $category->name }}</span>
      </nav>

      <div class="blog-archive-eyebrow">
        <span class="blog-archive-sparkle" aria-hidden="true">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/>
          </svg>
        </span>
        <span>KATEGORI ARTIKEL</span>
      </div>

      <h1 id="category-page-title" style="margin-inline: auto;">{{ $category->name }}</h1>
      <p style="margin-inline: auto; max-width: 620px;">
        Kumpulan panduan, tips desain grafis, dan wawasan teknis yang membahas topik seputar {{ strtolower($category->name) }}.
      </p>

      <div style="margin-top: 24px;">
        <a class="blog-archive-back-link" href="{{ route('blog.index') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
            <line x1="19" y1="12" x2="5" y2="12"/>
            <polyline points="12 19 5 12 12 5"/>
          </svg>
          <span>Kembali ke Semua Artikel</span>
        </a>
      </div>
    </div>
  </section>

  {{-- 2. LISTING ARTIKEL SECTION --}}
  <section class="blog-archive-section" aria-labelledby="category-listing-title">
    <div class="blog-archive-shell">
      <header class="blog-archive-heading">
        <div>
          <h2 id="category-listing-title">Artikel dalam Kategori Ini</h2>
          <p>Disusun dari artikel terbaru agar mudah dipelajari.</p>
        </div>
        <span class="blog-archive-heading__count">{{ $posts->total() }} Artikel</span>
      </header>

      <x-blog.archive-list
        :posts="$posts"
        empty-title="Belum ada artikel"
        empty-text="Belum ada artikel yang diterbitkan dalam kategori ini."
      />
    </div>
  </section>

  {{-- 3. CLOSING CTA --}}
  <x-blog.archive-cta />
</div>

@include('components.footer')
@endsection
