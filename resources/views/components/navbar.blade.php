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
        ?: 'Premium Architectural Hardware';

    $navHomeText =
        $siteSettings->nav_home_text
        ?: 'Home';

    $navAboutText =
        $siteSettings->nav_about_text
        ?: 'About Us';

    $navProductsText =
        $siteSettings->nav_products_text
        ?: 'Products';

    $navContactText =
        $siteSettings->nav_contact_text
        ?: 'Contact Us';

    $phone =
        $siteSettings->phone
        ?: '9811510846';

    $email =
        $siteSettings->email
        ?: 'mrhardware04@gmail.com';

    $phoneDigits =
        preg_replace('/\D+/', '', $phone);

    if (strlen($phoneDigits) === 10) {
        $phoneDigits = '91' . $phoneDigits;
    }

    $navCategories =
        $navCategories ?? collect();
@endphp


<header class="solasta-header">

    {{-- =========================================================
         TOP BAR
    ========================================================= --}}
    <div class="solasta-topbar">

        <div class="solasta-header-container">

            <div class="solasta-topbar-inner">

                <p class="solasta-topbar-left">
                    Premium Architectural Hardware & Accessories
                </p>


                <div class="solasta-topbar-right">

                    <a href="tel:+{{ $phoneDigits }}">

                        <i class="fa-solid fa-phone"></i>

                        <span>
                            {{ $phone }}
                        </span>

                    </a>


                    <a href="mailto:{{ $email }}">

                        <i class="fa-regular fa-envelope"></i>

                        <span>
                            {{ $email }}
                        </span>

                    </a>

                </div>

            </div>

        </div>

    </div>


    {{-- =========================================================
         MAIN NAVBAR
    ========================================================= --}}
    <div class="solasta-navbar">

        <div class="solasta-header-container">

            <div class="solasta-navbar-inner">

                {{-- BRAND --}}
                <a
                    href="{{ route('home') }}"
                    class="solasta-brand"
                >

                    <img
                        src="{{ asset($logoPath) }}"
                        alt="{{ $companyName }}"
                    >

                    <div class="solasta-brand-copy">

                        <strong>
                            {{ $companyName }}
                        </strong>

                        <span>
                            {{ $tagline }}
                        </span>

                    </div>

                </a>


                {{-- DESKTOP NAV --}}
                <nav class="solasta-nav-links">

                    <a
                        href="{{ route('home') }}"
                        class="{{ request()->routeIs('home') ? 'active' : '' }}"
                    >
                        {{ $navHomeText }}
                    </a>


                    <a
                        href="{{ route('about') }}"
                        class="{{ request()->routeIs('about') ? 'active' : '' }}"
                    >
                        {{ $navAboutText }}
                    </a>


                    {{-- PRODUCTS --}}
                    <div class="solasta-products-nav">

                        <a
                            href="{{ route('products') }}"
                            class="solasta-products-trigger {{ request()->routeIs('products', 'product.detail') ? 'active' : '' }}"
                        >

                            {{ $navProductsText }}

                            <i class="fa-solid fa-chevron-down"></i>

                        </a>


                        {{-- DROPDOWN --}}
                        @if($navCategories->isNotEmpty())

                            <div class="solasta-products-dropdown">

                                <div class="solasta-products-dropdown-grid">

                                    @foreach($navCategories->take(12) as $category)

                                        <a
                                            href="{{ route('products', ['category' => $category->slug]) }}"
                                            class="{{ $currentCategory === $category->slug ? 'active' : '' }}"
                                        >
                                            {{ $category->name }}
                                        </a>

                                    @endforeach

                                </div>


                                <a
                                    href="{{ route('products') }}"
                                    class="solasta-dropdown-all"
                                >
                                    View All Products
                                    <span>→</span>
                                </a>

                            </div>

                        @endif

                    </div>


                    <a
                        href="{{ route('contact') }}"
                        class="{{ request()->routeIs('contact') ? 'active' : '' }}"
                    >
                        {{ $navContactText }}
                    </a>

                </nav>


                {{-- RIGHT SIDE --}}
                <div class="solasta-header-actions">

                    <button
                        type="button"
                        class="solasta-header-icon"
                        aria-label="Search"
                    >
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>


                    <a
                        href="{{ route('contact') }}"
                        class="solasta-header-icon"
                        aria-label="Contact"
                    >
                        <i class="fa-regular fa-user"></i>
                    </a>


                    <a
                        href="{{ route('products') }}"
                        class="solasta-header-icon"
                        aria-label="Products"
                    >
                        <i class="fa-solid fa-bag-shopping"></i>
                    </a>


                    <a
                        href="{{ $siteSettings->navbar_button_link ?: route('contact') }}"
                        class="solasta-header-quote"
                    >
                        {{ $siteSettings->navbar_button_text ?: 'Get A Quote' }}

                        <span>→</span>
                    </a>

                </div>


                {{-- MOBILE BUTTON --}}
                <button
                    type="button"
                    class="solasta-mobile-toggle"
                    aria-label="Open navigation"
                    aria-expanded="false"
                >

                    <span></span>
                    <span></span>
                    <span></span>

                </button>

            </div>

        </div>

    </div>


    {{-- =========================================================
         MOBILE MENU
    ========================================================= --}}
    <div class="solasta-mobile-menu">

        <div class="solasta-mobile-menu-inner">

            <a href="{{ route('home') }}">
                {{ $navHomeText }}
            </a>

            <a href="{{ route('about') }}">
                {{ $navAboutText }}
            </a>


            <div class="solasta-mobile-products">

                <button type="button">

                    <span>
                        {{ $navProductsText }}
                    </span>

                    <i class="fa-solid fa-chevron-down"></i>

                </button>


                @if($navCategories->isNotEmpty())

                    <div class="solasta-mobile-products-list">

                        @foreach($navCategories as $category)

                            <a
                                href="{{ route('products', ['category' => $category->slug]) }}"
                            >
                                {{ $category->name }}
                            </a>

                        @endforeach

                        <a
                            href="{{ route('products') }}"
                            class="solasta-mobile-view-all"
                        >
                            View All Products →
                        </a>

                    </div>

                @endif

            </div>


            <a href="{{ route('contact') }}">
                {{ $navContactText }}
            </a>

            {{-- MOBILE QUICK ACTIONS --}}
<div class="solasta-mobile-actions">

    <a
        href="#"
        class="solasta-mobile-action"
    >
        <i class="fa-solid fa-magnifying-glass"></i>

        <span>
            Search
        </span>
    </a>


    <a
        href="{{ route('contact') }}"
        class="solasta-mobile-action"
    >
        <i class="fa-regular fa-user"></i>

        <span>
            Account
        </span>
    </a>


    <a
        href="{{ route('products') }}"
        class="solasta-mobile-action"
    >
        <i class="fa-solid fa-bag-shopping"></i>

        <span>
            Products
        </span>
    </a>

</div>


            <a
                href="{{ $siteSettings->navbar_button_link ?: route('contact') }}"
                class="solasta-mobile-quote"
            >
                {{ $siteSettings->navbar_button_text ?: 'Get A Quote' }}
            </a>

        </div>

    </div>

</header>