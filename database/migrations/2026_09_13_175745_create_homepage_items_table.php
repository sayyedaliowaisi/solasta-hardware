<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('homepage_items', function (Blueprint $table) {
            $table->id();

            $table->string('section')->index();

            $table->string('title')->nullable();

            $table->string('subtitle')->nullable();

            $table->text('description')->nullable();

            $table->string('value')->nullable();

            $table->string('icon')->nullable();

            $table->string('image')->nullable();

            $table->string('link')->nullable();

            $table->boolean('is_active')->default(true);

            $table->unsignedInteger('sort_order')->default(0);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('homepage_items');
    }
};