@php
  $siteUrlRaw = config('app.url');
  if (empty($siteUrlRaw)) { $siteUrlRaw = url('/'); }
  $siteUrl = rtrim($siteUrlRaw, '/');

  $collectionSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'CollectionPage',
    'name' => 'Katalog Produk Tali Lanyard Custom & Aksesoris | Lanyard Medan',
    'description' => 'Katalog lengkap tali lanyard cetak sublimasi digital, polyester, sablon, ID card holder, dan aksesoris logam berkualitas di Medan.',
    'url' => $siteUrl . '/produk',
    'inLanguage' => 'id-ID',
    'isPartOf' => ['@id' => $siteUrl . '/#website'],
  ];

  if (isset($products) && count($products) > 0) {
    $itemList = [];
    $pos = 1;
    foreach ($products as $prod) {
      $name = isset($prod->name) ? $prod->name : '';
      $slug = isset($prod->slug) ? $prod->slug : '';
      if (empty($name)) continue;
      $url = $siteUrl . '/produk';
      if (!empty($slug)) $url .= '/' . $slug;
      $itemList[] = [
        '@type' => 'ListItem',
        'position' => $pos,
        'name' => $name,
        'url' => $url,
      ];
      $pos++;
      if ($pos > 20) break;
    }
    if (!empty($itemList)) {
      $collectionSchema['mainEntity'] = [
        '@type' => 'ItemList',
        'numberOfItems' => count($itemList),
        'itemListElement' => $itemList,
      ];
    }
  }

  $breadcrumb = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
      ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => $siteUrl . '/'],
      ['@type' => 'ListItem', 'position' => 2, 'name' => 'Produk', 'item' => $siteUrl . '/produk'],
    ],
  ];

  $offerCatalog = [
    '@context' => 'https://schema.org',
    '@type' => 'OfferCatalog',
    'name' => 'Katalog Lanyard Custom & Aksesoris Lanyard Medan',
    'url' => $siteUrl . '/produk',
  ];
@endphp
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($collectionSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($breadcrumb) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($offerCatalog) !!}</script>
