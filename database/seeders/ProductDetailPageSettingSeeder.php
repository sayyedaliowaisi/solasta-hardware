<?php

namespace Database\Seeders;

use App\Models\ProductDetailPageSetting;
use Illuminate\Database\Seeder;

class ProductDetailPageSettingSeeder extends Seeder
{
    public function run(): void
    {
        ProductDetailPageSetting::firstOrCreate(
            ['id' => 1],
            [
                'back_to_products_text' => 'Back to Products',

                'collection_button_text' => 'View Full Collection',

                'related_section_badge' => 'Related Products',

                'related_section_title' => 'You may also like',

                'related_product_button_text' => 'View Product',

                'product_badge' => 'Product Details',

                'specifications_title' => 'Product Information',

                'specifications_note' =>
                    'Contact us for model-wise specifications, availability and business enquiries.',

                'enquiry_badge' => 'Product Enquiry',

                'enquiry_title' =>
                    'Need more information about this product?',

                'enquiry_description' =>
                    'Send us an enquiry for model-wise specifications, availability and business requirements.',

                'enquiry_button_text' => 'Send Enquiry',

                'cta_badge' => 'M R Hardware',

                'cta_title' => 'Need details for this product?',

                'cta_description' =>
                    'Contact us for product availability, specifications and business enquiries.',

                'cta_button_text' => 'Send Enquiry',
            ]
        );
    }
}