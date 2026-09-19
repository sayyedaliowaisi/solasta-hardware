@extends('admin.layouts.app')

@section('title', 'Products | Admin')

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Small helper for checking array based CMS fields
    |--------------------------------------------------------------------------
    */

    $hasMeaningfulRows = function ($rows, array $keys = []) {

        if (!is_array($rows) || empty($rows)) {
            return false;
        }

        foreach ($rows as $row) {

            if (!is_array($row)) {
                continue;
            }

            foreach ($keys as $key) {

                if (
                    isset($row[$key])
                    && trim((string) $row[$key]) !== ''
                ) {
                    return true;
                }

            }

        }

        return false;
    };
@endphp


{{-- =========================================================
     HEADER
========================================================= --}}

<div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

    <div>

        <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-600">
            Catalogue
        </p>

        <h1 class="mt-2 text-3xl font-black text-slate-950">
            Products
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Manage product information, media, pricing and product detail content.
        </p>

    </div>


    <a
        href="{{ route('admin.products.create') }}"
        class="inline-flex items-center justify-center gap-2 rounded-xl
               bg-orange-600 px-5 py-3 text-sm font-bold text-white
               transition hover:bg-orange-500"
    >
        <i class="fa-solid fa-plus"></i>

        <span>
            Add Product
        </span>
    </a>

</div>



{{-- =========================================================
     ALERTS
========================================================= --}}

@if(session('success'))

    <div class="mt-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">

        <div class="flex items-start gap-3">

            <i class="fa-solid fa-circle-check mt-0.5"></i>

            <span>
                {{ session('success') }}
            </span>

        </div>

    </div>

@endif


@if(session('error'))

    <div class="mt-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">

        <div class="flex items-start gap-3">

            <i class="fa-solid fa-circle-exclamation mt-0.5"></i>

            <span>
                {{ session('error') }}
            </span>

        </div>

    </div>

@endif



{{-- =========================================================
     FILTER
========================================================= --}}

<div class="mt-7 rounded-2xl border border-slate-200 bg-white p-4 shadow-sm">

    <form
        method="GET"
        class="flex flex-col gap-3 sm:flex-row sm:items-end"
    >

        <div class="w-full sm:max-w-xs">

            <label
                for="category"
                class="mb-2 block text-xs font-black uppercase tracking-wider text-slate-500"
            >
                Category
            </label>

            <select
                id="category"
                name="category"
                onchange="this.form.submit()"
                class="w-full rounded-xl border border-slate-300 bg-white
                       px-4 py-3 text-sm font-bold text-slate-700
                       outline-none transition
                       focus:border-orange-400
                       focus:ring-4 focus:ring-orange-100"
            >

                <option value="">
                    All Categories
                </option>

                @foreach($categories as $category)

                    <option
                        value="{{ $category->id }}"
                        @selected(
                            request('category')
                            == $category->id
                        )
                    >
                        {{ $category->name }}
                    </option>

                @endforeach

            </select>

        </div>


        @if(request()->filled('category'))

            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex min-h-[46px] items-center justify-center
                       rounded-xl border border-slate-300 px-4
                       text-sm font-bold text-slate-600
                       transition hover:bg-slate-50"
            >
                Clear Filter
            </a>

        @endif

    </form>

</div>



{{-- =========================================================
     PRODUCT GRID
========================================================= --}}

