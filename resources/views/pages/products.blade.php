@extends('layouts.app')

@section('title', $currentCategory['title'] . ' | ' . (data_get($siteSettings ?? null, 'company_name') ?: 'M R Hardware'))

@section('content')

@php
    $desktopPages = $currentCategory['products']->chunk(4);

    /*
    |--------------------------------------------------------------------------
    | Products Page CMS
    |--------------------------------------------------------------------------
    | The page continues to work even before ProductsPageSetting is wired
    | into the controller. Once available, pass it as $productsPage.
    */
    $productsPage = $productsPage ?? null;
    $site = $siteSettings ?? null;

    $companyName = data_get($site, 'company_name') ?: 'M R Hardware';

    $heroBadge = data_get($productsPage, 'hero_badge') ?: 'Product Catalogue';
    $heroProductsText = data_get($productsPage, 'hero_products_text') ?: 'Products Available';
    $heroButtonText = data_get($productsPage, 'hero_button_text') ?: 'Explore Products';

    $collectionLabel = data_get($productsPage, 'collection_label') ?: 'Collection';
    $collectionText = data_get($productsPage, 'collection_text') ?: 'Products in this category';

    $businessLabel = data_get($productsPage, 'business_label') ?: 'Business';
    $businessText = data_get($productsPage, 'business_text') ?: 'Manufacturing & Trading';

    $enquiryBadge = data_get($productsPage, 'enquiry_badge') ?: 'Need a specific model?';
    $enquiryText = data_get($productsPage, 'enquiry_text')
        ?: 'Open any product for a closer view or send an enquiry for model-wise specifications and availability.';
    $enquiryButtonText = data_get($productsPage, 'enquiry_button_text') ?: 'Send Enquiry';

    $productsSectionBadge = data_get($productsPage, 'products_section_badge') ?: 'Our Collection';
    $viewProductText = data_get($productsPage, 'view_product_text') ?: 'View Product';

    $emptyTitle = data_get($productsPage, 'empty_title') ?: 'No products found';
    $emptyText = data_get($productsPage, 'empty_text')
        ?: 'No active products are currently available in this category.';

    $ctaBadge = data_get($productsPage, 'cta_badge') ?: 'Product Enquiry';
    $ctaTitle = data_get($productsPage, 'cta_title') ?: 'Looking for a particular model?';
    $ctaDescription = data_get($productsPage, 'cta_description')
        ?: 'Contact us for model-wise specifications, availability and business enquiries.';
    $ctaButtonText = data_get($productsPage, 'cta_button_text') ?: 'Send Enquiry';
@endphp


{{-- =========================================================
     HERO — ONE COMPLETE DESKTOP SCREEN
========================================================= --}}
<section
    class="relative overflow-hidden bg-[#071a2d] text-white
           lg:min-h-[calc(100svh-72px)]
           lg:flex lg:items-center"
