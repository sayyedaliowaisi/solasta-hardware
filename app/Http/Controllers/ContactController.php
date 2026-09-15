<?php

namespace App\Http\Controllers;

use App\Models\ContactPageSetting;
use App\Models\SiteSetting;

class ContactController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Contact Page Settings
        |--------------------------------------------------------------------------
        | Public GET request par database me row create nahi karenge.
        */

        $contactSettings =
            ContactPageSetting::first();


        /*
        |--------------------------------------------------------------------------
        | Site Settings
        |--------------------------------------------------------------------------
        */

        $siteSettings =
            SiteSetting::first();


        /*
        |--------------------------------------------------------------------------
        | Safe Fallback Objects
        |--------------------------------------------------------------------------
        | Agar settings row abhi database me na ho to
        | Blade error nahi karega.
        */

        if (!$contactSettings) {
            $contactSettings = new ContactPageSetting([
                'badge' => 'Contact Us',
                'title' => "Let's Talk",
                'description' =>
                    'Contact us for product enquiries, availability and business information.',

                'details_badge' => 'Contact Details',
                'details_title' => 'Get in touch',
                'details_description' =>
                    'Contact M R Hardware for product enquiries, availability and business information.',

                'form_badge' => 'Enquiry Form',
                'form_title' => 'Send us a message',
                'form_description' =>
                    'Share your requirement and our team will get back to you.',

                'form_button_text' => 'Send Enquiry',

                'show_map' => false,
                'show_contact_cards' => true,
            ]);
        }


        if (!$siteSettings) {
            $siteSettings = new SiteSetting([
                'company_name' => 'M R Hardware',
                'phone' => '9811510846',
                'email' => 'mrhardware04@gmail.com',
                'address' =>
                    '3335/107-108 Sharda Mata Complex, Gali Bajrang Bali, Chawri Bazar, Delhi 110006',
            ]);
        }


        return view(
            'pages.contact',
            compact(
                'contactSettings',
                'siteSettings'
            )
        );
    }
}