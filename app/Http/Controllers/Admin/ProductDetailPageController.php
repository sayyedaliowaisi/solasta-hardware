<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductDetailPageSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductDetailPageController extends Controller
{
    public function edit(): View
    {
        $productDetailPage = ProductDetailPageSetting::firstOrCreate(
            ['id' => 1],
            [
                'back_to_products_text' => 'Back to Products',
                'collection_button_text' => 'View Full Collection',

                'related_section_badge' => 'Related Products',
                'related_section_title' => 'You may also like',
                'related_product_button_text' => 'View Product',

                'product_badge' => 'Product Details',
                'specifications_title' => 'Product Information',
                'specifications_note' =>
                    'Contact us for model-wise specifications, availability and business enquiries.',

                'enquiry_badge' => 'Product Enquiry',
                'enquiry_title' => 'Need details for this product?',
                'enquiry_description' =>
                    'Send us an enquiry for model-wise specifications, availability and business requirements.',
                'enquiry_button_text' => 'Send Enquiry',

                'cta_badge' => 'M R Hardware',
                'cta_title' => 'Need details for this product?',
                'cta_description' =>
                    'Contact us for product availability, specifications and business enquiries.',
                'cta_button_text' => 'Send Enquiry',
            ]
        );

        return view(
            'admin.product-detail-page.edit',
            compact('productDetailPage')
        );
    }


    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'back_to_products_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'collection_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'related_section_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'related_section_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'related_product_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'product_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'specifications_title' => [
                'nullable',
                'string',
                'max:150',
            ],

            'specifications_note' => [
                'nullable',
                'string',
                'max:500',
            ],

            'enquiry_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'enquiry_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'enquiry_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'enquiry_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'cta_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'cta_title' => [
                'nullable',
                'string',
                'max:200',
            ],

            'cta_description' => [
                'nullable',
                'string',
                'max:500',
            ],

            'cta_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],
        ]);

        $productDetailPage =
            ProductDetailPageSetting::firstOrCreate(['id' => 1]);

        $productDetailPage->update($validated);

        return back()->with(
            'success',
            'Product detail page settings updated successfully.'
        );
    }
}