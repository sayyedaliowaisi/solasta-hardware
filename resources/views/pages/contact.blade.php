@extends('layouts.app')

@section('title', 'Contact Us | M R Hardware')

@section('content')

@php
    $selectedProduct = request('product');
    $selectedCategory = request('category');

    
@endphp


<!-- =========================================================
     CONTACT HERO
========================================================= -->

<section class="relative overflow-hidden bg-gray-950">

    <!-- BACKGROUND -->

    <div class="absolute inset-0">

        <div class="absolute
                    -top-32
                    -right-32
                    w-96 h-96
                    bg-orange-600/20
                    rounded-full
                    blur-3xl">
        </div>

        <div class="absolute
                    -bottom-32
                    -left-32
                    w-96 h-96
                    bg-orange-500/10
                    rounded-full
                    blur-3xl">
        </div>

        <div class="absolute inset-0
                    bg-gradient-to-br
                    from-gray-950
                    via-gray-900
                    to-orange-950">
        </div>

    </div>


    <!-- CONTENT -->

    <div class="relative
                max-w-7xl
                mx-auto
                px-6
                py-24
                md:py-32">

        <div class="max-w-4xl">

            <span class="inline-flex
                         items-center
                         gap-3
                         text-orange-400
                         uppercase
                         tracking-[5px]
                         text-sm
                         font-bold">

                <span class="w-10 h-px bg-orange-500"></span>

                M R Hardware

            </span>


            <h1 class="text-5xl
                       md:text-6xl
                       lg:text-7xl
                       font-black
                       text-white
                       mt-7">

                Contact Us

            </h1>


            <p class="text-gray-300
                      text-lg
                      md:text-xl
                      leading-8
                      mt-6
                      max-w-2xl">

                Get in touch with M R Hardware for
                product enquiries, bulk orders and
                hardware requirements.

            </p>

        </div>

    </div>

</section>



<!-- =========================================================
     CONTACT SECTION
========================================================= -->

