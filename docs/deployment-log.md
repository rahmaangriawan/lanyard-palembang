# Deployment Log & System Documentation — Lanyard Medan

**Project:** lanyardmedan.com
**Repository:** https://github.com/rahmaangriawan/lanyard-medan
**Branch:** `prod-ready`
**Last Updated:** 2026-08-22

---

## 1. System Architecture

### Tech Stack
| Component | Technology | Version |
|---|---|---|
| Framework | Laravel | 13.x |
| PHP | PHP (cPanel) | 8.3+ |
| Database | MySQL (cPanel) | 8.0 |
| Frontend CMS | Inertia.js + Vue 3 | 2.x / 3.4 |
| CSS Build | LightningCSS + Tailwind | - |
| JS Build | esbuild (target: es2019) | - |
| CDN/Proxy | Cloudflare | - |
| Web Server | LiteSpeed (cPanel) | - |
| Deployment | GitHub Actions → FTPS | - |

### Server Paths (cPanel)
```
Application Root:    /home/lanyardb/lanyardmedan.com
Document Root:       /home/lanyardb/lanyardmedan.com/public
Storage Symlink:     public/storage → storage/app/public
Laravel Log:         storage/logs/laravel.log
```

### Database
```
Connection:  MySQL
Host:        localhost (cPanel)
Database:    lanyardb_medanlanyard
User:        (set via cPanel MySQL Databases)
```

---

## 2. Deployment Pipeline

### GitHub Actions Workflow
**File:** `.github/workflows/deploy-ftps.yml`
**Trigger:** Push to `prod-ready` branch OR manual `workflow_dispatch`

**Steps:**
1. Checkout `prod-ready` branch
2. Setup PHP 8.3 (extensions: dom, fileinfo, gd, mbstring, pdo_mysql, zip)
3. `composer install --no-dev --prefer-dist --optimize-autoloader`
4. Setup Node.js 22
5. `npm ci && npm run build` (generates `public/build/` + `public/build/public/`)
6. Prepare release package (excludes: `.env`, `node_modules/`, `tests/`, `storage/`, `bootstrap/cache/`, `public/uploads/`, `database/*.sql`)
7. Upload via explicit FTPS (lftp, `--parallel=12`, timeout 120 min)
8. Upload blog thumbnails to `storage/app/public/uploads/blog-import/`

### Required GitHub Secrets
| Secret | Description |
|---|---|
| `FTP_HOST` | `ftp.lanyardbagus.com` |
| `FTP_USERNAME` | cPanel FTP username |
| `FTP_PASSWORD` | cPanel FTP password |

### FTP Configuration Notes
- **FTP Remote Root:** Empty (FTP home = `/home/lanyardb/lanyardmedan.com`)
- **FTPS Certificate:** Invalid cert bypass enabled (`ssl:verify-certificate false`) until AutoSSL issues a valid cert
- **Parallel Uploads:** 12 connections

---

## 3. Post-Deployment Manual Steps (cPanel)

After code deployment succeeds:

```bash
cd /home/lanyardb/lanyardmedan.com

# 1. Create runtime directories (if missing)
mkdir -p bootstrap/cache
mkdir -p storage/framework/cache/data
mkdir -p storage/framework/sessions
mkdir -p storage/framework/views
mkdir -p storage/logs
mkdir -p storage/app/public

# 2. Set permissions
chmod -R 775 storage bootstrap/cache

# 3. Clear and rebuild caches
php artisan optimize:clear
php artisan config:clear

# 4. Run database migrations
php artisan migrate --force

# 5. Create storage symlink
php artisan storage:link --force

# 6. Import initial content (only on first deploy)
php artisan content:import-initial --force

# 7. Optimize
php artisan optimize
```

### Cron Job (cPanel → Cron Jobs)
```cron
* * * * * cd /home/lanyardb/lanyardmedan.com && php artisan schedule:run >> /dev/null 2>&1
```

### Cloudflare SSL
- Mode: **Full** (not strict) until AutoSSL cert is valid for `lanyardmedan.com`
- After AutoSSL succeeds: switch to **Full (strict)**

---

## 4. Database Index Summary

### Migration: `2026_08_21_000001_optimize_public_query_indexes.php`

