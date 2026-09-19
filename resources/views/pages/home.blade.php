@extends('layouts.app')

@section('title', 'M R Hardware | Industrial Hardware Supplier')

@section('content')

<section class="solasta-hero">

    <div class="solasta-hero-inner">

        {{-- LEFT CONTENT --}}
        <div class="solasta-hero-content">

            <div class="solasta-hero-content-inner">

                <p class="solasta-hero-kicker hero-reveal hero-delay-1">
                    PREMIUM HARDWARE SOLUTIONS
                </p>

                <h1 class="solasta-hero-title hero-reveal hero-delay-2">
                    Strong Hardware
                    <br>
                    for a Better Tomorrow
                </h1>

                <p class="solasta-hero-description hero-reveal hero-delay-3">
                    M R Hardware offers a wide range of premium quality hardware products designed for durability, style and long-lasting performance.
                </p>


                {{-- BUTTONS --}}
                <div class="solasta-hero-actions hero-reveal hero-delay-4">

                    <a
                        href="{{ route('products') }}"
                        class="solasta-hero-btn solasta-hero-btn-primary"
                    >
                        Explore Products

                        <span>
                            →
                        </span>
                    </a>


                    <a
                        href="#"
                        class="solasta-hero-btn solasta-hero-btn-secondary"
                    >
                        <i class="fa-solid fa-download"></i>

                        Download Catalogue

                        <span>
                            ↗
                        </span>
                    </a>

                </div>


                {{-- FEATURES --}}
                <div class="solasta-hero-features hero-reveal hero-delay-5">

                    {{-- FEATURE 1 --}}
                    <div class="solasta-hero-feature">

                        <div class="solasta-hero-feature-icon">

                            <i class="fa-solid fa-award"></i>

                        </div>

                        <div>

                            <strong>
                                Premium Quality
                            </strong>

                            <span>
                                Products
                            </span>

                        </div>

                    </div>


                    {{-- FEATURE 2 --}}
                    <div class="solasta-hero-feature">

                        <div class="solasta-hero-feature-icon">

                            <i class="fa-solid fa-border-all"></i>

                        </div>

                        <div>

                            <strong>
                                Wide Range
                            </strong>

                            <span>
                                of Categories
                            </span>

                        </div>

                    </div>


                    {{-- FEATURE 3 --}}
                    <div class="solasta-hero-feature">

                        <div class="solasta-hero-feature-icon">

                            <i class="fa-solid fa-user-group"></i>

                        </div>

                        <div>

                            <strong>
                                Trusted by
                            </strong>

                            <span>
                                Professionals
                            </span>

                        </div>

                    </div>

                </div>

            </div>

        </div>


        {{-- RIGHT IMAGE --}}
        <div class="solasta-hero-image-wrap">

            <img
                src="{{ asset('images/Homepage/Hero/hero.jpg') }}"
                alt="Premium Hardware"
                class="solasta-hero-image"
                fetchpriority="high"
            >


            {{-- SCRIPT TEXT --}}
            <div class="solasta-quality-text">

                <span>
                    Quality
                </span>

                <span>
                    in Every
                </span>

                <span>
                    Detail
                </span>

                <div class="solasta-quality-line"></div>

            </div>

        </div>

    </div>

</section>

{{-- =========================================================
     SHOP BY CATEGORY
========================================================= --}}
<section class="solasta-category-section">

    <div class="solasta-category-container">

        {{-- HEADER --}}
        <div class="solasta-category-header category-reveal">

            <div class="solasta-category-heading">

                <h2>
                    Shop by Category
                </h2>

                <p>
                    Explore our wide range of hardware products designed
                    <br class="solasta-category-break">
                    for modern homes, offices and commercial spaces.
                </p>

            </div>


            <a
                href="{{ route('products') }}"
                class="solasta-category-view-all"
            >
                View All Categories

                <span>
                    →
                </span>
            </a>

        </div>


        {{-- CATEGORY GRID --}}
        <div class="solasta-category-grid">

            @foreach($categories->take(7) as $category)

                @php
                    $categoryImage = optional(
                        $category->products->first()
                    )->image;
                @endphp

                <a
                    href="{{ route('products', ['category' => $category->slug]) }}"
                    class="
                        solasta-category-card
                        category-card-reveal
                        {{ $loop->iteration <= 3 ? 'solasta-category-large' : 'solasta-category-small' }}
                    "
                >

                    {{-- IMAGE --}}
                    <div class="solasta-category-image">

                        @if($categoryImage)

                            <img
                                src="{{ asset($categoryImage) }}"
                                alt="{{ $category->name }}"
                                loading="lazy"
                            >

                        @else

                            <div class="solasta-category-placeholder"></div>

                        @endif

                    </div>


                    {{-- CONTENT --}}
                    <div class="solasta-category-card-content">

                        <div>

                            <h3>
                                {{ $category->name }}
                            </h3>

                            @if($loop->iteration <= 3)

                                <p>
                                    {{ $category->description ?: 'Hardware products and accessories' }}
                                </p>

                            @endif

                        </div>


                        <span class="solasta-category-arrow">
                            →
                        </span>

                    </div>

                </a>

            @endforeach

        </div>

    </div>

