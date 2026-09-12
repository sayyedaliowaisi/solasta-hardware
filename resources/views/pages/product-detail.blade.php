@extends('layouts.app')

@section('title', $product['name'] . ' | M R Hardware')


@section('content')


{{-- =========================================================
    PRODUCT DETAIL
========================================================= --}}

<section class="py-10 lg:py-16 bg-[#f7f8fa]">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        {{-- BREADCRUMB --}}

        <div
            class="flex
                   flex-wrap
                   items-center
                   gap-2
                   text-sm
                   text-gray-500
                   mb-8"
        >

            <a
                href="{{ route('home') }}"
                class="hover:text-orange-600"
            >
                Home
            </a>

            <span>/</span>

            <a
                href="{{ route('products', ['category' => $product['category_slug']]) }}"
                class="hover:text-orange-600"
            >
                {{ $currentCategory['title'] }}
            </a>

            <span>/</span>

            <span class="text-gray-900">
                {{ $product['name'] }}
            </span>

        </div>



        <div
            class="grid
                   lg:grid-cols-2
                   gap-8
                   lg:gap-14
                   items-start"
        >


            {{-- =================================================
                IMAGE
            ================================================= --}}

            <div
                class="bg-white
                       border
                       border-gray-200
                       rounded-[30px]
                       overflow-hidden
                       shadow-sm"
            >

                <div
                    class="aspect-square
                           flex
                           items-center
                           justify-center
                           p-5 sm:p-8"
                >

                    <img
                        src="{{ asset($product['image']) }}"

                        alt="{{ $product['name'] }}"

                        class="w-full
                               h-full
                               object-contain"
                    >

                </div>

            </div>



            {{-- =================================================
                INFO
            ================================================= --}}

            <div class="lg:sticky lg:top-28">


                <p
                    class="text-orange-600
                           uppercase
                           tracking-[4px]
                           text-xs
                           sm:text-sm
                           font-bold"
                >
                    {{ $currentCategory['title'] }}
                </p>


                <h1
                    class="mt-4
                           text-4xl
                           sm:text-5xl
                           lg:text-6xl
                           font-black
                           text-gray-950
                           tracking-tight"
                >
                    {{ $product['name'] }}
                </h1>


                <p
                    class="mt-6
                           text-gray-600
                           text-base
                           sm:text-lg
                           leading-8"
                >
                    Part of the M R Hardware
                    {{ $currentCategory['title'] }}
                    collection.
                    Contact us for model-wise specifications,
                    availability and further product information.
                </p>



                {{-- INFO BOXES --}}

                <div
                    class="grid
                           sm:grid-cols-2
                           gap-4
                           mt-8"
                >


                    <div
                        class="bg-white
                               border
                               border-gray-200
                               rounded-2xl
                               p-5"
                    >

                        <p
                            class="text-xs
                                   uppercase
                                   tracking-[2px]
                                   font-bold
                                   text-gray-400"
                        >
                            Category
                        </p>

                        <p
                            class="mt-2
                                   font-black
                                   text-gray-900"
                        >
                            {{ $currentCategory['title'] }}
                        </p>

                    </div>



                    <div
                        class="bg-white
                               border
                               border-gray-200
                               rounded-2xl
                               p-5"
                    >

                        <p
                            class="text-xs
                                   uppercase
                                   tracking-[2px]
                                   font-bold
                                   text-gray-400"
                        >
                            Brand
                        </p>

                        <p
                            class="mt-2
                                   font-black
                                   text-gray-900"
                        >
                            M R Hardware
                        </p>

                    </div>

                </div>



                {{-- BUTTONS --}}

                <div
                    class="flex
                           flex-col
                           sm:flex-row
                           gap-3
                           mt-8"
                >

                    <a
                        href="{{ route('contact') }}"

                        class="inline-flex
                               items-center
                               justify-center
                               gap-2
                               px-7
                               py-4
                               rounded-full
                               bg-orange-600
                               hover:bg-orange-500
                               text-white
                               font-black
                               transition"
                    >
                        Send Enquiry

                        <span>
                            →
                        </span>
                    </a>


                    <a
                        href="{{ route('products', ['category' => $product['category_slug']]) }}"

                        class="inline-flex
                               items-center
                               justify-center
                               px-7
                               py-4
                               rounded-full
                               border
                               border-gray-300
                               bg-white
                               hover:bg-gray-100
                               text-gray-900
                               font-black
                               transition"
                    >
                        Back to Products
                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

