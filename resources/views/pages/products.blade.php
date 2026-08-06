@extends('layouts.app')

@php

$categories = [

    'cabinet' => [
        'title' => 'Cabinet Handle',
        'description' => 'Premium cabinet handles for modular kitchens, wardrobes and furniture.',
        'banner' => 'images/products/cabinet-banner.jpg',
    ],

    'door' => [
        'title' => 'Door Handle',
        'description' => 'Premium stainless steel door handles for residential and commercial projects.',
        'banner' => 'images/products/door-banner.jpg',
    ],

    'knobs' => [
        'title' => 'Knobs',
        'description' => 'Premium designer knobs available in multiple finishes.',
        'banner' => 'images/products/knobs-banner.jpg',
    ],

    'latch' => [
        'title' => 'Latch',
        'description' => 'Heavy-duty premium quality latches.',
        'banner' => 'images/products/latch-banner.jpg',
    ],

    'doorstopper' => [
        'title' => 'Door Stopper',
        'description' => 'Premium door stoppers for residential and commercial applications.',
        'banner' => 'images/products/doorstopper-banner.jpg',
    ],

    'keyholder' => [
        'title' => 'Key Holder',
        'description' => 'Elegant key holders for home and office.',
        'banner' => 'images/products/keyholder-banner.jpg',
    ],

    'mortise' => [
        'title' => 'Mortise Handle',
        'description' => 'Luxury mortise handles with premium finish.',
        'banner' => 'images/products/mortise-banner.jpg',
    ],

    'sliding' => [
        'title' => 'Sliding Handle',
        'description' => 'Modern sliding door hardware collection.',
        'banner' => 'images/products/sliding-banner.jpg',
    ],

    'profile' => [
        'title' => 'Profile Handle',
        'description' => 'Aluminium profile handles for modular furniture.',
        'banner' => 'images/products/profile-banner.jpg',
    ],

    'magnet' => [
        'title' => 'Magnet Catcher',
        'description' => 'Premium magnetic catchers for cabinets and wardrobes.',
        'banner' => 'images/products/magnet-banner.jpg',
    ],

];

$current = $categories[$category] ?? $categories['cabinet'];

@endphp

@section('title', $current['title'].' | M R Hardware')

@section('content')

<!-- Hero Section -->

<section class="relative overflow-hidden">

    <!-- Background Image -->

    <img
        src="{{ asset($current['banner']) }}"
        alt="{{ $current['title'] }}"
        class="absolute inset-0 w-full h-full object-cover">

    <!-- Overlay -->

    <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/60 to-orange-900/70"></div>

    <!-- Hero Content -->

    <div class="relative max-w-7xl mx-auto px-6 py-28">

        <span class="uppercase tracking-[5px] text-orange-300 font-semibold">

            M R Hardware

        </span>

        <h1 class="text-5xl lg:text-6xl font-extrabold text-white mt-6 leading-tight">

            {{ $current['title'] }}

        </h1>

        <p class="text-lg text-gray-200 mt-6 max-w-3xl leading-8">

            {{ $current['description'] }}

        </p>

        <div class="flex flex-wrap gap-5 mt-10">

            <a href="{{ route('contact') }}"
               class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-full font-semibold transition">

                Request Quote

            </a>

            <a href="#products"
               class="border border-white text-white px-8 py-4 rounded-full hover:bg-white hover:text-gray-900 transition">

                Explore Products

            </a>

        </div>

    </div>

</section>

<!-- Products Section Starts -->

<section id="products" class="py-20 bg-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between mb-12">

            <div>

                <span class="text-orange-600 font-semibold uppercase">

                    {{ $current['title'] }}

                </span>

                <h2 class="text-4xl font-bold mt-3">

                    Our Collection

                </h2>

            </div>

            <div class="hidden md:block">

                <p class="text-gray-500">

                    Showing Premium Products

                </p>

            </div>

        </div>

        <!-- Product Grid Start -->

        @php

