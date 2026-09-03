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
        Schema::create('contact_settings', function (Blueprint $table) {

            $table->id();

            $table->string('location')->nullable();
            $table->string('country')->nullable();

            $table->string('phone')->nullable();
            $table->string('phone2')->nullable();

            $table->string('email')->nullable();
            $table->string('email2')->nullable();

            $table->text('contact_description')->nullable();

            $table->string('form_title')->nullable();
            $table->text('form_description')->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_settings');
    }
};