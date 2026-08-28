<section id="pemesanan" class="home-order-journey" aria-labelledby="home-order-journey-title">
  <div class="home-shell home-shell--wide home-order-journey__shell">
    {{-- Area Kiri: Vertical Central Spine + Alternating Rows --}}
    <div class="home-order-journey__flow" role="list" aria-label="Tahapan pemesanan lanyard">
      <div class="home-order-journey__spine" aria-hidden="true"></div>

      @php
        $journeySteps = [
          ['num' => '01', 'title' => 'Konsultasi', 'desc' => 'Sampaikan kebutuhan dan jumlah pesanan Anda. Kami bantu menentukan pilihan yang sesuai.'],
          ['num' => '02', 'title' => 'Kirim Desain', 'desc' => 'Kirim desain atau logo Anda. Kami cek detailnya sebelum produksi.'],
          ['num' => '03', 'title' => 'Konfirmasi', 'desc' => 'Konfirmasi desain, jumlah, harga, dan jadwal produksi.'],
          ['num' => '04', 'title' => 'Produksi', 'desc' => 'Pesanan masuk proses produksi dengan standar kualitas yang telah disepakati.'],
          ['num' => '05', 'title' => 'Selesai & Dikirim', 'desc' => 'Pesanan selesai dan dikirim dengan packaging yang aman.'],
        ];
      @endphp

      @foreach ($journeySteps as $index => $step)
        @php $isEven = ($index % 2) === 1; @endphp
        <div class="home-order-journey__row @if($isEven) home-order-journey__row--right @else home-order-journey__row--left @endif" role="listitem">
          <div class="home-order-journey__node">
            <span class="home-order-journey__num" aria-hidden="true">{{ $step['num'] }}</span>
            <div class="home-order-journey__circle" aria-hidden="true">
              @if ($index === 0)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"/><circle cx="9" cy="10" r=".7" fill="currentColor"/><circle cx="12" cy="10" r=".7" fill="currentColor"/><circle cx="15" cy="10" r=".7" fill="currentColor"/></svg>
              @elseif ($index === 1)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M17 3l2 2-10 10-3 1 1-3 10-10z"/><path d="M15 5L7 13"/><path d="M11 20H4"/></svg>
              @elseif ($index === 2)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><rect x="9" y="2" width="6" height="5" rx="1"/><rect x="5" y="7" width="14" height="14" rx="2"/><path d="M9 14l2 2 4-4"/></svg>
              @elseif ($index === 3)
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="3"/><path d="M12 1v2M12 21v2M1 12h2M21 12h2M4.22 4.22l1.42 1.42M18.36 18.36l1.42 1.42M4.22 19.78l1.42-1.42M18.36 5.64l1.42-1.42"/></svg>
              @else
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round"><path d="M21 8v10a2 2 0 0 1-1 1.73l-7 4a2 2 0 0 1-2 0l-7-4A2 2 0 0 1 3 18V8a2 2 0 0 1 1-1.73l7-4a2 2 0 0 1 2 0l7 4A2 2 0 0 1 21 8z"/><polyline points="3.27 6.96 12 12.01 20.73 6.96"/><line x1="12" y1="22.08" x2="12" y2="12"/><path d="M14 16l4 3-4 3"/><path d="M14 16h-3"/></svg>
              @endif
            </div>
          </div>
          <div class="home-order-journey__text">
            <h3 class="home-order-journey__step-title">{{ $step['title'] }}</h3>
            <p class="home-order-journey__step-desc">{{ $step['desc'] }}</p>
          </div>
          <span class="home-order-journey__connector" aria-hidden="true"></span>
        </div>
      @endforeach
    </div>

    {{-- Area Kanan: Pengantar --}}
    <div class="home-order-journey__intro">
      <p class="home-order-journey__eyebrow">PROSES PEMESANAN</p>
      <h2 id="home-order-journey-title" class="home-order-journey__title">
        Dari Ide Anda,<br>
        Sampai Jadi.
      </h2>
      <p class="home-order-journey__desc">
        Kami buat prosesnya sederhana dan jelas, agar Anda bisa fokus pada kebutuhan, sementara kami mengurus sisanya.
      </p>
    </div>
  </div>
</section>
