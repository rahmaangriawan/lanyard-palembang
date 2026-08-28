<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Rewrites inherited city identity (Medan, plus legacy import artifacts from
 * Surabaya) inside cloned CMS content so every stored row matches the active
 * Palembang brand and the renamed files on disk.
 */
return new class extends Migration
{
    private const TABLE_COLUMNS = [
        'post' => ['title', 'slug', 'content', 'tags', 'metaTitle', 'metaDescription', 'featuredImage'],
        'page' => ['title', 'slug', 'content', 'metaTitle', 'metaDescription'],
        'product' => ['name', 'slug', 'description', 'shortDescription', 'specs', 'accessories', 'metaTitle', 'metaDescription', 'featuredImage'],
        'portfolio' => ['title', 'description', 'imageUrl', 'logoUrl'],
        'testimonial' => ['name', 'role', 'quote', 'imageUrl'],
        'category' => ['name', 'slug', 'description'],
        'citypage' => ['title', 'slug', 'content', 'metaTitle', 'metaDescription', 'featuredImage'],
        'media' => ['filename', 'filepath', 'url'],
        'setting' => ['value'],
    ];

    public function up(): void
    {
        foreach (self::TABLE_COLUMNS as $table => $columns) {
            if (! Schema::hasTable($table)) {
                continue;
            }

            $existingColumns = Schema::getColumnListing($table);
            $columns = array_values(array_intersect($columns, $existingColumns));
            if ($columns === []) {
                continue;
            }

            DB::table($table)
                ->select(array_merge(['id'], $columns))
                ->orderBy('id')
                ->chunkById(200, function ($rows) use ($table, $columns): void {
                    foreach ($rows as $row) {
                        $updated = [];
                        foreach ($columns as $column) {
                            $original = $row->{$column};
                            if (! is_string($original)) {
                                continue;
                            }

                            $converted = $this->rebrand($original);
                            if ($converted !== $original) {
                                $updated[$column] = $converted;
                            }
                        }

                        if ($updated !== []) {
                            DB::table($table)->where('id', $row->id)->update($updated);
                        }
                    }
                });
        }
    }

    public function down(): void
    {
        // One-way rebrand; restoring prior city copy is not supported.
    }

    private function rebrand(string $value): string
    {
        $value = str_replace(
            [
                'www.lanyardmedan.com',
                'LANYARD MEDAN',
                'Lanyard Medan',
                'lanyardmedan.com',
                'lanyardmedan',
                'lanyard-medan',
                'Artikel Lanyardsurabaya Com',
                'Jawa Timur',
                'kota pahlawan',
                'Kota Medan',
                'Sumatera Utara',
            ],
            [
                'www.lanyardpalembang.com',
                'LANYARD PALEMBANG',
                'Lanyard Palembang',
                'lanyardpalembang.com',
                'lanyardpalembang',
                'lanyard-palembang',
                'Artikel Lanyard Palembang',
                'Sumatera Selatan',
                'bumi Sriwijaya',
                'Kota Palembang',
                'Sumatera Selatan',
            ],
            $value,
        );

        return (string) preg_replace_callback('/medan|surabaya/i', function (array $match): string {
            $city = $match[0];

            if (ctype_upper($city)) {
                return 'PALEMBANG';
            }

            return ctype_upper(substr($city, 0, 1)) ? 'Palembang' : 'palembang';
        }, $value);
    }
};
