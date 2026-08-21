<?php

namespace Tests\Feature;

use App\Models\Testimonial;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AboutTestimonialsPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'app.url' => 'http://localhost',
            'app.prod_url' => 'https://lanyardmedan.com',
            'cache.public_store' => 'array',
        ]);
    }

    public function test_about_page_uses_editorial_surabaya_design_without_content_images(): void
    {
        $response = $this->get('/tentang-kami')->assertOk();
        $html = $response->getContent();
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new \DOMXPath($dom);

        $response
            ->assertSee('about-page-shell', false)
            ->assertSee('/css/about-testimonials-page.css', false)
            ->assertDontSee('/css/support-pages.css', false)
            ->assertSee('TENTANG LANYARD MEDAN')
            ->assertSee('Kami Menjaga Detail dari Brief hingga Dikirim')
            ->assertSee('Memproduksi dari Surabaya')
            ->assertSee('Cara Pemesanan')
            ->assertSee('https://lanyardmedan.com/tentang-kami', false);

        $this->assertSame(0, $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " about-page ")]//img')->length);
        $this->assertSame(6, $xpath->query('//section[contains(concat(" ", normalize-space(@class), " "), " about-page__hero ") or contains(concat(" ", normalize-space(@class), " "), " about-page__proof ") or contains(concat(" ", normalize-space(@class), " "), " about-page__story ") or contains(concat(" ", normalize-space(@class), " "), " about-page__principles ") or contains(concat(" ", normalize-space(@class), " "), " about-page__process ") or contains(concat(" ", normalize-space(@class), " "), " about-page__cta ")]')->length);
        $this->assertStringContainsString('"@type":"WebPage"', $html);
        $this->assertStringContainsString('"@type":"BreadcrumbList"', $html);
    }

    public function test_testimonials_page_keeps_published_text_and_omits_images(): void
    {
        Testimonial::query()->create([
            'name' => 'Klien Pertama',
            'role' => 'Admin Kantor',
            'quote' => 'Pesanan rapi dan komunikasinya jelas.',
            'imageUrl' => '/uploads/should-not-render.webp',
            'published' => true,
            'sortOrder' => 10,
        ]);
        Testimonial::query()->create([
            'name' => 'Klien Kedua',
            'role' => 'Event Organizer',
            'quote' => 'Produksi sesuai kebutuhan event kami.',
            'imageUrl' => '/uploads/should-not-render-2.webp',
            'published' => true,
            'sortOrder' => 20,
        ]);
        Testimonial::query()->create([
            'name' => 'Draft Internal',
            'role' => 'Draft',
            'quote' => 'Tidak boleh tampil.',
            'published' => false,
            'sortOrder' => 30,
        ]);

        $response = $this->get('/testimoni')->assertOk();
        $html = $response->getContent();
        $dom = new \DOMDocument();
        @$dom->loadHTML($html);
        $xpath = new \DOMXPath($dom);

        $response
            ->assertSee('testimonials-page-shell', false)
            ->assertSee('KATA PELANGGAN')
            ->assertSee('Cerita dari Klien yang Sudah Memesan')
            ->assertSee('Klien Pertama')
            ->assertSee('Klien Kedua')
            ->assertDontSee('Draft Internal')
            ->assertDontSee('should-not-render.webp')
            ->assertDontSee('/css/support-pages.css', false)
            ->assertSee('https://lanyardmedan.com/testimoni', false);

        $this->assertSame(0, $xpath->query('//*[contains(concat(" ", normalize-space(@class), " "), " testimonials-page ")]//img')->length);
        $this->assertSame(1, substr_count($html, 'testimonials-page__feature-panel'));
        $this->assertGreaterThanOrEqual(1, $xpath->query('//article[contains(concat(" ", normalize-space(@class), " "), " testimonials-page__item ")]')->length);
        $this->assertStringContainsString('"@type":"WebPage"', $html);
        $this->assertStringContainsString('"@type":"BreadcrumbList"', $html);
    }
}
