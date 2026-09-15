<?php

namespace App\Http\Controllers;

use App\Models\AboutPageSetting;

class AboutController extends Controller
{
    public function index()
    {
        $aboutSections = AboutPageSetting::query()
            ->with([
                'items' => function ($query) {
                    $query->where('is_active', true)
                        ->orderBy('sort_order')
                        ->orderBy('id');
                }
            ])
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get()
            ->keyBy('section');

        return view(
            'pages.about',
            compact('aboutSections')
        );
    }
}