<div class="mt-7 grid gap-5 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">

    @forelse($products as $product)

        @php

            /*
            |--------------------------------------------------------------------------
            | Gallery
            |--------------------------------------------------------------------------
            */

            $gallery =
                is_array($product->gallery)
                    ? array_values(
                        array_filter(
                            $product->gallery,
                            fn ($image) =>
                                is_string($image)
                                && trim($image) !== ''
                        )
                    )
                    : [];

            $galleryCount =
                count($gallery);


            /*
            |--------------------------------------------------------------------------
            | Product Types
            |--------------------------------------------------------------------------
            */

            $productTypes =
                is_array($product->product_types)
                    ? array_values(
                        array_filter(
                            $product->product_types,
                            fn ($type) =>
                                is_string($type)
                                && trim($type) !== ''
                        )
                    )
                    : [];

            $productTypeCount =
                count($productTypes);


            /*
            |--------------------------------------------------------------------------
            | Product Detail CMS Status
            |--------------------------------------------------------------------------
            */

            $hasDetailContent =
                trim(
                    (string) (
                        $product->detail_content
                        ?? ''
                    )
                ) !== '';


            $hasDetailFeatures =
                $hasMeaningfulRows(
                    $product->detail_features,
                    [
                        'title',
                        'description',
                    ]
                );


            $hasSpecifications =
                $hasMeaningfulRows(
                    $product->specifications,
                    [
                        'label',
                        'value',
                    ]
                );


            /*
            |--------------------------------------------------------------------------
            | Dimensions
            |--------------------------------------------------------------------------
            */

            $dimensions =
                is_array($product->dimensions)
                    ? $product->dimensions
                    : [];

            $hasDimensions =
                collect([
                    $dimensions['width'] ?? null,
                    $dimensions['height'] ?? null,
                    $dimensions['length'] ?? null,
                    $dimensions['weight'] ?? null,
                ])
                ->contains(
                    fn ($value) =>
                        trim((string) $value) !== ''
                );


            /*
            |--------------------------------------------------------------------------
            | Installation / FAQs
            |--------------------------------------------------------------------------
            */

            $hasInstallation =
                $hasMeaningfulRows(
                    $product->installation_steps,
                    [
                        'title',
                        'description',
                    ]
                );


            $hasFaqs =
                $hasMeaningfulRows(
                    $product->faqs,
                    [
                        'question',
                        'answer',
                    ]
                );


            /*
            |--------------------------------------------------------------------------
            | Count CMS sections
            |--------------------------------------------------------------------------
            */

            $cmsSections = [
                $hasDetailContent || $hasDetailFeatures,
                $hasSpecifications,
                $hasDimensions,
                $hasInstallation,
                $hasFaqs,
            ];

            $completedCmsSections =
                collect($cmsSections)
                    ->filter()
                    ->count();

        @endphp


        <article
            class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-0.5 hover:shadow-md"
        >

            {{-- =================================================
                 IMAGE
            ================================================== --}}

            <div class="relative aspect-[4/5] overflow-hidden bg-slate-100">

                @if(!empty($product->image))

                    <img
                        src="{{ asset($product->image) }}"
                        alt="{{ $product->name }}"
                        loading="lazy"
                        class="h-full w-full object-cover object-center"
                    >

                @else

                    <div class="flex h-full w-full items-center justify-center text-slate-300">

                        <i class="fa-regular fa-image text-5xl"></i>

                    </div>

                @endif


                {{-- STATUS --}}

                <div class="absolute left-3 top-3 flex flex-wrap gap-2">

                    @if($product->is_active)

                        <span class="rounded-full bg-green-600 px-3 py-1 text-[11px] font-black text-white shadow-sm">
                            Active
                        </span>

                    @else

                        <span class="rounded-full bg-slate-700 px-3 py-1 text-[11px] font-black text-white shadow-sm">
                            Hidden
                        </span>

                    @endif


                    @if($product->is_featured)

                        <span class="rounded-full bg-orange-600 px-3 py-1 text-[11px] font-black text-white shadow-sm">
                            Featured
                        </span>

                    @endif

                </div>


                {{-- MEDIA COUNTER --}}

                <div class="absolute bottom-3 right-3">

                    <span
                        class="inline-flex items-center gap-1.5 rounded-full
                               bg-slate-950/80 px-3 py-1.5 text-[11px]
                               font-bold text-white backdrop-blur"
                    >
                        <i class="fa-regular fa-images"></i>

                        {{ 1 + $galleryCount }}/8
                    </span>

                </div>

            </div>



            {{-- =================================================
                 PRODUCT INFORMATION
            ================================================== --}}

            <div class="p-5">

                <p class="text-xs font-bold uppercase tracking-wider text-orange-600">
                    {{ $product->category?->name ?: 'Uncategorized' }}
                </p>


                <h2 class="mt-2 line-clamp-2 min-h-[56px] text-lg font-black text-slate-950">
                    {{ $product->name }}
                </h2>


                {{-- PRICE --}}

                <div class="mt-2 flex items-baseline gap-1">

                    <span class="text-lg font-black text-slate-950">

                        ₹{{ number_format(
                            (float) (
                                $product->price
                                ?? 1000
                            ),
                            0
                        ) }}

                    </span>

                    <span class="text-xs font-semibold text-slate-400">
                        / Piece
                    </span>

                </div>



                {{-- =================================================
                     MEDIA / PRODUCT DATA
                ================================================== --}}

                <div class="mt-4 grid grid-cols-2 gap-2">

                    {{-- GALLERY --}}

                    <div class="rounded-xl bg-slate-50 px-3 py-2.5">

                        <span class="block text-[10px] font-black uppercase tracking-wider text-slate-400">
                            Gallery
                        </span>

                        <strong class="mt-1 block text-xs text-slate-700">
                            {{ $galleryCount }} Additional
                        </strong>

                    </div>


                    {{-- FINISHES --}}

                    <div class="rounded-xl bg-slate-50 px-3 py-2.5">

                        <span class="block text-[10px] font-black uppercase tracking-wider text-slate-400">
                            Finishes
                        </span>

                        <strong class="mt-1 block text-xs text-slate-700">
                            {{ $productTypeCount }}
                        </strong>

                    </div>


                    {{-- RATING --}}

                    <div class="rounded-xl bg-slate-50 px-3 py-2.5">

                        <span class="block text-[10px] font-black uppercase tracking-wider text-slate-400">
                            Rating
                        </span>

                        <strong class="mt-1 block text-xs text-slate-700">

                            {{ number_format(
                                (float) (
                                    $product->rating
                                    ?? 5
                                ),
                                1
                            ) }}

                            / 5

                        </strong>

                    </div>


                    {{-- REVIEWS --}}

                    <div class="rounded-xl bg-slate-50 px-3 py-2.5">

                        <span class="block text-[10px] font-black uppercase tracking-wider text-slate-400">
                            Reviews
                        </span>

                        <strong class="mt-1 block text-xs text-slate-700">
                            {{ (int) ($product->review_count ?? 0) }}
                        </strong>

                    </div>

                </div>



                {{-- =================================================
                     MEDIA BADGES
                ================================================== --}}

                <div class="mt-4 flex flex-wrap gap-2">

                    @if(!empty($product->video))

                        <span
                            class="inline-flex items-center gap-1.5 rounded-full
                                   bg-blue-50 px-3 py-1 text-xs font-bold
                                   text-blue-700"
                        >
                            <i class="fa-solid fa-video"></i>
                            Video
                        </span>

                    @else

                        <span
                            class="inline-flex items-center gap-1.5 rounded-full
                                   bg-slate-100 px-3 py-1 text-xs font-bold
                                   text-slate-500"
                        >
                            <i class="fa-solid fa-video-slash"></i>
                            No Video
                        </span>

                    @endif


                    @if($galleryCount >= 7)

                        <span
                            class="inline-flex items-center gap-1.5 rounded-full
                                   bg-green-50 px-3 py-1 text-xs font-bold
                                   text-green-700"
                        >
                            <i class="fa-solid fa-circle-check"></i>
                            Gallery 8/8
                        </span>

                    @elseif($galleryCount > 0)

                        <span
                            class="inline-flex items-center gap-1.5 rounded-full
                                   bg-amber-50 px-3 py-1 text-xs font-bold
                                   text-amber-700"
                        >
                            <i class="fa-regular fa-images"></i>

                            Images {{ 1 + $galleryCount }}/8
                        </span>

                    @endif

                </div>



                {{-- =================================================
                     DETAIL CMS STATUS
                ================================================== --}}

                <div class="mt-5 border-t border-slate-100 pt-4">

                    <div class="flex items-center justify-between gap-3">

                        <span class="text-xs font-black uppercase tracking-wider text-slate-500">
                            Detail CMS
                        </span>


                        @if($completedCmsSections === 5)

                            <span class="rounded-full bg-green-50 px-2.5 py-1 text-[10px] font-black text-green-700">
                                5/5 Added
                            </span>

                        @elseif($completedCmsSections > 0)

                            <span class="rounded-full bg-amber-50 px-2.5 py-1 text-[10px] font-black text-amber-700">
                                {{ $completedCmsSections }}/5 Added
                            </span>

                        @else

                            <span class="rounded-full bg-slate-100 px-2.5 py-1 text-[10px] font-black text-slate-500">
                                Using Fallback
                            </span>

                        @endif

                    </div>


                    {{-- =================================================
                         DETAIL CMS INDICATORS
                    ================================================== --}}

                    <div class="mt-4 grid grid-cols-5 gap-2">

                        {{-- PRODUCT DETAIL --}}
                        <div
                            title="Product Detail"
                            class="flex h-10 items-center justify-center rounded-xl border transition
                                   {{ ($hasDetailContent || $hasDetailFeatures)
                                        ? 'border-green-200 bg-green-50 text-green-600'
                                        : 'border-slate-200 bg-slate-50 text-slate-400' }}"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-4 w-4"
                                aria-hidden="true"
                            >
                                <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/>
                                <path d="M14 2v6h6"/>
                                <path d="M8 13h8"/>
                                <path d="M8 17h8"/>
                            </svg>
                        </div>


                        {{-- SPECIFICATIONS --}}
                        <div
                            title="Specifications"
                            class="flex h-10 items-center justify-center rounded-xl border transition
                                   {{ $hasSpecifications
                                        ? 'border-green-200 bg-green-50 text-green-600'
                                        : 'border-slate-200 bg-slate-50 text-slate-400' }}"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-4 w-4"
                                aria-hidden="true"
                            >
                                <path d="M9 6h11"/>
                                <path d="M9 12h11"/>
                                <path d="M9 18h11"/>
                                <path d="M4 6h.01"/>
                                <path d="M4 12h.01"/>
                                <path d="M4 18h.01"/>
                            </svg>
                        </div>


                        {{-- DIMENSIONS --}}
                        <div
                            title="Dimensions"
                            class="flex h-10 items-center justify-center rounded-xl border transition
                                   {{ $hasDimensions
                                        ? 'border-green-200 bg-green-50 text-green-600'
                                        : 'border-slate-200 bg-slate-50 text-slate-400' }}"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-4 w-4"
                                aria-hidden="true"
                            >
                                <path d="M21 3 3 21"/>
                                <path d="m15 3 6 6"/>
                                <path d="m3 15 6 6"/>
                                <path d="m17 5-2 2"/>
                                <path d="m13 9-2 2"/>
                                <path d="m9 13-2 2"/>
                            </svg>
                        </div>


                        {{-- INSTALLATION --}}
                        <div
                            title="Installation Guide"
                            class="flex h-10 items-center justify-center rounded-xl border transition
                                   {{ $hasInstallation
                                        ? 'border-green-200 bg-green-50 text-green-600'
                                        : 'border-slate-200 bg-slate-50 text-slate-400' }}"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-4 w-4"
                                aria-hidden="true"
                            >
                                <path d="m14.7 6.3 3-3a2.1 2.1 0 0 1 3 3l-3 3"/>
                                <path d="m8.7 12.3-6 6a2.1 2.1 0 0 0 3 3l6-6"/>
                                <path d="m8 8 8 8"/>
                                <path d="m5 3 4 4"/>
                                <path d="m15 17 4 4"/>
                            </svg>
                        </div>


                        {{-- FAQS --}}
                        <div
                            title="FAQs"
                            class="flex h-10 items-center justify-center rounded-xl border transition
                                   {{ $hasFaqs
                                        ? 'border-green-200 bg-green-50 text-green-600'
                                        : 'border-slate-200 bg-slate-50 text-slate-400' }}"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 24 24"
                                fill="none"
                                stroke="currentColor"
                                stroke-width="2"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                class="h-4 w-4"
                                aria-hidden="true"
                            >
                                <circle cx="12" cy="12" r="10"/>
                                <path d="M9.1 9a3 3 0 1 1 5.83 1c0 2-3 2-3 4"/>
                                <path d="M12 18h.01"/>
                            </svg>
                        </div>

                    </div>
                    </div>

                </div>



                {{-- =================================================
     ACTIONS
================================================== --}}

