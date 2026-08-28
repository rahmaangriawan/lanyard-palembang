@php
  $siteUrlRaw = config('app.url');
  if (empty($siteUrlRaw)) { $siteUrlRaw = url('/'); }
  $siteUrl = rtrim($siteUrlRaw, '/');
  $logoUrl = $siteUrl . '/uploads/lanyard-palembang-logo.webp';
  $logoHeaderUrl = $siteUrl . '/uploads/lanyard-palembang-logo.webp';

  $orgSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'Organization',
    '@id' => $siteUrl . '/#organization',
    'name' => 'Lanyard Palembang',
    'url' => $siteUrl . '/',
    'logo' => [
      '@type' => 'ImageObject',
      'url' => $logoUrl,
      'width' => 500,
      'height' => 122,
    ],
    'image' => $logoUrl,
    'telephone' => '+6282210200700',
    'email' => 'info@lanyardpalembang.com',
    'description' => 'Cetak lanyard custom premium di Indonesia dengan pilihan bahan berkualitas, desain profesional, dan layanan pemesanan mudah. Bebas ongkir Indonesia Raya.',
    'sameAs' => [
      'https://wa.me/6282210200700',
    ],
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => 'Jl. Sultan Mahmud Badaruddin II, Sukarami',
      'addressLocality' => 'Palembang',
      'addressRegion' => 'Sumatera Selatan',
      'addressCountry' => 'ID',
    ],
  ];

  $localBusinessSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'LocalBusiness',
    '@id' => $siteUrl . '/#localbusiness',
    'name' => 'Lanyard Palembang',
    'url' => $siteUrl . '/',
    'logo' => $logoUrl,
    'image' => $logoHeaderUrl,
    'telephone' => '+6282210200700',
    'priceRange' => 'Rp 1000 - Rp 50000',
    'description' => 'Cetak lanyard custom premium dari Palembang, Sumatera Selatan dengan pengiriman ke seluruh Indonesia.',
    'address' => [
      '@type' => 'PostalAddress',
      'streetAddress' => 'Jl. Sultan Mahmud Badaruddin II, Sukarami',
      'addressLocality' => 'Palembang',
      'addressRegion' => 'Sumatera Selatan',
      'addressCountry' => 'ID',
    ],
    'geo' => [
      '@type' => 'GeoCoordinates',
      'latitude' => -2.9761,
      'longitude' => 104.7754,
    ],
    'openingHours' => 'Mo-Sa 08:00-20:00',
    'areaServed' => [
      ['@type' => 'City', 'name' => 'Palembang'],
      ['@type' => 'City', 'name' => 'Banyuasin'],
      ['@type' => 'City', 'name' => 'Ogan Ilir'],
      ['@type' => 'City', 'name' => 'Indralaya'],
      ['@type' => 'City', 'name' => 'Prabumulih'],
    ],
  ];

  $websiteSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'WebSite',
    '@id' => $siteUrl . '/#website',
    'url' => $siteUrl . '/',
    'name' => 'Lanyard Palembang',
    'publisher' => ['@id' => $siteUrl . '/#organization'],
    'inLanguage' => 'id-ID',
    'potentialAction' => [
      [
        '@type' => 'SearchAction',
        'target' => [
          '@type' => 'EntryPoint',
          'urlTemplate' => $siteUrl . '/produk?q={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
      ],
      [
        '@type' => 'SearchAction',
        'target' => [
          '@type' => 'EntryPoint',
          'urlTemplate' => $siteUrl . '/blog?q={search_term_string}',
        ],
        'query-input' => 'required name=search_term_string',
      ],
    ],
  ];

  $breadcrumbSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'BreadcrumbList',
    'itemListElement' => [
      [
        '@type' => 'ListItem',
        'position' => 1,
        'name' => 'Home',
        'item' => $siteUrl . '/',
      ],
    ],
  ];

  $faqSchema = [
    '@context' => 'https://schema.org',
    '@type' => 'FAQPage',
    'mainEntity' => [
      [
        '@type' => 'Question',
        'name' => 'Bisa cetak logo sendiri di lanyard?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Bisa. Anda dapat mengirimkan logo, warna brand, atau referensi desain kepada tim kami. Logo akan disesuaikan dengan ukuran lanyard agar hasil cetaknya tetap jelas dan proporsional.',
        ],
      ],
      [
        '@type' => 'Question',
        'name' => 'Berapa lama proses cetak lanyard custom?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Waktu produksi standar sekitar 3–5 hari kerja setelah desain disetujui. Estimasi dapat menyesuaikan jumlah pesanan, bahan, tingkat kerumitan desain, dan antrean produksi saat pemesanan.',
        ],
      ],
      [
        '@type' => 'Question',
        'name' => 'Apakah bisa request contoh desain dulu?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Bisa. Tim kami akan menyiapkan mockup digital berdasarkan logo, warna, dan kebutuhan Anda sebelum produksi dimulai. Produksi baru diproses setelah desain mendapatkan persetujuan.',
        ],
      ],
      [
        '@type' => 'Question',
        'name' => 'Aksesoris lanyard apa saja yang bisa dipilih?',
        'acceptedAnswer' => [
          '@type' => 'Answer',
          'text' => 'Tersedia pilihan hook plastik, hook metal, stopper silikon, dan ID Card holder. Tim kami dapat membantu memilih kombinasi aksesori yang sesuai dengan penggunaan dan anggaran Anda.',
        ],
      ],
    ],
  ];
  // Satu sumber data untuk FAQ yang terlihat dan JSON-LD agar tidak drift.
  $faqSchema = \App\Support\StructuredData::faqSchema(config('seo.faq', []));
@endphp
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($orgSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($localBusinessSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($websiteSchema) !!}</script>
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($breadcrumbSchema) !!}</script>
@if($faqSchema)
<script type="application/ld+json">{!! \App\Support\StructuredData::encode($faqSchema) !!}</script>
@endif
