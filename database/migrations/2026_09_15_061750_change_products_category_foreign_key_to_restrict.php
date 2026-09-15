<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * Prevent a category from being deleted while
     * products are still assigned to that category.
     */
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {

            // Remove old CASCADE foreign key
            $table->dropForeign(['category_id']);

            // Add safer RESTRICT foreign key
            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * Restore the original CASCADE behavior if rolled back.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {

            $table->dropForeign(['category_id']);

            $table->foreign('category_id')
                ->references('id')
                ->on('categories')
                ->cascadeOnDelete();
        });
    }
};