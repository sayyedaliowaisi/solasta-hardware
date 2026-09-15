@php
    /*
    |--------------------------------------------------------------------------
    | Section Content
    |--------------------------------------------------------------------------
    */

    $whyBadge =
        $section->badge
        ?: 'WHY CHOOSE US';

    $whyTitle =
        $section->title
        ?: 'Why Choose M R Hardware';

    $whyDescription =
        $section->description
        ?: 'Explore the advantages of working with M R Hardware for your hardware product requirements.';


    /*
    |--------------------------------------------------------------------------
    | CMS Items
    |--------------------------------------------------------------------------
    */

    $whyItems = $section->items ?? collect();


    /*
    |--------------------------------------------------------------------------
    | Fallback Cards
    |--------------------------------------------------------------------------
    | Ye sirf tab show honge jab admin se koi item add nahi hua ho.
    */

    if ($whyItems->isEmpty()) {

        $whyItems = collect([

            (object) [
                'icon' => '🛡',
                'title' => 'Product Range',
                'subtitle' => null,
                'description' =>
                    'A range of hardware products for different business and project requirements.',
                'value' => null,
                'image' => null,
                'link' => null,
            ],

            (object) [
                'icon' => '📦',
                'title' => 'Multiple Categories',
                'subtitle' => null,
                'description' =>
                    'Explore hardware products across multiple categories in one place.',
                'value' => null,
                'image' => null,
                'link' => null,
            ],

            (object) [
                'icon' => '💬',
                'title' => 'Product Enquiries',
                'subtitle' => null,
                'description' =>
                    'Contact us for product availability and model-wise specifications.',
                'value' => null,
                'image' => null,
                'link' => null,
            ],

        ]);

    }
@endphp


<!-- =========================================================
     WHY CHOOSE US
========================================================= -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">


        <!-- =====================================================
             SECTION HEADER
        ====================================================== -->

        <div class="text-center mb-16">

            @if($whyBadge)

                <span
                    class="inline-block
                           bg-orange-100
                           text-orange-600
                           px-5 py-2
                           rounded-full
                           text-sm
                           font-semibold"
                >
                    {{ $whyBadge }}
                </span>

            @endif


            @if($whyTitle)

                <h2
                    class="text-4xl
                           md:text-5xl
                           font-bold
                           text-gray-900
                           mt-6"
                >
                    {{ $whyTitle }}
                </h2>

            @endif


            @if($section->subtitle)

                <p
                    class="mt-4
                           text-orange-600
                           font-semibold"
                >
                    {{ $section->subtitle }}
                </p>

            @endif


            @if($whyDescription)

                <p
                    class="text-gray-600
                           mt-5
                           max-w-3xl
                           mx-auto
                           leading-8
                           whitespace-pre-line"
                >
                    {{ $whyDescription }}
                </p>

            @endif

        </div>


        <!-- =====================================================
             WHY CHOOSE CARDS
        ====================================================== -->

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach($whyItems as $item)

                @php
                    $itemLink = null;

                    if (!empty($item->link)) {

                        $itemLink =
                            str_starts_with($item->link, 'http://') ||
                            str_starts_with($item->link, 'https://') ||
                            str_starts_with($item->link, '#')
                                ? $item->link
                                : url($item->link);
                    }
                @endphp


                <div
                    class="bg-gray-50
                           rounded-3xl
                           p-8
                           shadow
                           hover:shadow-xl
                           hover:-translate-y-2
                           transition"
                >

                    {{-- ICON --}}
                    @if(!empty($item->icon))

                        <div
                            class="w-16 h-16
                                   rounded-2xl
                                   bg-orange-100
                                   flex
                                   items-center
                                   justify-center
                                   text-3xl"
                        >
                            {{ $item->icon }}
                        </div>

                    @endif


                    {{-- OPTIONAL IMAGE --}}
                    @if(!empty($item->image))

                        <div class="mb-6 overflow-hidden rounded-2xl">

                            <img
                                src="{{ asset($item->image) }}"
                                alt="{{ $item->title ?: 'M R Hardware' }}"
                                class="h-48
                                       w-full
                                       object-cover"
                            >

                        </div>

                    @endif


                    {{-- OPTIONAL VALUE --}}
                    @if(!empty($item->value))

                        <p
                            class="mt-5
                                   text-sm
                                   font-bold
                                   uppercase
                                   tracking-wider
                                   text-orange-600"
                        >
                            {{ $item->value }}
                        </p>

                    @endif


                    {{-- TITLE --}}
                    @if(!empty($item->title))

                        <h3
                            class="text-2xl
                                   font-bold
                                   mt-6
                                   text-gray-900"
                        >
                            {{ $item->title }}
                        </h3>

                    @endif


                    {{-- SUBTITLE --}}
                    @if(!empty($item->subtitle))

                        <p
                            class="mt-2
                                   text-sm
                                   font-semibold
                                   text-orange-600"
                        >
                            {{ $item->subtitle }}
                        </p>

                    @endif


                    {{-- DESCRIPTION --}}
                    @if(!empty($item->description))

                        <p
                            class="text-gray-600
                                   mt-4
                                   leading-7
                                   whitespace-pre-line"
                        >
                            {{ $item->description }}
                        </p>

                    @endif


                    {{-- OPTIONAL LINK --}}
                    @if($itemLink)

                        <a
                            href="{{ $itemLink }}"
                            class="mt-5
                                   inline-flex
                                   items-center
                                   gap-2
                                   text-sm
                                   font-bold
                                   text-orange-600
                                   transition
                                   hover:text-orange-700"
                        >
                            Learn More

                            <span>
                                →
                            </span>
                        </a>

                    @endif

                </div>

            @endforeach

        </div>

    </div>

</section>