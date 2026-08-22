<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Drop redundant single-column indexes (left-prefix duplicates from 2026_07_15)
        Schema::table('product', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['sku']);
            $table->dropIndex(['published']);
            $table->dropIndex(['categoryId']);
        });

        Schema::table('post', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['published']);
            $table->dropIndex(['categoryId']);
        });

        Schema::table('category', function (Blueprint $table) {
            $table->dropIndex(['slug']);
            $table->dropIndex(['type']);
        });

        // Mixed-direction catalog sort: published + sortOrder ASC + createdAt DESC
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE product DROP INDEX product_published_sortorder_createdat_index');
            DB::statement('ALTER TABLE product ADD INDEX product_pub_sort_created_idx (published, sortOrder ASC, createdAt DESC)');
        } else {
            Schema::table('product', function (Blueprint $table) {
                $table->dropIndex(['published', 'sortOrder', 'createdAt']);
                $table->index(['published', 'sortOrder', 'createdAt'], 'product_pub_sort_created_idx');
            });
        }

        // Author archive pages
        Schema::table('post', function (Blueprint $table) {
            $table->index(['authorId', 'published', 'createdAt'], 'post_author_pub_created_idx');
        });

        // Sitemap lastmod ordering
        Schema::table('post', function (Blueprint $table) {
            $table->index(['published', 'updatedAt'], 'post_pub_updated_idx');
        });

        Schema::table('product', function (Blueprint $table) {
            $table->index(['published', 'updatedAt'], 'product_pub_updated_idx');
        });

        Schema::table('citypage', function (Blueprint $table) {
            $table->index(['published', 'updatedAt'], 'citypage_pub_updated_idx');
        });

        // Area page alphabetical listing
        Schema::table('citypage', function (Blueprint $table) {
            $table->index(['published', 'title'], 'citypage_pub_title_idx');
        });

        // Media library sort + filename search
        Schema::table('media', function (Blueprint $table) {
            $table->index('createdAt', 'media_createdat_idx');
            $table->index('filename', 'media_filename_idx');
        });

        // Low-cardinality lookups
        Schema::table('testimonial', function (Blueprint $table) {
            $table->index('name', 'testimonial_name_idx');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->index('role', 'user_role_idx');
        });

        // Rebuild fulltext indexes to cover the actual search columns
        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE post DROP INDEX fulltext_post_title_content');
            DB::statement('ALTER TABLE post ADD FULLTEXT fulltext_post_search (title, content, metaDescription)');
            DB::statement('ALTER TABLE product ADD FULLTEXT fulltext_product_search (name, sku, shortDescription, specs, accessories, description)');
        }
    }

    public function down(): void
    {
        Schema::table('product', function (Blueprint $table) {
            $table->index(['slug']);
            $table->index(['sku']);
            $table->index(['published']);
            $table->index(['categoryId']);
        });

        Schema::table('post', function (Blueprint $table) {
            $table->index(['slug']);
            $table->index(['published']);
            $table->index(['categoryId']);
        });

        Schema::table('category', function (Blueprint $table) {
            $table->index(['slug']);
            $table->index(['type']);
        });

        if (DB::connection()->getDriverName() === 'mysql') {
            DB::statement('ALTER TABLE product DROP INDEX product_pub_sort_created_idx');
            DB::statement('ALTER TABLE product ADD INDEX product_published_sortorder_createdat_index (published, sortOrder, createdAt)');
            DB::statement('ALTER TABLE post DROP INDEX fulltext_post_search');
            DB::statement('ALTER TABLE post ADD FULLTEXT fulltext_post_title_content (title, content)');
            DB::statement('ALTER TABLE product DROP INDEX fulltext_product_search');
        } else {
            Schema::table('product', function (Blueprint $table) {
                $table->dropIndex('product_pub_sort_created_idx');
                $table->index(['published', 'sortOrder', 'createdAt']);
            });
        }

        Schema::table('post', function (Blueprint $table) {
            $table->dropIndex('post_author_pub_created_idx');
            $table->dropIndex('post_pub_updated_idx');
        });

        Schema::table('product', function (Blueprint $table) {
            $table->dropIndex('product_pub_updated_idx');
        });

        Schema::table('citypage', function (Blueprint $table) {
            $table->dropIndex('citypage_pub_updated_idx');
            $table->dropIndex('citypage_pub_title_idx');
        });

        Schema::table('media', function (Blueprint $table) {
            $table->dropIndex('media_createdat_idx');
            $table->dropIndex('media_filename_idx');
        });

        Schema::table('testimonial', function (Blueprint $table) {
            $table->dropIndex('testimonial_name_idx');
        });

        Schema::table('user', function (Blueprint $table) {
            $table->dropIndex('user_role_idx');
        });
    }
};
