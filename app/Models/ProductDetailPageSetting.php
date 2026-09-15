<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetailPageSetting extends Model
{
    protected $fillable = [
        'back_to_products_text',
        'collection_button_text',

        'related_section_badge',
        'related_section_title',
        'related_product_button_text',

        'product_badge',
        'specifications_title',
        'specifications_note',

        'enquiry_badge',
        'enquiry_title',
        'enquiry_description',
        'enquiry_button_text',

        'cta_badge',
        'cta_title',
        'cta_description',
        'cta_button_text',
    ];
}