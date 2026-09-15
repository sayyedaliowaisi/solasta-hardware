<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomepageItem;
use App\Models\HomepageSection;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class HomepageSectionController extends Controller
{
    private array $allowedSections = [
        'why_choose',
        'stats',
        'brands',
        'process',
        'testimonials',
    ];


    public function index(Request $request)
    {
        $sectionName = $request->query(
            'section',
            'why_choose'
        );

        if (
            !in_array(
                $sectionName,
                $this->allowedSections,
                true
            )
        ) {
            $sectionName = 'why_choose';
        }


        $section = HomepageSection::firstOrCreate(
            [
                'section' => $sectionName,
            ],
            [
                'is_active' => true,
            ]
        );


        $items = HomepageItem::query()
            ->where('section', $sectionName)
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();


        return view(
            'admin.homepage-sections.index',
            [
                'section' => $section,
                'sectionName' => $sectionName,
                'items' => $items,
                'allowedSections' => $this->allowedSections,
            ]
        );
    }


    public function updateSection(
        Request $request,
        HomepageSection $section
    ) {
        $validated = $request->validate([
            'badge' => [
                'nullable',
                'string',
                'max:255',
            ],

            'title' => [
                'nullable',
                'string',
                'max:255',
            ],

            'description' => [
                'nullable',
                'string',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);


        $section->update([
            ...$validated,

            'is_active' =>
                $request->boolean('is_active'),

            'sort_order' =>
                $validated['sort_order'] ?? 0,
        ]);


        return back()->with(
            'success',
            'Section updated successfully.'
        );
    }


    public function storeItem(Request $request)
    {
        $validated = $this->validateItem(
            $request
        );


        HomepageItem::create([
            ...$validated,

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return back()->with(
            'success',
            'Homepage item added successfully.'
        );
    }


    public function editItem(
        HomepageItem $item
    ) {
        return view(
            'admin.homepage-sections.edit-item',
            compact('item')
        );
    }


    public function updateItem(
        Request $request,
        HomepageItem $item
    ) {
        $validated = $this->validateItem(
            $request
        );


        $item->update([
            ...$validated,

            'is_active' =>
                $request->boolean('is_active'),
        ]);


        return redirect()
            ->route(
                'admin.homepage.sections',
                [
                    'section' =>
                        $item->section,
                ]
            )
            ->with(
                'success',
                'Homepage item updated.'
            );
    }


    public function destroyItem(
        HomepageItem $item
    ) {
        $section = $item->section;

        $item->delete();


        return redirect()
            ->route(
                'admin.homepage.sections',
                [
                    'section' => $section,
                ]
            )
            ->with(
                'success',
                'Homepage item deleted.'
            );
    }


    private function validateItem(
        Request $request
    ): array {
        return $request->validate([
            'section' => [
                'required',

                Rule::in(
                    $this->allowedSections
                ),
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
                'max:1000',
            ],

            'link' => [
                'nullable',
                'string',
                'max:1000',
            ],

            'sort_order' => [
                'nullable',
                'integer',
                'min:0',
            ],
        ]);
    }
}