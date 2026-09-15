<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageSetting;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function edit()
    {
        $homepage = HomepageSetting::firstOrCreate([
            'id' => 1,
        ]);

        return view(
            'admin.homepage.edit',
            compact('homepage')
        );
    }


    public function update(Request $request)
    {
        $homepage = HomepageSetting::firstOrCreate([
            'id' => 1,
        ]);

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | HERO
            |--------------------------------------------------------------------------
            */

            'hero_badge' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_description' => [
                'nullable',
                'string',
            ],

            'hero_image' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'hero_primary_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_primary_link' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'hero_secondary_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'hero_secondary_link' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | HERO STATS / FLOATING CARD
            |--------------------------------------------------------------------------
            */

            'hero_stat_1_value' => [
                'nullable',
                'string',
                'max:50',
            ],

            'hero_stat_1_label' => [
                'nullable',
                'string',
                'max:100',
            ],

            'hero_stat_4_value' => [
                'nullable',
                'string',
                'max:50',
            ],

            'hero_stat_4_label' => [
                'nullable',
                'string',
                'max:100',
            ],

            'hero_floating_title' => [
                'nullable',
                'string',
                'max:100',
            ],

            'hero_floating_text' => [
                'nullable',
                'string',
                'max:150',
            ],


            /*
            |--------------------------------------------------------------------------
            | ABOUT SECTION
            |--------------------------------------------------------------------------
            */

            'about_badge' => [
                'nullable',
                'string',
                'max:255',
            ],

            'about_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'about_description' => [
                'nullable',
                'string',
            ],

            'about_image' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'about_feature_1' => [
                'nullable',
                'string',
                'max:100',
            ],

            'about_feature_2' => [
                'nullable',
                'string',
                'max:100',
            ],

            'about_feature_3' => [
                'nullable',
                'string',
                'max:100',
            ],

            'about_feature_4' => [
                'nullable',
                'string',
                'max:100',
            ],

            'about_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],


            /*
            |--------------------------------------------------------------------------
            | PRODUCT SECTION
            |--------------------------------------------------------------------------
            */

            'products_badge' => [
                'nullable',
                'string',
                'max:255',
            ],

            'products_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'products_description' => [
                'nullable',
                'string',
            ],

            'products_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'products_limit' => [
                'nullable',
                'integer',
                'min:1',
                'max:12',
            ],


            /*
            |--------------------------------------------------------------------------
            | CATEGORY SECTION
            |--------------------------------------------------------------------------
            */

            'categories_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'categories_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'categories_description' => [
                'nullable',
                'string',
            ],

            'categories_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'categories_limit' => [
                'nullable',
                'integer',
                'min:1',
                'max:12',
            ],


            /*
            |--------------------------------------------------------------------------
            | HOMEPAGE SECTION LIMITS
            |--------------------------------------------------------------------------
            */

            'why_choose_limit' => [
                'nullable',
                'integer',
                'min:1',
                'max:12',
            ],

            'stats_limit' => [
                'nullable',
                'integer',
                'min:1',
                'max:12',
            ],

            'process_limit' => [
                'nullable',
                'integer',
                'min:1',
                'max:12',
            ],

            'testimonials_limit' => [
                'nullable',
                'integer',
                'min:1',
                'max:12',
            ],


            /*
            |--------------------------------------------------------------------------
            | CTA
            |--------------------------------------------------------------------------
            */

            'cta_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'cta_title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'cta_description' => [
                'nullable',
                'string',
            ],

            'cta_button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'cta_button_link' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ]);


        $homepage->update([
            ...$validated,

            /*
            |--------------------------------------------------------------------------
            | VISIBILITY SETTINGS
            |--------------------------------------------------------------------------
            */

            'show_about' =>
                $request->boolean('show_about'),

            'show_products' =>
                $request->boolean('show_products'),

            'show_categories' =>
                $request->boolean('show_categories'),

            'show_cta' =>
                $request->boolean('show_cta'),
        ]);


        return back()->with(
            'success',
            'Homepage updated successfully.'
        );
    }
}