@props(['portfolios' => collect()])
@php
  $siteUrl = rtrim((string) config('app.url', url('/')), '/');
  if ($siteUrl === '' || str_contains($siteUrl, 'localhost') || str_contains($siteUrl, '127.0.0.1')) {
    $siteUrl = 'https://lanyardpalembang.com';
  }
  $canonicalUrl = $siteUrl . '/portofolio';

  $pageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    '@id' => $canonicalUrl . '/#collection',
    'name' => 'Portofolio Lanyard Custom | Hasil Produksi Lanyard Palembang',
    'description' => 'Kumpulan hasil produksi tali lanyard custom untuk perusahaan, BUMN, instansi pemerintah, universitas, event, dan komunitas di Indonesia.',
    'url' => $canonicalUrl,
    'inLanguage' => 'id-ID',
    'isPartOf' => [
      '@type' => 'WebSite',
      'name' => 'Lanyard Palembang',
      'url' => $siteUrl,
    ],
  ];

  $breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
      ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => $siteUrl . '/'],
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Portofolio', 'item' => $canonicalUrl],
    ],
  ];
@endphp
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($pageSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($breadcrumbSchema) !!}</script>
