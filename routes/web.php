<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\ProductController as FrontProductController;

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\HomepageSectionController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\EnquiryController as AdminEnquiryController;
use App\Http\Controllers\Admin\ProductsPageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\ProductDetailPageController;
use App\Http\Controllers\Admin\ContactPageController;
use App\Http\Controllers\Admin\AboutPageController;
use App\Http\Controllers\Admin\AboutPageItemController;

/*
|--------------------------------------------------------------------------
| BASIC PAGES
|--------------------------------------------------------------------------
*/

Route::get(
    '/',
    [HomeController::class, 'index']
)->name('home');


Route::get(
    '/about',
    [AboutController::class, 'index']
)->name('about');


Route::get(
    '/contact',
    [ContactController::class, 'index']
)->name('contact');


Route::post(
    '/contact',
    [EnquiryController::class, 'store']
)->name('contact.store');


/*
|--------------------------------------------------------------------------
| PRODUCT ROUTES
|--------------------------------------------------------------------------
|
| Frontend products ab ProductCatalog.php se nahi,
| database se load honge.
|
*/

Route::get(
    '/products',
    [FrontProductController::class, 'index']
)->name('products');


Route::get(
    '/products/{slug}',
    [FrontProductController::class, 'show']
)->name('product.detail');


/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

Route::prefix('admin')
    ->name('admin.')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Guest Admin Routes
        |--------------------------------------------------------------------------
        */

        Route::middleware('guest:admin')
            ->group(function () {

                Route::get(
                    '/login',
                    [AdminAuthController::class, 'showLogin']
                )->name('login');


                Route::post(
                    '/login',
                    [AdminAuthController::class, 'login']
                )->name('login.submit');

            });


        /*
        |--------------------------------------------------------------------------
        | Protected Admin Routes
        |--------------------------------------------------------------------------
        */

        Route::middleware('auth:admin')
            ->group(function () {

                /*
                |--------------------------------------------------------------------------
                | Dashboard
                |--------------------------------------------------------------------------
                */

                Route::get(
                    '/',
                    [AdminDashboardController::class, 'index']
                )->name('dashboard');


                /*
                |--------------------------------------------------------------------------
                | Categories
                |--------------------------------------------------------------------------
                */

                Route::resource(
                    'categories',
                    CategoryController::class
                )->except('show');


                /*
                |--------------------------------------------------------------------------
                | Products
                |--------------------------------------------------------------------------
                */

                Route::resource(
                    'products',
                    AdminProductController::class
                )->except('show');

                Route::get('/products-page', [ProductsPageController::class, 'edit'])
    ->name('products-page.edit');

Route::put('/products-page', [ProductsPageController::class, 'update'])
    ->name('products-page.update');

    Route::get('/product-detail-page', [ProductDetailPageController::class, 'edit'])
    ->name('product-detail-page.edit');

Route::put('/product-detail-page', [ProductDetailPageController::class, 'update'])
    ->name('product-detail-page.update');

                Route::get(
    '/homepage',
    [HomepageController::class, 'edit']
)->name('homepage.edit');

Route::put(
    '/homepage',
    [HomepageController::class, 'update']
)->name('homepage.update'); 

Route::get(
    '/homepage-sections',
    [HomepageSectionController::class, 'index']
)->name('homepage.sections');


Route::put(
    '/homepage-sections/{section}',
    [HomepageSectionController::class, 'updateSection']
)->name('homepage.sections.update');


Route::post(
    '/homepage-items',
    [HomepageSectionController::class, 'storeItem']
)->name('homepage.items.store');


Route::get(
    '/homepage-items/{item}/edit',
    [HomepageSectionController::class, 'editItem']
)->name('homepage.items.edit');


Route::put(
    '/homepage-items/{item}',
    [HomepageSectionController::class, 'updateItem']
)->name('homepage.items.update');


Route::delete(
    '/homepage-items/{item}',
    [HomepageSectionController::class, 'destroyItem']
)->name('homepage.items.destroy');


Route::get(
    '/settings',
    [SiteSettingController::class, 'edit']
)->name('settings.edit');


Route::put(
    '/settings',
    [SiteSettingController::class, 'update']
)->name('settings.update');


Route::put(
    '/settings/contact',
    [SiteSettingController::class, 'updateContact']
)->name('settings.contact.update');

Route::get(
    '/enquiries',
    [AdminEnquiryController::class, 'index']
)->name('enquiries.index');

Route::get(
    '/enquiries/{enquiry}',
    [AdminEnquiryController::class, 'show']
)->name('enquiries.show');

Route::put(
    '/enquiries/{enquiry}',
    [AdminEnquiryController::class, 'update']
)->name('enquiries.update');

Route::delete(
    '/enquiries/{enquiry}',
    [AdminEnquiryController::class, 'destroy']
)->name('enquiries.destroy');

Route::get('/contact-page', [ContactPageController::class, 'edit'])
    ->name('contact-page.edit');

Route::put('/contact-page', [ContactPageController::class, 'update'])
    ->name('contact-page.update');

    Route::get(
    '/about-page',
    [AboutPageController::class, 'edit']
)->name('about-page.edit');

Route::put(
    '/about-page',
    [AboutPageController::class, 'update']
)->name('about-page.update');

Route::post(
    '/about-page/items',
    [AboutPageItemController::class, 'store']
)->name('about-page.items.store');


Route::put(
    '/about-page/items/{item}',
    [AboutPageItemController::class, 'update']
)->name('about-page.items.update');


Route::delete(
    '/about-page/items/{item}',
    [AboutPageItemController::class, 'destroy']
)->name('about-page.items.destroy');


                /*
                |--------------------------------------------------------------------------
                | Logout
                |--------------------------------------------------------------------------
                */

                Route::post(
                    '/logout',
                    [AdminAuthController::class, 'logout']
                )->name('logout');

            });

    });