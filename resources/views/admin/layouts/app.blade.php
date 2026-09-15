<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>
        @yield('title', 'Admin Panel')
    </title>


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])


    {{-- Prevent Alpine elements flashing before Alpine loads --}}
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

</head>


<body
    x-data="{ sidebarOpen: false }"
    @keydown.escape.window="sidebarOpen = false"
    class="bg-slate-100 text-slate-900"
>

<div class="min-h-screen overflow-x-hidden">


    {{-- =====================================================
        MOBILE OVERLAY
    ====================================================== --}}

    <div
        x-cloak
        x-show="sidebarOpen"
        x-transition.opacity.duration.200ms
        @click="sidebarOpen = false"

        class="fixed inset-0 z-40
               bg-slate-950/60
               backdrop-blur-[2px]
               lg:hidden"
    ></div>



    {{-- =====================================================
        SIDEBAR
    ====================================================== --}}

    <div
        class="fixed
               inset-y-0 left-0
               z-50
               w-[270px]
               transform
               transition-transform
               duration-300
               ease-in-out
               lg:translate-x-0"

        :class="sidebarOpen
            ? 'translate-x-0'
            : '-translate-x-full lg:translate-x-0'"
    >

        @include('admin.partials.sidebar')

    </div>



    {{-- =====================================================
        MAIN AREA
    ====================================================== --}}

    <div
        class="min-h-screen
               min-w-0
               transition-[margin]
               duration-300
               lg:ml-[270px]"
    >


        {{-- =================================================
            TOPBAR
        ================================================== --}}

        <header
            class="sticky top-0 z-30
                   flex min-h-[72px]
                   items-center
                   justify-between
                   gap-4
                   border-b border-slate-200
                   bg-white/95
                   px-4
                   shadow-sm
                   backdrop-blur
                   sm:px-6
                   lg:px-8"
        >


            {{-- LEFT SIDE --}}

            <div
                class="flex
                       min-w-0
                       items-center
                       gap-3"
            >


                {{-- MOBILE HAMBURGER --}}

                <button
                    type="button"

                    @click="sidebarOpen = true"

                    class="inline-flex
                           h-10 w-10
                           shrink-0
                           items-center
                           justify-center
                           rounded-xl
                           border border-slate-200
                           bg-white
                           text-slate-700
                           shadow-sm
                           transition
                           hover:border-orange-300
                           hover:bg-orange-50
                           hover:text-orange-600
                           lg:hidden"

                    aria-label="Open admin sidebar"
                >

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="2"
                        stroke="currentColor"
                        class="h-5 w-5"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                </button>



                {{-- ADMIN INFO --}}

                <div class="min-w-0">

                    <p
                        class="text-[9px]
                               font-black uppercase
                               tracking-[0.18em]
                               text-slate-400
                               sm:text-[10px]"
                    >
                        Administration
                    </p>

                    <p
                        class="mt-1
                               truncate
                               text-[13px]
                               font-bold
                               text-slate-900
                               sm:text-sm"
                    >
                        {{ auth('admin')->user()->name }}
                    </p>

                </div>

            </div>



            {{-- =================================================
                RIGHT SIDE
            ================================================== --}}

            <div
                class="flex
                       shrink-0
                       items-center
                       gap-2
                       sm:gap-3"
            >


                {{-- VIEW WEBSITE --}}

                <a
                    href="{{ route('home') }}"
                    target="_blank"
                    rel="noopener noreferrer"

                    class="hidden
                           min-h-[40px]
                           items-center
                           justify-center
                           gap-2
                           rounded-xl
                           border border-slate-200
                           bg-white
                           px-4
                           text-xs
                           font-bold
                           text-slate-600
                           transition
                           hover:border-orange-300
                           hover:bg-orange-50
                           hover:text-orange-600
                           sm:inline-flex"
                >

                    <span>
                        View Website
                    </span>

                    <span>
                        ↗
                    </span>

                </a>



                {{-- LOGOUT --}}

                <form
                    action="{{ route('admin.logout') }}"
                    method="POST"
                >

                    @csrf

                    <button
                        type="submit"

                        class="inline-flex
                               min-h-[40px]
                               items-center
                               justify-center
                               rounded-xl
                               border border-slate-200
                               bg-white
                               px-3
                               text-[11px]
                               font-bold
                               text-slate-700
                               transition
                               hover:border-red-200
                               hover:bg-red-50
                               hover:text-red-600
                               sm:px-4
                               sm:text-xs"
                    >
                        Logout
                    </button>

                </form>

            </div>

        </header>



        {{-- =================================================
            PAGE CONTENT
        ================================================== --}}

        <main
            class="min-w-0
                   overflow-x-hidden
                   p-4
                   sm:p-6
                   lg:p-8"
        >


            {{-- =================================================
                GLOBAL FLASH MESSAGES
            ================================================== --}}

            <div class="mb-6 space-y-3">


                {{-- =============================================
                    SUCCESS MESSAGE
                ============================================== --}}

                @if(session('success'))

                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        role="alert"

                        class="flex
                               items-start
                               justify-between
                               gap-4
                               rounded-2xl
                               border border-emerald-200
                               bg-emerald-50
                               px-4 py-4
                               text-emerald-800
                               shadow-sm
                               sm:px-5"
                    >

                        <div class="flex min-w-0 items-start gap-3">

                            <div
                                class="flex h-9 w-9
                                       shrink-0
                                       items-center
                                       justify-center
                                       rounded-xl
                                       bg-emerald-100
                                       text-emerald-700"
                            >
                                ✓
                            </div>


                            <div class="min-w-0">

                                <p
                                    class="text-sm
                                           font-black
                                           text-emerald-900"
                                >
                                    Success
                                </p>

                                <p
                                    class="mt-1
                                           text-sm
                                           leading-6
                                           text-emerald-700"
                                >
                                    {{ session('success') }}
                                </p>

                            </div>

                        </div>


                        <button
                            type="button"
                            @click="show = false"
                            class="shrink-0
                                   rounded-lg
                                   px-2 py-1
                                   text-lg
                                   font-bold
                                   text-emerald-600
                                   transition
                                   hover:bg-emerald-100
                                   hover:text-emerald-900"
                            aria-label="Close alert"
                        >
                            ×
                        </button>

                    </div>

                @endif



                {{-- =============================================
                    ERROR MESSAGE
                ============================================== --}}

                @if(session('error'))

                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        role="alert"

                        class="flex
                               items-start
                               justify-between
                               gap-4
                               rounded-2xl
                               border border-red-200
                               bg-red-50
                               px-4 py-4
                               text-red-800
                               shadow-sm
                               sm:px-5"
                    >

                        <div class="flex min-w-0 items-start gap-3">

                            <div
                                class="flex h-9 w-9
                                       shrink-0
                                       items-center
                                       justify-center
                                       rounded-xl
                                       bg-red-100
                                       text-red-700"
                            >
                                !
                            </div>


                            <div class="min-w-0">

                                <p
                                    class="text-sm
                                           font-black
                                           text-red-900"
                                >
                                    Action Required
                                </p>

                                <p
                                    class="mt-1
                                           text-sm
                                           leading-6
                                           text-red-700"
                                >
                                    {{ session('error') }}
                                </p>

                            </div>

                        </div>


                        <button
                            type="button"
                            @click="show = false"
                            class="shrink-0
                                   rounded-lg
                                   px-2 py-1
                                   text-lg
                                   font-bold
                                   text-red-600
                                   transition
                                   hover:bg-red-100
                                   hover:text-red-900"
                            aria-label="Close alert"
                        >
                            ×
                        </button>

                    </div>

                @endif



                {{-- =============================================
                    WARNING MESSAGE
                ============================================== --}}

                @if(session('warning'))

                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        role="alert"

                        class="flex
                               items-start
                               justify-between
                               gap-4
                               rounded-2xl
                               border border-amber-200
                               bg-amber-50
                               px-4 py-4
                               text-amber-800
                               shadow-sm
                               sm:px-5"
                    >

                        <div class="flex min-w-0 items-start gap-3">

                            <div
                                class="flex h-9 w-9
                                       shrink-0
                                       items-center
                                       justify-center
                                       rounded-xl
                                       bg-amber-100
                                       text-amber-700"
                            >
                                !
                            </div>


                            <div class="min-w-0">

                                <p
                                    class="text-sm
                                           font-black
                                           text-amber-900"
                                >
                                    Warning
                                </p>

                                <p
                                    class="mt-1
                                           text-sm
                                           leading-6
                                           text-amber-700"
                                >
                                    {{ session('warning') }}
                                </p>

                            </div>

                        </div>


                        <button
                            type="button"
                            @click="show = false"
                            class="shrink-0
                                   rounded-lg
                                   px-2 py-1
                                   text-lg
                                   font-bold
                                   text-amber-600
                                   transition
                                   hover:bg-amber-100
                                   hover:text-amber-900"
                            aria-label="Close alert"
                        >
                            ×
                        </button>

                    </div>

                @endif



                {{-- =============================================
                    VALIDATION ERRORS
                ============================================== --}}

                @if($errors->any())

                    <div
                        x-data="{ show: true }"
                        x-show="show"
                        x-transition
                        role="alert"

                        class="rounded-2xl
                               border border-red-200
                               bg-red-50
                               px-4 py-4
                               shadow-sm
                               sm:px-5"
                    >

                        <div
                            class="flex
                                   items-start
                                   justify-between
                                   gap-4"
                        >

                            <div class="flex min-w-0 items-start gap-3">

                                <div
                                    class="flex h-9 w-9
                                           shrink-0
                                           items-center
                                           justify-center
                                           rounded-xl
                                           bg-red-100
                                           text-red-700"
                                >
                                    !
                                </div>


                                <div class="min-w-0">

                                    <p
                                        class="text-sm
                                               font-black
                                               text-red-900"
                                    >
                                        Please check the form
                                    </p>

                                    <p
                                        class="mt-1
                                               text-sm
                                               text-red-700"
                                    >
                                        Some information needs your attention.
                                    </p>

                                </div>

                            </div>


                            <button
                                type="button"
                                @click="show = false"
                                class="shrink-0
                                       rounded-lg
                                       px-2 py-1
                                       text-lg
                                       font-bold
                                       text-red-600
                                       transition
                                       hover:bg-red-100
                                       hover:text-red-900"
                                aria-label="Close alert"
                            >
                                ×
                            </button>

                        </div>


                        <ul
                            class="mt-4
                                   space-y-1.5
                                   border-t border-red-200
                                   pt-3
                                   text-sm
                                   leading-6
                                   text-red-700"
                        >

                            @foreach($errors->all() as $error)

                                <li class="flex items-start gap-2">

                                    <span class="mt-[1px]">
                                        •
                                    </span>

                                    <span>
                                        {{ $error }}
                                    </span>

                                </li>

                            @endforeach

                        </ul>

                    </div>

                @endif

            </div>



            {{-- =================================================
                CURRENT PAGE
            ================================================== --}}

            @yield('content')

        </main>

    </div>

</div>


@stack('scripts')

</body>

</html>