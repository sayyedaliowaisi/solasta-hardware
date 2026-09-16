@extends('layouts.app')

@section('title', 'M R Hardware | Industrial Hardware Supplier')

@section('content')

@php
    $whySection = $homepageSections->get('why_choose');
    $whyItems = $homepageItems->get('why_choose', collect());

    $statsSection = $homepageSections->get('stats');
    $statsItems = $homepageItems->get('stats', collect());

    $brandsSection = $homepageSections->get('brands');
    $brandItems = $homepageItems->get('brands', collect());

    $processSection = $homepageSections->get('process');
    $processItems = $homepageItems->get('process', collect());

    $testimonialsSection = $homepageSections->get('testimonials');
    $testimonialItems = $homepageItems->get('testimonials', collect());

    $homeCategories = $categories->take(
    $homepage->categories_limit ?: 6
);

$homeFeaturedProducts = $featuredProducts->take(
    $homepage->products_limit ?: 3
);

$homeWhyItems = $whyItems->take(
    $homepage->why_choose_limit ?: 3
);

$homeStatsItems = $statsItems->take(
    $homepage->stats_limit ?: 4
);

$homeProcessItems = $processItems->take(
    $homepage->process_limit ?: 4
);

$homeTestimonials = $testimonialItems->take(
    $homepage->testimonials_limit ?: 3
);

    $site = $siteSettings ?? null;

    $sitePhone = $site?->phone ?: '9811510846';
    $siteWhatsapp = $site?->whatsapp ?: $sitePhone;

    $phoneHref = preg_replace('/\D+/', '', $sitePhone);
    $whatsappNumber = preg_replace('/\D+/', '', $siteWhatsapp);

    if (strlen($whatsappNumber) === 10) {
        $whatsappNumber = '91' . $whatsappNumber;
    }

    $aboutFeatures = collect([
        $homepage->about_feature_1,
        $homepage->about_feature_2,
        $homepage->about_feature_3,
        $homepage->about_feature_4,
    ])->filter(fn ($item) => filled($item));

    if ($aboutFeatures->isEmpty()) {
        $aboutFeatures = collect([
            'Manufacturing',
            'Trading',
            'Product Enquiries',
            'Business Support',
        ]);
    }

@endphp


