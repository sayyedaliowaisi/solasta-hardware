<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_detail_page_settings', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Product Detail Navigation / Labels
            |--------------------------------------------------------------------------
            */

            $table->string('back_to_products_text')->nullable();

            $table->string('collection_button_text')->nullable();

            $table->string('related_section_badge')->nullable();
            $table->string('related_section_title')->nullable();
            $table->string('related_product_button_text')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Product Information
            |--------------------------------------------------------------------------
            */

            $table->string('product_badge')->nullable();

            $table->string('specifications_title')->nullable();

            $table->text('specifications_note')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Enquiry Card
            |--------------------------------------------------------------------------
            */

            $table->string('enquiry_badge')->nullable();

            $table->string('enquiry_title')->nullable();

            $table->text('enquiry_description')->nullable();

            $table->string('enquiry_button_text')->nullable();


            /*
            |--------------------------------------------------------------------------
            | Bottom CTA
            |--------------------------------------------------------------------------
            */

            $table->string('cta_badge')->nullable();

            $table->string('cta_title')->nullable();

            $table->text('cta_description')->nullable();

            $table->string('cta_button_text')->nullable();


            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('product_detail_page_settings');
    }
};