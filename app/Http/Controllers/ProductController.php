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
         * Sirf active categories
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
         * Requested category
         */
        $categorySlug = $request->query('category');


        /*
         * Agar category query nahi hai to first active category
         */
        if (!$categorySlug) {
            $categorySlug = $categories->first()?->slug;
        }


        /*
         * Current Category
         */
        $currentCategoryModel = $categories
            ->firstWhere('slug', $categorySlug);


        /*
         * Invalid / hidden category case
         */
        if (!$currentCategoryModel) {
            $currentCategoryModel = $categories->first();
        }


        /*
         * Agar DB me koi active category hi nahi hai
         */
        if (!$currentCategoryModel) {
            abort(404);
        }


        $categorySlug = $currentCategoryModel->slug;


        /*
         * Active products
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
         * Existing Blade ko break na karne ke liye
         * same array structure maintain kar rahe hain.
         */
        $currentCategory = [
            'id' => $currentCategoryModel->id,

            'title' => $currentCategoryModel->name,

            'slug' => $currentCategoryModel->slug,

            'description' => $currentCategoryModel->description,

            'folder' => $currentCategoryModel->folder,

            'count' => $products->count(),

            'products' => $products->map(
                function ($product) {

                    return [
                        'id' => $product->id,

                        'name' => $product->name,

                        'slug' => $product->slug,

                        'image' => $product->image,

                        'video' => $product->video,

                        'description' => $product->description,

                        'category_slug' =>
                            $product->category->slug
                            ?? null,

                        'is_featured' =>
                            $product->is_featured,
                    ];
                }
            ),
        ];


        /*
         * Existing products.blade.php expects
         * $categories[$slug]
         */
        $categoriesForView = $categories
            ->mapWithKeys(function ($category) {

                return [
                    $category->slug => [
                        'id' => $category->id,

                        'title' => $category->name,

                        'slug' => $category->slug,

                        'description' =>
                            $category->description,

                        'folder' => $category->folder,

                        'count' =>
                            $category
                                ->active_products_count,
                    ],
                ];
            })
            ->toArray();


        /*
         * Products Page CMS Settings
         *
         * Public GET par firstOrCreate use nahi kar rahe.
         * Agar settings row available nahi hui to
         * Blade fallback text use karega.
         */
        $productsPage =
            ProductsPageSetting::first();


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
         * Active product
         */
        $productModel = Product::query()
            ->with('category')
            ->where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();


        /*
         * Product ki category bhi active honi chahiye
         */
        abort_unless(
            $productModel->category
            && $productModel->category->is_active,
            404
        );


        $categoryModel =
            $productModel->category;


        /*
         * Existing Blade compatible product array
         */
        $product = [
            'id' =>
                $productModel->id,

            'name' =>
                $productModel->name,

            'slug' =>
                $productModel->slug,

            'description' =>
                $productModel->description,

            'image' =>
                $productModel->image,

            'video' =>
                $productModel->video,

            'category_slug' =>
                $categoryModel->slug,

            'is_featured' =>
                $productModel->is_featured,
        ];


        /*
         * Existing Blade compatible category
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
        ];


        /*
         * Related Products
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

                        'image' =>
                            $related->image,

                        'video' =>
                            $related->video,

                        'description' =>
                            $related->description,

                        'category_slug' =>
                            $categoryModel->slug,
                    ];
                }
            );


        /*
         * Product Detail Page CMS Settings
         *
         * Public GET par firstOrCreate use nahi kar rahe.
         * Agar setting row available na ho to
         * Blade fallback text use karega.
         */
        $productDetailPage =
            ProductDetailPageSetting::first();


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