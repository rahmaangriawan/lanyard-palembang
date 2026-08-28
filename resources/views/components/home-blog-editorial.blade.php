@php
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

$articles = \App\Support\HomePageCache::remember('home_posts', function () {
    return Post::with('category')
        ->where('published', true)
        ->orderByDesc('createdAt')
        ->take(3)
        ->get();
});
@endphp

<section id="artikel" class="home-blog-editorial" aria-labelledby="home-blog-editorial-title">
  <div class="home-shell home-shell--wide">
    <header class="home-blog-editorial__header">
      <p class="home-blog-editorial__eyebrow">ARTIKEL &amp; INSIGHT</p>
      <h2 id="home-blog-editorial-title" class="home-blog-editorial__title">
        Blog &amp; Insight
      </h2>
      <p class="home-blog-editorial__desc">
        Berbagai informasi, tips, dan inspirasi seputar lanyard, branding, event,
        dan kebutuhan identitas profesional.
      </p>
    </header>

    @if ($articles->isEmpty())
      <p class="home-blog-editorial__empty" role="status">Artikel terbaru sedang disiapkan.</p>
    @else
      <div class="home-blog-editorial__grid" aria-label="Artikel terbaru Lanyard Palembang">
        @foreach ($articles as $article)
          @php
            $rawFeatured = trim((string) ($article->featuredImage ?? ''));
            $featuredImage = $rawFeatured !== '' ? \App\Support\AssetUrl::relative($rawFeatured) : null;
            $storageKey = $featuredImage !== null && str_starts_with($featuredImage, '/storage/')
                ? substr($featuredImage, strlen('/storage/'))
                : null;
            $hasStorageImage = $storageKey !== null && Storage::disk('public')->exists($storageKey);

            if (! $hasStorageImage && $featuredImage !== null && ! str_starts_with($featuredImage, '/storage/')) {
                if (! file_exists(public_path(ltrim($featuredImage, '/')))) {
                    $featuredImage = null;
                }
            } elseif (! $hasStorageImage && $storageKey !== null) {
                $featuredImage = null;
            }

            if ($featuredImage === null) {
                $featuredImage = '/uploads/hero-lanyard-palembang-gold-640w.webp';
            }

            $categoryLabel = trim($article->category?->name ?? '');
            $displayCategory = $categoryLabel !== '' ? $categoryLabel : 'Artikel';

            $displayTitle = trim($article->title ?? '');

            $rawMeta = trim((string) ($article->metaDescription ?? ''));
            $plainContent = trim(preg_replace('/\s+/', ' ', strip_tags((string) $article->content)));
            $excerpt = Str::limit($rawMeta !== '' ? $rawMeta : $plainContent, 145);

            $displayDate = '';
            try {
                $displayDate = \Carbon\Carbon::parse($article->createdAt)->locale('id')->translatedFormat('d M Y');
            } catch (\Throwable $e) {
                $displayDate = '';
            }

            $srcset = \App\Support\ResponsiveImage::srcset($featuredImage);
          @endphp
          <article class="home-blog-editorial__card">
            <a href="{{ route('blog.show', ['slug' => $article->slug]) }}" class="home-blog-editorial__image-link" aria-label="Baca artikel: {{ $displayTitle }}">
              <div class="home-blog-editorial__image-wrap">
                <img
                  src="{{ $featuredImage }}"
                  @if ($srcset !== '') srcset="{{ $srcset }}" sizes="(min-width: 1024px) 360px, (min-width: 640px) 46vw, 92vw" @endif
                  alt="{{ $displayTitle }}"
                  width="640"
                  height="400"
                  loading="lazy"
                  decoding="async"
                  class="home-blog-editorial__img"
                >
              </div>
            </a>

            <div class="home-blog-editorial__body">
              <p class="home-blog-editorial__meta">
                <span class="home-blog-editorial__category">{{ mb_strtoupper($displayCategory, 'UTF-8') }}</span>
                @if ($displayDate !== '')
                  <span class="home-blog-editorial__dot" aria-hidden="true">·</span>
                  <time class="home-blog-editorial__date" datetime="{{ $article->createdAt }}">{{ $displayDate }}</time>
                @endif
              </p>

              <h3 class="home-blog-editorial__card-title">
                <a href="{{ route('blog.show', ['slug' => $article->slug]) }}">{{ $displayTitle }}</a>
              </h3>

              @if ($excerpt !== '')
                <p class="home-blog-editorial__excerpt">{{ $excerpt }}</p>
              @endif

              <a href="{{ route('blog.show', ['slug' => $article->slug]) }}" class="home-blog-editorial__cta" aria-label="Baca selengkapnya: {{ $displayTitle }}">
                <span>Baca Artikel</span>
                <svg class="home-blog-editorial__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
              </a>
            </div>
          </article>
        @endforeach
      </div>

      <div class="home-blog-editorial__footer">
        <a href="{{ route('blog.index') }}" class="home-blog-editorial__all" aria-label="Lihat semua artikel">
          <span>Lihat Semua Artikel</span>
          <svg class="home-blog-editorial__arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14"></path><path d="M12 5l7 7-7 7"></path></svg>
        </a>
      </div>
    @endif
  </div>
</section>
