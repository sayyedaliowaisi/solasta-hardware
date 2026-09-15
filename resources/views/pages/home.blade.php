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
     Desktop: one complete screen
========================================================= --}}
<section
    class="relative overflow-hidden
           bg-gradient-to-r from-slate-950 via-slate-900 to-[#8a3413]
           text-white
           lg:min-h-[calc(100svh-72px)]
           lg:flex lg:items-center"
>

    <div
        class="absolute inset-0 opacity-40"
        style="
            background-image:
                radial-gradient(circle at 16% 20%, rgba(249,115,22,.48) 0, transparent 28%),
                radial-gradient(circle at 82% 72%, rgba(14,165,233,.22) 0, transparent 30%);
        "
    ></div>

    <div class="absolute inset-0 bg-gradient-to-br from-slate-950/10 via-transparent to-slate-950/45"></div>


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

            {{-- LEFT --}}
            <div class="max-w-2xl">

                @if(!empty($homepage->hero_badge))
                    <span
                        class="inline-flex items-center
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


                <h1
                    class="mt-5
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


                @if(!empty($homepage->hero_description))
                    <p
                        class="mt-5
                               max-w-xl
                               text-[14px] sm:text-[15px]
                               leading-7
                               text-slate-300"
                    >
                        {{ $homepage->hero_description }}
                    </p>
                @endif


                <div class="mt-7 flex flex-wrap gap-3">

                    @if(!empty($homepage->hero_primary_text))
                        <a
                            href="{{ $homepage->hero_primary_link ?: route('products') }}"
                            class="inline-flex min-h-[44px]
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
                            class="inline-flex min-h-[44px]
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


                <div
                    class="mt-7 grid max-w-xl
                           grid-cols-2
                           gap-3 sm:grid-cols-4"
                >

                    <div
                        class="rounded-2xl
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

                    <div
                        class="rounded-2xl
                               border border-white/10
                               bg-white/[0.06]
                               px-4 py-3
                               backdrop-blur"
                    >
                        <p class="text-[20px] font-black text-orange-400">
                            {{ $categories->count() }}
                        </p>
                        <p class="mt-0.5 text-[10px] text-slate-400">Categories</p>
                    </div>

                    <div
                        class="rounded-2xl
                               border border-white/10
                               bg-white/[0.06]
                               px-4 py-3
                               backdrop-blur"
                    >
                        <p class="text-[20px] font-black text-orange-400">
                            {{ $featuredProducts->count() }}+
                        </p>
                        <p class="mt-0.5 text-[10px] text-slate-400">Featured</p>
                    </div>

                    <div
                        class="rounded-2xl
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


            {{-- RIGHT IMAGE --}}
            <div class="relative">

                <div
                    class="relative
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
                        class="absolute inset-0
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
                </div>


                <div
                    class="absolute bottom-4 left-4
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
     WHY CHOOSE US
========================================================= --}}
@if($whySection && $whyItems->isNotEmpty())
<section
    class="bg-white
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
    class="bg-white
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
    class="bg-[#f6f6f3]
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
    class="bg-slate-950
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
    class="relative overflow-hidden
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
                            class="brand-card
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
    class="bg-[#f6f6f3]
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
    class="bg-white
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
    class="relative overflow-hidden
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
            class="rounded-[28px]
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

@endsection
