<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWhatsappToPortfolioSettingsTable extends Migration
{
    public function up(): void
    {
        Schema::table('portfolio_settings', function (Blueprint $table) {
            $table->string('whatsapp')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('portfolio_settings', function (Blueprint $table) {
            $table->dropColumn('whatsapp');
        });
    }
}