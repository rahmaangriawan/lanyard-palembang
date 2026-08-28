@extends('layouts.public')

@php
  use App\Support\AssetUrl;
  use App\Support\ResponsiveImage;

  $displayName = $author->name ?: 'Tim Lanyard Palembang';
  $bioText = $author->bio;
  $avatar = AssetUrl::relative($author->avatar);
  $avatarSrcset = ResponsiveImage::srcset($avatar);
  $articleCount = $posts->total();
  $archiveCssPath = public_path('css/blog-archive.css');
  $archiveCssVersion = file_exists($archiveCssPath) ? filemtime($archiveCssPath) : 1;
@endphp

@section('title', $displayName.' | Penulis Lanyard Palembang')
@section('meta_description', 'Lihat kumpulan catatan teknis dan panduan yang ditulis oleh '.$displayName.' di workshop Lanyard Palembang seputar material, desain, dan teknik cetak tali lanyard custom.')
@section('seo_canonical', route('blog.author', ['slug' => $authorSlug]))
@section('seo_og_image', $author->avatar ?: '/uploads/lanyard-palembang-logo.webp')
@if($posts->currentPage() > 1)
  @section('seo_noindex', '1')
@endif

@push('head')
  <link rel="stylesheet" href="/css/blog-archive.css?v={{ $archiveCssVersion }}">
@endpush
@push('schema')
  @include('components.schema.author')
@endpush

@section('content')
<div class="blog-archive-page blog-author-page">
  {{-- 1. AUTHOR HERO 2-COLUMN SECTION --}}
  <section class="blog-author-hero" aria-labelledby="author-page-title">
    <div class="blog-archive-shell blog-author-hero__layout">
      <div class="blog-author-hero__copy">
        <nav class="blog-archive-breadcrumb" aria-label="Breadcrumb">
          <a href="{{ route('home') }}">Beranda</a>
          <span aria-hidden="true">/</span>
          <a href="{{ route('blog.index') }}">Blog</a>
          <span aria-hidden="true">/</span>
          <span aria-current="page">{{ $displayName }}</span>
        </nav>

        <div class="blog-archive-eyebrow">
          <span class="blog-archive-sparkle" aria-hidden="true">
            <svg viewBox="0 0 24 24" fill="currentColor">
              <path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/>
            </svg>
          </span>
          <span>KONTRIBUTOR &amp; PENULIS WORKSHOP</span>
        </div>

        <h1 id="author-page-title">{{ $displayName }}</h1>
        
        @if($bioText)
          <p class="blog-author-hero__bio">{{ $bioText }}</p>
        @else
          <p class="blog-author-hero__bio">
            Spesialis produksi dan materi edukasi seputar teknologi cetak tali lanyard custom, bahan sublimasi digital, dan perlengkapan event di Lanyard Palembang.
          </p>
        @endif

        <div class="blog-author-hero__actions">
          <div class="blog-author-hero__count">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
              <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
              <polyline points="14 2 14 8 20 8"/>
            </svg>
            <span><strong>{{ $articleCount }}</strong> Catatan Terbit</span>
          </div>

          <a class="blog-archive-back-link" href="{{ route('blog.index') }}">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
              <line x1="19" y1="12" x2="5" y2="12"/>
              <polyline points="12 19 5 12 12 5"/>
            </svg>
            <span>Semua Catatan</span>
          </a>
        </div>
      </div>

      <div class="blog-author-portrait-wrap">
        <div class="blog-author-portrait" aria-label="Foto profil {{ $displayName }}">
          @if($avatar)
            <img
              src="{{ $avatar }}"
              @if($avatarSrcset) srcset="{{ $avatarSrcset }}" sizes="(min-width: 768px) 240px, 180px" @endif
              alt="{{ $displayName }}, penulis Lanyard Palembang"
              width="560"
              height="560"
              loading="eager"
              decoding="async"
            >
          @else
            <span class="blog-author-portrait__initial" aria-hidden="true">
              {{ strtoupper(mb_substr($displayName, 0, 1)) }}
            </span>
          @endif
        </div>
        <div class="blog-author-badge">
          <span class="blog-author-badge__dot" aria-hidden="true"></span>
          <span>Penulis Terverifikasi</span>
        </div>
      </div>
    </div>
  </section>

  {{-- 2. LISTING ARTIKEL SECTION (BACKGROUND PUTIH) --}}
  <section class="blog-archive-section" aria-labelledby="author-listing-title">
    <div class="blog-archive-shell">
      <header class="blog-archive-heading">
        <div>
          <h2 id="author-listing-title">Catatan Ditulis oleh {{ $displayName }}</h2>
          <p>Kumpulan panduan praktis dan wawasan material yang disusun langsung oleh penulis ini.</p>
        </div>
        <span class="blog-archive-heading__count">{{ $articleCount }} Catatan</span>
      </header>

      <x-blog.archive-list
        :posts="$posts"
        empty-title="Belum ada catatan"
        empty-text="Penulis ini belum menerbitkan catatan. Jelajahi arsip blog untuk menemukan wawasan lainnya."
      />
    </div>
  </section>

  {{-- 3. CLOSING CTA --}}
  <x-blog.archive-cta />
</div>

@include('components.footer')
@endsection
