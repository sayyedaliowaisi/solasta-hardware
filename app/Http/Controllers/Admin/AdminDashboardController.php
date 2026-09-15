<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Enquiry;
use App\Models\Product;

class AdminDashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | Product Statistics
        |--------------------------------------------------------------------------
        */

        $productCount = Product::count();

        $activeProductCount = Product::where(
            'is_active',
            true
        )->count();

        $featuredProductCount = Product::where(
            'is_featured',
            true
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Category Statistics
        |--------------------------------------------------------------------------
        */

        $categoryCount = Category::count();

        $activeCategoryCount = Category::where(
            'is_active',
            true
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Enquiry Statistics
        |--------------------------------------------------------------------------
        */

        $enquiryCount = Enquiry::count();

        $newEnquiryCount = Enquiry::where(
            'status',
            'new'
        )->count();

        $readEnquiryCount = Enquiry::where(
            'status',
            'read'
        )->count();

        $contactedEnquiryCount = Enquiry::where(
            'status',
            'contacted'
        )->count();

        $closedEnquiryCount = Enquiry::where(
            'status',
            'closed'
        )->count();


        /*
        |--------------------------------------------------------------------------
        | Recent Enquiries
        |--------------------------------------------------------------------------
        */

        $recentEnquiries = Enquiry::query()
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Recent Products
        |--------------------------------------------------------------------------
        */

        $recentProducts = Product::query()
            ->with('category')
            ->latest()
            ->take(5)
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Dashboard View
        |--------------------------------------------------------------------------
        */

        return view(
            'admin.dashboard',
            compact(
                'productCount',
                'activeProductCount',
                'featuredProductCount',

                'categoryCount',
                'activeCategoryCount',

                'enquiryCount',
                'newEnquiryCount',
                'readEnquiryCount',
                'contactedEnquiryCount',
                'closedEnquiryCount',

                'recentEnquiries',
                'recentProducts'
            )
        );
    }
}