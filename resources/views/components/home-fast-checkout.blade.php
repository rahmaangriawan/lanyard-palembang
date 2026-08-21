<section class="home-fast-checkout" id="pesan-cepat" aria-labelledby="fast-checkout-title" data-fast-checkout>
  <div class="home-shell home-fast-checkout__shell">
    <header class="home-fast-checkout__intro">
      <p class="home-fast-checkout__eyebrow">PESAN CEPAT VIA WHATSAPP</p>
      <h2 id="fast-checkout-title">Mulai Pesanan Lanyard Anda dalam 1 Menit</h2>
      <p>Isi spesifikasi dasarnya. Tim kami akan melanjutkan konsultasi dan menyiapkan quotation yang sesuai.</p>
      <ul class="home-fast-checkout__points" aria-label="Keunggulan pemesanan cepat">
        <li>Tanpa registrasi</li>
        <li>Mockup sebelum produksi</li>
        <li>Respons langsung dari tim</li>
      </ul>
    </header>

    <form class="home-fast-checkout__form" data-fast-order-form>
      <div class="home-fast-checkout__fields">
        <label class="home-fast-checkout__field home-fast-checkout__field--wide">
          <span>Nama Anda</span>
          <input type="text" name="name" autocomplete="name" placeholder="Nama lengkap" required>
        </label>

        <label class="home-fast-checkout__field">
          <span>Kebutuhan</span>
          <select name="need">
            <option value="Perusahaan & kantor">Perusahaan & kantor</option>
            <option value="Kampus & sekolah">Kampus & sekolah</option>
            <option value="Event & komunitas">Event & komunitas</option>
            <option value="Lainnya">Lainnya</option>
          </select>
        </label>

        <label class="home-fast-checkout__field">
          <span>Jumlah pesanan</span>
          <input type="number" name="quantity" min="50" max="100000" step="1" value="50" inputmode="numeric" required>
        </label>

        <label class="home-fast-checkout__field">
          <span>Ukuran lanyard</span>
          <select name="size">
            <option value="Belum menentukan">Belum menentukan</option>
            <option value="1.5 cm">1.5 cm</option>
            <option value="2 cm">2 cm</option>
            <option value="2.5 cm">2.5 cm</option>
          </select>
        </label>

        <label class="home-fast-checkout__field">
          <span>Target selesai</span>
          <select name="deadline">
            <option value="Diskusikan dengan tim">Diskusikan dengan tim</option>
            <option value="Secepatnya">Secepatnya</option>
            <option value="1-2 minggu">1-2 minggu</option>
            <option value="Lebih dari 2 minggu">Lebih dari 2 minggu</option>
          </select>
        </label>

        <label class="home-fast-checkout__field home-fast-checkout__field--wide">
          <span>Catatan (opsional)</span>
          <textarea name="note" rows="2" placeholder="Contoh: butuh holder, desain sudah ada, atau warna khusus."></textarea>
        </label>
      </div>

      <div class="home-fast-checkout__footer">
        <p id="fast-checkout-note">Setelah dikirim, WhatsApp akan terbuka dengan detail pesanan Anda.</p>
        <button type="submit" class="home-fast-checkout__submit">
          <span class="material-symbols-outlined" aria-hidden="true">chat</span>
          <span>Mulai Pesan via WhatsApp</span>
          <span aria-hidden="true">→</span>
        </button>
      </div>
      <p class="home-fast-checkout__status" aria-live="polite" aria-atomic="true" data-fast-order-status></p>
    </form>
  </div>
</section>