**Indexes Added:**
| Table | Index | Purpose |
|---|---|---|
| `post` | `(authorId, published, createdAt)` | Author archive pages |
| `post` | `(published, updatedAt)` | Sitemap lastmod |
| `product` | `(published, updatedAt)` | Sitemap lastmod |
| `product` | `(published, sortOrder ASC, createdAt DESC)` | Mixed-direction catalog sort |
| `citypage` | `(published, updatedAt)` | Sitemap lastmod |
| `citypage` | `(published, title)` | Area page alphabetical |
| `media` | `(createdAt)` | Media library default sort |
| `media` | `(filename)` | Media filename search |
| `testimonial` | `(name)` | Homepage testimonial lookup |
| `user` | `(role)` | Role-based queries |
| `post` | FULLTEXT `(title, content, metaDescription)` | Blog search |
| `product` | FULLTEXT `(name, sku, shortDescription, specs, accessories, description)` | Product search |

**Redundant Indexes Dropped:**
- `product(slug)`, `product(sku)`, `product(published)`, `product(categoryId)` — left-prefix duplicates
- `post(slug)`, `post(published)`, `post(categoryId)` — left-prefix duplicates
- `category(slug)`, `category(type)` — left-prefix duplicates

### Query Optimizations Applied
1. **Blog search** (`routes/web.php`): `LIKE '%term%'` → `MATCH...AGAINST` (MySQL) with LIKE fallback (SQLite/tests)
2. **Tag pages** (`routes/web.php`): Full-table collection load → SQL `FIND_IN_SET` + server-side pagination

---

## 5. Cross-Browser Compatibility Status

### Audit Results (Chrome 100+, Safari 15+, Firefox 100+, Android Chrome 100+)

| Status | Count | Summary |
|---|---|---|
| ✅ OK | 25+ items | JS syntax (ES2019 transpiled), CSS Grid/Flexbox, `aspect-ratio`, `clamp()`, `position: sticky`, responsive images, inline SVGs |
| ⚠️ WARNING | 10 items | Safari 15.0–15.3 edge cases (see below) |
| ❌ CRITICAL | 0 | None |

### Key Warnings (all Safari 15.0–15.3 / Firefox < 121)
- **W-1**: `:has()` selector for mobile menu backdrop → fallback needed
- **W-6**: `100dvh` without `100vh` fallback in `header.css` and `homepage.css`
- **W-7**: `overflow-x: clip` without `overflow-x: hidden` fallback (8 files)
- **W-2**: `backdrop-filter` without `-webkit-` prefix (Safari ≤17)
- **W-3**: `user-select` without `-webkit-` prefix (8 files)

### Build Fix Recommendation
Add browser targets to `scripts/build-public-assets.mjs`:
```js
transformCss({ filename, code, minify: true, targets: { chrome: 100, safari: 15, firefox: 100 } })
```

---

## 6. E2E Test Results (2026-08-22)

### Test: Article Search → Product → WhatsApp Order Flow

| Test Point | Result | Notes |
|---|---|---|
| Homepage loads (`/`) | ✅ PASS | HTTP 200, all sections render, hero/product/testimonial/blog/CTA visible |
| Blog archive loads (`/blog`) | ✅ PASS | 4 articles, search panel, counter badge |
| Blog search "lanyard" | ✅ PASS | 4 results shown, "Hapus pencarian" link visible |
| Blog article detail (`/blog/panjang-lanyard-ideal-medan`) | ✅ PASS | Full article, sidebar, share buttons, comment form |
| Product catalog (`/produk`) | ✅ PASS | 9 products on page 1, category filter pills, pagination link |
| Product detail (`/produk/tali-lanyard-custom-ring-o-jahit-stopper-punggung-15-cm`) | ✅ PASS | Breadcrumb, price panel, specs, 4-step workflow, related products |
| WA order link (product detail) | ✅ PASS | Correct prefilled text with product name, SKU, price fields |
| Floating WA link | ✅ PASS | Present on all pages, correct consultation text |
| Mobile viewport (375x812) | ✅ PASS | All key elements present in DOM, responsive layout confirmed |
| Footer navigation | ✅ PASS | All links resolve, Blog link present under "Jelajahi" |

### Console Errors Found
- **Fixed**: SVG `<polygon>` malformed points attribute (truck icon, 7 files) — corrected `16 8` → `16 8 16 8` pair
- **Warning (non-blocking)**: Hero image preload `imagesrcset` not used on some viewports (Safari/Firefox)

---

## 7. Security Audit Summary (2026-08-21)

