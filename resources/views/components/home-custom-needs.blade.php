@php
  $customOptions = [
    [
      'class' => 'home-custom-needs__annotation--material',
      'icon' => 'inventory_2',
      'title' => 'Material',
      'description' => 'Tissue premium, polyester, nylon',
    ],
    [
      'class' => 'home-custom-needs__annotation--print',
      'icon' => 'palette',
      'title' => 'Warna & Cetak',
      'description' => 'Full color sublimasi',
    ],
    [
      'class' => 'home-custom-needs__annotation--size',
      'icon' => 'verified',
      'title' => 'Ukuran',
      'description' => '1.5 cm, 2 cm, 2.5 cm',
    ],
    [
      'class' => 'home-custom-needs__annotation--accessories',
      'icon' => 'local_shipping',
      'title' => 'Aksesori',
      'description' => 'Kait, buckle, stopper, holder',
    ],
    [
      'class' => 'home-custom-needs__annotation--design',
      'icon' => 'check_circle',
      'title' => 'Desain Custom',
      'description' => 'Logo dan identitas brand Anda',
    ],
  ];
@endphp

<section id="kebutuhan-lanyard" class="home-custom-needs" aria-labelledby="custom-needs-title">
  <div class="home-custom-needs__shell">
    <header class="home-custom-needs__header">
      <p class="home-custom-needs__eyebrow">Custom Options</p>
      <h2 id="custom-needs-title">Lanyard Custom,<br><span>Bebas Disesuaikan</span></h2>
      <p class="home-custom-needs__description">Pilih material, ukuran, warna, cetak hingga aksesori. Tim kami siap membantu mewujudkan lanyard berkualitas dengan identitas brand Anda.</p>
    </header>

    <div class="home-custom-needs__stage">
      <div class="home-custom-needs__rail home-custom-needs__rail--left" aria-label="Pilihan material dan cetak">
        @foreach(array_slice($customOptions, 0, 2) as $option)
          <div class="home-custom-needs__annotation {{ $option['class'] }}">
            <span class="home-custom-needs__annotation-icon material-symbols-outlined" aria-hidden="true">{{ $option['icon'] }}</span>
            <span class="home-custom-needs__annotation-copy">
              <strong>{{ $option['title'] }}</strong>
              <small>{{ $option['description'] }}</small>
            </span>
          </div>
        @endforeach
      </div>

      <figure class="home-custom-needs__visual">
        <img
          src="/uploads/custom-options-lanyard-palembang.webp"
          alt="Lanyard custom Palembang dengan cetak warna gold, ID card, buckle, dan kait premium"
          width="1448"
          height="1086"
          loading="lazy"
          decoding="async"
        >
      </figure>

      <div class="home-custom-needs__rail home-custom-needs__rail--right" aria-label="Pilihan ukuran, aksesori, dan desain">
        @foreach(array_slice($customOptions, 2) as $option)
          <div class="home-custom-needs__annotation {{ $option['class'] }}">
            <span class="home-custom-needs__annotation-icon material-symbols-outlined" aria-hidden="true">{{ $option['icon'] }}</span>
            <span class="home-custom-needs__annotation-copy">
              <strong>{{ $option['title'] }}</strong>
              <small>{{ $option['description'] }}</small>
            </span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
