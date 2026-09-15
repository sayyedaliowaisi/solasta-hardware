@extends('admin.layouts.app')

@section('title', 'Website Settings | Admin')

@section('content')

<div class="max-w-6xl">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}
    <div>

        <p
            class="text-xs
                   font-bold uppercase
                   tracking-[0.18em]
                   text-orange-600"
        >
            Website CMS
        </p>

        <h1
            class="mt-2
                   text-3xl
                   font-black
                   text-slate-950"
        >
            Website Settings
        </h1>

        <p class="mt-2 text-slate-500">
            Manage company information, navbar, footer and contact page.
        </p>

    </div>



    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}
    @if(session('success'))

        <div
            class="mt-6
                   rounded-xl
                   border border-green-200
                   bg-green-50
                   px-5 py-4
                   text-sm
                   font-bold
                   text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif



    {{-- =========================================================
        VALIDATION ERRORS
    ========================================================== --}}
    @if($errors->any())

        <div
            class="mt-6
                   rounded-xl
                   border border-red-200
                   bg-red-50
                   px-5 py-4"
        >

            <p
                class="text-sm
                       font-bold
                       text-red-700"
            >
                Please check the fields below.
            </p>

            <ul
                class="mt-2
                       list-disc
                       space-y-1
                       pl-5
                       text-xs
                       text-red-600"
            >

                @foreach($errors->all() as $error)

                    <li>
                        {{ $error }}
                    </li>

                @endforeach

            </ul>

        </div>

    @endif



    {{-- =========================================================
        WEBSITE SETTINGS FORM
    ========================================================== --}}
    <form
        action="{{ route('admin.settings.update') }}"
        method="POST"
        class="mt-8
               rounded-3xl
               border border-slate-200
               bg-white
               p-6
               shadow-sm
               sm:p-8"
    >

        @csrf
        @method('PUT')



        {{-- =====================================================
            GENERAL INFORMATION
        ====================================================== --}}
        <div>

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-orange-600"
            >
                Company
            </p>

            <h2
                class="mt-1
                       text-xl
                       font-black
                       text-slate-950"
            >
                General Information
            </h2>

            <p
                class="mt-2
                       text-sm
                       leading-6
                       text-slate-500"
            >
                Main business details used across the website.
            </p>

        </div>


        <div class="mt-6 grid gap-6 lg:grid-cols-2">


            {{-- COMPANY NAME --}}
            <div>

                <label
                    for="company_name"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    Company Name
                </label>

                <input
                    type="text"
                    id="company_name"
                    name="company_name"
                    value="{{ old(
                        'company_name',
                        $siteSettings->company_name
                    ) }}"
                    placeholder="M R Hardware"
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

                @error('company_name')
                    <p class="mt-1 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>



            {{-- TAGLINE --}}
            <div>

                <label
                    for="tagline"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    Brand Tagline
                </label>

                <input
                    type="text"
                    id="tagline"
                    name="tagline"
                    value="{{ old(
                        'tagline',
                        $siteSettings->tagline
                    ) }}"
                    placeholder="Hardware Supplier"
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

                @error('tagline')
                    <p class="mt-1 text-xs text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>



            {{-- LOGO --}}
            <div>

                <label
                    for="logo"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    Logo Path
                </label>

                <input
                    type="text"
                    id="logo"
                    name="logo"
                    value="{{ old(
                        'logo',
                        $siteSettings->logo
                    ) }}"
                    placeholder="images/logo.png"
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



            {{-- FAVICON --}}
            <div>

                <label
                    for="favicon"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    Favicon Path
                </label>

                <input
                    type="text"
                    id="favicon"
                    name="favicon"
                    value="{{ old(
                        'favicon',
                        $siteSettings->favicon
                    ) }}"
                    placeholder="images/favicon.png"
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



            {{-- PHONE --}}
            <div>

                <label
                    for="phone"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    Phone
                </label>

                <input
                    type="text"
                    id="phone"
                    name="phone"
                    value="{{ old(
                        'phone',
                        $siteSettings->phone
                    ) }}"
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



            {{-- WHATSAPP --}}
            <div>

                <label
                    for="whatsapp"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    WhatsApp Number
                </label>

                <input
                    type="text"
                    id="whatsapp"
                    name="whatsapp"
                    value="{{ old(
                        'whatsapp',
                        $siteSettings->whatsapp
                    ) }}"
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



            {{-- EMAIL --}}
            <div>

                <label
                    for="email"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old(
                        'email',
                        $siteSettings->email
                    ) }}"
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



            {{-- ADDRESS --}}
            <div class="lg:col-span-2">

                <label
                    for="address"
                    class="mb-2 block
                           text-sm
                           font-bold
                           text-slate-700"
                >
                    Business Address
                </label>

                <textarea
                    id="address"
                    name="address"
                    rows="4"
                    class="w-full
                           rounded-xl
                           border border-slate-300
                           px-4 py-3
                           text-sm
                           leading-6
                           outline-none
                           transition
                           focus:border-orange-500
                           focus:ring-4
                           focus:ring-orange-500/10"
                >{{ old(
                    'address',
                    $siteSettings->address
                ) }}</textarea>

            </div>

        </div>



        {{-- =====================================================
            NAVBAR
        ====================================================== --}}
        <div
            class="mt-10
                   border-t
                   border-slate-200
                   pt-8"
        >

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-orange-600"
            >
                Navbar
            </p>

            <h2
                class="mt-1
                       text-xl
                       font-black
                       text-slate-950"
            >
                Navigation Content
            </h2>

            <p
                class="mt-2
                       text-sm
                       leading-6
                       text-slate-500"
            >
                Control public navbar labels, phone label and main CTA.
            </p>

        </div>


        <div class="mt-6 grid gap-6 lg:grid-cols-2">


            {{-- HOME --}}
            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Home Label
                </label>

                <input
                    type="text"
                    name="nav_home_text"
                    value="{{ old(
                        'nav_home_text',
                        $siteSettings->nav_home_text
                    ) }}"
                    placeholder="Home"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            {{-- ABOUT --}}
            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    About Label
                </label>

                <input
                    type="text"
                    name="nav_about_text"
                    value="{{ old(
                        'nav_about_text',
                        $siteSettings->nav_about_text
                    ) }}"
                    placeholder="About"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            {{-- PRODUCTS --}}
            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Products Label
                </label>

                <input
                    type="text"
                    name="nav_products_text"
                    value="{{ old(
                        'nav_products_text',
                        $siteSettings->nav_products_text
                    ) }}"
                    placeholder="Products"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            {{-- CONTACT --}}
            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Contact Label
                </label>

                <input
                    type="text"
                    name="nav_contact_text"
                    value="{{ old(
                        'nav_contact_text',
                        $siteSettings->nav_contact_text
                    ) }}"
                    placeholder="Contact"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            {{-- CALL LABEL --}}
            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Phone Label
                </label>

                <input
                    type="text"
                    name="nav_call_label"
                    value="{{ old(
                        'nav_call_label',
                        $siteSettings->nav_call_label
                    ) }}"
                    placeholder="Call Us"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            {{-- CTA BUTTON TEXT --}}
            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    CTA Button Text
                </label>

                <input
                    type="text"
                    name="navbar_button_text"
                    value="{{ old(
                        'navbar_button_text',
                        $siteSettings->navbar_button_text
                    ) }}"
                    placeholder="Request Quote"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            {{-- CTA BUTTON LINK --}}
            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    CTA Button Link
                </label>

                <input
                    type="text"
                    name="navbar_button_link"
                    value="{{ old(
                        'navbar_button_link',
                        $siteSettings->navbar_button_link
                    ) }}"
                    placeholder="/contact"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>

        </div>



        {{-- =====================================================
            NAVBAR MEGA MENU
        ====================================================== --}}
        <div
            class="mt-8
                   rounded-2xl
                   border border-slate-200
                   bg-slate-50
                   p-5
                   sm:p-6"
        >

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-slate-400"
            >
                Product Mega Menu
            </p>


            <div class="mt-5 grid gap-6 lg:grid-cols-2">


                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Collection Badge
                    </label>

                    <input
                        type="text"
                        name="nav_collection_badge"
                        value="{{ old(
                            'nav_collection_badge',
                            $siteSettings->nav_collection_badge
                        ) }}"
                        placeholder="Collection"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>



                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Collection Title
                    </label>

                    <input
                        type="text"
                        name="nav_collection_title"
                        value="{{ old(
                            'nav_collection_title',
                            $siteSettings->nav_collection_title
                        ) }}"
                        placeholder="Hardware Products"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>



                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        More Products Badge
                    </label>

                    <input
                        type="text"
                        name="nav_more_products_badge"
                        value="{{ old(
                            'nav_more_products_badge',
                            $siteSettings->nav_more_products_badge
                        ) }}"
                        placeholder="More Products"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>



                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        More Products Title
                    </label>

                    <input
                        type="text"
                        name="nav_more_products_title"
                        value="{{ old(
                            'nav_more_products_title',
                            $siteSettings->nav_more_products_title
                        ) }}"
                        placeholder="More Categories"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>



                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Featured Panel Title
                    </label>

                    <input
                        type="text"
                        name="nav_featured_title"
                        value="{{ old(
                            'nav_featured_title',
                            $siteSettings->nav_featured_title
                        ) }}"
                        placeholder="Hardware Product Collection"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>



                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Featured Panel Description
                    </label>

                    <textarea
                        name="nav_featured_description"
                        rows="3"
                        placeholder="Explore our available hardware categories and contact us for model-wise product details."
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm leading-6 outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >{{ old(
                        'nav_featured_description',
                        $siteSettings->nav_featured_description
                    ) }}</textarea>

                </div>



                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Explore Products Text
                    </label>

                    <input
                        type="text"
                        name="nav_explore_products_text"
                        value="{{ old(
                            'nav_explore_products_text',
                            $siteSettings->nav_explore_products_text
                        ) }}"
                        placeholder="Explore Products"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>



                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Contact CTA Text
                    </label>

                    <input
                        type="text"
                        name="nav_contact_cta_text"
                        value="{{ old(
                            'nav_contact_cta_text',
                            $siteSettings->nav_contact_cta_text
                        ) }}"
                        placeholder="Contact Us"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>



                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Enquiry Prompt
                    </label>

                    <input
                        type="text"
                        name="nav_enquiry_prompt"
                        value="{{ old(
                            'nav_enquiry_prompt',
                            $siteSettings->nav_enquiry_prompt
                        ) }}"
                        placeholder="Looking for a specific hardware product?"
                        class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                    >

                </div>

            </div>

        </div>



        {{-- =====================================================
            FOOTER
        ====================================================== --}}
        <div
            class="mt-10
                   border-t
                   border-slate-200
                   pt-8"
        >

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-orange-600"
            >
                Footer
            </p>

            <h2
                class="mt-1
                       text-xl
                       font-black
                       text-slate-950"
            >
                Footer Content
            </h2>

            <p
                class="mt-2
                       text-sm
                       leading-6
                       text-slate-500"
            >
                Manage public footer headings, buttons and fallback content.
            </p>

        </div>


        <div class="mt-6 grid gap-6 lg:grid-cols-2">


            {{-- DESCRIPTION --}}
            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Footer Description
                </label>

                <textarea
                    name="footer_description"
                    rows="4"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 outline-none transition focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >{{ old(
                    'footer_description',
                    $siteSettings->footer_description
                ) }}</textarea>

            </div>



            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Products Button Text
                </label>

                <input
                    type="text"
                    name="footer_products_button_text"
                    value="{{ old(
                        'footer_products_button_text',
                        $siteSettings->footer_products_button_text
                    ) }}"
                    placeholder="View Products"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Contact Button Text
                </label>

                <input
                    type="text"
                    name="footer_contact_button_text"
                    value="{{ old(
                        'footer_contact_button_text',
                        $siteSettings->footer_contact_button_text
                    ) }}"
                    placeholder="Contact Us"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Quick Links Heading
                </label>

                <input
                    type="text"
                    name="footer_quick_links_title"
                    value="{{ old(
                        'footer_quick_links_title',
                        $siteSettings->footer_quick_links_title
                    ) }}"
                    placeholder="Quick Links"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Categories Heading
                </label>

                <input
                    type="text"
                    name="footer_categories_title"
                    value="{{ old(
                        'footer_categories_title',
                        $siteSettings->footer_categories_title
                    ) }}"
                    placeholder="Product Categories"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Contact Heading
                </label>

                <input
                    type="text"
                    name="footer_contact_title"
                    value="{{ old(
                        'footer_contact_title',
                        $siteSettings->footer_contact_title
                    ) }}"
                    placeholder="Contact Us"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            <div>

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    WhatsApp Label
                </label>

                <input
                    type="text"
                    name="footer_whatsapp_text"
                    value="{{ old(
                        'footer_whatsapp_text',
                        $siteSettings->footer_whatsapp_text
                    ) }}"
                    placeholder="WhatsApp"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Empty Categories Message
                </label>

                <input
                    type="text"
                    name="footer_empty_categories_text"
                    value="{{ old(
                        'footer_empty_categories_text',
                        $siteSettings->footer_empty_categories_text
                    ) }}"
                    placeholder="Categories coming soon."
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

            </div>



            {{-- COPYRIGHT --}}
            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-bold text-slate-700">
                    Copyright
                </label>

                <input
                    type="text"
                    name="copyright_text"
                    value="{{ old(
                        'copyright_text',
                        $siteSettings->copyright_text
                    ) }}"
                    placeholder="Leave blank for automatic copyright"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
                >

                <p class="mt-2 text-xs text-slate-400">
                    Leave blank to automatically use current year and company name.
                </p>

            </div>

        </div>



        {{-- =====================================================
            SOCIAL MEDIA
        ====================================================== --}}
        <div
            class="mt-8
                   rounded-2xl
                   border border-slate-200
                   bg-slate-50
                   p-5
                   sm:p-6"
        >

            <p
                class="text-[10px]
                       font-black uppercase
                       tracking-[0.18em]
                       text-slate-400"
            >
                Social Media
            </p>


            <div class="mt-5 grid gap-6 lg:grid-cols-2">

                @foreach([
                    'facebook' => 'Facebook',
                    'instagram' => 'Instagram',
                    'linkedin' => 'LinkedIn',
                    'youtube' => 'YouTube',
                ] as $field => $label)

                    <div>

                        <label
                            class="mb-2 block
                                   text-sm
                                   font-bold
                                   text-slate-700"
                        >
                            {{ $label }}
                        </label>

                        <input
                            type="url"
                            name="{{ $field }}"
                            value="{{ old(
                                $field,
                                $siteSettings->$field
                            ) }}"
                            placeholder="https://"
                            class="w-full
                                   rounded-xl
                                   border border-slate-300
                                   bg-white
                                   px-4 py-3
                                   text-sm
                                   outline-none
                                   transition
                                   focus:border-orange-500
                                   focus:ring-4
                                   focus:ring-orange-500/10"
                        >

                    </div>

                @endforeach

            </div>

        </div>



        {{-- =====================================================
            SAVE WEBSITE SETTINGS
        ====================================================== --}}
        <div
            class="mt-8
                   flex justify-end
                   border-t border-slate-200
                   pt-6"
        >

            <button
                type="submit"
                class="inline-flex
                       min-h-[46px]
                       items-center
                       justify-center
                       rounded-xl
                       bg-orange-600
                       px-7
                       text-sm
                       font-bold
                       text-white
                       transition
                       hover:bg-orange-500
                       focus:outline-none
                       focus:ring-4
                       focus:ring-orange-500/20"
            >
                Save Website Settings
            </button>

        </div>

    </form>

</div>

@endsection
