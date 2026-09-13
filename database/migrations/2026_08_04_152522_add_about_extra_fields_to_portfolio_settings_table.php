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
            if (!Schema::hasColumn('portfolio_settings', 'typed_text')) {
                $table->string('typed_text')->nullable();
            }
            if (!Schema::hasColumn('portfolio_settings', 'fun_fact')) {
                $table->string('fun_fact')->nullable();
            }
            if (!Schema::hasColumn('portfolio_settings', 'button_text')) {
                $table->string('button_text')->nullable();
            }
            if (!Schema::hasColumn('portfolio_settings', 'button_link')) {
                $table->string('button_link')->nullable();
            }
            if (!Schema::hasColumn('portfolio_settings', 'resume_button_text')) {
                $table->string('resume_button_text')->nullable();
            }
            if (!Schema::hasColumn('portfolio_settings', 'resume_file')) {
                $table->string('resume_file')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('portfolio_settings', function (Blueprint $table) {
            $columnsToDrop = [];

            foreach (['typed_text', 'fun_fact', 'button_text', 'button_link', 'resume_button_text', 'resume_file'] as $column) {
                if (Schema::hasColumn('portfolio_settings', $column)) {
                    $columnsToDrop[] = $column;
                }
            }

            if (!empty($columnsToDrop)) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};