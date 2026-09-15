@php
    $sectionBadge =
        $section->badge
        ?: 'WHO WE ARE';

    $sectionTitle =
        $section->title
        ?: 'Our Mission, Vision & Values';

    $sectionSubtitle =
        $section->subtitle;

    $sectionDescription =
        $section->description;

    /*
    |--------------------------------------------------------------------------
    | Mission / Vision / Values Items
    |--------------------------------------------------------------------------
    */

    $missionItems = $section->items ?? collect();

    /*
    | Temporary fallbacks:
    | Admin items add hone tak ye 3 cards show honge.
    */

    if ($missionItems->isEmpty()) {

        $missionItems = collect([

            (object) [
                'icon' => '🎯',
                'title' => 'Our Mission',
                'subtitle' => null,
                'description' =>
                    'To serve customers with a useful range of hardware products and responsive business support.',
            ],

            (object) [
                'icon' => '👁️',
                'title' => 'Our Vision',
                'subtitle' => null,
                'description' =>
                    'To continue developing M R Hardware as a dependable hardware business serving different customer requirements.',
            ],

            (object) [
                'icon' => '⭐',
                'title' => 'Core Values',
                'subtitle' => null,
                'description' =>
                    'Customer service, responsible business practices and long-term business relationships.',
            ],

        ]);
    }
@endphp


<section class="py-24 bg-gray-50">

    <div class="max-w-7xl mx-auto px-6">


        {{-- =====================================================
            SECTION HEADER
        ====================================================== --}}

        <div class="text-center mb-16">

            @if($sectionBadge)

                <span
                    class="inline-block
                           bg-orange-100
                           text-orange-600
                           px-5 py-2
                           rounded-full
                           text-sm
                           font-semibold"
                >
                    {{ $sectionBadge }}
                </span>

            @endif


            @if($sectionTitle)

                <h2
                    class="text-4xl
                           font-bold
                           mt-6
                           text-gray-900"
                >
                    {{ $sectionTitle }}
                </h2>

            @endif


            @if($sectionSubtitle)

                <p
                    class="mt-4
                           text-orange-600
                           font-semibold"
                >
                    {{ $sectionSubtitle }}
                </p>

            @endif


            @if($sectionDescription)

                <p
                    class="mt-5
                           max-w-3xl
                           mx-auto
                           text-gray-600
                           leading-8"
                >
                    {{ $sectionDescription }}
                </p>

            @endif

        </div>


        {{-- =====================================================
            MISSION / VISION / VALUES CARDS
        ====================================================== --}}

        <div class="grid md:grid-cols-3 gap-8">

            @foreach($missionItems as $item)

                <div
                    class="bg-white
                           rounded-3xl
                           shadow-lg
                           p-10
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


                    {{-- OPTIONAL SUBTITLE --}}
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
                            class="mt-5
                                   text-gray-600
                                   leading-8"
                        >
                            {{ $item->description }}
                        </p>

                    @endif

                </div>

            @endforeach

        </div>

    </div>

</section>