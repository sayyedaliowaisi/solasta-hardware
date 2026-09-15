<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('contact_page_settings', function (Blueprint $table) {

            $table->string('details_badge')
                ->nullable()
                ->after('description');

            $table->string('details_title')
                ->nullable()
                ->after('details_badge');

            $table->text('details_description')
                ->nullable()
                ->after('details_title');


            $table->string('form_badge')
                ->nullable()
                ->after('details_description');

            $table->string('form_button_text')
                ->nullable()
                ->after('form_description');
        });
    }

    public function down(): void
    {
        Schema::table('contact_page_settings', function (Blueprint $table) {

            $table->dropColumn([
                'details_badge',
                'details_title',
                'details_description',
                'form_badge',
                'form_button_text',
            ]);
        });
    }
};