<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>
        Admin Login | M R Hardware
    </title>


    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

</head>


<body
    class="min-h-screen
           bg-[#071a2d]
           flex
           items-center
           justify-center
           px-4
           py-10"
>


<div
    class="w-full
           max-w-[430px]"
>


    {{-- BRAND --}}
    <div class="mb-8 text-center">

        <div
            class="mx-auto
                   flex
                   h-16 w-16
                   items-center
                   justify-center
                   rounded-2xl
                   bg-orange-600
                   text-2xl
                   font-black
                   text-white
                   shadow-xl
                   shadow-orange-600/20"
        >
            MR
        </div>


        <p
            class="mt-5
                   text-xs
                   font-bold
                   uppercase
                   tracking-[0.25em]
                   text-orange-400"
        >
            M R Hardware
        </p>


        <h1
            class="mt-2
                   text-3xl
                   font-black
                   text-white"
        >
            Admin Login
        </h1>


        <p
            class="mt-2
                   text-sm
                   text-slate-400"
        >
            Sign in to manage the website
        </p>

    </div>



    {{-- LOGIN CARD --}}
    <div
        class="rounded-3xl
               border
               border-white/10
               bg-white
               p-6
               sm:p-8
               shadow-2xl"
    >


        @if($errors->any())

            <div
                class="mb-6
                       rounded-xl
                       border
                       border-red-200
                       bg-red-50
                       px-4 py-3
                       text-sm
                       font-medium
                       text-red-700"
            >

                {{ $errors->first() }}

            </div>

        @endif



        <form
            action="{{ route('admin.login.submit') }}"
            method="POST"
            class="space-y-5"
        >

            @csrf


            {{-- EMAIL --}}
            <div>

                <label
                    for="email"
                    class="mb-2
                           block
                           text-sm
                           font-bold
                           text-slate-800"
                >
                    Email Address
                </label>


                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    required
                    autofocus
                    autocomplete="email"
                    placeholder="admin@example.com"

                    class="w-full
                           rounded-xl
                           border
                           border-slate-300
                           px-4 py-3.5
                           outline-none
                           transition
                           focus:border-orange-500
                           focus:ring-4
                           focus:ring-orange-500/10"
                >

            </div>



            {{-- PASSWORD --}}
            <div>

                <label
                    for="password"
                    class="mb-2
                           block
                           text-sm
                           font-bold
                           text-slate-800"
                >
                    Password
                </label>


                <input
                    type="password"
                    id="password"
                    name="password"
                    required
                    autocomplete="current-password"
                    placeholder="Enter password"

                    class="w-full
                           rounded-xl
                           border
                           border-slate-300
                           px-4 py-3.5
                           outline-none
                           transition
                           focus:border-orange-500
                           focus:ring-4
                           focus:ring-orange-500/10"
                >

            </div>



            {{-- REMEMBER --}}
            <label
                class="flex
                       items-center
                       gap-3
                       text-sm
                       text-slate-600"
            >

                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                    class="h-4
                           w-4
                           rounded
                           border-slate-300
                           text-orange-600
                           focus:ring-orange-500"
                >

                Keep me signed in

            </label>



            <button
                type="submit"
                class="flex
                       w-full
                       items-center
                       justify-center
                       rounded-xl
                       bg-orange-600
                       px-6 py-4
                       text-sm
                       font-black
                       text-white
                       transition
                       hover:bg-orange-500"
            >
                Login to Admin
            </button>

        </form>

    </div>


    <p
        class="mt-6
               text-center
               text-xs
               text-slate-500"
    >
        Authorized access only
    </p>

</div>

</body>

</html>