<!-- Company Stats -->

<section class="py-24 bg-gray-900 text-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="text-center mb-16">

            <span class="bg-orange-500 text-white px-5 py-2 rounded-full text-sm font-semibold">
                OUR ACHIEVEMENTS
            </span>

            <h2 class="text-4xl md:text-5xl font-bold mt-6">

                Trusted Hardware Supplier

            </h2>

            <p class="mt-5 text-gray-300 max-w-3xl mx-auto">

                Delivering premium hardware products with quality,
                reliability and excellent customer service.

            </p>

        </div>

        <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="text-center">

                <div class="text-6xl font-bold text-orange-500">

                    15+

                </div>

                <h4 class="mt-4 text-xl font-semibold">

                    Years Experience

                </h4>

            </div>

            <div class="text-center">

                <div class="text-6xl font-bold text-orange-500">

                    500+

                </div>

                <h4 class="mt-4 text-xl font-semibold">

                    Happy Clients

                </h4>

            </div>

            <div class="text-center">

                <div class="text-6xl font-bold text-orange-500">

                    10K+

                </div>

                <h4 class="mt-4 text-xl font-semibold">

                    Products Delivered

                </h4>

            </div>

            <div class="text-center">

                <div class="text-6xl font-bold text-orange-500">

                    24/7

                </div>

                <h4 class="mt-4 text-xl font-semibold">

                    Customer Support

                </h4>

            </div>

        </div>

    </div>

</section>

<section class="py-24 bg-white overflow-hidden relative">

    <div class="max-w-7xl mx-auto px-6 text-center">

        <span class="inline-flex items-center rounded-full bg-orange-100 px-5 py-2 text-sm font-semibold text-orange-600">
            OUR BRANDS
        </span>

        <h2 class="mt-6 text-4xl md:text-5xl font-bold text-gray-900">
            Trusted Brands We Deal In
        </h2>

        <p class="mt-5 max-w-2xl mx-auto text-gray-600">
            We supply genuine industrial hardware and construction products from globally trusted brands.
        </p>

    </div>

    <!-- Left Fade -->
    <div class="absolute left-0 top-0 h-full w-32 bg-gradient-to-r from-white to-transparent z-10"></div>

    <!-- Right Fade -->
    <div class="absolute right-0 top-0 h-full w-32 bg-gradient-to-l from-white to-transparent z-10"></div>

    @php
        $brands = [
            'bosch',
            'dewalt',
            'makita',
            'stanley',
            'hilti',
            'taparia',
            'total',
            'hikoki',

            // Duplicate
            'bosch',
            'dewalt',
            'makita',
            'stanley',
            'hilti',
            'taparia',
            'total',
            'hikoki',
        ];
    @endphp

    <div class="brand-marquee mt-16">

        <div class="brand-track">

            @foreach($brands as $brand)

                <div class="brand-card">

                    <img
                        src="{{ asset('images/Homepage/brand-logo/'.$brand.'.png') }}"
                        alt="{{ ucfirst($brand) }}">

                </div>

            @endforeach

        </div>

    </div>

</section>