>

    <div
        class="absolute inset-0 opacity-25"
        style="
            background-image:
            radial-gradient(circle at 18% 28%, rgba(249,115,22,.85) 0, transparent 26%),
            radial-gradient(circle at 82% 72%, rgba(14,165,233,.55) 0, transparent 28%);
        "
    ></div>

    <div
        class="absolute inset-0
               bg-[linear-gradient(to_bottom_right,rgba(7,26,45,.2),rgba(7,26,45,.75))]"
    ></div>

    <div
        class="relative mx-auto w-full max-w-[1180px]
               px-4 py-14
               sm:px-6 sm:py-16
               lg:px-8 lg:py-12"
    >

        <div class="grid items-center gap-10 lg:grid-cols-[1.05fr_.95fr]">

            {{-- LEFT --}}
            <div class="max-w-3xl">

                <p
                    class="text-[10px] sm:text-[11px]
                           font-bold uppercase
                           tracking-[0.22em]
                           text-orange-400"
                >
                    {{ $heroBadge }}
                </p>


                <h1
                    class="mt-4
                           text-[36px]
                           sm:text-[46px]
                           lg:text-[54px]
                           font-black
                           leading-[1.02]
                           tracking-[-0.045em]"
                >
                    {{ $currentCategory['title'] }}
                </h1>


                <p
                    class="mt-5
                           max-w-2xl
                           text-[14px] sm:text-[15px]
                           leading-7
                           text-slate-300"
                >
                    {{ $currentCategory['description'] }}
                </p>


                <div class="mt-7 flex flex-wrap items-center gap-3">

                    <div
                        class="inline-flex items-center gap-2
                               rounded-full
                               border border-white/10
                               bg-white/5
                               px-4 py-2.5
                               text-[12px]
                               font-semibold
                               text-slate-200
                               backdrop-blur"
                    >
                        <span class="h-2 w-2 rounded-full bg-orange-500"></span>

                        {{ $currentCategory['count'] }} {{ $heroProductsText }}
                    </div>


                    <a
                        href="#products-collection"
                        class="inline-flex items-center gap-2
                               rounded-full
                               bg-orange-600
                               px-5 py-2.5
                               text-[12px]
                               font-bold text-white
                               transition
                               hover:bg-orange-500"
                    >
                        {{ $heroButtonText }}
                        <span>↓</span>
                    </a>

                </div>

            </div>


            {{-- RIGHT VISUAL PANEL --}}
            <div
                class="hidden lg:block
                       rounded-[28px]
                       border border-white/10
                       bg-white/[0.06]
                       p-6
                       backdrop-blur-sm"
            >

                <div class="grid grid-cols-2 gap-4">

                    <div
                        class="rounded-[20px]
                               border border-white/10
                               bg-white/[0.06]
                               p-5"
                    >
                        <p
                            class="text-[9px]
                                   font-bold uppercase
                                   tracking-[0.18em]
                                   text-orange-400"
                        >
                            {{ $collectionLabel }}
                        </p>

                        <p
                            class="mt-2
                                   text-[22px]
                                   font-black
                                   tracking-[-0.03em]"
                        >
                            {{ $currentCategory['count'] }}
                        </p>

                        <p
                            class="mt-1 text-[12px] text-slate-400"
                        >
                            {{ $collectionText }}
                        </p>
                    </div>


                    <div
                        class="rounded-[20px]
                               border border-white/10
                               bg-white/[0.06]
                               p-5"
                    >
                        <p
                            class="text-[9px]
                                   font-bold uppercase
                                   tracking-[0.18em]
                                   text-orange-400"
                        >
                            {{ $businessLabel }}
                        </p>

                        <p
                            class="mt-2
                                   text-[18px]
                                   font-black
                                   tracking-[-0.02em]"
                        >
                            {{ $companyName }}
                        </p>

                        <p
                            class="mt-1 text-[12px] text-slate-400"
                        >
                            {{ $businessText }}
                        </p>
                    </div>

                </div>


                <div
                    class="mt-4
                           rounded-[20px]
                           border border-white/10
                           bg-[#0b2239]
                           p-5"
                >
                    <p
                        class="text-[9px]
                               font-bold uppercase
                               tracking-[0.18em]
                               text-orange-400"
                    >
                        {{ $enquiryBadge }}
                    </p>

                    <p
                        class="mt-2
                               text-[14px]
                               leading-6
                               text-slate-300"
                    >
                        {{ $enquiryText }}
                    </p>

                    <a
                        href="{{ route('contact') }}"
                        class="mt-4 inline-flex
                               items-center gap-2
                               text-[12px]
                               font-bold
                               text-white"
                    >
                        {{ $enquiryButtonText }}
                        <span>→</span>
                    </a>
                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     CATEGORY NAVIGATION
========================================================= --}}
<section
    class="sticky top-[64px] lg:top-[72px] z-30
           border-b border-slate-200
           bg-white/95
           backdrop-blur"
>

    <div class="mx-auto max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div
            class="products-category-scroll
                   flex gap-2.5
                   overflow-x-auto
                   py-3"
        >

            @foreach($categories as $slug => $category)

                <a
                    href="{{ route('products', ['category' => $slug]) }}"
                    class="flex-none
                           rounded-full
                           px-4 py-2
                           text-[11px] sm:text-[12px]
                           font-bold
                           transition
                           {{ $categorySlug === $slug
                               ? 'bg-slate-950 text-white shadow-sm'
                               : 'bg-slate-100 text-slate-600 hover:bg-slate-200 hover:text-slate-950'
                           }}"
                >
                    {{ $category['title'] }}
                </a>

            @endforeach

        </div>

    </div>