| Area | Status |
|---|---|
| SQL Injection | ✅ PASS (parameter binding + LIKE escaping) |
| XSS & Output Escaping | ✅ PASS (HtmlSanitizer + JSON hex encoding) |
| CSRF Protection | ✅ PASS (middleware + @csrf on all forms) |
| Rate Limiting | ✅ PASS (multi-layer + Turnstile fail-closed) |
| RBAC (Admin vs Writer) | ✅ PASS (ownership scoping) |
| File Upload Safety | ✅ PASS (MIME validation + WebP re-encode + UUID) |
| Security Headers | ✅ PASS (CSP, HSTS, X-Frame-Options, nosniff) |
| Secrets at Rest | ✅ PASS (SecureSettings AES encryption) |

---

## 8. File Structure Reference

```
lanyard-medan/
├── app/
│   ├── Console/Commands/     # ImportLanyard*Blog, ImportInitialContent, etc.
│   ├── Http/Controllers/
│   │   ├── Api/              # Public REST API (products, posts, testimonials)
│   │   ├── Auth/             # Login, registration, password reset
│   │   └── Cms/              # Dashboard, resources, writers, media, redirects
│   ├── Models/               # Post, Product, Category, User, Testimonial, etc.
│   ├── Observers/            # Cache invalidation (Post, Product, Setting)
│   └── Support/              # HtmlSanitizer, AssetUrl, MediaUpload, HomePageCache, etc.
├── database/
│   ├── migrations/           # Schema + indexes (see Section 4)
│   └── seeders/
├── public/
│   ├── build/                # Compiled bundles (site.min.css/js, home.min.css/js)
│   ├── css/                  # Page-specific stylesheets
│   ├── js/                   # Page-specific scripts
│   ├── uploads/              # Brand assets, hero images (gitignored on deploy)
│   └── vendor/               # Quill, Splide, ScrollReveal
├── resources/views/
│   ├── pages/                # Public pages (home, produk, blog, faq, etc.)
│   ├── components/           # Shared Blade components (header, footer, hero, cta)
│   ├── cms/                  # Admin CMS views
│   └── layouts/              # public.blade.php, meridian.blade.php
├── routes/
│   ├── web.php               # Public routes
│   ├── api.php               # REST API routes
│   └── console.php           # Scheduled commands (seo:submit-sitemap)
├── scripts/
│   ├── build-public-assets.mjs   # LightningCSS + esbuild bundler
│   └── deploy-cpanel-ftps.ps1    # Local FTPS deployment (Windows)
└── .github/workflows/
    └── deploy-ftps.yml           # GitHub Actions CI/CD
```

---

## 9. Changelog

### 2026-08-22 (Saturday Tasks)
- **Testing**: E2E user flow test completed — search → article → product → WA order (10/10 PASS)
- **Testing**: Cross-browser audit completed — 0 critical, 10 warnings (Safari 15.0-15.3 edge cases)
- **Maintenance**: DB indexing migration created (`2026_08_21_000001_optimize_public_query_indexes.php`)
- **Maintenance**: Blog search switched to FULLTEXT (`MATCH...AGAINST`)
- **Maintenance**: Tag pages refactored from full-table load to SQL-side pagination
- **Maintenance**: 9 redundant indexes dropped
- **Documentation**: This document created

### 2026-08-21 (Friday Tasks)
- **Redesign**: Product catalog (`/produk`) — Crimson on White design system
- **Redesign**: Product detail (`/produk/{slug}`) — 2-column marketplace layout
- **Redesign**: Blog archive (`/blog`) + Blog article (`/blog/{slug}`) + Author/Category pages
- **Redesign**: Legal pages (`/kebijakan`, `/syarat-ketentuan`)
- **Security**: Full security audit (8/8 PASS)
- **SEO**: Schema markup audit (23/23 pages PASS)
- **Performance**: Bundle optimization (merged quotation calculator JS)
- **Deployment**: GitHub repo setup, FTPS workflow creation, first successful deploy
- **Deployment**: cPanel troubleshooting (nested folder, bootstrap/cache, DB credentials, SSL)

### 2026-08-20 (Thursday Tasks)
- **Redesign**: Homepage sections (hero, advantages, why-us, product fan, quotation calculator)
- **Redesign**: Footer, navigation, floating WhatsApp button
- **Features**: Responsive mobile layout, testimonial marquee animation
- **Content**: Initial brand assets generated (logo, favicon, hero images, responsive WebP variants)
