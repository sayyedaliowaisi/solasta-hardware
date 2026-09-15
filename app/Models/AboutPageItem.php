<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AboutPageItem extends Model
{
    protected $fillable = [
        'about_page_setting_id',
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

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    public function section(): BelongsTo
    {
        return $this->belongsTo(
            AboutPageSetting::class,
            'about_page_setting_id'
        );
    }
}