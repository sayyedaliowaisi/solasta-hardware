<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products_page_settings', function (Blueprint $table) {
            $table->id();

            $table->string('hero_badge')->nullable();
            $table->string('hero_products_text')->nullable();
            $table->string('hero_button_text')->nullable();

            $table->string('collection_label')->nullable();
            $table->string('collection_text')->nullable();

            $table->string('business_label')->nullable();
            $table->string('business_text')->nullable();

            $table->string('enquiry_badge')->nullable();
            $table->text('enquiry_text')->nullable();
            $table->string('enquiry_button_text')->nullable();

            $table->string('products_section_badge')->nullable();
            $table->string('view_product_text')->nullable();

            $table->string('empty_title')->nullable();
            $table->text('empty_text')->nullable();

            $table->string('cta_badge')->nullable();
            $table->string('cta_title')->nullable();
            $table->text('cta_description')->nullable();
            $table->string('cta_button_text')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products_page_settings');
    }
};