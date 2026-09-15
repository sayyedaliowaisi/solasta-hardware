@extends('admin.layouts.app')

@section('title', 'Product Detail Page | Admin')

@section('content')

<div class="max-w-6xl">

    {{-- PAGE HEADER --}}
    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-600">
                Website Content
            </p>

            <h1 class="mt-2 text-3xl font-black text-slate-950">
                Product Detail Page
            </h1>

            <p class="mt-2 text-slate-500">
                Manage product detail page labels, enquiry content and CTA text.
            </p>
        </div>

        <a
            href="{{ route('products') }}"
            target="_blank"
            class="inline-flex items-center justify-center
                   rounded-xl
                   bg-slate-950
                   px-5 py-3
                   text-sm font-bold
                   text-white
                   transition
                   hover:bg-slate-800"
        >
            View Products ↗
        </a>

    </div>


    {{-- SUCCESS MESSAGE --}}
    @if(session('success'))

        <div
            class="mt-6 rounded-xl
                   border border-green-200
                   bg-green-50
                   px-5 py-4
                   text-sm font-bold
                   text-green-700"
        >
            {{ session('success') }}
        </div>

    @endif


    {{-- VALIDATION ERRORS --}}
    @if($errors->any())

        <div
            class="mt-6 rounded-xl
                   border border-red-200
                   bg-red-50
                   px-5 py-4
                   text-sm text-red-700"
        >

            <p class="font-bold">
                Please fix the following:
            </p>

            <ul class="mt-2 list-disc space-y-1 pl-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>

        </div>

    @endif


    <form
        action="{{ route('admin.product-detail-page.update') }}"
        method="POST"
        class="mt-8 space-y-8"
    >

        @csrf
        @method('PUT')


        {{-- =====================================================
             NAVIGATION / BUTTON LABELS
        ====================================================== --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-orange-600">
                    Navigation
                </p>

                <h2 class="mt-2 text-xl font-black text-slate-950">
                    Navigation & Button Labels
                </h2>
            </div>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Back To Products Text
                    </label>

                    <input
                        type="text"
                        name="back_to_products_text"
                        value="{{ old('back_to_products_text', $productDetailPage->back_to_products_text) }}"
                        placeholder="Back to Products"
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-sm
                               text-slate-900
                               outline-none
                               transition
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Collection Button Text
                    </label>

                    <input
                        type="text"
                        name="collection_button_text"
                        value="{{ old('collection_button_text', $productDetailPage->collection_button_text) }}"
                        placeholder="View Full Collection"
                        class="w-full rounded-xl
                               border border-slate-300
                               bg-white
                               px-4 py-3
                               text-sm
                               text-slate-900
                               outline-none
                               transition
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>

            </div>

        </section>



        {{-- =====================================================
             PRODUCT INFORMATION
        ====================================================== --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-orange-600">
                    Product Information
                </p>

                <h2 class="mt-2 text-xl font-black text-slate-950">
                    Product Information Labels
                </h2>

                <p class="mt-2 text-sm text-slate-500">
                    Product name, image, video and category remain dynamic.
                </p>
            </div>


            <div class="mt-6 space-y-6">

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Product Badge
                    </label>

                    <input
                        type="text"
                        name="product_badge"
                        value="{{ old('product_badge', $productDetailPage->product_badge) }}"
                        placeholder="Product Details"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Specifications Title
                    </label>

                    <input
                        type="text"
                        name="specifications_title"
                        value="{{ old('specifications_title', $productDetailPage->specifications_title) }}"
                        placeholder="Product Information"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Specifications Note
                    </label>

                    <textarea
                        name="specifications_note"
                        rows="4"
                        placeholder="Contact us for model-wise specifications..."
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >{{ old('specifications_note', $productDetailPage->specifications_note) }}</textarea>

                </div>

            </div>

        </section>



        {{-- =====================================================
             ENQUIRY CARD
        ====================================================== --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-orange-600">
                    Enquiry
                </p>

                <h2 class="mt-2 text-xl font-black text-slate-950">
                    Product Enquiry Card
                </h2>
            </div>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Enquiry Badge
                    </label>

                    <input
                        type="text"
                        name="enquiry_badge"
                        value="{{ old('enquiry_badge', $productDetailPage->enquiry_badge) }}"
                        placeholder="Product Enquiry"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Button Text
                    </label>

                    <input
                        type="text"
                        name="enquiry_button_text"
                        value="{{ old('enquiry_button_text', $productDetailPage->enquiry_button_text) }}"
                        placeholder="Send Enquiry"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Enquiry Title
                    </label>

                    <input
                        type="text"
                        name="enquiry_title"
                        value="{{ old('enquiry_title', $productDetailPage->enquiry_title) }}"
                        placeholder="Need details for this product?"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Enquiry Description
                    </label>

                    <textarea
                        name="enquiry_description"
                        rows="4"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >{{ old('enquiry_description', $productDetailPage->enquiry_description) }}</textarea>

                </div>

            </div>

        </section>



        {{-- =====================================================
             RELATED PRODUCTS
        ====================================================== --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-orange-600">
                    Recommendations
                </p>

                <h2 class="mt-2 text-xl font-black text-slate-950">
                    Related Products Section
                </h2>
            </div>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Section Badge
                    </label>

                    <input
                        type="text"
                        name="related_section_badge"
                        value="{{ old('related_section_badge', $productDetailPage->related_section_badge) }}"
                        placeholder="Related Products"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Product Button Text
                    </label>

                    <input
                        type="text"
                        name="related_product_button_text"
                        value="{{ old('related_product_button_text', $productDetailPage->related_product_button_text) }}"
                        placeholder="View Product"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        Section Title
                    </label>

                    <input
                        type="text"
                        name="related_section_title"
                        value="{{ old('related_section_title', $productDetailPage->related_section_title) }}"
                        placeholder="You may also like"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>

            </div>

        </section>



        {{-- =====================================================
             BOTTOM CTA
        ====================================================== --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <div>
                <p class="text-xs font-bold uppercase tracking-widest text-orange-600">
                    Final Section
                </p>

                <h2 class="mt-2 text-xl font-black text-slate-950">
                    Bottom CTA
                </h2>
            </div>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        CTA Badge
                    </label>

                    <input
                        type="text"
                        name="cta_badge"
                        value="{{ old('cta_badge', $productDetailPage->cta_badge) }}"
                        placeholder="M R Hardware"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        CTA Button Text
                    </label>

                    <input
                        type="text"
                        name="cta_button_text"
                        value="{{ old('cta_button_text', $productDetailPage->cta_button_text) }}"
                        placeholder="Send Enquiry"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        CTA Title
                    </label>

                    <input
                        type="text"
                        name="cta_title"
                        value="{{ old('cta_title', $productDetailPage->cta_title) }}"
                        placeholder="Need details for this product?"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold text-slate-700">
                        CTA Description
                    </label>

                    <textarea
                        name="cta_description"
                        rows="4"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3
                               text-sm
                               outline-none
                               focus:border-orange-500
                               focus:ring-2 focus:ring-orange-100"
                    >{{ old('cta_description', $productDetailPage->cta_description) }}</textarea>

                </div>

            </div>

        </section>



        {{-- =====================================================
             SAVE BUTTON
        ====================================================== --}}

        <div class="sticky bottom-5 z-20">

            <div
                class="rounded-2xl
                       border border-slate-200
                       bg-white/90
                       p-3
                       shadow-xl
                       backdrop-blur"
            >

                <button
                    type="submit"
                    class="w-full rounded-xl
                           bg-orange-600
                           px-7 py-4
                           text-base font-black
                           text-white
                           transition
                           hover:bg-orange-500"
                >
                    Save Product Detail Page Changes
                </button>

            </div>

        </div>

    </form>

</div>

@endsection