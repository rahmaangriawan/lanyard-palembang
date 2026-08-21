(function () {
  'use strict';

  function clamp(value, min, max) {
    return Math.min(Math.max(value, min), max);
  }

  function initSlider(grid) {
    var controls = grid.parentElement.querySelector('[data-home-blog-controls]');
    var track = controls ? controls.querySelector('[data-home-blog-track]') : null;
    var thumb = controls ? controls.querySelector('[data-home-blog-thumb]') : null;

    if (!controls || !track || !thumb) {
      return;
    }

    var dragState = null;
    var suppressClick = false;
    var reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    function updateProgress() {
      var maxScroll = Math.max(grid.scrollWidth - grid.clientWidth, 0);
      var viewportRatio = maxScroll > 0 ? grid.clientWidth / grid.scrollWidth : 1;
      var progress = maxScroll > 0 ? grid.scrollLeft / maxScroll : 0;

      controls.hidden = maxScroll <= 1;
      thumb.style.width = (viewportRatio * 100) + '%';
      thumb.style.left = (progress * (100 - viewportRatio)) + '%';
      track.setAttribute('aria-valuenow', String(Math.round(progress * 100)));
    }

    function scrollToProgress(progress) {
      var maxScroll = Math.max(grid.scrollWidth - grid.clientWidth, 0);
      grid.scrollTo({
        left: clamp(progress, 0, 1) * maxScroll,
        behavior: reducedMotion ? 'auto' : 'smooth'
      });
    }

    function setProgressFromPointer(event) {
      var bounds = track.getBoundingClientRect();
      var progress = (event.clientX - bounds.left) / bounds.width;
      scrollToProgress(progress);
    }

    grid.addEventListener('scroll', updateProgress, { passive: true });
    window.addEventListener('resize', updateProgress, { passive: true });

    track.addEventListener('pointerdown', function (event) {
      if (event.button !== 0) {
        return;
      }

      dragState = { pointerId: event.pointerId };
      track.classList.add('is-dragging');
      track.setPointerCapture(event.pointerId);
      setProgressFromPointer(event);
      event.preventDefault();
    });

    track.addEventListener('pointermove', function (event) {
      if (!dragState || dragState.pointerId !== event.pointerId) {
        return;
      }

      setProgressFromPointer(event);
    });

    function endTrackDrag(event) {
      if (!dragState || dragState.pointerId !== event.pointerId) {
        return;
      }

      dragState = null;
      track.classList.remove('is-dragging');
      if (track.hasPointerCapture(event.pointerId)) {
        track.releasePointerCapture(event.pointerId);
      }
    }

    track.addEventListener('pointerup', endTrackDrag);
    track.addEventListener('pointercancel', endTrackDrag);

    track.addEventListener('keydown', function (event) {
      var step = grid.clientWidth * 0.8;
      var behavior = reducedMotion ? 'auto' : 'smooth';

      if (event.key === 'ArrowRight' || event.key === 'PageDown') {
        grid.scrollBy({ left: step, behavior: behavior });
        event.preventDefault();
      } else if (event.key === 'ArrowLeft' || event.key === 'PageUp') {
        grid.scrollBy({ left: -step, behavior: behavior });
        event.preventDefault();
      } else if (event.key === 'Home') {
        grid.scrollTo({ left: 0, behavior: behavior });
        event.preventDefault();
      } else if (event.key === 'End') {
        grid.scrollTo({ left: grid.scrollWidth, behavior: behavior });
        event.preventDefault();
      }
    });

    grid.addEventListener('pointerdown', function (event) {
      if (event.pointerType !== 'mouse' || event.button !== 0) {
        return;
      }

      dragState = {
        pointerId: event.pointerId,
        startX: event.clientX,
        startScrollLeft: grid.scrollLeft,
        moved: false
      };
      grid.setPointerCapture(event.pointerId);
    });

    grid.addEventListener('pointermove', function (event) {
      if (!dragState || dragState.pointerId !== event.pointerId || dragState.startX === undefined) {
        return;
      }

      var distance = event.clientX - dragState.startX;
      if (Math.abs(distance) > 5) {
        dragState.moved = true;
        grid.scrollLeft = dragState.startScrollLeft - distance;
        event.preventDefault();
      }
    });

    function endGridDrag(event) {
      if (!dragState || dragState.pointerId !== event.pointerId || dragState.startX === undefined) {
        return;
      }

      suppressClick = dragState.moved;
      dragState = null;
      if (grid.hasPointerCapture(event.pointerId)) {
        grid.releasePointerCapture(event.pointerId);
      }
    }

    grid.addEventListener('pointerup', endGridDrag);
    grid.addEventListener('pointercancel', endGridDrag);
    grid.addEventListener('click', function (event) {
      if (suppressClick) {
        event.preventDefault();
        event.stopPropagation();
        suppressClick = false;
      }
    }, true);

    updateProgress();
  }

  function boot() {
    document.querySelectorAll('[data-home-blog-slider]').forEach(initSlider);
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', boot, { once: true });
  } else {
    boot();
  }
}());
