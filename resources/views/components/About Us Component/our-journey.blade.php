@php
    /*
    |--------------------------------------------------------------------------
    | Section Content
    |--------------------------------------------------------------------------
    */

    $journeyBadge =
        $section->badge
        ?: 'OUR JOURNEY';

    $journeyTitle =
        $section->title
        ?: 'Our Journey Since 2014';

    $journeySubtitle =
        $section->subtitle;

    $journeyDescription =
        $section->description
        ?: 'Our journey reflects the growth and development of M R Hardware since its establishment in 2014.';


    /*
    |--------------------------------------------------------------------------
    | Journey Items
    |--------------------------------------------------------------------------
    |
    | value       = Year / Timeline Label
    | title       = Milestone Title
    | description = Milestone Description
    |
    */

    $journeyItems = $section->items ?? collect();


    /*
    |--------------------------------------------------------------------------
    | Safe Fallback
    |--------------------------------------------------------------------------
    |
    | Database me koi Journey item na ho tab sirf verified
    | establishment information show hogi.
    |
    */

    if ($journeyItems->isEmpty()) {

        $journeyItems = collect([

            (object) [
                'value' => '2014',
                'title' => 'M R Hardware Established',
                'subtitle' => null,
                'description' =>
                    'M R Hardware was established in 2014 and is engaged in manufacturing and trading hardware products.',
                'icon' => null,
                'image' => null,
                'link' => null,
            ],

        ]);

    }
@endphp


<!-- =========================================================
     COMPANY TIMELINE
========================================================= -->

<section class="py-24 bg-gray-50">

    <div class="max-w-6xl mx-auto px-6">


        <!-- =====================================================
             SECTION HEADER
        ====================================================== -->

        <div class="text-center mb-20">

            @if($journeyBadge)

                <span
                    class="inline-block
                           bg-orange-100
                           text-orange-600
                           px-5 py-2
                           rounded-full
                           text-sm
                           font-semibold"
                >
                    {{ $journeyBadge }}
                </span>

            @endif


            @if($journeyTitle)

                <h2
                    class="text-4xl
                           md:text-5xl
                           font-bold
                           mt-6
                           text-gray-900"
                >
                    {{ $journeyTitle }}
                </h2>

            @endif


            @if($journeySubtitle)

                <p
                    class="mt-4
                           font-semibold
                           text-orange-600"
                >
                    {{ $journeySubtitle }}
                </p>

            @endif


            @if($journeyDescription)

                <p
                    class="text-gray-600
                           mt-5
                           max-w-3xl
                           mx-auto
                           leading-8
                           whitespace-pre-line"
                >
                    {{ $journeyDescription }}
                </p>

            @endif

        </div>


        <!-- =====================================================
             TIMELINE
        ====================================================== -->

        @if($journeyItems->isNotEmpty())

            <div class="relative">


                <!-- CENTER LINE -->

                @if($journeyItems->count() > 1)

                    <div
                        class="absolute
                               left-1/2
                               top-0
                               bottom-0
                               w-1
                               bg-orange-200
                               transform
                               -translate-x-1/2
                               hidden
                               md:block"
                    ></div>

                @endif


                <!-- =================================================
                     TIMELINE ITEMS
                ================================================== -->

                @foreach($journeyItems as $item)

                    @php
                        /*
                        |--------------------------------------------------------------------------
                        | Alternating Layout
                        |--------------------------------------------------------------------------
                        |
                        | Odd  item = content left
                        | Even item = content right
                        |
                        */

                        $isOdd = $loop->odd;
                    @endphp


                    <div
                        class="grid
                               md:grid-cols-2
                               gap-10
                               items-center
                               {{ !$loop->last ? 'mb-16' : '' }}"
                    >


                        @if($isOdd)

                            <!-- =====================================
                                 LEFT CONTENT
                            ====================================== -->

                            <div class="md:text-right">


                                {{-- YEAR / VALUE --}}
                                @if(!empty($item->value))

                                    <h3
                                        class="text-2xl
                                               font-bold
                                               text-gray-900"
                                    >
                                        {{ $item->value }}
                                    </h3>

                                @endif


                                {{-- TITLE --}}
                                @if(!empty($item->title))

                                    <h4
                                        class="text-orange-600
                                               font-semibold
                                               mt-2"
                                    >
                                        {{ $item->title }}
                                    </h4>

                                @endif


                                {{-- SUBTITLE --}}
                                @if(!empty($item->subtitle))

                                    <p
                                        class="mt-2
                                               text-sm
                                               font-semibold
                                               text-gray-500"
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

                            </div>


                            <!-- TIMELINE DOT -->

                            <div
                                class="relative
                                       flex
                                       justify-center"
                            >

                                <div
                                    class="w-8 h-8
                                           rounded-full
                                           bg-orange-500
                                           border-8
                                           border-white
                                           shadow-lg
                                           relative
                                           z-10"
                                ></div>

                            </div>


                        @else


                            <!-- TIMELINE DOT -->

                            <div
                                class="order-2
                                       md:order-1
                                       relative
                                       flex
                                       justify-center"
                            >

                                <div
                                    class="w-8 h-8
                                           rounded-full
                                           bg-orange-500
                                           border-8
                                           border-white
                                           shadow-lg
                                           relative
                                           z-10"
                                ></div>

                            </div>


                            <!-- =====================================
                                 RIGHT CONTENT
                            ====================================== -->

                            <div class="order-1 md:order-2">


                                {{-- YEAR / VALUE --}}
                                @if(!empty($item->value))

                                    <h3
                                        class="text-2xl
                                               font-bold
                                               text-gray-900"
                                    >
                                        {{ $item->value }}
                                    </h3>

                                @endif


                                {{-- TITLE --}}
                                @if(!empty($item->title))

                                    <h4
                                        class="text-orange-600
                                               font-semibold
                                               mt-2"
                                    >
                                        {{ $item->title }}
                                    </h4>

                                @endif


                                {{-- SUBTITLE --}}
                                @if(!empty($item->subtitle))

                                    <p
                                        class="mt-2
                                               text-sm
                                               font-semibold
                                               text-gray-500"
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

                            </div>

                        @endif

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</section>