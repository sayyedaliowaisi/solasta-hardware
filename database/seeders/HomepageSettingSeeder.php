<?php

namespace Database\Seeders;

use App\Models\HomepageSetting;
use Illuminate\Database\Seeder;

class HomepageSettingSeeder extends Seeder
{
    public function run(): void
    {
        HomepageSetting::firstOrCreate(
            ['id' => 1],
            [
                'hero_badge' => 'Premium Architectural Hardware',

                'hero_title' =>
                    'Hardware Designed for Modern Spaces',

                'hero_description' =>
                    'Explore hardware solutions from M R Hardware for residential and commercial applications.',

                'hero_primary_text' => 'Explore Products',
                'hero_primary_link' => '/products',

                'hero_secondary_text' => 'Contact Us',
                'hero_secondary_link' => '/contact',

                'about_badge' => 'About M R Hardware',

                'about_title' =>
                    'Hardware Solutions Since 2014',

                'about_description' =>
                    'M R Hardware is engaged in manufacturing and trading architectural hardware products.',

                'show_about' => true,

                'products_badge' => 'Our Collection',

                'products_title' =>
                    'Featured Products',

                'products_description' =>
                    'Explore selected products from our hardware collection.',

                'show_products' => true,

                'categories_title' =>
                    'Explore Product Categories',

                'categories_description' =>
                    'Browse our product collection by category.',

                'show_categories' => true,

                'cta_title' =>
                    'Looking for a Hardware Product?',

                'cta_description' =>
                    'Contact M R Hardware for product availability and model-wise details.',

                'cta_button_text' =>
                    'Send Enquiry',

                'cta_button_link' =>
                    '/contact',

                'show_cta' => true,
            ]
        );
    }
}