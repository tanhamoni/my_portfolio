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
        Schema::create('portfolio_settings', function (Blueprint $table) {
            $table->id();

            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('typed_text')->nullable();

            $table->text('hero_description')->nullable();

            $table->integer('projects_completed')->default(0);
            $table->integer('years_experience')->default(0);
            $table->integer('happy_clients')->default(0);

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('linkedin')->nullable();

            $table->string('card_one')->nullable();
            $table->string('card_two')->nullable();
            $table->string('card_three')->nullable();

            $table->string('profile_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('portfolio_settings');
    }
};