<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid
                    lg:grid-cols-[0.85fr_1.15fr]
                    gap-10
                    lg:gap-14">


            <!-- =====================================================
                 LEFT CONTACT INFORMATION
            ====================================================== -->

            <div>

                <span class="text-orange-600
                             uppercase
                             tracking-[4px]
                             text-sm
                             font-bold">

                    Get In Touch

                </span>


                <h2 class="text-4xl
                           md:text-5xl
                           font-black
                           text-gray-900
                           mt-4">

                    We'd Love to Hear From You

                </h2>


                <p class="text-gray-600
                          mt-6
                          leading-8">

                    Contact us for product details,
                    pricing, bulk orders or any other
                    business enquiry.

                </p>



                <!-- CONTACT CARDS -->

                <div class="space-y-5 mt-10">


                    <!-- PHONE -->

                    <a href="tel:+919811510846"
                       class="group
                              flex
                              items-start
                              gap-5
                              bg-white
                              p-6
                              rounded-2xl
                              border
                              border-gray-100
                              shadow-sm
                              hover:shadow-xl
                              hover:-translate-y-1
                              transition-all
                              duration-300">

                        <div class="w-14 h-14
                                    shrink-0
                                    rounded-xl
                                    bg-orange-100
                                    text-orange-600
                                    flex
                                    items-center
                                    justify-center
                                    text-2xl">

                            ☎

                        </div>


                        <div>

                            <p class="text-sm
                                      uppercase
                                      tracking-[2px]
                                      text-gray-400">

                                Call Us

                            </p>

                            <h3 class="text-lg
                                       font-bold
                                       text-gray-900
                                       mt-1">

                                +91 9811510846

                            </h3>

                        </div>

                    </a>



                    <!-- EMAIL -->

                    <a href="mailto:mrhardware04@gmail.com"
                       class="group
                              flex
                              items-start
                              gap-5
                              bg-white
                              p-6
                              rounded-2xl
                              border
                              border-gray-100
                              shadow-sm
                              hover:shadow-xl
                              hover:-translate-y-1
                              transition-all
                              duration-300">

                        <div class="w-14 h-14
                                    shrink-0
                                    rounded-xl
                                    bg-orange-100
                                    text-orange-600
                                    flex
                                    items-center
                                    justify-center
                                    text-2xl">

                            ✉

                        </div>


                        <div class="min-w-0">

                            <p class="text-sm
                                      uppercase
                                      tracking-[2px]
                                      text-gray-400">

                                Email Us

                            </p>

                            <h3 class="text-lg
                                       font-bold
                                       text-gray-900
                                       mt-1
                                       break-all">

                                mrhardware04@gmail.com

                            </h3>

                        </div>

                    </a>



                    <!-- ADDRESS -->

                    <div class="flex
                                items-start
                                gap-5
                                bg-white
                                p-6
                                rounded-2xl
                                border
                                border-gray-100
                                shadow-sm">

                        <div class="w-14 h-14
                                    shrink-0
                                    rounded-xl
                                    bg-orange-100
                                    text-orange-600
                                    flex
                                    items-center
                                    justify-center
                                    text-2xl">

                            📍

                        </div>


                        <div>

                            <p class="text-sm
                                      uppercase
                                      tracking-[2px]
                                      text-gray-400">

                                Our Location

                            </p>

                            <h3 class="font-bold
                                       text-gray-900
                                       mt-1
                                       leading-7">

                                3335/107-108 Sharda Mata Complex,<br>
                                Gali Bajrang Bali,<br>
                                Chawri Bazar,<br>
                                Delhi - 110006

                            </h3>

                        </div>

                    </div>

                </div>

            </div>



            <!-- =====================================================
                 RIGHT CONTACT FORM
            ====================================================== -->

            <div>

                <div class="bg-white
                            rounded-[2rem]
                            p-7
                            md:p-10
                            border
                            border-gray-100
                            shadow-xl">


                    <!-- FORM HEADING -->

                    <div class="mb-8">

                        <span class="text-orange-600
                                     uppercase
                                     tracking-[3px]
                                     text-sm
                                     font-bold">

                            Send Enquiry

                        </span>


                        <h2 class="text-3xl
                                   md:text-4xl
                                   font-black
                                   text-gray-900
                                   mt-3">

                            Request a Quote

                        </h2>


                        <p class="text-gray-500
                                  mt-3
                                  leading-7">

                            Fill in your details and our team
                            will contact you regarding your enquiry.

                        </p>

                    </div>



                    <!-- =================================================
                         SELECTED PRODUCT INFORMATION
                    ================================================== -->

                    @if($selectedProduct)

                        <div class="mb-8
                                    relative
                                    overflow-hidden
                                    bg-gradient-to-r
                                    from-orange-50
                                    to-orange-100/50
                                    border
                                    border-orange-200
                                    rounded-2xl
                                    p-6">


                            <div class="absolute
                                        -right-8
                                        -top-8
                                        w-28 h-28
                                        bg-orange-200/40
                                        rounded-full">
                            </div>


                            <div class="relative">

                                <div class="flex
                                            items-start
                                            gap-4">

                                    <div class="w-12 h-12
                                                shrink-0
                                                rounded-xl
                                                bg-orange-600
                                                text-white
                                                flex
                                                items-center
                                                justify-center
                                                text-xl">

                                        🔩

                                    </div>


                                    <div>

                                        <p class="text-xs
                                                  uppercase
                                                  tracking-[3px]
                                                  text-orange-600
                                                  font-bold">

                                            Product Enquiry

                                        </p>


                                        <h3 class="text-xl
                                                   md:text-2xl
                                                   font-black
                                                   text-gray-900
                                                   mt-2">

                                            {{ $selectedProduct }}

                                        </h3>


                                        @if($selectedCategory)

                                            <p class="text-gray-600
                                                      mt-2">

                                                Category:
                                                <span class="font-semibold">
                                                    {{ $selectedCategory }}
                                                </span>

                                            </p>

                                        @endif

                                    </div>

                                </div>

                            </div>

                        </div>

                    @endif



                    <!-- =================================================
                         FORM
                    ================================================== -->



                    @if(session('success'))

    <div class="mb-6
                bg-green-50
                border border-green-200
                text-green-700
                px-5 py-4
                rounded-xl">

        {{ session('success') }}

    </div>

