<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AreaPageTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        config([
            'app.url' => 'http://localhost',
            'app.prod_url' => 'https://lanyardpalembang.com',
            'cache.public_store' => 'array',
        ]);
    }

    public function test_area_page_uses_surabaya_design_system_and_zone_coverage(): void
    {
        $response = $this->get('/area')->assertOk();
        $html = $response->getContent();

        $response
            ->assertSee('area-page-shell', false)
            ->assertSee('/css/area-page.css', false)
            ->assertDontSee('/css/support-pages.css', false)
            ->assertSee('/uploads/hero-area-lanyard-palembang.webp', false)
            ->assertSee('/uploads/hero-area-lanyard-palembang-320w.webp 320w', false)
            ->assertSee('fetchpriority="high"', false)
            ->assertSee('Lanyard Custom untuk Seluruh Kota Surabaya')
            ->assertSee('Konsultasi Area Anda')
            ->assertSee('href="'.route('products.index').'"', false)
            ->assertSee('31')
            ->assertSee('Surabaya Pusat')
            ->assertSee('Surabaya Utara')
            ->assertSee('Surabaya Timur')
            ->assertSee('Surabaya Selatan')
            ->assertSee('Surabaya Barat')
            ->assertSee('Konsultasi kebutuhan')
            ->assertSee('Konfirmasi desain')
            ->assertSee('Produksi dari Surabaya')
            ->assertSee('Pengiriman ke alamat tujuan');

        $this->assertSame(31, substr_count($html, 'area-page__zone-content li'));
        $this->assertSame(4, substr_count($html, 'area-page__proof-item'));
        $this->assertSame(4, substr_count($html, 'area-page__process-list li'));
        $this->assertStringContainsString('https://lanyardpalembang.com/area', $html);
        $this->assertStringContainsString('"name":"Kota Surabaya"', $html);
    }
}
