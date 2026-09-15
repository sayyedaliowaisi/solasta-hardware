<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageSetting extends Model
{
    protected $fillable = [

        // =====================================================
        // HERO
        // =====================================================

        'hero_badge',
        'hero_title',
        'hero_description',
        'hero_image',

        'hero_primary_text',
        'hero_primary_link',

        'hero_secondary_text',
        'hero_secondary_link',

        // Hero stats
        'hero_stat_1_value',
        'hero_stat_1_label',

        'hero_stat_4_value',
        'hero_stat_4_label',

        // Hero floating card
        'hero_floating_title',
        'hero_floating_text',


        // =====================================================
        // ABOUT
        // =====================================================

        'about_badge',
        'about_title',
        'about_description',
        'about_image',

        'about_feature_1',
        'about_feature_2',
        'about_feature_3',
        'about_feature_4',

        'about_button_text',

        'show_about',


        // =====================================================
        // PRODUCTS
        // =====================================================

        'products_badge',
        'products_title',
        'products_description',

        'products_button_text',
        'products_limit',

        'show_products',


        // =====================================================
        // CATEGORIES
        // =====================================================

        'categories_badge',
        'categories_title',
        'categories_description',

        'categories_button_text',
        'categories_limit',

        'show_categories',


        // =====================================================
        // OTHER HOMEPAGE SECTIONS
        // =====================================================

        'why_choose_limit',
        'stats_limit',
        'process_limit',
        'testimonials_limit',


        // =====================================================
        // CTA
        // =====================================================

        'cta_badge',
        'cta_title',
        'cta_description',
        'cta_button_text',
        'cta_button_link',

        'show_cta',
    ];


    protected function casts(): array
    {
        return [

            // Section visibility
            'show_about' => 'boolean',
            'show_products' => 'boolean',
            'show_categories' => 'boolean',
            'show_cta' => 'boolean',

            // Section limits
            'categories_limit' => 'integer',
            'products_limit' => 'integer',
            'why_choose_limit' => 'integer',
            'stats_limit' => 'integer',
            'process_limit' => 'integer',
            'testimonials_limit' => 'integer',
        ];
    }
}