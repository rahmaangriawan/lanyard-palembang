@php
  $siteUrl = rtrim((string) (config('app.prod_url') ?: config('app.url') ?: url('/')), '/');
  if ($siteUrl === '' || str_contains($siteUrl, 'localhost') || str_contains($siteUrl, '127.0.0.1')) {
    $siteUrl = 'https://lanyardpalembang.com';
  }
  $canonicalUrl = $siteUrl . '/tentang-kami';
  $logoUrl = $siteUrl . '/uploads/lanyard-palembang-favicon.webp';

  $org = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    '@id' => $siteUrl . '/#organization',
    'name' => 'Lanyard Palembang',
    'url' => $siteUrl,
    'logo' => [
      '@type' => 'ImageObject',
      'url' => $logoUrl,
    ],
    'contactPoint' => [[
      '@type' => 'ContactPoint',
      'telephone' => '+62-822-1020-0700',
      'contactType' => 'customer service',
      'areaServed' => 'ID',
      'availableLanguage' => ['id'],
    ]],
  ];

  $aboutPage = [
    '@context' => 'https://schema.org',
    '@type' => 'AboutPage',
    '@id' => $canonicalUrl . '/#webpage',
    'name' => 'Tentang Lanyard Palembang | Workshop Tali Lanyard Custom',
    'description' => 'Mengenal workshop Lanyard Palembang: atelier percetakan tali lanyard custom untuk perusahaan, BUMN, universitas, dan event di seluruh Indonesia dengan presisi cetak 1–3 hari.',
    'url' => $canonicalUrl,
    'inLanguage' => 'id-ID',
    'isPartOf' => [
      '@type' => 'WebSite',
      'name' => 'Lanyard Palembang',
      'url' => $siteUrl,
    ],
    'about' => ['@id' => $siteUrl . '/#organization'],
    'primaryImageOfPage' => [
      '@type' => 'ImageObject',
      'url' => $siteUrl . '/uploads/tentang-lanyard.webp',
    ],
  ];

  $breadcrumbs = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
      ['@type' => 'ListItem', 'position' => 1, 'name' => 'Beranda', 'item' => $siteUrl . '/'],
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Tentang Kami', 'item' => $canonicalUrl],
    ],
  ];
@endphp

<script type="application/ld+json">{!! \App\Support\StructuredData::encode($org) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($aboutPage) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($breadcrumbs) !!}</script>
