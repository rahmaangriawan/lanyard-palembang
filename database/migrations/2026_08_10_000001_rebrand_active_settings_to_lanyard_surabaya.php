<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('setting')) {
            return;
        }

        $now = now();
        $values = [
            'site_title' => 'Lanyard Surabaya',
            'site_url' => 'https://lanyardsurabaya.com',
            'logo_url' => '/uploads/lanyard-surabaya-logo.webp',
            'site_logo' => '/uploads/lanyard-surabaya-logo.webp',
            'site_logo_header' => '/uploads/lanyard-surabaya-logo.webp',
            'site_logo_mobile' => '/uploads/lanyard-surabaya-logo.webp',
            'favicon_url' => '/uploads/lanyard-surabaya-favicon.webp',
            'site_favicon' => '/uploads/lanyard-surabaya-favicon.webp',
            'og_image' => '/uploads/lanyard-surabaya-logo.webp',
            'contact_email' => 'info@lanyardsurabaya.com',
            'site_description' => 'Pusat produksi tali lanyard custom untuk kantor, sekolah, komunitas, dan event di Surabaya dengan pengiriman nasional.',
            'seo_meta_title' => 'Lanyard Surabaya | Cetak Lanyard Custom Cepat Berkualitas',
            'seo_meta_description' => 'Cetak tali lanyard custom dari Surabaya, Jawa Timur untuk kantor, sekolah, komunitas, dan event. Desain bebas, hasil tajam, proses cepat, dan pengiriman ke seluruh Indonesia.',
            'footer_text' => '© 2026 Lanyard Surabaya. All rights reserved.',
        ];

        foreach ($values as $key => $value) {
            $existing = DB::table('setting')->where('key', $key)->first();
            if ($existing === null) {
                DB::table('setting')->insert([
                    'key' => $key,
                    'value' => $value,
                    'createdAt' => $now,
                    'updatedAt' => $now,
                ]);
                continue;
            }

            DB::table('setting')->where('key', $key)->update([
                'value' => $value,
                'updatedAt' => $now,
            ]);
        }
    }

    public function down(): void
    {
        // Active brand migrations intentionally do not restore stale identity.
    }
};