{{-- =========================================================
    PRODUCT DETAILS
========================================================= --}}

<section class="py-16 lg:py-20 bg-white">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <div class="grid lg:grid-cols-[1.35fr_.65fr] gap-8 lg:gap-12">


            {{-- LEFT SIDE --}}
            <div>

                <p
                    class="text-orange-600
                           uppercase
                           tracking-[4px]
                           text-xs
                           sm:text-sm
                           font-bold"
                >
                    Product Information
                </p>


                <h2
                    class="mt-3
                           text-3xl
                           sm:text-4xl
                           lg:text-5xl
                           font-black
                           text-gray-950"
                >
                    Product Details
                </h2>


                <div
                    class="mt-7
                           text-gray-600
                           leading-8
                           text-base
                           sm:text-lg"
                >

                    <p>
                        {{ $product['name'] }}
                        is part of the
                        <strong class="text-gray-900">
                            {{ $currentCategory['title'] }}
                        </strong>
                        collection offered by M R Hardware.
                    </p>


                    <p class="mt-5">
                        This product is available for relevant
                        furniture, interior and hardware applications.
                        For exact model-wise size, finish, specifications
                        and availability, please contact us directly.
                    </p>

                </div>



                {{-- PRODUCT DATA TABLE --}}

                <div
                    class="mt-10
                           border
                           border-gray-200
                           rounded-3xl
                           overflow-hidden"
                >


                    <div
                        class="grid
                               grid-cols-[130px_1fr]
                               sm:grid-cols-[190px_1fr]
                               border-b
                               border-gray-200"
                    >

                        <div
                            class="bg-gray-50
                                   px-4
                                   sm:px-6
                                   py-4
                                   font-bold
                                   text-gray-700"
                        >
                            Product
                        </div>


                        <div
                            class="px-4
                                   sm:px-6
                                   py-4
                                   text-gray-600"
                        >
                            {{ $product['name'] }}
                        </div>

                    </div>



                    <div
                        class="grid
                               grid-cols-[130px_1fr]
                               sm:grid-cols-[190px_1fr]
                               border-b
                               border-gray-200"
                    >

                        <div
                            class="bg-gray-50
                                   px-4
                                   sm:px-6
                                   py-4
                                   font-bold
                                   text-gray-700"
                        >
                            Category
                        </div>


                        <div
                            class="px-4
                                   sm:px-6
                                   py-4
                                   text-gray-600"
                        >
                            {{ $currentCategory['title'] }}
                        </div>

                    </div>



                    <div
                        class="grid
                               grid-cols-[130px_1fr]
                               sm:grid-cols-[190px_1fr]
                               border-b
                               border-gray-200"
                    >

                        <div
                            class="bg-gray-50
                                   px-4
                                   sm:px-6
                                   py-4
                                   font-bold
                                   text-gray-700"
                        >
                            Brand
                        </div>


                        <div
                            class="px-4
                                   sm:px-6
                                   py-4
                                   text-gray-600"
                        >
                            M R Hardware
                        </div>

                    </div>



                    <div
                        class="grid
                               grid-cols-[130px_1fr]
                               sm:grid-cols-[190px_1fr]"
                    >

                        <div
                            class="bg-gray-50
                                   px-4
                                   sm:px-6
                                   py-4
                                   font-bold
                                   text-gray-700"
                        >
                            Details
                        </div>


                        <div
                            class="px-4
                                   sm:px-6
                                   py-4
                                   text-gray-600"
                        >
                            Contact for model-wise specifications
                            and availability.
                        </div>

                    </div>

                </div>

            </div>



            {{-- RIGHT SIDE --}}
            <div>

                <div
                    class="bg-[#071a2d]
                           text-white
                           rounded-[30px]
                           p-7
                           sm:p-8
                           lg:sticky
                           lg:top-28"
                >

                    <p
                        class="text-orange-400
                               uppercase
                               tracking-[3px]
                               text-xs
                               font-bold"
                    >
                        Need Information?
                    </p>


                    <h3
                        class="mt-3
                               text-2xl
                               sm:text-3xl
                               font-black"
                    >
                        Enquire About This Product
                    </h3>


                    <p
                        class="mt-4
                               text-gray-300
                               leading-7"
                    >
                        Contact M R Hardware for product details,
                        specifications and availability.
                    </p>


                    <div class="mt-7 space-y-3">


                        <a
                            href="{{ route('contact') }}"
                            class="flex
                                   items-center
                                   justify-center
                                   w-full
                                   px-6
                                   py-4
                                   rounded-full
                                   bg-orange-600
                                   hover:bg-orange-500
                                   font-black
                                   transition"
                        >
                            Send Enquiry
                        </a>


                        <a
                            href="tel:+919811510846"
                            class="flex
                                   items-center
                                   justify-center
                                   w-full
                                   px-6
                                   py-4
                                   rounded-full
                                   border
                                   border-white/20
                                   hover:bg-white/10
                                   font-bold
                                   transition"
                        >
                            Call +91 98115 10846
                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
    PRODUCT VIDEOS
