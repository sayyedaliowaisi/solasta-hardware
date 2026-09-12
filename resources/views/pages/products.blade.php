@extends('layouts.app')

@section('title', $currentCategory['title'] . ' | M R Hardware')


@section('content')


{{-- =========================================================
    HERO
========================================================= --}}

<section class="relative bg-[#071a2d] text-white overflow-hidden">

    <div
        class="absolute inset-0 opacity-20"
        style="
            background-image:
            radial-gradient(circle at 20% 30%, #f97316 0, transparent 30%),
            radial-gradient(circle at 80% 70%, #0ea5e9 0, transparent 30%);
        "
    ></div>


    <div
        class="relative max-w-7xl mx-auto
               px-4 sm:px-6 lg:px-8
               py-16 lg:py-20"
    >

        <div class="max-w-3xl">

            <p
                class="text-orange-400
                       uppercase
                       tracking-[4px]
                       text-xs sm:text-sm
                       font-bold"
            >
                Product Catalogue
            </p>


            <h1
                class="mt-4
                       text-4xl
                       sm:text-5xl
                       lg:text-6xl
                       font-black
                       tracking-tight"
            >
                {{ $currentCategory['title'] }}
            </h1>


            <p
                class="mt-5
                       text-gray-300
                       text-base sm:text-lg
                       leading-8
                       max-w-2xl"
            >
                {{ $currentCategory['description'] }}
            </p>


            <div
                class="mt-7
                       inline-flex
                       items-center
                       gap-2
                       px-4 py-2
                       rounded-full
                       border border-white/10
                       bg-white/5
                       text-sm
                       text-gray-300"
            >
                <span
                    class="w-2 h-2
                           rounded-full
                           bg-orange-500"
                ></span>

                {{ $currentCategory['product_count'] }}
                Products Available

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    CATEGORY NAVIGATION
========================================================= --}}

<section
    class="sticky
           top-0
           z-30
           bg-white/95
           backdrop-blur
           border-b
           border-gray-200"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div
            class="flex
                   gap-3
                   overflow-x-auto
                   py-4
                   products-category-scroll"
        >

            @foreach($categories as $slug => $category)

                <a
                    href="{{ route('products', ['category' => $slug]) }}"

                    class="
                        flex-none
                        px-5 py-2.5
                        rounded-full
                        text-sm
                        font-bold
                        transition

                        {{ $categorySlug === $slug
                            ? 'bg-orange-600 text-white shadow-lg shadow-orange-600/20'
                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                        }}
                    "
                >

                    {{ $category['title'] }}

                </a>

            @endforeach

        </div>

    </div>

</section>



{{-- =========================================================
    PRODUCTS
========================================================= --}}

