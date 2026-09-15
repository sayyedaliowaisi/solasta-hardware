<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('about_page_items', function (Blueprint $table) {

            $table->id();

            /*
            |--------------------------------------------------------------------------
            | Parent Section
            |--------------------------------------------------------------------------
            */

            $table->foreignId('about_page_setting_id')
                ->constrained('about_page_settings')
                ->cascadeOnDelete();

            /*
            |--------------------------------------------------------------------------
            | Item Content
            |--------------------------------------------------------------------------
            */

            $table->string('title')->nullable();

            $table->string('subtitle')->nullable();

            $table->text('description')->nullable();

            $table->string('value')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Media / Icon
            |--------------------------------------------------------------------------
            */

            $table->string('icon')->nullable();

            $table->string('image')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Optional Link
            |--------------------------------------------------------------------------
            */

            $table->string('link')->nullable();

            /*
            |--------------------------------------------------------------------------
            | Status / Order
            |--------------------------------------------------------------------------
            */

            $table->boolean('is_active')
                ->default(true);

            $table->unsignedInteger('sort_order')
                ->default(0);

            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('about_page_items');
    }
};