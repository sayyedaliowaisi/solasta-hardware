<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactPageSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ContactPageController extends Controller
{
    public function edit(): View
    {
        $contactSettings =
            ContactPageSetting::firstOrCreate(
                ['id' => 1],
                [
                    'badge' => 'Contact Us',

                    'title' => "Let's Talk",

                    'description' =>
                        'Contact us for product enquiries, availability and business information.',


                    'details_badge' =>
                        'Contact Details',

                    'details_title' =>
                        'Get in touch',

                    'details_description' =>
                        'Contact M R Hardware for product enquiries, availability and business information.',


                    'form_badge' =>
                        'Enquiry Form',

                    'form_title' =>
                        'Send us a message',

                    'form_description' =>
                        'Share your requirement and our team will get back to you.',

                    'form_button_text' =>
                        'Send Enquiry',


                    'map_embed' => null,

                    'show_map' => false,

                    'show_contact_cards' => true,
                ]
            );


        return view(
            'admin.contact-page.edit',
            compact('contactSettings')
        );
    }


    public function update(
        Request $request
    ): RedirectResponse {

        $validated = $request->validate([
            /*
            |--------------------------------------------------------------------------
            | Hero
            |--------------------------------------------------------------------------
            */

            'badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | Contact Details Section
            |--------------------------------------------------------------------------
            */

            'details_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'details_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'details_description' => [
                'nullable',
                'string',
                'max:1000',
            ],


            /*
            |--------------------------------------------------------------------------
            | Form Section
            |--------------------------------------------------------------------------
            */

            'form_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'form_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'form_description' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'form_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],


            /*
            |--------------------------------------------------------------------------
            | Map
            |--------------------------------------------------------------------------
            */

            'map_embed' => [
                'nullable',
                'string',
                'max:5000',
            ],

            'show_map' => [
                'nullable',
                'boolean',
            ],

            'show_contact_cards' => [
                'nullable',
                'boolean',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Checkbox Values
        |--------------------------------------------------------------------------
        */

        $validated['show_map'] =
            $request->boolean('show_map');

        $validated['show_contact_cards'] =
            $request->boolean('show_contact_cards');


        /*
        |--------------------------------------------------------------------------
        | Save Settings
        |--------------------------------------------------------------------------
        */

        $contactSettings =
            ContactPageSetting::firstOrCreate(
                ['id' => 1]
            );

        $contactSettings->update(
            $validated
        );


        return back()->with(
            'success',
            'Contact page settings updated successfully.'
        );
    }
}