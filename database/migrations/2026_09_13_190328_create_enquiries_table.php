<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('enquiries')) {

            Schema::create('enquiries', function (Blueprint $table) {

                $table->id();

                $table->string('product')->nullable();

                $table->string('name');

                $table->string('phone', 30);

                $table->string('email')->nullable();

                $table->text('message');

                $table->string('status')
                    ->default('new');

                $table->text('admin_note')
                    ->nullable();

                $table->timestamps();

            });

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Existing enquiries table
        |--------------------------------------------------------------------------
        */

        Schema::table('enquiries', function (Blueprint $table) {

            if (!Schema::hasColumn('enquiries', 'status')) {

                $table->string('status')
                    ->default('new');

            }

            if (!Schema::hasColumn('enquiries', 'admin_note')) {

                $table->text('admin_note')
                    ->nullable();

            }

        });
    }


    public function down(): void
    {
        if (!Schema::hasTable('enquiries')) {
            return;
        }


        Schema::table('enquiries', function (Blueprint $table) {

            if (Schema::hasColumn('enquiries', 'admin_note')) {
                $table->dropColumn('admin_note');
            }

            if (Schema::hasColumn('enquiries', 'status')) {
                $table->dropColumn('status');
            }

        });
    }
};