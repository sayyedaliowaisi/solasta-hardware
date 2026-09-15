@extends('admin.layouts.app')

@section('title', 'Dashboard | M R Hardware Admin')

@section('content')

<div class="space-y-8">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}

    <section
        class="flex flex-col gap-4
               sm:flex-row sm:items-end sm:justify-between"
    >

        <div>

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-orange-600"
            >
                Dashboard
            </p>

            <h1
                class="mt-2
                       text-3xl sm:text-4xl
                       font-black
                       tracking-[-0.035em]
                       text-slate-950"
            >
                Welcome back,
                {{ auth('admin')->user()->name }}
            </h1>

            <p
                class="mt-3
                       max-w-2xl
                       text-sm
                       leading-6
                       text-slate-500"
            >
                Manage products, website content and customer enquiries
                from the M R Hardware admin panel.
            </p>

        </div>


        <a
            href="{{ route('home') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="inline-flex
                   min-h-[44px]
                   items-center
                   justify-center
                   gap-2
                   rounded-xl
                   bg-slate-950
                   px-5
                   text-sm
                   font-bold
                   text-white
                   transition
                   hover:bg-slate-800"
        >
            View Website
            <span>↗</span>
        </a>

    </section>



    {{-- =========================================================
        MAIN STATS
    ========================================================== --}}

    <section
        class="grid gap-5
               sm:grid-cols-2
               xl:grid-cols-4"
    >

        {{-- PRODUCTS --}}

        <a
            href="{{ route('admin.products.index') }}"
            class="group
                   rounded-[22px]
                   border border-slate-200
                   bg-white
                   p-5
                   shadow-sm
                   transition
                   hover:-translate-y-0.5
                   hover:border-orange-200
                   hover:shadow-lg"
        >

            <div class="flex items-start justify-between gap-4">

                <div>

                    <p class="text-xs font-bold text-slate-500">
                        Total Products
                    </p>

                    <p
                        class="mt-3
                               text-4xl
                               font-black
                               tracking-tight
                               text-slate-950"
                    >
                        {{ $productCount }}
                    </p>

                    <p
                        class="mt-2
                               text-[11px]
                               font-semibold
                               text-slate-400"
                    >
                        {{ $activeProductCount }} active
                        ·
                        {{ $featuredProductCount }} featured
                    </p>

                </div>


                <div
                    class="flex h-11 w-11
                           shrink-0
                           items-center
                           justify-center
                           rounded-xl
                           bg-orange-50
                           text-orange-600
                           transition
                           group-hover:bg-orange-600
                           group-hover:text-white"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-5 w-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3.75 7.5 12 3l8.25 4.5L12 12 3.75 7.5Zm0 4.5L12 16.5l8.25-4.5M3.75 16.5 12 21l8.25-4.5"
                        />
                    </svg>

                </div>

            </div>

        </a>



        {{-- CATEGORIES --}}

        <a
            href="{{ route('admin.categories.index') }}"
            class="group
                   rounded-[22px]
                   border border-slate-200
                   bg-white
                   p-5
                   shadow-sm
                   transition
                   hover:-translate-y-0.5
                   hover:border-blue-200
                   hover:shadow-lg"
        >

            <div class="flex items-start justify-between gap-4">

                <div>

                    <p class="text-xs font-bold text-slate-500">
                        Categories
                    </p>

                    <p
                        class="mt-3
                               text-4xl
                               font-black
                               tracking-tight
                               text-slate-950"
                    >
                        {{ $categoryCount }}
                    </p>

                    <p
                        class="mt-2
                               text-[11px]
                               font-semibold
                               text-slate-400"
                    >
                        {{ $activeCategoryCount }} active categories
                    </p>

                </div>


                <div
                    class="flex h-11 w-11
                           shrink-0
                           items-center
                           justify-center
                           rounded-xl
                           bg-blue-50
                           text-blue-600
                           transition
                           group-hover:bg-blue-600
                           group-hover:text-white"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-5 w-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4.5 4.5h6v6h-6v-6Zm9 0h6v6h-6v-6Zm-9 9h6v6h-6v-6Zm9 0h6v6h-6v-6Z"
                        />
                    </svg>

                </div>

            </div>

        </a>



        {{-- ENQUIRIES --}}

        <a
            href="{{ route('admin.enquiries.index') }}"
            class="group
                   rounded-[22px]
                   border border-slate-200
                   bg-white
                   p-5
                   shadow-sm
                   transition
                   hover:-translate-y-0.5
                   hover:border-violet-200
                   hover:shadow-lg"
        >

            <div class="flex items-start justify-between gap-4">

                <div>

                    <p class="text-xs font-bold text-slate-500">
                        Enquiries
                    </p>

                    <p
                        class="mt-3
                               text-4xl
                               font-black
                               tracking-tight
                               text-slate-950"
                    >
                        {{ $enquiryCount }}
                    </p>

                    <p
                        class="mt-2
                               text-[11px]
                               font-semibold
                               {{ $newEnquiryCount > 0
                                    ? 'text-violet-600'
                                    : 'text-slate-400' }}"
                    >
                        {{ $newEnquiryCount }} new enquiries
                    </p>

                </div>


                <div
                    class="flex h-11 w-11
                           shrink-0
                           items-center
                           justify-center
                           rounded-xl
                           bg-violet-50
                           text-violet-600
                           transition
                           group-hover:bg-violet-600
                           group-hover:text-white"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.8"
                        stroke="currentColor"
                        class="h-5 w-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M21.75 6.75v10.5A2.25 2.25 0 0 1 19.5 19.5h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0L12 13.5 2.25 6.75"
                        />
                    </svg>

                </div>

            </div>

        </a>



        {{-- WEBSITE --}}

        <a
            href="{{ route('home') }}"
            target="_blank"
            rel="noopener noreferrer"
            class="group
                   rounded-[22px]
                   border border-slate-200
                   bg-white
                   p-5
                   shadow-sm
                   transition
                   hover:-translate-y-0.5
                   hover:border-emerald-200
                   hover:shadow-lg"
        >

            <div class="flex items-start justify-between gap-4">

                <div>

                    <p class="text-xs font-bold text-slate-500">
                        Website
                    </p>

                    <div class="mt-3 flex items-center gap-2">

                        <span
                            class="h-2.5 w-2.5
                                   rounded-full
                                   bg-emerald-500"
                        ></span>

                        <p
                            class="text-xl
                                   font-black
                                   text-emerald-600"
                        >
                            Active
                        </p>

                    </div>

                    <p
                        class="mt-2
                               text-[11px]
                               font-semibold
                               text-slate-400"
                    >
                        Public frontend available
                    </p>

                </div>


                <div
                    class="flex h-11 w-11
                           shrink-0
                           items-center
                           justify-center
                           rounded-xl
                           bg-emerald-50
                           text-emerald-600
                           transition
                           group-hover:bg-emerald-600
                           group-hover:text-white"
                >
                    ↗
                </div>

            </div>

        </a>

    </section>



    {{-- =========================================================
        ENQUIRY STATUS
    ========================================================== --}}

    <section
        class="rounded-[24px]
               border border-slate-200
               bg-white
               p-5
               shadow-sm
               sm:p-6"
    >

        <div>

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-violet-600"
            >
                Enquiry Overview
            </p>

            <h2
                class="mt-2
                       text-2xl
                       font-black
                       tracking-[-0.025em]
                       text-slate-950"
            >
                Customer Enquiry Status
            </h2>

        </div>


        <div
            class="mt-6
                   grid gap-4
                   grid-cols-2
                   lg:grid-cols-4"
        >

            <div class="rounded-2xl bg-orange-50 p-5">

                <p class="text-xs font-bold text-orange-600">
                    New
                </p>

                <p class="mt-2 text-3xl font-black text-slate-950">
                    {{ $newEnquiryCount }}
                </p>

            </div>


            <div class="rounded-2xl bg-blue-50 p-5">

                <p class="text-xs font-bold text-blue-600">
                    Read
                </p>

                <p class="mt-2 text-3xl font-black text-slate-950">
                    {{ $readEnquiryCount }}
                </p>

            </div>


            <div class="rounded-2xl bg-violet-50 p-5">

                <p class="text-xs font-bold text-violet-600">
                    Contacted
                </p>

                <p class="mt-2 text-3xl font-black text-slate-950">
                    {{ $contactedEnquiryCount }}
                </p>

            </div>


            <div class="rounded-2xl bg-emerald-50 p-5">

                <p class="text-xs font-bold text-emerald-600">
                    Closed
                </p>

                <p class="mt-2 text-3xl font-black text-slate-950">
                    {{ $closedEnquiryCount }}
                </p>

            </div>

        </div>

    </section>



    {{-- =========================================================
        RECENT ACTIVITY
    ========================================================== --}}

    <section class="grid gap-6 xl:grid-cols-2">


        {{-- RECENT ENQUIRIES --}}

        <div
            class="rounded-[24px]
                   border border-slate-200
                   bg-white
                   shadow-sm
                   overflow-hidden"
        >

            <div
                class="flex items-center
                       justify-between
                       border-b border-slate-100
                       px-5 py-5
                       sm:px-6"
            >

                <div>

                    <p
                        class="text-[10px]
                               font-black uppercase
                               tracking-[0.18em]
                               text-orange-600"
                    >
                        Latest
                    </p>

                    <h2
                        class="mt-1
                               text-xl
                               font-black
                               text-slate-950"
                    >
                        Recent Enquiries
                    </h2>

                </div>


                <a
                    href="{{ route('admin.enquiries.index') }}"
                    class="text-xs
                           font-black
                           text-orange-600
                           hover:text-orange-700"
                >
                    View All →
                </a>

            </div>


            <div class="divide-y divide-slate-100">

                @forelse($recentEnquiries as $enquiry)

                    <a
                        href="{{ route('admin.enquiries.show', $enquiry) }}"
                        class="flex
                               items-center
                               justify-between
                               gap-4
                               px-5 py-4
                               transition
                               hover:bg-slate-50
                               sm:px-6"
                    >

                        <div class="min-w-0">

                            <p
                                class="truncate
                                       text-sm
                                       font-black
                                       text-slate-900"
                            >
                                {{ $enquiry->name }}
                            </p>

                            <p
                                class="mt-1
                                       truncate
                                       text-xs
                                       text-slate-500"
                            >
                                {{ $enquiry->product ?: 'General Enquiry' }}
                            </p>

                        </div>


                        <div class="shrink-0 text-right">

                            <span
                                @class([
                                    'inline-flex rounded-full px-2.5 py-1 text-[9px] font-black uppercase',

                                    'bg-orange-100 text-orange-700'
                                        => $enquiry->status === 'new',

                                    'bg-blue-100 text-blue-700'
                                        => $enquiry->status === 'read',

                                    'bg-violet-100 text-violet-700'
                                        => $enquiry->status === 'contacted',

                                    'bg-emerald-100 text-emerald-700'
                                        => $enquiry->status === 'closed',
                                ])
                            >
                                {{ $enquiry->status }}
                            </span>

                            <p
                                class="mt-1
                                       text-[10px]
                                       text-slate-400"
                            >
                                {{ $enquiry->created_at->diffForHumans() }}
                            </p>

                        </div>

                    </a>

                @empty

                    <div class="px-6 py-12 text-center">

                        <p class="text-sm font-bold text-slate-500">
                            No enquiries yet.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>



        {{-- RECENT PRODUCTS --}}

        <div
            class="rounded-[24px]
                   border border-slate-200
                   bg-white
                   shadow-sm
                   overflow-hidden"
        >

            <div
                class="flex items-center
                       justify-between
                       border-b border-slate-100
                       px-5 py-5
                       sm:px-6"
            >

                <div>

                    <p
                        class="text-[10px]
                               font-black uppercase
                               tracking-[0.18em]
                               text-orange-600"
                    >
                        Catalogue
                    </p>

                    <h2
                        class="mt-1
                               text-xl
                               font-black
                               text-slate-950"
                    >
                        Recent Products
                    </h2>

                </div>


                <a
                    href="{{ route('admin.products.index') }}"
                    class="text-xs
                           font-black
                           text-orange-600
                           hover:text-orange-700"
                >
                    View All →
                </a>

            </div>


            <div class="divide-y divide-slate-100">

                @forelse($recentProducts as $product)

                    <a
                        href="{{ route('admin.products.edit', $product) }}"
                        class="flex
                               items-center
                               gap-4
                               px-5 py-4
                               transition
                               hover:bg-slate-50
                               sm:px-6"
                    >

                        <div
                            class="flex h-12 w-12
                                   shrink-0
                                   items-center
                                   justify-center
                                   overflow-hidden
                                   rounded-xl
                                   bg-slate-100"
                        >

                            @if($product->image)

                                <img
                                    src="{{ asset($product->image) }}"
                                    alt="{{ $product->name }}"
                                    class="h-full w-full object-cover"
                                    loading="lazy"
                                >

                            @else

                                <span class="text-slate-400">
                                    ◈
                                </span>

                            @endif

                        </div>


                        <div class="min-w-0 flex-1">

                            <p
                                class="truncate
                                       text-sm
                                       font-black
                                       text-slate-900"
                            >
                                {{ $product->name }}
                            </p>

                            <p
                                class="mt-1
                                       truncate
                                       text-xs
                                       text-slate-500"
                            >
                                {{ $product->category?->name ?? 'No Category' }}
                            </p>

                        </div>


                        <div class="shrink-0">

                            @if($product->is_active)

                                <span
                                    class="rounded-full
                                           bg-emerald-100
                                           px-2.5 py-1
                                           text-[9px]
                                           font-black
                                           uppercase
                                           text-emerald-700"
                                >
                                    Active
                                </span>

                            @else

                                <span
                                    class="rounded-full
                                           bg-slate-100
                                           px-2.5 py-1
                                           text-[9px]
                                           font-black
                                           uppercase
                                           text-slate-500"
                                >
                                    Hidden
                                </span>

                            @endif

                        </div>

                    </a>

                @empty

                    <div class="px-6 py-12 text-center">

                        <p class="text-sm font-bold text-slate-500">
                            No products available.
                        </p>

                    </div>

                @endforelse

            </div>

        </div>

    </section>



    {{-- =========================================================
        QUICK ACTIONS
    ========================================================== --}}

    <section
        class="rounded-[24px]
               border border-slate-200
               bg-white
               p-5
               shadow-sm
               sm:p-6"
    >

        <div>

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-orange-600"
            >
                Quick Actions
            </p>

            <h2
                class="mt-2
                       text-2xl
                       font-black
                       tracking-[-0.025em]
                       text-slate-950"
            >
                Website Management
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Jump directly to the most-used admin sections.
            </p>

        </div>


        @php
            $quickActions = [

                [
                    'title' => 'Products',
                    'description' => 'Add, edit and manage website products.',
                    'route' => route('admin.products.index'),
                    'icon' => '◈',
                ],

                [
                    'title' => 'Categories',
                    'description' => 'Manage product category groups.',
                    'route' => route('admin.categories.index'),
                    'icon' => '▦',
                ],

                [
                    'title' => 'Homepage',
                    'description' => 'Manage homepage content and sections.',
                    'route' => route('admin.homepage.edit'),
                    'icon' => '⌂',
                ],

                [
                    'title' => 'About Page',
                    'description' => 'Manage About page content and sections.',
                    'route' => route('admin.about-page.edit'),
                    'icon' => '◎',
                ],

                [
                    'title' => 'Products Page',
                    'description' => 'Manage products page content.',
                    'route' => route('admin.products-page.edit'),
                    'icon' => '▤',
                ],

                [
                    'title' => 'Product Detail',
                    'description' => 'Manage product detail page content.',
                    'route' => route('admin.product-detail-page.edit'),
                    'icon' => '◇',
                ],

                [
                    'title' => 'Contact Page',
                    'description' => 'Manage contact and enquiry content.',
                    'route' => route('admin.contact-page.edit'),
                    'icon' => '✉',
                ],

                [
                    'title' => 'Enquiries',
                    'description' => 'Review and manage customer enquiries.',
                    'route' => route('admin.enquiries.index'),
                    'icon' => '☏',
                ],

                [
                    'title' => 'Site Settings',
                    'description' => 'Manage company, navbar and footer settings.',
                    'route' => route('admin.settings.edit'),
                    'icon' => '⚙',
                ],

            ];
        @endphp


        <div
            class="mt-6
                   grid gap-4
                   md:grid-cols-2
                   xl:grid-cols-3"
        >

            @foreach($quickActions as $action)

                <a
                    href="{{ $action['route'] }}"
                    class="group
                           rounded-2xl
                           border border-slate-200
                           p-5
                           transition
                           hover:border-orange-300
                           hover:bg-orange-50/40"
                >

                    <div class="flex items-center gap-3">

                        <div
                            class="flex h-9 w-9
                                   items-center
                                   justify-center
                                   rounded-xl
                                   bg-orange-50
                                   text-orange-600
                                   transition
                                   group-hover:bg-orange-600
                                   group-hover:text-white"
                        >
                            {{ $action['icon'] }}
                        </div>

                        <p class="font-black text-slate-900">
                            {{ $action['title'] }}
                        </p>

                    </div>


                    <p
                        class="mt-3
                               text-sm
                               leading-6
                               text-slate-500"
                    >
                        {{ $action['description'] }}
                    </p>


                    <p
                        class="mt-4
                               text-xs
                               font-bold
                               text-orange-600"
                    >
                        Manage →
                    </p>

                </a>

            @endforeach

        </div>

    </section>

</div>

@endsection