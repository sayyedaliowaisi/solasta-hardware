<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('products', 'price')) {

            Schema::table('products', function (Blueprint $table) {
                $table->decimal('price', 10, 2)
                    ->default(1000);
            });

        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('products', 'price')) {

            Schema::table('products', function (Blueprint $table) {
                $table->dropColumn('price');
            });

        }
    }
};