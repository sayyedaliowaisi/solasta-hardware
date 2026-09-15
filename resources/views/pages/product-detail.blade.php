<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $product['name'] }} | M R Hardware</title>

    <meta
        name="description"
        content="{{ $product['description'] ?: 'Explore product details and enquire with M R Hardware.' }}"
    >

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        html {
            scroll-behavior: smooth;
        }

        body {
            font-family:
                Inter,
                ui-sans-serif,
                system-ui,
                -apple-system,
                BlinkMacSystemFont,
                "Segoe UI",
                sans-serif;
        }

        .product-scroll {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f1f5f9;
        }

        .product-scroll::-webkit-scrollbar {
            height: 7px;
        }

        .product-scroll::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 999px;
        }

        .product-scroll::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 999px;
        }
    </style>
</head>

<body class="bg-[#f6f6f3] text-slate-900 antialiased">

@php

    /*
    |--------------------------------------------------------------------------
    | PRODUCT DETAIL CMS
    |--------------------------------------------------------------------------
    */

    $productDetailPage = $productDetailPage ?? null;


    /*
    |--------------------------------------------------------------------------
    | Product Description
    |--------------------------------------------------------------------------
    */

    $description = !empty($product['description'])
        ? $product['description']
        : 'Explore this product from our '
            . strtolower($currentCategory['title'])
            . ' collection. Contact M R Hardware for model-wise specifications, availability and enquiry details.';


    /*
    |--------------------------------------------------------------------------
    | Navigation
    |--------------------------------------------------------------------------
    */

    $backToProductsText =
        data_get($productDetailPage, 'back_to_products_text')
        ?: 'Back to Products';

    $collectionButtonText =
        data_get($productDetailPage, 'collection_button_text')
        ?: 'View Collection';


    /*
    |--------------------------------------------------------------------------
    | Product Information
    |--------------------------------------------------------------------------
    */

    $productBadge =
        data_get($productDetailPage, 'product_badge')
        ?: 'Product Details';

    $specificationsTitle =
        data_get($productDetailPage, 'specifications_title')
        ?: 'Product Information';

    $specificationsNote =
        data_get($productDetailPage, 'specifications_note')
        ?: 'Contact us for model-wise specifications, availability and business enquiries.';


    /*
    |--------------------------------------------------------------------------
    | Enquiry
    |--------------------------------------------------------------------------
    */

    $enquiryBadge =
        data_get($productDetailPage, 'enquiry_badge')
        ?: 'Interested in this product?';

    $enquiryTitle =
        data_get($productDetailPage, 'enquiry_title')
        ?: 'Ask for product details or availability';

    $enquiryDescription =
        data_get($productDetailPage, 'enquiry_description')
        ?: 'Send your requirement and this product will already be selected in the enquiry form.';

    $enquiryButtonText =
        data_get($productDetailPage, 'enquiry_button_text')
        ?: 'Send Enquiry';


    /*
    |--------------------------------------------------------------------------
    | Related Products
    |--------------------------------------------------------------------------
    */

    $relatedSectionBadge =
        data_get($productDetailPage, 'related_section_badge')
        ?: 'More to explore';

    $relatedSectionTitle =
        data_get($productDetailPage, 'related_section_title')
        ?: 'Related Products';

    $relatedProductButtonText =
        data_get($productDetailPage, 'related_product_button_text')
        ?: 'View Product';


    /*
    |--------------------------------------------------------------------------
    | Final CTA
    |--------------------------------------------------------------------------
    */

    $ctaBadge =
        data_get($productDetailPage, 'cta_badge')
        ?: 'M R Hardware';

    $ctaTitle =
        data_get($productDetailPage, 'cta_title')
        ?: 'Need details for this product?';

    $ctaDescription =
        data_get($productDetailPage, 'cta_description')
        ?: 'Send your requirement and our team can respond regarding this product and current availability.';

    $ctaButtonText =
        data_get($productDetailPage, 'cta_button_text')
        ?: 'Enquire About This Product';

@endphp


