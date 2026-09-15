<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductsPageSetting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductsPageController extends Controller
{
    /**
     * Show Products Page CMS form.
     */
    public function edit(): View
    {
        $productsPage = ProductsPageSetting::firstOrCreate(
            ['id' => 1],
            [
                'hero_badge' => 'Product Catalogue',
                'hero_products_text' => 'Products Available',
                'hero_button_text' => 'Explore Products',

                'collection_label' => 'Collection',
                'collection_text' => 'Products in this category',

                'business_label' => 'Business',
                'business_text' => 'Manufacturing & Trading',

                'enquiry_badge' => 'Need a specific model?',
                'enquiry_text' => 'Open any product for a closer view or send an enquiry for model-wise specifications and availability.',
                'enquiry_button_text' => 'Send Enquiry',

                'products_section_badge' => 'Our Collection',
                'view_product_text' => 'View Product',

                'empty_title' => 'No products found',
                'empty_text' => 'No active products are currently available in this category.',

                'cta_badge' => 'Product Enquiry',
                'cta_title' => 'Looking for a particular model?',
                'cta_description' => 'Contact us for model-wise specifications, availability and business enquiries.',
                'cta_button_text' => 'Send Enquiry',
            ]
        );

        return view(
            'admin.products-page.edit',
            compact('productsPage')
        );
    }


    /**
     * Update Products Page CMS settings.
     */
    public function update(Request $request): RedirectResponse
    {
        $validated = $request->validate([

            // Hero
            'hero_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'hero_products_text' => [
                'nullable',
                'string',
                'max:100',
            ],

            'hero_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],


            // Collection cards
            'collection_label' => [
                'nullable',
                'string',
                'max:100',
            ],

            'collection_text' => [
                'nullable',
                'string',
                'max:150',
            ],


            // Business card
            'business_label' => [
                'nullable',
                'string',
                'max:100',
            ],

            'business_text' => [
                'nullable',
                'string',
                'max:150',
            ],


            // Enquiry panel
            'enquiry_badge' => [
                'nullable',
                'string',
                'max:150',
            ],

            'enquiry_text' => [
                'nullable',
                'string',
                'max:500',
            ],

            'enquiry_button_text' => [
                'nullable',
                'string',
                'max:100',
            ],


            // Product collection
            'products_section_badge' => [
                'nullable',
                'string',
                'max:100',
            ],

            'view_product_text' => [
                'nullable',
                'string',
                'max:100',
            ],


            // Empty state
            'empty_title' => [
                'nullable',
                'string',
                'max:150',
            ],

            'empty_text' => [
                'nullable',
                'string',
                'max:500',
            ],


            // Final CTA
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


        $productsPage = ProductsPageSetting::firstOrCreate([
            'id' => 1,
        ]);

        $productsPage->update($validated);


        return back()->with(
            'success',
            'Products page settings updated successfully.'
        );
    }
}