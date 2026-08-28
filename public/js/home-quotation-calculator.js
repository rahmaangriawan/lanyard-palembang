(() => {
  const calculator = document.querySelector('[data-quotation-calculator]');
  if (!calculator) return;

  const form = calculator.querySelector('[data-quotation-form]');
  const packageInputs = Array.from(form.querySelectorAll('input[name="lanyard_size"]'));
  const quantity = form.querySelector('input[name="quantity"]');
  const material = form.querySelector('select[name="material"]');
  const decrease = form.querySelector('[data-quotation-decrease]');
  const increase = form.querySelector('[data-quotation-increase]');
  const total = form.querySelector('[data-quotation-total]');
  const breakdown = form.querySelector('[data-quotation-breakdown]');
  const quotationLink = form.querySelector('[data-quotation-link]');
  const minimum = Number(quantity.min || 50);
  const maximum = Number(quantity.max || 100000);
  const formatter = new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR', maximumFractionDigits: 0 });

  // Tiered discount multiplier berdasarkan kuantitas
  const getTierMultiplier = (qty) => {
    if (qty >= 5000) return 0.70;
    if (qty >= 1000) return 0.75;
    if (qty >= 500) return 0.85;
    if (qty >= 100) return 0.95;
    return 1.0; // 50 - 99 pcs
  };

  const safeQuantity = () => {
    const parsed = Number.parseInt(quantity.value, 10);
    return Number.isFinite(parsed) ? Math.min(Math.max(parsed, minimum), maximum) : minimum;
  };

  const selectedPackage = () => packageInputs.find((input) => input.checked) || packageInputs[0];

  const update = () => {
    const selected = selectedPackage();
    const basePrice = Number(selected.dataset.packagePrice || 5000);
    const amount = safeQuantity();
    const label = selected.dataset.packageLabel || 'Lanyard custom';
    const multiplier = getTierMultiplier(amount);
    const unitPrice = Math.round(basePrice * multiplier);
    const totalPrice = unitPrice * amount;

    quantity.value = amount;
    total.textContent = formatter.format(totalPrice);
    breakdown.textContent = `${amount.toLocaleString('id-ID')} pcs × ${formatter.format(unitPrice)}/pcs`;
    
    packageInputs.forEach((input) => {
      input.closest('.home-quotation-calculator__package')?.classList.toggle('is-selected', input === selected);
    });

    const message = [
      'Halo Lanyard Palembang, saya ingin meminta estimasi quotation:',
      `• Ukuran: ${label}`,
      `• Bahan: ${material.value}`,
      `• Kuantitas: ${amount.toLocaleString('id-ID')} pcs`,
      `• Estimasi Biaya: ${formatter.format(totalPrice)} (${formatter.format(unitPrice)}/pcs)`,
      '',
      'Mohon dibantu konfirmasi ketersediaan jadwal produksi dan sampel mockup gratisnya. Terima kasih!'
    ].join('\n');

    quotationLink.href = `https://wa.me/6282210200700?text=${encodeURIComponent(message)}`;
  };

  packageInputs.forEach((input) => input.addEventListener('change', update));
  form.addEventListener('submit', (event) => event.preventDefault());
  quantity.addEventListener('input', update);
  quantity.addEventListener('blur', update);
  material.addEventListener('change', update);
  decrease.addEventListener('click', () => { quantity.value = Math.max(minimum, safeQuantity() - 50); update(); });
  increase.addEventListener('click', () => { quantity.value = safeQuantity() + 50; update(); });
  update();
})();
