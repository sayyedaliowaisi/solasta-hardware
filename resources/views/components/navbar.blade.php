@php
    $currentCategory = request('category');
@endphp

<header
    x-data="{ mobileOpen: false }"
    class="sticky top-0 z-50 bg-white/95 backdrop-blur-lg border-b border-gray-200 shadow-sm"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6">

        <div class="flex items-center justify-between h-20 lg:h-24">

            {{-- =========================================================
                 LOGO
            ========================================================== --}}

            <a
                href="{{ route('home') }}"
                class="flex items-center gap-3 lg:gap-4 shrink-0"
            >

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="M R Hardware"
                    class="h-12 sm:h-14 lg:h-16 w-auto"
                >

                <div>

                    <h2 class="text-xl sm:text-2xl font-black text-orange-600 leading-tight">
                        M R Hardware
                    </h2>

                    <p class="hidden sm:block text-[10px] lg:text-xs uppercase tracking-[3px] lg:tracking-[4px] text-gray-500 mt-1">
                        Industrial Hardware Supplier
                    </p>

                </div>

            </a>


            {{-- =========================================================
                 DESKTOP NAVIGATION
            ========================================================== --}}

            <nav class="hidden lg:flex items-center gap-8 xl:gap-10">

                {{-- HOME --}}

                <a
                    href="{{ route('home') }}"
                    class="
                        {{ request()->routeIs('home')
                            ? 'text-orange-600 font-semibold'
                            : 'text-gray-700'
                        }}
                        hover:text-orange-600
                        transition
                    "
                >
                    Home
                </a>


                {{-- ABOUT --}}

                <a
                    href="{{ route('about') }}"
                    class="
                        {{ request()->routeIs('about')
                            ? 'text-orange-600 font-semibold'
                            : 'text-gray-700'
                        }}
                        hover:text-orange-600
                        transition
                    "
                >
                    About
                </a>


                {{-- =====================================================
                     PRODUCTS MEGA MENU
                ====================================================== --}}

                <div class="relative group">

                    <a
                        href="{{ route('products') }}"
                        class="
                            flex items-center gap-2
                            font-medium
                            transition
                            {{ request()->routeIs('products')
                                ? 'text-orange-600'
                                : 'text-gray-700'
                            }}
                            hover:text-orange-600
                        "
                    >

                        Products

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
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


                    {{-- MEGA MENU WRAPPER --}}

                    <div
                        class="
                            absolute
                            left-1/2
                            -translate-x-1/2
                            top-full
                            pt-6

                            opacity-0
                            invisible
                            translate-y-2

                            group-hover:opacity-100
                            group-hover:visible
                            group-hover:translate-y-0

                            transition-all
                            duration-300
                            z-50
                        "
                    >

                        <div
                            class="
                                w-[980px]
                                xl:w-[1060px]
                                rounded-3xl
                                bg-white
                                shadow-2xl
                                border
                                border-gray-100
                                overflow-hidden
                            "
                        >

                            <div class="grid grid-cols-[1fr_1fr_1.15fr]">


                                {{-- =================================================
                                     COLUMN 1
                                ================================================== --}}

                                <div class="p-7 xl:p-8 border-r border-gray-100">

                                    <div class="mb-6">

                                        <span class="text-xs uppercase tracking-[3px] text-orange-500 font-bold">
                                            Collection
                                        </span>

                                        <h3 class="text-xl font-black text-gray-900 mt-2">
                                            Hardware Products
                                        </h3>

                                    </div>


                                    <div class="space-y-2">

                                        <a
                                            href="{{ route('products', ['category' => 'aldrops']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'aldrops'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Aldrops
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'cabinet-handles']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'cabinet-handles'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Cabinet Handles
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'cloth-hanging-khuti']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'cloth-hanging-khuti'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Cloth Hanging Khuti
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'sliding-handles']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'sliding-handles'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Sliding / Concealed Handles
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'cup-handles']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'cup-handles'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Cup Handles
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'door-handles']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'door-handles'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Door Handles
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'door-knockers']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'door-knockers'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Door Knockers
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'door-stoppers']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'door-stoppers'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Door Stoppers
                                        </a>

                                    </div>

                                </div>



                                {{-- =================================================
                                     COLUMN 2
                                ================================================== --}}

                                <div class="p-7 xl:p-8 border-r border-gray-100">

                                    <div class="mb-6">

                                        <span class="text-xs uppercase tracking-[3px] text-orange-500 font-bold">
                                            More Products
                                        </span>

                                        <h3 class="text-xl font-black text-gray-900 mt-2">
                                            More Categories
                                        </h3>

                                    </div>


                                    <div class="space-y-2">

                                        <a
                                            href="{{ route('products', ['category' => 'key-holders']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'key-holders'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Key Holders
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'knobs']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'knobs'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Knobs
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'latches']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'latches'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Latches
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'magnet-catchers']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'magnet-catchers'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Magnet Catchers
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'profile-handles']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'profile-handles'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Profile / Kitchen Handles
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'door-kadi']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'door-kadi'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Pullers / Door Kadi
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'sofa-legs']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'sofa-legs'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Sofa Legs
                                        </a>


                                        <a
                                            href="{{ route('products', ['category' => 'ventilation-jali']) }}"
                                            class="
                                                flex items-center gap-3
                                                px-4 py-3
                                                rounded-xl
                                                text-sm
                                                font-semibold
                                                transition

                                                {{ $currentCategory === 'ventilation-jali'
                                                    ? 'bg-orange-50 text-orange-600'
                                                    : 'text-gray-700 hover:bg-orange-50 hover:text-orange-600'
                                                }}
                                            "
                                        >
                                            <span>◈</span>
                                            Ventilation Jali
                                        </a>

                                    </div>

                                </div>



                                {{-- =================================================
                                     FEATURED PANEL
                                ================================================== --}}

                                <div
                                    class="
                                        relative
                                        overflow-hidden
                                        min-h-[550px]
                                        bg-gradient-to-br
                                        from-gray-950
                                        via-gray-900
                                        to-orange-950
                                    "
                                >

                                    <div
                                        class="
                                            absolute
                                            -right-24
                                            -top-24
                                            w-72
                                            h-72
                                            bg-orange-500/20
                                            rounded-full
                                            blur-3xl
                                        "
                                    ></div>

                                    <div
                                        class="
                                            absolute
                                            -left-20
                                            -bottom-20
                                            w-64
                                            h-64
                                            bg-orange-600/10
                                            rounded-full
                                            blur-3xl
                                        "
                                    ></div>


                                    <div
                                        class="
                                            relative
                                            z-10
                                            p-8
                                            h-full
                                            flex
                                            flex-col
                                            justify-between
                                        "
                                    >

                                        <div>

                                            <div
                                                class="
                                                    inline-flex
                                                    items-center
                                                    justify-center
                                                    w-14
                                                    h-14
                                                    rounded-2xl
                                                    bg-orange-500/15
                                                    border
                                                    border-orange-400/20
                                                    text-orange-400
                                                    text-2xl
                                                "
                                            >
                                                ◈
                                            </div>


                                            <span
                                                class="
                                                    block
                                                    uppercase
                                                    tracking-[4px]
                                                    text-orange-300
                                                    text-xs
                                                    font-bold
                                                    mt-8
                                                "
                                            >
                                                M R Hardware
                                            </span>


                                            <h3
                                                class="
                                                    text-3xl
                                                    font-black
                                                    text-white
                                                    mt-4
                                                    leading-tight
                                                "
                                            >
                                                Hardware Product Collection
                                            </h3>


                                            <p
                                                class="
                                                    text-gray-300
                                                    mt-5
                                                    leading-7
                                                    text-sm
                                                "
                                            >
                                                Explore handles, knobs, latches,
                                                fittings, holders and other hardware
                                                products available from M R Hardware.
                                            </p>

                                        </div>


                                        <div>

                                            <a
                                                href="{{ route('products') }}"
                                                class="
                                                    inline-flex
                                                    items-center
                                                    gap-2
                                                    bg-orange-600
                                                    hover:bg-orange-500
                                                    text-white
                                                    px-6
                                                    py-3
                                                    rounded-full
                                                    font-semibold
                                                    transition
                                                "
                                            >
                                                Explore Products →

                                            </a>

                                        </div>

                                    </div>

                                </div>

                            </div>


                            {{-- BOTTOM BAR --}}

                            <div
                                class="
                                    flex
                                    items-center
                                    justify-between
                                    px-8
                                    py-4
                                    bg-gray-50
                                    border-t
                                    border-gray-100
                                "
                            >

                                <p class="text-sm text-gray-500">
                                    Looking for a specific hardware product?
                                </p>


                                <a
                                    href="{{ route('contact') }}"
                                    class="
                                        text-sm
                                        font-bold
                                        text-orange-600
                                        hover:text-orange-700
                                        transition
                                    "
                                >
                                    Contact Us →
                                </a>

                            </div>

                        </div>

                    </div>

                </div>


                {{-- CONTACT --}}

                <a
                    href="{{ route('contact') }}"
                    class="
                        {{ request()->routeIs('contact')
                            ? 'text-orange-600 font-semibold'
                            : 'text-gray-700'
                        }}
                        hover:text-orange-600
                        transition
                    "
                >
                    Contact
                </a>

            </nav>



            {{-- =========================================================
                 DESKTOP RIGHT SIDE
            ========================================================== --}}

            <div class="hidden lg:flex items-center gap-4 xl:gap-5">

                <div class="hidden xl:block text-right">

                    <p class="text-[10px] uppercase tracking-[3px] text-gray-500">
                        Call Us
                    </p>

                    <a
                        href="tel:+919811510846"
                        class="font-bold text-gray-800 hover:text-orange-600 transition"
                    >
                        +91 9811510846
                    </a>

                </div>


                <a
                    href="{{ route('contact') }}"
                    class="
                        bg-orange-600
                        hover:bg-orange-700
                        text-white
                        px-6
                        xl:px-7
                        py-3
                        rounded-full
                        font-semibold
                        transition
                        shadow-lg
                        shadow-orange-600/20
                    "
                >
                    Request Quote
                </a>

            </div>



            {{-- =========================================================
                 MOBILE MENU BUTTON
            ========================================================== --}}

            <button
                type="button"
                @click="mobileOpen = !mobileOpen"
                class="
                    lg:hidden
                    w-11
                    h-11
                    rounded-xl
                    border
                    border-gray-200
                    flex
                    items-center
                    justify-center
                    text-gray-700
                    hover:text-orange-600
                    hover:border-orange-200
                    transition
                "
                aria-label="Open navigation"
            >

                <svg
                    x-show="!mobileOpen"
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
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
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-6 h-6"
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



    {{-- =============================================================
         MOBILE MENU
    ============================================================== --}}

    <div
        x-show="mobileOpen"
        x-transition
        x-cloak
        @click.outside="mobileOpen = false"
        class="
            lg:hidden
            bg-white
            border-t
            border-gray-200
            shadow-xl
            max-h-[calc(100vh-80px)]
            overflow-y-auto
        "
    >

        <div class="px-5 sm:px-6 py-4">

            <a
                href="{{ route('home') }}"
                @click="mobileOpen = false"
                class="
                    block py-4 border-b border-gray-100 font-medium
                    {{ request()->routeIs('home')
                        ? 'text-orange-600'
                        : 'text-gray-700'
                    }}
                "
            >
                Home
            </a>


            <a
                href="{{ route('about') }}"
                @click="mobileOpen = false"
                class="
                    block py-4 border-b border-gray-100 font-medium
                    {{ request()->routeIs('about')
                        ? 'text-orange-600'
                        : 'text-gray-700'
                    }}
                "
            >
                About
            </a>



            {{-- MOBILE PRODUCTS --}}

            <div x-data="{ productMenu: false }">

                <button
                    type="button"
                    @click="productMenu = !productMenu"
                    class="
                        w-full
                        flex
                        justify-between
                        items-center
                        py-4
                        border-b
                        border-gray-100
                        text-gray-700
                        font-medium
                    "
                >

                    <span>Products</span>

                    <svg
                        class="w-5 h-5 transition duration-300"
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
                    class="mt-3 mb-4 bg-gray-50 rounded-2xl p-3"
                >

                    <a
                        href="{{ route('products', ['category' => 'aldrops']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Aldrops
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'cabinet-handles']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Cabinet Handles
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'cloth-hanging-khuti']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Cloth Hanging Khuti
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'sliding-handles']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Sliding / Concealed Handles
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'cup-handles']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Cup Handles
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'door-handles']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Door Handles
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'door-knockers']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Door Knockers
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'door-stoppers']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Door Stoppers
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'key-holders']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Key Holders
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'knobs']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Knobs
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'latches']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Latches
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'magnet-catchers']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Magnet Catchers
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'profile-handles']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Profile / Kitchen Handles
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'door-kadi']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Pullers / Door Kadi
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'sofa-legs']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Sofa Legs
                    </a>

                    <a
                        href="{{ route('products', ['category' => 'ventilation-jali']) }}"
                        @click="mobileOpen = false"
                        class="mobile-product-link"
                    >
                        Ventilation Jali
                    </a>


                    <a
                        href="{{ route('products') }}"
                        @click="mobileOpen = false"
                        class="
                            block
                            mt-3
                            px-4
                            py-3
                            rounded-xl
                            bg-orange-600
                            hover:bg-orange-700
                            text-white
                            text-center
                            font-bold
                            transition
                        "
                    >
                        Explore Products →
                    </a>

                </div>

            </div>



            <a
                href="{{ route('contact') }}"
                @click="mobileOpen = false"
                class="
                    block py-4 border-b border-gray-100 font-medium
                    {{ request()->routeIs('contact')
                        ? 'text-orange-600'
                        : 'text-gray-700'
                    }}
                "
            >
                Contact
            </a>



            <div class="mt-6 pb-4">

                <a
                    href="tel:+919811510846"
                    class="
                        flex
                        items-center
                        justify-center
                        gap-2
                        w-full
                        border
                        border-orange-600
                        text-orange-600
                        py-3
                        rounded-xl
                        font-semibold
                        hover:bg-orange-50
                        transition
                    "
                >
                    ☎ Call +91 9811510846
                </a>


                <a
                    href="{{ route('contact') }}"
                    @click="mobileOpen = false"
                    class="
                        block
                        w-full
                        text-center
                        bg-orange-600
                        hover:bg-orange-700
                        text-white
                        py-3
                        rounded-xl
                        font-semibold
                        mt-3
                        transition
                    "
                >
                    Request Quote
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
        padding: 11px 14px;
        border-radius: 10px;

        color: #4b5563;
        font-size: 14px;
        font-weight: 600;

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