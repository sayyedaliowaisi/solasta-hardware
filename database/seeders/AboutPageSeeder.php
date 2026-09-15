<?php

namespace Database\Seeders;

use App\Models\AboutPageSetting;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    public function run(): void
    {
        $sections = [

            [
                'section' => 'hero',
                'badge' => 'About Us',
                'title' => 'About M R Hardware',
                'subtitle' => null,
                'description' =>
                    'Learn more about M R Hardware, our product range and our business.',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 1,
            ],

            [
                'section' => 'company_story',
                'badge' => 'Our Story',
                'title' => 'M R Hardware',
                'subtitle' => 'Established in 2014',
                'description' =>
                    'M R Hardware is engaged in manufacturing and trading hardware products from Chawri Bazar, Delhi.',
                'button_text' => 'View Products',
                'button_link' => '/products',
                'is_active' => true,
                'sort_order' => 2,
            ],

            [
                'section' => 'mission_vision',
                'badge' => 'Mission & Vision',
                'title' => 'Our Direction',
                'subtitle' => null,
                'description' =>
                    'This section can be managed from the admin panel.',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 3,
            ],

            [
                'section' => 'why_choose',
                'badge' => 'Why Choose Us',
                'title' => 'Why Work With M R Hardware',
                'subtitle' => null,
                'description' =>
                    'Manage the section heading and its individual points from the admin panel.',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 4,
            ],

            [
                'section' => 'journey',
                'badge' => 'Our Journey',
                'title' => 'Our Journey Since 2014',
                'subtitle' => null,
                'description' =>
                    'Add and manage important business milestones from the admin panel.',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 5,
            ],

            [
                'section' => 'team',
                'badge' => 'Our Team',
                'title' => 'People Behind M R Hardware',
                'subtitle' => null,
                'description' =>
                    'Team members can be added and managed from the admin panel.',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 6,
            ],

            [
                'section' => 'industries',
                'badge' => 'Products',
                'title' => 'Hardware Product Categories',
                'subtitle' => null,
                'description' =>
                    'Show relevant hardware categories and applications here.',
                'button_text' => 'Explore Products',
                'button_link' => '/products',
                'is_active' => true,
                'sort_order' => 7,
            ],

            [
                'section' => 'trusted_brand',
                'badge' => 'Business',
                'title' => 'M R Hardware',
                'subtitle' => null,
                'description' =>
                    'Use this section for verified business information, associations or brand content.',
                'button_text' => null,
                'button_link' => null,
                'is_active' => true,
                'sort_order' => 8,
            ],

            [
                'section' => 'cta',
                'badge' => 'Get In Touch',
                'title' => 'Looking for Hardware Products?',
                'subtitle' => null,
                'description' =>
                    'Contact M R Hardware for product availability and model-wise details.',
                'button_text' => 'Contact Us',
                'button_link' => '/contact',
                'is_active' => true,
                'sort_order' => 9,
            ],
        ];


        foreach ($sections as $section) {

            AboutPageSetting::updateOrCreate(
                [
                    'section' => $section['section'],
                ],
                $section
            );
        }
    }
}