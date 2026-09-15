{{-- =========================================================
    ADMIN SIDEBAR
========================================================= --}}

@php
    /*
    |--------------------------------------------------------------------------
    | Active Menu States
    |--------------------------------------------------------------------------
    */

    $productMenuActive =
        request()->routeIs('admin.products.*') ||
        request()->routeIs('admin.categories.*') ||
        request()->routeIs('admin.products-page.*') ||
        request()->routeIs('admin.product-detail-page.*');

    $contentMenuActive =
        request()->routeIs('admin.homepage.*') ||
        request()->routeIs('admin.homepage.items.*') ||
        request()->routeIs('admin.about-page.*') ||
        request()->routeIs('admin.contact-page.*') ||
        request()->routeIs('admin.settings.*');
@endphp


<aside
    class="
        flex
        h-screen
        w-[270px]
        flex-col
        overflow-hidden
        bg-[#071a2d]
        text-white
    "
>

    {{-- =====================================================
        BRAND
    ====================================================== --}}
    <div class="border-b border-white/10 px-5 py-5">

        <div class="flex items-center justify-between gap-3">

            <div class="min-w-0">

                <p
                    class="
                        text-[10px]
                        font-black
                        uppercase
                        tracking-[0.2em]
                        text-orange-400
                    "
                >
                    M R Hardware
                </p>

                <h1
                    class="
                        mt-1
                        text-lg
                        font-black
                        tracking-[-0.02em]
                        text-white
                    "
                >
                    Admin Panel
                </h1>

                <p
                    class="
                        mt-0.5
                        text-[10px]
                        font-medium
                        text-slate-400
                    "
                >
                    Website Management
                </p>

            </div>


            <div
                class="
                    flex
                    h-10
                    w-10
                    shrink-0
                    items-center
                    justify-center
                    rounded-xl
                    border
                    border-orange-400/20
                    bg-orange-500/10
                    text-xs
                    font-black
                    text-orange-400
                "
            >
                MR
            </div>

        </div>

    </div>



    {{-- =====================================================
        NAVIGATION
    ====================================================== --}}
    <nav
        @click="if ($event.target.closest('a')) sidebarOpen = false"
        class="
            flex-1
            space-y-5
            overflow-y-auto
            px-3
            py-5
        "
    >

        {{-- =================================================
            MAIN
        ================================================== --}}
        <div>

            <p
                class="
                    mb-2
                    px-3
                    text-[9px]
                    font-black
                    uppercase
                    tracking-[0.18em]
                    text-slate-500
                "
            >
                Main
            </p>


            {{-- DASHBOARD --}}
            <a
                href="{{ route('admin.dashboard') }}"
                class="
                    flex
                    min-h-[44px]
                    items-center
                    gap-3
                    rounded-xl
                    px-3.5
                    py-2.5
                    text-[13px]
                    font-bold
                    transition

                    {{ request()->routeIs('admin.dashboard')
                        ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                        : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                    }}
                "
            >

                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="1.8"
                    stroke="currentColor"
                    class="h-[18px] w-[18px] shrink-0"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="M3.75 9 12 2.25 20.25 9v10.5a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V9Z"
                    />
                </svg>

                <span>Dashboard</span>

            </a>

        </div>



        {{-- =================================================
            PRODUCT MANAGEMENT
        ================================================== --}}
        <div
            x-data="{
                open: {{ $productMenuActive ? 'true' : 'false' }}
            }"
        >

            <button
                type="button"
                @click="open = !open"
                class="
                    flex
                    w-full
                    min-h-[42px]
                    items-center
                    justify-between
                    rounded-xl
                    px-3
                    text-left
                    transition

                    {{ $productMenuActive
                        ? 'bg-white/[0.06] text-white'
                        : 'text-slate-400 hover:bg-white/[0.05] hover:text-white'
                    }}
                "
            >

                <span
                    class="
                        text-[9px]
                        font-black
                        uppercase
                        tracking-[0.18em]
                    "
                >
                    Product Management
                </span>


                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="
                        h-4
                        w-4
                        transition-transform
                        duration-200
                    "
                    :class="open ? 'rotate-180' : ''"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                    />
                </svg>

            </button>


            <div
                x-cloak
                x-show="open"
                x-collapse
                class="mt-2 space-y-1"
            >

                {{-- PRODUCTS --}}
                <a
                    href="{{ route('admin.products.index') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.products.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 7.5 12 3l8.25 4.5L12 12 3.75 7.5Zm0 4.5L12 16.5l8.25-4.5M3.75 16.5 12 21l8.25-4.5"
                        />
                    </svg>

                    <span>Products</span>

                </a>


                {{-- CATEGORIES --}}
                <a
                    href="{{ route('admin.categories.index') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.categories.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 4.5h6v6h-6v-6Zm9 0h6v6h-6v-6Zm-9 9h6v6h-6v-6Zm9 0h6v6h-6v-6Z"
                        />
                    </svg>

                    <span>Categories</span>

                </a>


                {{-- PRODUCTS PAGE --}}
                <a
                    href="{{ route('admin.products-page.edit') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.products-page.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.75 3.75h10.5A2.25 2.25 0 0 1 19.5 6v12a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 18V6a2.25 2.25 0 0 1 2.25-2.25ZM8.25 8.25h7.5M8.25 12h7.5M8.25 15.75h5"
                        />
                    </svg>

                    <span>Products Page</span>

                </a>


                {{-- PRODUCT DETAIL PAGE --}}
                <a
                    href="{{ route('admin.product-detail-page.edit') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.product-detail-page.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M6.75 3.75h10.5A2.25 2.25 0 0 1 19.5 6v12a2.25 2.25 0 0 1-2.25 2.25H6.75A2.25 2.25 0 0 1 4.5 18V6a2.25 2.25 0 0 1 2.25-2.25ZM8.25 8.25h7.5M8.25 12h7.5M8.25 15.75h4.5"
                        />
                    </svg>

                    <span>Product Detail</span>

                </a>

            </div>

        </div>



        {{-- =================================================
            WEBSITE CONTENT
        ================================================== --}}
        <div
            x-data="{
                open: {{ $contentMenuActive ? 'true' : 'false' }}
            }"
        >

            <button
                type="button"
                @click="open = !open"
                class="
                    flex
                    w-full
                    min-h-[42px]
                    items-center
                    justify-between
                    rounded-xl
                    px-3
                    text-left
                    transition

                    {{ $contentMenuActive
                        ? 'bg-white/[0.06] text-white'
                        : 'text-slate-400 hover:bg-white/[0.05] hover:text-white'
                    }}
                "
            >

                <span
                    class="
                        text-[9px]
                        font-black
                        uppercase
                        tracking-[0.18em]
                    "
                >
                    Website Content
                </span>


                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke-width="2"
                    stroke="currentColor"
                    class="
                        h-4
                        w-4
                        transition-transform
                        duration-200
                    "
                    :class="open ? 'rotate-180' : ''"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        d="m19.5 8.25-7.5 7.5-7.5-7.5"
                    />
                </svg>

            </button>


            <div
                x-cloak
                x-show="open"
                x-collapse
                class="mt-2 space-y-1"
            >

                {{-- HOMEPAGE --}}
                <a
                    href="{{ route('admin.homepage.edit') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.homepage.edit')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 9 12 2.25 20.25 9v10.5a2.25 2.25 0 0 1-2.25 2.25H6a2.25 2.25 0 0 1-2.25-2.25V9Z"
                        />
                    </svg>

                    <span>Homepage</span>

                </a>


                {{-- HOMEPAGE SECTIONS --}}
                <a
                    href="{{ route('admin.homepage.sections') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.homepage.sections')
                            || request()->routeIs('admin.homepage.sections.*')
                            || request()->routeIs('admin.homepage.items.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 6.75h15M4.5 12h15M4.5 17.25h15"
                        />
                    </svg>

                    <span>Homepage Sections</span>

                </a>


                {{-- ABOUT PAGE --}}
                <a
                    href="{{ route('admin.about-page.edit') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.about-page.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11.25 11.25h1.5v5.25h-1.5v-5.25Zm.75-4.5h.008v.008H12V6.75ZM21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"
                        />
                    </svg>

                    <span>About Page</span>

                </a>


                {{-- CONTACT PAGE --}}
                <a
                    href="{{ route('admin.contact-page.edit') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.contact-page.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75"
                        />
                    </svg>

                    <span>Contact Page</span>

                </a>


                {{-- WEBSITE SETTINGS --}}
                <a
                    href="{{ route('admin.settings.edit') }}"
                    class="
                        flex
                        min-h-[44px]
                        items-center
                        gap-3
                        rounded-xl
                        px-3.5
                        py-2.5
                        text-[13px]
                        font-bold
                        transition

                        {{ request()->routeIs('admin.settings.*')
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                            : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                        }}
                    "
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm8.25 3a8.2 8.2 0 0 0-.15-1.55l1.65-1.28-2-3.46-2.04.82a8.7 8.7 0 0 0-2.69-1.55L14.7 2.8h-4l-.32 2.18a8.7 8.7 0 0 0-2.69 1.55l-2.04-.82-2 3.46 1.65 1.28A8.2 8.2 0 0 0 5.15 12c0 .53.05 1.05.15 1.55l-1.65 1.28 2 3.46 2.04-.82a8.7 8.7 0 0 0 2.69 1.55l.32 2.18h4l.32-2.18a8.7 8.7 0 0 0 2.69-1.55l2.04.82 2-3.46-1.65-1.28c.1-.5.15-1.02.15-1.55Z"
                        />
                    </svg>

                    <span>Website Settings</span>

                </a>

            </div>

        </div>



        {{-- =================================================
            CUSTOMER
        ================================================== --}}
        <div>

            <p
                class="
                    mb-2
                    px-3
                    text-[9px]
                    font-black
                    uppercase
                    tracking-[0.18em]
                    text-slate-500
                "
            >
                Customer
            </p>


            {{-- ENQUIRIES --}}
            <a
                href="{{ route('admin.enquiries.index') }}"
                class="
                    flex
                    min-h-[44px]
                    items-center
                    justify-between
                    gap-3
                    rounded-xl
                    px-3.5
                    py-2.5
                    text-[13px]
                    font-bold
                    transition

                    {{ request()->routeIs('admin.enquiries.*')
                        ? 'bg-orange-600 text-white shadow-lg shadow-orange-950/20'
                        : 'text-slate-300 hover:bg-white/[0.07] hover:text-white'
                    }}
                "
            >

                <span class="flex min-w-0 items-center gap-3">

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-[18px] w-[18px] shrink-0"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75"
                        />
                    </svg>

                    <span>Enquiries</span>

                </span>


                @if(($sidebarNewEnquiries ?? 0) > 0)

                    <span
                        class="
                            shrink-0
                            rounded-full
                            px-2
                            py-0.5
                            text-[9px]
                            font-black

                            {{ request()->routeIs('admin.enquiries.*')
                                ? 'bg-white text-orange-600'
                                : 'bg-orange-600 text-white'
                            }}
                        "
                    >
                        {{ $sidebarNewEnquiries }}
                    </span>

                @endif

            </a>

        </div>

    </nav>



    {{-- =====================================================
        BOTTOM
    ====================================================== --}}
    <div class="border-t border-white/10 p-3">

        <a
            href="{{ route('home') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="
                flex
                min-h-[44px]
                items-center
                justify-center
                gap-2
                rounded-xl
                border
                border-white/10
                bg-white/[0.03]
                px-4
                text-[12px]
                font-bold
                text-slate-300
                transition
                hover:border-orange-500/30
                hover:bg-orange-500/10
                hover:text-orange-400
            "
        >

            <span>View Website</span>

            <svg
                xmlns="http://www.w3.org/2000/svg"
                fill="none"
                viewBox="0 0 24 24"
                stroke-width="1.8"
                stroke="currentColor"
                class="h-4 w-4"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M13.5 4.5H19.5V10.5M19.125 4.875 10.5 13.5M18 13.5v4.125A1.875 1.875 0 0 1 16.125 19.5H6.375A1.875 1.875 0 0 1 4.5 17.625V7.875A1.875 1.875 0 0 1 6.375 6H10.5"
                />
            </svg>

        </a>

    </div>

</aside>