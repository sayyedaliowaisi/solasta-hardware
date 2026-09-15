@php
    $storyBadge =
        $section->badge
        ?: 'OUR STORY';

    $storyTitle =
        $section->title
        ?: 'Building Long-Term Relationships Through Quality';

    $storySubtitle =
        $section->subtitle;

    $storyDescription =
        $section->description
        ?: 'M R Hardware was established in 2014 and is engaged in manufacturing and trading hardware products.';

    $storyImage =
        $section->image
        ?: 'images/about/company-story.jpg';

    $storyButtonText =
        $section->button_text;

    $storyButtonLink =
        $section->button_link
        ?: '/products';

    $storyButtonUrl =
        str_starts_with($storyButtonLink, 'http://') ||
        str_starts_with($storyButtonLink, 'https://') ||
        str_starts_with($storyButtonLink, '#')
            ? $storyButtonLink
            : url($storyButtonLink);
@endphp


<!-- =========================================================
     COMPANY STORY
========================================================= -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">

        <div class="grid lg:grid-cols-2 gap-16 items-center">


            <!-- =====================================================
                 LEFT IMAGE
            ====================================================== -->

            <div>

                <img
                    src="{{ asset($storyImage) }}"
                    alt="{{ $storyTitle }}"
                    class="rounded-3xl shadow-xl w-full"
                >

            </div>


            <!-- =====================================================
                 RIGHT CONTENT
            ====================================================== -->

            <div>

                @if($storyBadge)

                    <span
                        class="inline-block
                               bg-orange-100
                               text-orange-600
                               px-5 py-2
                               rounded-full
                               text-sm
                               font-semibold"
                    >
                        {{ $storyBadge }}
                    </span>

                @endif


                @if($storyTitle)

                    <h2
                        class="text-4xl
                               font-bold
                               text-gray-900
                               mt-6"
                    >
                        {{ $storyTitle }}
                    </h2>

                @endif


                @if($storySubtitle)

                    <p
                        class="mt-4
                               text-orange-600
                               font-semibold"
                    >
                        {{ $storySubtitle }}
                    </p>

                @endif


                @if($storyDescription)

                    <div
                        class="text-gray-600
                               mt-6
                               leading-8
                               whitespace-pre-line"
                    >{{ $storyDescription }}</div>

                @endif


                @if($storyButtonText)

                    <div class="mt-8">

                        <a
                            href="{{ $storyButtonUrl }}"
                            class="inline-flex
                                   items-center
                                   justify-center
                                   px-7 py-3.5
                                   bg-orange-600
                                   text-white
                                   rounded-xl
                                   font-semibold
                                   hover:bg-orange-700
                                   transition"
                        >
                            {{ $storyButtonText }}

                            <span class="ml-2">
                                →
                            </span>
                        </a>

                    </div>

                @endif

            </div>

        </div>

    </div>

</section>