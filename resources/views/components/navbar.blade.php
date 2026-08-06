<header
    x-data="{ mobileOpen:false }"
    class="sticky top-0 z-50 bg-white/95 backdrop-blur-lg border-b border-gray-200 shadow-sm">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex items-center justify-between h-24">

            <!-- Logo -->
            <a href="{{ route('home') }}"
               class="flex items-center gap-4">

                <img
                    src="{{ asset('images/logo.png') }}"
                    alt="M R Hardware"
                    class="h-16 w-auto">

                <div>

                    <h2 class="text-2xl font-bold text-orange-600">

                        M R Hardware

                    </h2>

                    <p class="text-xs uppercase tracking-[4px] text-gray-500">

                        Industrial Hardware Supplier

                    </p>

                </div>

            </a>

            <!-- Desktop Menu -->

            <nav class="hidden lg:flex items-center gap-10">

                <a href="{{ route('home') }}"
                   class="{{ request()->routeIs('home') ? 'text-orange-600 font-semibold' : 'text-gray-700' }} hover:text-orange-600 transition">

                    Home

                </a>

                <a href="{{ route('about') }}"
                   class="{{ request()->routeIs('about') ? 'text-orange-600 font-semibold' : 'text-gray-700' }} hover:text-orange-600 transition">

                    About

                </a>

                <!-- Products Mega Menu -->

                <div class="relative group">

                    <a href="{{ route('products') }}"
                       class="flex items-center gap-2 font-medium text-gray-700 hover:text-orange-600 transition">

                        Products

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4 transition-transform duration-300 group-hover:rotate-180"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M19 9l-7 7-7-7"/>

                        </svg>

                    </a>

                    <!-- Mega Menu -->

                    <div
                        class="absolute left-1/2 -translate-x-1/2 top-full pt-6
                               opacity-0 invisible
                               group-hover:opacity-100
                               group-hover:visible
                               transition-all duration-300
                               z-50">

                        <div
                            class="w-[900px] rounded-3xl bg-white shadow-2xl border overflow-hidden">

                            <div class="grid grid-cols-3">

                                <!-- Column 1 -->

                                <div class="p-8 border-r">

                                    <h3 class="text-xl font-bold text-orange-600 mb-6">

                                        Hardware Products

                                    </h3>

                                    <div class="space-y-4">

    <a href="{{ route('products', ['category' => 'cabinet']) }}"
       class="flex items-center gap-3 hover:text-orange-600">
        🔧 Cabinet Handle
    </a>

    <a href="{{ route('products', ['category' => 'door']) }}"
       class="flex items-center gap-3 hover:text-orange-600">
        🚪 Door Handle
    </a>

    <a href="{{ route('products', ['category' => 'knobs']) }}"
       class="flex items-center gap-3 hover:text-orange-600">
        🔘 Knobs
    </a>

    <a href="{{ route('products', ['category' => 'latch']) }}"
       class="flex items-center gap-3 hover:text-orange-600">
        🔒 Latch
    </a>

    <a href="{{ route('products', ['category' => 'doorstopper']) }}"
       class="flex items-center gap-3 hover:text-orange-600">
        🚪 Door Stopper
    </a>

</div>

                                </div>



                                <!-- Column 2 -->

<div class="p-8 border-r">

    <h3 class="text-xl font-bold text-orange-600 mb-6">

        More Categories

    </h3>

    <div class="space-y-4">

        <a href="{{ route('products', ['category' => 'keyholder']) }}"
   class="flex items-center gap-3 hover:text-orange-600 transition">
    🗝️ Key Holder
</a>

<a href="{{ route('products', ['category' => 'profile']) }}"
   class="flex items-center gap-3 hover:text-orange-600 transition">
    📐 Profile Handle
</a>

<a href="{{ route('products', ['category' => 'mortise']) }}"
   class="flex items-center gap-3 hover:text-orange-600 transition">
    🔐 Mortise Handle
</a>

<a href="{{ route('products', ['category' => 'sliding']) }}"
   class="flex items-center gap-3 hover:text-orange-600 transition">
    🚪 Sliding Handle
</a>

<a href="{{ route('products', ['category' => 'magnet']) }}"
   class="flex items-center gap-3 hover:text-orange-600 transition">
    🧲 Magnet Catcher
</a>

<a href="{{ route('products') }}"
   class="flex items-center gap-3 font-semibold text-orange-600 hover:text-orange-700 transition">
    📦 View All Products
</a>

       

    </div>

</div>

<!-- Featured Banner -->

<div class="relative overflow-hidden">

    <img
        src="{{ asset('images/products/menu-banner.jpg') }}"
        alt="Premium Hardware"
        class="absolute inset-0 w-full h-full object-cover">

    <div class="absolute inset-0 bg-gradient-to-br from-black/80 to-orange-700/80"></div>

    <div class="relative z-10 p-8 h-full flex flex-col justify-between">

        <div>

            <span class="uppercase tracking-[4px] text-orange-300 text-sm">

                Featured Collection

            </span>

            <h3 class="text-3xl font-bold text-white mt-4">

                Premium Hardware Collection

            </h3>

            <p class="text-gray-200 mt-5 leading-7">

                Discover premium cabinet handles, door handles,
                architectural fittings and industrial hardware
                for modern homes and commercial projects.

            </p>

        </div>

        <div>

            <a href="{{ route('products') }}"
               class="inline-flex items-center gap-2 bg-white text-orange-600 px-6 py-3 rounded-full font-semibold hover:bg-orange-100 transition">

                Explore Products

                <svg xmlns="http://www.w3.org/2000/svg"
                     class="w-5 h-5"
                     fill="none"
                     viewBox="0 0 24 24"
                     stroke="currentColor">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M9 5l7 7-7 7"/>

                </svg>

            </a>

        </div>

    </div>

