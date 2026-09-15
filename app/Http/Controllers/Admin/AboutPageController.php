<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutPageSetting;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Edit About Page
    |--------------------------------------------------------------------------
    */

    public function edit()
    {
        $sections = AboutPageSetting::with([
            'items' => function ($query) {
                $query->orderBy('sort_order')
                    ->orderBy('id');
            }
        ])
        ->orderBy('sort_order')
        ->get();

        return view(
            'admin.about-page.edit',
            compact('sections')
        );
    }


    /*
    |--------------------------------------------------------------------------
    | Update About Page
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $validated = $request->validate([

            'sections' => [
                'required',
                'array',
            ],

            'sections.*.id' => [
                'required',
                'exists:about_page_settings,id',
            ],

            'sections.*.badge' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sections.*.title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sections.*.subtitle' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sections.*.description' => [
                'nullable',
                'string',
            ],

            'sections.*.image' => [
                'nullable',
                'string',
                'max:500',
            ],

            'sections.*.button_text' => [
                'nullable',
                'string',
                'max:255',
            ],

            'sections.*.button_link' => [
                'nullable',
                'string',
                'max:500',
            ],

            /*
            |--------------------------------------------------------------------------
            | Important
            |--------------------------------------------------------------------------
            | Checkbox checked hone par "1" aayega.
            | Unchecked hone par field request me nahi aayegi.
            */

            'sections.*.is_active' => [
                'nullable',
                'boolean',
            ],

            'sections.*.sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],

        ]);


        /*
        |--------------------------------------------------------------------------
        | Update Sections
        |--------------------------------------------------------------------------
        */

        foreach ($validated['sections'] as $sectionData) {

            $section = AboutPageSetting::findOrFail(
                $sectionData['id']
            );


            $section->update([

                'badge' =>
                    $sectionData['badge'] ?? null,

                'title' =>
                    $sectionData['title'] ?? null,

                'subtitle' =>
                    $sectionData['subtitle'] ?? null,

                'description' =>
                    $sectionData['description'] ?? null,

                'image' =>
                    $sectionData['image'] ?? null,

                'button_text' =>
                    $sectionData['button_text'] ?? null,

                'button_link' =>
                    $sectionData['button_link'] ?? null,

                /*
                |--------------------------------------------------------------------------
                | Active / Inactive
                |--------------------------------------------------------------------------
                */

                'is_active' =>
                    !empty($sectionData['is_active']),

                'sort_order' =>
                    $sectionData['sort_order'] ?? 0,

            ]);
        }


        return back()->with(
            'success',
            'About page updated successfully.'
        );
    }
}