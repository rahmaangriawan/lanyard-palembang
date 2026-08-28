@extends('layouts.public')

@php
  $description = 'Kumpulan artikel dan panduan seputar '.strtolower($category->name).' dari Lanyard Palembang untuk membantu Anda memahami spesifikasi dan proses produksi lanyard custom.';
  $ogImage = $posts->first()?->featuredImage ?: '/uploads/lanyard-palembang-logo.webp';
  $archiveCssPath = public_path('css/blog-archive.css');
  $archiveCssVersion = file_exists($archiveCssPath) ? filemtime($archiveCssPath) : 1;
@endphp

@section('title', 'Kategori: '.$category->name.' | Blog Lanyard Palembang')
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
    :name="'Kategori '.$category->name.' | Blog Lanyard Palembang'"
    :description="$description"
    :canonical-path="'/kategori/'.$category->slug"
    :breadcrumb-name="$category->name"
    :posts="$posts"
  />
@endpush

@section('content')
<div class="blog-archive-page blog-category-page">
  {{-- 1. EDITORIAL HERO --}}
  <section class="blog-category-hero" aria-labelledby="category-page-title">
    <div class="blog-archive-shell blog-category-hero__shell">
      <nav class="blog-archive-breadcrumb blog-category-hero__breadcrumb" aria-label="Breadcrumb">
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
        <span>TOPIK &amp; KATEGORI KHUSUS</span>
      </div>

      <h1 id="category-page-title">
        Arsip &amp; Panduan Seputar <span class="blog-category-hero__title-accent">{{ $category->name }}</span>
      </h1>

      <p class="blog-category-hero__lead">
        Kumpulan catatan teknis, perbandingan material, dan tips persiapan desain yang khusus membahas topik {{ strtolower($category->name) }} dari workshop Lanyard Palembang.
      </p>

      <div class="blog-category-hero__meta">
        <span class="blog-category-hero__chip">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="14" height="14" aria-hidden="true">
            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
            <polyline points="14 2 14 8 20 8"/>
            <line x1="16" y1="13" x2="8" y2="13"/>
            <line x1="16" y1="17" x2="8" y2="17"/>
          </svg>
          <span>{{ $posts->total() }} catatan teknis</span>
        </span>
        <a class="blog-archive-back-link" href="{{ route('blog.index') }}">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
            <line x1="19" y1="12" x2="5" y2="12"/>
            <polyline points="12 19 5 12 12 5"/>
          </svg>
          <span>Semua Kategori</span>
        </a>
      </div>
    </div>
  </section>

  {{-- 2. LISTING ARTIKEL --}}
  <section class="blog-archive-section" aria-labelledby="category-listing-title">
    <div class="blog-archive-shell">
      <header class="blog-archive-heading">
        <div>
          <h2 id="category-listing-title">Daftar Catatan &amp; Wawasan</h2>
          <p>Disusun dari catatan terbaru agar mudah dipelajari secara terstruktur.</p>
        </div>
        <span class="blog-archive-heading__count">{{ $posts->total() }} Catatan</span>
      </header>

      <x-blog.archive-list
        :posts="$posts"
        empty-title="Belum ada catatan"
        empty-text="Belum ada catatan yang diterbitkan dalam kategori ini."
      />
    </div>
  </section>

  {{-- 3. CLOSING CTA --}}
  <x-blog.archive-cta />
</div>

@include('components.footer')
@endsection
