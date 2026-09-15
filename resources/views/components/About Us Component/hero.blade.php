@php
    $heroBadge =
        $section->badge
        ?: 'ABOUT US';

    $heroTitle =
        $section->title
        ?: 'Building Trust Through Quality Hardware';

    $heroDescription =
        $section->description
        ?: 'M R Hardware offers a range of hardware products for business and project requirements. Contact us for model-wise specifications and availability.';

    $heroButtonText =
        $section->button_text
        ?: 'Contact Us';

    $heroButtonLink =
        $section->button_link
        ?: route('contact');

    $heroImage =
        $section->image
        ?: 'images/about/about-company.jpg';

    /*
    |--------------------------------------------------------------------------
    | Button URL
    |--------------------------------------------------------------------------
    */

    $heroButtonUrl =
        str_starts_with($heroButtonLink, 'http://') ||
        str_starts_with($heroButtonLink, 'https://') ||
        str_starts_with($heroButtonLink, '#')
            ? $heroButtonLink
            : url($heroButtonLink);
@endphp


<section class="bg-gray-50 py-24">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            {{-- =====================================================
                LEFT CONTENT
            ====================================================== --}}
            <div>

                @if($heroBadge)

                    <span
                        class="inline-block
                               bg-orange-100
                               text-orange-600
                               px-5 py-2
                               rounded-full
                               text-sm
                               font-semibold"
                    >
                        {{ $heroBadge }}
                    </span>

                @endif


                @if($heroTitle)

                    <h1
                        class="text-5xl
                               font-bold
                               text-gray-900
                               mt-8
                               leading-tight"
                    >
                        {{ $heroTitle }}
                    </h1>

                @endif


                @if($section->subtitle)

                    <p
                        class="mt-4
                               text-orange-600
                               font-semibold
                               text-base"
                    >
                        {{ $section->subtitle }}
                    </p>

                @endif


                @if($heroDescription)

                    <p
                        class="mt-8
                               text-gray-600
                               text-lg
                               leading-8
                               whitespace-pre-line"
                    >
                        {{ $heroDescription }}
                    </p>

                @endif


                @if($heroButtonText)

                    <div class="mt-10">

                        <a
                            href="{{ $heroButtonUrl }}"
                            class="inline-flex
                                   items-center
                                   justify-center
                                   px-8 py-4
                                   bg-orange-600
                                   text-white
                                   rounded-xl
                                   font-semibold
                                   hover:bg-orange-700
                                   transition"
                        >
                            {{ $heroButtonText }}
                        </a>

                    </div>

                @endif

            </div>


            {{-- =====================================================
                RIGHT IMAGE
            ====================================================== --}}
            <div>

                <img
                    src="{{ asset($heroImage) }}"
                    class="rounded-3xl
                           shadow-2xl
                           w-full"
                    alt="{{ $heroTitle }}"
                >

            </div>

        </div>

    </div>

</section>