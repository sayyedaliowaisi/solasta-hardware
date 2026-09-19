@extends('layouts.app')

@section(
    'title',
    $product['name'] . ' | ' .
    (data_get($siteSettings ?? null, 'company_name') ?: 'M R Hardware')
)


@push('styles')
    <link
        rel="stylesheet"
        href="{{ asset('css/product-detail.css') }}"
    >
@endpush


@section('content')


@php

    /*
    |--------------------------------------------------------------------------
    | COMPANY
    |--------------------------------------------------------------------------
    */

    $companyName =
        data_get($siteSettings ?? null, 'company_name')
        ?: 'M R Hardware';


    /*
    |--------------------------------------------------------------------------
    | DESCRIPTION
    |--------------------------------------------------------------------------
    */

    $description =
        !empty($product['description'])
            ? $product['description']
            : 'Premium quality hardware designed for durability and elegance. Crafted with high-grade materials and fine detailing, this product offers a perfect blend of strength, style and smooth functionality. Ideal for modern homes, offices and commercial spaces.';


    /*
    |--------------------------------------------------------------------------
    | PRODUCT GALLERY
    |--------------------------------------------------------------------------
    */

    $galleryImages =
        $product['gallery']
        ?? [];

    if (!is_array($galleryImages)) {
        $galleryImages = [];
    }


    /*
    | Main product image always first.
    */

    if (!empty($product['image'])) {

        array_unshift(
            $galleryImages,
            $product['image']
        );

    }


    /*
    | Remove empty / duplicate images.
    */

    $galleryImages =
        array_values(
            array_unique(
                array_filter(
                    $galleryImages
                )
            )
        );


    /*
    | Existing gallery design uses 8 thumbnails.
    |
    | 1 Main Image + 7 Additional Images
    |
    | If fewer images exist, main image is repeated so
    | the existing gallery layout does not break.
    */

    if (!empty($product['image'])) {

        while (count($galleryImages) < 8) {

            $galleryImages[] =
                $product['image'];

        }

    }


    $galleryImages =
        array_slice(
            $galleryImages,
            0,
            8
        );


    /*
    | Safety fallback.
    */

    if (empty($galleryImages)) {

        $galleryImages[] =
            'images/placeholder-product.jpg';

    }


    /*
    |--------------------------------------------------------------------------
    | RATING
    |--------------------------------------------------------------------------
    */

    $rating =
        isset($product['rating'])
        && is_numeric($product['rating'])
            ? (float) $product['rating']
            : 5.0;

    $rating =
        max(
            0,
            min(
                5,
                $rating
            )
        );


    $reviewCount =
        isset($product['review_count'])
        && is_numeric($product['review_count'])
            ? max(
                0,
                (int) $product['review_count']
            )
            : 0;


    /*
    |--------------------------------------------------------------------------
    | PRODUCT TYPES / FINISHES
    |--------------------------------------------------------------------------
    */

    $productTypes =
        is_array(
            $product['product_types']
            ?? null
        )
            ? array_values(
                array_filter(
                    $product['product_types'],
                    fn ($type) =>
                        is_string($type)
                        && trim($type) !== ''
                )
            )
            : [];


    /*
    | Existing exact fallback.
    */

    if (empty($productTypes)) {

        $productTypes = [
            'SS',
            'PVD Gold',
            'Matt Black',
            'Antique Brass',
        ];

    }


    /*
    |--------------------------------------------------------------------------
    | FINISH CSS CLASS
    |--------------------------------------------------------------------------
    */

    $finishClass =
        function ($type) {

            $normalized =
                strtolower(
                    trim(
                        (string) $type
                    )
                );


            return match ($normalized) {

                'ss',
                'stainless steel' =>
                    'pd-finish-ss',

                'pvd gold',
                'gold' =>
                    'pd-finish-gold',

                'matt black',
                'matte black',
                'black' =>
                    'pd-finish-black',

                'antique brass',
                'brass' =>
                    'pd-finish-brass',

                default =>
                    'pd-finish-ss',
            };

        };


    /*
    |--------------------------------------------------------------------------
    | PRODUCT DETAIL CONTENT
    |--------------------------------------------------------------------------
    */

    $detailContent =
        trim(
            (string) (
                $product['detail_content']
                ?? ''
            )
        );


    /*
    |--------------------------------------------------------------------------
    | DETAIL FEATURES
    |--------------------------------------------------------------------------
    */

    $detailFeatures =
        is_array(
            $product['detail_features']
            ?? null
        )
            ? array_values(
                array_filter(
                    $product['detail_features'],
                    fn ($feature) =>
                        is_array($feature)
                        &&
                        (
                            trim(
                                (string) (
                                    $feature['title']
                                    ?? ''
                                )
                            ) !== ''
                            ||
                            trim(
                                (string) (
                                    $feature['description']
                                    ?? ''
                                )
                            ) !== ''
                        )
                )
            )
            : [];


    /*
    |--------------------------------------------------------------------------
    | SPECIFICATIONS
    |--------------------------------------------------------------------------
    */

    $specifications =
        is_array(
            $product['specifications']
            ?? null
        )
            ? array_values(
                array_filter(
                    $product['specifications'],
                    fn ($specification) =>
                        is_array($specification)
                        &&
                        trim(
                            (string) (
                                $specification['label']
                                ?? ''
                            )
                        ) !== ''
                        &&
                        trim(
                            (string) (
                                $specification['value']
                                ?? ''
                            )
                        ) !== ''
                )
            )
            : [];


    /*
    |--------------------------------------------------------------------------
    | DIMENSIONS
    |--------------------------------------------------------------------------
    */

    $dimensions =
        is_array(
            $product['dimensions']
            ?? null
        )
            ? $product['dimensions']
            : [];


    $dimensionWidth =
        trim(
            (string) (
                $dimensions['width']
                ?? ''
            )
        );

    $dimensionHeight =
        trim(
            (string) (
                $dimensions['height']
                ?? ''
            )
        );

    $dimensionLength =
        trim(
            (string) (
                $dimensions['length']
                ?? ''
            )
        );

    $dimensionWeight =
        trim(
            (string) (
                $dimensions['weight']
                ?? ''
            )
        );


    /*
    |--------------------------------------------------------------------------
    | INSTALLATION STEPS
    |--------------------------------------------------------------------------
    */

    $installationSteps =
        is_array(
            $product['installation_steps']
            ?? null
        )
            ? array_values(
                array_filter(
                    $product['installation_steps'],
                    fn ($step) =>
                        is_array($step)
                        &&
                        (
                            trim(
                                (string) (
                                    $step['title']
                                    ?? ''
                                )
                            ) !== ''
                            ||
                            trim(
                                (string) (
                                    $step['description']
                                    ?? ''
                                )
                            ) !== ''
                        )
                )
            )
            : [];


    /*
    |--------------------------------------------------------------------------
    | FAQs
    |--------------------------------------------------------------------------
    */

    $productFaqs =
        is_array(
            $product['faqs']
            ?? null
        )
            ? array_values(
                array_filter(
                    $product['faqs'],
                    fn ($faq) =>
                        is_array($faq)
                        &&
                        trim(
                            (string) (
                                $faq['question']
                                ?? ''
                            )
                        ) !== ''
                        &&
                        trim(
                            (string) (
                                $faq['answer']
                                ?? ''
                            )
                        ) !== ''
                )
            )
            : [];


    /*
    |--------------------------------------------------------------------------
    | PRODUCT VIDEO
    |--------------------------------------------------------------------------
    */

    $productVideo =
        !empty($product['video'])
            ? trim((string) $product['video'])
            : null;

