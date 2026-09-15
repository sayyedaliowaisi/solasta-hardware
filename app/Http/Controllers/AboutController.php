<?php

namespace App\Http\Controllers;

use App\Models\AboutPageSetting;
use App\Models\SiteSetting;

class AboutController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | About Page Sections
        |--------------------------------------------------------------------------
        */

        $aboutSections = AboutPageSetting::query()
            ->with([
                'items' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                }
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->keyBy('section');


        /*
        |--------------------------------------------------------------------------
        | Global Site Settings
        |--------------------------------------------------------------------------
        */

        $siteSettings = SiteSetting::query()->first();


        /*
        |--------------------------------------------------------------------------
        | About Page
        |--------------------------------------------------------------------------
        */

        return view('pages.about', compact(
            'aboutSections',
            'siteSettings'
        ));
    }
}