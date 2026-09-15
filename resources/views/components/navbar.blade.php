@php
    $currentCategory = request('category');

    $companyName =
        $siteSettings->company_name
        ?: 'M R Hardware';

    $logoPath =
        $siteSettings->logo
        ?: 'images/logo.png';

    $tagline =
        $siteSettings->tagline
        ?: 'Hardware Supplier';

    $navHomeText =
        $siteSettings->nav_home_text
        ?: 'Home';

    $navAboutText =
        $siteSettings->nav_about_text
        ?: 'About';

    $navProductsText =
        $siteSettings->nav_products_text
        ?: 'Products';

    $navContactText =
        $siteSettings->nav_contact_text
        ?: 'Contact';

    $navCallLabel =
        $siteSettings->nav_call_label
        ?: 'Call Us';

    $navCollectionBadge =
        $siteSettings->nav_collection_badge
        ?: 'Collection';

    $navCollectionTitle =
        $siteSettings->nav_collection_title
        ?: 'Hardware Products';

    $navMoreProductsBadge =
        $siteSettings->nav_more_products_badge
        ?: 'More Products';

    $navMoreProductsTitle =
        $siteSettings->nav_more_products_title
        ?: 'More Categories';

    $navFeaturedTitle =
        $siteSettings->nav_featured_title
        ?: 'Hardware Product Collection';

    $navFeaturedDescription =
        $siteSettings->nav_featured_description
        ?: 'Explore our available hardware categories and contact us for model-wise product details.';

    $navExploreProductsText =
        $siteSettings->nav_explore_products_text
        ?: 'Explore Products';

    $navEnquiryPrompt =
        $siteSettings->nav_enquiry_prompt
        ?: 'Looking for a specific hardware product?';

    $navContactCtaText =
        $siteSettings->nav_contact_cta_text
        ?: 'Contact Us';

    $phoneDigits =
        preg_replace(
            '/\D+/',
            '',
            $siteSettings->phone ?? ''
        );

    if (strlen($phoneDigits) === 10) {
        $phoneDigits = '91' . $phoneDigits;
    }

    $navCategories =
        $navCategories ?? collect();

    $categoryColumns =
        $navCategories->chunk(
            (int) ceil(
                max(
                    $navCategories->count(),
                    1
                ) / 2
            )
        );
@endphp


<header
    x-data="{ mobileOpen: false }"
    class="sticky top-0 z-50
           border-b border-slate-200/80
           bg-white/95
           shadow-[0_4px_20px_rgba(15,23,42,0.04)]
           backdrop-blur-xl"
