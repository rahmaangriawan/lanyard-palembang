/**
 * Hero Metrics Mobile Horizontal Drag & Touch Swipe Helper
 * Enables buttery smooth drag-to-scroll via mouse and native touch swipe.
 */
(() => {
  const initMetricsScroll = () => {
    const metrics = document.querySelector('.ptl-hero__metrics');
    if (!metrics) return;

    let isDown = false;
    let startX = 0;
    let scrollLeft = 0;

    metrics.addEventListener('mousedown', (e) => {
      isDown = true;
      metrics.style.cursor = 'grabbing';
      metrics.style.userSelect = 'none';
      startX = e.pageX - metrics.offsetLeft;
      scrollLeft = metrics.scrollLeft;
    });

    const stopDrag = () => {
      if (!isDown) return;
      isDown = false;
      metrics.style.cursor = '';
      metrics.style.removeProperty('user-select');
    };

    window.addEventListener('mouseup', stopDrag);
    metrics.addEventListener('mouseleave', stopDrag);

    metrics.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - metrics.offsetLeft;
      const walk = (x - startX) * 1.5;
      metrics.scrollLeft = scrollLeft - walk;
    });
  };

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initMetricsScroll, { once: true });
  } else {
    initMetricsScroll();
  }
})();
