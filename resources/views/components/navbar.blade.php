<header x-data="{ mobileOpen: false, productOpen: false }"
        class="sticky top-0 z-50 bg-white shadow">

    <div class="max-w-7xl mx-auto px-6">

        <div class="flex justify-between items-center h-20">

            <!-- Logo -->
            <a href="/" class="flex items-center gap-3">

                <img src="{{ asset('images/logo.png') }}"
                     class="h-14"
                     alt="Logo">

                <div>

                    <h2 class="text-2xl font-bold text-orange-600">
                        M R Hardware
                    </h2>

                    <p class="text-xs uppercase tracking-widest text-gray-500">
                        Industrial Hardware Supplier
                    </p>

                </div>

            </a>

            <!-- Desktop Menu -->

            <nav class="hidden lg:flex items-center gap-8">

                <a href="/"
                   class="font-medium hover:text-orange-600">
                    Home
                </a>

                <a href="/about"
                   class="font-medium hover:text-orange-600">
                    About
                </a>

                <!-- Dropdown -->

                <div class="relative group">

                    <button
                        class="flex items-center gap-2 font-medium hover:text-orange-600">

                        Products

                        <svg class="w-4 h-4"
                             fill="none"
                             stroke="currentColor"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M19 9l-7 7-7-7"/>

                        </svg>

                    </button>

                    <div
                        class="absolute left-0 mt-4 w-64 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition duration-300">

                        <a href="#"
                           class="block px-6 py-3 hover:bg-orange-50">
                            Hand Tools
                        </a>

                        <a href="#"
                           class="block px-6 py-3 hover:bg-orange-50">
                            Power Tools
                        </a>

                        <a href="#"
                           class="block px-6 py-3 hover:bg-orange-50">
                            Safety Equipment
                        </a>

                        <a href="#"
                           class="block px-6 py-3 hover:bg-orange-50">
                            Plumbing
                        </a>

                    </div>

                </div>

                <a href="/contact"
                   class="font-medium hover:text-orange-600">
                    Contact
                </a>

            </nav>

            <!-- Right Side -->

            <div class="hidden lg:flex items-center gap-6">

                <div>

                    <p class="text-xs uppercase text-gray-500">

                        Call Us

                    </p>

                    <a href="tel:+919811510846"
                       class="font-bold hover:text-orange-600">

                        +91 9811510846

                    </a>

                </div>

                <a href="/contact"
                   class="bg-orange-600 text-white px-6 py-3 rounded-full hover:bg-orange-700 transition">

                    Get Quote

                </a>

            </div>

            <!-- Mobile Button -->

            <button
                @click="mobileOpen=!mobileOpen"
                class="lg:hidden">

                <svg class="h-8 w-8"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path
                        stroke-linecap="round"
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
        class="lg:hidden bg-white border-t">

        <a href="/"
           class="block px-6 py-4 border-b">

            Home

        </a>

        <a href="/about"
           class="block px-6 py-4 border-b">

            About

        </a>

        <!-- Mobile Dropdown -->

        <div>

            <button
                @click="productOpen=!productOpen"
                class="flex justify-between items-center w-full px-6 py-4 border-b">

                Products

                <svg class="w-5 h-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M19 9l-7 7-7-7"/>

                </svg>

            </button>

            <div
                x-show="productOpen"
                x-transition>

                <a href="#"
                   class="block pl-10 py-3 border-b">

                    Hand Tools

                </a>

                <a href="#"
                   class="block pl-10 py-3 border-b">

                    Power Tools

                </a>

                <a href="#"
                   class="block pl-10 py-3 border-b">

                    Safety Equipment

                </a>

                <a href="#"
                   class="block pl-10 py-3 border-b">

                    Plumbing

                </a>

            </div>

        </div>

        <a href="/contact"
           class="block px-6 py-4">

            Contact

        </a>

    </div>

</header>