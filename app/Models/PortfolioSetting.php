<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSetting extends Model
{
    use HasFactory;

    protected $fillable = [

        // Hero Section
        'name',
        'designation',
        'typed_text',
        'hero_description',

        // Counter
        'projects_completed',
        'years_experience',
        'happy_clients',

        // Social Links
        'facebook',
        'twitter',
        'github',
        'linkedin',
        'whatsapp',

        // Service Cards
        'card_one',
        'card_two',
        'card_three',

        // Images
        'profile_image',
        'about_image',

        // About Section
        'about_description',

        // CTA Section
        'fun_fact',
        'button_text',
        'button_link',
        'resume_button_text',
        'resume_file',

    ];
}