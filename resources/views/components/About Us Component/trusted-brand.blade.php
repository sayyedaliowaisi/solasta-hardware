@php
    /*
    |--------------------------------------------------------------------------
    | Section Content
    |--------------------------------------------------------------------------
    */

    $brandBadge =
        $section->badge
        ?: 'BRANDS';

    $brandTitle =
        $section->title
        ?: 'Brands & Products';

    $brandSubtitle =
        $section->subtitle;

    $brandDescription =
        $section->description
        ?: 'Explore brand and product information available through M R Hardware.';


    /*
    |--------------------------------------------------------------------------
    | CMS Brand Items
    |--------------------------------------------------------------------------
    |
    | title       = Brand Name
    | subtitle    = Optional label
    | description = Optional description
    | image       = Brand logo
    | link        = Optional URL
    |
    */

    $brandItems = $section->items ?? collect();
@endphp


<!-- =========================================================
     TRUSTED BRANDS
========================================================= -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">


        <!-- =====================================================
             SECTION HEADER
        ====================================================== -->

        <div class="text-center mb-16">

            @if($brandBadge)

                <span
                    class="inline-block
                           bg-orange-100
                           text-orange-600
                           px-5 py-2
                           rounded-full
                           text-sm
                           font-semibold"
                >
                    {{ $brandBadge }}
                </span>

            @endif


            @if($brandTitle)

                <h2
                    class="text-4xl
                           md:text-5xl
                           font-bold
                           text-gray-900
                           mt-6"
                >
                    {{ $brandTitle }}
                </h2>

            @endif


            @if($brandSubtitle)

                <p
                    class="mt-4
                           font-semibold
                           text-orange-600"
                >
                    {{ $brandSubtitle }}
                </p>

            @endif


            @if($brandDescription)

                <p
                    class="text-gray-600
                           mt-5
                           max-w-3xl
                           mx-auto
                           leading-8
                           whitespace-pre-line"
                >
                    {{ $brandDescription }}
                </p>

            @endif

        </div>


        <!-- =====================================================
             BRAND LOGOS
        ====================================================== -->

        @if($brandItems->isNotEmpty())

            <div
                class="grid
                       grid-cols-2
                       md:grid-cols-3
                       lg:grid-cols-6
                       gap-8"
            >

                @foreach($brandItems as $brand)

                    @php
                        $brandUrl = null;

                        if (!empty($brand->link)) {

                            $brandUrl =
                                str_starts_with($brand->link, 'http://') ||
                                str_starts_with($brand->link, 'https://') ||
                                str_starts_with($brand->link, '#')
                                    ? $brand->link
                                    : url($brand->link);
                        }
                    @endphp


                    @if($brandUrl)

                        <a
                            href="{{ $brandUrl }}"
                            @if(
                                str_starts_with($brandUrl, 'http://') ||
                                str_starts_with($brandUrl, 'https://')
                            )
                                target="_blank"
                                rel="noopener noreferrer"
                            @endif
                            class="group
                                   bg-white
                                   border
                                   border-gray-200
                                   rounded-2xl
                                   p-6
                                   shadow
                                   hover:shadow-lg
                                   hover:-translate-y-1
                                   transition
                                   duration-300
                                   flex
                                   justify-center
                                   items-center
                                   h-36"
                        >

                            @if(!empty($brand->image))

                                <img
                                    src="{{ asset($brand->image) }}"
                                    alt="{{ $brand->title ?: 'Brand' }}"
                                    class="max-h-14
                                           max-w-full
                                           object-contain
                                           transition
                                           duration-300
                                           group-hover:scale-105"
                                    loading="lazy"
                                >

                            @else

                                <span
                                    class="text-center
                                           text-lg
                                           font-bold
                                           text-gray-800
                                           transition
                                           group-hover:text-orange-600"
                                >
                                    {{ $brand->title ?: 'Brand' }}
                                </span>

                            @endif

                        </a>


                    @else

                        <div
                            class="group
                                   bg-white
                                   border
                                   border-gray-200
                                   rounded-2xl
                                   p-6
                                   shadow
                                   hover:shadow-lg
                                   hover:-translate-y-1
                                   transition
                                   duration-300
                                   flex
                                   justify-center
                                   items-center
                                   h-36"
                        >

                            @if(!empty($brand->image))

                                <img
                                    src="{{ asset($brand->image) }}"
                                    alt="{{ $brand->title ?: 'Brand' }}"
                                    class="max-h-14
                                           max-w-full
                                           object-contain
                                           transition
                                           duration-300
                                           group-hover:scale-105"
                                    loading="lazy"
                                >

                            @else

                                <span
                                    class="text-center
                                           text-lg
                                           font-bold
                                           text-gray-800"
                                >
                                    {{ $brand->title ?: 'Brand' }}
                                </span>

                            @endif

                        </div>

                    @endif

                @endforeach

            </div>

        @else

            {{-- =================================================
                 NO VERIFIED BRANDS
            ================================================== --}}

            <div
                class="max-w-3xl
                       mx-auto
                       rounded-3xl
                       border border-gray-100
                       bg-gray-50
                       px-8 py-10
                       text-center"
            >

                <div class="text-4xl">
                    🔩
                </div>

                <h3
                    class="mt-4
                           text-xl
                           font-bold
                           text-gray-900"
                >
                    M R Hardware
                </h3>

                <p
                    class="mt-3
                           text-gray-600
                           leading-7"
                >
                    Contact us for current product and brand availability.
                </p>

            </div>

        @endif

    </div>

</section>