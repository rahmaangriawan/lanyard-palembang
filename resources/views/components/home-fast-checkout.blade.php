<section class="home-fast-checkout" id="pesan-cepat" aria-labelledby="fast-checkout-title" data-fast-checkout>
  <div class="home-shell home-shell--wide home-fast-checkout__layout">
    {{-- Sisi Kiri: Intro & Nilai Tambah --}}
    <header class="home-fast-checkout__intro">
      <div class="home-fast-checkout__eyebrow-wrap">
        <span class="home-fast-checkout__eyebrow">FAST CHECKOUT · FORM KILAT</span>
      </div>
      <h2 id="fast-checkout-title" class="home-fast-checkout__title">
        <span>Kirim Rincian Pesanan</span>
        <span class="home-fast-checkout__title-accent">dalam 1 Menit.</span>
      </h2>
      <p class="home-fast-checkout__desc">
        Isi form singkat di bawah ini untuk terhubung langsung ke WhatsApp tim sales & desainer kami bersama ringkasan pesanan yang siap diproses.
      </p>

      <ul class="home-fast-checkout__points" aria-label="Keunggulan pemesanan cepat">
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          <span>Tanpa registrasi akun & tanpa proses rumit</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          <span>Gratis pembuatan sampel mockup digital 3D</span>
        </li>
        <li>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
            <polyline points="20 6 9 17 4 12"/>
          </svg>
          <span>Respon cepat manusia dalam hitungan menit</span>
        </li>
      </ul>
    </header>

    {{-- Sisi Kanan: Form Order Kilat --}}
    <form class="home-fast-checkout__form" data-fast-order-form>
      <div class="home-fast-checkout__fields">
        <label class="home-fast-checkout__field home-fast-checkout__field--wide">
          <span class="home-fast-checkout__label">Nama Lengkap / PIC</span>
          <input type="text" name="name" autocomplete="name" placeholder="Contoh: Budi Pratama" required>
        </label>

        <label class="home-fast-checkout__field">
          <span class="home-fast-checkout__label">Kategori Kebutuhan</span>
          <div class="home-fast-checkout__select-wrap">
            <select name="need">
              <option value="Perusahaan & Kantor">Perusahaan &amp; Kantor</option>
              <option value="BUMN & Instansi Dinas">BUMN &amp; Instansi Dinas</option>
              <option value="Universitas & Kampus">Universitas &amp; Kampus</option>
              <option value="Event, Seminar, & Festival">Event, Seminar, &amp; Festival</option>
              <option value="Komunitas & Organisasi">Komunitas &amp; Organisasi</option>
            </select>
          </div>
        </label>

        <label class="home-fast-checkout__field">
          <span class="home-fast-checkout__label">Jumlah Pesanan (pcs)</span>
          <input type="number" name="quantity" min="50" max="100000" step="1" value="100" inputmode="numeric" required>
        </label>

        <label class="home-fast-checkout__field">
          <span class="home-fast-checkout__label">Lebar Tali Pilihan</span>
          <div class="home-fast-checkout__select-wrap">
            <select name="size">
              <option value="2.0 cm (Paling Populer)" selected>2.0 cm (Standar Populer)</option>
              <option value="1.5 cm">1.5 cm (Ramping)</option>
              <option value="2.5 cm">2.5 cm (Ekstra Lebar)</option>
              <option value="Belum Menentukan">Belum Menentukan</option>
            </select>
          </div>
        </label>

        <label class="home-fast-checkout__field">
          <span class="home-fast-checkout__label">Target Deadline Acara</span>
          <div class="home-fast-checkout__select-wrap">
            <select name="deadline">
              <option value="1–3 Hari (Express Kilat)">1–3 Hari (Express Kilat)</option>
              <option value="1–2 Minggu (Reguler)" selected>1–2 Minggu (Reguler)</option>
              <option value="Lebih dari 2 Minggu">Lebih dari 2 Minggu</option>
              <option value="Fleksibel / Diskusikan">Fleksibel / Diskusikan</option>
            </select>
          </div>
        </label>

        <label class="home-fast-checkout__field home-fast-checkout__field--wide">
          <span class="home-fast-checkout__label">Catatan Tambahan (Opsional)</span>
          <textarea name="note" rows="2" placeholder="Contoh: Butuh ID card holder kulit, logo sudah berformat vector, minta saran warna tali."></textarea>
        </label>
      </div>

      <div class="home-fast-checkout__footer">
        <p id="fast-checkout-note">Rincian akan langsung terformat otomatis dan membuka aplikasi WhatsApp Anda.</p>
        <button type="submit" class="home-fast-checkout__submit">
          <span>Kirim Rincian via WhatsApp</span>
          <span aria-hidden="true">→</span>
        </button>
      </div>
      <p class="home-fast-checkout__status" aria-live="polite" aria-atomic="true" data-fast-order-status></p>
    </form>
  </div>
</section>
