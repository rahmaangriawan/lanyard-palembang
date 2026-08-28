@php
  $siteUrl = rtrim((string) config('app.url', url('/')), '/');
  if ($siteUrl === '' || str_contains($siteUrl, 'localhost') || str_contains($siteUrl, '127.0.0.1')) {
    $siteUrl = 'https://lanyardpalembang.com';
  }
  $canonicalUrl = $siteUrl . '/template-desain';

  $pageSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebPage',
    '@id' => $canonicalUrl . '/#webpage',
    'name' => 'Template Desain Lanyard Custom | Inspirasi Gaya & Konsultasi Desain Gratis',
    'description' => 'Inspirasi arah gaya desain tali lanyard custom (Corporate, Event, Sekolah, Komunitas, Full Color, Minimalis) dan konsultasi mockup gratis dari Lanyard Palembang.',
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
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Template Desain', 'item' => $canonicalUrl],
    ],
  ];
@endphp
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($pageSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($breadcrumbSchema) !!}</script>
