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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->longText('address_one');
            $table->longText('address_two');
            $table->integer('provinces_id');
            $table->integer('regencies_id');
            $table->integer('zip_code');
            $table->string('country');
            $table->string('phone_number');
            $table->string('store_name');
            $table->integer('categories_id');
            $table->integer('store_status');

            // Agar user ngk kedelete permanent
            $table->softDeletes();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
