@extends('layouts.public')

@php
    $homeSeoSettings = \App\Support\HomePageCache::remember('home_seo_settings', function () {
        return \App\Models\Setting::whereIn('key', ['seo_meta_title', 'seo_meta_description'])->pluck('value', 'key')->toArray();
    });
    $homeTitle = $homeSeoSettings['seo_meta_title'] ?? 'Print Lanyard Palembang Murah Free Ongkir';
    $homeDesc = $homeSeoSettings['seo_meta_description'] ?? 'Dapatkan lanyard custom berkualitas untuk kantor atau event Anda hanya di Lanyard Palembang.';
    $homeCssPath = public_path('build/public/home.min.css');
    $homeCssVersion = file_exists($homeCssPath) ? filemtime($homeCssPath) : 1;
    $homeJsPath = public_path('build/public/home.min.js');
    $homeJsVersion = file_exists($homeJsPath) ? filemtime($homeJsPath) : 1;
    $blogEditorialPath = public_path('css/home-blog-editorial.css');
    $blogEditorialVersion = file_exists($blogEditorialPath) ? filemtime($blogEditorialPath) : 1;
    $ctaEditorialPath = public_path('css/home-cta-editorial.css');
    $ctaEditorialVersion = file_exists($ctaEditorialPath) ? filemtime($ctaEditorialPath) : 1;
@endphp
@section('title', $homeTitle)
@section('meta_description', $homeDesc)
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/')
@section('seo_og_image', '/uploads/lanyard-palembang-logo.webp')

@push('head')
<link rel="stylesheet" href="/build/public/home.min.css?v={{ $homeCssVersion }}">
<link rel="stylesheet" href="/css/home-blog-editorial.css?v={{ $blogEditorialVersion }}">
<link rel="stylesheet" href="/css/home-cta-editorial.css?v={{ $ctaEditorialVersion }}">
@endpush

@section('content')
  <div class="homepage-content">
    @include('components.hero')
    @include('components.home-advantages')
    @include('components.home-product-showcase')
    @include('components.home-quotation-calculator')
    @include('components.home-why-us')
    @include('components.home-order-process')
    @include('components.ui.unique-testimonial')
    @include('components.home-fast-checkout')
    @include('components.home-blog-editorial')
    @include('components.home-cta-editorial')
  </div>
  @include('components.footer')
@endsection

@section('scripts')
  <script src="/build/public/home.min.js?v={{ $homeJsVersion }}" defer></script>
@endsection