$products = [

'cabinet' => [

[
'name'=>'Zara Handle',
'image'=>'images/products/cabinet-1.jpg',
'finish'=>'Satin Steel',
'badge'=>'NEW'
],

[
'name'=>'Nova Handle',
'image'=>'images/products/cabinet-2.jpg',
'finish'=>'Matt Black',
'badge'=>'BEST SELLER'
],

[
'name'=>'Elite Handle',
'image'=>'images/products/cabinet-3.jpg',
'finish'=>'Rose Gold',
'badge'=>''
],

[
'name'=>'Prime Handle',
'image'=>'images/products/cabinet-4.jpg',
'finish'=>'Chrome',
'badge'=>''
],

[
'name'=>'Luxury Handle',
'image'=>'images/products/cabinet-5.jpg',
'finish'=>'Antique Brass',
'badge'=>''
],

[
'name'=>'Crystal Handle',
'image'=>'images/products/cabinet-6.jpg',
'finish'=>'Gold',
'badge'=>''
],

[
'name'=>'Classic Handle',
'image'=>'images/products/cabinet-7.jpg',
'finish'=>'SS Finish',
'badge'=>''
],

[
'name'=>'Royal Handle',
'image'=>'images/products/cabinet-8.jpg',
'finish'=>'Nickel',
'badge'=>''
]

],

'door'=>[],

'knobs'=>[],

'latch'=>[],

'doorstopper'=>[],

'keyholder'=>[],

'mortise'=>[],

'sliding'=>[],

'profile'=>[],

'magnet'=>[]

];

@endphp

<div class="grid lg:grid-cols-3 md:grid-cols-2 gap-8">

@foreach($products[$category] ?? [] as $product)

<div
class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl hover:-translate-y-2 transition duration-500 group">

<div class="relative overflow-hidden">

@if($product['badge']!='')

<span
class="absolute top-4 left-4 z-10
{{ $product['badge']=='NEW'
? 'bg-red-500'
: 'bg-green-600' }}
text-white text-xs px-4 py-2 rounded-full">

{{ $product['badge'] }}

</span>

@endif

<img
src="{{ asset($product['image']) }}"
alt="{{ $product['name'] }}"
class="w-full h-72 object-cover group-hover:scale-110 transition duration-700">

</div>

<div class="p-6">

<h3 class="text-2xl font-bold">

{{ $product['name'] }}

</h3>

<p class="text-gray-500 mt-2">

{{ $product['finish'] }}

</p>

<div class="flex text-yellow-500 mt-4 text-lg">

★★★★★

</div>

<div class="flex gap-3 mt-8">

<a
href="#"
class="flex-1 bg-orange-600 hover:bg-orange-700 text-center text-white py-3 rounded-xl font-semibold transition">

View Details

</a>

<a
href="{{ route('contact') }}"
class="px-5 py-3 rounded-xl border border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white transition">

Quote

</a>

</div>

</div>

</div>

@endforeach

</div>

</div>

</section>

<!-- Product Details Section -->