{{-- =========================================================
     HERO
     Same Design + Premium Animations
========================================================= --}}
<section
    class="home-hero relative overflow-hidden
           bg-gradient-to-r from-slate-950 via-slate-900 to-[#8a3413]
           text-white
           lg:min-h-[calc(100svh-72px)]
           lg:flex lg:items-center"
>

    {{-- Background Glow --}}
    <div
        class="hero-bg-glow absolute inset-0 opacity-40"
        style="
            background-image:
                radial-gradient(circle at 16% 20%, rgba(249,115,22,.48) 0, transparent 28%),
                radial-gradient(circle at 82% 72%, rgba(14,165,233,.22) 0, transparent 30%);
        "
    ></div>

    <div
        class="absolute inset-0
               bg-gradient-to-br
               from-slate-950/10
               via-transparent
               to-slate-950/45"
    ></div>


    {{-- Decorative Animated Glow --}}
    <div
        class="hero-orb hero-orb-one
               pointer-events-none
               absolute -left-24 top-20
               h-64 w-64
               rounded-full
               bg-orange-500/10
               blur-3xl"
    ></div>

    <div
        class="hero-orb hero-orb-two
               pointer-events-none
               absolute -right-24 bottom-10
               h-72 w-72
               rounded-full
               bg-sky-500/10
               blur-3xl"
    ></div>


    <div
        class="relative mx-auto w-full max-w-[1180px]
               px-4 py-14
               sm:px-6 sm:py-16
               lg:px-8 lg:py-10"
    >

        <div
            class="grid items-center
                   gap-9 lg:gap-12
                   lg:grid-cols-[1.02fr_.98fr]"
        >

            {{-- =====================================================
                 LEFT CONTENT
            ====================================================== --}}
            <div class="max-w-2xl">

                {{-- Badge --}}
                @if(!empty($homepage->hero_badge))
                    <span
                        class="hero-animate hero-delay-1
                               inline-flex items-center
                               rounded-full
                               border border-orange-400/20
                               bg-orange-500/10
                               px-4 py-2
                               text-[10px] sm:text-[11px]
                               font-bold uppercase
                               tracking-[0.16em]
                               text-orange-300"
                    >
                        {{ $homepage->hero_badge }}
                    </span>
                @endif


                {{-- Heading --}}
                <h1
                    class="hero-animate hero-delay-2
                           mt-5
                           text-[38px]
                           sm:text-[48px]
                           lg:text-[56px]
                           font-black
                           leading-[1.03]
                           tracking-[-0.045em]
                           text-white"
                >
                    {{ $homepage->hero_title ?: 'Premium Industrial Hardware Supplier' }}
                </h1>


                {{-- Description --}}
                @if(!empty($homepage->hero_description))
                    <p
                        class="hero-animate hero-delay-3
                               mt-5
                               max-w-xl
                               text-[14px] sm:text-[15px]
                               leading-7
                               text-slate-300"
                    >
                        {{ $homepage->hero_description }}
                    </p>
                @endif


                {{-- Buttons --}}
                <div
                    class="hero-animate hero-delay-4
                           mt-7 flex flex-wrap gap-3"
                >

                    @if(!empty($homepage->hero_primary_text))
                        <a
                            href="{{ $homepage->hero_primary_link ?: route('products') }}"
                            class="hero-primary-btn
                                   inline-flex min-h-[44px]
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
                            {{ $homepage->hero_primary_text }}
                        </a>
                    @endif


                    @if(!empty($homepage->hero_secondary_text))
                        <a
                            href="{{ $homepage->hero_secondary_link ?: route('contact') }}"
                            class="hero-secondary-btn
                                   inline-flex min-h-[44px]
                                   items-center justify-center
                                   rounded-xl
                                   border border-white/20
                                   bg-white/5
                                   px-5
                                   text-[12px]
                                   font-bold
                                   text-white
                                   transition
                                   hover:bg-white
                                   hover:text-slate-950"
                        >
                            {{ $homepage->hero_secondary_text }}
                        </a>
                    @endif

                </div>


                {{-- =================================================
                     STATS
                ================================================== --}}
                <div
                    class="hero-animate hero-delay-5
                           mt-7 grid max-w-xl
                           grid-cols-2
                           gap-3 sm:grid-cols-4"
                >

                    {{-- Stat 1 --}}
                    <div
                        class="hero-stat-card
                               rounded-2xl
                               border border-white/10
                               bg-white/[0.06]
                               px-4 py-3
                               backdrop-blur"
                    >
                        <p class="text-[20px] font-black text-orange-400">
                            {{ $homepage->hero_stat_1_value ?: '2014' }}
                        </p>

                        <p class="mt-0.5 text-[10px] text-slate-400">
                            {{ $homepage->hero_stat_1_label ?: 'Established' }}
                        </p>
                    </div>


                    {{-- Stat 2 --}}
                    <div
                        class="hero-stat-card
                               rounded-2xl
                               border border-white/10
                               bg-white/[0.06]
                               px-4 py-3
                               backdrop-blur"
                    >
                        <p class="text-[20px] font-black text-orange-400">
                            {{ $categories->count() }}
                        </p>

                        <p class="mt-0.5 text-[10px] text-slate-400">
                            Categories
                        </p>
                    </div>


                    {{-- Stat 3 --}}
                    <div
                        class="hero-stat-card
                               rounded-2xl
                               border border-white/10
                               bg-white/[0.06]
                               px-4 py-3
                               backdrop-blur"
                    >
                        <p class="text-[20px] font-black text-orange-400">
                            {{ $featuredProducts->count() }}+
                        </p>

                        <p class="mt-0.5 text-[10px] text-slate-400">
                            Featured
                        </p>
                    </div>


                    {{-- Stat 4 --}}
                    <div
                        class="hero-stat-card
                               rounded-2xl
                               border border-white/10
                               bg-white/[0.06]
                               px-4 py-3
                               backdrop-blur"
                    >
                        <p class="text-[20px] font-black text-orange-400">
                            {{ $homepage->hero_stat_4_value ?: 'India' }}
                        </p>

                        <p class="mt-0.5 text-[10px] text-slate-400">
                            {{ $homepage->hero_stat_4_label ?: 'Market' }}
                        </p>
                    </div>

                </div>

            </div>


            {{-- =====================================================
                 RIGHT IMAGE
            ====================================================== --}}
            <div
                class="hero-image-entry
                       relative"
            >

                {{-- Soft Glow Behind Image --}}
                <div
                    class="hero-image-glow
                           pointer-events-none
                           absolute inset-8
                           rounded-[30px]
                           bg-orange-500/20
                           blur-3xl"
                ></div>


                <div
                    class="hero-image-card
                           relative
                           h-[360px]
                           overflow-hidden
                           rounded-[26px]
                           border border-white/10
                           bg-slate-800
                           shadow-2xl
                           sm:h-[440px]
                           lg:h-[500px]"
                >

                    <img
                        src="{{ asset($homepage->hero_image ?: 'images/Homepage/Hero/hero.jpg') }}"
                        alt="{{ $homepage->hero_title ?: 'M R Hardware' }}"
                        fetchpriority="high"
                        class="hero-main-image
                               absolute inset-0
                               h-full w-full
                               object-cover object-center"
                    >

                    <div
                        class="absolute inset-0
                               bg-gradient-to-t
                               from-slate-950/30
                               via-transparent
                               to-transparent"
                    ></div>

                    {{-- Animated Shine --}}
                    <div
                        class="hero-image-shine
                               pointer-events-none
                               absolute inset-y-0
                               -left-1/2
                               w-1/3
                               rotate-12
                               bg-gradient-to-r
                               from-transparent
                               via-white/10
                               to-transparent"
                    ></div>

                </div>


                {{-- Floating Card --}}
                <div
                    class="hero-floating-card
                           absolute bottom-4 left-4
                           rounded-2xl
                           border border-white/50
                           bg-white/95
                           px-4 py-3
                           shadow-xl
                           backdrop-blur"
                >
                    <p class="text-[16px] font-black text-orange-600">
                        {{ $homepage->hero_floating_title ?: 'Since 2014' }}
                    </p>

                    <p class="text-[10px] font-semibold text-slate-600">
                        {{ $homepage->hero_floating_text ?: 'M R Hardware' }}
                    </p>
                </div>

            </div>

        </div>

    </div>

</section>


{{-- =========================================================
     HERO ANIMATIONS
========================================================= --}}
<style>

    /* =========================================================
       LEFT CONTENT ENTRANCE
    ========================================================= */

    .hero-animate {
        opacity: 0;
        transform: translateY(24px);
        animation: heroFadeUp .75s cubic-bezier(.22, 1, .36, 1) forwards;
    }

    .hero-delay-1 {
        animation-delay: .08s;
    }

    .hero-delay-2 {
        animation-delay: .18s;
    }

    .hero-delay-3 {
        animation-delay: .30s;
    }

    .hero-delay-4 {
        animation-delay: .42s;
    }

    .hero-delay-5 {
        animation-delay: .54s;
    }

    @keyframes heroFadeUp {
        from {
            opacity: 0;
            transform: translateY(24px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }


    /* =========================================================
       RIGHT IMAGE ENTRANCE
    ========================================================= */

    .hero-image-entry {
        opacity: 0;
        transform: translateX(32px) scale(.97);
        animation: heroImageEntry
            .9s
            .25s
            cubic-bezier(.22, 1, .36, 1)
            forwards;
    }

    @keyframes heroImageEntry {
        from {
            opacity: 0;
            transform: translateX(32px) scale(.97);
        }

        to {
            opacity: 1;
            transform: translateX(0) scale(1);
        }
    }


    /* =========================================================
       IMAGE
    ========================================================= */

    .hero-main-image {
        transform: scale(1.035);
        animation: heroImageZoom 9s ease-in-out infinite alternate;
        will-change: transform;
    }

    @keyframes heroImageZoom {
        from {
            transform: scale(1.035);
        }

        to {
            transform: scale(1.09);
        }
    }


    /* =========================================================
       IMAGE CARD
    ========================================================= */

    .hero-image-card {
        transition:
            transform .45s cubic-bezier(.22, 1, .36, 1),
            box-shadow .45s ease,
            border-color .45s ease;
    }

    .hero-image-entry:hover .hero-image-card {
        transform: translateY(-4px);
        border-color: rgba(255, 255, 255, .18);
        box-shadow:
            0 28px 70px rgba(0, 0, 0, .35);
    }


    /* =========================================================
       IMAGE SHINE
    ========================================================= */

    .hero-image-shine {
        opacity: 0;
        transform: translateX(-220%) rotate(12deg);
        animation: heroImageShine 7s ease-in-out 2s infinite;
    }

    @keyframes heroImageShine {

        0%,
        72% {
            opacity: 0;
            transform: translateX(-220%) rotate(12deg);
        }

        78% {
            opacity: 1;
        }

        92% {
            opacity: .45;
        }

        100% {
            opacity: 0;
            transform: translateX(650%) rotate(12deg);
        }
    }


    /* =========================================================
       FLOATING CARD
    ========================================================= */

    .hero-floating-card {
        animation: heroFloatingCard 4s ease-in-out infinite;
        will-change: transform;
    }

    @keyframes heroFloatingCard {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-7px);
        }
    }


    /* =========================================================
       STATS HOVER
    ========================================================= */

    .hero-stat-card {
        transition:
            transform .3s ease,
            background-color .3s ease,
            border-color .3s ease,
            box-shadow .3s ease;
    }

    .hero-stat-card:hover {
        transform: translateY(-5px);
        background-color: rgba(255, 255, 255, .09);
        border-color: rgba(249, 115, 22, .25);
        box-shadow:
            0 14px 30px rgba(0, 0, 0, .15);
    }


    /* =========================================================
       BUTTONS
    ========================================================= */

    .hero-primary-btn,
    .hero-secondary-btn {
        position: relative;
        overflow: hidden;

        transition:
            transform .25s ease,
            box-shadow .25s ease,
            background-color .25s ease,
            color .25s ease;
    }

    .hero-primary-btn:hover {
        transform: translateY(-2px);
        box-shadow:
            0 12px 28px rgba(234, 88, 12, .30);
    }

    .hero-secondary-btn:hover {
        transform: translateY(-2px);
        box-shadow:
            0 12px 28px rgba(0, 0, 0, .18);
    }


    /* =========================================================
       BACKGROUND MOVEMENT
    ========================================================= */

    .hero-bg-glow {
        animation: heroBackgroundGlow 9s ease-in-out infinite alternate;
    }

    @keyframes heroBackgroundGlow {
        from {
            transform: scale(1);
            opacity: .40;
        }

        to {
            transform: scale(1.06);
            opacity: .52;
        }
    }


    /* =========================================================
       DECORATIVE ORBS
    ========================================================= */

    .hero-orb-one {
        animation: heroOrbOne 8s ease-in-out infinite alternate;
    }

    .hero-orb-two {
        animation: heroOrbTwo 10s ease-in-out infinite alternate;
    }

    @keyframes heroOrbOne {
        from {
            transform: translate3d(0, 0, 0);
        }

        to {
            transform: translate3d(40px, 25px, 0);
        }
    }

    @keyframes heroOrbTwo {
        from {
            transform: translate3d(0, 0, 0);
        }

        to {
            transform: translate3d(-35px, -25px, 0);
        }
    }


    /* =========================================================
       IMAGE GLOW
    ========================================================= */

    .hero-image-glow {
        animation: heroImageGlow 5s ease-in-out infinite alternate;
    }

    @keyframes heroImageGlow {
        from {
            opacity: .35;
            transform: scale(.94);
        }

        to {
            opacity: .65;
            transform: scale(1.04);
        }
    }


    /* =========================================================
       ACCESSIBILITY / REDUCED MOTION
    ========================================================= */

    @media (prefers-reduced-motion: reduce) {

        .hero-animate,
        .hero-image-entry {
            opacity: 1;
            transform: none;
            animation: none;
        }

        .hero-main-image,
        .hero-floating-card,
        .hero-bg-glow,
        .hero-orb-one,
        .hero-orb-two,
        .hero-image-glow,
        .hero-image-shine {
            animation: none;
        }

        .hero-image-entry:hover .hero-image-card,
        .hero-stat-card:hover,
        .hero-primary-btn:hover,
        .hero-secondary-btn:hover {
            transform: none;
        }
    }

</style>



{{-- =========================================================
     WHY CHOOSE US
========================================================= --}}
@if($whySection && $whyItems->isNotEmpty())
<section
    class="home-reveal-section bg-white
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            @if($whySection->badge)
                <span
                    class="inline-flex rounded-full
                           bg-orange-50
                           px-4 py-2
                           text-[9px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-orange-600"
                >
                    {{ $whySection->badge }}
                </span>
            @endif


            <h2
                class="mt-4
                       text-[28px] sm:text-[34px]
                       lg:text-[38px]
                       font-black
                       leading-[1.1]
                       tracking-[-0.035em]
                       text-slate-950"
            >
                {{ $whySection->title }}
            </h2>


            @if($whySection->description)
                <p
                    class="mt-4
                           text-[13px] sm:text-[14px]
                           leading-6
                           text-slate-600"
                >
                    {{ $whySection->description }}
                </p>
            @endif

        </div>


        <div
            class="mt-8 grid
                   gap-4
                   md:grid-cols-2
                   lg:grid-cols-3"
        >

            @foreach($homeWhyItems as $item)

                <div
                    class="group
                           rounded-[22px]
                           border border-slate-200
                           bg-white
                           p-5 sm:p-6
                           transition duration-300
                           hover:-translate-y-1
                           hover:shadow-[0_16px_38px_rgba(15,23,42,0.08)]"
                >

                    <div
                        class="flex h-11 w-11
                               items-center justify-center
                               rounded-xl
                               bg-orange-50
                               text-[18px]
                               font-black
                               text-orange-600"
                    >
                        {{ $item->icon ?: '✓' }}
                    </div>


                    <h3
                        class="mt-4
                               text-[16px]
                               font-bold
                               text-slate-950"
                    >
                        {{ $item->title }}
                    </h3>


                    @if($item->description)
                        <p
                            class="mt-2
                                   text-[12px]
                                   leading-5
                                   text-slate-600"
                        >
                            {{ $item->description }}
                        </p>
                    @endif

                </div>

            @endforeach

        </div>

    </div>
</section>
@endif



{{-- =========================================================
     PRODUCT CATEGORIES
========================================================= --}}
@if($homepage->show_categories)
<section
    id="products"
    class="bg-[#f6f6f3]
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-8"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div
            class="flex flex-col gap-4
                   sm:flex-row
                   sm:items-end
                   sm:justify-between"
        >

            <div>

                <p
                    class="text-[9px]
                           font-bold uppercase
                           tracking-[0.18em]
                           text-orange-600"
                >
                    {{ $homepage->categories_badge ?: 'Our Products' }}
                </p>


                <h2
                    class="mt-1.5
                           text-[28px] sm:text-[34px]
                           lg:text-[36px]
                           font-black
                           tracking-[-0.035em]
                           text-slate-950"
                >
                    {{ $homepage->categories_title ?: 'Product Categories' }}
                </h2>


                @if(!empty($homepage->categories_description))
                    <p
                        class="mt-3
                               max-w-2xl
                               text-[13px]
                               leading-6
                               text-slate-600"
                    >
                        {{ $homepage->categories_description }}
                    </p>
                @endif

            </div>


            <a
                href="{{ route('products') }}"
                class="inline-flex items-center gap-2
                       text-[11px]
                       font-bold
                       text-slate-600
                       transition
                       hover:text-orange-600"
            >
                {{ $homepage->categories_button_text ?: 'View all categories' }}
                <span>→</span>
            </a>

        </div>


        <div
            class="mt-7 grid
                   gap-4
                   sm:grid-cols-2
                   lg:grid-cols-3"
        >

            @forelse($homeCategories as $category)

                @php
                    $categoryImage = optional($category->products->first())->image;
                @endphp

                <a
                    href="{{ route('products', ['category' => $category->slug]) }}"
                    class="group
                           overflow-hidden
                           rounded-[20px]
                           border border-slate-200
                           bg-white
                           transition duration-300
                           hover:-translate-y-1
                           hover:shadow-[0_16px_36px_rgba(15,23,42,0.08)]"
                >

                    <div class="relative h-[150px] overflow-hidden bg-slate-100 lg:h-[165px]">

                        @if($categoryImage)
                            <img
                                src="{{ asset($categoryImage) }}"
                                alt="{{ $category->name }}"
                                class="absolute inset-0
                                       h-full w-full
                                       object-cover object-center
                                       transition-transform duration-500
                                       group-hover:scale-[1.04]"
                            >
                        @else
                            <div class="absolute inset-0 bg-gradient-to-br from-slate-100 to-slate-200"></div>
                        @endif

                        <div
                            class="absolute inset-x-0 bottom-0
                                   h-16
                                   bg-gradient-to-t
                                   from-black/35 to-transparent"
                        ></div>

                    </div>


                    <div class="p-4">

                        <h3
                            class="text-[15px]
                                   font-bold
                                   text-slate-950"
                        >
                            {{ $category->name }}
                        </h3>

                        <p
                            class="mt-1.5
                                   line-clamp-2
                                   text-[11px]
                                   leading-5
                                   text-slate-500"
                        >
                            {{ $category->description ?: 'Explore products available in this category.' }}
                        </p>


                        <div
                            class="mt-3
                                   flex items-center justify-between
                                   border-t border-slate-100
                                   pt-3"
                        >
                            <span class="text-[10px] font-semibold text-slate-500">
                                View Products
                            </span>

                            <span class="text-[13px] transition-transform group-hover:translate-x-1">
                                →
                            </span>
                        </div>

                    </div>

                </a>

            @empty

                <div
                    class="sm:col-span-2 lg:col-span-3
                           rounded-[22px]
                           border border-dashed border-slate-300
                           bg-white
                           p-8
                           text-center
                           text-[13px]
                           text-slate-500"
                >
                    No active categories available.
                </div>

            @endforelse

        </div>

    </div>
</section>
@endif



{{-- =========================================================
     FEATURED PRODUCTS
========================================================= --}}
@if($homepage->show_products)
<section
    class="home-reveal-section bg-white
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-9"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            <span
                class="inline-flex rounded-full
                       bg-orange-50
                       px-4 py-2
                       text-[9px]
                       font-bold uppercase
                       tracking-[0.16em]
                       text-orange-600"
            >
                {{ $homepage->products_badge ?: 'FEATURED PRODUCTS' }}
            </span>


            <h2
                class="mt-4
                       text-[28px] sm:text-[34px]
                       lg:text-[36px]
                       font-black
                       tracking-[-0.035em]
                       text-slate-950"
            >
                {{ $homepage->products_title ?: 'Featured Hardware' }}
            </h2>


            @if(!empty($homepage->products_description))
                <p
                    class="mt-3
                           text-[13px]
                           leading-6
                           text-slate-600"
                >
                    {{ $homepage->products_description }}
                </p>
            @endif

        </div>


        <div
            class="mt-7 grid
                   gap-4
                   md:grid-cols-2
                   lg:grid-cols-3"
        >

            @forelse($homeFeaturedProducts as $product)

                <a
                    href="{{ route('product.detail', ['slug' => $product->slug]) }}"
                    class="group
                           overflow-hidden
                           rounded-[20px]
                           border border-slate-200
                           bg-white
                           transition duration-300
                           hover:-translate-y-1
                           hover:shadow-[0_16px_36px_rgba(15,23,42,0.08)]"
                >

                    <div
                        class="relative
                               h-[250px]
                               overflow-hidden
                               bg-slate-100
                               lg:h-[270px]"
                    >
                        <img
                            src="{{ asset($product->image) }}"
                            alt="{{ $product->name }}"
                            loading="lazy"
                            class="absolute inset-0
                                   h-full w-full
                                   object-cover object-center
                                   transition-transform duration-500
                                   group-hover:scale-[1.04]"
                        >

                        <div
                            class="absolute inset-x-0 bottom-0
                                   h-20
                                   bg-gradient-to-t
                                   from-black/20 to-transparent"
                        ></div>
                    </div>


                    <div class="p-4">

                        <p
                            class="text-[8px]
                                   font-bold uppercase
                                   tracking-[0.14em]
                                   text-orange-600"
                        >
                            {{ $product->category?->name }}
                        </p>


                        <h3
                            class="mt-1.5
                                   line-clamp-2
                                   text-[14px]
                                   font-bold
                                   leading-5
                                   text-slate-950"
                        >
                            {{ $product->name }}
                        </h3>


                        <p
                            class="mt-2
                                   line-clamp-2
                                   text-[11px]
                                   leading-5
                                   text-slate-500"
                        >
                            {{ $product->description ?: 'Contact M R Hardware for model-wise specifications and availability.' }}
                        </p>


                        <div
                            class="mt-3
                                   flex items-center justify-between
                                   border-t border-slate-100
                                   pt-3"
                        >
                            <span class="text-[10px] font-semibold text-slate-500">
                                View Details
                            </span>

                            <span class="text-[13px] transition-transform group-hover:translate-x-1">
                                →
                            </span>
                        </div>

                    </div>

                </a>

            @empty

                <div
                    class="md:col-span-2 lg:col-span-3
                           rounded-[22px]
                           border border-dashed border-slate-300
                           bg-slate-50
                           p-8
                           text-center
                           text-[13px]
                           text-slate-500"
                >
                    No featured products available.
                </div>

            @endforelse

        </div>


        @if($featuredProducts->count() > ($homepage->products_limit ?: 3))
            <div class="mt-6 text-center">
                <a
                    href="{{ route('products') }}"
                    class="inline-flex min-h-[42px]
                           items-center justify-center
                           rounded-xl
                           bg-slate-950
                           px-5
                           text-[11px]
                           font-bold
                           text-white
                           transition
                           hover:bg-orange-600"
                >
                    {{ $homepage->products_button_text ?: 'View All Products' }}
                </a>
            </div>
        @endif

    </div>
</section>
@endif



{{-- =========================================================
     ABOUT
========================================================= --}}
@if($homepage->show_about)
<section
    class="home-reveal-section bg-[#f6f6f3]
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div
            class="grid items-center
                   gap-8 lg:gap-10
                   lg:grid-cols-[.95fr_1.05fr]"
        >

            <div class="relative">

                <div
                    class="relative
                           h-[340px]
                           overflow-hidden
                           rounded-[24px]
                           bg-slate-200
                           shadow-xl
                           sm:h-[430px]
                           lg:h-[470px]"
                >
                    <img
                        src="{{ asset($homepage->about_image ?: 'images/Homepage/about/company.jpg') }}"
                        alt="{{ $homepage->about_title ?: 'M R Hardware' }}"
                        class="absolute inset-0
                               h-full w-full
                               object-cover object-center"
                    >
                </div>


                <div
                    class="absolute bottom-4 right-4
                           rounded-2xl
                           bg-orange-600
                           px-4 py-3
                           text-white
                           shadow-xl"
                >
                    <p class="text-[17px] font-black">
                        {{ $homepage->hero_floating_title ?: 'Since 2014' }}
                    </p>
                    <p class="text-[10px] text-orange-100">
                        {{ $homepage->hero_floating_text ?: ($site?->company_name ?: 'M R Hardware') }}
                    </p>
                </div>

            </div>


            <div>

                @if(!empty($homepage->about_badge))
                    <span
                        class="inline-flex rounded-full
                               bg-orange-50
                               px-4 py-2
                               text-[9px]
                               font-bold uppercase
                               tracking-[0.16em]
                               text-orange-600"
                    >
                        {{ $homepage->about_badge }}
                    </span>
                @endif


                <h2
                    class="mt-4
                           text-[29px] sm:text-[35px]
                           lg:text-[39px]
                           font-black
                           leading-[1.1]
                           tracking-[-0.035em]
                           text-slate-950"
                >
                    {{ $homepage->about_title ?: 'About M R Hardware' }}
                </h2>


                @if(!empty($homepage->about_description))
                    <p
                        class="mt-4
                               whitespace-pre-line
                               text-[13px]
                               leading-6
                               text-slate-600
                               lg:line-clamp-5"
                    >
                        {{ $homepage->about_description }}
                    </p>
                @endif


                <div
                    class="mt-5 grid
                           grid-cols-2
                           gap-3"
                >

                    @foreach($aboutFeatures as $feature)
                        <div
                            class="flex items-center gap-3
                                   rounded-xl
                                   border border-slate-200
                                   bg-white
                                   px-3 py-3"
                        >
                            <div
                                class="flex h-8 w-8
                                       shrink-0
                                       items-center justify-center
                                       rounded-full
                                       bg-orange-50
                                       text-[11px]
                                       font-bold
                                       text-orange-600"
                            >
                                ✓
                            </div>

                            <span class="text-[11px] font-semibold text-slate-700">
                                {{ $feature }}
                            </span>
                        </div>
                    @endforeach

                </div>


                <a
                    href="{{ route('about') }}"
                    class="mt-5 inline-flex
                           min-h-[42px]
                           items-center justify-center
                           rounded-xl
                           bg-orange-600
                           px-5
                           text-[11px]
                           font-bold
                           text-white
                           transition
                           hover:bg-orange-500"
                >
                    {{ $homepage->about_button_text ?: 'Learn More' }}
                </a>

            </div>

        </div>

    </div>
</section>
@endif



{{-- =========================================================
     COMPANY STATS
========================================================= --}}
@if($statsSection && $statsItems->isNotEmpty())
<section
    class="home-reveal-section bg-slate-950
           py-12 sm:py-14
           text-white
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            @if($statsSection->badge)
                <span
                    class="inline-flex rounded-full
                           bg-orange-600
                           px-4 py-2
                           text-[9px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-white"
                >
                    {{ $statsSection->badge }}
                </span>
            @endif


            <h2
                class="mt-4
                       text-[28px] sm:text-[34px]
                       lg:text-[38px]
                       font-black
                       tracking-[-0.035em]"
            >
                {{ $statsSection->title }}
            </h2>


            @if($statsSection->description)
                <p
                    class="mt-4
                           text-[13px]
                           leading-6
                           text-slate-400"
                >
                    {{ $statsSection->description }}
                </p>
            @endif

        </div>


        <div
            class="mt-9 grid
                   grid-cols-2
                   gap-4
                   lg:grid-cols-4"
        >

            @foreach($homeStatsItems as $item)

                <div
                    class="rounded-[20px]
                           border border-white/10
                           bg-white/[0.04]
                           px-4 py-6
                           text-center"
                >

                    <div
                        class="text-[30px]
                               sm:text-[36px]
                               font-black
                               text-orange-500"
                    >
                        {{ $item->value }}
                    </div>


                    <h4
                        class="mt-2
                               text-[13px]
                               font-bold
                               text-white"
                    >
                        {{ $item->title }}
                    </h4>


                    @if($item->description)
                        <p
                            class="mt-1.5
                                   text-[10px]
                                   leading-4
                                   text-slate-500"
                        >
                            {{ $item->description }}
                        </p>
                    @endif

                </div>

            @endforeach

        </div>

    </div>
</section>
@endif



{{-- =========================================================
     BRANDS
========================================================= --}}
@if($brandsSection && $brandItems->isNotEmpty())
<section
    class="home-reveal-section relative overflow-hidden
           bg-white
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="w-full">

        <div class="mx-auto max-w-[1180px] px-4 text-center sm:px-6 lg:px-8">

            @if($brandsSection->badge)
                <span
                    class="inline-flex rounded-full
                           bg-orange-50
                           px-4 py-2
                           text-[9px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-orange-600"
                >
                    {{ $brandsSection->badge }}
                </span>
            @endif


            <h2
                class="mt-4
                       text-[28px] sm:text-[34px]
                       lg:text-[38px]
                       font-black
                       tracking-[-0.035em]
                       text-slate-950"
            >
                {{ $brandsSection->title }}
            </h2>


            @if($brandsSection->description)
                <p
                    class="mt-4
                           mx-auto max-w-2xl
                           text-[13px]
                           leading-6
                           text-slate-600"
                >
                    {{ $brandsSection->description }}
                </p>
            @endif

        </div>


        <div class="relative mt-9">

            <div class="pointer-events-none absolute left-0 top-0 z-10 h-full w-20 bg-gradient-to-r from-white to-transparent sm:w-28"></div>
            <div class="pointer-events-none absolute right-0 top-0 z-10 h-full w-20 bg-gradient-to-l from-white to-transparent sm:w-28"></div>


            <div class="brand-marquee overflow-hidden">

                <div class="brand-track">

                    @foreach($brandItems->concat($brandItems) as $brand)

                        <div
                            class="brand-card home-premium-card
                                   flex h-[96px] w-[190px]
                                   shrink-0
                                   items-center justify-center
                                   rounded-[18px]
                                   border border-slate-200
                                   bg-white
                                   px-5"
                        >

                            @if($brand->image)
                                <img
                                    src="{{ asset($brand->image) }}"
                                    alt="{{ $brand->title }}"
                                    class="max-h-12 max-w-[130px] object-contain"
                                >
                            @else
                                <span
                                    class="text-center
                                           text-[15px]
                                           font-black
                                           text-slate-700"
                                >
                                    {{ $brand->title }}
                                </span>
                            @endif

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>
</section>
@endif



{{-- =========================================================
     OUR PROCESS
========================================================= --}}
@if($processSection && $processItems->isNotEmpty())
<section
    class="home-reveal-section bg-[#f6f6f3]
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            @if($processSection->badge)
                <span
                    class="text-[9px]
                           font-bold uppercase
                           tracking-[0.18em]
                           text-orange-600"
                >
                    {{ $processSection->badge }}
                </span>
            @endif


            <h2
                class="mt-2
                       text-[28px] sm:text-[34px]
                       lg:text-[38px]
                       font-black
                       tracking-[-0.035em]
                       text-slate-950"
            >
                {{ $processSection->title }}
            </h2>


            @if($processSection->description)
                <p
                    class="mt-4
                           text-[13px]
                           leading-6
                           text-slate-600"
                >
                    {{ $processSection->description }}
                </p>
            @endif

        </div>


        <div
            class="mt-8 grid
                   gap-4
                   md:grid-cols-2
                   lg:grid-cols-4"
        >

            @foreach($homeProcessItems as $index => $item)

                <div
                    class="rounded-[20px]
                           border border-slate-200
                           bg-white
                           p-5
                           text-center"
                >

                    <div
                        class="mx-auto flex h-12 w-12
                               items-center justify-center
                               rounded-full
                               {{ $index % 2 === 0 ? 'bg-slate-950' : 'bg-orange-600' }}
                               text-[16px]
                               font-black
                               text-white"
                    >
                        {{ $item->value ?: $loop->iteration }}
                    </div>


                    <h3
                        class="mt-4
                               text-[15px]
                               font-bold
                               text-slate-950"
                    >
                        {{ $item->title }}
                    </h3>


                    @if($item->description)
                        <p
                            class="mt-2
                                   text-[11px]
                                   leading-5
                                   text-slate-600"
                        >
                            {{ $item->description }}
                        </p>
                    @endif

                </div>

            @endforeach

        </div>

    </div>
</section>
@endif



{{-- =========================================================
     TESTIMONIALS
========================================================= --}}
@if($testimonialsSection && $testimonialItems->isNotEmpty())
<section
    class="home-reveal-section bg-white
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div class="mx-auto max-w-3xl text-center">

            @if($testimonialsSection->badge)
                <span
                    class="inline-flex rounded-full
                           bg-orange-50
                           px-4 py-2
                           text-[9px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-orange-600"
                >
                    {{ $testimonialsSection->badge }}
                </span>
            @endif


            <h2
                class="mt-4
                       text-[28px] sm:text-[34px]
                       lg:text-[38px]
                       font-black
                       tracking-[-0.035em]
                       text-slate-950"
            >
                {{ $testimonialsSection->title }}
            </h2>


            @if($testimonialsSection->description)
                <p
                    class="mt-4
                           text-[13px]
                           leading-6
                           text-slate-600"
                >
                    {{ $testimonialsSection->description }}
                </p>
            @endif

        </div>


        <div
            class="mt-8 grid
                   gap-4
                   md:grid-cols-2
                   lg:grid-cols-3"
        >

            @foreach($homeTestimonials as $item)

                <div
                    class="rounded-[20px]
                           border border-slate-200
                           bg-[#fafafa]
                           p-5 sm:p-6"
                >

                    @if($item->value)
                        <div
                            class="text-[15px]
                                   text-orange-500"
                        >
                            {{ $item->value }}
                        </div>
                    @endif


                    @if($item->description)
                        <p
                            class="mt-3
                                   line-clamp-5
                                   text-[12px]
                                   leading-6
                                   text-slate-600"
                        >
                            {{ $item->description }}
                        </p>
                    @endif


                    <div
                        class="mt-5
                               flex items-center
                               border-t border-slate-200
                               pt-4"
                    >

                        @if($item->image)
                            <img
                                src="{{ asset($item->image) }}"
                                alt="{{ $item->title }}"
                                class="h-10 w-10
                                       rounded-full
                                       object-cover"
                            >
                        @endif


                        <div class="{{ $item->image ? 'ml-3' : '' }}">

                            <h4
                                class="text-[12px]
                                       font-bold
                                       text-slate-950"
                            >
                                {{ $item->title }}
                            </h4>


                            @if($item->subtitle)
                                <span
                                    class="text-[10px]
                                           text-slate-500"
                                >
                                    {{ $item->subtitle }}
                                </span>
                            @endif

                        </div>

                    </div>

                </div>

            @endforeach

        </div>

    </div>
</section>
@endif



{{-- =========================================================
     CTA
========================================================= --}}
@if($homepage->show_cta)
<section
    class="home-reveal-section relative overflow-hidden
           bg-gradient-to-r from-orange-600 via-orange-500 to-orange-700
           py-12 sm:py-14
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-10"
>

    <div class="absolute -left-20 -top-20 h-80 w-80 rounded-full bg-white/10 blur-3xl"></div>
    <div class="absolute -bottom-20 -right-20 h-96 w-96 rounded-full bg-black/10 blur-3xl"></div>


    <div class="relative mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div
            class="home-cta-card rounded-[28px]
                   border border-white/20
                   bg-white/10
                   px-6 py-10
                   text-center
                   shadow-2xl
                   backdrop-blur
                   sm:px-10 sm:py-12
                   lg:px-14 lg:py-14"
        >

            <span
                class="inline-flex rounded-full
                       bg-white
                       px-4 py-2
                       text-[9px]
                       font-bold uppercase
                       tracking-[0.16em]
                       text-orange-600"
            >
                {{ $homepage->cta_badge ?: "LET'S WORK TOGETHER" }}
            </span>


            <h2
                class="mx-auto mt-5
                       max-w-3xl
                       text-[30px] sm:text-[38px]
                       lg:text-[42px]
                       font-black
                       leading-[1.08]
                       tracking-[-0.04em]
                       text-white"
            >
                {{ $homepage->cta_title ?: 'Looking for Hardware Products?' }}
            </h2>


            @if(!empty($homepage->cta_description))
                <p
                    class="mx-auto mt-4
                           max-w-2xl
                           text-[13px] sm:text-[14px]
                           leading-6
                           text-orange-50"
                >
                    {{ $homepage->cta_description }}
                </p>
            @endif


            <div
                class="mt-7
                       flex flex-wrap
                       justify-center
                       gap-3"
            >

                <a
                    href="{{ $homepage->cta_button_link ?: route('contact') }}"
                    class="inline-flex min-h-[44px]
                           items-center justify-center
                           rounded-xl
                           bg-white
                           px-5
                           text-[12px]
                           font-bold
                           text-orange-600
                           transition
                           hover:scale-[1.02]"
                >
                    {{ $homepage->cta_button_text ?: 'Send Enquiry' }}
                </a>


                <a
                    href="tel:+{{ $phoneHref }}"
                    class="inline-flex min-h-[44px]
                           items-center justify-center
                           rounded-xl
                           border border-white/40
                           px-5
                           text-[12px]
                           font-bold
                           text-white
                           transition
                           hover:bg-white
                           hover:text-orange-600"
                >
                    📞 Call Now
                </a>


                <a
                    href="https://wa.me/{{ $whatsappNumber }}"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex min-h-[44px]
                           items-center justify-center
                           rounded-xl
                           bg-emerald-500
                           px-5
                           text-[12px]
                           font-bold
                           text-white
                           transition
                           hover:bg-emerald-600"
                >
                    💬 WhatsApp
                </a>

            </div>

        </div>

    </div>
</section>
@endif



<style>
    html {
        scroll-behavior: smooth;
    }

    .brand-track {
        display: flex;
        width: max-content;
        gap: 16px;
        animation: homeBrandMarquee 24s linear infinite;
    }

    .brand-marquee:hover .brand-track {
        animation-play-state: paused;
    }

    @keyframes homeBrandMarquee {
        from {
            transform: translateX(0);
        }

        to {
            transform: translateX(-50%);
        }
    }

    @media (prefers-reduced-motion: reduce) {
        .brand-track {
            animation: none;
        }
    }
</style>


{{-- =========================================================
     HOMEPAGE SCROLL + PREMIUM MICRO ANIMATIONS
========================================================= --}}
<style>
    html.home-reveal-ready .home-reveal-section > div {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity .75s cubic-bezier(.22,1,.36,1),
                    transform .75s cubic-bezier(.22,1,.36,1);
    }

    html.home-reveal-ready .home-reveal-section.is-visible > div {
        opacity: 1;
        transform: translateY(0);
    }

    html.home-reveal-ready .home-reveal-item {
        opacity: 0;
        transform: translateY(24px) scale(.985);
        transition: opacity .7s cubic-bezier(.22,1,.36,1),
                    transform .7s cubic-bezier(.22,1,.36,1),
                    box-shadow .35s ease,
                    border-color .35s ease;
    }

    html.home-reveal-ready .home-reveal-item.is-visible {
        opacity: 1;
        transform: translateY(0) scale(1);
    }

    .home-premium-card {
        transition: transform .35s cubic-bezier(.22,1,.36,1),
                    box-shadow .35s ease,
                    border-color .35s ease;
    }

    .home-premium-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 20px 46px rgba(15,23,42,.10);
    }

    .home-dark-card {
        transition: transform .35s cubic-bezier(.22,1,.36,1),
                    background-color .35s ease,
                    border-color .35s ease,
                    box-shadow .35s ease;
    }

    .home-dark-card:hover {
        transform: translateY(-6px);
        background-color: rgba(255,255,255,.07);
        border-color: rgba(249,115,22,.28);
        box-shadow: 0 20px 44px rgba(0,0,0,.20);
    }

    .home-about-image {
        transition: transform .45s cubic-bezier(.22,1,.36,1),
                    box-shadow .45s ease;
    }

    .home-about-image:hover {
        transform: translateY(-5px) scale(1.01);
        box-shadow: 0 24px 54px rgba(15,23,42,.14);
    }

    .home-cta-card {
        transition: transform .4s cubic-bezier(.22,1,.36,1),
                    box-shadow .4s ease;
    }

    .home-cta-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 28px 70px rgba(0,0,0,.18);
    }

    @media (prefers-reduced-motion: reduce) {
        html.home-reveal-ready .home-reveal-section > div,
        html.home-reveal-ready .home-reveal-item {
            opacity: 1 !important;
            transform: none !important;
            transition: none !important;
        }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    if (reduceMotion || !('IntersectionObserver' in window)) {
        document.querySelectorAll('.home-reveal-section, .home-reveal-item')
            .forEach(el => el.classList.add('is-visible'));
        return;
    }

    document.documentElement.classList.add('home-reveal-ready');

    const sectionObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: .12, rootMargin: '0px 0px -7% 0px' });

    document.querySelectorAll('.home-reveal-section')
        .forEach(section => sectionObserver.observe(section));

    const itemObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;

            const parent = entry.target.parentElement;
            const siblings = parent
                ? Array.from(parent.children).filter(el => el.classList.contains('home-reveal-item'))
                : [];

            const index = Math.max(0, siblings.indexOf(entry.target));
            entry.target.style.transitionDelay = `${Math.min(index * 90, 360)}ms`;
            entry.target.classList.add('is-visible');
            observer.unobserve(entry.target);
        });
    }, { threshold: .14, rootMargin: '0px 0px -5% 0px' });

    document.querySelectorAll('.home-reveal-item')
        .forEach(item => itemObserver.observe(item));
});
</script>

@endsection
