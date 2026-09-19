<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',

        'image',
        'gallery',
        'video',

        'rating',
        'review_count',

        'product_types',

        'detail_content',
        'detail_features',

        'specifications',
        'dimensions',
        'installation_steps',
        'faqs',

        'is_active',
        'is_featured',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price' => 'decimal:2',

            'gallery' => 'array',

            'rating' => 'decimal:1',
            'review_count' => 'integer',

            'product_types' => 'array',

            'detail_features' => 'array',
            'specifications' => 'array',
            'dimensions' => 'array',
            'installation_steps' => 'array',
            'faqs' => 'array',

            'is_active' => 'boolean',
            'is_featured' => 'boolean',

            'sort_order' => 'integer',
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}