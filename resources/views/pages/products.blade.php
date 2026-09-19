@extends('layouts.app')

@section(
    'title',
    $currentCategory['title'] . ' | ' .
    (data_get($siteSettings ?? null, 'company_name') ?: 'M R Hardware')
)


@push('styles')
    <link
        rel="stylesheet"
        href="{{ asset('css/product.css') }}"
    >
@endpush


@section('content')


@php

    $products =
        $currentCategory['products']
        ?? collect();

    $productCount =
        $currentCategory['count']
        ?? $products->count();

    $companyName =
        data_get(
            $siteSettings ?? null,
            'company_name'
        )
        ?: 'M R Hardware';

    $productsPerPage = 12;


    /*
    |--------------------------------------------------------------------------
    | CATEGORY HERO BACKGROUND
    |--------------------------------------------------------------------------
    |
    | Priority:
    |
    | 1. Admin hero_image
    | 2. Existing category-slug image
    | 3. default.jpg
    |
    */

    $adminHeroImage =
        trim(
            (string) (
                $currentCategory['hero_image']
                ?? ''
            )
        );

    $slugHeroImage =
        'images/product-hero/'
        . $categorySlug
        . '.jpg';

    $defaultHeroImage =
        'images/product-hero/default.jpg';


    if ($adminHeroImage !== '') {

        $heroImage =
            $adminHeroImage;

    } elseif (
        file_exists(
            public_path(
                $slugHeroImage
            )
        )
    ) {

        $heroImage =
            $slugHeroImage;

    } else {

        $heroImage =
            $defaultHeroImage;

    }


    /*
    |--------------------------------------------------------------------------
    | CATEGORY PREMIUM BANNER
    |--------------------------------------------------------------------------
    |
    | Priority:
    |
    | 1. Admin banner_image
    | 2. Existing category-slug image
    | 3. default.jpg
    |
    */

    $adminBannerImage =
        trim(
            (string) (
                $currentCategory['banner_image']
                ?? ''
            )
        );

    $slugBannerImage =
        'images/product-banner/'
        . $categorySlug
        . '.jpg';

    $defaultBannerImage =
        'images/product-banner/default.jpg';


    if ($adminBannerImage !== '') {

        $categoryBannerImage =
            $adminBannerImage;

    } elseif (
        file_exists(
            public_path(
                $slugBannerImage
            )
        )
    ) {

        $categoryBannerImage =
            $slugBannerImage;

    } else {

        $categoryBannerImage =
            $defaultBannerImage;

    }

@endphp



{{-- =========================================================
     PRODUCTS HERO
========================================================= --}}

<section class="product-page-hero">

    {{-- BACKGROUND IMAGE --}}

    <div class="product-page-hero-background">

        <img
            src="{{ asset($heroImage) }}"
            alt="{{ $currentCategory['title'] }}"
        >

    </div>


    {{-- DARK OVERLAY --}}

    <div class="product-page-hero-overlay"></div>


    {{-- LEFT ACCENT --}}

    <div class="product-page-hero-accent"></div>


    <div class="product-page-container">

        <div class="product-page-hero-inner">

            <div class="product-page-hero-copy product-reveal">


                {{-- KICKER --}}

                <div class="product-page-hero-kicker-wrap">

                    <span class="product-page-hero-kicker-line"></span>

                    <p class="product-page-kicker">
                        PREMIUM ARCHITECTURAL HARDWARE
                    </p>

                </div>


                {{-- TITLE --}}

                <h1>
                    {{ $currentCategory['title'] }}
                </h1>


                {{-- DESCRIPTION --}}

                <p class="product-page-hero-description">
                    {{ $currentCategory['description'] }}
                </p>


                {{-- PRODUCT / BRAND INFO --}}

                <div class="product-page-hero-bottom">

                    <div class="product-page-hero-stat">

                        <strong>
                            {{ $productCount }}
                        </strong>

                        <span>
                            Products
                        </span>

                    </div>


                    <span class="product-page-hero-stat-divider"></span>


                    <div class="product-page-hero-brand">

                        <span>
                            COLLECTION BY
                        </span>

                        <strong>
                            {{ $companyName }}
                        </strong>

                    </div>

                </div>


                {{-- EXPLORE BUTTON --}}

                <a
                    href="#products-collection"
                    class="product-page-hero-explore"
                >

                    <span>
                        EXPLORE COLLECTION
                    </span>

                    <i class="fa-solid fa-arrow-down"></i>

                </a>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     CATEGORY NAVIGATION
========================================================= --}}

<section class="product-category-section">

    <div class="product-page-container">

        <div class="product-category-row">

            <div class="product-category-scroll">

                @foreach($categories as $slug => $category)

                    <a
                        href="{{ route('products', ['category' => $slug]) }}"
                        class="product-category-pill
                               {{ $categorySlug === $slug ? 'active' : '' }}"
                    >
                        {{ $category['title'] }}
                    </a>

                @endforeach

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     PRODUCT COLLECTION
========================================================= --}}

<section
    id="products-collection"
    class="product-collection-section"
