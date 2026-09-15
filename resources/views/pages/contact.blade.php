@extends('layouts.app')

@section('title', 'Contact Us | ' . ($siteSettings->company_name ?: 'M R Hardware'))

@section('content')

@php
    /*
    |--------------------------------------------------------------------------
    | Site Settings
    |--------------------------------------------------------------------------
    */

    $companyName =
        $siteSettings->company_name
        ?: 'M R Hardware';

    $phoneDigits =
        preg_replace(
            '/\D+/',
            '',
            $siteSettings->phone ?? ''
        );

    if (strlen($phoneDigits) === 10) {
        $phoneDigits = '91' . $phoneDigits;
    }

    $phoneDisplay =
        $siteSettings->phone
        ?: '9811510846';


    /*
    |--------------------------------------------------------------------------
    | Contact Page CMS
    |--------------------------------------------------------------------------
    */

    $contactBadge =
        $contactSettings->badge
        ?: 'Contact Us';

    $contactTitle =
        $contactSettings->title
        ?: "Let's Talk";

    $contactDescription =
        $contactSettings->description
        ?: 'Contact us for product enquiries, availability and business information.';


    $detailsBadge =
        $contactSettings->details_badge
        ?: 'Contact Details';

    $detailsTitle =
        $contactSettings->details_title
        ?: 'Get in touch';

    $detailsDescription =
        $contactSettings->details_description
        ?: 'Contact '
            . $companyName
            . ' for product enquiries, availability and business information.';


    $formBadge =
        $contactSettings->form_badge
        ?: 'Enquiry Form';

    $formTitle =
        $contactSettings->form_title
        ?: 'Send us a message';

    $formDescription =
        $contactSettings->form_description
        ?: 'Share your requirement and our team will get back to you.';

    $formButtonText =
        $contactSettings->form_button_text
        ?: 'Send Enquiry';
@endphp


