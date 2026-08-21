@extends('layouts.public')

@php
  use App\Support\AssetUrl;
  use App\Support\AuthorProfile;
  use App\Support\AutoLinkSeo;
  use App\Support\BlogContent;
  use App\Support\ResponsiveImage;
  use Illuminate\Support\Str;

  $imageUrl = fn ($source) => AssetUrl::relative($source);
  $cleanContent = BlogContent::render($post->content ?? '');
  $cleanContent = preg_replace('/<div[^>]*>\s*<p[^>]*>\s*Bagikan artikel\s*<\/p>[\s\S]*?<button[^>]*>[\s\S]*?<\/button>\s*<\/div>\s*<\/div>/i', '', $cleanContent);
  $processedContent = AutoLinkSeo::apply($cleanContent);
  $plainContent = trim(preg_replace('/\s+/u', ' ', strip_tags($cleanContent)));
  $wordCount = $plainContent === '' ? 0 : count(preg_split('/\s+/u', $plainContent));
  $readingTime = max(1, (int) ceil($wordCount / 200));

  $toc = [];
  $tocHtml = '';
  $tocDesktopHtml = '';
  preg_match_all('/<h([2-6])([^>]*)>(.*?)<\/h\1>/is', $processedContent, $headingMatches, PREG_SET_ORDER);

  if (count($headingMatches) >= 2) {
    $usedSlugs = [];
    $processedContent = preg_replace_callback('/<h([2-6])([^>]*)>(.*?)<\/h\1>/is', function ($match) use (&$toc, &$usedSlugs) {
      $level = (int) $match[1];
      $attributes = $match[2];
      $text = trim(html_entity_decode(strip_tags($match[3]), ENT_QUOTES | ENT_HTML5, 'UTF-8'));
      if ($text === '') return $match[0];

      preg_match('/\sid=["\']([^"\']+)["\']/i', $attributes, $idMatch);
      $baseSlug = Str::slug($idMatch[1] ?? $text) ?: 'bagian-'.(count($toc) + 1);
      $slug = $baseSlug;
      $counter = 2;
      while (in_array($slug, $usedSlugs, true)) $slug = $baseSlug.'-'.$counter++;
      $usedSlugs[] = $slug;
      $attributes = preg_replace('/\s+id=["\'][^"\']*["\']/i', '', $attributes);
      $toc[] = ['level' => $level, 'text' => $text, 'slug' => $slug];

      return '<h'.$level.' id="'.e($slug).'"'.$attributes.'>'.$match[3].'</h'.$level.'>';
    }, $processedContent);

    $tocItemsHtml = '';
    foreach ($toc as $item) {
      $tocItemsHtml .= '<li class="toc-level-'.$item['level'].'"><a href="#'.e($item['slug']).'">'.e($item['text']).'</a></li>';
    }

    $tocDesktopHtml = '<details class="article-toc article-toc--desktop">';
    $tocDesktopHtml .= '<summary><span>Rangkuman</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="16" height="16" aria-hidden="true" class="article-toc__chevron"><polyline points="6 9 12 15 18 9"/></svg></summary>';
    $tocDesktopHtml .= '<nav aria-label="Rangkuman artikel"><ol>'.$tocItemsHtml.'</ol></nav></details>';

    $tocHtml = '<details class="article-toc article-toc--mobile">';
    $tocHtml .= '<summary><span>Rangkuman</span><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" width="18" height="18" aria-hidden="true" class="article-toc__chevron"><polyline points="6 9 12 15 18 9"/></svg></summary>';
    $tocHtml .= '<nav aria-label="Rangkuman artikel"><ol>'.$tocItemsHtml.'</ol></nav></details>';
  }

  $featuredImage = $imageUrl($post->featuredImage);
  $featuredSrcset = ResponsiveImage::srcset($featuredImage);
  $rawTags = (string) ($post->tags ?? '');
  $parsedTags = collect(explode(',', $rawTags))->map(fn ($tag) => trim($tag))->filter()->unique();

  $authorName = $post->author?->name ?: 'Tim Lanyard Medan';
  $authorAvatar = $imageUrl($post->author?->avatar);
  $authorBio = $post->author ? $post->author->bio : AuthorProfile::DEFAULT_BIO;
  $authorSlug = $post->author?->slug ?: Str::slug($authorName);
  $blogShowCssPath = public_path('css/blog-show.css');
  $blogShowCssVersion = file_exists($blogShowCssPath) ? filemtime($blogShowCssPath) : 1;
