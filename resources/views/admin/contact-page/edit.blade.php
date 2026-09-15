@extends('admin.layouts.app')

@section('title', 'Contact Page | Admin')

@section('content')

<div class="min-h-screen bg-slate-50">

    {{-- =========================================================
         HEADER
    ========================================================== --}}
    <div class="border-b border-slate-200 bg-white">

        <div
            class="mx-auto flex max-w-[1400px]
                   flex-col gap-4
                   px-4 py-6
                   sm:px-6
                   lg:flex-row
                   lg:items-center
                   lg:justify-between
                   lg:px-8"
        >

            <div>

                <p
                    class="text-[10px]
                           font-bold uppercase
                           tracking-[0.18em]
                           text-orange-600"
                >
                    Website Content
                </p>

                <h1
                    class="mt-1
                           text-2xl
                           font-black
                           tracking-[-0.03em]
                           text-slate-950"
                >
                    Contact Page
                </h1>

                <p
                    class="mt-1
                           text-sm
                           text-slate-500"
                >
                    Manage contact page headings, enquiry form content and map settings.
                </p>

            </div>


            <a
                href="{{ route('contact') }}"
                target="_blank"
                class="inline-flex
                       min-h-[42px]
                       items-center
                       justify-center
                       rounded-xl
                       border border-slate-200
                       bg-white
                       px-5
                       text-xs
                       font-bold
                       text-slate-700
                       transition
                       hover:border-orange-300
                       hover:text-orange-600"
            >
                View Contact Page ↗
            </a>

        </div>

    </div>



    <div class="mx-auto max-w-[1400px] px-4 py-7 sm:px-6 lg:px-8">

        {{-- SUCCESS --}}
        @if(session('success'))

            <div
                class="mb-6
                       rounded-2xl
                       border border-green-200
                       bg-green-50
                       px-5 py-4
                       text-sm
                       font-semibold
                       text-green-700"
            >
                {{ session('success') }}
            </div>

        @endif


        {{-- ERRORS --}}
        @if($errors->any())

            <div
                class="mb-6
                       rounded-2xl
                       border border-red-200
                       bg-red-50
                       px-5 py-4"
            >

                <p class="font-bold text-red-700">
                    Please fix the following:
                </p>

                <ul class="mt-2 list-disc pl-5 text-sm text-red-600">

                    @foreach($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif



        <form
            action="{{ route('admin.contact-page.update') }}"
            method="POST"
        >

            @csrf
            @method('PUT')


            <div class="space-y-6">


                {{-- =====================================================
                     HERO
                ====================================================== --}}
                <section
                    class="overflow-hidden
                           rounded-[22px]
                           border border-slate-200
                           bg-white
                           shadow-sm"
                >

                    <div
                        class="border-b border-slate-100
                               px-5 py-4
                               sm:px-6"
                    >

                        <h2 class="text-base font-black text-slate-950">
                            Hero Section
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Main heading shown at the top of the contact page.
                        </p>

                    </div>


                    <div
                        class="grid gap-5
                               p-5 sm:p-6
                               md:grid-cols-2"
                    >

                        <div>

                            <label
                                for="badge"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Hero Badge
                            </label>

                            <input
                                type="text"
                                id="badge"
                                name="badge"
                                value="{{ old('badge', $contactSettings->badge) }}"
                                placeholder="Contact Us"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div>

                            <label
                                for="title"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Hero Title
                            </label>

                            <input
                                type="text"
                                id="title"
                                name="title"
                                value="{{ old('title', $contactSettings->title) }}"
                                placeholder="Let's Talk"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div class="md:col-span-2">

                            <label
                                for="description"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Hero Description
                            </label>

                            <textarea
                                id="description"
                                name="description"
                                rows="3"
                                placeholder="Contact us for product enquiries..."
                                class="w-full
                                       resize-none
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >{{ old('description', $contactSettings->description) }}</textarea>

                        </div>

                    </div>

                </section>



                {{-- =====================================================
                     CONTACT DETAILS SECTION
                ====================================================== --}}
                <section
                    class="overflow-hidden
                           rounded-[22px]
                           border border-slate-200
                           bg-white
                           shadow-sm"
                >

                    <div
                        class="border-b border-slate-100
                               px-5 py-4
                               sm:px-6"
                    >

                        <h2 class="text-base font-black text-slate-950">
                            Contact Details Section
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Content shown above phone, email and address cards.
                        </p>

                    </div>


                    <div
                        class="grid gap-5
                               p-5 sm:p-6
                               md:grid-cols-2"
                    >

                        <div>

                            <label
                                for="details_badge"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Section Badge
                            </label>

                            <input
                                type="text"
                                id="details_badge"
                                name="details_badge"
                                value="{{ old('details_badge', $contactSettings->details_badge) }}"
                                placeholder="Contact Details"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div>

                            <label
                                for="details_title"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Section Title
                            </label>

                            <input
                                type="text"
                                id="details_title"
                                name="details_title"
                                value="{{ old('details_title', $contactSettings->details_title) }}"
                                placeholder="Get in touch"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div class="md:col-span-2">

                            <label
                                for="details_description"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Section Description
                            </label>

                            <textarea
                                id="details_description"
                                name="details_description"
                                rows="3"
                                placeholder="Contact M R Hardware for product enquiries..."
                                class="w-full
                                       resize-none
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >{{ old('details_description', $contactSettings->details_description) }}</textarea>

                        </div>

                    </div>

                </section>



                {{-- =====================================================
                     ENQUIRY FORM CONTENT
                ====================================================== --}}
                <section
                    class="overflow-hidden
                           rounded-[22px]
                           border border-slate-200
                           bg-white
                           shadow-sm"
                >

                    <div
                        class="border-b border-slate-100
                               px-5 py-4
                               sm:px-6"
                    >

                        <h2 class="text-base font-black text-slate-950">
                            Enquiry Form
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Manage the text displayed above and inside the enquiry section.
                        </p>

                    </div>


                    <div
                        class="grid gap-5
                               p-5 sm:p-6
                               md:grid-cols-2"
                    >

                        <div>

                            <label
                                for="form_badge"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Form Badge
                            </label>

                            <input
                                type="text"
                                id="form_badge"
                                name="form_badge"
                                value="{{ old('form_badge', $contactSettings->form_badge) }}"
                                placeholder="Enquiry Form"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div>

                            <label
                                for="form_button_text"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Submit Button Text
                            </label>

                            <input
                                type="text"
                                id="form_button_text"
                                name="form_button_text"
                                value="{{ old('form_button_text', $contactSettings->form_button_text) }}"
                                placeholder="Send Enquiry"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div class="md:col-span-2">

                            <label
                                for="form_title"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Form Title
                            </label>

                            <input
                                type="text"
                                id="form_title"
                                name="form_title"
                                value="{{ old('form_title', $contactSettings->form_title) }}"
                                placeholder="Send us a message"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div class="md:col-span-2">

                            <label
                                for="form_description"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Form Description
                            </label>

                            <textarea
                                id="form_description"
                                name="form_description"
                                rows="3"
                                placeholder="Share your requirement and our team will get back to you."
                                class="w-full
                                       resize-none
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >{{ old('form_description', $contactSettings->form_description) }}</textarea>

                        </div>

                    </div>

                </section>



                {{-- =====================================================
                     MAP / DISPLAY SETTINGS
                ====================================================== --}}
                <section
                    class="overflow-hidden
                           rounded-[22px]
                           border border-slate-200
                           bg-white
                           shadow-sm"
                >

                    <div
                        class="border-b border-slate-100
                               px-5 py-4
                               sm:px-6"
                    >

                        <h2 class="text-base font-black text-slate-950">
                            Map & Display Settings
                        </h2>

                        <p class="mt-1 text-xs text-slate-500">
                            Control contact cards and Google Maps display.
                        </p>

                    </div>


                    <div class="p-5 sm:p-6">

                        <div>

                            <label
                                for="map_embed"
                                class="mb-2 block
                                       text-xs font-bold
                                       text-slate-700"
                            >
                                Google Maps Embed URL
                            </label>

                            <textarea
                                id="map_embed"
                                name="map_embed"
                                rows="3"
                                placeholder="https://www.google.com/maps/embed?..."
                                class="w-full
                                       resize-none
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-sm
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >{{ old('map_embed', $contactSettings->map_embed) }}</textarea>

                            <p class="mt-2 text-[11px] text-slate-400">
                                Paste only the URL from the iframe src attribute.
                            </p>

                        </div>


                        <div class="mt-6 grid gap-4 md:grid-cols-2">


                            {{-- SHOW CONTACT CARDS --}}
                            <label
                                class="flex cursor-pointer
                                       items-start gap-3
                                       rounded-2xl
                                       border border-slate-200
                                       bg-slate-50
                                       p-4"
                            >

                                <input
                                    type="checkbox"
                                    name="show_contact_cards"
                                    value="1"
                                    @checked(old(
                                        'show_contact_cards',
                                        $contactSettings->show_contact_cards
                                    ))
                                    class="mt-1
                                           h-4 w-4
                                           rounded
                                           border-slate-300
                                           text-orange-600
                                           focus:ring-orange-500"
                                >

                                <span>

                                    <span
                                        class="block
                                               text-sm
                                               font-bold
                                               text-slate-900"
                                    >
                                        Show Contact Cards
                                    </span>

                                    <span
                                        class="mt-1 block
                                               text-xs
                                               leading-5
                                               text-slate-500"
                                    >
                                        Display phone, email and address cards on the public page.
                                    </span>

                                </span>

                            </label>



                            {{-- SHOW MAP --}}
                            <label
                                class="flex cursor-pointer
                                       items-start gap-3
                                       rounded-2xl
                                       border border-slate-200
                                       bg-slate-50
                                       p-4"
                            >

                                <input
                                    type="checkbox"
                                    name="show_map"
                                    value="1"
                                    @checked(old(
                                        'show_map',
                                        $contactSettings->show_map
                                    ))
                                    class="mt-1
                                           h-4 w-4
                                           rounded
                                           border-slate-300
                                           text-orange-600
                                           focus:ring-orange-500"
                                >

                                <span>

                                    <span
                                        class="block
                                               text-sm
                                               font-bold
                                               text-slate-900"
                                    >
                                        Show Map
                                    </span>

                                    <span
                                        class="mt-1 block
                                               text-xs
                                               leading-5
                                               text-slate-500"
                                    >
                                        Show Google Maps section when an embed URL is available.
                                    </span>

                                </span>

                            </label>

                        </div>

                    </div>

                </section>

            </div>



            {{-- =====================================================
                 SAVE BAR
            ====================================================== --}}
            <div
                class="sticky bottom-4 z-20
                       mt-7
                       flex flex-col gap-3
                       rounded-2xl
                       border border-slate-200
                       bg-white/95
                       p-4
                       shadow-[0_15px_40px_rgba(15,23,42,0.12)]
                       backdrop-blur
                       sm:flex-row
                       sm:items-center
                       sm:justify-between"
            >

                <p class="text-xs text-slate-500">
                    Save changes to update the public Contact page.
                </p>


                <button
                    type="submit"
                    class="inline-flex
                           min-h-[44px]
                           items-center
                           justify-center
                           rounded-xl
                           bg-orange-600
                           px-7
                           text-sm
                           font-bold
                           text-white
                           transition
                           hover:bg-orange-500"
                >
                    Save Contact Page
                </button>

            </div>

        </form>

    </div>

</div>

@endsection