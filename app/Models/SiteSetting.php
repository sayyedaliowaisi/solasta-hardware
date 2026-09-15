<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [

        /*
        |--------------------------------------------------------------------------
        | Company
        |--------------------------------------------------------------------------
        */

        'company_name',
        'tagline',
        'logo',
        'favicon',

        /*
        |--------------------------------------------------------------------------
        | Contact
        |--------------------------------------------------------------------------
        */

        'phone',
        'whatsapp',
        'email',
        'address',

        /*
        |--------------------------------------------------------------------------
        | Navbar
        |--------------------------------------------------------------------------
        */

        'nav_home_text',
        'nav_about_text',
        'nav_products_text',
        'nav_contact_text',
        'nav_call_label',

        'navbar_button_text',
        'navbar_button_link',

        /*
        |--------------------------------------------------------------------------
        | Navbar Mega Menu
        |--------------------------------------------------------------------------
        */

        'nav_collection_badge',
        'nav_collection_title',

        'nav_more_products_badge',
        'nav_more_products_title',

        'nav_featured_title',
        'nav_featured_description',

        'nav_explore_products_text',

        'nav_enquiry_prompt',
        'nav_contact_cta_text',

        /*
        |--------------------------------------------------------------------------
        | Footer
        |--------------------------------------------------------------------------
        */

        'footer_description',

        'footer_products_button_text',
        'footer_contact_button_text',

        'footer_quick_links_title',
        'footer_categories_title',
        'footer_contact_title',

        'footer_empty_categories_text',
        'footer_whatsapp_text',

        'copyright_text',

        /*
        |--------------------------------------------------------------------------
        | Social Media
        |--------------------------------------------------------------------------
        */

        'facebook',
        'instagram',
        'linkedin',
        'youtube',
    ];
}