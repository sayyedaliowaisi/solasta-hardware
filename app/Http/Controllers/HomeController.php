<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\HomepageSetting;
use App\Models\Product;
use App\Models\HomepageItem;
use App\Models\HomepageSection;

class HomeController extends Controller
{
    public function index()
    {
        $homepage = HomepageSetting::firstOrCreate([
            'id' => 1,
        ]);

        $categories = Category::query()
            ->where('is_active', true)
            ->with([
                'products' => function ($query) {
                    $query
                        ->where('is_active', true)
                        ->orderBy('sort_order');
                },
            ])
            ->orderBy('sort_order')
            ->limit(8)
            ->get();


        $featuredProducts = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->where('is_featured', true)
            ->whereHas('category', function ($query) {
                $query->where('is_active', true);
            })
            ->orderBy('sort_order')
            ->limit(12)
            ->get();


        /*
         * Agar admin ne abhi featured products
         * select nahi kiye hain to fallback.
         */
        if ($featuredProducts->isEmpty()) {

            $featuredProducts = Product::query()
                ->with('category')
                ->where('is_active', true)
                ->whereHas('category', function ($query) {
                    $query->where('is_active', true);
                })
                ->orderBy('sort_order')
                ->limit(12)
                ->get();

        }

        $homepageSections = HomepageSection::query()
    ->where('is_active', true)
    ->orderBy('sort_order')
    ->get()
    ->keyBy('section');


$homepageItems = HomepageItem::query()
    ->where('is_active', true)
    ->orderBy('sort_order')
    ->orderBy('id')
    ->get()
    ->groupBy('section');


        return view(
            'pages.home',
            compact(
                'homepage',
                'categories',
                'featuredProducts',
                'homepageSections',
                'homepageItems'
            )
        );
    }
}