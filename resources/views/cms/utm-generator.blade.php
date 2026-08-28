@extends('layouts.meridian')

@section('title', 'UTM Generator')

@section('content')
  <header class="page__header">
    <div>
      <p class="eyebrow">SEO TOOLS</p>
      <h1 class="page__title">UTM Generator</h1>
      <p class="page__description">Buat link kampanye yang terukur tanpa menyimpan riwayat URL.</p>
    </div>
  </header>

  <div class="page__body utm-generator">
    <section class="card" aria-labelledby="utm-generator-title">
      <div class="card__header">
        <div>
          <h2 class="card__title" id="utm-generator-title">Parameter kampanye</h2>
          <p class="card__subtitle">Gunakan URL relatif seperti <code>/produk</code> atau domain resmi Lanyard Palembang.</p>
        </div>
      </div>
      <div class="card__body">
        <form method="post" action="{{ route('cms.utm-generator.generate') }}" class="utm-generator__form">
          @csrf

          <label class="field">
            <span class="field__label">Base URL</span>
            <input class="input" type="text" name="base_url" value="{{ old('base_url', $form['base_url'] ?? '/produk') }}" placeholder="/produk" required autocomplete="url">
            @error('base_url')<small class="field__error">{{ $message }}</small>@enderror
          </label>

          <div class="utm-generator__grid">
            <label class="field">
              <span class="field__label">Campaign source</span>
              <input class="input" type="text" name="campaign_source" value="{{ old('campaign_source', $form['campaign_source'] ?? '') }}" placeholder="instagram" required>
              @error('campaign_source')<small class="field__error">{{ $message }}</small>@enderror
            </label>
            <label class="field">
              <span class="field__label">Campaign medium</span>
              <input class="input" type="text" name="campaign_medium" value="{{ old('campaign_medium', $form['campaign_medium'] ?? '') }}" placeholder="social" required>
              @error('campaign_medium')<small class="field__error">{{ $message }}</small>@enderror
            </label>
            <label class="field">
              <span class="field__label">Campaign name</span>
              <input class="input" type="text" name="campaign_name" value="{{ old('campaign_name', $form['campaign_name'] ?? '') }}" placeholder="promo-agustus" required>
              @error('campaign_name')<small class="field__error">{{ $message }}</small>@enderror
            </label>
            <label class="field">
              <span class="field__label">Campaign term <small>(opsional)</small></span>
              <input class="input" type="text" name="campaign_term" value="{{ old('campaign_term', $form['campaign_term'] ?? '') }}" placeholder="lanyard custom">
              @error('campaign_term')<small class="field__error">{{ $message }}</small>@enderror
            </label>
            <label class="field utm-generator__field--wide">
              <span class="field__label">Campaign content <small>(opsional)</small></span>
              <input class="input" type="text" name="campaign_content" value="{{ old('campaign_content', $form['campaign_content'] ?? '') }}" placeholder="cta-header">
              @error('campaign_content')<small class="field__error">{{ $message }}</small>@enderror
            </label>
          </div>

          <div class="utm-generator__actions">
            <button class="button button--primary" type="submit">Buat link</button>
            <span class="utm-generator__hint">Parameter UTM lama pada URL akan diganti secara aman.</span>
          </div>
        </form>
      </div>
    </section>

    @if ($generatedUrl)
      <section class="card utm-generator__result" aria-labelledby="utm-result-title">
        <div class="card__header">
          <div>
            <h2 class="card__title" id="utm-result-title">Link siap digunakan</h2>
            <p class="card__subtitle">Salin link ini untuk kebutuhan kampanye Anda.</p>
          </div>
        </div>
        <div class="card__body">
          <div class="utm-generator__result-row">
            <input class="input" id="utm-result" type="text" value="{{ $generatedUrl }}" readonly aria-label="Link UTM hasil generate">
            <button class="button button--secondary" type="button" data-copy-utm="utm-result">Salin link</button>
          </div>
          <p class="utm-generator__copy-status" data-copy-utm-status role="status" aria-live="polite"></p>
        </div>
      </section>
    @endif
  </div>
@endsection

@push('head')
  <style>
    .utm-generator__form { display: grid; gap: 1.25rem; }
    .utm-generator__grid { display: grid; grid-template-columns: repeat(2, minmax(0, 1fr)); gap: 1rem; }
    .utm-generator__field--wide { grid-column: 1 / -1; }
    .utm-generator__actions, .utm-generator__result-row { display: flex; align-items: center; gap: .75rem; flex-wrap: wrap; }
    .utm-generator__hint, .utm-generator__copy-status { color: var(--color-muted-foreground); font-size: .8rem; }
    .utm-generator__result-row .input { flex: 1 1 28rem; min-width: 0; }
    .field__error { color: var(--color-danger-emphasis, #b42318); }
    @media (max-width: 680px) { .utm-generator__grid { grid-template-columns: 1fr; } .utm-generator__field--wide { grid-column: auto; } }
  </style>
@endpush

@push('scripts')
  <script>
    (function () {
      var button = document.querySelector('[data-copy-utm]');
      var status = document.querySelector('[data-copy-utm-status]');
      if (!button || !status) return;
      button.addEventListener('click', function () {
        var input = document.getElementById(button.getAttribute('data-copy-utm'));
        if (!input) return;
        var done = function () { status.textContent = 'Link berhasil disalin.'; };
        if (navigator.clipboard && window.isSecureContext) {
          navigator.clipboard.writeText(input.value).then(done).catch(function () { input.select(); document.execCommand('copy'); done(); });
          return;
        }
        input.select();
        document.execCommand('copy');
        done();
      });
    })();
  </script>
@endpush