@endphp



{{-- =========================================================
     BREADCRUMB
========================================================= --}}

<section class="pd-breadcrumb-section">

    <div class="pd-container">

        <div class="pd-breadcrumb">

            <a href="{{ route('home') }}">
                Home
            </a>

            <span>/</span>

            <a href="{{ route('products') }}">
                Products
            </a>

            <span>/</span>

            <a
                href="{{ route(
                    'products',
                    [
                        'category' =>
                            $currentCategory['slug']
                    ]
                ) }}"
            >
                {{ $currentCategory['title'] }}
            </a>

            <span>/</span>

            <strong>
                {{ $product['name'] }}
            </strong>

        </div>

    </div>

</section>



{{-- =========================================================
     PRODUCT DETAIL
========================================================= --}}

<section class="pd-main-section">

    <div class="pd-main-container">

        <div class="pd-main-grid">


            {{-- =================================================
                 LEFT PRODUCT GALLERY
            ================================================== --}}

            <div class="pd-gallery">


                {{-- LEFT 4 THUMBNAILS --}}

                <div class="pd-thumb-column">

                    @foreach(
                        array_slice(
                            $galleryImages,
                            0,
                            4
                        )
                        as $index => $image
                    )

                        <button
                            type="button"
                            class="pd-thumb-btn {{ $index === 0 ? 'active' : '' }}"
                            data-pd-image="{{ asset($image) }}"
                            aria-label="View product image {{ $index + 1 }}"
                        >

                            <img
                                src="{{ asset($image) }}"
                                alt="{{ $product['name'] }}"
                                loading="lazy"
                            >

                        </button>

                    @endforeach

                </div>



                {{-- MAIN IMAGE --}}

                <div class="pd-main-image-area">

                    <div
                        class="pd-main-image-wrap"
                        id="pd-360-stage"
                    >

                        <img
                            src="{{ asset($galleryImages[0]) }}"
                            alt="{{ $product['name'] }}"
                            id="pd-main-product-image"
                            class="pd-main-product-image"
                        >


                        {{-- PREMIUM BADGE --}}

                        <div class="pd-premium-badge">

                            <i class="fa-solid fa-crown"></i>

                            <span>
                                PREMIUM QUALITY
                            </span>

                        </div>


                        {{-- 360 BUTTON --}}

                        <button
                            type="button"
                            class="pd-360-button"
                            id="pd-360-button"
                            aria-label="View 360 degrees"
                        >

                            <strong>
                                360°
                            </strong>

                            <span>
                                <i class="fa-solid fa-rotate"></i>
                                VIEW 360°
                            </span>

                        </button>


                        {{-- ZOOM BUTTON --}}

                        <button
                            type="button"
                            class="pd-zoom-button"
                            id="pd-zoom-button"
                            aria-label="Zoom product image"
                        >

                            <i class="fa-solid fa-magnifying-glass-plus"></i>

                        </button>

                    </div>



                    {{-- BOTTOM 4 THUMBNAILS --}}

                    <div class="pd-bottom-thumbs">

                        @foreach(
                            array_slice(
                                $galleryImages,
                                4,
                                4
                            )
                            as $index => $image
                        )

                            <button
                                type="button"
                                class="pd-bottom-thumb-btn"
                                data-pd-image="{{ asset($image) }}"
                                aria-label="View product image {{ $index + 5 }}"
                            >

                                <img
                                    src="{{ asset($image) }}"
                                    alt="{{ $product['name'] }}"
                                    loading="lazy"
                                >

                            </button>

                        @endforeach

                    </div>

                </div>

            </div>



            {{-- =================================================
                 RIGHT PRODUCT INFORMATION
            ================================================== --}}

            <div class="pd-product-info">


                {{-- CATEGORY --}}

                <div class="pd-category">

                    {{ strtoupper(
                        $currentCategory['title']
                    ) }}

                </div>


                {{-- PRODUCT NAME --}}

                <h1 class="pd-product-title">

                    {{ $product['name'] }}

                </h1>



                {{-- RATING --}}

                <div class="pd-rating-row">

                    <span class="pd-review-count">

                        {{ $reviewCount }}
                        {{ $reviewCount === 1 ? 'Review' : 'Reviews' }}

                    </span>


                    <span class="pd-rating-divider"></span>


                    <div
                        class="pd-stars"
                        aria-label="{{ number_format($rating, 1) }} out of 5"
                    >

                        @for($i = 1; $i <= 5; $i++)

                            <i
                                class="fa-solid fa-star
                                {{ $i <= round($rating) ? '' : 'pd-star-muted' }}"
                            ></i>

                        @endfor

                    </div>


                    <strong class="pd-rating-number">

                        {{ number_format(
                            $rating,
                            1
                        ) }}

                    </strong>

                </div>



                {{-- PRICE --}}

                <div class="pd-price">

                    ₹{{ number_format(
                        (float) (
                            $product['price']
                            ?? 1000
                        ),
                        0
                    ) }}

                    <span>
                        / piece
                    </span>

                </div>


                <div class="pd-tax-note">
                    (Inclusive of all taxes)
                </div>



                {{-- DESCRIPTION --}}

                <p class="pd-short-description">

                    {{ $description }}

                </p>


                <div class="pd-separator"></div>



                {{-- =================================================
                     PRODUCT TYPES
                ================================================== --}}

                <div class="pd-option-block">

                    <div class="pd-option-heading">

                        <i class="fa-solid fa-layer-group"></i>

                        <span>
                            PRODUCT TYPE
                        </span>

                    </div>


                    <div class="pd-type-options">

                        @foreach(
                            $productTypes
                            as $index => $type
                        )

                            <button
                                type="button"
                                class="pd-type-btn {{ $index === 0 ? 'active' : '' }}"
                                data-product-type="{{ $type }}"
                            >

                                <span
                                    class="pd-finish-icon {{ $finishClass($type) }}"
                                ></span>

                                <strong>
                                    {{ $type }}
                                </strong>

                            </button>

                        @endforeach

                    </div>

                </div>



                {{-- =================================================
                     QUANTITY
                ================================================== --}}

                <div class="pd-option-block pd-quantity-section">

                    <div class="pd-option-heading">

                        <i class="fa-solid fa-cube"></i>

                        <span>
                            QUANTITY
                        </span>

                    </div>


                    <div class="pd-quantity-box">

                        <button
                            type="button"
                            class="pd-qty-btn"
                            data-qty-minus
                            aria-label="Decrease quantity"
                        >
                            −
                        </button>


                        <input
                            type="number"
                            id="pd-quantity"
                            value="1"
                            min="1"
                            inputmode="numeric"
                        >


                        <button
                            type="button"
                            class="pd-qty-btn"
                            data-qty-plus
                            aria-label="Increase quantity"
                        >
                            +
                        </button>

                    </div>

                </div>



                {{-- =================================================
                     ACTION BUTTONS
                ================================================== --}}

                <div class="pd-action-buttons">

                    <button
                        type="button"
                        class="pd-add-cart-btn"
                        id="pd-add-cart"
                    >

                        <i class="fa-solid fa-cart-shopping"></i>

                        <span>
                            ADD TO CART
                        </span>

                    </button>


                    <a
                        href="{{ route(
                            'contact',
                            [
                                'product' =>
                                    $product['name']
                            ]
                        ) }}"
                        class="pd-request-quote-btn"
                    >

                        <i class="fa-regular fa-file-lines"></i>

                        <span>
                            REQUEST QUOTE
                        </span>

                    </a>

                </div>



                {{-- =================================================
                     TRUST ITEMS
                ================================================== --}}

                <div class="pd-trust-row">


                    <div class="pd-trust-item">

                        <i class="fa-solid fa-truck-fast"></i>

                        <div>

                            <strong>
                                FREE SHIPPING
                            </strong>

                            <span>
                                On eligible orders
                            </span>

                        </div>

                    </div>


                    <div class="pd-trust-item">

                        <i class="fa-solid fa-shield-halved"></i>

                        <div>

                            <strong>
                                SECURE PAYMENTS
                            </strong>

                            <span>
                                Protected checkout
                            </span>

                        </div>

                    </div>


                    <div class="pd-trust-item">

                        <i class="fa-solid fa-boxes-stacked"></i>

                        <div>

                            <strong>
                                BULK ORDER
                            </strong>

                            <span>
                                Business enquiries
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     IMAGE ZOOM MODAL
========================================================= --}}

