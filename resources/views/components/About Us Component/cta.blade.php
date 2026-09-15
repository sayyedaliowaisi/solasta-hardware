@php
    /*
    |--------------------------------------------------------------------------
    | CTA CMS Content
    |--------------------------------------------------------------------------
    */

    $ctaBadge =
        $section->badge
        ?: 'GET IN TOUCH';

    $ctaTitle =
        $section->title
        ?: 'Looking for Hardware Products?';

    $ctaSubtitle =
        $section->subtitle;

    $ctaDescription =
        $section->description
        ?: 'Contact M R Hardware for product availability and model-wise details.';

    $ctaButtonText =
        $section->button_text
        ?: 'Contact Us';

    $ctaButtonLink =
        $section->button_link
        ?: '/contact';


    /*
    |--------------------------------------------------------------------------
    | Primary Button URL
    |--------------------------------------------------------------------------
    */

    $ctaButtonUrl =
        str_starts_with($ctaButtonLink, 'http://') ||
        str_starts_with($ctaButtonLink, 'https://') ||
        str_starts_with($ctaButtonLink, '#') ||
        str_starts_with($ctaButtonLink, 'tel:') ||
        str_starts_with($ctaButtonLink, 'mailto:')
            ? $ctaButtonLink
            : url($ctaButtonLink);


    /*
    |--------------------------------------------------------------------------
    | Company Phone
    |--------------------------------------------------------------------------
    |
    | Phone comes from global Site Settings.
    |
    */

    $companyPhone =
        $siteSettings->phone ?? null;

    $phoneHref =
        $companyPhone
            ? preg_replace('/[^0-9+]/', '', $companyPhone)
            : null;
@endphp


<!-- =========================================================
     CTA SECTION
========================================================= -->

<section class="relative py-24 overflow-hidden">


    <!-- =====================================================
         BACKGROUND
    ====================================================== -->

    <div
        class="absolute inset-0
               bg-gradient-to-r
               from-orange-500
               via-orange-600
               to-red-500"
    ></div>


    <!-- =====================================================
         DECORATIVE CIRCLES
    ====================================================== -->

    <div
        class="absolute
               -top-20
               -left-20
               w-72 h-72
               bg-white/10
               rounded-full"
    ></div>


    <div
        class="absolute
               bottom-0
               right-0
               w-80 h-80
               bg-white/10
               rounded-full"
    ></div>


    <!-- =====================================================
         CONTENT
    ====================================================== -->

    <div
        class="relative
               max-w-7xl
               mx-auto
               px-6
               text-center
               text-white"
    >


        <!-- BADGE -->

        @if($ctaBadge)

            <span
                class="inline-block
                       bg-white/20
                       px-6 py-2
                       rounded-full
                       text-sm
                       font-semibold
                       tracking-wide"
            >
                {{ $ctaBadge }}
            </span>

        @endif


        <!-- TITLE -->

        @if($ctaTitle)

            <h2
                class="text-4xl
                       md:text-6xl
                       font-bold
                       mt-8
                       leading-tight
                       max-w-5xl
                       mx-auto"
            >
                {{ $ctaTitle }}
            </h2>

        @endif


        <!-- OPTIONAL SUBTITLE -->

        @if($ctaSubtitle)

            <p
                class="mt-5
                       text-lg
                       font-semibold
                       text-white"
            >
                {{ $ctaSubtitle }}
            </p>

        @endif


        <!-- DESCRIPTION -->

        @if($ctaDescription)

            <p
                class="max-w-3xl
                       mx-auto
                       mt-8
                       text-lg
                       text-orange-100
                       leading-8
                       whitespace-pre-line"
            >
                {{ $ctaDescription }}
            </p>

        @endif


        <!-- =================================================
             CTA BUTTONS
        ================================================== -->

        <div
            class="flex
                   flex-col
                   sm:flex-row
                   justify-center
                   gap-6
                   mt-12"
        >


            <!-- PRIMARY CTA -->

            @if($ctaButtonText)

                <a
                    href="{{ $ctaButtonUrl }}"
                    class="bg-white
                           text-orange-600
                           px-8 py-4
                           rounded-xl
                           font-semibold
                           shadow-lg
                           transition
                           hover:bg-gray-100
                           hover:-translate-y-1"
                >
                    {{ $ctaButtonText }}
                </a>

            @endif


            <!-- CALL BUTTON -->

            @if($companyPhone)

                <a
                    href="tel:{{ $phoneHref }}"
                    class="border-2
                           border-white
                           px-8 py-4
                           rounded-xl
                           font-semibold
                           transition
                           hover:bg-white
                           hover:text-orange-600
                           hover:-translate-y-1"
                >
                    📞 Call Now
                </a>

            @endif

        </div>


        <!-- PHONE NUMBER -->

        @if($companyPhone)

            <p
                class="mt-5
                       text-sm
                       font-medium
                       text-orange-100"
            >
                {{ $companyPhone }}
            </p>

        @endif

    </div>

</section>