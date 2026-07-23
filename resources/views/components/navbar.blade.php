<nav class="sticky top-0 z-50 bg-white/95 backdrop-blur shadow-sm">

    <div class="container mx-auto flex items-center justify-between px-6 py-4">

        <!-- Logo -->

        <a href="{{ url('/') }}" class="flex items-center">
    <img
    src="{{ asset('images/solastalogo.png') }}"
    alt="Solasta Hardware"
    class="h-16 w-auto"
>
</a>

        <!-- Menu -->

        <div class="hidden lg:flex items-center gap-10 font-medium">

            <a href="/" class="text-gray-700 hover:text-[#0B3C91] transition">
                Home
            </a>

            <a href="#" class="text-gray-700 hover:text-[#0B3C91] transition">
                About
            </a>

            <a href="#" class="text-gray-700 hover:text-[#0B3C91] transition">
                Products
            </a>

            <a href="#" class="text-gray-700 hover:text-[#0B3C91] transition">
                Industries
            </a>

            <a href="#" class="text-gray-700 hover:text-[#0B3C91] transition">
                Contact
            </a>

        </div>

        <!-- Right -->

        <div class="hidden lg:flex items-center gap-5">

            <a href="tel:+919999999999"
               class="font-semibold text-[#0B3C91]">

                📞 +91 99999 99999

            </a>

            <a href="#"
               class="rounded-lg bg-[#F58220] px-6 py-3 text-white font-semibold hover:bg-orange-600 transition">

                Get Quote

            </a>

        </div>

        <!-- Mobile Button -->

        <button class="lg:hidden">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-8 w-8"
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

</nav>