<section class="py-20 bg-white border-t">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-start">

            <!-- Left Image -->

            <div>

                <img
                    src="{{ asset('images/products/cabinet-1.jpg') }}"
                    alt="Product"
                    class="w-full rounded-3xl shadow-xl">

                <!-- Gallery -->

                <div class="grid grid-cols-4 gap-4 mt-6">

                    <img src="{{ asset('images/products/cabinet-1.jpg') }}"
                         class="rounded-xl border cursor-pointer hover:border-orange-600">

                    <img src="{{ asset('images/products/cabinet-2.jpg') }}"
                         class="rounded-xl border cursor-pointer hover:border-orange-600">

                    <img src="{{ asset('images/products/cabinet-3.jpg') }}"
                         class="rounded-xl border cursor-pointer hover:border-orange-600">

                    <img src="{{ asset('images/products/cabinet-4.jpg') }}"
                         class="rounded-xl border cursor-pointer hover:border-orange-600">

                </div>

            </div>

            <!-- Right -->

            <div>

                <span class="bg-orange-100 text-orange-600 px-4 py-2 rounded-full text-sm font-semibold">

                    Premium Collection

                </span>

                <h2 class="text-5xl font-bold mt-6">

                    Zara Handle

                </h2>

                <p class="text-gray-600 mt-6 leading-8">

                    Premium quality cabinet handle manufactured using
                    stainless steel with superior finish suitable for
                    modular kitchens, wardrobes and luxury furniture.

                </p>

                <!-- Sizes -->

                <h3 class="text-2xl font-bold mt-10">

                    Available Sizes

                </h3>

                <div class="flex flex-wrap gap-3 mt-5">

                    <span class="px-5 py-2 rounded-full bg-orange-100 text-orange-700">96 mm</span>

                    <span class="px-5 py-2 rounded-full bg-orange-100 text-orange-700">128 mm</span>

                    <span class="px-5 py-2 rounded-full bg-orange-100 text-orange-700">160 mm</span>

                    <span class="px-5 py-2 rounded-full bg-orange-100 text-orange-700">192 mm</span>

                </div>

                <!-- Finishes -->

                <h3 class="text-2xl font-bold mt-10">

                    Available Finish

                </h3>

                <div class="flex flex-wrap gap-3 mt-5">

                    <span class="px-5 py-2 rounded-full bg-gray-900 text-white">

                        Matt Black

                    </span>

                    <span class="px-5 py-2 rounded-full bg-gray-200">

                        Satin Steel

                    </span>

                    <span class="px-5 py-2 rounded-full bg-yellow-300">

                        Gold

                    </span>

                    <span class="px-5 py-2 rounded-full bg-orange-300">

                        Rose Gold

                    </span>

                </div>

                <!-- Buttons -->

                <div class="flex flex-wrap gap-5 mt-12">

                    <a href="{{ route('contact') }}"
                       class="bg-orange-600 hover:bg-orange-700 text-white px-8 py-4 rounded-xl font-semibold">

                        Get Quote

                    </a>

                    <a href="#"
                       class="border-2 border-orange-600 text-orange-600 hover:bg-orange-600 hover:text-white px-8 py-4 rounded-xl font-semibold transition">

                        Download Catalogue

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

<!-- Product Specifications -->

<section class="py-20 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <span class="text-orange-600 uppercase tracking-[4px] font-semibold">

                Technical Details

            </span>

            <h2 class="text-4xl font-bold mt-4">

                Product Specifications

            </h2>

        </div>

        <div class="overflow-hidden rounded-3xl bg-white shadow-xl">

            <table class="w-full">

                <tbody>

                    <tr class="border-b">

                        <td class="w-1/3 bg-gray-50 font-semibold p-6">

                            Material

                        </td>

                        <td class="p-6">

                            Stainless Steel 304 Grade

                        </td>

                    </tr>

                    <tr class="border-b">

                        <td class="bg-gray-50 font-semibold p-6">

                            Finish

                        </td>

                        <td class="p-6">

                            Satin / Matt Black / Rose Gold / Antique

                        </td>

                    </tr>

                    <tr class="border-b">

                        <td class="bg-gray-50 font-semibold p-6">

                            Available Sizes

                        </td>

                        <td class="p-6">

                            96mm, 128mm, 160mm, 192mm, 224mm

                        </td>

                    </tr>

                    <tr class="border-b">

                        <td class="bg-gray-50 font-semibold p-6">

                            Installation

                        </td>

                        <td class="p-6">

                            Screw Fitting

                        </td>

                    </tr>

                    <tr class="border-b">

                        <td class="bg-gray-50 font-semibold p-6">

                            Application

                        </td>

                        <td class="p-6">

                            Cabinets, Wardrobes, Kitchen & Furniture

                        </td>

                    </tr>

                    <tr>

                        <td class="bg-gray-50 font-semibold p-6">

                            Warranty

                        </td>

                        <td class="p-6">

                            5 Years

                        </td>

                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</section>

<!-- Product Features -->

