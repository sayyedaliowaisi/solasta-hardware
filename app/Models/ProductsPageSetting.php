<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductsPageSetting extends Model
{
    protected $fillable = [

        'hero_badge',
        'hero_products_text',
        'hero_button_text',

        'collection_label',
        'collection_text',

        'business_label',
        'business_text',

        'enquiry_badge',
        'enquiry_text',
        'enquiry_button_text',

        'products_section_badge',
        'view_product_text',

        'empty_title',
        'empty_text',

        'cta_badge',
        'cta_title',
        'cta_description',
        'cta_button_text',
    ];
}