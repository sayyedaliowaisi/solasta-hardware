<?php

namespace Database\Seeders;

use App\Models\ProductsPageSetting;
use Illuminate\Database\Seeder;

class ProductsPageSettingSeeder extends Seeder
{
    public function run(): void
    {
        ProductsPageSetting::firstOrCreate(
            ['id' => 1],
            [
                'hero_badge' => 'Product Catalogue',

                'hero_products_text' => 'Products Available',

                'hero_button_text' => 'Explore Products',

                'collection_label' => 'Collection',

                'collection_text' => 'Products in this category',

                'business_label' => 'Business',

                'business_text' => 'Manufacturing & Trading',

                'enquiry_badge' => 'Need a specific model?',

                'enquiry_text' =>
                    'Open any product for a closer view or send an enquiry for model-wise specifications and availability.',

                'enquiry_button_text' => 'Send Enquiry',

                'products_section_badge' => 'Our Collection',

                'view_product_text' => 'View Product',

                'empty_title' => 'No products found',

                'empty_text' =>
                    'No active products are currently available in this category.',

                'cta_badge' => 'Product Enquiry',

                'cta_title' => 'Looking for a particular model?',

                'cta_description' =>
                    'Contact us for model-wise specifications, availability and business enquiries.',

                'cta_button_text' => 'Send Enquiry',
            ]
        );
    }
}