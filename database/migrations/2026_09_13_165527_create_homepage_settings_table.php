<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_settings', function (Blueprint $table) {
            $table->id();

            // Hero
            $table->string('hero_badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->text('hero_description')->nullable();
            $table->string('hero_image')->nullable();

            $table->string('hero_primary_text')->nullable();
            $table->string('hero_primary_link')->nullable();

            $table->string('hero_secondary_text')->nullable();
            $table->string('hero_secondary_link')->nullable();

            // About
            $table->string('about_badge')->nullable();
            $table->string('about_title')->nullable();
            $table->text('about_description')->nullable();
            $table->string('about_image')->nullable();
            $table->boolean('show_about')->default(true);

            // Products
            $table->string('products_badge')->nullable();
            $table->string('products_title')->nullable();
            $table->text('products_description')->nullable();
            $table->boolean('show_products')->default(true);

            // Categories
            $table->string('categories_title')->nullable();
            $table->text('categories_description')->nullable();
            $table->boolean('show_categories')->default(true);

            // CTA
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();
            $table->string('cta_button_link')->nullable();
            $table->boolean('show_cta')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_settings');
    }
};