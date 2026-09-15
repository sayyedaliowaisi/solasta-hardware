<?php

namespace App\Providers;

use App\Models\Enquiry;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        /*
        |--------------------------------------------------------------------------
        | Admin Sidebar Data
        |--------------------------------------------------------------------------
        |
        | Sidebar me new enquiries ka count har admin page par available rahega.
        | Database query ko Blade ke andar directly run nahi karenge.
        |
        */

        View::composer(
            'admin.partials.sidebar',
            function ($view) {

                $sidebarNewEnquiries =
                    Enquiry::where('status', 'new')->count();

                $view->with(
                    'sidebarNewEnquiries',
                    $sidebarNewEnquiries
                );
            }
        );
    }
}