/**
 * Blog Showcase — Floating Cursor Preview with Lerp Animation
 * Smoothly follows mouse movement when hovering blog list items.
 */
(() => {
  const showcase = document.querySelector('[data-blog-showcase]');
  if (!showcase) return;

  // Touch device check: skip floating preview
  if (window.matchMedia('(pointer: coarse)').matches) return;

  const preview = showcase.querySelector('[data-blog-preview]');
  const previewImg = showcase.querySelector('[data-blog-preview-img]');
  const items = showcase.querySelectorAll('[data-blog-item]');
  if (!preview || !previewImg || items.length === 0) return;

  let mouseX = -9999;
  let mouseY = -9999;
  let currentX = -9999;
  let currentY = -9999;
  let isHovered = false;
  let rafId = null;

  // Preload images
  items.forEach((item) => {
    const src = item.dataset.image;
    if (src) {
      const img = new Image();
      img.src = src;
    }
  });

  const updatePosition = () => {
    if (isHovered) {
      // Lerp (Linear Interpolation) for buttery-smooth trailing motion
      const lerpFactor = 0.12;
      currentX += (mouseX - currentX) * lerpFactor;
      currentY += (mouseY - currentY) * lerpFactor;

      // Position: center horizontally on cursor + offset slightly above/right
      const offsetX = 24;
      const offsetY = -100;

      preview.style.transform = `translate3d(${currentX + offsetX}px, ${currentY + offsetY}px, 0) scale(1)`;
      rafId = requestAnimationFrame(updatePosition);
    } else {
      preview.style.transform = `translate3d(${currentX + 24}px, ${currentY - 100}px, 0) scale(0.88)`;
    }
  };

  showcase.addEventListener('mousemove', (e) => {
    mouseX = e.clientX;
    mouseY = e.clientY;

    if (currentX === -9999) {
      currentX = mouseX;
      currentY = mouseY;
    }
  });

  items.forEach((item) => {
    item.addEventListener('mouseenter', (e) => {
      const src = item.dataset.image;
      if (src && previewImg.src !== src) {
        previewImg.src = src;
        previewImg.alt = item.dataset.title || '';
      }

      isHovered = true;
      preview.classList.add('is-active');

      if (!rafId) {
        rafId = requestAnimationFrame(updatePosition);
      }
    });

    item.addEventListener('mouseleave', () => {
      // Checked on next frame or showcase leave
    });
  });

  showcase.addEventListener('mouseleave', () => {
    isHovered = false;
    preview.classList.remove('is-active');
    if (rafId) {
      cancelAnimationFrame(rafId);
      rafId = null;
    }
  });
})();
