<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AboutPageSetting extends Model
{
    protected $fillable = [
        'section',
        'badge',
        'title',
        'subtitle',
        'description',
        'image',
        'button_text',
        'button_link',
        'is_active',
        'sort_order',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(AboutPageItem::class)
            ->orderBy('sort_order')
            ->orderBy('id');
    }
}