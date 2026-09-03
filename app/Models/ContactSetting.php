<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    protected $table = 'contact_settings';

    protected $fillable = [

        'location',
        'country',

        'phone',
        'phone2',

        'email',
        'email2',

        'contact_description',

        'form_title',
        'form_description',

    ];
}