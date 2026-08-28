@php
  use App\Models\Post;

  $posts = \App\Support\HomePageCache::remember('home_posts', function () {
    return Post::with('category')
      ->where('published', true)
      ->orderBy('createdAt', 'desc')
      ->take(4)
      ->get();
  });

  $resolvePostImage = function ($post) {
    if (!empty($post->featuredImage)) {
      $rel = \App\Support\AssetUrl::relative($post->featuredImage);
      if ($rel && file_exists(public_path(ltrim(parse_url($rel, PHP_URL_PATH), '/')))) {
        return $rel;
      }
    }

    if (!empty($post->content) && preg_match('/<img[^>]+src=[\"\']([^\"\']+)[\"\']/', (string) $post->content, $m)) {
      $rel = \App\Support\AssetUrl::relative($m[1]);
      if ($rel && file_exists(public_path(ltrim(parse_url($rel, PHP_URL_PATH), '/')))) {
        return $rel;
      }
    }

    return '/uploads/hero-lanyard-palembang-gold-640w.webp';
  };

  $formatDate = function ($value): string {
    try {
      return \Carbon\Carbon::parse($value)->locale('id')->translatedFormat('d F Y');
    } catch (\Throwable) {
      return '';
    }
  };
@endphp

@if ($posts->isNotEmpty())
<section class="home-blog" id="blog" aria-labelledby="home-blog-title" data-blog-showcase>
  <div class="home-shell home-shell--wide">
    <header class="home-blog__header">
      <div class="home-blog__heading">
        <p>ARTIKEL TERBARU</p>
        <h2 id="home-blog-title">Panduan Seputar Lanyard</h2>
      </div>
      <a class="home-blog__all-link" href="{{ route('blog.index') }}">
        <span>Lihat Semua Artikel</span>
        <svg class="home-blog__all-arrow" viewBox="0 0 24 24" aria-hidden="true"><path d="M5 12h13m-6-6 6 6-6 6" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round"/></svg>
      </a>
    </header>

    <div class="home-blog__list" role="list">
      @foreach ($posts as $index => $post)
        @php
          $image = $resolvePostImage($post);
          $excerpt = trim(preg_replace('/\s+/', ' ', strip_tags((string) ($post->content ?? ''))));
          $number = str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT);
        @endphp
        <article class="home-blog__item" role="listitem" data-blog-item data-image="{{ $image }}" data-title="{{ $post->title }}">
          <a class="home-blog__item-link" href="/blog/{{ $post->slug }}">
            <span class="home-blog__item-num">{{ $number }}</span>
            <div class="home-blog__item-main">
              <h3 class="home-blog__item-title">{{ $post->title }}</h3>
              @if ($excerpt !== '')
                <p class="home-blog__item-excerpt">{{ \Illuminate\Support\Str::limit($excerpt, 120) }}</p>
              @endif
            </div>
            <div class="home-blog__item-meta">
              <time class="home-blog__item-date">{{ $formatDate($post->createdAt ?? $post->created_at ?? null) }}</time>
              <span class="home-blog__item-arrow" aria-hidden="true">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                  <line x1="7" y1="17" x2="17" y2="7"></line>
                  <polyline points="7 7 17 7 17 17"></polyline>
                </svg>
              </span>
            </div>
          </a>
        </article>
      @endforeach
    </div>

    {{-- Floating Cursor-Following Image Preview (Desktop Only) --}}
    <div class="home-blog__preview" data-blog-preview aria-hidden="true">
      <img class="home-blog__preview-img" data-blog-preview-img src="" alt="" loading="eager">
    </div>
  </div>
</section>
@endif
