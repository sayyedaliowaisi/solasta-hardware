<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageItem;
use App\Models\AboutPageSetting;
use Illuminate\Http\Request;

class AboutPageItemController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store New Item
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $validated = $request->validate([
            'about_page_setting_id' => [
                'required',
                'exists:about_page_settings,id',
            ],

            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'value' => [
                'nullable',
                'string',
                'max:255',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'string',
                'max:500',
            ],

            'link' => [
                'nullable',
                'string',
                'max:500',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);


        AboutPageItem::create([
            'about_page_setting_id' =>
                $validated['about_page_setting_id'],

            'title' =>
                $validated['title'] ?? null,

            'subtitle' =>
                $validated['subtitle'] ?? null,

            'description' =>
                $validated['description'] ?? null,

            'value' =>
                $validated['value'] ?? null,

            'icon' =>
                $validated['icon'] ?? null,

            'image' =>
                $validated['image'] ?? null,

            'link' =>
                $validated['link'] ?? null,

            'sort_order' =>
                $validated['sort_order'] ?? 0,

            'is_active' => true,
        ]);


        return back()->with(
            'success',
            'About page item added successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update Item
    |--------------------------------------------------------------------------
    */

    public function update(
        Request $request,
        AboutPageItem $item
    ) {
        $validated = $request->validate([
            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'subtitle' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'value' => [
                'nullable',
                'string',
                'max:255',
            ],

            'icon' => [
                'nullable',
                'string',
                'max:255',
            ],

            'image' => [
                'nullable',
                'string',
                'max:500',
            ],

            'link' => [
                'nullable',
                'string',
                'max:500',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

            'is_active' => [
                'nullable',
                'boolean',
            ],
        ]);


        $item->update([
            'title' =>
                $validated['title'] ?? null,

            'subtitle' =>
                $validated['subtitle'] ?? null,

            'description' =>
                $validated['description'] ?? null,

            'value' =>
                $validated['value'] ?? null,

            'icon' =>
                $validated['icon'] ?? null,

            'image' =>
                $validated['image'] ?? null,

            'link' =>
                $validated['link'] ?? null,

            'sort_order' =>
                $validated['sort_order'] ?? 0,

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return back()->with(
            'success',
            'About page item updated successfully.'
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Delete Item
    |--------------------------------------------------------------------------
    */

    public function destroy(AboutPageItem $item)
    {
        $item->delete();

        return back()->with(
            'success',
            'About page item deleted successfully.'
        );
    }
}