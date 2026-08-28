(() => {
  const form = document.querySelector('[data-fast-order-form]');
  if (!form) return;

  const status = form.querySelector('[data-fast-order-status]');
  const quantityInput = form.elements.quantity;
  const minimum = Number(quantityInput.min || 50);
  const maximum = Number(quantityInput.max || 100000);

  const safeQuantity = () => {
    const parsed = Number.parseInt(quantityInput.value, 10);
    const quantity = Number.isFinite(parsed) ? parsed : minimum;
    return Math.min(Math.max(quantity, minimum), maximum);
  };

  form.addEventListener('submit', (event) => {
    event.preventDefault();
    if (!form.reportValidity()) return;

    const values = new FormData(form);
    const quantity = safeQuantity();
    quantityInput.value = quantity;
    const note = String(values.get('note') || '').trim();
    
    const message = [
      'Halo Lanyard Palembang, saya ingin memesan tali lanyard custom (Fast Checkout):',
      `• Nama/PIC: ${String(values.get('name') || '').trim()}`,
      `• Kategori: ${values.get('need')}`,
      `• Jumlah: ${quantity.toLocaleString('id-ID')} pcs`,
      `• Lebar Tali: ${values.get('size')}`,
      `• Target Selesai: ${values.get('deadline')}`,
      ...(note ? [`• Catatan Khusus: ${note}`] : []),
      '',
      'Mohon dibantu konfirmasi penawaran harga resmi dan layout mockup 3D gratisnya. Terima kasih!'
    ].join('\n');

    const url = `https://wa.me/6282210200700?text=${encodeURIComponent(message)}`;
    if (status) {
      status.textContent = 'Membuka WhatsApp dengan rincian pesanan Anda...';
    }
    window.open(url, '_blank', 'noopener,noreferrer');
  });

  quantityInput.addEventListener('blur', () => {
    quantityInput.value = safeQuantity();
  });
})();
