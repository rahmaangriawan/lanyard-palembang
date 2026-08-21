(function () {
  'use strict';

  function initCustomNeeds() {
    var section = document.querySelector('[data-custom-needs]');
    if (!section) return;

    var items = Array.prototype.slice.call(section.querySelectorAll('[data-needs-item]'));
    if (!items.length) return;

    function setActive(activeItem) {
      items.forEach(function (item) {
        var isActive = item === activeItem;
        var toggle = item.querySelector('[data-needs-toggle]');
        var panel = item.querySelector('[data-needs-panel]');

        item.classList.toggle('is-open', isActive);
        toggle.setAttribute('aria-expanded', isActive ? 'true' : 'false');
        panel.setAttribute('aria-hidden', isActive ? 'false' : 'true');
      });
    }

    items.forEach(function (item) {
      var toggle = item.querySelector('[data-needs-toggle]');
      toggle.addEventListener('click', function () {
        setActive(item);
      });
    });
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', initCustomNeeds, { once: true });
  } else {
    initCustomNeeds();
  }
})();
