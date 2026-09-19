<footer class="solasta-exact-footer">

    <div class="solasta-exact-footer__inner">

        <div class="solasta-exact-footer__grid">

            {{-- =====================================================
                 BRAND COLUMN
            ====================================================== --}}
            <div class="solasta-exact-footer__brand">

                <div class="solasta-exact-footer__brand-row">

                    <div class="solasta-exact-footer__brand-logo">

                        <img
                            src="{{ asset('images/logo.png') }}"
                            alt="M R Hardware"
                        >

                    </div>

                    <div class="solasta-exact-footer__brand-copy">

                        <h2>
                            M R Hardware
                        </h2>

                        <p class="solasta-exact-footer__tagline">
                            HARDWARE SUPPLIER
                        </p>

                    </div>

                </div>


                <p class="solasta-exact-footer__description">
                    Your trusted partner for premium hardware
                    solutions. Quality, durability and design —
                    all in one place.
                </p>


                <div class="solasta-exact-footer__socials">

                    <a href="#" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>

                    <a href="#" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>

                    <a href="#" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>

                    <a href="#" aria-label="LinkedIn">
                        <i class="fa-brands fa-linkedin-in"></i>
                    </a>

                </div>

            </div>


            {{-- =====================================================
                 QUICK LINKS
            ====================================================== --}}
            <div class="solasta-exact-footer__column">

                <h3>
                    Quick Links
                </h3>

                <ul>

                    <li>
                        <a href="{{ route('home') }}">
                            Home
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('about') }}">
                            About Us
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('products') }}">
                            Products
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Gallery
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('contact') }}">
                            Contact
                        </a>
                    </li>

                </ul>

            </div>


            {{-- =====================================================
                 PRODUCT CATEGORIES
            ====================================================== --}}
            <div class="solasta-exact-footer__column">

                <h3>
                    Product Categories
                </h3>

                <ul>

                    <li>
                        <a href="#">
                            Door Hardware
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Cabinet &amp; Furniture Hardware
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Furniture Accessories
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Aldrops
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Door Handles
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Knobs
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            Profile Handles
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('products') }}"
                            class="solasta-exact-footer__view-all"
                        >
                            + View All
                        </a>
                    </li>

                </ul>

            </div>


            {{-- =====================================================
                 CONTACT
            ====================================================== --}}
            <div class="solasta-exact-footer__contact">

                <h3>
                    Contact Us
                </h3>


                <a
                    href="tel:+919876543210"
                    class="solasta-exact-footer__contact-item"
                >

                    <i class="fa-solid fa-phone"></i>

                    <span>
                        +91 98765 43210
                    </span>

                </a>


                <a
                    href="mailto:info@mrhardware.in"
                    class="solasta-exact-footer__contact-item"
                >

                    <i class="fa-regular fa-envelope"></i>

                    <span>
                        info@mrhardware.in
                    </span>

                </a>


                <div class="solasta-exact-footer__contact-item">

                    <i class="fa-solid fa-location-dot"></i>

                    <span>
                        Noida, Uttar Pradesh, India
                    </span>

                </div>


                <div class="solasta-exact-footer__legal">

                    <p>
                        © 2025 M R Hardware. All Rights Reserved.
                    </p>

                    <div>

                        <a href="#">
                            Privacy Policy
                        </a>

                        <span>|</span>

                        <a href="#">
                            Terms &amp; Conditions
                        </a>

                    </div>

                </div>

            </div>

        </div>


        {{-- =========================================================
             BOTTOM LEFT STRAPLINE
        ========================================================== --}}
        <div class="solasta-exact-footer__bottom">

            <span class="solasta-exact-footer__orange-line"></span>

            <p>
                Quality Hardware
                <span>|</span>
                Modern Spaces
                <span>|</span>
                Better Living
            </p>

        </div>

    </div>

</footer>