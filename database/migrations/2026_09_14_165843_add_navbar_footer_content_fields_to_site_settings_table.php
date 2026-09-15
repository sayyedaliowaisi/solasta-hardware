<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            /*
            |--------------------------------------------------------------------------
            | Shared Brand
            |--------------------------------------------------------------------------
            */

            $table->string('tagline')
                ->nullable()
                ->after('company_name');


            /*
            |--------------------------------------------------------------------------
            | Navbar
            |--------------------------------------------------------------------------
            */

            $table->string('nav_home_text')
                ->nullable()
                ->after('tagline');

            $table->string('nav_about_text')
                ->nullable()
                ->after('nav_home_text');

            $table->string('nav_products_text')
                ->nullable()
                ->after('nav_about_text');

            $table->string('nav_contact_text')
                ->nullable()
                ->after('nav_products_text');

            $table->string('nav_call_label')
                ->nullable()
                ->after('nav_contact_text');


            /*
            |--------------------------------------------------------------------------
            | Navbar Mega Menu
            |--------------------------------------------------------------------------
            */

            $table->string('nav_collection_badge')
                ->nullable()
                ->after('nav_call_label');

            $table->string('nav_collection_title')
                ->nullable()
                ->after('nav_collection_badge');

            $table->string('nav_more_products_badge')
                ->nullable()
                ->after('nav_collection_title');

            $table->string('nav_more_products_title')
                ->nullable()
                ->after('nav_more_products_badge');

            $table->string('nav_featured_title')
                ->nullable()
                ->after('nav_more_products_title');

            $table->text('nav_featured_description')
                ->nullable()
                ->after('nav_featured_title');

            $table->string('nav_explore_products_text')
                ->nullable()
                ->after('nav_featured_description');

            $table->string('nav_enquiry_prompt')
                ->nullable()
                ->after('nav_explore_products_text');

            $table->string('nav_contact_cta_text')
                ->nullable()
                ->after('nav_enquiry_prompt');


            /*
            |--------------------------------------------------------------------------
            | Footer
            |--------------------------------------------------------------------------
            */

            $table->string('footer_products_button_text')
                ->nullable()
                ->after('footer_description');

            $table->string('footer_contact_button_text')
                ->nullable()
                ->after('footer_products_button_text');

            $table->string('footer_quick_links_title')
                ->nullable()
                ->after('footer_contact_button_text');

            $table->string('footer_categories_title')
                ->nullable()
                ->after('footer_quick_links_title');

            $table->string('footer_contact_title')
                ->nullable()
                ->after('footer_categories_title');

            $table->string('footer_empty_categories_text')
                ->nullable()
                ->after('footer_contact_title');

            $table->string('footer_whatsapp_text')
                ->nullable()
                ->after('footer_empty_categories_text');
        });
    }


    public function down(): void
    {
        Schema::table('site_settings', function (Blueprint $table) {

            $table->dropColumn([
                'tagline',

                'nav_home_text',
                'nav_about_text',
                'nav_products_text',
                'nav_contact_text',
                'nav_call_label',

                'nav_collection_badge',
                'nav_collection_title',
                'nav_more_products_badge',
                'nav_more_products_title',
                'nav_featured_title',
                'nav_featured_description',
                'nav_explore_products_text',
                'nav_enquiry_prompt',
                'nav_contact_cta_text',

                'footer_products_button_text',
                'footer_contact_button_text',
                'footer_quick_links_title',
                'footer_categories_title',
                'footer_contact_title',
                'footer_empty_categories_text',
                'footer_whatsapp_text',
            ]);
        });
    }
};