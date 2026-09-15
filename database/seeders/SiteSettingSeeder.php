<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::firstOrCreate(
            ['id' => 1],
            [
                'company_name' => 'M R Hardware',

                'phone' => '9811510846',

                'whatsapp' => '919811510846',

                'email' => 'mrhardware04@gmail.com',

                'address' =>
                    '3335/107-108 Sharda Mata Complex, Gali Bajrang Bali, Chawri Bazar, Delhi 110006',

                'navbar_button_text' =>
                    'Request Quote',

                'navbar_button_link' =>
                    '/contact',

                'footer_description' =>
                    'M R Hardware is engaged in manufacturing and trading hardware products.',

                'copyright_text' =>
                    '© M R Hardware. All rights reserved.',
            ]
        );
    }
}