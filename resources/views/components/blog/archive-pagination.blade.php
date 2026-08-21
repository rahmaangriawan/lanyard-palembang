@props(['posts'])

@if($posts->hasPages())
  <nav class="blog-archive-pagination" aria-label="Navigasi halaman artikel">
    <div>
      @if($posts->onFirstPage())
        <span class="blog-archive-pagination__link is-disabled" aria-disabled="true">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
            <line x1="19" y1="12" x2="5" y2="12"/>
            <polyline points="12 19 5 12 12 5"/>
          </svg>
          <span>Sebelumnya</span>
        </span>
      @else
        <a class="blog-archive-pagination__link" href="{{ $posts->previousPageUrl() }}" rel="prev">
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
            <line x1="19" y1="12" x2="5" y2="12"/>
            <polyline points="12 19 5 12 12 5"/>
          </svg>
          <span>Sebelumnya</span>
        </a>
      @endif
    </div>

    <p>Halaman <strong>{{ $posts->currentPage() }}</strong> dari {{ $posts->lastPage() }}</p>

    <div>
      @if($posts->hasMorePages())
        <a class="blog-archive-pagination__link" href="{{ $posts->nextPageUrl() }}" rel="next">
          <span>Berikutnya</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
            <line x1="5" y1="12" x2="19" y2="12"/>
            <polyline points="12 5 19 12 12 19"/>
          </svg>
        </a>
      @else
        <span class="blog-archive-pagination__link is-disabled" aria-disabled="true">
          <span>Berikutnya</span>
          <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
            <line x1="5" y1="12" x2="19" y2="12"/>
            <polyline points="12 5 19 12 12 19"/>
          </svg>
        </span>
      @endif
    </div>
  </nav>
@endif
