<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop redundant single-column indexes (left-prefix duplicates from 2026_07_15).
        // Guarded by name so the migration also works against schemas whose
        // indexes were created with different naming conventions (e.g. Prisma).
        Schema::table('product', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'product', ['slug'], 'product_slug_index');
            $this->dropIndexIfExists($table, 'product', ['sku'], 'product_sku_index');
            $this->dropIndexIfExists($table, 'product', ['published'], 'product_published_index');
            $this->dropIndexIfExists($table, 'product', ['categoryId'], 'product_categoryid_index');
        });

        Schema::table('post', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'post', ['slug'], 'post_slug_index');
            $this->dropIndexIfExists($table, 'post', ['published'], 'post_published_index');
            $this->dropIndexIfExists($table, 'post', ['categoryId'], 'post_categoryid_index');
        });

        Schema::table('category', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'category', ['slug'], 'category_slug_index');
            $this->dropIndexIfExists($table, 'category', ['type'], 'category_type_index');
        });

        // Mixed-direction catalog sort: published + sortOrder ASC + createdAt DESC
        if (DB::connection()->getDriverName() === 'mysql') {
            $this->dropRawIndexIfExists('product', 'product_published_sortorder_createdat_index');

            if (! $this->indexExists('product', 'product_pub_sort_created_idx')) {
                DB::statement('ALTER TABLE product ADD INDEX product_pub_sort_created_idx (published, sortOrder ASC, createdAt DESC)');
            }
        } else {
            Schema::table('product', function (Blueprint $table) {
                $this->dropIndexIfExists($table, 'product', ['published', 'sortOrder', 'createdAt'], 'product_published_sortorder_createdat_index');
                $this->addIndexIfMissing($table, 'product', ['published', 'sortOrder', 'createdAt'], 'product_pub_sort_created_idx');
            });
        }

        // Author archive pages
        Schema::table('post', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'post', ['authorId', 'published', 'createdAt'], 'post_author_pub_created_idx');
        });

        // Sitemap lastmod ordering
        Schema::table('post', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'post', ['published', 'updatedAt'], 'post_pub_updated_idx');
        });

        Schema::table('product', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'product', ['published', 'updatedAt'], 'product_pub_updated_idx');
        });

        Schema::table('citypage', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'citypage', ['published', 'updatedAt'], 'citypage_pub_updated_idx');
        });

        // Area page alphabetical listing
        Schema::table('citypage', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'citypage', ['published', 'title'], 'citypage_pub_title_idx');
        });

        // Media library sort + filename search
        Schema::table('media', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'media', ['createdAt'], 'media_createdat_idx');
            $this->addIndexIfMissing($table, 'media', ['filename'], 'media_filename_idx');
        });

        // Low-cardinality lookups
        Schema::table('testimonial', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'testimonial', ['name'], 'testimonial_name_idx');
        });

        Schema::table('user', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'user', ['role'], 'user_role_idx');
        });

        // Rebuild fulltext indexes to cover the actual search columns
        if (DB::connection()->getDriverName() === 'mysql') {
            $this->dropRawIndexIfExists('post', 'fulltext_post_title_content');

            if (! $this->indexExists('post', 'fulltext_post_search')) {
                DB::statement('ALTER TABLE post ADD FULLTEXT fulltext_post_search (title, content, metaDescription)');
            }

            if (! $this->indexExists('product', 'fulltext_product_search')) {
                DB::statement('ALTER TABLE product ADD FULLTEXT fulltext_product_search (name, sku, shortDescription, specs, accessories, description)');
            }
        }
    }

    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'product', ['slug'], 'product_slug_index');
            $this->addIndexIfMissing($table, 'product', ['sku'], 'product_sku_index');
            $this->addIndexIfMissing($table, 'product', ['published'], 'product_published_index');
            $this->addIndexIfMissing($table, 'product', ['categoryId'], 'product_categoryid_index');
        });

        Schema::table('post', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'post', ['slug'], 'post_slug_index');
            $this->addIndexIfMissing($table, 'post', ['published'], 'post_published_index');
            $this->addIndexIfMissing($table, 'post', ['categoryId'], 'post_categoryid_index');
        });

        Schema::table('category', function (Blueprint $table) {
            $this->addIndexIfMissing($table, 'category', ['slug'], 'category_slug_index');
            $this->addIndexIfMissing($table, 'category', ['type'], 'category_type_index');
        });

        if (DB::connection()->getDriverName() === 'mysql') {
            $this->dropRawIndexIfExists('product', 'product_pub_sort_created_idx');

            if (! $this->indexExists('product', 'product_published_sortorder_createdat_index')) {
                DB::statement('ALTER TABLE product ADD INDEX product_published_sortorder_createdat_index (published, sortOrder, createdAt)');
            }

            $this->dropRawIndexIfExists('post', 'fulltext_post_search');

            if (! $this->indexExists('post', 'fulltext_post_title_content')) {
                DB::statement('ALTER TABLE post ADD FULLTEXT fulltext_post_title_content (title, content)');
            }

            $this->dropRawIndexIfExists('product', 'fulltext_product_search');
        } else {
            Schema::table('product', function (Blueprint $table) {
                $this->dropIndexIfExists($table, 'product', [], 'product_pub_sort_created_idx');
                $this->addIndexIfMissing($table, 'product', ['published', 'sortOrder', 'createdAt'], 'product_published_sortorder_createdat_index');
            });
        }

        Schema::table('post', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'post', [], 'post_author_pub_created_idx');
            $this->dropIndexIfExists($table, 'post', [], 'post_pub_updated_idx');
        });

        Schema::table('product', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'product', [], 'product_pub_updated_idx');
        });

        Schema::table('citypage', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'citypage', [], 'citypage_pub_updated_idx');
            $this->dropIndexIfExists($table, 'citypage', [], 'citypage_pub_title_idx');
        });

        Schema::table('media', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'media', [], 'media_createdat_idx');
            $this->dropIndexIfExists($table, 'media', [], 'media_filename_idx');
        });

        Schema::table('testimonial', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'testimonial', [], 'testimonial_name_idx');
        });

        Schema::table('user', function (Blueprint $table) {
            $this->dropIndexIfExists($table, 'user', [], 'user_role_idx');
        });
    }

    private function indexExists(string $table, string $index): bool
    {
        return DB::selectOne(
            'SELECT COUNT(*) AS c FROM information_schema.STATISTICS WHERE TABLE_SCHEMA = DATABASE() AND TABLE_NAME = ? AND INDEX_NAME = ?',
            [$table, $index],
        )->c > 0;
    }

    private function dropIndexIfExists(Blueprint $table, string $tableName, array $columns, string $indexName): void
    {
        if ($this->indexExists($tableName, $indexName)) {
            empty($columns)
                ? $table->dropIndex($indexName)
                : $table->dropIndex($columns);
        }
    }

    private function addIndexIfMissing(Blueprint $table, string $tableName, array $columns, string $indexName): void
    {
        if (! $this->indexExists($tableName, $indexName)) {
            $table->index($columns, $indexName);
        }
    }

    private function dropRawIndexIfExists(string $table, string $index): void
    {
        if ($this->indexExists($table, $index)) {
            DB::statement("ALTER TABLE {$table} DROP INDEX {$index}");
        }
    }
};
