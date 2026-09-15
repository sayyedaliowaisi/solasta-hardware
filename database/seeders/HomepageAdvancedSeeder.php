<?php

namespace Database\Seeders;

use App\Models\HomepageItem;
use App\Models\HomepageSection;
use Illuminate\Database\Seeder;

class HomepageAdvancedSeeder extends Seeder
{
    public function run(): void
    {
        /*
        |--------------------------------------------------------------------------
        | SECTION HEADINGS
        |--------------------------------------------------------------------------
        */

        $sections = [

            'why_choose' => [
                'badge' => 'WHY CHOOSE US',
                'title' => 'Why Businesses Trust Solasta Hardware',
                'description' =>
                    'Hardware solutions with competitive pricing and customer support.',
                'sort_order' => 10,
            ],

            'stats' => [
                'badge' => 'OUR ACHIEVEMENTS',
                'title' => 'M R Hardware at a Glance',
                'description' =>
                    'Key information about our business and product catalogue.',
                'sort_order' => 20,
            ],

            'brands' => [
                'badge' => 'OUR BRANDS',
                'title' => 'Brands We Deal In',
                'description' =>
                    'Brands and product lines handled by our business.',
                'sort_order' => 30,
            ],

            'process' => [
                'badge' => 'OUR PROCESS',
                'title' => 'How We Work',
                'description' =>
                    'A simple process from product requirement to customer support.',
                'sort_order' => 40,
            ],

            'testimonials' => [
                'badge' => 'TESTIMONIALS',
                'title' => 'Customer Feedback',
                'description' =>
                    'Customer feedback can be managed from the admin panel.',
                'sort_order' => 50,
            ],
        ];


        foreach ($sections as $section => $data) {

            HomepageSection::updateOrCreate(
                [
                    'section' => $section,
                ],
                [
                    ...$data,
                    'is_active' => true,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | WHY CHOOSE ITEMS
        |--------------------------------------------------------------------------
        */

        $whyChoose = [
            [
                'title' => 'Product Range',
                'description' =>
                    'Explore hardware products across multiple product categories.',
                'icon' => '✓',
            ],
            [
                'title' => 'Manufacturing & Trading',
                'description' =>
                    'M R Hardware operates in manufacturing and trading.',
                'icon' => '↗',
            ],
            [
                'title' => 'Established Business',
                'description' =>
                    'M R Hardware has been established since 2014.',
                'icon' => '◆',
            ],
            [
                'title' => 'Product Enquiries',
                'description' =>
                    'Customers can contact us for model-wise product details.',
                'icon' => '₹',
            ],
            [
                'title' => 'Multiple Categories',
                'description' =>
                    'Browse cabinet handles, knobs, door hardware and more.',
                'icon' => '▣',
            ],
            [
                'title' => 'Customer Assistance',
                'description' =>
                    'Contact our team for availability and product information.',
                'icon' => '☏',
            ],
        ];


        foreach ($whyChoose as $index => $item) {

            HomepageItem::updateOrCreate(
                [
                    'section' => 'why_choose',
                    'title' => $item['title'],
                ],
                [
                    ...$item,
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | STATS
        |--------------------------------------------------------------------------
        */

        $stats = [
            [
                'value' => '2014',
                'title' => 'Established',
            ],
            [
                'value' => '16',
                'title' => 'Product Categories',
            ],
            [
                'value' => '8',
                'title' => 'Team Members',
            ],
            [
                'value' => 'India',
                'title' => 'Business Market',
            ],
        ];


        foreach ($stats as $index => $item) {

            HomepageItem::updateOrCreate(
                [
                    'section' => 'stats',
                    'title' => $item['title'],
                ],
                [
                    ...$item,
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }


        /*
        |--------------------------------------------------------------------------
        | PROCESS
        |--------------------------------------------------------------------------
        */

        $process = [
            [
                'value' => '1',
                'title' => 'Requirement',
                'description' =>
                    'Understand the required product and customer enquiry.',
            ],
            [
                'value' => '2',
                'title' => 'Product Selection',
                'description' =>
                    'Identify suitable products from the available catalogue.',
            ],
            [
                'value' => '3',
                'title' => 'Enquiry',
                'description' =>
                    'Confirm product details and availability with our team.',
            ],
            [
                'value' => '4',
                'title' => 'Support',
                'description' =>
                    'Provide further assistance for the customer requirement.',
            ],
        ];


        foreach ($process as $index => $item) {

            HomepageItem::updateOrCreate(
                [
                    'section' => 'process',
                    'title' => $item['title'],
                ],
                [
                    ...$item,
                    'sort_order' => $index,
                    'is_active' => true,
                ]
            );
        }
    }
}