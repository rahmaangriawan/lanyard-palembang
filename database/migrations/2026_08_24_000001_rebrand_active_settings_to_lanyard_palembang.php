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
            'site_title' => 'Lanyard Palembang',
            'site_url' => 'https://lanyardpalembang.com',
            'logo_url' => '/uploads/lanyard-palembang-logo.webp',
            'site_logo' => '/uploads/lanyard-palembang-logo.webp',
            'site_logo_header' => '/uploads/lanyard-palembang-logo.webp',
            'site_logo_mobile' => '/uploads/lanyard-palembang-logo.webp',
            'favicon_url' => '/uploads/lanyard-palembang-favicon.webp',
            'site_favicon' => '/uploads/lanyard-palembang-favicon.webp',
            'og_image' => '/uploads/lanyard-palembang-logo.webp',
            'contact_email' => 'info@lanyardpalembang.com',
            'contact_address' => 'Palembang, Sumatera Selatan',
            'site_description' => 'Pusat produksi tali lanyard custom untuk kantor, sekolah, komunitas, dan event di Palembang, Sumatera Selatan, dengan pengiriman nasional.',
            'seo_meta_title' => 'Vendor Lanyard Palembang Terpercaya',
            'seo_meta_description' => 'Cetak lanyard di Lanyard Palembang dengan hasil tajam dan awet. Vendor terpercaya di Palembang, Sumatera Selatan.',
            'footer_text' => '© 2026 Lanyard Palembang. All rights reserved.',
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