<div class="mt-5 flex items-center gap-2">

    {{-- EDIT --}}
    <a
        href="{{ route('admin.products.edit', $product) }}"
        class="inline-flex min-h-11 flex-1 items-center justify-center gap-2
               rounded-lg border border-slate-300 px-3 py-2.5
               text-center text-xs font-bold text-slate-700
               transition hover:bg-slate-50"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="none"
            stroke="currentColor"
            stroke-width="2"
            class="h-4 w-4"
        >
            <path d="M12 20h9"/>
            <path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4Z"/>
        </svg>

        <span>Edit</span>
    </a>


    {{-- PUBLIC VIEW --}}
    @if($product->is_active)

        <a
            href="{{ route('product.detail', ['slug' => $product->slug]) }}"
            target="_blank"
            rel="noopener noreferrer"
            title="View product"
            aria-label="View product"
            class="inline-flex h-11 w-11 shrink-0 items-center
                   justify-center rounded-lg border border-blue-200
                   bg-blue-50 text-blue-600 transition
                   hover:bg-blue-100"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="h-4 w-4"
            >
                <path d="M15 3h6v6"/>
                <path d="M10 14 21 3"/>
                <path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/>
            </svg>
        </a>

    @endif


    {{-- DELETE --}}
    <form
        method="POST"
        action="{{ route('admin.products.destroy', $product) }}"
        class="m-0 inline-block w-auto shrink-0 p-0"
        onsubmit="return confirm('Delete this product? This action cannot be undone.');"
    >
        @csrf
        @method('DELETE')

        <button
            type="submit"
            title="Delete product"
            aria-label="Delete product"
            class="inline-flex h-11 w-11 cursor-pointer
                   items-center justify-center rounded-lg
                   border border-red-200 bg-red-50
                   p-0 text-red-600 transition
                   hover:bg-red-100"
        >
            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="h-4 w-4"
            >
                <path d="M3 6h18"/>
                <path d="M8 6V4h8v2"/>
                <path d="M19 6l-1 14H6L5 6"/>
                <path d="M10 11v5"/>
                <path d="M14 11v5"/>
            </svg>
        </button>

    </form>

</div>
            </div>

        </article>


    @empty

        <div
            class="col-span-full rounded-2xl border border-dashed
                   border-slate-300 bg-white p-12 text-center"
        >

            <div
                class="mx-auto flex h-14 w-14 items-center
                       justify-center rounded-2xl bg-slate-100
                       text-slate-400"
            >
                <i class="fa-solid fa-box-open text-xl"></i>
            </div>

            <h2 class="mt-4 text-lg font-black text-slate-800">
                No products found
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Add a product or select another category.
            </p>

            <a
                href="{{ route('admin.products.create') }}"
                class="mt-5 inline-flex rounded-xl bg-orange-600
                       px-5 py-3 text-sm font-bold text-white
                       transition hover:bg-orange-500"
            >
                + Add Product
            </a>

        </div>

    @endforelse

</div>



{{-- =========================================================
     PAGINATION
========================================================= --}}

@if($products->hasPages())

    <div class="mt-8">
        {{ $products->withQueryString()->links() }}
    </div>

@endif

@endsection