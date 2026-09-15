<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {

            // Hero stats
            $table->string('hero_stat_1_value')->nullable();
            $table->string('hero_stat_1_label')->nullable();

            $table->string('hero_stat_4_value')->nullable();
            $table->string('hero_stat_4_label')->nullable();

            // Hero floating card
            $table->string('hero_floating_title')->nullable();
            $table->string('hero_floating_text')->nullable();

            // Category section
            $table->string('categories_badge')->nullable();
            $table->string('categories_button_text')->nullable();
            $table->unsignedTinyInteger('categories_limit')->default(6);

            // Product section
            $table->string('products_button_text')->nullable();
            $table->unsignedTinyInteger('products_limit')->default(3);

            // About section
            $table->string('about_feature_1')->nullable();
            $table->string('about_feature_2')->nullable();
            $table->string('about_feature_3')->nullable();
            $table->string('about_feature_4')->nullable();
            $table->string('about_button_text')->nullable();

            // Section limits
            $table->unsignedTinyInteger('why_choose_limit')->default(3);
            $table->unsignedTinyInteger('stats_limit')->default(4);
            $table->unsignedTinyInteger('process_limit')->default(4);
            $table->unsignedTinyInteger('testimonials_limit')->default(3);

            // CTA
            $table->string('cta_badge')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('homepage_settings', function (Blueprint $table) {
            $table->dropColumn([
                'hero_stat_1_value',
                'hero_stat_1_label',
                'hero_stat_4_value',
                'hero_stat_4_label',

                'hero_floating_title',
                'hero_floating_text',

                'categories_badge',
                'categories_button_text',
                'categories_limit',

                'products_button_text',
                'products_limit',

                'about_feature_1',
                'about_feature_2',
                'about_feature_3',
                'about_feature_4',
                'about_button_text',

                'why_choose_limit',
                'stats_limit',
                'process_limit',
                'testimonials_limit',

                'cta_badge',
            ]);
        });
    }
};