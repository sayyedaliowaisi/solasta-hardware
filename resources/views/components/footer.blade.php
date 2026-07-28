<footer id="contact" class="bg-[#0B3C91] text-white">

    <div class="container mx-auto px-6 py-16">

        <div class="grid gap-12 md:grid-cols-2 lg:grid-cols-4">

            <!-- Company -->
            <div>

                <img
                    src="{{ asset('images/logo-white.png') }}"
                    alt="M R Hardware"
                    class="h-16 mb-6">

                <p class="text-blue-100 leading-8 text-sm">
                    <strong>M R Hardware</strong> is a trusted Manufacturing &
                    Trading company based in Delhi, delivering premium industrial
                    hardware products with quality, reliability and exceptional
                    customer support since 2014.
                </p>

            </div>

            <!-- Quick Links -->
            <div>

                <h3 class="text-2xl font-bold mb-6">
                    Quick Links
                </h3>

                <ul class="space-y-4">

                    <li>
                        <a href="/"
                           class="text-blue-100 hover:text-orange-400 transition duration-300">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="#about"
                           class="text-blue-100 hover:text-orange-400 transition duration-300">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="#products"
                           class="text-blue-100 hover:text-orange-400 transition duration-300">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="#contact"
                           class="text-blue-100 hover:text-orange-400 transition duration-300">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>

            <!-- Product Categories -->
            <div>

                <h3 class="text-2xl font-bold mb-6">
                    Product Categories
                </h3>

                <ul class="space-y-4 text-blue-100">

                    <li class="hover:text-orange-400 transition">
                        Industrial Hardware
                    </li>

                    <li class="hover:text-orange-400 transition">
                        Construction Hardware
                    </li>

                    <li class="hover:text-orange-400 transition">
                        Industrial Fasteners
                    </li>

                    <li class="hover:text-orange-400 transition">
                        Safety Equipment
                    </li>

                    <li class="hover:text-orange-400 transition">
                        Industrial Tools
                    </li>

                </ul>

            </div>

            <!-- Contact -->
            <div>

                <h3 class="text-2xl font-bold mb-6">
                    Contact Us
                </h3>

                <div class="space-y-5 text-blue-100">

                    <div class="flex items-start gap-3">

                        <i class="fa-solid fa-location-dot mt-1 text-orange-400"></i>

                        <p>
                            3335/107-108<br>
                            Sharda Mata Complex<br>
                            Chawri Bazar<br>
                            Delhi - 110006
                        </p>

                    </div>

                    <div class="flex items-center gap-3">

                        <i class="fa-solid fa-phone text-orange-400"></i>

                        <a href="tel:+919811510846"
                           class="hover:text-orange-400 transition">
                            +91 9811510846
                        </a>

                    </div>

                    <div class="flex items-center gap-3">

                        <i class="fa-solid fa-envelope text-orange-400"></i>

                        <a href="mailto:mrhardware04@gmail.com"
                           class="hover:text-orange-400 transition break-all">
                            mrhardware04@gmail.com
                        </a>

                    </div>

                </div>

            </div>

        </div>

        <!-- Divider -->
        <div class="border-t border-blue-700 my-10"></div>

        <!-- Bottom Footer -->
        <div class="flex flex-col md:flex-row items-center justify-between gap-6">

            <p class="text-blue-200 text-sm text-center md:text-left">

                © {{ date('Y') }} <strong>M R Hardware</strong>.
                All Rights Reserved.

            </p>

            <!-- Social Icons -->

            <div class="flex items-center gap-4">

                <a href="#"
                   class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition">

                    <i class="fab fa-facebook-f"></i>

                </a>

                <a href="#"
                   class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition">

                    <i class="fab fa-instagram"></i>

                </a>

                <a href="#"
                   class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition">

                    <i class="fab fa-linkedin-in"></i>

                </a>

                <a href="#"
                   class="w-10 h-10 rounded-full bg-white/10 flex items-center justify-center hover:bg-orange-500 transition">

                    <i class="fab fa-whatsapp"></i>

                </a>

            </div>

        </div>

    </div>

</footer>
