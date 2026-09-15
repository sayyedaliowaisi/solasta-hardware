@php
    /*
    |--------------------------------------------------------------------------
    | Section Content
    |--------------------------------------------------------------------------
    */

    $industriesBadge =
        $section->badge
        ?: 'INDUSTRIES WE SERVE';

    $industriesTitle =
        $section->title
        ?: 'Products for Different Applications';

    $industriesSubtitle =
        $section->subtitle;

    $industriesDescription =
        $section->description
        ?: 'Explore hardware products for different requirements and applications.';


    /*
    |--------------------------------------------------------------------------
    | CMS Items
    |--------------------------------------------------------------------------
    |
    | icon        = Card Icon
    | title       = Industry / Application Name
    | subtitle    = Optional small text
    | description = Card Description
    | image       = Optional image
    | link        = Optional destination
    |
    */

    $industryItems = $section->items ?? collect();
@endphp


<!-- =========================================================
     INDUSTRIES WE SERVE
========================================================= -->

<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">


        <!-- =====================================================
             SECTION HEADER
        ====================================================== -->

        <div class="text-center mb-16">

            @if($industriesBadge)

                <span
                    class="inline-block
                           bg-orange-100
                           text-orange-600
                           px-5 py-2
                           rounded-full
                           text-sm
                           font-semibold"
                >
                    {{ $industriesBadge }}
                </span>

            @endif


            @if($industriesTitle)

                <h2
                    class="text-4xl
                           md:text-5xl
                           font-bold
                           text-gray-900
                           mt-6"
                >
                    {{ $industriesTitle }}
                </h2>

            @endif


            @if($industriesSubtitle)

                <p
                    class="mt-4
                           text-orange-600
                           font-semibold"
                >
                    {{ $industriesSubtitle }}
                </p>

            @endif


            @if($industriesDescription)

                <p
                    class="text-gray-600
                           mt-5
                           max-w-3xl
                           mx-auto
                           leading-8
                           whitespace-pre-line"
                >
                    {{ $industriesDescription }}
                </p>

            @endif

        </div>


        <!-- =====================================================
             INDUSTRY CARDS
        ====================================================== -->

        @if($industryItems->isNotEmpty())

            <div
                class="grid
                       md:grid-cols-2
                       lg:grid-cols-3
                       gap-8"
            >

                @foreach($industryItems as $item)

                    @php
                        $itemUrl = null;

                        if (!empty($item->link)) {

                            $itemUrl =
                                str_starts_with($item->link, 'http://') ||
                                str_starts_with($item->link, 'https://') ||
                                str_starts_with($item->link, '#')
                                    ? $item->link
                                    : url($item->link);
                        }
                    @endphp


                    <div
                        class="bg-white
                               rounded-2xl
                               shadow-md
                               p-8
                               hover:shadow-xl
                               transition
                               duration-300"
                    >


                        <!-- ==============================
                             OPTIONAL IMAGE
                        =============================== -->

                        @if(!empty($item->image))

                            <div
                                class="mb-6
                                       overflow-hidden
                                       rounded-2xl"
                            >

                                <img
                                    src="{{ asset($item->image) }}"
                                    alt="{{ $item->title ?: 'M R Hardware' }}"
                                    class="w-full
                                           h-48
                                           object-cover"
                                    loading="lazy"
                                >

                            </div>

                        @endif


                        <!-- ==============================
                             ICON
                        =============================== -->

                        @if(!empty($item->icon))

                            <div class="text-5xl mb-5">
                                {{ $item->icon }}
                            </div>

                        @endif


                        <!-- ==============================
                             OPTIONAL VALUE
                        =============================== -->

                        @if(!empty($item->value))

                            <p
                                class="mb-2
                                       text-xs
                                       font-bold
                                       uppercase
                                       tracking-wider
                                       text-orange-600"
                            >
                                {{ $item->value }}
                            </p>

                        @endif


                        <!-- ==============================
                             TITLE
                        =============================== -->

                        @if(!empty($item->title))

                            <h3
                                class="text-2xl
                                       font-bold
                                       text-gray-900
                                       mb-3"
                            >
                                {{ $item->title }}
                            </h3>

                        @endif


                        <!-- ==============================
                             SUBTITLE
                        =============================== -->

                        @if(!empty($item->subtitle))

                            <p
                                class="mb-3
                                       text-sm
                                       font-semibold
                                       text-orange-600"
                            >
                                {{ $item->subtitle }}
                            </p>

                        @endif


                        <!-- ==============================
                             DESCRIPTION
                        =============================== -->

                        @if(!empty($item->description))

                            <p
                                class="text-gray-600
                                       leading-7
                                       whitespace-pre-line"
                            >
                                {{ $item->description }}
                            </p>

                        @endif


                        <!-- ==============================
                             OPTIONAL LINK
                        =============================== -->

                        @if($itemUrl)

                            <a
                                href="{{ $itemUrl }}"
                                class="mt-5
                                       inline-flex
                                       items-center
                                       gap-2
                                       text-sm
                                       font-semibold
                                       text-orange-600
                                       transition
                                       hover:text-orange-700"
                            >
                                Learn More

                                <span>→</span>
                            </a>

                        @endif

                    </div>

                @endforeach

            </div>


        @else

            <!-- =================================================
                 EMPTY STATE
            ================================================== -->

            <div
                class="max-w-3xl
                       mx-auto
                       rounded-3xl
                       border border-gray-100
                       bg-white
                       px-8 py-12
                       text-center
                       shadow-sm"
            >

                <div class="text-5xl">
                    🔩
                </div>

                <h3
                    class="mt-5
                           text-xl
                           font-bold
                           text-gray-900"
                >
                    Hardware Products
                </h3>

                <p
                    class="mt-3
                           text-gray-600
                           leading-7"
                >
                    Explore our hardware product range for different requirements.
                </p>

                <a
                    href="{{ route('products.index') }}"
                    class="mt-6
                           inline-flex
                           items-center
                           justify-center
                           rounded-xl
                           bg-orange-600
                           px-6 py-3
                           text-sm
                           font-semibold
                           text-white
                           transition
                           hover:bg-orange-700"
                >
                    Explore Products
                </a>

            </div>

        @endif

    </div>

</section>