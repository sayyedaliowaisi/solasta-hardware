<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductsPageSetting;
use App\Models\ProductDetailPageSetting;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | PRODUCT LISTING
    |--------------------------------------------------------------------------
    */

    public function index(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Active Categories
        |--------------------------------------------------------------------------
        */

        $categories = Category::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->withCount([
                'products as active_products_count' => function ($query) {
                    $query->where('is_active', true);
                },
            ])
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Requested Category
        |--------------------------------------------------------------------------
        */

        $categorySlug = $request->query('category');


        /*
        |--------------------------------------------------------------------------
        | Default Category
        |--------------------------------------------------------------------------
        */

        if (!$categorySlug) {
            $categorySlug = $categories->first()?->slug;
        }


        /*
        |--------------------------------------------------------------------------
        | Current Category
        |--------------------------------------------------------------------------
        */

        $currentCategoryModel = $categories
            ->firstWhere('slug', $categorySlug);


        /*
        |--------------------------------------------------------------------------
        | Invalid / Hidden Category
        |--------------------------------------------------------------------------
        */

        if (!$currentCategoryModel) {
            $currentCategoryModel = $categories->first();
        }


        /*
        |--------------------------------------------------------------------------
        | No Active Category
        |--------------------------------------------------------------------------
        */

        if (!$currentCategoryModel) {
            abort(404);
        }


        $categorySlug = $currentCategoryModel->slug;


        /*
        |--------------------------------------------------------------------------
        | Active Products
        |--------------------------------------------------------------------------
        */

        $products = Product::query()
            ->with('category')
            ->where(
                'category_id',
                $currentCategoryModel->id
            )
            ->where(
                'is_active',
                true
            )
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get();


        /*
        |--------------------------------------------------------------------------
        | Current Category Array
        |--------------------------------------------------------------------------
        */

        $currentCategory = [

            'id' =>
                $currentCategoryModel->id,

            'title' =>
                $currentCategoryModel->name,

            'slug' =>
                $currentCategoryModel->slug,

            'description' =>
                $currentCategoryModel->description,

            'folder' =>
                $currentCategoryModel->folder,

            'image' =>
                $currentCategoryModel->image,

            /*
            |--------------------------------------------------------------------------
            | Products Page Media
            |--------------------------------------------------------------------------
            */

            'hero_image' =>
                $currentCategoryModel->hero_image,

            'banner_image' =>
                $currentCategoryModel->banner_image,

            'count' =>
                $products->count(),

            'products' =>
                $products->map(
                    function ($product) {

                        return [

                            'id' =>
                                $product->id,

                            'name' =>
                                $product->name,

                            'slug' =>
                                $product->slug,

                            'price' =>
                                (float) $product->price,

                            'image' =>
                                $product->image,

                            'video' =>
                                $product->video,

                            'description' =>
                                $product->description,

                            'category_slug' =>
                                $product->category?->slug,

                            'is_featured' =>
                                (bool) $product->is_featured,

                        ];
                    }
                ),
        ];


        /*
        |--------------------------------------------------------------------------
        | Categories For Existing Blade
        |--------------------------------------------------------------------------
        */

        $categoriesForView = $categories
            ->mapWithKeys(
                function ($category) {

                    return [

                        $category->slug => [

                            'id' =>
                                $category->id,

                            'title' =>
                                $category->name,

                            'slug' =>
                                $category->slug,

                            'description' =>
                                $category->description,

                            'folder' =>
                                $category->folder,

                            'image' =>
                                $category->image,

                            'hero_image' =>
                                $category->hero_image,

                            'banner_image' =>
                                $category->banner_image,

                            'count' =>
                                $category->active_products_count,

                        ],

                    ];
                }
            )
            ->toArray();


        /*
        |--------------------------------------------------------------------------
        | Products Page CMS Settings
        |--------------------------------------------------------------------------
        */

        $productsPage =
            ProductsPageSetting::first();


        /*
        |--------------------------------------------------------------------------
        | Products View
        |--------------------------------------------------------------------------
        */

        return view(
            'pages.products',
            [
                'categories' =>
                    $categoriesForView,

                'currentCategory' =>
                    $currentCategory,

                'categorySlug' =>
                    $categorySlug,

                'productsPage' =>
                    $productsPage,
            ]
        );
    }


    /*
    |--------------------------------------------------------------------------
    | PRODUCT DETAIL
    |--------------------------------------------------------------------------
    */

    public function show(string $slug)
    {
        /*
        |--------------------------------------------------------------------------
        | Active Product
        |--------------------------------------------------------------------------
        */

        $productModel = Product::query()
            ->with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();


        /*
        |--------------------------------------------------------------------------
        | Category Must Also Be Active
        |--------------------------------------------------------------------------
        */

        abort_unless(
            $productModel->category
            && $productModel->category->is_active,
            404
        );


        $categoryModel =
            $productModel->category;


        /*
        |--------------------------------------------------------------------------
        | Product Gallery
        |--------------------------------------------------------------------------
        */

        $gallery =
            is_array($productModel->gallery)
                ? array_values(
                    array_filter(
                        $productModel->gallery
                    )
                )
                : [];


        /*
        |--------------------------------------------------------------------------
        | Product Types / Finishes
        |--------------------------------------------------------------------------
        */

        $productTypes =
            is_array($productModel->product_types)
                ? array_values(
                    array_filter(
                        $productModel->product_types
                    )
                )
                : [];


        /*
        |--------------------------------------------------------------------------
        | Detail Features
        |--------------------------------------------------------------------------
        */

        $detailFeatures =
            is_array($productModel->detail_features)
                ? array_values(
                    $productModel->detail_features
                )
                : [];


        /*
        |--------------------------------------------------------------------------
        | Specifications
        |--------------------------------------------------------------------------
        */

        $specifications =
            is_array($productModel->specifications)
                ? array_values(
                    $productModel->specifications
                )
                : [];


        /*
        |--------------------------------------------------------------------------
        | Dimensions
        |--------------------------------------------------------------------------
        */

        $dimensions =
            is_array($productModel->dimensions)
                ? $productModel->dimensions
                : [];


        /*
        |--------------------------------------------------------------------------
        | Installation Steps
        |--------------------------------------------------------------------------
        */

        $installationSteps =
            is_array($productModel->installation_steps)
                ? array_values(
                    $productModel->installation_steps
                )
                : [];


        /*
        |--------------------------------------------------------------------------
        | FAQs
        |--------------------------------------------------------------------------
        */

        $faqs =
            is_array($productModel->faqs)
                ? array_values(
                    $productModel->faqs
                )
                : [];


        /*
        |--------------------------------------------------------------------------
        | Product Array
        |--------------------------------------------------------------------------
        */

        $product = [

            /*
            |--------------------------------------------------------------------------
            | Basic Information
            |--------------------------------------------------------------------------
            */

            'id' =>
                $productModel->id,

            'name' =>
                $productModel->name,

            'slug' =>
                $productModel->slug,

            'description' =>
                $productModel->description,

            'price' =>
                (float) $productModel->price,


            /*
            |--------------------------------------------------------------------------
            | Media
            |--------------------------------------------------------------------------
            */

            'image' =>
                $productModel->image,

            'gallery' =>
                $gallery,

            'video' =>
                $productModel->video,


            /*
            |--------------------------------------------------------------------------
            | Rating / Reviews
            |--------------------------------------------------------------------------
            */

            'rating' =>
                $productModel->rating !== null
                    ? (float) $productModel->rating
                    : 5.0,

            'review_count' =>
                $productModel->review_count !== null
                    ? (int) $productModel->review_count
                    : 0,


            /*
            |--------------------------------------------------------------------------
            | Product Types
            |--------------------------------------------------------------------------
            */

            'product_types' =>
                $productTypes,


            /*
            |--------------------------------------------------------------------------
            | Product Detail Tab
            |--------------------------------------------------------------------------
            */

            'detail_content' =>
                $productModel->detail_content,

            'detail_features' =>
                $detailFeatures,


            /*
            |--------------------------------------------------------------------------
            | Specifications
            |--------------------------------------------------------------------------
            */

            'specifications' =>
                $specifications,


            /*
            |--------------------------------------------------------------------------
            | Dimensions
            |--------------------------------------------------------------------------
            */

            'dimensions' =>
                $dimensions,


            /*
            |--------------------------------------------------------------------------
            | Installation
            |--------------------------------------------------------------------------
            */

            'installation_steps' =>
                $installationSteps,


            /*
            |--------------------------------------------------------------------------
            | FAQs
            |--------------------------------------------------------------------------
            */

            'faqs' =>
                $faqs,


            /*
            |--------------------------------------------------------------------------
            | Other Information
            |--------------------------------------------------------------------------
            */

            'category_slug' =>
                $categoryModel->slug,

            'is_featured' =>
                (bool) $productModel->is_featured,

        ];


        /*
        |--------------------------------------------------------------------------
        | Current Category
        |--------------------------------------------------------------------------
        */

        $currentCategory = [

            'id' =>
                $categoryModel->id,

            'title' =>
                $categoryModel->name,

            'slug' =>
                $categoryModel->slug,

            'description' =>
                $categoryModel->description,

            'folder' =>
                $categoryModel->folder,

            'image' =>
                $categoryModel->image,

            'hero_image' =>
                $categoryModel->hero_image,

            'banner_image' =>
                $categoryModel->banner_image,

        ];


        /*
        |--------------------------------------------------------------------------
        | Related Products
        |--------------------------------------------------------------------------
        */

        $relatedProducts = Product::query()
            ->where(
                'category_id',
                $categoryModel->id
            )
            ->where(
                'id',
                '!=',
                $productModel->id
            )
            ->where(
                'is_active',
                true
            )
            ->orderByDesc('is_featured')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get()
            ->map(
                function ($related)
                use ($categoryModel) {

                    return [

                        'id' =>
                            $related->id,

                        'name' =>
                            $related->name,

                        'slug' =>
                            $related->slug,

                        'price' =>
                            (float) $related->price,

                        'image' =>
                            $related->image,

                        'video' =>
                            $related->video,

                        'description' =>
                            $related->description,

                        'category' =>
                            $categoryModel->name,

                        'category_slug' =>
                            $categoryModel->slug,

                        'is_featured' =>
                            (bool) $related->is_featured,

                    ];
                }
            );


        /*
        |--------------------------------------------------------------------------
        | Product Detail CMS Settings
        |--------------------------------------------------------------------------
        */

        $productDetailPage =
            ProductDetailPageSetting::first();


        /*
        |--------------------------------------------------------------------------
        | Product Detail View
        |--------------------------------------------------------------------------
        */

        return view(
            'pages.product-detail',
            compact(
                'product',
                'currentCategory',
                'relatedProducts',
                'productDetailPage'
            )
        );
    }
}