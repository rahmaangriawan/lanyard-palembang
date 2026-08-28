@php
  $calculatorPackages = [
    ['value' => '1.5', 'label' => 'Lanyard 1.5 cm', 'price' => 5000, 'formatted' => 'Rp 5.000'],
    ['value' => '2.0', 'label' => 'Lanyard 2.0 cm', 'price' => 6000, 'formatted' => 'Rp 6.000'],
    ['value' => '2.5', 'label' => 'Lanyard 2.5 cm', 'price' => 7500, 'formatted' => 'Rp 7.500'],
  ];
@endphp

<section id="kalkulator-harga" class="home-quotation-calculator" aria-labelledby="home-quotation-calculator-title" data-quotation-calculator>
  <div class="home-shell home-shell--wide home-quotation-calculator__layout">
    {{-- Sisi Kiri: Calculator Form --}}
    <form class="home-quotation-calculator__form" data-quotation-form>
      {{-- Section 1: Ukuran Lanyard --}}
      <fieldset class="home-quotation-calculator__section">
        <legend class="home-quotation-calculator__label">Pilih lebar tali</legend>
        <div class="home-quotation-calculator__packages">
          @foreach ($calculatorPackages as $package)
            <label class="home-quotation-calculator__package{{ $loop->first ? ' is-selected' : '' }}">
              <input type="radio" name="lanyard_size" value="{{ $package['value'] }}" data-package-price="{{ $package['price'] }}" data-package-label="{{ $package['label'] }}" {{ $loop->first ? 'checked' : '' }}>
              <span class="home-quotation-calculator__package-name">{{ $package['label'] }}</span>
              <span class="home-quotation-calculator__package-price">
                <strong>{{ $package['formatted'] }}</strong><small>/pcs</small>
              </span>
            </label>
          @endforeach
        </div>
      </fieldset>

      {{-- Section 2: Jumlah & Bahan --}}
      <div class="home-quotation-calculator__fields">
        <label class="home-quotation-calculator__field">
          <span class="home-quotation-calculator__label">Jumlah pesanan</span>
          <span class="home-quotation-calculator__quantity">
            <button type="button" aria-label="Kurangi jumlah" data-quotation-decrease>−</button>
            <input type="number" name="quantity" min="50" max="100000" step="1" value="100" inputmode="numeric" aria-describedby="quotation-minimum">
            <button type="button" aria-label="Tambah jumlah" data-quotation-increase>+</button>
          </span>
          <small id="quotation-minimum">Minimum order 50 pcs.</small>
        </label>

        <label class="home-quotation-calculator__field">
          <span class="home-quotation-calculator__label">Pilihan bahan</span>
          <div class="home-quotation-calculator__select-wrap">
            <select name="material">
              <option value="Polyester Tissue Sublimasi" selected>Polyester Tissue Sublimasi</option>
              <option value="Polyester Standar Sublimasi">Polyester Standar Sublimasi</option>
              <option value="Lanyard Nylon Premium">Lanyard Nylon Premium</option>
            </select>
          </div>
          <small>Cetak sublimasi digital full color bolak-balik.</small>
        </label>
      </div>

      {{-- Summary Price Box: Dark / Gold Focal Point --}}
      <div class="home-quotation-calculator__result" aria-live="polite" aria-atomic="true">
        <div class="home-quotation-calculator__total-info">
          <span class="home-quotation-calculator__total-label">Estimasi total biaya</span>
          <strong class="home-quotation-calculator__total-val" data-quotation-total>Rp 500.000</strong>
          <small class="home-quotation-calculator__total-breakdown" data-quotation-breakdown>100 pcs × Rp 5.000</small>
        </div>
        <a href="https://wa.me/6282210200700" target="_blank" rel="noopener noreferrer" class="home-quotation-calculator__btn" data-quotation-link>
          <span>Kirim ke WhatsApp</span>
          <svg aria-hidden="true" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round">
            <line x1="5" y1="12" x2="19" y2="12"/>
            <polyline points="12 5 19 12 12 19"/>
          </svg>
        </a>
      </div>

      {{-- Information Note --}}
      <p class="home-quotation-calculator__disclaimer">
        *Estimasi di atas menggunakan tarif dasar cetak sublimasi full color. Harga final dapat disesuaikan dengan pilihan aksesoris tambahan (stopper putar, safety breakaway, atau ID card holder).
      </p>
    </form>

    {{-- Sisi Kanan: Informasi & Heading --}}
    <header class="home-quotation-calculator__intro">
      <div class="home-quotation-calculator__eyebrow-wrap">
        <span class="home-quotation-calculator__eyebrow">ESTIMASI BIAYA CEPAT</span>
      </div>
      <h2 id="home-quotation-calculator-title" class="home-quotation-calculator__title">
        <span>Hitung Estimasi</span>
        <span class="home-quotation-calculator__title-accent">Pesanan Anda.</span>
      </h2>
      <p class="home-quotation-calculator__desc">
        Pilih ukuran, jumlah, dan bahan untuk melihat perkiraan biaya tali lanyard custom Anda secara transparan.
      </p>

      <ul class="home-quotation-calculator__highlights">
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          <span>Gratis layout mockup 3D sebelum cetak</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          <span>Harga makin murah untuk order partai</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          <span>Garansi 100% cetak ulang jika cacat</span>
        </li>
      </ul>
    </header>
  </div>
</section>
