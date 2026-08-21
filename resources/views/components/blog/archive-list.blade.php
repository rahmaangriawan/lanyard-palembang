@props([
  'posts',
  'emptyTitle' => 'Artikel tidak ditemukan',
  'emptyText' => 'Belum ada artikel yang tersedia untuk arsip ini.',
])

@if($posts->isEmpty())
  <div class="blog-archive-empty">
    <span class="blog-archive-empty__icon" aria-hidden="true">
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <circle cx="11" cy="11" r="8"/>
        <line x1="21" y1="21" x2="16.65" y2="16.65"/>
        <line x1="8" y1="11" x2="14" y2="11"/>
      </svg>
    </span>
    <h2>{{ $emptyTitle }}</h2>
    <p>{{ $emptyText }}</p>
    <a href="{{ route('blog.index') }}">
      <span>Lihat Semua Artikel</span>
      <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" width="16" height="16" aria-hidden="true">
        <line x1="5" y1="12" x2="19" y2="12"/>
        <polyline points="12 5 19 12 12 19"/>
      </svg>
    </a>
  </div>
@else
  <ol class="blog-archive-list">
    @foreach($posts as $post)
      <li><x-blog.archive-card :post="$post" /></li>
    @endforeach
  </ol>
  <x-blog.archive-pagination :posts="$posts" />
@endif