@endphp

@section('title', $post->metaTitle ?: $post->title . ' | Lanyard Medan')
@section('meta_description', $post->metaDescription)
@section('seo_type', 'article')
@section('seo_canonical', route('blog.show', ['slug' => $post->slug]))
@section('seo_og_image', route('blog.og-image', ['slug' => $post->slug]))
@section('seo_published_time', optional($post->createdAt)->toAtomString())
@section('seo_modified_time', optional($post->updatedAt)->toAtomString())

@push('head')
  <link rel="stylesheet" href="/css/blog-show.css?v={{ $blogShowCssVersion }}">
@endpush
@push('schema')
  @include('components.schema.blog-post')
@endpush

@section('content')
<article class="blog-detail-page">
  {{-- 1. ARTICLE 2-COLUMN HERO --}}
  <header class="article-header">
    <div class="article-shell-container">
      <div class="article-hero-2col">
        {{-- Kolom Kiri: Copy, Breadcrumb & Meta --}}
        <div class="article-hero-2col__copy">
          <nav class="article-breadcrumb" aria-label="Breadcrumb">
            <a href="{{ route('home') }}">Beranda</a>
            <span class="article-breadcrumb__sep" aria-hidden="true">/</span>
            <a href="{{ route('blog.index') }}">Blog</a>
            <span class="article-breadcrumb__sep" aria-hidden="true">/</span>
            @if($post->category)
              <a href="/kategori/{{ $post->category->slug }}">{{ $post->category->name }}</a>
              <span class="article-breadcrumb__sep" aria-hidden="true">/</span>
            @endif
            <span class="article-breadcrumb__current" aria-current="page">Panduan</span>
          </nav>

          <div class="article-eyebrow-wrap">
            <span class="article-eyebrow-sparkle" aria-hidden="true">
              <svg viewBox="0 0 24 24" fill="currentColor">
                <path d="M12 2L14.4 9.6L22 12L14.4 14.4L12 22L9.6 14.4L2 12L9.6 9.6L12 2Z"/>
              </svg>
            </span>
            <span class="article-eyebrow-label">{{ $post->category->name ?? 'Wawasan Lanyard' }}</span>
          </div>

          <h1>{{ $post->title }}</h1>

          <div class="article-meta-bar">
            <div class="article-meta-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
              </svg>
              <span>{{ $authorName }}</span>
            </div>
            <span class="article-meta-dot" aria-hidden="true">&bull;</span>
            <div class="article-meta-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <rect x="3" y="4" width="18" height="18" rx="2" ry="2"/>
                <line x1="16" y1="2" x2="16" y2="6"/>
                <line x1="8" y1="2" x2="8" y2="6"/>
                <line x1="3" y1="10" x2="21" y2="10"/>
              </svg>
              <time datetime="{{ \Carbon\Carbon::parse($post->createdAt)->toDateString() }}">
                {{ \Carbon\Carbon::parse($post->createdAt)->translatedFormat('j F Y') }}
              </time>
            </div>
            <span class="article-meta-dot" aria-hidden="true">&bull;</span>
            <div class="article-meta-item">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                <circle cx="12" cy="12" r="10"/>
                <polyline points="12 6 12 12 16 14"/>
              </svg>
              <span>{{ $readingTime }} menit baca</span>
            </div>
          </div>
        </div>

        {{-- Kolom Kanan: Featured Image --}}
        @if($featuredImage)
          <div class="article-hero-2col__media">
            <figure class="article-featured-media">
              <img
                src="{{ $featuredImage }}"
                @if($featuredSrcset) srcset="{{ $featuredSrcset }}" sizes="(max-width: 900px) 100vw, 560px" @endif
                alt="{{ $post->title }}"
                width="1200"
                height="800"
                fetchpriority="high"
                decoding="async"
              >
            </figure>
          </div>
        @endif
      </div>
    </div>
  </header>

  {{-- 2. MAIN CONTENT 2-COLUMN LAYOUT (70:30) --}}
  <div class="article-main-layout">
    <div class="article-shell-container">
      <div class="article-grid-container" id="article-grid">
        {{-- Kolom Utama: Isi Konten Artikel --}}
        <div class="article-main-column">
          @if($tocHtml !== '')
            {!! $tocHtml !!}
          @endif

          <div class="article-content">
            {!! $processedContent !!}
          </div>

          {{-- Share Widget ditaruh di bawah artikel --}}
          <div class="article-share-container">
            @include('components.article-share', ['class' => 'article-share--bottom'])
          </div>

          @if($parsedTags->isNotEmpty())
            <nav class="article-tags" aria-label="Tag artikel">
              <span>Topik Terkait:</span>
              <div>
                @foreach($parsedTags as $tag)
                  <a href="/tag/{{ Str::slug($tag) }}">#{{ $tag }}</a>
                @endforeach
              </div>
            </nav>
          @endif

          {{-- Comments Section --}}
          <section class="article-comments" id="comments" aria-labelledby="comments-title">
            <div class="article-section-heading">
              <p>Ruang Diskusi</p>
              <h2 id="comments-title">{{ $comments->count() }} Komentar &amp; Tanggapan</h2>
            </div>

            @if(session('comment_sent'))
              <div class="comment-notice" role="status" style="background: #f0fdf4; border: 1px solid #bbf7d0; color: #166534; padding: 14px 18px; border-radius: 12px; margin-bottom: 20px; font-weight: 700; font-size: 14px;">
                {{ session('comment_sent') }}
              </div>
            @endif

            <form class="comment-form" action="{{ route('blog.comment', ['slug' => $post->slug]) }}" method="POST">
              @csrf
              <input class="comment-form__honeypot" type="text" name="website" tabindex="-1" autocomplete="off" aria-hidden="true" style="display:none;">
              <h3>Tinggalkan Komentar Anda</h3>

              <div class="comment-form__row">
                <div>
                  <label for="name">Nama Lengkap</label>
                  <input id="name" type="text" name="name" required maxlength="100" value="{{ old('name') }}" autocomplete="name" placeholder="Nama Anda">
                  @error('name')<p class="field-error" style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>@enderror
                </div>
                <div>
                  <label for="email">Alamat Email</label>
                  <input id="email" type="email" name="email" required maxlength="190" value="{{ old('email') }}" autocomplete="email" placeholder="nama@email.com">
                  @error('email')<p class="field-error" style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>@enderror
                </div>
              </div>

              <div>
                <label for="content">Isi Komentar</label>
                <textarea id="content" name="content" rows="4" required maxlength="2000" placeholder="Tuliskan tanggapan atau pertanyaan seputar materi lanyard ini...">{{ old('content') }}</textarea>
                @error('content')<p class="field-error" style="color: #dc2626; font-size: 12px; margin-top: 4px;">{{ $message }}</p>@enderror
              </div>

              <div class="comment-form__footer">
                <p>Komentar akan ditinjau moderator sebelum diterbitkan.</p>
                <button type="submit">
                  <span>Kirim Komentar</span>
                </button>
              </div>
            </form>

            @if($comments->isEmpty())
              <div class="comments-empty" style="text-align: center; padding: 32px 20px; background: #fafafa; border: 1px solid #e8e8e8; border-radius: 16px; color: #64748b;">
                <p style="margin: 0 0 4px; font-weight: 800; color: #0f172a;">Belum ada komentar.</p>
                <span style="font-size: 13.5px;">Jadilah yang pertama membagikan pendapat atau pertanyaan Anda seputar topik ini.</span>
              </div>
            @else
              <div class="comments-list">
                @foreach($comments as $comment)
                  <article class="comment-item">
                    <span class="comment-avatar" aria-hidden="true">{{ strtoupper(mb_substr($comment->name, 0, 1)) }}</span>
                    <div>
                      <header>
                        <strong>{{ $comment->name }}</strong>
                        <time datetime="{{ $comment->createdAt->toDateString() }}">{{ $comment->createdAt->translatedFormat('j F Y') }}</time>
                      </header>
                      <p>{{ $comment->content }}</p>
                    </div>
                  </article>
                @endforeach
              </div>
            @endif
          </section>
        </div>

        {{-- Kolom Samping (Sidebar 30%): Author Bio + Native Sticky Stack (Related Posts & CTA) --}}
        <aside class="article-sidebar" id="article-sidebar" aria-label="Navigasi dan informasi artikel">
          @if($tocHtml !== '')
            {!! $tocDesktopHtml !!}
          @endif

          {{-- Sidebar Author Card --}}
          <section class="article-sidebar-card article-author-sidebar" id="sidebar-author" aria-labelledby="article-author-sidebar-title">
            <div class="article-author-sidebar__header">
              <a href="/blog/penulis/{{ $authorSlug }}" aria-label="Lihat artikel oleh {{ $authorName }}">
                @if($authorAvatar)
                  <img src="{{ $authorAvatar }}" alt="{{ $authorName }}" width="56" height="56" loading="lazy" decoding="async">
                @else
                  <span aria-hidden="true">{{ strtoupper(mb_substr($authorName, 0, 1)) }}</span>
                @endif
              </a>
              <div>
                <p class="article-author-sidebar__label">Penulis</p>
                <h3 id="article-author-sidebar-title"><a href="/blog/penulis/{{ $authorSlug }}">{{ $authorName }}</a></h3>
              </div>
            </div>
            @if($authorBio)<p class="article-author-sidebar__bio">{{ $authorBio }}</p>@endif
          </section>

          {{-- STICKY WRAPPER: Hanya Artikel Pilihan & Consultation CTA --}}
          <div class="article-sidebar__sticky-group" id="sidebar-sticky-group">
            @if($relatedPosts->isNotEmpty())
              <section class="article-sidebar-card article-sidebar-related" aria-labelledby="sidebar-related-title">
                <h3 id="sidebar-related-title" class="article-sidebar-related__title">Artikel Pilihan</h3>
                <ul class="article-sidebar-related__list">
                  @foreach($relatedPosts->take(3) as $related)
                    @php
                      $relImage = $imageUrl($related->featuredImage);
                      $relUrl = route('blog.show', ['slug' => $related->slug]);
                    @endphp
                    <li>
                      <a href="{{ $relUrl }}" class="article-sidebar-related__item" aria-label="Baca {{ $related->title }}">
                        <div class="article-sidebar-related__thumb">
                          @if($relImage)
                            <img src="{{ $relImage }}" alt="{{ $related->title }}" width="72" height="54" loading="lazy" decoding="async">
                          @else
                            <div style="display:flex;align-items:center;justify-content:center;height:100%;background:#f1f5f9;color:#94a3b8;font-size:12px;">No Image</div>
                          @endif
                        </div>
                        <div class="article-sidebar-related__body">
                          <time datetime="{{ \Carbon\Carbon::parse($related->createdAt)->toDateString() }}">
                            {{ \Carbon\Carbon::parse($related->createdAt)->translatedFormat('j M Y') }}
                          </time>
                          <h4>{{ $related->title }}</h4>
                        </div>
                      </a>
                    </li>
                  @endforeach
                </ul>
              </section>
            @endif

            {{-- Sidebar Consultation Widget --}}
            <div class="article-sidebar-cta">
              <h4>Butuh Lanyard Custom?</h4>
              <p>Konsultasikan logo, bahan, dan estimasi biaya secara gratis bersama tim kami.</p>
              <a href="https://wa.me/6282210200700?text={{ rawurlencode('Halo Lanyard Medan, saya membaca artikel ' . $post->title . ' dan ingin konsultasi pesanan.') }}" target="_blank" rel="noopener noreferrer" class="article-sidebar-cta__btn">
                <span>Chat via WhatsApp</span>
                <span aria-hidden="true">&rarr;</span>
              </a>
            </div>
          </div>
        </aside>
      </div>
    </div>
  </div>
</article>

@include('components.footer')
@endsection
