<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('portfolio_settings', function (Blueprint $table) {

            $table->string('typed_text')->nullable()->after('designation');

            $table->integer('projects_completed')->default(0);
            $table->integer('years_experience')->default(0);
            $table->integer('happy_clients')->default(0);

            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('github')->nullable();
            $table->string('instagram')->nullable();

            $table->string('card_one')->nullable();
            $table->string('card_two')->nullable();
            $table->string('card_three')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('portfolio_settings', function (Blueprint $table) {

            $table->dropColumn([
                'typed_text',
                'projects_completed',
                'years_experience',
                'happy_clients',
                'facebook',
                'twitter',
                'github',
                'instagram',
                'card_one',
                'card_two',
                'card_three',
            ]);
        });
    }
};