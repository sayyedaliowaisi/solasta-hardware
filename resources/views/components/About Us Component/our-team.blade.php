@php
    /*
    |--------------------------------------------------------------------------
    | Section Content
    |--------------------------------------------------------------------------
    */

    $teamBadge =
        $section->badge
        ?: 'OUR TEAM';

    $teamTitle =
        $section->title
        ?: 'Meet Our Team';

    $teamSubtitle =
        $section->subtitle;

    $teamDescription =
        $section->description
        ?: 'Meet the people behind M R Hardware.';

    /*
    |--------------------------------------------------------------------------
    | Team Members
    |--------------------------------------------------------------------------
    */

    $teamMembers = $section->items ?? collect();
@endphp


<!-- =========================================================
     MEET OUR TEAM
========================================================= -->

<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6">


        <!-- =====================================================
             SECTION HEADER
        ====================================================== -->

        <div class="text-center mb-16">

            @if($teamBadge)

                <span
                    class="inline-block
                           bg-orange-100
                           text-orange-600
                           px-5 py-2
                           rounded-full
                           text-sm
                           font-semibold"
                >
                    {{ $teamBadge }}
                </span>

            @endif


            @if($teamTitle)

                <h2
                    class="text-4xl
                           md:text-5xl
                           font-bold
                           text-gray-900
                           mt-6"
                >
                    {{ $teamTitle }}
                </h2>

            @endif


            @if($teamSubtitle)

                <p
                    class="mt-4
                           text-orange-600
                           font-semibold"
                >
                    {{ $teamSubtitle }}
                </p>

            @endif


            @if($teamDescription)

                <p
                    class="text-gray-600
                           mt-5
                           max-w-3xl
                           mx-auto
                           leading-8
                           whitespace-pre-line"
                >
                    {{ $teamDescription }}
                </p>

            @endif

        </div>


        <!-- =====================================================
             TEAM MEMBERS
        ====================================================== -->

        @if($teamMembers->isNotEmpty())

            <div
                class="grid
                       md:grid-cols-2
                       lg:grid-cols-4
                       gap-8"
            >

                @foreach($teamMembers as $member)

                    @php
                        /*
                        |--------------------------------------------------------------------------
                        | Profile Link
                        |--------------------------------------------------------------------------
                        */

                        $profileUrl = null;

                        if (!empty($member->link)) {

                            $profileUrl =
                                str_starts_with(
                                    $member->link,
                                    'http://'
                                )
                                ||
                                str_starts_with(
                                    $member->link,
                                    'https://'
                                )
                                    ? $member->link
                                    : url($member->link);
                        }
                    @endphp


                    <!-- TEAM MEMBER -->

                    <div
                        class="bg-gray-50
                               rounded-3xl
                               overflow-hidden
                               shadow
                               hover:shadow-xl
                               transition
                               hover:-translate-y-2"
                    >


                        <!-- ==============================
                             MEMBER IMAGE
                        =============================== -->

                        @if(!empty($member->image))

                            <img
                                src="{{ asset($member->image) }}"
                                class="w-full h-80 object-cover"
                                alt="{{ $member->title ?: 'Team Member' }}"
                                loading="lazy"
                            >

                        @else

                            {{-- No fake team photo --}}
                            <div
                                class="w-full
                                       h-80
                                       bg-gradient-to-br
                                       from-gray-100
                                       to-gray-200
                                       flex
                                       items-center
                                       justify-center"
                            >

                                <div
                                    class="w-24 h-24
                                           rounded-full
                                           bg-white
                                           shadow-sm
                                           flex
                                           items-center
                                           justify-center
                                           text-4xl"
                                >
                                    👤
                                </div>

                            </div>

                        @endif


                        <!-- ==============================
                             MEMBER CONTENT
                        =============================== -->

                        <div class="p-6 text-center">


                            {{-- NAME --}}
                            @if(!empty($member->title))

                                <h3
                                    class="text-2xl
                                           font-bold
                                           text-gray-900"
                                >
                                    {{ $member->title }}
                                </h3>

                            @endif


                            {{-- DESIGNATION --}}
                            @if(!empty($member->subtitle))

                                <p
                                    class="text-orange-600
                                           font-medium
                                           mt-2"
                                >
                                    {{ $member->subtitle }}
                                </p>

                            @endif


                            {{-- OPTIONAL BIO --}}
                            @if(!empty($member->description))

                                <p
                                    class="mt-4
                                           text-sm
                                           leading-6
                                           text-gray-600
                                           whitespace-pre-line"
                                >
                                    {{ $member->description }}
                                </p>

                            @endif


                            {{-- OPTIONAL VALUE --}}
                            @if(!empty($member->value))

                                <p
                                    class="mt-3
                                           text-sm
                                           font-semibold
                                           text-gray-500"
                                >
                                    {{ $member->value }}
                                </p>

                            @endif


                            {{-- PROFILE / LINKEDIN --}}
                            @if($profileUrl)

                                <div
                                    class="flex
                                           justify-center
                                           gap-4
                                           mt-5"
                                >

                                    <a
                                        href="{{ $profileUrl }}"
                                        target="_blank"
                                        rel="noopener noreferrer"
                                        class="font-medium
                                               text-gray-700
                                               transition
                                               hover:text-orange-600"
                                    >
                                        View Profile
                                    </a>

                                </div>

                            @endif

                        </div>

                    </div>

                @endforeach

            </div>


        @else

            <!-- =================================================
                 NO TEAM MEMBERS
                 Admin logged-out public page par fake members
                 show nahi karenge.
            ================================================== -->

            <div
                class="max-w-3xl
                       mx-auto
                       rounded-3xl
                       bg-gray-50
                       px-8 py-12
                       text-center"
            >

                <div
                    class="w-16 h-16
                           mx-auto
                           rounded-2xl
                           bg-orange-100
                           flex
                           items-center
                           justify-center
                           text-3xl"
                >
                    👥
                </div>

                <h3
                    class="mt-5
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
                    Team information will be available here soon.
                </p>

            </div>

        @endif

    </div>

</section>