</section>

{{-- =========================================================
     FEATURED PRODUCTS
========================================================= --}}
<section class="solasta-products-section">

    <div class="solasta-products-container">

        {{-- HEADER --}}
        <div class="solasta-products-header products-reveal">

            <div class="solasta-products-heading">

                <h2>
                    Featured Products
                </h2>

                <p>
                    Our most popular hardware products, trusted for quality and performance.
                </p>

            </div>

            <a
                href="{{ route('products') }}"
                class="solasta-products-view-all"
            >
                View All Products
                <span>→</span>
            </a>

        </div>


        {{-- PRODUCT GRID --}}
        <div class="solasta-products-grid">

            @forelse($featuredProducts->take(5) as $product)

                <article class="solasta-product-card product-card-reveal">

                    <a
                        href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                        class="solasta-product-image-link"
                    >

                        <div class="solasta-product-image">

                            <img
                                src="{{ asset($product->image) }}"
                                alt="{{ $product->name }}"
                                loading="lazy"
                            >

                        </div>

                    </a>


                    <div class="solasta-product-content">

                        <h3>
                            {{ $product->name }}
                        </h3>

                        <p class="solasta-product-code">
                            MR-{{ str_pad((string) $loop->iteration, 3, '0', STR_PAD_LEFT) }}
                        </p>

                        <a
                            href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                            class="solasta-product-enquire"
                        >
                            Enquire Now
                        </a>

                    </div>

                </article>

            @empty

                <div class="solasta-products-empty">
                    No featured products available.
                </div>

            @endforelse

        </div>

    </div>

</section>

{{-- =========================================================
     ABOUT / QUALITY
========================================================= --}}
<section class="solasta-about-section">

    <div class="solasta-about-container">

        <div class="solasta-about-grid">

            {{-- LEFT IMAGE / CONTENT --}}
            <div class="solasta-about-media about-reveal">

                <img
                    src="{{ asset($homepage->about_image ?: 'images/Homepage/about/company.jpg') }}"
                    alt="M R Hardware"
                    loading="lazy"
                    class="solasta-about-image"
                >

                <div class="solasta-about-overlay"></div>

                <div class="solasta-about-content">

                    <h2>
                        Built on Trust,
                        <br>
                        Driven by Quality
                    </h2>

                    <p>
                        At M R Hardware, we are committed to delivering superior hardware solutions that combine innovation, durability and design.
                    </p>

                    <a
                        href="{{ route('about') }}"
                        class="solasta-about-btn"
                    >
                        About Us

                        <span>
                            →
                        </span>
                    </a>

                </div>

            </div>


            {{-- RIGHT FEATURES --}}
            <div class="solasta-about-features">

                {{-- ITEM 1 --}}
                <div class="solasta-about-feature about-feature-reveal">

                    <div class="solasta-about-icon">

                        <i class="fa-solid fa-medal"></i>

                    </div>

                    <div>

                        <h3>
                            High Quality Materials
                        </h3>

                        <p>
                            We use premium raw materials for long-lasting performance.
                        </p>

                    </div>

                </div>


                {{-- ITEM 2 --}}
                <div class="solasta-about-feature about-feature-reveal">

                    <div class="solasta-about-icon">

                        <i class="fa-solid fa-border-all"></i>

                    </div>

                    <div>

                        <h3>
                            Wide Product Range
                        </h3>

                        <p>
                            From essential to premium, we have it all under one roof.
                        </p>

                    </div>

                </div>


                {{-- ITEM 3 --}}
                <div class="solasta-about-feature about-feature-reveal">

                    <div class="solasta-about-icon">

                        <i class="fa-solid fa-user-group"></i>

                    </div>

                    <div>

                        <h3>
                            Experienced Team
                        </h3>

                        <p>
                            A team of skilled professionals ensuring the best for you.
                        </p>

                    </div>

                </div>


                {{-- ITEM 4 --}}
                <div class="solasta-about-feature about-feature-reveal">

                    <div class="solasta-about-icon">

                        <i class="fa-solid fa-handshake"></i>

                    </div>

                    <div>

                        <h3>
                            Customer Satisfaction
                        </h3>

                        <p>
                            Your trust drives us to do better every day.
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================================================
     TRUSTED PARTNERS
