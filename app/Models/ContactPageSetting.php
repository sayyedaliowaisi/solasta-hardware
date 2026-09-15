<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactPageSetting extends Model
{
    protected $fillable = [
        'badge',
        'title',
        'description',

        'details_badge',
        'details_title',
        'details_description',

        'form_badge',
        'form_title',
        'form_description',
        'form_button_text',

        'map_embed',
        'show_map',
        'show_contact_cards',
    ];

    protected $casts = [
        'show_map' => 'boolean',
        'show_contact_cards' => 'boolean',
    ];
}