</section>



{{-- =========================================================
     PRODUCTS COLLECTION
     DESKTOP: ONE SCREEN / 4 CARDS PER PAGE
     MOBILE + TABLET: NORMAL RESPONSIVE GRID
========================================================= --}}
<section
    id="products-collection"
    class="bg-[#f6f6f3]
           py-10 sm:py-12
           lg:min-h-[calc(100svh-52px)]
           lg:flex lg:items-center
           lg:py-8"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">


        {{-- SECTION HEADER --}}
        <div
            class="mb-7 flex
                   flex-col gap-4
                   sm:flex-row
                   sm:items-end
                   sm:justify-between
                   lg:mb-5"
        >

            <div>

                <p
                    class="text-[9px]
                           font-bold uppercase
                           tracking-[0.18em]
                           text-orange-600"
                >
                    {{ $productsSectionBadge }}
                </p>


                <h2
                    class="mt-1.5
                           text-[26px]
                           sm:text-[30px]
                           lg:text-[32px]
                           font-black
                           tracking-[-0.035em]
                           text-slate-950"
                >
                    {{ $currentCategory['title'] }}
                </h2>

            </div>


            <div
                class="flex items-center gap-3
                       text-[12px]
                       text-slate-500"
            >
                <span>
                    <strong class="text-slate-900">
                        {{ $currentCategory['count'] }}
                    </strong>
                    products
                </span>

                @if($desktopPages->count() > 1)
                    <span class="hidden lg:inline text-slate-300">•</span>

                    <span
                        id="product-page-status"
                        class="hidden lg:inline
                               font-semibold
                               text-slate-700"
                    >
                        Page 1 of {{ $desktopPages->count() }}
                    </span>
                @endif
            </div>

        </div>



        @if($currentCategory['products']->count())


            {{-- =====================================================
                 DESKTOP PRODUCT PAGES
            ====================================================== --}}
            <div class="hidden lg:block">

                @foreach($desktopPages as $pageIndex => $productPage)

                    <div
                        class="desktop-product-page
                               {{ $pageIndex === 0 ? '' : 'hidden' }}"
                        data-page="{{ $pageIndex }}"
                    >

                        <div class="grid grid-cols-4 gap-5">

                            @foreach($productPage as $product)

                                <a
                                    href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                                    class="group
                                           min-w-0
                                           overflow-hidden
                                           rounded-[20px]
                                           border border-slate-200
                                           bg-white
                                           transition-all duration-300
                                           hover:-translate-y-1
                                           hover:border-slate-300
                                           hover:shadow-[0_16px_38px_rgba(15,23,42,0.08)]"
                                >

                                    {{-- IMAGE --}}
                                    <div
                                        class="relative
                                               h-[300px]
                                               overflow-hidden
                                               bg-[#ecece8]"
                                    >

                                        <img
                                            src="{{ asset($product['image']) }}"
                                            alt="{{ $product['name'] }}"
                                            loading="lazy"
                                            class="absolute inset-0
                                                   h-full w-full
                                                   object-cover object-center
                                                   transition-transform duration-500
                                                   group-hover:scale-[1.04]"
                                        >


                                        <div
                                            class="absolute left-3 top-3
                                                   rounded-full
                                                   border border-white/70
                                                   bg-white/90
                                                   px-3 py-1.5
                                                   text-[8px]
                                                   font-bold uppercase
                                                   tracking-[0.12em]
                                                   text-slate-700
                                                   shadow-sm
                                                   backdrop-blur"
                                        >
                                            {{ $companyName }}
                                        </div>


                                        @if(!empty($product['video']))

                                            <div
                                                class="absolute right-3 top-3
                                                       inline-flex items-center gap-1.5
                                                       rounded-full
                                                       bg-slate-950/85
                                                       px-3 py-1.5
                                                       text-[9px]
                                                       font-bold text-white
                                                       backdrop-blur"
                                            >
                                                ▶ Video
                                            </div>

                                        @endif


                                        <div
                                            class="pointer-events-none
                                                   absolute inset-x-0 bottom-0
                                                   h-16
                                                   bg-gradient-to-t
                                                   from-black/15
                                                   to-transparent"
                                        ></div>

                                    </div>


                                    {{-- DETAILS --}}
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
                                            {{ $product['name'] }}
                                        </h3>


                                        <div
                                            class="mt-3
                                                   flex items-center
                                                   justify-between
                                                   border-t border-slate-100
                                                   pt-3"
                                        >

                                            <span
                                                class="text-[10px]
                                                       font-semibold
                                                       text-slate-500"
                                            >
                                                {{ $viewProductText }}
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

                @endforeach


                {{-- DESKTOP PAGINATION --}}
                @if($desktopPages->count() > 1)

                    <div
                        class="mt-5
                               flex items-center
                               justify-between"
                    >

                        <button
                            type="button"
                            id="product-prev"
                            class="inline-flex h-10
                                   items-center gap-2
                                   rounded-full
                                   border border-slate-200
                                   bg-white
                                   px-4
                                   text-[11px]
                                   font-bold
                                   text-slate-700
                                   transition
                                   hover:border-slate-300
                                   hover:text-slate-950
                                   disabled:cursor-not-allowed
                                   disabled:opacity-40"
                        >
                            ← Previous
                        </button>


                        <div
                            id="product-page-dots"
                            class="flex items-center gap-2"
                        >
                            @foreach($desktopPages as $pageIndex => $page)
                                <button
                                    type="button"
                                    data-page-dot="{{ $pageIndex }}"
                                    aria-label="Go to product page {{ $pageIndex + 1 }}"
                                    class="product-page-dot
                                           h-2.5 w-2.5
                                           rounded-full
                                           transition-all
                                           {{ $pageIndex === 0
                                               ? 'w-7 bg-orange-600'
                                               : 'bg-slate-300'
                                           }}"
                                ></button>
                            @endforeach
                        </div>


                        <button
                            type="button"
                            id="product-next"
                            class="inline-flex h-10
                                   items-center gap-2
                                   rounded-full
                                   bg-slate-950
                                   px-4
                                   text-[11px]
                                   font-bold
                                   text-white
                                   transition
                                   hover:bg-orange-600
                                   disabled:cursor-not-allowed
                                   disabled:opacity-40"
                        >
                            Next →
                        </button>

                    </div>

                @endif

            </div>



            {{-- =====================================================
                 MOBILE + TABLET GRID
            ====================================================== --}}
            <div
                class="grid grid-cols-2
                       gap-3.5
                       sm:gap-5
                       md:grid-cols-3
                       lg:hidden"
            >

                @foreach($currentCategory['products'] as $product)

                    <a
                        href="{{ route('product.detail', ['slug' => $product['slug']]) }}"
                        class="group
                               min-w-0
                               overflow-hidden
                               rounded-[18px]
                               border border-slate-200
                               bg-white
                               transition duration-300
                               hover:shadow-lg"
                    >

                        <div
                            class="relative
                                   aspect-[4/5]
                                   overflow-hidden
                                   bg-slate-100"
                        >

                            <img
                                src="{{ asset($product['image']) }}"
                                alt="{{ $product['name'] }}"
                                loading="lazy"
                                class="absolute inset-0
                                       h-full w-full
                                       object-cover object-center
                                       transition duration-500
                                       group-hover:scale-[1.04]"
                            >


                            @if(!empty($product['video']))

                                <div
                                    class="absolute right-2 top-2
                                           rounded-full
                                           bg-black/80
                                           px-2 py-1
                                           text-[8px]
                                           font-bold
                                           text-white"
                                >
                                    ▶
                                </div>

                            @endif

                        </div>


                        <div class="p-3.5 sm:p-4">

                            <p
                                class="text-[8px]
                                       sm:text-[9px]
                                       font-bold uppercase
                                       tracking-[0.12em]
                                       text-orange-600"
                            >
                                {{ $currentCategory['title'] }}
                            </p>


                            <h3
                                class="mt-1.5
                                       line-clamp-2
                                       text-[12px]
                                       sm:text-[13px]
                                       font-bold
                                       leading-5
                                       text-slate-950"
                            >
                                {{ $product['name'] }}
                            </h3>


                            <div
                                class="mt-3 flex
                                       items-center
                                       justify-between
                                       border-t border-slate-100
                                       pt-2.5"
                            >

                                <span
                                    class="text-[9px]
                                           sm:text-[10px]
                                           font-semibold
                                           text-slate-500"
                                >
                                    View Product
                                </span>

                                <span class="text-[12px]">→</span>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>


        @else

            <div
                class="rounded-[24px]
                       border border-dashed
                       border-slate-300
                       bg-white
                       p-10
                       text-center"
            >

                <h3
                    class="text-[20px]
                           font-black
                           text-slate-900"
                >
                    {{ $emptyTitle }}
                </h3>


                <p class="mt-2 text-[13px] text-slate-500">
                    {{ $emptyText }}
                </p>

            </div>

        @endif

    </div>

</section>



{{-- =========================================================
     CTA — ONE COMPLETE DESKTOP SCREEN
========================================================= --}}
<section
    class="relative overflow-hidden
           bg-white
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div
            class="relative overflow-hidden
                   rounded-[28px]
                   bg-[#071a2d]
                   px-6 py-10
                   text-white
                   sm:px-10 sm:py-12
                   lg:px-14 lg:py-14"
        >

            <div
                class="absolute -right-24 -top-24
                       h-80 w-80
                       rounded-full
                       bg-orange-500/20
                       blur-3xl"
            ></div>

            <div
                class="absolute -bottom-28 -left-20
                       h-72 w-72
                       rounded-full
                       bg-sky-500/10
                       blur-3xl"
            ></div>


            <div
                class="relative
                       grid gap-8
                       lg:grid-cols-[1.2fr_.8fr]
                       lg:items-center"
            >

                <div class="max-w-2xl">

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
                               text-[28px]
                               sm:text-[34px]
                               font-black
                               leading-[1.1]
                               tracking-[-0.035em]"
                    >
                        {{ $ctaTitle }}
                    </h2>


                    <p
                        class="mt-4
                               max-w-xl
                               text-[13px]
                               sm:text-[14px]
                               leading-7
                               text-slate-300"
                    >
                        {{ $ctaDescription }}
                    </p>

                </div>


                <div class="lg:text-right">

                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex
                               min-h-[46px]
                               items-center
                               justify-center
                               rounded-xl
                               bg-orange-600
                               px-6
                               text-[12px]
                               font-bold
                               text-white
                               transition
                               hover:bg-orange-500"
                    >
                        {{ $ctaButtonText }}
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>



<style>
    html {
        scroll-behavior: smooth;
    }

    .products-category-scroll {
        scrollbar-width: none;
        -ms-overflow-style: none;
    }

    .products-category-scroll::-webkit-scrollbar {
        display: none;
    }
</style>



@if($desktopPages->count() > 1)

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const pages = Array.from(
            document.querySelectorAll('.desktop-product-page')
        );

        const dots = Array.from(
            document.querySelectorAll('.product-page-dot')
        );

        const prevButton = document.getElementById('product-prev');
        const nextButton = document.getElementById('product-next');
        const status = document.getElementById('product-page-status');

        if (!pages.length || !prevButton || !nextButton) {
            return;
        }

        let currentPage = 0;

        function showPage(index) {
            currentPage = Math.max(
                0,
                Math.min(index, pages.length - 1)
            );

            pages.forEach((page, pageIndex) => {
                page.classList.toggle(
                    'hidden',
                    pageIndex !== currentPage
                );
            });

            dots.forEach((dot, dotIndex) => {
                const active = dotIndex === currentPage;

                dot.classList.toggle('w-7', active);
                dot.classList.toggle('bg-orange-600', active);
                dot.classList.toggle('w-2.5', !active);
                dot.classList.toggle('bg-slate-300', !active);
            });

            prevButton.disabled = currentPage === 0;
            nextButton.disabled = currentPage === pages.length - 1;

            if (status) {
                status.textContent =
                    `Page ${currentPage + 1} of ${pages.length}`;
            }
        }

        prevButton.addEventListener('click', function () {
            showPage(currentPage - 1);
        });

        nextButton.addEventListener('click', function () {
            showPage(currentPage + 1);
        });

        dots.forEach((dot, index) => {
            dot.addEventListener('click', function () {
                showPage(index);
            });
        });

        showPage(0);
    });
</script>

@endif

@endsection
