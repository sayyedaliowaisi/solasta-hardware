@php
    $companyName =
        $siteSettings->company_name
        ?: 'M R Hardware';

    $logoPath =
        $siteSettings->logo
        ?: 'images/logo.png';

    $tagline =
        $siteSettings->tagline
        ?: 'Hardware Supplier';

    $footerProductsButtonText =
        $siteSettings->footer_products_button_text
        ?: 'View Products';

    $footerContactButtonText =
        $siteSettings->footer_contact_button_text
        ?: 'Contact Us';

    $footerQuickLinksTitle =
        $siteSettings->footer_quick_links_title
        ?: 'Quick Links';

    $footerCategoriesTitle =
        $siteSettings->footer_categories_title
        ?: 'Product Categories';

    $footerContactTitle =
        $siteSettings->footer_contact_title
        ?: 'Contact Us';

    $footerEmptyCategoriesText =
        $siteSettings->footer_empty_categories_text
        ?: 'Categories coming soon.';

    $footerWhatsappText =
        $siteSettings->footer_whatsapp_text
        ?: 'WhatsApp';

    $navHomeText =
        $siteSettings->nav_home_text
        ?: 'Home';

    $navAboutText =
        $siteSettings->nav_about_text
        ?: 'About';

    $navProductsText =
        $siteSettings->nav_products_text
        ?: 'Products';

    $navContactText =
        $siteSettings->nav_contact_text
        ?: 'Contact';


    $phoneDigits =
        preg_replace(
            '/\D+/',
            '',
            $siteSettings->phone ?? ''
        );

    if (strlen($phoneDigits) === 10) {
        $phoneDigits = '91' . $phoneDigits;
    }


    $whatsappDigits =
        preg_replace(
            '/\D+/',
            '',
            $siteSettings->whatsapp ?? ''
        );

    if (strlen($whatsappDigits) === 10) {
        $whatsappDigits = '91' . $whatsappDigits;
    }


    $navCategories =
        $navCategories ?? collect();
@endphp