>

    <div class="mx-auto max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div class="flex h-16 items-center justify-between lg:h-[72px]">


            {{-- =====================================================
                LOGO / BRAND
            ====================================================== --}}
            <a
                href="{{ route('home') }}"
                class="flex shrink-0 items-center gap-2.5 lg:gap-3"
            >

                <img
                    src="{{ asset($logoPath) }}"
                    alt="{{ $companyName }}"
                    class="h-9 w-auto sm:h-10 lg:h-11"
                >

                <div>

                    <h2
                        class="text-[17px]
                               font-black
                               leading-none
                               tracking-[-0.02em]
                               text-orange-600
                               sm:text-[18px]
                               lg:text-[19px]"
                    >
                        {{ $companyName }}
                    </h2>

                    <p
                        class="mt-1
                               hidden
                               text-[8px]
                               font-semibold
                               uppercase
                               tracking-[2px]
                               text-slate-400
                               sm:block
                               lg:text-[9px]"
                    >
                        {{ $tagline }}
                    </p>

                </div>

            </a>



            {{-- =====================================================
                DESKTOP NAVIGATION
            ====================================================== --}}
            <nav class="hidden items-center gap-6 lg:flex xl:gap-7">


                {{-- HOME --}}
                <a
                    href="{{ route('home') }}"
                    class="text-[13px]
                           font-semibold
                           transition
                           {{ request()->routeIs('home')
                                ? 'text-orange-600'
                                : 'text-slate-600 hover:text-orange-600'
                           }}"
                >
                    {{ $navHomeText }}
                </a>


                {{-- ABOUT --}}
                <a
                    href="{{ route('about') }}"
                    class="text-[13px]
                           font-semibold
                           transition
                           {{ request()->routeIs('about')
                                ? 'text-orange-600'
                                : 'text-slate-600 hover:text-orange-600'
                           }}"
                >
                    {{ $navAboutText }}
                </a>



                {{-- =================================================
                    PRODUCTS MEGA MENU
                ================================================== --}}
                <div class="relative group">

                    <a
                        href="{{ route('products') }}"
                        class="flex items-center
                               gap-1.5
                               text-[13px]
                               font-semibold
                               transition
                               {{ request()->routeIs('products', 'product.detail')
                                    ? 'text-orange-600'
                                    : 'text-slate-600 hover:text-orange-600'
                               }}"
                    >

                        {{ $navProductsText }}

                        <svg
                            class="h-3.5 w-3.5
                                   transition-transform
                                   duration-300
                                   group-hover:rotate-180"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"
                            />
                        </svg>

                    </a>


                    {{-- DROPDOWN --}}
                    <div
                        class="invisible
                               absolute
                               left-1/2
                               top-full
                               z-50
                               -translate-x-1/2
                               translate-y-2
                               pt-3
                               opacity-0
                               transition-all
                               duration-200
                               group-hover:visible
                               group-hover:translate-y-0
                               group-hover:opacity-100"
                    >

                        <div
                            class="w-[860px]
                                   overflow-hidden
                                   rounded-[20px]
                                   border
                                   border-slate-200
                                   bg-white
                                   shadow-[0_24px_60px_rgba(15,23,42,0.14)]
                                   xl:w-[940px]"
                        >

                            <div class="grid grid-cols-[1fr_1fr_1.15fr]">


                                {{-- =====================================
                                    CATEGORY COLUMNS
                                ====================================== --}}
                                @for($column = 0; $column < 2; $column++)

                                    <div
                                        class="border-r
                                               border-slate-100
                                               p-5
                                               xl:p-6"
                                    >

                                        <div class="mb-4">

                                            <span
                                                class="text-[9px]
                                                       font-bold
                                                       uppercase
                                                       tracking-[0.16em]
                                                       text-orange-500"
                                            >
                                                {{ $column === 0
                                                    ? $navCollectionBadge
                                                    : $navMoreProductsBadge
                                                }}
                                            </span>

                                            <h3
                                                class="mt-1.5
                                                       text-[16px]
                                                       font-black
                                                       text-slate-900"
                                            >
                                                {{ $column === 0
                                                    ? $navCollectionTitle
                                                    : $navMoreProductsTitle
                                                }}
                                            </h3>

                                        </div>


                                        <div class="space-y-1">

                                            @foreach(
                                                $categoryColumns->get(
                                                    $column,
                                                    collect()
                                                ) as $category
                                            )

                                                <a
                                                    href="{{ route(
                                                        'products',
                                                        [
                                                            'category' =>
                                                                $category->slug
                                                        ]
                                                    ) }}"
                                                    class="
                                                        flex
                                                        items-center
                                                        gap-2.5
                                                        rounded-xl
                                                        px-3
                                                        py-2
                                                        text-[12px]
                                                        font-semibold
                                                        transition

                                                        {{ $currentCategory === $category->slug
                                                            ? 'bg-orange-50 text-orange-600'
                                                            : 'text-slate-600 hover:bg-orange-50 hover:text-orange-600'
                                                        }}
                                                    "
                                                >
                                                    <span>
                                                        ◈
                                                    </span>

                                                    <span>
                                                        {{ $category->name }}
                                                    </span>
                                                </a>

                                            @endforeach

                                        </div>

                                    </div>

                                @endfor



                                {{-- =====================================
                                    FEATURED PANEL
                                ====================================== --}}
                                <div
                                    class="relative
                                           min-h-[410px]
                                           overflow-hidden
                                           bg-gradient-to-br
                                           from-slate-950
                                           via-slate-900
                                           to-orange-950"
                                >

                                    <div
                                        class="absolute
                                               -right-24
                                               -top-24
                                               h-72
                                               w-72
                                               rounded-full
                                               bg-orange-500/20
                                               blur-3xl"
                                    ></div>

                                    <div
                                        class="absolute
                                               -bottom-20
                                               -left-20
                                               h-64
                                               w-64
                                               rounded-full
                                               bg-orange-600/10
                                               blur-3xl"
                                    ></div>


                                    <div
                                        class="relative
                                               z-10
                                               flex
                                               h-full
                                               flex-col
                                               justify-between
                                               p-6"
                                    >

                                        <div>

                                            <div
                                                class="inline-flex
                                                       h-11
                                                       w-11
                                                       items-center
                                                       justify-center
                                                       rounded-xl
                                                       border
                                                       border-orange-400/20
                                                       bg-orange-500/15
                                                       text-lg
                                                       text-orange-400"
                                            >
                                                ◈
                                            </div>


                                            <span
                                                class="mt-5
                                                       block
                                                       text-[9px]
                                                       font-bold
                                                       uppercase
                                                       tracking-[0.18em]
                                                       text-orange-300"
                                            >
                                                {{ $companyName }}
                                            </span>


                                            <h3
                                                class="mt-2.5
                                                       text-[22px]
                                                       font-black
                                                       leading-tight
                                                       text-white"
                                            >
                                                {{ $navFeaturedTitle }}
                                            </h3>


                                            <p
                                                class="mt-3
                                                       text-[12px]
                                                       leading-5
                                                       text-slate-300"
                                            >
                                                {{ $navFeaturedDescription }}
                                            </p>

                                        </div>


                                        <div>

                                            <a
                                                href="{{ route('products') }}"
                                                class="inline-flex
                                                       min-h-[40px]
                                                       items-center
                                                       gap-2
                                                       rounded-xl
                                                       bg-orange-600
                                                       px-4
                                                       text-[11px]
                                                       font-bold
                                                       text-white
                                                       transition
                                                       hover:bg-orange-500"
                                            >
                                                {{ $navExploreProductsText }}
                                                <span>→</span>
                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>



                            {{-- =====================================
                                MEGA MENU BOTTOM
                            ====================================== --}}
                            <div
                                class="flex
                                       items-center
                                       justify-between
                                       gap-5
                                       border-t
                                       border-slate-100
                                       bg-slate-50
                                       px-6
                                       py-3"
                            >

                                <p
                                    class="text-[11px]
                                           text-slate-500"
                                >
                                    {{ $navEnquiryPrompt }}
                                </p>


                                <a
                                    href="{{ route('contact') }}"
                                    class="shrink-0
                                           text-[11px]
                                           font-bold
                                           text-orange-600
                                           transition
                                           hover:text-orange-700"
                                >
                                    {{ $navContactCtaText }} →
                                </a>

                            </div>

                        </div>

                    </div>

                </div>



                {{-- CONTACT --}}
                <a
                    href="{{ route('contact') }}"
                    class="text-[13px]
                           font-semibold
                           transition
                           {{ request()->routeIs('contact')
                                ? 'text-orange-600'
                                : 'text-slate-600 hover:text-orange-600'
                           }}"
                >
                    {{ $navContactText }}
                </a>

            </nav>



            {{-- =====================================================
                DESKTOP RIGHT SIDE
            ====================================================== --}}
            <div class="hidden items-center gap-3 lg:flex xl:gap-4">

                @if($siteSettings->phone)

                    <div class="hidden text-right xl:block">

                        <p
                            class="text-[8px]
                                   font-semibold
                                   uppercase
                                   tracking-[0.14em]
                                   text-slate-400"
                        >
                            {{ $navCallLabel }}
                        </p>

                        <a
                            href="tel:+{{ $phoneDigits }}"
                            class="text-[12px]
                                   font-bold
                                   text-slate-700
                                   transition
                                   hover:text-orange-600"
                        >
                            {{ $siteSettings->phone }}
                        </a>

                    </div>

                @endif


                <a
                    href="{{ $siteSettings->navbar_button_link ?: route('contact') }}"
                    class="inline-flex
                           min-h-[40px]
                           items-center
                           justify-center
                           rounded-xl
                           bg-orange-600
                           px-4
                           text-[11px]
                           font-bold
                           text-white
                           shadow-sm
                           transition
                           hover:bg-orange-500
                           xl:px-5"
                >
                    {{ $siteSettings->navbar_button_text ?: 'Request Quote' }}
                </a>

            </div>



            {{-- =====================================================
                MOBILE BUTTON
            ====================================================== --}}
            <button
                type="button"
                @click="mobileOpen = !mobileOpen"
                class="flex
                       h-9
                       w-9
                       items-center
                       justify-center
                       rounded-lg
                       border
                       border-slate-200
                       text-slate-700
                       transition
                       hover:border-orange-200
                       hover:text-orange-600
                       lg:hidden"
                aria-label="Open navigation"
                :aria-expanded="mobileOpen ? 'true' : 'false'"
            >

                <svg
                    x-show="!mobileOpen"
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M4 6h16M4 12h16M4 18h16"
                    />
                </svg>


                <svg
                    x-show="mobileOpen"
                    x-cloak
                    class="h-5 w-5"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>

            </button>

        </div>

    </div>



    {{-- =========================================================
        MOBILE MENU
    ========================================================== --}}
    <div
        x-show="mobileOpen"
        x-transition
        x-cloak
        @click.outside="mobileOpen = false"
        class="max-h-[calc(100vh-64px)]
               overflow-y-auto
               border-t
               border-slate-200
               bg-white
               shadow-xl
               lg:hidden"
    >

        <div class="px-4 py-3 sm:px-6">


            {{-- HOME --}}
            <a
                href="{{ route('home') }}"
                @click="mobileOpen = false"
                class="block
                       border-b
                       border-slate-100
                       py-3
                       text-[13px]
                       font-semibold
                       {{ request()->routeIs('home')
                            ? 'text-orange-600'
                            : 'text-slate-700'
                       }}"
            >
                {{ $navHomeText }}
            </a>



            {{-- ABOUT --}}
            <a
                href="{{ route('about') }}"
                @click="mobileOpen = false"
                class="block
                       border-b
                       border-slate-100
                       py-3
                       text-[13px]
                       font-semibold
                       {{ request()->routeIs('about')
                            ? 'text-orange-600'
                            : 'text-slate-700'
                       }}"
            >
                {{ $navAboutText }}
            </a>



            {{-- =====================================================
                MOBILE PRODUCTS
            ====================================================== --}}
            <div
                x-data="{
                    productMenu:
                        {{ request()->routeIs(
                            'products',
                            'product.detail'
                        ) ? 'true' : 'false' }}
                }"
            >

                <button
                    type="button"
                    @click="productMenu = !productMenu"
                    class="flex
                           w-full
                           items-center
                           justify-between
                           border-b
                           border-slate-100
                           py-3
                           text-[13px]
                           font-semibold
                           {{ request()->routeIs('products', 'product.detail')
                                ? 'text-orange-600'
                                : 'text-slate-700'
                           }}"
                >

                    <span>
                        {{ $navProductsText }}
                    </span>


                    <svg
                        class="h-5 w-5
                               transition
                               duration-300"
                        :class="{ 'rotate-180': productMenu }"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>

                </button>


                <div
                    x-show="productMenu"
                    x-transition
                    x-cloak
                    class="mb-3
                           mt-2
                           rounded-xl
                           bg-slate-50
                           p-2.5"
                >

                    @forelse($navCategories as $category)

                        <a
                            href="{{ route(
                                'products',
                                [
                                    'category' =>
                                        $category->slug
                                ]
                            ) }}"
                            @click="mobileOpen = false"
                            class="
                                mobile-product-link

                                {{ $currentCategory === $category->slug
                                    ? 'bg-orange-50 text-orange-600'
                                    : ''
                                }}
                            "
                        >
                            {{ $category->name }}
                        </a>

                    @empty

                        <p
                            class="px-3
                                   py-2
                                   text-[11px]
                                   text-slate-400"
                        >
                            No categories available.
                        </p>

                    @endforelse


                    <a
                        href="{{ route('products') }}"
                        @click="mobileOpen = false"
                        class="mt-2
                               block
                               rounded-xl
                               bg-orange-600
                               px-4
                               py-2.5
                               text-center
                               text-[12px]
                               font-bold
                               text-white
                               transition
                               hover:bg-orange-500"
                    >
                        {{ $navExploreProductsText }} →
                    </a>

                </div>

            </div>



            {{-- CONTACT --}}
            <a
                href="{{ route('contact') }}"
                @click="mobileOpen = false"
                class="block
                       border-b
                       border-slate-100
                       py-3
                       text-[13px]
                       font-semibold
                       {{ request()->routeIs('contact')
                            ? 'text-orange-600'
                            : 'text-slate-700'
                       }}"
            >
                {{ $navContactText }}
            </a>



            {{-- =====================================================
                MOBILE ACTIONS
            ====================================================== --}}
            <div class="mt-4 pb-3">

                @if($siteSettings->phone && $phoneDigits)

                    <a
                        href="tel:+{{ $phoneDigits }}"
                        class="flex
                               min-h-[40px]
                               w-full
                               items-center
                               justify-center
                               gap-2
                               rounded-xl
                               border
                               border-orange-600
                               text-[12px]
                               font-bold
                               text-orange-600
                               transition
                               hover:bg-orange-50"
                    >
                        ☎ {{ $navCallLabel }}
                        {{ $siteSettings->phone }}
                    </a>

                @endif


                <a
                    href="{{ $siteSettings->navbar_button_link ?: route('contact') }}"
                    @click="mobileOpen = false"
                    class="mt-2.5
                           block
                           w-full
                           rounded-xl
                           bg-orange-600
                           py-2.5
                           text-center
                           text-[12px]
                           font-bold
                           text-white
                           transition
                           hover:bg-orange-500"
                >
                    {{ $siteSettings->navbar_button_text ?: 'Request Quote' }}
                </a>

            </div>

        </div>

    </div>

</header>



<style>

    [x-cloak] {
        display: none !important;
    }


    .mobile-product-link {
        display: block;
        padding: 9px 12px;
        border-radius: 9px;
        color: #475569;
        font-size: 12px;
        font-weight: 650;

        transition:
            background-color 0.2s ease,
            color 0.2s ease,
            transform 0.2s ease;
    }


    .mobile-product-link:hover {
        background: #fff7ed;
        color: #ea580c;
        transform: translateX(3px);
    }

</style>