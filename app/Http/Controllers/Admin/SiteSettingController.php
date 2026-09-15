<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SiteSettingController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Edit Settings
    |--------------------------------------------------------------------------
    */

    public function edit(): View
    {
        $siteSettings = SiteSetting::firstOrCreate(
            ['id' => 1],
            [

                /*
                |--------------------------------------------------------------------------
                | Company
                |--------------------------------------------------------------------------
                */

                'company_name' => 'M R Hardware',
                'tagline' => 'Hardware Supplier',

                /*
                |--------------------------------------------------------------------------
                | Contact
                |--------------------------------------------------------------------------
                */

                'phone' => '9811510846',
                'whatsapp' => '9811510846',
                'email' => 'mrhardware04@gmail.com',

                'address' =>
                    '3335/107-108 Sharda Mata Complex, Gali Bajrang Bali, Chawri Bazar, Delhi 110006',

                /*
                |--------------------------------------------------------------------------
                | Navbar
                |--------------------------------------------------------------------------
                */

                'nav_home_text' => 'Home',
                'nav_about_text' => 'About',
                'nav_products_text' => 'Products',
                'nav_contact_text' => 'Contact',

                'nav_call_label' => 'Call Us',

                'navbar_button_text' => 'Request Quote',
                'navbar_button_link' => null,

                /*
                |--------------------------------------------------------------------------
                | Navbar Mega Menu
                |--------------------------------------------------------------------------
                */

                'nav_collection_badge' => 'Collection',
                'nav_collection_title' => 'Hardware Products',

                'nav_more_products_badge' => 'More Products',
                'nav_more_products_title' => 'More Categories',

                'nav_featured_title' =>
                    'Hardware Product Collection',

                'nav_featured_description' =>
                    'Explore our available hardware categories and contact us for model-wise product details.',

                'nav_explore_products_text' =>
                    'Explore Products',

                'nav_enquiry_prompt' =>
                    'Looking for a specific hardware product?',

                'nav_contact_cta_text' =>
                    'Contact Us',

                /*
                |--------------------------------------------------------------------------
                | Footer
                |--------------------------------------------------------------------------
                */

                'footer_description' =>
                    'Explore our hardware product collection and contact M R Hardware for model-wise specifications and availability.',

                'footer_products_button_text' =>
                    'View Products',

                'footer_contact_button_text' =>
                    'Contact Us',

                'footer_quick_links_title' =>
                    'Quick Links',

                'footer_categories_title' =>
                    'Product Categories',

                'footer_contact_title' =>
                    'Contact Us',

                'footer_empty_categories_text' =>
                    'Categories coming soon.',

                'footer_whatsapp_text' =>
                    'WhatsApp',

                /*
                |--------------------------------------------------------------------------
                | Copyright
                |--------------------------------------------------------------------------
                */

                'copyright_text' => null,
            ]
        );


        return view(
            'admin.settings.edit',
            compact('siteSettings')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Settings
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request
    ): RedirectResponse {

        $validated = $request->validate([

            /*
            |--------------------------------------------------------------------------
            | Company
            |--------------------------------------------------------------------------
            */

            'company_name' => [
                'nullable',
                'string',
                'max:150',
            ],

            'tagline' => [
                'nullable',
                'string',
                'max:150',
            ],


            /*
            |--------------------------------------------------------------------------
            | Logo / Favicon
            |--------------------------------------------------------------------------
            */

            'logo' => [
                'nullable',
                'string',
                'max:500',
            ],

            'favicon' => [
                'nullable',
                'string',
                'max:500',
            ],


            /*
            |--------------------------------------------------------------------------
            | Contact
            |--------------------------------------------------------------------------
            */

            'phone' => [
                'nullable',
                'string',
                'max:50',
            ],

            'whatsapp' => [
                'nullable',
                'string',
                'max:50',
            ],

            'email' => [
                'nullable',
                'email',
                'max:190',
            ],

            'address' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | Navbar
            |--------------------------------------------------------------------------
            */

            'nav_home_text' => [
                'nullable',
                'string',
                'max:80',
            ],

            'nav_about_text' => [
                'nullable',
                'string',
                'max:80',
            ],

            'nav_products_text' => [
                'nullable',
                'string',
                'max:80',
            ],

            'nav_contact_text' => [
                'nullable',
                'string',
                'max:80',
            ],

            'nav_call_label' => [
                'nullable',
                'string',
                'max:80',
            ],

            'navbar_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'navbar_button_link' => [
                'nullable',
                'string',
                'max:500',
            ],


            /*
            |--------------------------------------------------------------------------
            | Navbar Mega Menu
            |--------------------------------------------------------------------------
            */

            'nav_collection_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'nav_collection_title' => [
                'nullable',
                'string',
                'max:150',
            ],

            'nav_more_products_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'nav_more_products_title' => [
                'nullable',
                'string',
                'max:150',
            ],

            'nav_featured_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'nav_featured_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'nav_explore_products_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'nav_enquiry_prompt' => [
                'nullable',
                'string',
                'max:250',
            ],

            'nav_contact_cta_text' => [
                'nullable',
                'string',
                'max:100',
            ],


            /*
            |--------------------------------------------------------------------------
            | Footer
            |--------------------------------------------------------------------------
            */

            'footer_description' => [
                'nullable',
                'string',
                'max:1500',
            ],

            'footer_products_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'footer_contact_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'footer_quick_links_title' => [
                'nullable',
                'string',
                'max:100',
            ],

            'footer_categories_title' => [
                'nullable',
                'string',
                'max:100',
            ],

            'footer_contact_title' => [
                'nullable',
                'string',
                'max:100',
            ],

            'footer_empty_categories_text' => [
                'nullable',
                'string',
                'max:200',
            ],

            'footer_whatsapp_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'copyright_text' => [
                'nullable',
                'string',
                'max:300',
            ],


            /*
            |--------------------------------------------------------------------------
            | Social Media
            |--------------------------------------------------------------------------
            */

            'facebook' => [
                'nullable',
                'url',
                'max:500',
            ],

            'instagram' => [
                'nullable',
                'url',
                'max:500',
            ],

            'linkedin' => [
                'nullable',
                'url',
                'max:500',
            ],

            'youtube' => [
                'nullable',
                'url',
                'max:500',
            ],
        ]);


        $siteSettings = SiteSetting::firstOrCreate(
            ['id' => 1]
        );


        $siteSettings->update(
            $validated
        );


        return back()->with(
            'success',
            'Website settings updated successfully.'
        );
    }
}