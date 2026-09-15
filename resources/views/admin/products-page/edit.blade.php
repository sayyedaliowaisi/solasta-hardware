@extends('admin.layouts.app')

@section('title', 'Products Page | Admin')

@section('content')

<div class="max-w-6xl">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-end sm:justify-between">

        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-600">
                Website Content
            </p>

            <h1 class="mt-2 text-3xl font-black text-slate-950">
                Products Page
            </h1>

            <p class="mt-2 text-slate-500">
                Manage Products page labels, enquiry content and CTA text.
            </p>
        </div>

        <a
            href="{{ route('products') }}"
            target="_blank"
            class="inline-flex items-center justify-center rounded-xl
                   bg-slate-950 px-5 py-3 text-sm font-bold text-white"
        >
            View Products ↗
        </a>

    </div>


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
        action="{{ route('admin.products-page.update') }}"
        method="POST"
        class="mt-8 space-y-8"
    >

        @csrf
        @method('PUT')


        {{-- ================= HERO ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <h2 class="text-xl font-black text-slate-950">
                Hero Section
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Category title, description and product count stay dynamic.
                These settings control the surrounding labels.
            </p>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Badge
                    </label>

                    <input
                        name="hero_badge"
                        value="{{ old('hero_badge', $productsPage->hero_badge) }}"
                        placeholder="Product Catalogue"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Product Count Label
                    </label>

                    <input
                        name="hero_products_text"
                        value="{{ old('hero_products_text', $productsPage->hero_products_text) }}"
                        placeholder="Products Available"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Explore Button Text
                    </label>

                    <input
                        name="hero_button_text"
                        value="{{ old('hero_button_text', $productsPage->hero_button_text) }}"
                        placeholder="Explore Products"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>

            </div>

        </section>



        {{-- ================= HERO INFO CARDS ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <h2 class="text-xl font-black text-slate-950">
                Hero Information Cards
            </h2>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Collection Label
                    </label>

                    <input
                        name="collection_label"
                        value="{{ old('collection_label', $productsPage->collection_label) }}"
                        placeholder="Collection"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Collection Text
                    </label>

                    <input
                        name="collection_text"
                        value="{{ old('collection_text', $productsPage->collection_text) }}"
                        placeholder="Products in this category"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Business Label
                    </label>

                    <input
                        name="business_label"
                        value="{{ old('business_label', $productsPage->business_label) }}"
                        placeholder="Business"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Business Text
                    </label>

                    <input
                        name="business_text"
                        value="{{ old('business_text', $productsPage->business_text) }}"
                        placeholder="Manufacturing & Trading"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>

            </div>

        </section>



        {{-- ================= ENQUIRY PANEL ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <h2 class="text-xl font-black text-slate-950">
                Hero Enquiry Panel
            </h2>


            <div class="mt-6 space-y-6">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Heading
                    </label>

                    <input
                        name="enquiry_badge"
                        value="{{ old('enquiry_badge', $productsPage->enquiry_badge) }}"
                        placeholder="Need a specific model?"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Description
                    </label>

                    <textarea
                        name="enquiry_text"
                        rows="4"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >{{ old('enquiry_text', $productsPage->enquiry_text) }}</textarea>

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Button Text
                    </label>

                    <input
                        name="enquiry_button_text"
                        value="{{ old('enquiry_button_text', $productsPage->enquiry_button_text) }}"
                        placeholder="Send Enquiry"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>

            </div>

        </section>



        {{-- ================= COLLECTION ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <h2 class="text-xl font-black text-slate-950">
                Product Collection
            </h2>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Section Badge
                    </label>

                    <input
                        name="products_section_badge"
                        value="{{ old('products_section_badge', $productsPage->products_section_badge) }}"
                        placeholder="Our Collection"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Product Card Button Text
                    </label>

                    <input
                        name="view_product_text"
                        value="{{ old('view_product_text', $productsPage->view_product_text) }}"
                        placeholder="View Product"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Empty State Heading
                    </label>

                    <input
                        name="empty_title"
                        value="{{ old('empty_title', $productsPage->empty_title) }}"
                        placeholder="No products found"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Empty State Description
                    </label>

                    <textarea
                        name="empty_text"
                        rows="3"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >{{ old('empty_text', $productsPage->empty_text) }}</textarea>

                </div>

            </div>

        </section>



        {{-- ================= FINAL CTA ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8
                   shadow-sm"
        >

            <h2 class="text-xl font-black text-slate-950">
                Final CTA
            </h2>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Badge
                    </label>

                    <input
                        name="cta_badge"
                        value="{{ old('cta_badge', $productsPage->cta_badge) }}"
                        placeholder="Product Enquiry"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Button Text
                    </label>

                    <input
                        name="cta_button_text"
                        value="{{ old('cta_button_text', $productsPage->cta_button_text) }}"
                        placeholder="Send Enquiry"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Heading
                    </label>

                    <input
                        name="cta_title"
                        value="{{ old('cta_title', $productsPage->cta_title) }}"
                        placeholder="Looking for a particular model?"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Description
                    </label>

                    <textarea
                        name="cta_description"
                        rows="4"
                        class="w-full rounded-xl
                               border border-slate-300
                               px-4 py-3"
                    >{{ old('cta_description', $productsPage->cta_description) }}</textarea>

                </div>

            </div>

        </section>



        {{-- ================= SAVE ================= --}}

        <div class="sticky bottom-5 z-20">

            <button
                type="submit"
                class="w-full rounded-2xl
                       bg-orange-600
                       px-7 py-4
                       text-base font-black
                       text-white
                       shadow-xl
                       shadow-orange-600/20
                       transition
                       hover:bg-orange-500"
            >
                Save Products Page Changes
            </button>

        </div>

    </form>

</div>

@endsection