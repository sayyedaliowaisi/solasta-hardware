<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('categories', function (Blueprint $table) {

            if (!Schema::hasColumn('categories', 'hero_image')) {
                $table->string('hero_image', 1000)
                    ->nullable();
            }

            if (!Schema::hasColumn('categories', 'banner_image')) {
                $table->string('banner_image', 1000)
                    ->nullable();
            }

        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {

            if (Schema::hasColumn('categories', 'hero_image')) {
                $table->dropColumn('hero_image');
            }

            if (Schema::hasColumn('categories', 'banner_image')) {
                $table->dropColumn('banner_image');
            }

        });
    }
};