<div
    class="pd-image-modal"
    id="pd-image-modal"
    aria-hidden="true"
>

    <button
        type="button"
        class="pd-modal-close"
        id="pd-modal-close"
        aria-label="Close image"
    >

        <i class="fa-solid fa-xmark"></i>

    </button>


    <img
        src="{{ asset($galleryImages[0]) }}"
        alt="{{ $product['name'] }}"
        id="pd-modal-image"
    >

</div>



{{-- =========================================================
     PRODUCT INFORMATION TABS
========================================================= --}}

<section class="pd-info-section">

    <div class="pd-main-container">


        {{-- =================================================
             TAB NAVIGATION
        ================================================== --}}

        <div
            class="pd-info-tabs"
            role="tablist"
        >

            <button
                type="button"
                class="pd-info-tab active"
                data-pd-tab="product-detail"
            >
                Product Detail
            </button>


            <button
                type="button"
                class="pd-info-tab"
                data-pd-tab="specification"
            >
                Specification
            </button>


            <button
                type="button"
                class="pd-info-tab"
                data-pd-tab="dimensions"
            >
                Dimensions
            </button>


            <button
                type="button"
                class="pd-info-tab"
                data-pd-tab="installation"
            >
                Installation Guide
            </button>


            <button
                type="button"
                class="pd-info-tab"
                data-pd-tab="faqs"
            >
                FAQs
            </button>

        </div>



        {{-- =================================================
             TAB 1 : PRODUCT DETAIL
        ================================================== --}}

        <div
            class="pd-tab-panel active"
            data-pd-panel="product-detail"
        >

            <div class="pd-detail-content">

                <span class="pd-info-small-title">
                    PRODUCT INFORMATION
                </span>


                <h2>
                    Product Detail
                </h2>


                {{-- ADMIN CONTENT OR EXACT FALLBACK --}}

                @if(!empty($detailContent))

                    <p>
                        {!! nl2br(e($detailContent)) !!}
                    </p>

                @else

                    <p>
                        Premium quality hardware designed to bring together
                        elegant styling, dependable performance and a refined
                        finish. Its clean design makes it suitable for modern
                        residential, office and commercial interiors.
                    </p>

                    <p>
                        Available in multiple finish options, this product can
                        be selected according to your interior style and
                        application requirement.
                    </p>

                @endif



                {{-- ADMIN FEATURES OR EXACT FALLBACK --}}

                @if(!empty($detailFeatures))

                    <div class="pd-detail-feature-grid">

                        @foreach(
                            $detailFeatures
                            as $index => $feature
                        )

                            @php

                                $featureTitle =
                                    trim(
                                        (string) (
                                            $feature['title']
                                            ?? ''
                                        )
                                    );

                                $featureDescription =
                                    trim(
                                        (string) (
                                            $feature['description']
                                            ?? ''
                                        )
                                    );


                                $featureIcons = [
                                    'fa-solid fa-check',
                                    'fa-solid fa-layer-group',
                                    'fa-solid fa-house',
                                ];


                                $featureIcon =
                                    $featureIcons[
                                        $index
                                        % count($featureIcons)
                                    ];

                            @endphp


                            <div class="pd-detail-feature">

                                <span>

                                    <i class="{{ $featureIcon }}"></i>

                                </span>


                                <div>

                                    @if($featureTitle !== '')

                                        <strong>
                                            {{ $featureTitle }}
                                        </strong>

                                    @endif


                                    @if($featureDescription !== '')

                                        <p>
                                            {{ $featureDescription }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        @endforeach

                    </div>


                @else


                    {{-- EXACT ORIGINAL FEATURES --}}

                    <div class="pd-detail-feature-grid">


                        <div class="pd-detail-feature">

                            <span>
                                <i class="fa-solid fa-check"></i>
                            </span>

                            <div>

                                <strong>
                                    Premium Quality
                                </strong>

                                <p>
                                    Designed with attention to finish and detailing.
                                </p>

                            </div>

                        </div>


                        <div class="pd-detail-feature">

                            <span>
                                <i class="fa-solid fa-layer-group"></i>
                            </span>

                            <div>

                                <strong>
                                    Multiple Finishes
                                </strong>

                                <p>
                                    Available in different finish options.
                                </p>

                            </div>

                        </div>


                        <div class="pd-detail-feature">

                            <span>
                                <i class="fa-solid fa-house"></i>
                            </span>

                            <div>

                                <strong>
                                    Modern Design
                                </strong>

                                <p>
                                    Suitable for a wide range of interiors.
                                </p>

                            </div>

                        </div>

                    </div>

                @endif

            </div>

        </div>



        {{-- =================================================
             TAB 2 : SPECIFICATION
        ================================================== --}}

        <div
            class="pd-tab-panel"
            data-pd-panel="specification"
        >

            <div class="pd-spec-content">

                <span class="pd-info-small-title">
                    PRODUCT INFORMATION
                </span>


                <h2>
                    Specification
                </h2>


                <div class="pd-info-table">


                    {{-- PRODUCT NAME --}}

                    <div class="pd-info-table-row">

                        <span>
                            Product Name
                        </span>

                        <strong>
                            {{ $product['name'] }}
                        </strong>

                    </div>



                    {{-- CATEGORY --}}

                    <div class="pd-info-table-row">

                        <span>
                            Category
                        </span>

                        <strong>
                            {{ $currentCategory['title'] ?? 'Hardware' }}
                        </strong>

                    </div>



                    {{-- AVAILABLE FINISH --}}

                    <div class="pd-info-table-row">

                        <span>
                            Available Finish
                        </span>

                        <strong>
                            {{ implode(
                                ', ',
                                $productTypes
                            ) }}
                        </strong>

                    </div>



                    {{-- ADMIN SPECIFICATIONS --}}

                    @foreach(
                        $specifications
                        as $specification
                    )

                        @php

                            $specLabel =
                                trim(
                                    (string) (
                                        $specification['label']
                                        ?? ''
                                    )
                                );

                            $specValue =
                                trim(
                                    (string) (
                                        $specification['value']
                                        ?? ''
                                    )
                                );

                        @endphp


                        <div class="pd-info-table-row">

                            <span>
                                {{ $specLabel }}
                            </span>

                            <strong>
                                {{ $specValue }}
                            </strong>

                        </div>

                    @endforeach



                    {{-- BRAND --}}

                    <div class="pd-info-table-row">

                        <span>
                            Brand
                        </span>

                        <strong>
                            {{ $companyName }}
                        </strong>

                    </div>



                    {{-- COUNTRY --}}

                    <div class="pd-info-table-row">

                        <span>
                            Country
                        </span>

                        <strong>
                            India
                        </strong>

                    </div>

                </div>

            </div>

        </div>



        {{-- =================================================
             TAB 3 : DIMENSIONS
        ================================================== --}}

        <div
            class="pd-tab-panel"
            data-pd-panel="dimensions"
        >

            <div class="pd-dimension-content">

                <span class="pd-info-small-title">
                    PRODUCT MEASUREMENTS
                </span>


                <h2>
                    Dimensions
                </h2>


                <p class="pd-tab-intro">
                    Product dimensions and size information will
                    be displayed here.
                </p>



                <div class="pd-dimension-grid">


                    {{-- WIDTH --}}

                    <div class="pd-dimension-box">

                        <span class="pd-dimension-icon">

                            <i class="fa-solid fa-arrows-left-right"></i>

                        </span>

                        <small>
                            WIDTH
                        </small>

                        <strong>
                            {{ $dimensionWidth !== ''
                                ? $dimensionWidth
                                : '—'
                            }}
                        </strong>

                    </div>



                    {{-- HEIGHT --}}

                    <div class="pd-dimension-box">

                        <span class="pd-dimension-icon">

                            <i class="fa-solid fa-arrows-up-down"></i>

                        </span>

                        <small>
                            HEIGHT
                        </small>

                        <strong>
                            {{ $dimensionHeight !== ''
                                ? $dimensionHeight
                                : '—'
                            }}
                        </strong>

                    </div>



                    {{-- LENGTH --}}

                    <div class="pd-dimension-box">

                        <span class="pd-dimension-icon">

                            <i class="fa-solid fa-ruler"></i>

                        </span>

                        <small>
                            LENGTH
                        </small>

                        <strong>
                            {{ $dimensionLength !== ''
                                ? $dimensionLength
                                : '—'
                            }}
                        </strong>

                    </div>



                    {{-- WEIGHT --}}

                    <div class="pd-dimension-box">

                        <span class="pd-dimension-icon">

                            <i class="fa-solid fa-weight-hanging"></i>

                        </span>

                        <small>
                            WEIGHT
                        </small>

                        <strong>
                            {{ $dimensionWeight !== ''
                                ? $dimensionWeight
                                : '—'
                            }}
                        </strong>

                    </div>

                </div>



                @if(
                    $dimensionWidth === ''
                    &&
                    $dimensionHeight === ''
                    &&
                    $dimensionLength === ''
                    &&
                    $dimensionWeight === ''
                )

                    <div class="pd-dimension-note">

                        <i class="fa-solid fa-circle-info"></i>

                        <p>
                            Exact dimensions can be updated according
                            to the selected product model.
                        </p>

                    </div>

                @endif

            </div>

        </div>



        {{-- =================================================
             TAB 4 : INSTALLATION GUIDE
        ================================================== --}}

        <div
            class="pd-tab-panel"
            data-pd-panel="installation"
        >

            <div class="pd-install-content">

                <span class="pd-info-small-title">
                    EASY INSTALLATION
                </span>


                <h2>
                    Installation Guide
                </h2>


                <p class="pd-tab-intro">
                    Follow the installation information provided
                    with the product and make sure the product is
                    correctly aligned before final fitting.
                </p>



                <div class="pd-install-steps">

                    @if(!empty($installationSteps))


                        {{-- ADMIN INSTALLATION STEPS --}}

                        @foreach(
                            $installationSteps
                            as $index => $step
                        )

                            @php

                                $stepTitle =
                                    trim(
                                        (string) (
                                            $step['title']
                                            ?? ''
                                        )
                                    );

                                $stepDescription =
                                    trim(
                                        (string) (
                                            $step['description']
                                            ?? ''
                                        )
                                    );

                            @endphp


                            <div class="pd-install-step">

                                <span class="pd-install-number">

                                    {{ str_pad(
                                        $index + 1,
                                        2,
                                        '0',
                                        STR_PAD_LEFT
                                    ) }}

                                </span>


                                <div>

                                    @if($stepTitle !== '')

                                        <strong>
                                            {{ $stepTitle }}
                                        </strong>

                                    @endif


                                    @if($stepDescription !== '')

                                        <p>
                                            {{ $stepDescription }}
                                        </p>

                                    @endif

                                </div>

                            </div>

                        @endforeach


                    @else


                        {{-- EXACT ORIGINAL FALLBACK --}}

                        <div class="pd-install-step">

                            <span class="pd-install-number">
                                01
                            </span>

                            <div>

                                <strong>
                                    Check the Product
                                </strong>

                                <p>
                                    Check the product and required fitting components before installation.
                                </p>

                            </div>

                        </div>


                        <div class="pd-install-step">

                            <span class="pd-install-number">
                                02
                            </span>

                            <div>

                                <strong>
                                    Mark the Position
                                </strong>

                                <p>
                                    Place the product in the required position and mark the fitting points.
                                </p>

                            </div>

                        </div>


                        <div class="pd-install-step">

                            <span class="pd-install-number">
                                03
                            </span>

                            <div>

                                <strong>
                                    Align the Product
                                </strong>

                                <p>
                                    Make sure the product is correctly positioned and aligned.
                                </p>

                            </div>

                        </div>


                        <div class="pd-install-step">

                            <span class="pd-install-number">
                                04
                            </span>

                            <div>

                                <strong>
                                    Complete Installation
                                </strong>

                                <p>
                                    Complete the fitting and check the product alignment after installation.
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>



        {{-- =================================================
             TAB 5 : FAQ
        ================================================== --}}

        <div
            class="pd-tab-panel"
            data-pd-panel="faqs"
        >

            <div class="pd-faq-content">

                <span class="pd-info-small-title">
                    NEED HELP?
                </span>


                <h2>
                    Frequently Asked Questions
                </h2>


                <div class="pd-faq-list">

                    @if(!empty($productFaqs))


                        {{-- ADMIN FAQs --}}

                        @foreach(
                            $productFaqs
                            as $index => $faq
                        )

                            @php

                                $question =
                                    trim(
                                        (string) (
                                            $faq['question']
                                            ?? ''
                                        )
                                    );

                                $answer =
                                    trim(
                                        (string) (
                                            $faq['answer']
                                            ?? ''
                                        )
                                    );

                            @endphp


                            <div
                                class="pd-faq-item {{ $index === 0 ? 'active' : '' }}"
                            >

                                <button
                                    type="button"
                                    class="pd-faq-question"
                                >

                                    <span>
                                        {{ $question }}
                                    </span>

                                    <i class="fa-solid fa-plus"></i>

                                </button>


                                <div class="pd-faq-answer">

                                    <p>
                                        {{ $answer }}
                                    </p>

                                </div>

                            </div>

                        @endforeach


                    @else


                        {{-- EXACT ORIGINAL FAQ 1 --}}

                        <div class="pd-faq-item active">

                            <button
                                type="button"
                                class="pd-faq-question"
                            >

                                <span>
                                    Which finishes are available?
                                </span>

                                <i class="fa-solid fa-plus"></i>

                            </button>


                            <div class="pd-faq-answer">

                                <p>
                                    The current finish options are SS, PVD Gold, Matt Black and Antique Brass.
                                </p>

                            </div>

                        </div>



                        {{-- EXACT ORIGINAL FAQ 2 --}}

                        <div class="pd-faq-item">

                            <button
                                type="button"
                                class="pd-faq-question"
                            >

                                <span>
                                    Can I request a bulk order?
                                </span>

                                <i class="fa-solid fa-plus"></i>

                            </button>


                            <div class="pd-faq-answer">

                                <p>
                                    Yes. You can use the Request Quote option to send an enquiry for bulk requirements.
                                </p>

                            </div>

                        </div>



                        {{-- EXACT ORIGINAL FAQ 3 --}}

                        <div class="pd-faq-item">

                            <button
                                type="button"
                                class="pd-faq-question"
                            >

                                <span>
                                    How can I get more product information?
                                </span>

                                <i class="fa-solid fa-plus"></i>

                            </button>


                            <div class="pd-faq-answer">

                                <p>
                                    You can contact M R Hardware through the contact page for additional product information.
                                </p>

                            </div>

                        </div>



                        {{-- EXACT ORIGINAL FAQ 4 --}}

                        <div class="pd-faq-item">

                            <button
                                type="button"
                                class="pd-faq-question"
                            >

                                <span>
                                    Are product dimensions available?
                                </span>

                                <i class="fa-solid fa-plus"></i>

                            </button>


                            <div class="pd-faq-answer">

                                <p>
                                    Product-specific measurements can be displayed in the Dimensions tab once the exact measurements are added for the selected product.
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     PRODUCT VIDEO SECTION
     ONLY SHOW WHEN VIDEO EXISTS
========================================================= --}}

