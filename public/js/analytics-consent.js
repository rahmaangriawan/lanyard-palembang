(function () {
  'use strict';

  var configNode = document.getElementById('analytics-config');
  var config = {};
  var consentKey = 'lanyard_analytics_consent';
  var utmSessionKey = 'lanyard_utm_landing';
  var gtmLoaded = false;
  var allowedUtmKeys = ['utm_source', 'utm_medium', 'utm_campaign', 'utm_term', 'utm_content'];
  var downloadableExtensions = ['pdf', 'doc', 'docx', 'xls', 'xlsx', 'csv', 'zip'];

  try {
    config = configNode ? JSON.parse(configNode.textContent || '{}') : {};
  } catch (error) {
    config = {};
  }

  window.dataLayer = window.dataLayer || [];

  function getConsent() {
    try {
      return window.localStorage.getItem(consentKey) || '';
    } catch (error) {
      return '';
    }
  }

  function setConsent(value) {
    try {
      window.localStorage.setItem(consentKey, value);
    } catch (error) {
      // Storage can be unavailable in private or restricted browser contexts.
    }
  }

  function clean(value, maxLength) {
    return String(value || '').replace(/[\r\n\t]/g, ' ').trim().slice(0, maxLength || 120);
  }

  function push(eventName, payload) {
    if (getConsent() !== 'accepted') return false;
    var event = Object.assign({ event: eventName }, payload || {});
    window.dataLayer.push(event);
    return true;
  }

  function pagePath() {
    return window.location.pathname || '/';
  }

  function linkLocation(link) {
    return clean(
      link.getAttribute('data-track-location')
      || link.id
      || link.getAttribute('aria-label')
      || 'public_link',
      80,
    );
  }

  function linkLabel(link) {
    return clean(link.getAttribute('data-track-label') || link.textContent || link.getAttribute('aria-label'), 100);
  }

  function isWhatsAppLink(link) {
    var href = link.getAttribute('href') || '';
    if (link.hasAttribute('data-whatsapp')) return true;
    try {
      var url = new URL(href, window.location.href);
      return ['wa.me', 'api.whatsapp.com', 'web.whatsapp.com'].indexOf(url.hostname.toLowerCase()) !== -1;
    } catch (error) {
      return false;
    }
  }

  function trackWhatsApp(link) {
    return push('whatsapp_click', {
      link_location: linkLocation(link),
      page_path: pagePath(),
      label: linkLabel(link),
    });
  }

  function trackForm(formName, status) {
    return push('form_submit', {
      form_name: clean(formName, 80),
      page_path: pagePath(),
      status: clean(status || 'submitted', 40),
    });
  }

  function trackDownload(link) {
    var href = link.getAttribute('href') || '';
    var fileName = clean(link.getAttribute('data-track-download') || '', 120);
    var type = '';
    try {
      var url = new URL(href, window.location.href);
      var path = url.pathname.split('/').pop() || '';
      if (!fileName) fileName = decodeURIComponent(path);
      var match = path.match(/\.([a-z0-9]{2,8})$/i);
      type = match ? match[1].toLowerCase() : clean(link.getAttribute('data-file-type'), 20);
    } catch (error) {
      fileName = fileName || 'download';
    }
    return push('file_download', {
      file_name: clean(fileName, 120),
      file_type: clean(type, 20),
      link_location: linkLocation(link),
      page_path: pagePath(),
    });
  }

  function isDownloadLink(link) {
    if (link.hasAttribute('download') || link.hasAttribute('data-track-download')) return true;
    try {
      var url = new URL(link.getAttribute('href') || '', window.location.href);
      var match = (url.pathname || '').match(/\.([a-z0-9]{2,8})$/i);
      return Boolean(match && downloadableExtensions.indexOf(match[1].toLowerCase()) !== -1);
    } catch (error) {
      return false;
    }
  }

  function captureUtm() {
    var params = new URLSearchParams(window.location.search);
    var payload = {};
    var hasUtm = false;
    allowedUtmKeys.forEach(function (key) {
      var value = clean(params.get(key), 120);
      payload[key] = value;
      if (value) hasUtm = true;
    });
    if (!hasUtm) return;

    try {
      if (window.sessionStorage.getItem(utmSessionKey) === JSON.stringify(payload)) return;
      window.sessionStorage.setItem(utmSessionKey, JSON.stringify(payload));
    } catch (error) {
      // Fire once per page if session storage is unavailable.
    }

    push('utm_landing', {
      source: payload.utm_source,
      medium: payload.utm_medium,
      campaign: payload.utm_campaign,
      term: payload.utm_term,
      content: payload.utm_content,
    });
  }

  function loadGtm() {
    if (gtmLoaded) return;
    var containerId = clean(config.gtmContainerId, 32);
    if (!/^GTM-[A-Z0-9]+$/i.test(containerId)) return;
    gtmLoaded = true;
    window.dataLayer.push({
      'gtm.start': new Date().getTime(),
      event: 'gtm.js',
    });
    window.dataLayer.push({
      event: 'analytics_config',
      ga4_measurement_id: clean(config.ga4MeasurementId, 40),
      clarity_project_id: clean(config.clarityProjectId, 40),
      meta_pixel_id: clean(config.metaPixelId, 40),
      tiktok_pixel_id: clean(config.tiktokPixelId, 40),
    });
    var script = document.createElement('script');
    script.async = true;
    script.src = 'https://www.googletagmanager.com/gtm.js?id=' + encodeURIComponent(containerId);
    document.head.appendChild(script);
  }

  window.LanyardAnalytics = {
    push: push,
    trackWhatsApp: trackWhatsApp,
    trackFormSubmit: trackForm,
    trackDownload: trackDownload,
  };

  document.addEventListener('click', function (event) {
    var link = event.target.closest ? event.target.closest('a') : null;
    if (!link) return;
    if (isWhatsAppLink(link)) trackWhatsApp(link);
    if (link.hasAttribute('data-track-form')) trackForm(link.getAttribute('data-track-form'), 'submitted');
    if (isDownloadLink(link)) trackDownload(link);
  });

  document.addEventListener('submit', function (event) {
    var form = event.target;
    if (!form || !form.matches || !form.matches('[data-track-form], [data-fast-order-form], [data-quotation-form]')) return;
    var isFastCheckout = form.hasAttribute('data-fast-order-form');
    trackForm(form.getAttribute('data-track-form') || (isFastCheckout ? 'fast_checkout' : 'quotation_calculator'), 'submitted');
    if (isFastCheckout) {
      push('whatsapp_click', {
        link_location: 'fast_checkout',
        page_path: pagePath(),
        label: 'Pesan Sekarang',
      });
    }
  });

  var banner = document.querySelector('[data-analytics-consent]');
  if (!banner) return;

  function closeBanner() {
    banner.hidden = true;
    banner.setAttribute('aria-hidden', 'true');
  }

  function accept() {
    setConsent('accepted');
    document.documentElement.setAttribute('data-analytics-consent', 'accepted');
    closeBanner();
    window.dataLayer.push({ event: 'analytics_consent', consent: 'accepted' });
    loadGtm();
    captureUtm();
  }

  function reject() {
    setConsent('rejected');
    document.documentElement.setAttribute('data-analytics-consent', 'rejected');
    closeBanner();
  }

  var acceptButton = banner.querySelector('[data-analytics-accept]');
  var rejectButton = banner.querySelector('[data-analytics-reject]');
  if (acceptButton) acceptButton.addEventListener('click', accept);
  if (rejectButton) rejectButton.addEventListener('click', reject);

  var consent = getConsent();
  if (consent === 'accepted') {
    document.documentElement.setAttribute('data-analytics-consent', 'accepted');
    closeBanner();
    loadGtm();
    captureUtm();
  } else if (consent === 'rejected') {
    document.documentElement.setAttribute('data-analytics-consent', 'rejected');
    closeBanner();
  } else {
    banner.hidden = false;
    banner.setAttribute('aria-hidden', 'false');
  }
})();