>

    <div class="product-page-container">


        {{-- HEADER --}}

        <div class="product-collection-header product-reveal">

            <div>

                <p class="product-collection-kicker">
                    OUR COLLECTION
                </p>

                <h2>
                    {{ $currentCategory['title'] }}
                </h2>

            </div>


            <div class="product-result-count">

                <strong>
                    {{ $productCount }}
                </strong>

                <span>
                    Products
                </span>

            </div>

        </div>



        {{-- =================================================
             PRODUCTS
        ================================================== --}}

        @if($products->count())

            <div
                class="product-grid"
                id="product-grid"
                data-per-page="{{ $productsPerPage }}"
            >

                @foreach($products as $index => $product)

                    <article
                        class="product-card product-card-reveal"
                        data-product-card
                        data-index="{{ $index }}"
                    >


                        {{-- PRODUCT IMAGE --}}

                        <a
                            href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                            class="product-card-image-link"
                        >

                            <div class="product-card-image-wrap">

                                <img
                                    src="{{ asset($product['image']) }}"
                                    alt="{{ $product['name'] }}"
                                    loading="lazy"
                                    class="product-card-image"
                                >


                                {{-- BRAND --}}

                                <span class="product-card-brand">
                                    {{ $companyName }}
                                </span>


                                {{-- VIDEO INDICATOR --}}

                                @if(!empty($product['video']))

                                    <span class="product-card-video">

                                        <i class="fa-solid fa-play"></i>

                                    </span>

                                @endif


                                {{-- HOVER OVERLAY --}}

                                <div class="product-card-overlay">

                                    <span>
                                        View Product
                                    </span>

                                    <i class="fa-solid fa-arrow-right"></i>

                                </div>

                            </div>

                        </a>



                        {{-- PRODUCT CONTENT --}}

                        <div class="product-card-content">

                            <p class="product-card-category">
                                {{ $currentCategory['title'] }}
                            </p>


                            <h3>

                                <a
                                    href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                                >
                                    {{ $product['name'] }}
                                </a>

                            </h3>


                            {{-- DYNAMIC PRODUCT PRICE --}}

                            <div class="product-card-price">

                                <span class="product-card-price-value">
                                    ₹{{ number_format((float) ($product['price'] ?? 1000), 0) }}
                                </span>

                                <span class="product-card-price-unit">
                                    / Piece
                                </span>

                            </div>


                            <div class="product-card-footer">

                                <a
                                    href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                                    class="product-card-view"
                                >
                                    View Details
                                </a>


                                <a
                                    href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                                    class="product-card-arrow"
                                    aria-label="View {{ $product['name'] }}"
                                >
                                    <i class="fa-solid fa-arrow-right"></i>
                                </a>

                            </div>

                        </div>

                    </article>

                @endforeach

            </div>



            {{-- =================================================
                 PAGINATION
            ================================================== --}}

            <div
                class="product-pagination"
                id="product-pagination"
            >

                <button
                    type="button"
                    class="product-pagination-arrow"
                    id="product-prev"
                    aria-label="Previous page"
                >
                    <i class="fa-solid fa-arrow-left"></i>
                </button>


                <div
                    class="product-pagination-pages"
                    id="product-pagination-pages"
                ></div>


                <button
                    type="button"
                    class="product-pagination-arrow"
                    id="product-next"
                    aria-label="Next page"
                >
                    <i class="fa-solid fa-arrow-right"></i>
                </button>

            </div>


        @else


            {{-- EMPTY STATE --}}

            <div class="product-empty-state">

                <div class="product-empty-icon">
                    <i class="fa-solid fa-box-open"></i>
                </div>

                <h3>
                    No products found
                </h3>

                <p>
                    No active products are currently available in this category.
                </p>

            </div>


        @endif

    </div>

</section>



{{-- =========================================================
     PREMIUM CATEGORY BANNER
========================================================= --}}

<section class="product-premium-banner">

    {{-- BACKGROUND IMAGE --}}

    <div
        class="product-premium-banner-background"
        aria-hidden="true"
    >

        <img
            src="{{ asset($categoryBannerImage) }}"
            alt=""
            loading="lazy"
        >

    </div>


    {{-- OVERLAY --}}

    <div class="product-premium-banner-overlay"></div>


    <div class="product-page-container">

        <div class="product-premium-banner-inner">


            {{-- LEFT CONTENT --}}

            <div class="product-premium-banner-copy">

                <p class="product-premium-banner-kicker">
                    TRUSTED BY PROFESSIONALS
                </p>


                <h2>
                    Premium Hardware Solutions
                </h2>


                <p class="product-premium-banner-description">
                    For Homes, Offices, and Commercial Spaces.
                </p>

            </div>


            {{-- RIGHT BUTTON --}}

            <div class="product-premium-banner-action">

                <a
                    href="#products-collection"
                    class="product-premium-banner-btn"
                >

                    <span>
                        Explore Our Collections
                    </span>

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     ENQUIRY CTA
========================================================= --}}

<section class="product-enquiry-section">

    <div class="product-page-container">

        <div class="product-enquiry-box product-reveal">

            <div class="product-enquiry-copy">

                <p>
                    PRODUCT ENQUIRY
                </p>

                <h2>
                    Looking for a particular model?
                </h2>

                <span>
                    Contact us for model-wise specifications,
                    availability and business enquiries.
                </span>

            </div>


            <a
                href="{{ route('contact') }}"
                class="product-enquiry-btn"
            >
                Send Enquiry

                <i class="fa-solid fa-arrow-right"></i>
            </a>

        </div>

    </div>

</section>

@endsection



@push('scripts')

    <script
        src="{{ asset('js/product.js') }}"
    ></script>

@endpush