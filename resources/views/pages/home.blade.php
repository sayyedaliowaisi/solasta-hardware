@extends('layouts.app')

@section('content')

<section class="relative overflow-hidden bg-[#0B3C91] text-white">

    <div class="absolute inset-0 opacity-10">
        <div class="h-full w-full bg-[radial-gradient(circle_at_top_right,white,transparent_40%)]"></div>
    </div>

    <div class="container mx-auto px-6 py-24 lg:flex lg:items-center">

        <!-- Left -->
        <div class="lg:w-1/2">

            <span class="inline-block rounded-full bg-orange-500 px-4 py-2 text-sm font-semibold">
                Industrial Hardware Supplier
            </span>

            <h1 class="mt-6 text-5xl font-extrabold leading-tight">

                Premium Hardware
                <span class="text-orange-400">
                    Solutions
                </span>

                For Every Industry

            </h1>

            <p class="mt-6 text-lg text-blue-100 leading-8">

                Solasta Hardware delivers trusted industrial hardware,
                construction materials, tools and engineering products
                with unmatched quality and service.

            </p>

            <div class="mt-10 flex gap-4">

                <a href="#"
                    class="rounded-lg bg-orange-500 px-7 py-4 font-semibold transition hover:bg-orange-600">

                    Get Quote

                </a>

                <a href="#"
                    class="rounded-lg border border-white px-7 py-4 font-semibold hover:bg-white hover:text-[#0B3C91]">

                    Our Products

                </a>

            </div>

        </div>

        <!-- Right -->

        <div class="mt-14 lg:mt-0 lg:w-1/2">

            <img
                src="{{ asset('images/hero.png') }}"
                class="mx-auto w-full max-w-lg"
                alt="Hardware">

        </div>

    </div>

</section>


<!-- Why Choose Us -->

<section class="bg-gray-50 py-24">

    <div class="container mx-auto px-6">

        <div class="text-center">

            <span class="font-semibold uppercase tracking-widest text-[#F58220]">

                Why Choose Us

            </span>

            <h2 class="mt-4 text-4xl font-bold text-[#0B3C91]">

                Trusted Industrial Hardware Partner

            </h2>

            <p class="mx-auto mt-6 max-w-3xl text-lg text-gray-600">

                We provide premium-quality hardware products, engineering
                solutions and reliable customer support to industries across India.

            </p>

        </div>

        <div class="mt-16 grid gap-8 md:grid-cols-2 lg:grid-cols-4">

            <!-- Card -->

            <div class="rounded-2xl bg-white p-8 shadow transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-3xl">

                    🏭

                </div>

                <h3 class="text-xl font-bold">

                    Quality Products

                </h3>

                <p class="mt-4 text-gray-600">

                    Premium hardware sourced from trusted manufacturers.

                </p>

            </div>

            <!-- Card -->

            <div class="rounded-2xl bg-white p-8 shadow transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-orange-100 text-3xl">

                    🚚

                </div>

                <h3 class="text-xl font-bold">

                    Fast Delivery

                </h3>

                <p class="mt-4 text-gray-600">

                    On-time delivery across India with secure logistics.

                </p>

            </div>

            <!-- Card -->

            <div class="rounded-2xl bg-white p-8 shadow transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-blue-100 text-3xl">

                    👨‍🔧

                </div>

                <h3 class="text-xl font-bold">

                    Expert Team

                </h3>

                <p class="mt-4 text-gray-600">

                    Experienced professionals to guide every project.

                </p>

            </div>

            <!-- Card -->

            <div class="rounded-2xl bg-white p-8 shadow transition duration-300 hover:-translate-y-2 hover:shadow-xl">

                <div class="mb-6 flex h-16 w-16 items-center justify-center rounded-full bg-orange-100 text-3xl">

                    ⭐

                </div>

                <h3 class="text-xl font-bold">

                    Trusted Service

                </h3>

                <p class="mt-4 text-gray-600">

                    Long-term relationships built through quality and trust.

                </p>

            </div>

        </div>

    </div>

</section>

<!-- --------------Statistics Section----------- -->

<section class="bg-[#0B3C91] py-20 text-white">

    <div class="container mx-auto px-6">

        <div class="grid gap-10 text-center md:grid-cols-2 lg:grid-cols-4">

            <div>
                <h2 class="text-5xl font-bold text-orange-400">10+</h2>
                <p class="mt-3">Years Experience</p>
            </div>

            <div>
                <h2 class="text-5xl font-bold text-orange-400">500+</h2>
                <p class="mt-3">Projects Delivered</p>
            </div>

            <div>
                <h2 class="text-5xl font-bold text-orange-400">200+</h2>
                <p class="mt-3">Happy Clients</p>
            </div>

            <div>
                <h2 class="text-5xl font-bold text-orange-400">1000+</h2>
                <p class="mt-3">Products</p>
            </div>

        </div>

    </div>

</section>

<!-- ---------------Featured Products Section--------------- -->

<section class="py-24 bg-white">

    <div class="container mx-auto px-6">

        <div class="text-center">

            <span class="text-[#F58220] font-semibold uppercase">
                Our Products
            </span>

            <h2 class="mt-4 text-4xl font-bold text-[#0B3C91]">
                Featured Products
            </h2>

            <p class="mt-4 text-gray-600">
                High-quality industrial hardware solutions for every business.
            </p>

        </div>

        <div class="grid gap-8 mt-16 md:grid-cols-2 lg:grid-cols-3">

            <!-- Product Card -->

            <div class="rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition duration-300">

                <img
                    src="{{ asset('images/product1.jpg') }}"
                    class="h-64 w-full object-cover">

                <div class="p-6">

                    <span class="text-sm bg-orange-100 text-orange-600 px-3 py-1 rounded-full">

                        Industrial

                    </span>

                    <h3 class="mt-4 text-2xl font-bold">

                        Heavy Duty Fasteners

                    </h3>

                    <p class="mt-3 text-gray-600">

                        High-strength fastening solutions for industrial projects.

                    </p>

                    <a href="#"
                       class="mt-6 inline-block font-semibold text-[#0B3C91] hover:text-orange-500">

                        View Details →

                    </a>

                </div>

            </div>

        </div>

    </div>

</section>

@endsection