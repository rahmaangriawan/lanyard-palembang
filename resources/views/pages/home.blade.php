@extends('layouts.public')

@php
    $homeSeoSettings = \App\Support\HomePageCache::remember('home_seo_settings', function () {
        return \App\Models\Setting::whereIn('key', ['seo_meta_title', 'seo_meta_description'])->pluck('value', 'key')->toArray();
    });
    $homeTitle = $homeSeoSettings['seo_meta_title'] ?? 'Print Lanyard Medan Murah Free Ongkir';
    $homeDesc = $homeSeoSettings['seo_meta_description'] ?? 'Dapatkan lanyard custom berkualitas untuk kantor atau event Anda hanya di Lanyard Medan Medan.';
@endphp
@section('title', $homeTitle)
@section('meta_description', $homeDesc)
@section('seo_canonical', rtrim(config('app.url', url('/')), '/') . '/')
@section('seo_og_image', '/uploads/lanyard-medan-logo.webp')

@push('head')
@php
    $homeCssPath = public_path('build/public/home.min.css');
    $homeCssVersion = file_exists($homeCssPath) ? filemtime($homeCssPath) : 1;
    $homeJsPath = public_path('build/public/home.min.js');
    $homeJsVersion = file_exists($homeJsPath) ? filemtime($homeJsPath) : 1;
@endphp
<link rel="stylesheet" href="/build/public/home.min.css?v={{ $homeCssVersion }}">
@endpush

@push('schema')
@include('components.schema.home')
@endpush

@section('content')
  <div class="homepage-content">
    @include('components.hero')
    @include('components.home-advantages')
    @include('components.home-why-us')
    @include('components.home-product-fan')
    @include('components.home-quotation-calculator')
    @include('components.testimonials')
    @include('components.blog-preview')
    @include('components.cta')
  </div>
  @include('components.footer')
@endsection

@section('scripts')
  <script src="/build/public/home.min.js?v={{ $homeJsVersion }}" defer></script>
@endsection
