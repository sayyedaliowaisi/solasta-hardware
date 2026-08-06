<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/products', function (Request $request) {

    $category = $request->get('category', 'cabinet');

    return view('pages.products', compact('category'));

})->name('products');

Route::view('/', 'pages.home')->name('home');
Route::view('/about', 'pages.about')->name('about');

Route::view('/contact', 'pages.contact')->name('contact');

Route::get('/products/{slug}', function ($slug) {
    return view('pages.product-detail', compact('slug'));
})->name('product.detail');