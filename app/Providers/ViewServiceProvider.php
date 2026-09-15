<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Global site settings
        |--------------------------------------------------------------------------
        */
        View::composer(
            ['layouts.*', 'components.*'],
            function ($view) {
                $siteSettings = SiteSetting::firstOrCreate([
                    'id' => 1,
                ]);

                $view->with('siteSettings', $siteSettings);
            }
        );

        /*
        |--------------------------------------------------------------------------
        | Navbar + Footer product categories
        |--------------------------------------------------------------------------
        */
        View::composer(
            ['components.navbar', 'components.footer'],
            function ($view) {
                $navCategories = Category::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->orderBy('name')
                    ->get();

                $view->with('navCategories', $navCategories);
            }
        );
    }
}
