@php
  $calculatorPackages = [
    ['value' => '1.5', 'label' => 'Lanyard 1.5 cm', 'price' => 9000, 'formatted' => 'Rp 9.000'],
    ['value' => '2', 'label' => 'Lanyard 2 cm', 'price' => 10000, 'formatted' => 'Rp 10.000'],
    ['value' => '2.5', 'label' => 'Lanyard 2.5 cm', 'price' => 12000, 'formatted' => 'Rp 12.000'],
  ];
@endphp

<section id="kalkulator-harga" class="home-quotation-calculator" aria-labelledby="home-quotation-calculator-title" data-quotation-calculator>
  <div class="home-shell home-shell--wide home-quotation-calculator__layout">
    {{-- Sisi Kiri: Informasi & Heading --}}
    <header class="home-quotation-calculator__intro" data-sr="fade">
      <p class="home-quotation-calculator__eyebrow">ESTIMASI CEPAT</p>
      <h2 id="home-quotation-calculator-title" class="home-quotation-calculator__title">
        <span>Hitung Estimasi</span>
        <span class="home-quotation-calculator__title-accent">Pesanan Anda</span>
      </h2>
      <p class="home-quotation-calculator__desc">
        Pilih ukuran dan jumlah pesanan untuk melihat perkiraan biaya lanyard custom Anda.
      </p>
    </header>

    {{-- Sisi Kanan: Calculator Card Modern --}}
    <form class="home-quotation-calculator__form" data-quotation-form data-sr="fade">
      {{-- Section 1: Ukuran Lanyard --}}
      <fieldset class="home-quotation-calculator__section">
        <legend class="home-quotation-calculator__label">Ukuran lanyard</legend>
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
            <input type="number" name="quantity" min="50" max="100000" step="1" value="50" inputmode="numeric" aria-describedby="quotation-minimum">
            <button type="button" aria-label="Tambah jumlah" data-quotation-increase>+</button>
          </span>
          <small id="quotation-minimum">Minimum pemesanan 50 pcs.</small>
        </label>

        <label class="home-quotation-calculator__field">
          <span class="home-quotation-calculator__label">Jenis bahan</span>
          <div class="home-quotation-calculator__select-wrap">
            <select name="material">
              <option value="Polyester Tissue" selected>Polyester Tissue</option>
            </select>
          </div>
          <small>Detail bahan dikonfirmasi bersama tim kami.</small>
        </label>
      </div>

      {{-- Summary Price Box: Red Focal Point (#9E0C17) --}}
      <div class="home-quotation-calculator__result" aria-live="polite" aria-atomic="true">
        <div class="home-quotation-calculator__total-info">
          <span class="home-quotation-calculator__total-label">Estimasi total</span>
          <strong class="home-quotation-calculator__total-val" data-quotation-total>Rp 450.000</strong>
          <small class="home-quotation-calculator__total-breakdown" data-quotation-breakdown>50 pcs × Rp 9.000</small>
        </div>
        <a href="https://wa.me/6282210200700" target="_blank" rel="noopener noreferrer" class="home-quotation-calculator__btn" data-quotation-link data-button-motion>
          <span data-button-label>Minta Quotation</span>
          <svg aria-hidden="true" viewBox="0 0 24 24" focusable="false"><path d="M5 12h13m-6-6 6 6-6 6" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
        </a>
      </div>

      {{-- Information Note --}}
      <p class="home-quotation-calculator__disclaimer">
        Estimasi ini menggunakan harga paket dasar full printing. Harga akhir menyesuaikan detail desain dan spesifikasi pesanan.
      </p>
    </form>
  </div>
</section>
