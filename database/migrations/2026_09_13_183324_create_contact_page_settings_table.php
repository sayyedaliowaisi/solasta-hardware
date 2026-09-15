<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_page_settings', function (Blueprint $table) {
            $table->id();

            $table->string('badge')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('form_title')->nullable();
            $table->text('form_description')->nullable();

            $table->string('map_embed')->nullable();

            $table->boolean('show_map')->default(false);
            $table->boolean('show_contact_cards')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_page_settings');
    }
};