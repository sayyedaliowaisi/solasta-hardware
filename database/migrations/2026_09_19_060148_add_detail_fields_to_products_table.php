<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Product Gallery
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'gallery')) {
                $table->json('gallery')
                    ->nullable();
            }


            /*
            |--------------------------------------------------------------------------
            | Rating / Reviews
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'rating')) {
                $table->decimal('rating', 2, 1)
                    ->default(5.0);
            }

            if (!Schema::hasColumn('products', 'review_count')) {
                $table->unsignedInteger('review_count')
                    ->default(0);
            }


            /*
            |--------------------------------------------------------------------------
            | Product Types / Finishes
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'product_types')) {
                $table->json('product_types')
                    ->nullable();
            }


            /*
            |--------------------------------------------------------------------------
            | Product Detail Tab
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'detail_content')) {
                $table->text('detail_content')
                    ->nullable();
            }

            if (!Schema::hasColumn('products', 'detail_features')) {
                $table->json('detail_features')
                    ->nullable();
            }


            /*
            |--------------------------------------------------------------------------
            | Specifications
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'specifications')) {
                $table->json('specifications')
                    ->nullable();
            }


            /*
            |--------------------------------------------------------------------------
            | Dimensions
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'dimensions')) {
                $table->json('dimensions')
                    ->nullable();
            }


            /*
            |--------------------------------------------------------------------------
            | Installation Guide
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'installation_steps')) {
                $table->json('installation_steps')
                    ->nullable();
            }


            /*
            |--------------------------------------------------------------------------
            | FAQs
            |--------------------------------------------------------------------------
            */

            if (!Schema::hasColumn('products', 'faqs')) {
                $table->json('faqs')
                    ->nullable();
            }

        });
    }


    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $columns = [
                'gallery',
                'rating',
                'review_count',
                'product_types',
                'detail_content',
                'detail_features',
                'specifications',
                'dimensions',
                'installation_steps',
                'faqs',
            ];

            foreach ($columns as $column) {

                if (Schema::hasColumn('products', $column)) {
                    $table->dropColumn($column);
                }

            }

        });
    }
};