@endif


                    <form
    action="{{ route('contact.store') }}"
    method="POST"
    class="space-y-6"
>

    @csrf

    <div>
        <label class="block mb-2 font-semibold text-gray-700">
            Your Name *
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name') }}"
            placeholder="Enter your name"
            class="w-full px-5 py-4 border rounded-xl
                   focus:outline-none
                   focus:ring-2
                   focus:ring-orange-500"
            required
        >

        @error('name')
            <p class="text-red-600 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
    </div>


    <div>
        <label class="block mb-2 font-semibold text-gray-700">
            Phone Number *
        </label>

        <input
            type="tel"
            name="phone"
            value="{{ old('phone') }}"
            placeholder="Enter phone number"
            class="w-full px-5 py-4 border rounded-xl
                   focus:outline-none
                   focus:ring-2
                   focus:ring-orange-500"
            required
        >

        @error('phone')
            <p class="text-red-600 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
    </div>


    <div>
        <label class="block mb-2 font-semibold text-gray-700">
            Email Address
        </label>

        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            placeholder="Enter email address"
            class="w-full px-5 py-4 border rounded-xl
                   focus:outline-none
                   focus:ring-2
                   focus:ring-orange-500"
        >

        @error('email')
            <p class="text-red-600 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
    </div>


    <div>
        <label class="block mb-2 font-semibold text-gray-700">
            Product
        </label>

        <input
            type="text"
            name="product"
            value="{{ old('product', request('product')) }}"
            placeholder="Product name"
            @if(request('product'))
        readonly
    @endif
            class="w-full px-5 py-4 border rounded-xl
                   focus:outline-none
                   focus:ring-2
                   focus:ring-orange-500"
        >
    </div>


    <input
        type="hidden"
        name="category"
        value="{{ old('category', request('category')) }}"
    >


    <div>
        <label class="block mb-2 font-semibold text-gray-700">
            Message
        </label>

        <textarea
            name="message"
            rows="5"
            placeholder="Tell us about your requirement..."
            class="w-full px-5 py-4 border rounded-xl
                   resize-none
                   focus:outline-none
                   focus:ring-2
                   focus:ring-orange-500"
        >{{ old('message') }}</textarea>

        @error('message')
            <p class="text-red-600 text-sm mt-2">
                {{ $message }}
            </p>
        @enderror
    </div>


    <button
        type="submit"
        class="w-full
               bg-orange-600
               hover:bg-orange-700
               text-white
               px-8 py-4
               rounded-xl
               font-bold
               transition"
    >
        Submit Enquiry
    </button>

</form>

                </div>

            </div>

        </div>

    </div>

</section>



<!-- =========================================================
     QUICK CTA
========================================================= -->

<section class="relative
                overflow-hidden
                py-20
                bg-gradient-to-br
                from-orange-600
                to-orange-800
                text-white">


    <div class="absolute
                -top-20
                -right-20
                w-72 h-72
                bg-white/10
                rounded-full
                blur-2xl">
    </div>


    <div class="relative
                max-w-5xl
                mx-auto
                px-6
                text-center">

        <span class="uppercase
                     tracking-[4px]
                     text-orange-200
                     text-sm
                     font-bold">

            Quick Support

        </span>


        <h2 class="text-4xl
                   md:text-5xl
                   font-black
                   mt-4">

            Need Immediate Assistance?

        </h2>


        <p class="text-orange-100
                  mt-5
                  text-lg
                  leading-8">

            Call us directly for product pricing,
            availability and bulk order enquiries.

        </p>


        <a
            href="tel:+919811510846"
            class="inline-flex
                   items-center
                   justify-center
                   mt-8
                   bg-white
                   text-orange-600
                   px-8
                   py-4
                   rounded-full
                   font-bold
                   hover:bg-gray-100
                   hover:-translate-y-1
                   shadow-xl
                   transition-all
                   duration-300"
        >

            ☎ &nbsp; +91 9811510846

        </a>

    </div>

</section>


@endsection