{{-- =========================================================
     CONTACT HERO
========================================================= --}}
<section
    class="relative overflow-hidden
           bg-[#071a2d]
           text-white
           lg:min-h-[calc(100svh-72px)]
           lg:flex lg:items-center"
>

    <div
        class="absolute inset-0 opacity-30"
        style="
            background-image:
                radial-gradient(circle at 18% 28%, rgba(249,115,22,.9) 0, transparent 28%),
                radial-gradient(circle at 82% 72%, rgba(14,165,233,.45) 0, transparent 30%);
        "
    ></div>

    <div
        class="absolute inset-0
               bg-gradient-to-br
               from-[#071a2d]/10
               via-[#071a2d]/40
               to-[#071a2d]/90"
    ></div>


    <div
        class="relative mx-auto w-full max-w-[1180px]
               px-4 py-14
               sm:px-6 sm:py-16
               lg:px-8 lg:py-10"
    >

        <div
            class="grid items-center
                   gap-8 lg:gap-12
                   lg:grid-cols-[1.08fr_.92fr]"
        >

            {{-- LEFT --}}
            <div class="max-w-2xl">

                @if($contactBadge)

                    <p
                        class="text-[10px] sm:text-[11px]
                               font-bold uppercase
                               tracking-[0.2em]
                               text-orange-400"
                    >
                        {{ $contactBadge }}
                    </p>

                @endif


                <h1
                    class="mt-4
                           text-[38px]
                           sm:text-[48px]
                           lg:text-[56px]
                           font-black
                           leading-[1.03]
                           tracking-[-0.045em]"
                >
                    {{ $contactTitle }}
                </h1>


                @if($contactDescription)

                    <p
                        class="mt-5
                               max-w-xl
                               text-[14px] sm:text-[15px]
                               leading-7
                               text-slate-300"
                    >
                        {{ $contactDescription }}
                    </p>

                @endif


                <div class="mt-7 flex flex-wrap gap-3">

                    <a
                        href="#contact-form"
                        class="inline-flex min-h-[44px]
                               items-center justify-center
                               rounded-xl
                               bg-orange-600
                               px-5
                               text-[12px]
                               font-bold
                               text-white
                               transition
                               hover:bg-orange-500"
                    >
                        {{ $formButtonText }}
                    </a>


                    @if($siteSettings->phone)

                        <a
                            href="tel:+{{ $phoneDigits }}"
                            class="inline-flex min-h-[44px]
                                   items-center justify-center
                                   rounded-xl
                                   border border-white/20
                                   bg-white/5
                                   px-5
                                   text-[12px]
                                   font-bold
                                   text-white
                                   transition
                                   hover:bg-white
                                   hover:text-slate-950"
                        >
                            Call {{ $phoneDisplay }}
                        </a>

                    @endif

                </div>

            </div>


            {{-- RIGHT INFO PANEL --}}
            <div
                class="rounded-[26px]
                       border border-white/10
                       bg-white/[0.06]
                       p-5 sm:p-6
                       backdrop-blur"
            >

                <p
                    class="text-[9px]
                           font-bold uppercase
                           tracking-[0.18em]
                           text-orange-400"
                >
                    Quick Contact
                </p>


                <h2
                    class="mt-2
                           text-[22px] sm:text-[24px]
                           font-black
                           tracking-[-0.03em]"
                >
                    Reach {{ $companyName }}
                </h2>


                <p
                    class="mt-2
                           text-[12px]
                           leading-5
                           text-slate-400"
                >
                    {{ $detailsDescription }}
                </p>


                <div class="mt-5 space-y-3">

                    @if($siteSettings->phone)

                        <a
                            href="tel:+{{ $phoneDigits }}"
                            class="flex items-center gap-3
                                   rounded-2xl
                                   border border-white/10
                                   bg-white/[0.05]
                                   px-4 py-3
                                   transition
                                   hover:bg-white/[0.09]"
                        >

                            <div
                                class="flex h-9 w-9
                                       items-center justify-center
                                       rounded-xl
                                       bg-orange-500/15
                                       text-orange-400"
                            >
                                ☎
                            </div>

                            <div>

                                <p
                                    class="text-[8px]
                                           font-bold uppercase
                                           tracking-[0.14em]
                                           text-slate-500"
                                >
                                    Phone
                                </p>

                                <p class="mt-0.5 text-[12px] font-bold text-white">
                                    {{ $phoneDisplay }}
                                </p>

                            </div>

                        </a>

                    @endif


                    @if($siteSettings->email)

                        <a
                            href="mailto:{{ $siteSettings->email }}"
                            class="flex items-center gap-3
                                   rounded-2xl
                                   border border-white/10
                                   bg-white/[0.05]
                                   px-4 py-3
                                   transition
                                   hover:bg-white/[0.09]"
                        >

                            <div
                                class="flex h-9 w-9
                                       items-center justify-center
                                       rounded-xl
                                       bg-orange-500/15
                                       text-orange-400"
                            >
                                ✉
                            </div>

                            <div class="min-w-0">

                                <p
                                    class="text-[8px]
                                           font-bold uppercase
                                           tracking-[0.14em]
                                           text-slate-500"
                                >
                                    Email
                                </p>

                                <p
                                    class="mt-0.5
                                           truncate
                                           text-[12px]
                                           font-bold
                                           text-white"
                                >
                                    {{ $siteSettings->email }}
                                </p>

                            </div>

                        </a>

                    @endif


                    @if($siteSettings->address)

                        <div
                            class="flex items-start gap-3
                                   rounded-2xl
                                   border border-white/10
                                   bg-white/[0.05]
                                   px-4 py-3"
                        >

                            <div
                                class="flex h-9 w-9
                                       shrink-0
                                       items-center justify-center
                                       rounded-xl
                                       bg-orange-500/15
                                       text-orange-400"
                            >
                                ⌖
                            </div>

                            <div>

                                <p
                                    class="text-[8px]
                                           font-bold uppercase
                                           tracking-[0.14em]
                                           text-slate-500"
                                >
                                    Address
                                </p>

                                <p
                                    class="mt-0.5
                                           text-[11px]
                                           leading-5
                                           font-medium
                                           text-slate-200"
                                >
                                    {{ $siteSettings->address }}
                                </p>

                            </div>

                        </div>

                    @endif

                </div>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     CONTACT AREA
========================================================= --}}
<section
    id="contact-form"
    class="bg-[#f6f6f3]
           py-10 sm:py-12
           lg:min-h-screen
           lg:flex lg:items-center
           lg:py-8"
>

    <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

        <div
            class="grid
                   gap-6 lg:gap-7
                   lg:grid-cols-[.78fr_1.22fr]
                   lg:items-stretch"
        >

            {{-- LEFT CONTACT INFORMATION --}}
            <div
                class="rounded-[24px]
                       border border-slate-200
                       bg-white
                       p-5 sm:p-6
                       shadow-[0_14px_38px_rgba(15,23,42,0.05)]"
            >

                <p
                    class="text-[9px]
                           font-bold uppercase
                           tracking-[0.18em]
                           text-orange-600"
                >
                    {{ $detailsBadge }}
                </p>


                <h2
                    class="mt-2
                           text-[25px] sm:text-[29px]
                           font-black
                           tracking-[-0.035em]
                           text-slate-950"
                >
                    {{ $detailsTitle }}
                </h2>


                <p
                    class="mt-3
                           max-w-lg
                           text-[12px] sm:text-[13px]
                           leading-6
                           text-slate-600"
                >
                    {{ $detailsDescription }}
                </p>


                @if($contactSettings->show_contact_cards)

                    <div class="mt-5 space-y-3">

                        @if($siteSettings->phone)

                            <a
                                href="tel:+{{ $phoneDigits }}"
                                class="group
                                       flex items-start gap-3
                                       rounded-2xl
                                       border border-slate-200
                                       bg-[#fafafa]
                                       p-4
                                       transition
                                       hover:border-orange-300
                                       hover:bg-orange-50/40"
                            >

                                <div
                                    class="flex h-9 w-9
                                           shrink-0
                                           items-center justify-center
                                           rounded-xl
                                           bg-orange-50
                                           text-orange-600"
                                >
                                    ☎
                                </div>


                                <div>

                                    <p
                                        class="text-[8px]
                                               font-bold uppercase
                                               tracking-[0.14em]
                                               text-slate-400"
                                    >
                                        Phone
                                    </p>

                                    <p
                                        class="mt-1
                                               text-[12px]
                                               font-bold
                                               text-slate-950"
                                    >
                                        {{ $phoneDisplay }}
                                    </p>

                                </div>

                            </a>

                        @endif


                        @if($siteSettings->email)

                            <a
                                href="mailto:{{ $siteSettings->email }}"
                                class="group
                                       flex items-start gap-3
                                       rounded-2xl
                                       border border-slate-200
                                       bg-[#fafafa]
                                       p-4
                                       transition
                                       hover:border-orange-300
                                       hover:bg-orange-50/40"
                            >

                                <div
                                    class="flex h-9 w-9
                                           shrink-0
                                           items-center justify-center
                                           rounded-xl
                                           bg-orange-50
                                           text-orange-600"
                                >
                                    ✉
                                </div>


                                <div class="min-w-0">

                                    <p
                                        class="text-[8px]
                                               font-bold uppercase
                                               tracking-[0.14em]
                                               text-slate-400"
                                    >
                                        Email
                                    </p>

                                    <p
                                        class="mt-1
                                               break-all
                                               text-[12px]
                                               font-bold
                                               text-slate-950"
                                    >
                                        {{ $siteSettings->email }}
                                    </p>

                                </div>

                            </a>

                        @endif


                        @if($siteSettings->address)

                            <div
                                class="flex items-start gap-3
                                       rounded-2xl
                                       border border-slate-200
                                       bg-[#fafafa]
                                       p-4"
                            >

                                <div
                                    class="flex h-9 w-9
                                           shrink-0
                                           items-center justify-center
                                           rounded-xl
                                           bg-orange-50
                                           text-orange-600"
                                >
                                    ⌖
                                </div>


                                <div>

                                    <p
                                        class="text-[8px]
                                               font-bold uppercase
                                               tracking-[0.14em]
                                               text-slate-400"
                                    >
                                        Address
                                    </p>

                                    <p
                                        class="mt-1
                                               text-[11px]
                                               leading-5
                                               font-medium
                                               text-slate-700"
                                    >
                                        {{ $siteSettings->address }}
                                    </p>

                                </div>

                            </div>

                        @endif

                    </div>

                @endif


                <div
                    class="mt-5
                           rounded-2xl
                           bg-slate-950
                           p-4
                           text-white"
                >

                    <p
                        class="text-[8px]
                               font-bold uppercase
                               tracking-[0.14em]
                               text-orange-400"
                    >
                        Product Enquiry
                    </p>

                    <p
                        class="mt-1.5
                               text-[11px]
                               leading-5
                               text-slate-300"
                    >
                        If you opened this page from a product,
                        the selected product will appear automatically
                        in the enquiry form.
                    </p>

                </div>

            </div>



            {{-- CONTACT FORM --}}
            <div
                class="rounded-[24px]
                       border border-slate-200
                       bg-white
                       p-5 sm:p-6
                       lg:p-7
                       shadow-[0_14px_38px_rgba(15,23,42,0.05)]"
            >

                <div>

                    <p
                        class="text-[9px]
                               font-bold uppercase
                               tracking-[0.18em]
                               text-orange-600"
                    >
                        {{ $formBadge }}
                    </p>


                    <h2
                        class="mt-2
                               text-[24px] sm:text-[27px]
                               font-black
                               tracking-[-0.03em]
                               text-slate-950"
                    >
                        {{ $formTitle }}
                    </h2>


                    @if($formDescription)

                        <p
                            class="mt-2
                                   text-[12px]
                                   leading-5
                                   text-slate-600"
                        >
                            {{ $formDescription }}
                        </p>

                    @endif

                </div>


                @if(session('success'))

                    <div
                        class="mt-4
                               rounded-xl
                               border border-emerald-200
                               bg-emerald-50
                               px-4 py-3
                               text-[11px]
                               font-medium
                               text-emerald-700"
                    >
                        {{ session('success') }}
                    </div>

                @endif


                @if($errors->any())

                    <div
                        class="mt-4
                               rounded-xl
                               border border-red-200
                               bg-red-50
                               px-4 py-3"
                    >

                        <p class="text-[11px] font-bold text-red-700">
                            Please check the form.
                        </p>

                        <ul class="mt-1.5 list-disc pl-5 text-[10px] text-red-600">

                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach

                        </ul>

                    </div>

                @endif


                <form
                    action="{{ route('contact.store') }}"
                    method="POST"
                    class="mt-5 space-y-4"
                >

                    @csrf


                    @if(request()->filled('product') || old('product'))

                        <div>

                            <label
                                for="product"
                                class="mb-1.5
                                       block
                                       text-[11px]
                                       font-bold
                                       text-slate-800"
                            >
                                Selected Product
                            </label>


                            <div class="relative">

                                <input
                                    type="text"
                                    id="product"
                                    name="product"
                                    value="{{ old('product', request('product')) }}"
                                    readonly
                                    class="w-full
                                           rounded-xl
                                           border border-orange-200
                                           bg-orange-50
                                           px-4 py-3
                                           pr-24
                                           text-[12px]
                                           font-semibold
                                           text-slate-900
                                           outline-none"
                                >


                                <span
                                    class="absolute right-3 top-1/2
                                           -translate-y-1/2
                                           rounded-full
                                           bg-orange-600
                                           px-2.5 py-1
                                           text-[8px]
                                           font-bold uppercase
                                           tracking-wider
                                           text-white"
                                >
                                    Selected
                                </span>

                            </div>

                        </div>

                    @else

                        <input
                            type="hidden"
                            name="product"
                            value="{{ old('product') }}"
                        >

                    @endif



                    <div>

                        <label
                            for="name"
                            class="mb-1.5
                                   block
                                   text-[11px]
                                   font-bold
                                   text-slate-800"
                        >
                            Your Name
                            <span class="text-orange-600">*</span>
                        </label>


                        <input
                            type="text"
                            id="name"
                            name="name"
                            value="{{ old('name') }}"
                            required
                            placeholder="Enter your name"
                            class="w-full
                                   rounded-xl
                                   border border-slate-300
                                   bg-white
                                   px-4 py-3
                                   text-[12px]
                                   text-slate-900
                                   outline-none
                                   transition
                                   focus:border-orange-500
                                   focus:ring-4
                                   focus:ring-orange-500/10"
                        >

                    </div>



                    <div class="grid gap-4 sm:grid-cols-2">

                        <div>

                            <label
                                for="phone"
                                class="mb-1.5
                                       block
                                       text-[11px]
                                       font-bold
                                       text-slate-800"
                            >
                                Phone
                                <span class="text-orange-600">*</span>
                            </label>


                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                value="{{ old('phone') }}"
                                required
                                placeholder="Enter phone number"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-[12px]
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>


                        <div>

                            <label
                                for="email"
                                class="mb-1.5
                                       block
                                       text-[11px]
                                       font-bold
                                       text-slate-800"
                            >
                                Email
                            </label>


                            <input
                                type="email"
                                id="email"
                                name="email"
                                value="{{ old('email') }}"
                                placeholder="Enter email address"
                                class="w-full
                                       rounded-xl
                                       border border-slate-300
                                       px-4 py-3
                                       text-[12px]
                                       outline-none
                                       transition
                                       focus:border-orange-500
                                       focus:ring-4
                                       focus:ring-orange-500/10"
                            >

                        </div>

                    </div>



                    <div>

                        <label
                            for="message"
                            class="mb-1.5
                                   block
                                   text-[11px]
                                   font-bold
                                   text-slate-800"
                        >
                            Message
                            <span class="text-orange-600">*</span>
                        </label>


                        <textarea
                            id="message"
                            name="message"
                            rows="4"
                            required
                            placeholder="Tell us about your requirement..."
                            class="w-full
                                   resize-none
                                   rounded-xl
                                   border border-slate-300
                                   px-4 py-3
                                   text-[12px]
                                   outline-none
                                   transition
                                   focus:border-orange-500
                                   focus:ring-4
                                   focus:ring-orange-500/10"
                        >{{ old('message') }}</textarea>

                    </div>



                    <button
                        type="submit"
                        class="inline-flex
                               min-h-[44px]
                               w-full
                               items-center justify-center
                               rounded-xl
                               bg-orange-600
                               px-6
                               text-[12px]
                               font-bold
                               text-white
                               transition
                               hover:bg-orange-500"
                    >
                        {{ $formButtonText }}
                    </button>

                </form>

            </div>

        </div>

    </div>

</section>



{{-- =========================================================
     MAP
========================================================= --}}
@if($contactSettings->show_map && $contactSettings->map_embed)

    <section
        class="bg-white
               py-10 sm:py-12
               lg:min-h-screen
               lg:flex lg:items-center
               lg:py-8"
    >

        <div class="mx-auto w-full max-w-[1180px] px-4 sm:px-6 lg:px-8">

            <div class="mb-5">

                <p
                    class="text-[9px]
                           font-bold uppercase
                           tracking-[0.18em]
                           text-orange-600"
                >
                    Find Us
                </p>


                <h2
                    class="mt-1.5
                           text-[26px]
                           font-black
                           tracking-[-0.03em]
                           text-slate-950"
                >
                    Our Location
                </h2>

            </div>


            <div
                class="overflow-hidden
                       rounded-[24px]
                       border border-slate-200
                       bg-white
                       shadow-[0_14px_38px_rgba(15,23,42,0.05)]"
            >

                <iframe
                    src="{{ $contactSettings->map_embed }}"
                    class="h-[360px] w-full
                           sm:h-[430px]
                           lg:h-[560px]"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen
                ></iframe>

            </div>

        </div>

    </section>

@endif


<style>
    html {
        scroll-behavior: smooth;
    }
</style>

@endsection