<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageItem extends Model
{
    protected $fillable = [
        'section',
        'title',
        'subtitle',
        'description',
        'value',
        'icon',
        'image',
        'link',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}