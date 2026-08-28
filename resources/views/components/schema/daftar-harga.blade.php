@php
  $siteUrl = rtrim((string) config('app.url', url('/')), '/');
  if ($siteUrl === '' || str_contains($siteUrl, 'localhost') || str_contains($siteUrl, '127.0.0.1')) {
    $siteUrl = 'https://lanyardpalembang.com';
  }
  $canonicalUrl = $siteUrl . '/daftar-harga';

  $pageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    '@id' => $canonicalUrl . '/#webpage',
    'name' => 'Daftar Harga Lanyard Custom | Lanyard Palembang',
    'description' => 'Estimasi harga cetak tali lanyard tissue, polyester, sublimasi full color, dan aksesoris di Palembang. Transparan dan kompetitif.',
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
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Daftar Harga', 'item' => $canonicalUrl],
    ],
  ];
@endphp
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($pageSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($breadcrumbSchema) !!}</script>