<section class="py-20 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <span class="text-orange-600 uppercase tracking-[4px] font-semibold">

                Why Choose

            </span>

            <h2 class="text-4xl font-bold mt-4">

                Product Features

            </h2>

        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">

            <div class="bg-gray-50 rounded-3xl p-8 text-center hover:shadow-xl transition">

                <div class="text-5xl mb-5">🛡️</div>

                <h3 class="text-xl font-bold">

                    Rust Resistant

                </h3>

                <p class="mt-3 text-gray-600">

                    High-quality anti-corrosion finish.

                </p>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 text-center hover:shadow-xl transition">

                <div class="text-5xl mb-5">💪</div>

                <h3 class="text-xl font-bold">

                    Heavy Duty

                </h3>

                <p class="mt-3 text-gray-600">

                    Strong and durable construction.

                </p>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 text-center hover:shadow-xl transition">

                <div class="text-5xl mb-5">✨</div>

                <h3 class="text-xl font-bold">

                    Premium Finish

                </h3>

                <p class="mt-3 text-gray-600">

                    Elegant look for modern interiors.

                </p>

            </div>

            <div class="bg-gray-50 rounded-3xl p-8 text-center hover:shadow-xl transition">

                <div class="text-5xl mb-5">🔧</div>

                <h3 class="text-xl font-bold">

                    Easy Installation

                </h3>

                <p class="mt-3 text-gray-600">

                    Hassle-free fitting with standard screws.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- Related Products -->

<section class="py-20 bg-gray-100">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center mb-12">

            <div>

                <span class="text-orange-600 uppercase tracking-[4px] font-semibold">

                    More Products

                </span>

                <h2 class="text-4xl font-bold mt-3">

                    Related Products

                </h2>

            </div>

        </div>

        <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">

            @for($i=1;$i<=4;$i++)

            <div class="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition">

                <img
                    src="{{ asset('images/products/cabinet-'.$i.'.jpg') }}"
                    class="w-full h-56 object-cover">

                <div class="p-6">

                    <h3 class="text-xl font-bold">

                        Premium Handle {{ $i }}

                    </h3>

                    <p class="text-gray-500 mt-2">

                        Stainless Steel Finish

                    </p>

                    <a href="#"
                       class="inline-block mt-5 text-orange-600 font-semibold">

                        View Product →

                    </a>

                </div>

            </div>

            @endfor

        </div>

    </div>

</section>

<section class="py-20 bg-white">

<div class="max-w-7xl mx-auto px-6">

<div class="grid lg:grid-cols-2 gap-16 items-center">

<div>

<img
src="{{ asset('images/about-company.jpg') }}"
class="rounded-3xl shadow-xl">

</div>

<div>

<span class="text-orange-600 uppercase tracking-[4px] font-semibold">

Why Choose Us

</span>

<h2 class="text-5xl font-bold mt-5">

Trusted Hardware Supplier

</h2>

<p class="mt-6 text-gray-600 leading-8">

We supply premium quality architectural hardware for
residential, commercial and industrial projects with
competitive pricing and reliable service.

</p>

<div class="grid grid-cols-2 gap-6 mt-10">

<div>

<h3 class="text-4xl font-bold text-orange-600">

500+

</h3>

<p>

Products

</p>

</div>

<div>

<h3 class="text-4xl font-bold text-orange-600">

1000+

</h3>

<p>

Happy Customers

</p>

</div>

<div>

<h3 class="text-4xl font-bold text-orange-600">

25+

</h3>

<p>

Brands

</p>

</div>

<div>

<h3 class="text-4xl font-bold text-orange-600">

10+

</h3>

<p>

Years Experience

</p>

</div>

</div>

</div>

</div>

</div>

</section>

<!-- CTA -->

<section class="py-24 bg-gradient-to-r from-orange-600 to-orange-700 text-white">

    <div class="max-w-6xl mx-auto px-6 text-center">

        <h2 class="text-5xl font-bold">

            Looking for Premium Hardware?

        </h2>

        <p class="mt-6 text-xl text-orange-100">

            Contact M R Hardware today for bulk orders, dealer inquiries,
            and customized hardware solutions.

        </p>

        <div class="flex flex-wrap justify-center gap-5 mt-10">

            <a href="{{ route('contact') }}"
               class="bg-white text-orange-600 px-8 py-4 rounded-full font-bold hover:bg-gray-100">

                Request Quote

            </a>

            <a href="tel:+919811510846"
               class="border-2 border-white px-8 py-4 rounded-full hover:bg-white hover:text-orange-600">

                Call Now

            </a>

        </div>

    </div>

</section>

@endsection