<main class="min-h-screen">


    {{-- =========================================================
         MINIMAL TOP BAR
    ========================================================== --}}
    <section
        class="border-b border-slate-200 bg-white
               lg:h-[58px]"
    >
        <div
            class="mx-auto flex min-h-[58px] max-w-[1180px]
                   items-center justify-between gap-3
                   px-4 sm:px-6 lg:h-[58px] lg:min-h-0 lg:px-8"
        >

            <a
                href="{{ route('products', ['category' => $currentCategory['slug']]) }}"
                class="group inline-flex items-center gap-2
                       text-[12px] sm:text-[13px]
                       font-semibold text-slate-600
                       transition hover:text-slate-950"
            >
                <span
                    class="flex h-8 w-8 items-center justify-center
                           rounded-full border border-slate-200
                           bg-white transition
                           group-hover:border-slate-400"
                >
                    ←
                </span>

                <span class="hidden sm:inline">
                    {{ $backToProductsText }}
                </span>

                <span class="sm:hidden">
                    Back
                </span>
            </a>


            <a
                href="{{ route('home') }}"
                class="text-[13px] sm:text-[14px]
                       font-black tracking-[-0.02em]
                       text-slate-950"
            >
                M R HARDWARE
            </a>


            <a
                href="{{ route('contact', ['product' => $product['name']]) }}"
                class="inline-flex h-9 items-center justify-center
                       rounded-full bg-slate-950
                       px-4 text-[11px] sm:text-[12px]
                       font-bold text-white
                       transition hover:bg-orange-600"
            >
                {{ $enquiryButtonText }}
            </a>

        </div>
    </section>



    {{-- =========================================================
         DESKTOP: ONE-SCREEN PRODUCT VIEW
    ========================================================== --}}
    <section
        class="hidden lg:flex
               min-h-[calc(100vh-58px)]
               items-center"
    >
        <div
            class="mx-auto flex w-full max-w-[1180px]
                   flex-col
                   px-8
                   py-5"
        >

            {{-- Breadcrumb --}}
            <div
                class="flex h-[28px] shrink-0
                       items-center gap-2
                       text-[10px]
                       font-medium text-slate-400"
            >
                <a
                    href="{{ route('products') }}"
                    class="transition hover:text-slate-800"
                >
                    Products
                </a>

                <span>/</span>

                <a
                    href="{{ route('products', ['category' => $currentCategory['slug']]) }}"
                    class="transition hover:text-slate-800"
                >
                    {{ $currentCategory['title'] }}
                </a>

                <span>/</span>

                <span class="text-slate-600">
                    {{ $product['name'] }}
                </span>
            </div>


            {{-- Main row --}}
            <div
                class="mt-3 grid
                       h-[min(650px,calc(100vh-135px))]
                       min-h-[500px]
                       grid-cols-[1.02fr_.98fr]
                       items-stretch
                       gap-7"
            >

                {{-- LEFT IMAGE --}}
                <div
                    class="relative min-h-0 overflow-hidden
                           rounded-[22px]
                           border border-slate-200
                           bg-white
                           shadow-[0_14px_40px_rgba(15,23,42,0.06)]"
                >

                    <div
                        class="absolute left-4 top-4 z-10
                               rounded-full
                               border border-white/70
                               bg-white/90
                               px-3 py-1.5
                               text-[9px]
                               font-bold uppercase
                               tracking-[0.14em]
                               text-slate-700
                               shadow-sm backdrop-blur"
                    >
                        {{ $currentCategory['title'] }}
                    </div>


                    <img
                        src="{{ asset($product['image']) }}"
                        alt="{{ $product['name'] }}"
                        class="absolute inset-0
                               h-full w-full
                               object-cover object-center"
                    >


                    <div
                        class="pointer-events-none
                               absolute inset-x-0 bottom-0
                               h-20
                               bg-gradient-to-t
                               from-black/15 to-transparent"
                    ></div>

                </div>


                {{-- RIGHT INFORMATION --}}
                <div
                    class="flex min-h-0 flex-col
                           rounded-[22px]
                           border border-slate-200
                           bg-white
                           p-6
                           shadow-[0_14px_40px_rgba(15,23,42,0.05)]"
                >

                    <p
                        class="shrink-0
                               text-[9px]
                               font-bold uppercase
                               tracking-[0.16em]
                               text-orange-600"
                    >
                        {{ $productBadge }}
                    </p>


                    <h1
                        class="mt-2 shrink-0
                               text-[28px]
                               font-black
                               leading-[1.12]
                               tracking-[-0.035em]
                               text-slate-950"
                    >
                        {{ $product['name'] }}
                    </h1>


                    <div
                        class="mt-3 h-px w-full shrink-0
                               bg-gradient-to-r
                               from-slate-200
                               via-slate-200
                               to-transparent"
                    ></div>


                    <p
                        class="mt-3 shrink-0
                               text-[13px]
                               leading-6
                               text-slate-600
                               line-clamp-3"
                    >
                        {{ $description }}
                    </p>


                    {{-- QUICK INFO --}}
                    <div class="mt-4 grid shrink-0 grid-cols-2 gap-3">

                        <div
                            class="rounded-2xl
                                   bg-[#f7f7f4]
                                   px-4 py-3"
                        >
                            <p
                                class="text-[8px]
                                       font-bold uppercase
                                       tracking-[0.14em]
                                       text-slate-400"
                            >
                                Category
                            </p>

                            <p
                                class="mt-1
                                       text-[12px]
                                       font-bold
                                       leading-5
                                       text-slate-900"
                            >
                                {{ $currentCategory['title'] }}
                            </p>
                        </div>


                        <div
                            class="rounded-2xl
                                   bg-[#f7f7f4]
                                   px-4 py-3"
                        >
                            <p
                                class="text-[8px]
                                       font-bold uppercase
                                       tracking-[0.14em]
                                       text-slate-400"
                            >
                                {{ $specificationsTitle }}
                            </p>

                            <p
                                class="mt-1
                                       text-[12px]
                                       font-bold
                                       leading-5
                                       text-slate-900"
                            >
                                Contact to confirm
                            </p>
                        </div>

                    </div>


                    {{-- ENQUIRY PANEL --}}
                    <div
                        class="mt-4 shrink-0
                               rounded-[18px]
                               bg-slate-950
                               p-5
                               text-white"
                    >

                        <p
                            class="text-[9px]
                                   font-bold uppercase
                                   tracking-[0.16em]
                                   text-orange-400"
                        >
                            {{ $enquiryBadge }}
                        </p>


                        <h2
                            class="mt-1.5
                                   text-[17px]
                                   font-bold
                                   leading-6
                                   tracking-[-0.02em]"
                        >
                            {{ $enquiryTitle }}
                        </h2>


                        <p
                            class="mt-1.5
                                   text-[12px]
                                   leading-5
                                   text-slate-300"
                        >
                            {{ $enquiryDescription }}
                        </p>


                        <div class="mt-4 flex gap-2.5">

                            <a
                                href="{{ route('contact', ['product' => $product['name']]) }}"
                                class="inline-flex
                                       min-h-[40px]
                                       flex-1
                                       items-center
                                       justify-center
                                       rounded-xl
                                       bg-orange-600
                                       px-4
                                       text-[12px]
                                       font-bold
                                       text-white
                                       transition
                                       hover:bg-orange-500"
                            >
                                {{ $enquiryButtonText }}
                            </a>


                            <a
                                href="{{ route('products', ['category' => $currentCategory['slug']]) }}"
                                class="inline-flex
                                       min-h-[40px]
                                       items-center
                                       justify-center
                                       rounded-xl
                                       border border-white/15
                                       px-4
                                       text-[12px]
                                       font-semibold
                                       text-white
                                       transition
                                       hover:bg-white/10"
                            >
                                {{ $collectionButtonText }}
                            </a>

                        </div>

                    </div>


                    {{-- OPTIONAL VIDEO BUTTON / NOTE --}}
                    @if(!empty($product['video']))

                        <a
                            href="#mobile-product-video"
                            class="mt-4 inline-flex shrink-0
                                   items-center gap-2
                                   text-[11px]
                                   font-bold
                                   text-slate-500"
                        >
                            <span
                                class="flex h-7 w-7
                                       items-center justify-center
                                       rounded-full
                                       bg-orange-50
                                       text-orange-600"
                            >
                                ▶
                            </span>

                            Product video available below
                        </a>

                    @else

                        <div
                            class="mt-4 flex shrink-0
                                   items-start gap-3
                                   rounded-2xl
                                   border border-slate-100
                                   px-4 py-3"
                        >

                            <span
                                class="flex h-7 w-7
                                       shrink-0
                                       items-center
                                       justify-center
                                       rounded-full
                                       bg-orange-50
                                       text-orange-600"
                            >
                                ✓
                            </span>

                            <div>
                                <p
                                    class="text-[11px]
                                           font-bold
                                           text-slate-900"
                                >
                                    {{ $specificationsTitle }}
                                </p>

                                <p
                                    class="mt-0.5
                                           text-[10px]
                                           leading-4
                                           text-slate-500"
                                >
                                    {{ $specificationsNote }}
                                </p>
                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>
    </section>




    {{-- =========================================================
         DESKTOP VIDEO SECTION
    ========================================================== --}}
    @if(!empty($product['video']))

        <section
            id="desktop-product-video"
            class="hidden lg:flex
                   min-h-screen
                   items-center
                   border-t border-slate-200
                   bg-white"
        >
            <div class="mx-auto w-full max-w-[1180px] px-8 py-10">

                <div
                    class="grid grid-cols-[.72fr_1.28fr]
                           items-center gap-10"
                >
                    <div>

                        <p
                            class="text-[9px]
                                   font-bold uppercase
                                   tracking-[0.18em]
                                   text-orange-600"
                        >
                            {{ $productBadge }}
                        </p>

                        <h2
                            class="mt-2
                                   text-[28px]
                                   font-black
                                   leading-[1.15]
                                   tracking-[-0.03em]
                                   text-slate-950"
                        >
                            See {{ $product['name'] }} in motion
                        </h2>

                        <p
                            class="mt-4
                                   max-w-md
                                   text-[13px]
                                   leading-6
                                   text-slate-600"
                        >
                            {{ $specificationsNote }}
                        </p>

                        <a
                            href="{{ route('contact', ['product' => $product['name']]) }}"
                            class="mt-6 inline-flex
                                   min-h-[42px]
                                   items-center justify-center
                                   rounded-xl
                                   bg-orange-600
                                   px-5
                                   text-[12px]
                                   font-bold
                                   text-white
                                   transition
                                   hover:bg-orange-500"
                        >
                            {{ $enquiryButtonText }}
                        </a>

                    </div>

                    <div
                        class="overflow-hidden
                               rounded-[22px]
                               border border-slate-200
                               bg-black
                               shadow-[0_16px_44px_rgba(15,23,42,0.08)]"
                    >
                        <video
                            controls
                            preload="metadata"
                            playsinline
                            class="aspect-video w-full object-contain"
                        >
                            <source
                                src="{{ asset($product['video']) }}"
                                type="video/mp4"
                            >
                        </video>
                    </div>

                </div>

            </div>
        </section>

    @endif


    {{-- =========================================================
         MOBILE + TABLET
    ========================================================== --}}
    <section class="lg:hidden py-6 sm:py-8">

        <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

            <div
                class="mb-5 flex flex-wrap items-center gap-2
                       text-[10px] sm:text-[11px]
                       font-medium text-slate-400"
            >
                <a
                    href="{{ route('products') }}"
                    class="transition hover:text-slate-800"
                >
                    Products
                </a>

                <span>/</span>

                <a
                    href="{{ route('products', ['category' => $currentCategory['slug']]) }}"
                    class="transition hover:text-slate-800"
                >
                    {{ $currentCategory['title'] }}
                </a>

                <span>/</span>

                <span class="text-slate-600">
                    {{ $product['name'] }}
                </span>
            </div>


            <div
                class="relative overflow-hidden
                       rounded-[22px]
                       border border-slate-200
                       bg-white
                       shadow-[0_14px_36px_rgba(15,23,42,0.06)]"
            >

                <div
                    class="absolute left-4 top-4 z-10
                           rounded-full
                           border border-white/70
                           bg-white/90
                           px-3 py-1.5
                           text-[9px]
                           font-bold uppercase
                           tracking-[0.14em]
                           text-slate-700
                           shadow-sm backdrop-blur"
                >
                    {{ $currentCategory['title'] }}
                </div>


                <div
                    class="relative
                           h-[350px]
                           sm:h-[450px]
                           w-full
                           bg-[#ecece7]"
                >
                    <img
                        src="{{ asset($product['image']) }}"
                        alt="{{ $product['name'] }}"
                        class="absolute inset-0
                               h-full w-full
                               object-cover object-center"
                    >
                </div>

            </div>


            <div
                class="mt-5
                       rounded-[22px]
                       border border-slate-200
                       bg-white
                       p-5 sm:p-6
                       shadow-[0_14px_36px_rgba(15,23,42,0.05)]"
            >

                <p
                    class="text-[9px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-orange-600"
                >
                    {{ $productBadge }}
                </p>


                <h1
                    class="mt-2
                           text-[25px]
                           sm:text-[29px]
                           font-black
                           leading-[1.14]
                           tracking-[-0.035em]
                           text-slate-950"
                >
                    {{ $product['name'] }}
                </h1>


                <div
                    class="mt-4 h-px w-full
                           bg-gradient-to-r
                           from-slate-200
                           via-slate-200
                           to-transparent"
                ></div>


                <p
                    class="mt-4
                           text-[13px]
                           sm:text-[14px]
                           leading-6
                           text-slate-600"
                >
                    {{ $description }}
                </p>


                <div class="mt-5 grid grid-cols-2 gap-3">

                    <div
                        class="rounded-2xl
                               bg-[#f7f7f4]
                               px-4 py-3.5"
                    >
                        <p
                            class="text-[8px]
                                   font-bold uppercase
                                   tracking-[0.14em]
                                   text-slate-400"
                        >
                            Category
                        </p>

                        <p
                            class="mt-1.5
                                   text-[12px]
                                   font-bold
                                   leading-5
                                   text-slate-900"
                        >
                            {{ $currentCategory['title'] }}
                        </p>
                    </div>


                    <div
                        class="rounded-2xl
                               bg-[#f7f7f4]
                               px-4 py-3.5"
                    >
                        <p
                            class="text-[8px]
                                   font-bold uppercase
                                   tracking-[0.14em]
                                   text-slate-400"
                        >
                            {{ $specificationsTitle }}
                        </p>

                        <p
                            class="mt-1.5
                                   text-[12px]
                                   font-bold
                                   leading-5
                                   text-slate-900"
                        >
                            Contact to confirm
                        </p>
                    </div>

                </div>


                <div
                    class="mt-5
                           rounded-[18px]
                           bg-slate-950
                           p-5
                           text-white"
                >

                    <p
                        class="text-[9px]
                               font-bold uppercase
                               tracking-[0.16em]
                               text-orange-400"
                    >
                        {{ $enquiryBadge }}
                    </p>


                    <h2
                        class="mt-2
                               text-[17px]
                               font-bold
                               leading-6"
                    >
                        {{ $enquiryTitle }}
                    </h2>


                    <p
                        class="mt-2
                               text-[12px]
                               leading-5
                               text-slate-300"
                    >
                        {{ $enquiryDescription }}
                    </p>


                    <div
                        class="mt-4 flex
                               flex-col gap-2.5
                               sm:flex-row"
                    >

                        <a
                            href="{{ route('contact', ['product' => $product['name']]) }}"
                            class="inline-flex
                                   min-h-[42px]
                                   flex-1
                                   items-center
                                   justify-center
                                   rounded-xl
                                   bg-orange-600
                                   px-4
                                   text-[12px]
                                   font-bold
                                   text-white
                                   transition
                                   hover:bg-orange-500"
                        >
                            {{ $enquiryButtonText }}
                        </a>


                        <a
                            href="{{ route('products', ['category' => $currentCategory['slug']]) }}"
                            class="inline-flex
                                   min-h-[42px]
                                   items-center
                                   justify-center
                                   rounded-xl
                                   border border-white/15
                                   px-4
                                   text-[12px]
                                   font-semibold
                                   text-white
                                   transition
                                   hover:bg-white/10"
                        >
                            {{ $collectionButtonText }}
                        </a>

                    </div>

                </div>

            </div>


            @if(!empty($product['video']))

                <div id="mobile-product-video" class="mt-6">

                    <p
                        class="text-[9px]
                               font-bold uppercase
                               tracking-[0.16em]
                               text-orange-600"
                    >
                        {{ $productBadge }}
                    </p>

                    <h2
                        class="mt-1
                               text-[17px]
                               font-bold
                               text-slate-950"
                    >
                        See {{ $product['name'] }} in motion
                    </h2>


                    <div
                        class="mt-3 overflow-hidden
                               rounded-[20px]
                               border border-slate-200
                               bg-black"
                    >
                        <video
                            controls
                            preload="metadata"
                            playsinline
                            class="aspect-video w-full object-contain"
                        >
                            <source
                                src="{{ asset($product['video']) }}"
                                type="video/mp4"
                            >
                        </video>
                    </div>

                </div>

            @endif

        </div>

    </section>



    {{-- =========================================================
         RELATED PRODUCTS
    ========================================================== --}}
    @if($relatedProducts->count() > 0)

        <section
            class="border-t border-slate-200
                   bg-white
                   py-9 sm:py-10
                   lg:flex lg:min-h-screen
                   lg:items-center lg:py-10"
        >
            <div
                class="mx-auto w-full
                       max-w-[820px]
                       px-4 sm:px-6
                       lg:max-w-[1180px]
                       lg:px-8"
            >

                <div
                    class="flex items-end
                           justify-between gap-4"
                >

                    <div>

                        <p
                            class="text-[9px]
                                   font-bold uppercase
                                   tracking-[0.18em]
                                   text-orange-600"
                        >
                            {{ $relatedSectionBadge }}
                        </p>


                        <h2
                            class="mt-1.5
                                   text-[21px]
                                   sm:text-[23px]
                                   lg:text-[25px]
                                   font-black
                                   tracking-[-0.03em]
                                   text-slate-950"
                        >
                            {{ $relatedSectionTitle }}
                        </h2>

                    </div>


                    <a
                        href="{{ route('products', ['category' => $currentCategory['slug']]) }}"
                        class="inline-flex items-center gap-2
                               text-[11px]
                               font-bold
                               text-slate-600
                               transition
                               hover:text-orange-600"
                    >
                        {{ $collectionButtonText }}
                        <span>→</span>
                    </a>

                </div>



                {{-- MOBILE / TABLET CAROUSEL --}}
                <div
                    class="product-scroll
                           mt-5 flex
                           snap-x snap-mandatory
                           gap-4
                           overflow-x-auto
                           pb-3
                           lg:hidden"
                >

                    @foreach($relatedProducts as $related)

                        <a
                            href="{{ route('product.detail', ['slug' => $related['slug']]) }}"
                            class="group
                                   w-[72vw]
                                   max-w-[250px]
                                   shrink-0
                                   snap-start
                                   overflow-hidden
                                   rounded-[18px]
                                   border border-slate-200
                                   bg-white"
                        >

                            <div
                                class="relative
                                       h-[250px]
                                       overflow-hidden
                                       bg-slate-100"
                            >

                                <img
                                    src="{{ asset($related['image']) }}"
                                    alt="{{ $related['name'] }}"
                                    loading="lazy"
                                    class="absolute inset-0
                                           h-full w-full
                                           object-cover object-center
                                           transition duration-500
                                           group-hover:scale-[1.04]"
                                >

                            </div>


                            <div class="p-4">

                                <p
                                    class="text-[8px]
                                           font-bold uppercase
                                           tracking-[0.14em]
                                           text-orange-600"
                                >
                                    {{ $currentCategory['title'] }}
                                </p>


                                <h3
                                    class="mt-1.5
                                           line-clamp-2
                                           text-[13px]
                                           font-bold
                                           leading-5
                                           text-slate-950"
                                >
                                    {{ $related['name'] }}
                                </h3>


                                <div
                                    class="mt-3
                                           flex items-center
                                           justify-between
                                           border-t
                                           border-slate-100
                                           pt-3"
                                >
                                    <span
                                        class="text-[10px]
                                               font-semibold
                                               text-slate-500"
                                    >
                                        {{ $relatedProductButtonText }}
                                    </span>

                                    <span>
                                        →
                                    </span>
                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>



                {{-- DESKTOP CARDS --}}
                <div
                    class="mt-6 hidden
                           lg:grid
                           lg:grid-cols-4
                           lg:gap-5"
                >

                    @foreach($relatedProducts->take(4) as $related)

                        <a
                            href="{{ route('product.detail', ['slug' => $related['slug']]) }}"
                            class="group
                                   min-w-0
                                   overflow-hidden
                                   rounded-[20px]
                                   border border-slate-200
                                   bg-white
                                   transition-all
                                   duration-300
                                   hover:-translate-y-1
                                   hover:border-slate-300
                                   hover:shadow-[0_16px_36px_rgba(15,23,42,0.08)]"
                        >

                            <div
                                class="relative
                                       h-[250px]
                                       xl:h-[270px]
                                       overflow-hidden
                                       bg-[#efefeb]"
                            >

                                <img
                                    src="{{ asset($related['image']) }}"
                                    alt="{{ $related['name'] }}"
                                    loading="lazy"
                                    class="absolute inset-0
                                           h-full w-full
                                           object-cover object-center
                                           transition-transform
                                           duration-500
                                           group-hover:scale-[1.04]"
                                >


                                <div
                                    class="pointer-events-none
                                           absolute inset-x-0 bottom-0
                                           h-16
                                           bg-gradient-to-t
                                           from-black/15
                                           to-transparent"
                                ></div>

                            </div>


                            <div class="p-4">

                                <p
                                    class="text-[8px]
                                           font-bold uppercase
                                           tracking-[0.14em]
                                           text-orange-600"
                                >
                                    {{ $currentCategory['title'] }}
                                </p>


                                <h3
                                    class="mt-1.5
                                           min-h-[40px]
                                           line-clamp-2
                                           text-[13px]
                                           font-bold
                                           leading-5
                                           text-slate-950"
                                >
                                    {{ $related['name'] }}
                                </h3>


                                <div
                                    class="mt-3
                                           flex items-center
                                           justify-between
                                           border-t
                                           border-slate-100
                                           pt-3"
                                >

                                    <span
                                        class="text-[10px]
                                               font-semibold
                                               text-slate-500"
                                    >
                                        {{ $relatedProductButtonText }}
                                    </span>


                                    <span
                                        class="text-[13px]
                                               text-slate-900
                                               transition-transform
                                               group-hover:translate-x-1"
                                    >
                                        →
                                    </span>

                                </div>

                            </div>

                        </a>

                    @endforeach

                </div>

            </div>
        </section>

    @endif



    {{-- =========================================================
         FINAL CTA
    ========================================================== --}}
    <section class="bg-slate-950">

        <div
            class="mx-auto max-w-[820px]
                   px-4 py-8
                   sm:px-6"
        >

            <p
                class="text-[9px]
                       font-bold uppercase
                       tracking-[0.18em]
                       text-orange-400"
            >
                {{ $ctaBadge }}
            </p>


            <h2
                class="mt-2
                       text-[20px]
                       font-bold
                       leading-7
                       text-white"
            >
                {{ $ctaTitle }}
            </h2>


            <p
                class="mt-1.5
                       text-[12px]
                       leading-6
                       text-slate-400"
            >
                {{ $ctaDescription }}
            </p>


            <a
                href="{{ route('contact', ['product' => $product['name']]) }}"
                class="mt-5 inline-flex
                       min-h-[44px]
                       items-center
                       justify-center
                       rounded-xl
                       bg-orange-600
                       px-5
                       text-[12px]
                       font-bold
                       text-white"
            >
                {{ $ctaButtonText }}
            </a>

        </div>

    </section>


</main>

</body>
</html>