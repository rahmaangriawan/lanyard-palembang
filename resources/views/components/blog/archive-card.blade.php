@props([
  'post',
  'variant' => 'default',
])

@php
  use App\Support\AssetUrl;
  use App\Support\ResponsiveImage;
  use Illuminate\Support\Str;

  $postImage = AssetUrl::relative($post->featuredImage);
  $postSrcset = ResponsiveImage::srcset($postImage);
  $plainContent = trim(preg_replace('/\s+/', ' ', strip_tags((string) $post->content)));
  $excerpt = $post->metaDescription ?: Str::limit($plainContent, 145);
  $wordCount = $plainContent === '' ? 0 : count(preg_split('/\s+/', $plainContent));
  $readingTime = max(1, (int) ceil($wordCount / 200));
  $authorName = $post->author?->name ?: 'Tim Lanyard Palembang';
  $authorSlug = $post->author?->slug;
  $postUrl = route('blog.show', ['slug' => $post->slug]);
@endphp

<article class="blog-archive-card blog-archive-card--{{ $variant }}">
  <a class="blog-archive-card__media" href="{{ $postUrl }}" aria-label="Baca {{ $post->title }}">
    @if($postImage)
      <img
        src="{{ $postImage }}"
        @if($postSrcset) srcset="{{ $postSrcset }}" sizes="(min-width: 1024px) 380px, (min-width: 700px) 50vw, 100vw" @endif
        alt="{{ $post->title }}"
        width="640"
        height="400"
        loading="lazy"
        decoding="async"
      >
    @else
      <span class="blog-archive-card__fallback" aria-hidden="true">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
          <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
          <polyline points="14 2 14 8 20 8"/>
          <line x1="16" y1="13" x2="8" y2="13"/>
          <line x1="16" y1="17" x2="8" y2="17"/>
          <polyline points="10 9 9 9 8 9"/>
        </svg>
      </span>
    @endif
  </a>

  <div class="blog-archive-card__content">
    <div class="blog-archive-card__meta">
      <time datetime="{{ \Carbon\Carbon::parse($post->createdAt)->toDateString() }}">
        {{ \Carbon\Carbon::parse($post->createdAt)->translatedFormat('j M Y') }}
      </time>
      <span aria-hidden="true">&bull;</span>
      <span>{{ $readingTime }} mnt baca</span>
    </div>
    <h3><a href="{{ $postUrl }}">{{ $post->title }}</a></h3>
    <p>{{ $excerpt ?: 'Baca panduan dan wawasan terbaru seputar lanyard custom dari Lanyard Palembang.' }}</p>
    <div class="blog-archive-card__footer">
      @if($authorSlug)
        <a class="blog-archive-card__author" href="{{ route('blog.author', ['slug' => $authorSlug]) }}">{{ $authorName }}</a>
      @else
        <span class="blog-archive-card__author">{{ $authorName }}</span>
      @endif
      <a class="blog-archive-card__link" href="{{ $postUrl }}" aria-label="Baca artikel {{ $post->title }}">
        <span>Baca</span>
        <span class="blog-archive-card__arrow" aria-hidden="true">&rarr;</span>
      </a>
    </div>
  </div>
</article>