</div>

</div>

</div>

</div>

</div>

<!-- Contact + CTA -->

<a href="{{ route('contact') }}"
   class="{{ request()->routeIs('contact') ? 'text-orange-600 font-semibold' : 'text-gray-700' }} hover:text-orange-600 transition">

    Contact

</a>

</nav>

<!-- Right Side -->

<div class="hidden lg:flex items-center gap-5">

    <!-- Search -->

    <button
        class="w-11 h-11 rounded-full border border-gray-200 hover:bg-orange-50 flex items-center justify-center transition">

        🔍

    </button>

    <!-- Phone -->

    <div class="text-right">

        <p class="text-xs uppercase tracking-[3px] text-gray-500">

            Call Us

        </p>

        <a href="tel:+919811510846"
           class="font-bold text-gray-800 hover:text-orange-600">

            +91 9811510846

        </a>

    </div>

    <!-- Quote -->

    <a href="{{ route('contact') }}"
       class="bg-orange-600 hover:bg-orange-700 text-white px-7 py-3 rounded-full font-semibold transition shadow-lg">

        Request Quote

    </a>

</div>

<!-- Mobile Button -->

<button
    @click="mobileOpen=!mobileOpen"
    class="lg:hidden">

    <svg xmlns="http://www.w3.org/2000/svg"
         class="w-8 h-8"
         fill="none"
         viewBox="0 0 24 24"
         stroke="currentColor">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M4 6h16M4 12h16M4 18h16"/>

    </svg>

</button>

</div>

</div>

<!-- Mobile Menu -->

<div
    x-show="mobileOpen"
    x-transition
    @click.away="mobileOpen = false"
    class="lg:hidden bg-white border-t border-gray-200 shadow-xl">

    <div class="px-6 py-4">

        <a href="{{ route('home') }}"
           class="block py-4 border-b hover:text-orange-600">

            Home

        </a>

        <a href="{{ route('about') }}"
           class="block py-4 border-b hover:text-orange-600">

            About

        </a>

        <!-- Mobile Products -->

        <div x-data="{ productMenu:false }">

            <button
                @click="productMenu=!productMenu"
                class="w-full flex justify-between items-center py-4 border-b">

                <span>

                    Products

                </span>

                <svg
                    class="w-5 h-5 transition duration-300"
                    :class="{ 'rotate-180': productMenu }"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M19 9l-7 7-7-7"/>

                </svg>

            </button>

            <div
    x-show="productMenu"
    x-transition
    class="pl-5 pb-4 space-y-3">

    <a href="{{ route('products', ['category' => 'cabinet']) }}"
       class="block py-2 hover:text-orange-600">
        Cabinet Handle
    </a>

    <a href="{{ route('products', ['category' => 'door']) }}"
       class="block py-2 hover:text-orange-600">
        Door Handle
    </a>

    <a href="{{ route('products', ['category' => 'knobs']) }}"
       class="block py-2 hover:text-orange-600">
        Knobs
    </a>

    <a href="{{ route('products', ['category' => 'latch']) }}"
       class="block py-2 hover:text-orange-600">
        Latch
    </a>

    <a href="{{ route('products', ['category' => 'doorstopper']) }}"
       class="block py-2 hover:text-orange-600">
        Door Stopper
    </a>

    <a href="{{ route('products', ['category' => 'keyholder']) }}"
       class="block py-2 hover:text-orange-600">
        Key Holder
    </a>

    <a href="{{ route('products', ['category' => 'profile']) }}"
       class="block py-2 hover:text-orange-600">
        Profile Handle
    </a>

    <a href="{{ route('products', ['category' => 'mortise']) }}"
       class="block py-2 hover:text-orange-600">
        Mortise Handle
    </a>

    <a href="{{ route('products', ['category' => 'sliding']) }}"
       class="block py-2 hover:text-orange-600">
        Sliding Handle
    </a>

    <a href="{{ route('products', ['category' => 'magnet']) }}"
       class="block py-2 hover:text-orange-600">
        Magnet Catcher
    </a>

    <a href="{{ route('products') }}"
       class="block py-2 font-semibold text-orange-600">
        View All Products →
    </a>

</div>

        </div>

        <a href="{{ route('contact') }}"
           class="block py-4 border-b hover:text-orange-600">

            Contact

        </a>

        <!-- Mobile Contact -->

        <div class="mt-6">

            <a href="tel:+919811510846"
               class="block w-full text-center border border-orange-600 text-orange-600 py-3 rounded-xl font-semibold hover:bg-orange-50">

                📞 Call Now

            </a>

            <a href="{{ route('contact') }}"
               class="block w-full text-center bg-orange-600 text-white py-3 rounded-xl font-semibold mt-3 hover:bg-orange-700">

                Request Quote

            </a>

        </div>

    </div>

</div>

</header>