@if(!empty($productVideo))

    <section class="pd-video-section">

        <div class="pd-main-container">


            <div class="pd-video-header">

                <span class="pd-video-eyebrow">
                    SEE IT IN ACTION
                </span>


                <h2 class="pd-video-title">
                    Product Video
                </h2>


                <p class="pd-video-description">
                    Take a closer look at the product, its design,
                    finish and functionality.
                </p>

            </div>



            <div class="pd-video-wrapper">

                <video
                    class="pd-product-video"
                    controls
                    preload="metadata"
                    playsinline
                >

                     <source src="{{ asset($productVideo) }}">

                    Your browser does not support the video tag.

                </video>

            </div>

        </div>

    </section>

@endif



{{-- =========================================================
     RELATED PRODUCTS
========================================================= --}}

@php

    $availableRelatedProducts =
        collect(
            $relatedProducts
            ?? []
        )
        ->filter(
            function ($item)
            use ($product) {

                return
                    ($item['slug'] ?? null)
                    !==
                    ($product['slug'] ?? null);

            }
        )
        ->take(10);

@endphp



@if($availableRelatedProducts->isNotEmpty())

    <section class="pd-related-section">

        <div class="pd-main-container">


            {{-- =================================================
                 SECTION HEADER
            ================================================== --}}

            <div class="pd-related-header">

                <div class="pd-related-heading">

                    <h2>
                        You May Also Like
                    </h2>

                    <p>
                        Explore more products from our collection.
                    </p>

                </div>


                <a
                    href="{{ route(
                        'products',
                        [
                            'category' =>
                                $currentCategory['slug']
                        ]
                    ) }}"
                    class="pd-related-view-all"
                >

                    <span>
                        View All Products
                    </span>

                    <i class="fa-solid fa-arrow-right"></i>

                </a>

            </div>



            {{-- =================================================
                 PRODUCTS SINGLE HORIZONTAL ROW
            ================================================== --}}

            <div class="pd-related-products-row">


                @foreach(
                    $availableRelatedProducts
                    as $related
                )

                    @php

                        /*
                        |--------------------------------------------------------------------------
                        | RELATED IMAGE
                        |--------------------------------------------------------------------------
                        */

                        $relatedImage =
                            !empty($related['image'])
                                ? $related['image']
                                : 'images/placeholder-product.jpg';


                        /*
                        |--------------------------------------------------------------------------
                        | RELATED PRICE
                        |--------------------------------------------------------------------------
                        */

                        $relatedPrice =
                            isset($related['price'])
                            && is_numeric(
                                $related['price']
                            )
                                ? (float) $related['price']
                                : 1000;


                        /*
                        |--------------------------------------------------------------------------
                        | RELATED CATEGORY
                        |--------------------------------------------------------------------------
                        */

                        $relatedCategory =
                            $related['category']
                            ?? null;

                    @endphp



                    <a
                        href="{{ route(
                            'product.detail',
                            [
                                'slug' =>
                                    $related['slug']
                            ]
                        ) }}"
                        class="pd-related-card"
                    >


                        {{-- PRODUCT IMAGE --}}

                        <div class="pd-related-image">

                            <img
                                src="{{ asset($relatedImage) }}"
                                alt="{{ $related['name'] ?? 'Product' }}"
                                loading="lazy"
                            >

                        </div>



                        {{-- PRODUCT CONTENT --}}

                        <div class="pd-related-content">


                            @if(!empty($relatedCategory))

                                <span class="pd-related-category">

                                    {{ strtoupper(
                                        $relatedCategory
                                    ) }}

                                </span>

                            @endif



                            <h3>

                                {{ $related['name'] ?? 'Product' }}

                            </h3>



                            <div class="pd-related-bottom">


                                {{-- PRICE --}}

                                <div class="pd-related-price">

                                    <span class="pd-related-price-value">

                                        ₹{{ number_format(
                                            $relatedPrice,
                                            0
                                        ) }}

                                    </span>

                                    <small>
                                        / Piece
                                    </small>

                                </div>



                                {{-- ARROW --}}

                                <span class="pd-related-arrow">

                                    <i class="fa-solid fa-arrow-right"></i>

                                </span>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>

        </div>

    </section>

@endif


@endsection



@push('scripts')

    <script
        src="{{ asset('js/product-detail.js') }}"
    ></script>

@endpush