<footer
    class="relative overflow-hidden
           bg-[#07111f]
           text-slate-300"
>

    {{-- subtle background --}}
    <div
        class="pointer-events-none
               absolute inset-0"
        style="
            background:
                radial-gradient(circle at 10% 20%, rgba(249,115,22,.08), transparent 28%),
                radial-gradient(circle at 90% 75%, rgba(14,165,233,.05), transparent 28%);
        "
    ></div>


    {{-- top accent --}}
    <div
        class="h-[3px]
               bg-gradient-to-r
               from-orange-600
               via-orange-400
               to-orange-600"
    ></div>


    <div
        class="relative
               mx-auto max-w-[1180px]
               px-4 sm:px-6 lg:px-8"
    >

        {{-- MAIN FOOTER --}}
        <div
            class="grid
                   gap-8
                   py-10 sm:py-12
                   md:grid-cols-2
                   lg:grid-cols-[1.25fr_.7fr_1fr_1.15fr]
                   lg:gap-7
                   lg:py-11"
        >

            {{-- =====================================================
                 COMPANY
            ====================================================== --}}
            <div>

                <a
                    href="{{ route('home') }}"
                    class="inline-flex items-center gap-3"
                >

                    <img
                        src="{{ asset($logoPath) }}"
                        alt="{{ $companyName }}"
                        class="h-10 w-auto
                               sm:h-11"
                    >


                    <div>

                        <p
                            class="text-[18px]
                                   font-black
                                   leading-none
                                   tracking-[-0.02em]
                                   text-white"
                        >
                            {{ $companyName }}
                        </p>

                        <p
                            class="mt-1
                                   text-[8px]
                                   font-semibold uppercase
                                   tracking-[0.18em]
                                   text-slate-500"
                        >
                            {{ $tagline }}
                        </p>

                    </div>

                </a>


                @if($siteSettings->footer_description)

                    <p
                        class="mt-4
                               max-w-sm
                               text-[12px]
                               leading-6
                               text-slate-400"
                    >
                        {{ $siteSettings->footer_description }}
                    </p>

                @endif


                <div class="mt-5 flex flex-wrap gap-2">

                    <a
                        href="{{ route('products') }}"
                        class="inline-flex min-h-[38px]
                               items-center justify-center
                               rounded-xl
                               bg-orange-600
                               px-4
                               text-[10px]
                               font-bold
                               text-white
                               transition
                               hover:bg-orange-500"
                    >
                        {{ $footerProductsButtonText }}
                    </a>


                    <a
                        href="{{ route('contact') }}"
                        class="inline-flex min-h-[38px]
                               items-center justify-center
                               rounded-xl
                               border border-white/10
                               bg-white/[0.04]
                               px-4
                               text-[10px]
                               font-bold
                               text-slate-200
                               transition
                               hover:bg-white/[0.08]"
                    >
                        {{ $footerContactButtonText }}
                    </a>

                </div>

            </div>



            {{-- =====================================================
                 QUICK LINKS
            ====================================================== --}}
            <div>

                <p
                    class="text-[10px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-orange-400"
                >
                    {{ $footerQuickLinksTitle }}
                </p>


                <ul class="mt-4 space-y-2.5">

                    <li>
                        <a
                            href="{{ route('home') }}"
                            class="footer-link"
                        >
                            {{ $navHomeText }}
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('about') }}"
                            class="footer-link"
                        >
                            {{ $navAboutText }}
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('products') }}"
                            class="footer-link"
                        >
                            {{ $navProductsText }}
                        </a>
                    </li>

                    <li>
                        <a
                            href="{{ route('contact') }}"
                            class="footer-link"
                        >
                            {{ $navContactText }}
                        </a>
                    </li>

                </ul>

            </div>



            {{-- =====================================================
                 CATEGORIES
            ====================================================== --}}
            <div>

                <p
                    class="text-[10px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-orange-400"
                >
                    {{ $footerCategoriesTitle }}
                </p>


                <ul class="mt-4 space-y-2.5">

                    @forelse($navCategories->take(6) as $category)

                        <li>

                            <a
                                href="{{ route('products', ['category' => $category->slug]) }}"
                                class="footer-link"
                            >
                                {{ $category->name }}
                            </a>

                        </li>

                    @empty

                        <li class="text-[11px] text-slate-500">
                            {{ $footerEmptyCategoriesText }}
                        </li>

                    @endforelse

                </ul>

            </div>



            {{-- =====================================================
                 CONTACT
            ====================================================== --}}
            <div>

                <p
                    class="text-[10px]
                           font-bold uppercase
                           tracking-[0.16em]
                           text-orange-400"
                >
                    {{ $footerContactTitle }}
                </p>


                <div class="mt-4 space-y-3">

                    @if($siteSettings->address)

                        <div class="flex items-start gap-3">

                            <div
                                class="flex h-8 w-8
                                       shrink-0
                                       items-center justify-center
                                       rounded-lg
                                       bg-white/[0.05]
                                       text-[12px]
                                       text-orange-400"
                            >
                                ⌖
                            </div>

                            <p
                                class="text-[11px]
                                       leading-5
                                       text-slate-400"
                            >
                                {{ $siteSettings->address }}
                            </p>

                        </div>

                    @endif


                    @if($siteSettings->phone)

                        <a
                            href="tel:+{{ $phoneDigits }}"
                            class="flex items-center gap-3 group"
                        >

                            <div
                                class="flex h-8 w-8
                                       shrink-0
                                       items-center justify-center
                                       rounded-lg
                                       bg-white/[0.05]
                                       text-[12px]
                                       text-orange-400
                                       transition
                                       group-hover:bg-orange-500/10"
                            >
                                ☎
                            </div>

                            <span
                                class="text-[11px]
                                       font-semibold
                                       text-slate-300
                                       transition
                                       group-hover:text-orange-400"
                            >
                                {{ $siteSettings->phone }}
                            </span>

                        </a>

                    @endif


                    @if($siteSettings->email)

                        <a
                            href="mailto:{{ $siteSettings->email }}"
                            class="flex items-start gap-3 group"
                        >

                            <div
                                class="flex h-8 w-8
                                       shrink-0
                                       items-center justify-center
                                       rounded-lg
                                       bg-white/[0.05]
                                       text-[12px]
                                       text-orange-400"
                            >
                                ✉
                            </div>

                            <span
                                class="break-all
                                       text-[11px]
                                       font-semibold
                                       leading-5
                                       text-slate-300
                                       transition
                                       group-hover:text-orange-400"
                            >
                                {{ $siteSettings->email }}
                            </span>

                        </a>

                    @endif


                    @if($siteSettings->whatsapp)

                        <a
                            href="https://wa.me/{{ $whatsappDigits }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="flex items-center gap-3 group"
                        >

                            <div
                                class="flex h-8 w-8
                                       shrink-0
                                       items-center justify-center
                                       rounded-lg
                                       bg-white/[0.05]
                                       text-[12px]
                                       text-emerald-400"
                            >
                                💬
                            </div>

                            <span
                                class="text-[11px]
                                       font-semibold
                                       text-slate-300
                                       transition
                                       group-hover:text-emerald-400"
                            >
                                {{ $footerWhatsappText }}
                            </span>

                        </a>

                    @endif

                </div>

            </div>

        </div>



        {{-- =========================================================
             BOTTOM BAR
        ========================================================== --}}
        <div
            class="border-t border-white/10
                   py-4"
        >

            <div
                class="flex flex-col
                       items-center justify-between
                       gap-3
                       md:flex-row"
            >

                <p
                    class="text-center
                           text-[10px]
                           leading-5
                           text-slate-500
                           md:text-left"
                >
                    {{
                        $siteSettings->copyright_text
                        ?: '© ' . date('Y') . ' ' . $companyName . '. All Rights Reserved.'
                    }}
                </p>


                <div
                    class="flex flex-wrap
                           items-center justify-center
                           gap-4"
                >

                    @if($siteSettings->facebook)

                        <a
                            href="{{ $siteSettings->facebook }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="footer-social-link"
                        >
                            Facebook
                        </a>

                    @endif


                    @if($siteSettings->instagram)

                        <a
                            href="{{ $siteSettings->instagram }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="footer-social-link"
                        >
                            Instagram
                        </a>

                    @endif


                    @if($siteSettings->linkedin)

                        <a
                            href="{{ $siteSettings->linkedin }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="footer-social-link"
                        >
                            LinkedIn
                        </a>

                    @endif


                    @if($siteSettings->youtube)

                        <a
                            href="{{ $siteSettings->youtube }}"
                            target="_blank"
                            rel="noopener noreferrer"
                            class="footer-social-link"
                        >
                            YouTube
                        </a>

                    @endif

                </div>

            </div>

        </div>

    </div>

</footer>


<style>
    .footer-link {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        color: #94a3b8;
        font-size: 11px;
        font-weight: 600;
        line-height: 1.5;
        transition:
            color .2s ease,
            transform .2s ease;
    }

    .footer-link::before {
        content: "";
        width: 4px;
        height: 4px;
        border-radius: 999px;
        background: #475569;
        transition: background .2s ease;
    }

    .footer-link:hover {
        color: #fb923c;
        transform: translateX(2px);
    }

    .footer-link:hover::before {
        background: #f97316;
    }


    .footer-social-link {
        color: #64748b;
        font-size: 10px;
        font-weight: 600;
        transition: color .2s ease;
    }

    .footer-social-link:hover {
        color: #fb923c;
    }


    @media (max-width: 767px) {
        footer {
            text-align: left;
        }
    }
</style>