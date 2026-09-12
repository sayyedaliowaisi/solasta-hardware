<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\EnquiryController;
use App\Services\ProductCatalog;


/*
|--------------------------------------------------------------------------
| HOME
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.home')
    ->name('home');


/*
|--------------------------------------------------------------------------
| ABOUT
|--------------------------------------------------------------------------
*/

Route::view('/about', 'pages.about')
    ->name('about');


/*
|--------------------------------------------------------------------------
| CONTACT
|--------------------------------------------------------------------------
*/

Route::view('/contact', 'pages.contact')
    ->name('contact');


Route::post('/contact', [EnquiryController::class, 'store'])
    ->name('contact.store');


/*
|--------------------------------------------------------------------------
| PRODUCTS LISTING
|--------------------------------------------------------------------------
|
| Example:
|
| /products
| /products?category=cabinet-handles
| /products?category=knobs
|
*/

Route::get('/products', function (
    Request $request,
    ProductCatalog $catalog
) {

    /*
    |--------------------------------------------------------------------------
    | Get all categories
    |--------------------------------------------------------------------------
    */

    $categories = $catalog->categories();


    /*
    |--------------------------------------------------------------------------
    | Category from URL
    |--------------------------------------------------------------------------
    |
    | Default:
    | cabinet-handles
    |
    */

    $categorySlug = $request->query(
        'category',
        'cabinet-handles'
    );


    /*
    |--------------------------------------------------------------------------
    | Invalid category protection
    |--------------------------------------------------------------------------
    */

    if (!isset($categories[$categorySlug])) {

        $categorySlug = array_key_first(
            $categories
        );

    }


    /*
    |--------------------------------------------------------------------------
    | Current Category
    |--------------------------------------------------------------------------
    */

    $currentCategory =
        $categories[$categorySlug];


    /*
    |--------------------------------------------------------------------------
    | Send data to products.blade.php
    |--------------------------------------------------------------------------
    */

    return view(
        'pages.products',
        compact(
            'categories',
            'currentCategory',
            'categorySlug'
        )
    );

})
->name('products');


/*
|--------------------------------------------------------------------------
| PRODUCT DETAIL
|--------------------------------------------------------------------------
|
| Example:
|
| /products/cabinet-handles-20260823-190828
|
*/

Route::get('/products/{slug}', function (
    string $slug,
    ProductCatalog $catalog
) {

    /*
    |--------------------------------------------------------------------------
    | Find Product
    |--------------------------------------------------------------------------
    */

    $product =
        $catalog->findProduct($slug);


    /*
    |--------------------------------------------------------------------------
    | Product Not Found
    |--------------------------------------------------------------------------
    */

    abort_unless(
        $product,
        404
    );


    /*
    |--------------------------------------------------------------------------
    | Current Category
    |--------------------------------------------------------------------------
    */

    $currentCategory =
        $catalog->category(
            $product['category_slug']
        );


    /*
    |--------------------------------------------------------------------------
    | Safety Check
    |--------------------------------------------------------------------------
    */

    abort_unless(
        $currentCategory,
        404
    );


    /*
    |--------------------------------------------------------------------------
    | Related Products
    |--------------------------------------------------------------------------
    |
    | Same category
    | Current product excluded
    |
    */

    $relatedProducts =
        $currentCategory['products']

            ->reject(function ($related) use ($product) {

                return $related['slug']
                    === $product['slug'];

            })

            ->values();


    /*
    |--------------------------------------------------------------------------
    | Send data to product-detail.blade.php
    |--------------------------------------------------------------------------
    */

    return view(
        'pages.product-detail',
        compact(
            'product',
            'currentCategory',
            'relatedProducts'
        )
    );

})
->name('product.detail');