========================================================= --}}

<section class="solasta-partners-section">

    <div class="solasta-partners-container">

        <div class="solasta-partners-grid partners-reveal">

            {{-- LEFT --}}
            <div class="solasta-partners-copy">

                <h2>
                    Our Trusted Partners
                </h2>

                <p>
                    We are proud to serve leading brands and businesses across India.
                </p>

            </div>


            {{-- RIGHT --}}
            <div class="solasta-partners-list">

                <div class="solasta-partner-item partner-item-reveal">
                    <span>Hettich</span>
                </div>

                <div class="solasta-partner-item partner-item-reveal">
                    <span>Häfele</span>
                </div>

                <div class="solasta-partner-item partner-item-reveal">
                    <span>Godrej</span>
                </div>

                <div class="solasta-partner-item partner-item-reveal">
                    <span>Dorset</span>
                </div>

                <div class="solasta-partner-item partner-item-reveal">
                    <span>Ebco</span>
                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================================================
     OUR PROJECTS
========================================================= --}}

<section class="solasta-projects-section">

    <div class="solasta-projects-container">

        <div class="solasta-projects-grid">

            {{-- LEFT CONTENT --}}
            <div class="solasta-projects-content projects-reveal">

                <h2>
                    Our Projects
                </h2>

                <p>
                    Explore how our hardware products bring spaces to life.
                </p>

                <a
                    href="{{ route('products') }}"
                    class="solasta-projects-btn"
                >
                    View Gallery

                    <span>
                        →
                    </span>
                </a>

            </div>


            {{-- RIGHT IMAGES --}}
            <div class="solasta-projects-gallery">

                <div class="solasta-project-image project-image-reveal">

                    <img
                        src="{{ asset('images/Homepage/Projects/project-1.jpg') }}"
                        alt="Project 1"
                        loading="lazy"
                    >

                </div>


                <div class="solasta-project-image project-image-reveal">

                    <img
                        src="{{ asset('images/Homepage/Projects/project-2.jpg') }}"
                        alt="Project 2"
                        loading="lazy"
                    >

                </div>


                <div class="solasta-project-image project-image-reveal">

                    <img
                        src="{{ asset('images/Homepage/Projects/project-3.jpg') }}"
                        alt="Project 3"
                        loading="lazy"
                    >

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================================================
     NEWSLETTER CTA
========================================================= --}}

<section class="solasta-cta-section">

    <div class="solasta-cta-container">

        <div class="solasta-cta-grid">

            {{-- LEFT --}}
            <div class="solasta-cta-copy cta-reveal">

                <div class="solasta-cta-icon">
                    <i class="fa-regular fa-envelope"></i>
                </div>

                <div>

                    <h3>
                        Subscribe to Our Newsletter
                    </h3>

                    <p>
                        Get the latest updates on new products, offers and more.
                    </p>

                </div>

            </div>


            {{-- RIGHT --}}
            <div class="solasta-cta-form-wrap cta-reveal">

                <form
                    class="solasta-cta-form"
                    action="#"
                    method="POST"
                >

                    <input
                        type="email"
                        name="email"
                        placeholder="Enter your email address"
                        aria-label="Email address"
                    >

                    <button type="submit">
                        Subscribe
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>

@endsection