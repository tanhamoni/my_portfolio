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
        Schema::table('portfolio_settings', function (Blueprint $table) {

            $table->string('fun_fact')->nullable()->after('about_description');

            $table->string('button_text')->nullable()->after('fun_fact');

            $table->string('button_link')->nullable()->after('button_text');

            $table->string('resume_button_text')->nullable()->after('button_link');

            $table->string('resume_file')->nullable()->after('resume_button_text');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_settings', function (Blueprint $table) {

            $table->dropColumn([
                'fun_fact',
                'button_text',
                'button_link',
                'resume_button_text',
                'resume_file'
            ]);

        });
    }
};