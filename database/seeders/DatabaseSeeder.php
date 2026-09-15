<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's CMS default data.
     */
    public function run(): void
    {
        $this->call([
            HomepageSettingSeeder::class,
            HomepageAdvancedSeeder::class,
            SiteSettingSeeder::class,
            ContactPageSettingSeeder::class,
            AboutPageSeeder::class,
            ProductsPageSettingSeeder::class,
            ProductDetailPageSettingSeeder::class,
        ]);
    }
}