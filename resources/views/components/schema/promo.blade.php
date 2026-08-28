@php
  $siteUrl = rtrim((string) config('app.url', url('/')), '/');
  if ($siteUrl === '' || str_contains($siteUrl, 'localhost') || str_contains($siteUrl, '127.0.0.1')) {
    $siteUrl = 'https://lanyardpalembang.com';
  }
  $canonicalUrl = $siteUrl . '/promo';

  $pageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    '@id' => $canonicalUrl . '/#webpage',
    'name' => 'Promo Lanyard Custom Palembang - Diskon & Bundling Hemat',
    'description' => 'Promo cetak lanyard custom Palembang: diskon pemesanan pertama, gratis ongkir Palembang, paket hemat corporate, dan bundling ID card holder.',
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
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Promo', 'item' => $canonicalUrl],
    ],
  ];
@endphp
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($pageSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($breadcrumbSchema) !!}</script>
