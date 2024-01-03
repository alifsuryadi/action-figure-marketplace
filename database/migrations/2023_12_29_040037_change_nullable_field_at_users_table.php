<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Default nullable true
            $table->longText('address_one')->nullable();
            $table->longText('address_two')->nullable();
            $table->integer('provinces_id')->nullable();
            $table->integer('regencies_id')->nullable();
            $table->integer('zip_code')->nullable();
            $table->string('country')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('store_name')->nullable();
            $table->integer('categories_id')->nullable();
            $table->integer('store_status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->longText('address_one')->nullable(false);
            $table->longText('address_two')->nullable(false);
            $table->integer('provinces_id')->nullable(false);
            $table->integer('regencies_id')->nullable(false);
            $table->integer('zip_code')->nullable(false);
            $table->string('country')->nullable(false);
            $table->string('phone_number')->nullable(false);
            $table->string('store_name')->nullable(false);
            $table->integer('categories_id')->nullable(false);
            $table->integer('store_status')->nullable(false);
        });
    }
};