========================================================= --}}

@if(
    !empty($currentCategory['videos'])
    && $currentCategory['videos']->count()
)

<section
    class="py-16
           lg:py-24
           bg-[#071a2d]
           text-white
           overflow-hidden"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        {{-- HEADER --}}

        <div
            class="flex
                   items-end
                   justify-between
                   gap-6
                   mb-10"
        >


            <div>

                <p
                    class="text-orange-400
                           uppercase
                           tracking-[4px]
                           text-xs
                           sm:text-sm
                           font-bold"
                >
                    Product Media
                </p>


                <h2
                    class="mt-3
                           text-3xl
                           sm:text-4xl
                           lg:text-5xl
                           font-black"
                >
                    Product Videos
                </h2>


                <p
                    class="mt-4
                           text-gray-400
                           max-w-xl"
                >
                    View videos available for the
                    {{ $currentCategory['title'] }}
                    collection.
                </p>

            </div>



            {{-- DESKTOP ARROWS --}}

            <div class="hidden md:flex gap-3">

                <button
                    type="button"

                    onclick="scrollProductVideos(-1)"

                    class="w-12
                           h-12
                           rounded-full
                           border
                           border-white/20
                           hover:bg-orange-600
                           hover:border-orange-600
                           transition"
                >
                    ←
                </button>


                <button
                    type="button"

                    onclick="scrollProductVideos(1)"

                    class="w-12
                           h-12
                           rounded-full
                           border
                           border-white/20
                           hover:bg-orange-600
                           hover:border-orange-600
                           transition"
                >
                    →
                </button>

            </div>

        </div>



        {{-- VIDEO SLIDER --}}

        <div
            id="productVideoSlider"

            class="product-video-slider
                   flex
                   gap-5
                   lg:gap-6
                   overflow-x-auto
                   scroll-smooth
                   snap-x
                   snap-mandatory
                   pb-5"
        >


            @foreach($currentCategory['videos'] as $index => $video)


                <article
                    class="flex-none
                           w-[88%]
                           sm:w-[70%]
                           md:w-[55%]
                           lg:w-[44%]
                           xl:w-[38%]
                           snap-start"
                >


                    <div
                        class="bg-black
                               rounded-3xl
                               overflow-hidden
                               border
                               border-white/10
                               shadow-2xl"
                    >


                        <video
                            controls

                            playsinline

                            preload="metadata"

                            class="w-full
                                   aspect-video
                                   bg-black
                                   object-contain"
                        >

                            <source
                                src="{{ asset($video) }}"
                                type="video/mp4"
                            >


                            Your browser does not support
                            HTML5 video.

                        </video>

                    </div>



                    <div class="mt-4">

                        <p
                            class="text-xs
                                   uppercase
                                   tracking-[2px]
                                   font-bold
                                   text-orange-400"
                        >
                            {{ $currentCategory['title'] }}
                        </p>


                        <h3
                            class="mt-2
                                   text-lg
                                   font-black"
                        >
                            Product Video
                            {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                        </h3>

                    </div>

                </article>


            @endforeach

        </div>

    </div>

</section>

@endif



{{-- =========================================================
    RELATED PRODUCTS
========================================================= --}}

@if($relatedProducts->count())

<section
    class="py-16
           lg:py-24
           bg-white
           overflow-hidden"
>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">


        <div
            class="flex
                   items-end
                   justify-between
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
                    Explore More
                </p>


                <h2
                    class="mt-3
                           text-3xl
                           sm:text-4xl
                           lg:text-5xl
                           font-black
                           text-gray-950"
                >
                    Related Products
                </h2>

            </div>



            <div class="hidden md:flex gap-3">

                <button
                    type="button"

                    onclick="scrollRelatedProducts(-1)"

                    class="w-12
                           h-12
                           rounded-full
                           border
                           border-gray-300
                           hover:bg-orange-600
                           hover:border-orange-600
                           hover:text-white
                           transition"
                >
                    ←
                </button>


                <button
                    type="button"

                    onclick="scrollRelatedProducts(1)"

                    class="w-12
                           h-12
                           rounded-full
                           border
                           border-gray-300
                           hover:bg-orange-600
                           hover:border-orange-600
                           hover:text-white
                           transition"
                >
                    →
                </button>

            </div>

        </div>



        <div
            id="relatedProductsSlider"

            class="related-products-slider
                   flex
                   gap-4
                   sm:gap-5
                   overflow-x-auto
                   scroll-smooth
                   snap-x
                   snap-mandatory
                   pb-4"
        >


            @foreach($relatedProducts as $related)


                <a
                    href="{{ route('product.detail', ['slug' => $related['slug']]) }}"

                    class="group
                           flex-none
                           w-[72%]
                           sm:w-[45%]
                           md:w-[31%]
                           lg:w-[23%]
                           snap-start
                           bg-white
                           border
                           border-gray-200
                           rounded-3xl
                           overflow-hidden
                           hover:shadow-xl
                           transition"
                >


                    <div
                        class="aspect-square
                               bg-gray-50
                               overflow-hidden"
                    >

                        <img
                            src="{{ asset($related['image']) }}"

                            alt="{{ $related['name'] }}"

                            loading="lazy"

                            class="w-full
                                   h-full
                                   object-contain
                                   p-4
                                   group-hover:scale-105
                                   transition
                                   duration-500"
                        >

                    </div>



                    <div class="p-5">

                        <p
                            class="text-xs
                                   uppercase
                                   tracking-[2px]
                                   font-bold
                                   text-orange-600"
                        >
                            {{ $currentCategory['title'] }}
                        </p>


                        <h3
                            class="mt-2
                                   font-black
                                   text-gray-950
                                   line-clamp-2"
                        >
                            {{ $related['name'] }}
                        </h3>


                        <p
                            class="mt-4
                                   text-sm
                                   text-gray-500
                                   group-hover:text-orange-600
                                   transition"
                        >
                            View Product →
                        </p>

                    </div>

                </a>


            @endforeach

        </div>

    </div>

</section>

@endif



{{-- =========================================================
    CSS
========================================================= --}}

<style>

.product-video-slider,
.related-products-slider {
    scrollbar-width: none;
    -ms-overflow-style: none;
    -webkit-overflow-scrolling: touch;
    overscroll-behavior-inline: contain;
}

.product-video-slider::-webkit-scrollbar,
.related-products-slider::-webkit-scrollbar {
    display: none;
}

.product-video-slider > *,
.related-products-slider > * {
    scroll-snap-align: start;
}

</style>



{{-- =========================================================
    JS
========================================================= --}}

<script>

function scrollProductVideos(direction) {

    const slider =
        document.getElementById('productVideoSlider');

    if (!slider) {
        return;
    }


    const card =
        slider.firstElementChild;

    if (!card) {
        return;
    }


    const styles =
        window.getComputedStyle(slider);


    const gap =
        parseFloat(styles.gap)
        || 24;


    const width =
        card.getBoundingClientRect().width;


    slider.scrollBy({
        left: direction * (width + gap),
        behavior: 'smooth'
    });

}



function scrollRelatedProducts(direction) {

    const slider =
        document.getElementById('relatedProductsSlider');

    if (!slider) {
        return;
    }


    const card =
        slider.firstElementChild;

    if (!card) {
        return;
    }


    const styles =
        window.getComputedStyle(slider);


    const gap =
        parseFloat(styles.gap)
        || 20;


    const width =
        card.getBoundingClientRect().width;


    slider.scrollBy({
        left: direction * (width + gap),
        behavior: 'smooth'
    });

}

</script>


@endsection