<section class="py-16 lg:py-20 bg-[#f7f8fa]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        {{-- HEADER --}}

        <div
            class="flex
                   flex-col
                   md:flex-row
                   md:items-end
                   md:justify-between
                   gap-5
                   mb-10"
        >

            <div>

                <p
                    class="text-orange-600
                           uppercase
                           tracking-[4px]
                           text-xs
                           sm:text-sm
                           font-bold"
                >
                    Our Collection
                </p>


                <h2
                    class="mt-3
                           text-3xl
                           sm:text-4xl
                           lg:text-5xl
                           font-black
                           text-gray-950"
                >
                    {{ $currentCategory['title'] }}
                </h2>

            </div>


            <p class="text-gray-500">

                Showing

                <strong class="text-gray-900">
                    {{ $currentCategory['product_count'] }}
                </strong>

                products

            </p>

        </div>



        {{-- PRODUCT GRID --}}

        @if($currentCategory['products']->count())


            <div
                class="grid
                       grid-cols-2
                       md:grid-cols-3
                       lg:grid-cols-4
                       gap-4
                       sm:gap-6"
            >

                @foreach($currentCategory['products'] as $product)


                    <a
                        href="{{ route('product.detail', ['slug' => $product['slug']]) }}"

                        class="group
                               bg-white
                               rounded-2xl
                               sm:rounded-3xl
                               overflow-hidden
                               border
                               border-gray-200
                               shadow-sm
                               hover:shadow-xl
                               hover:-translate-y-1
                               transition
                               duration-300"
                    >


                        {{-- IMAGE --}}

                        <div
                            class="relative
                                   aspect-square
                                   bg-white
                                   overflow-hidden"
                        >

                            <img
                                src="{{ asset($product['image']) }}"

                                alt="{{ $product['name'] }}"

                                loading="lazy"

                                class="w-full
                                       h-full
                                       object-contain
                                       p-3 sm:p-5
                                       group-hover:scale-105
                                       transition
                                       duration-500"
                            >


                            <div
                                class="absolute
                                       top-3
                                       left-3
                                       px-3
                                       py-1
                                       rounded-full
                                       bg-white/90
                                       backdrop-blur
                                       text-[10px]
                                       sm:text-xs
                                       font-bold
                                       text-gray-800
                                       shadow"
                            >
                                M R Hardware
                            </div>

                        </div>



                        {{-- DETAILS --}}

                        <div class="p-4 sm:p-5">


                            <p
                                class="text-[10px]
                                       sm:text-xs
                                       uppercase
                                       tracking-[2px]
                                       font-bold
                                       text-orange-600"
                            >
                                {{ $currentCategory['title'] }}
                            </p>


                            <h3
                                class="mt-2
                                       text-sm
                                       sm:text-base
                                       lg:text-lg
                                       font-black
                                       text-gray-950
                                       line-clamp-2"
                            >
                                {{ $product['name'] }}
                            </h3>


                            <div
                                class="mt-4
                                       flex
                                       items-center
                                       justify-between
                                       gap-2"
                            >

                                <span
                                    class="text-xs
                                           sm:text-sm
                                           text-gray-500"
                                >
                                    View Product
                                </span>


                                <span
                                    class="w-8 h-8
                                           sm:w-9 sm:h-9
                                           rounded-full
                                           bg-gray-100
                                           flex
                                           items-center
                                           justify-center
                                           group-hover:bg-orange-600
                                           group-hover:text-white
                                           transition"
                                >
                                    →
                                </span>

                            </div>

                        </div>

                    </a>

                @endforeach

            </div>


        @else


            <div
                class="bg-white
                       border
                       border-dashed
                       border-gray-300
                       rounded-3xl
                       p-12
                       text-center"
            >

                <h3
                    class="text-2xl
                           font-black
                           text-gray-900"
                >
                    No products found
                </h3>


                <p class="mt-3 text-gray-500">

                    Product images are not available
                    in this category folder.

                </p>


                <p
                    class="mt-4
                           text-xs
                           text-gray-400
                           break-all"
                >
                    public/images/Products/{{ $currentCategory['folder'] }}
                </p>

            </div>


        @endif


    </div>

</section>



{{-- =========================================================
    CTA
========================================================= --}}

<section class="py-16 lg:py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div
            class="relative
                   overflow-hidden
                   rounded-[32px]
                   bg-[#071a2d]
                   text-white
                   px-6
                   sm:px-10
                   lg:px-14
                   py-12
                   lg:py-14"
        >

            <div
                class="absolute
                       -right-20
                       -top-20
                       w-72
                       h-72
                       rounded-full
                       bg-orange-500/20
                       blur-3xl"
            ></div>


            <div
                class="relative
                       flex
                       flex-col
                       lg:flex-row
                       lg:items-center
                       lg:justify-between
                       gap-8"
            >

                <div class="max-w-2xl">

                    <p
                        class="text-orange-400
                               uppercase
                               tracking-[4px]
                               text-sm
                               font-bold"
                    >
                        Product Enquiry
                    </p>


                    <h2
                        class="mt-3
                               text-3xl
                               sm:text-4xl
                               font-black"
                    >
                        Looking for a particular model?
                    </h2>


                    <p
                        class="mt-4
                               text-gray-300
                               leading-7"
                    >
                        Contact us for model-wise specifications,
                        availability and business enquiries.
                    </p>

                </div>


                <a
                    href="{{ route('contact') }}"

                    class="inline-flex
                           items-center
                           justify-center
                           px-7
                           py-4
                           rounded-full
                           bg-orange-600
                           hover:bg-orange-500
                           font-black
                           transition"
                >
                    Send Enquiry
                </a>

            </div>

        </div>

    </div>

</section>



<style>

.products-category-scroll {
    scrollbar-width: none;
    -ms-overflow-style: none;
}

.products-category-scroll::-webkit-scrollbar {
    display: none;
}

</style>


@endsection