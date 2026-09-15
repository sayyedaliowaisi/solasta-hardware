@extends('admin.layouts.app')

@section('title', 'Homepage | Admin')

@section('content')

<div class="max-w-6xl">

    <div
        class="flex flex-col gap-4
               sm:flex-row sm:items-end sm:justify-between"
    >

        <div>

            <p
                class="text-xs font-bold uppercase
                       tracking-[0.18em] text-orange-600"
            >
                Website Content
            </p>

            <h1
                class="mt-2 text-3xl
                       font-black text-slate-950"
            >
                Homepage
            </h1>

            <p class="mt-2 text-slate-500">
                Manage homepage content and sections.
            </p>

        </div>

        <a
            href="{{ route('home') }}"
            target="_blank"
            class="inline-flex items-center
                   justify-center rounded-xl
                   bg-slate-950 px-5 py-3
                   text-sm font-bold text-white"
        >
            View Homepage ↗
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


    <form
        action="{{ route('admin.homepage.update') }}"
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
                   p-6 sm:p-8 shadow-sm"
        >

            <h2 class="text-xl font-black text-slate-950">
                Hero Section
            </h2>

            <p class="mt-2 text-sm text-slate-500">
                Main content displayed at the top of homepage.
            </p>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Badge
                    </label>

                    <input
                        name="hero_badge"
                        value="{{ old('hero_badge', $homepage->hero_badge) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Hero Image Path
                    </label>

                    <input
                        name="hero_image"
                        value="{{ old('hero_image', $homepage->hero_image) }}"
                        placeholder="images/hero/hero.jpg"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Main Heading
                    </label>

                    <input
                        name="hero_title"
                        value="{{ old('hero_title', $homepage->hero_title) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Description
                    </label>

                    <textarea
                        name="hero_description"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >{{ old('hero_description', $homepage->hero_description) }}</textarea>

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Primary Button Text
                    </label>

                    <input
                        name="hero_primary_text"
                        value="{{ old('hero_primary_text', $homepage->hero_primary_text) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Primary Button Link
                    </label>

                    <input
                        name="hero_primary_link"
                        value="{{ old('hero_primary_link', $homepage->hero_primary_link) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Secondary Button Text
                    </label>

                    <input
                        name="hero_secondary_text"
                        value="{{ old('hero_secondary_text', $homepage->hero_secondary_text) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Secondary Button Link
                    </label>

                    <input
                        name="hero_secondary_link"
                        value="{{ old('hero_secondary_link', $homepage->hero_secondary_link) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>

            <div class="mt-8 border-t border-slate-100 pt-8">
                <div>
                    <h3 class="text-base font-black text-slate-950">Hero Extra Settings</h3>
                    <p class="mt-1 text-sm text-slate-500">Control hero statistics and floating card content.</p>
                </div>
                <div class="mt-6 grid gap-6 lg:grid-cols-2">
                    <div><label class="mb-2 block text-sm font-bold">Stat 1 Value</label><input name="hero_stat_1_value" value="{{ old('hero_stat_1_value', $homepage->hero_stat_1_value) }}" placeholder="2014" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                    <div><label class="mb-2 block text-sm font-bold">Stat 1 Label</label><input name="hero_stat_1_label" value="{{ old('hero_stat_1_label', $homepage->hero_stat_1_label) }}" placeholder="Established" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                    <div><label class="mb-2 block text-sm font-bold">Stat 4 Value</label><input name="hero_stat_4_value" value="{{ old('hero_stat_4_value', $homepage->hero_stat_4_value) }}" placeholder="India" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                    <div><label class="mb-2 block text-sm font-bold">Stat 4 Label</label><input name="hero_stat_4_label" value="{{ old('hero_stat_4_label', $homepage->hero_stat_4_label) }}" placeholder="Market" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                    <div><label class="mb-2 block text-sm font-bold">Floating Card Title</label><input name="hero_floating_title" value="{{ old('hero_floating_title', $homepage->hero_floating_title) }}" placeholder="Since 2014" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                    <div><label class="mb-2 block text-sm font-bold">Floating Card Text</label><input name="hero_floating_text" value="{{ old('hero_floating_text', $homepage->hero_floating_text) }}" placeholder="M R Hardware" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                </div>
            </div>

        </section>



        {{-- ================= ABOUT ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8 shadow-sm"
        >

            <div class="flex items-center justify-between gap-4">

                <h2 class="text-xl font-black">
                    About Section
                </h2>

                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="show_about"
                        value="1"
                        @checked(old('show_about', $homepage->show_about))
                        class="h-5 w-5 rounded text-orange-600"
                    >

                    <span class="text-sm font-bold">
                        Show Section
                    </span>

                </label>

            </div>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Badge
                    </label>

                    <input
                        name="about_badge"
                        value="{{ old('about_badge', $homepage->about_badge) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Image Path
                    </label>

                    <input
                        name="about_image"
                        value="{{ old('about_image', $homepage->about_image) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Heading
                    </label>

                    <input
                        name="about_title"
                        value="{{ old('about_title', $homepage->about_title) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Description
                    </label>

                    <textarea
                        name="about_description"
                        rows="5"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >{{ old('about_description', $homepage->about_description) }}</textarea>

                </div>

            </div>

            <div class="mt-8 border-t border-slate-100 pt-8">
                <h3 class="text-base font-black text-slate-950">Homepage About Features</h3>
                <p class="mt-1 text-sm text-slate-500">These items appear inside the homepage About section.</p>
                <div class="mt-6 grid gap-6 lg:grid-cols-2">
                    @for($i = 1; $i <= 4; $i++)
                        <div>
                            <label class="mb-2 block text-sm font-bold">Feature {{ $i }}</label>
                            <input name="about_feature_{{ $i }}" value="{{ old('about_feature_'.$i, data_get($homepage, 'about_feature_'.$i)) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3">
                        </div>
                    @endfor
                    <div class="lg:col-span-2"><label class="mb-2 block text-sm font-bold">About Button Text</label><input name="about_button_text" value="{{ old('about_button_text', $homepage->about_button_text) }}" placeholder="Learn More" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                </div>
            </div>

        </section>



        {{-- ================= PRODUCTS ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8 shadow-sm"
        >

            <div class="flex items-center justify-between gap-4">

                <h2 class="text-xl font-black">
                    Featured Products
                </h2>


                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="show_products"
                        value="1"
                        @checked(old('show_products', $homepage->show_products))
                        class="h-5 w-5 rounded text-orange-600"
                    >

                    <span class="text-sm font-bold">
                        Show Section
                    </span>

                </label>

            </div>


            <div class="mt-6 space-y-6">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Badge
                    </label>

                    <input
                        name="products_badge"
                        value="{{ old('products_badge', $homepage->products_badge) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Heading
                    </label>

                    <input
                        name="products_title"
                        value="{{ old('products_title', $homepage->products_title) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Description
                    </label>

                    <textarea
                        name="products_description"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >{{ old('products_description', $homepage->products_description) }}</textarea>

                </div>

            </div>

            <div class="mt-8 grid gap-6 border-t border-slate-100 pt-8 lg:grid-cols-2">
                <div><label class="mb-2 block text-sm font-bold">View All Button Text</label><input name="products_button_text" value="{{ old('products_button_text', $homepage->products_button_text) }}" placeholder="View All Products" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                <div><label class="mb-2 block text-sm font-bold">Number of Products</label><input type="number" min="1" max="12" name="products_limit" value="{{ old('products_limit', $homepage->products_limit ?? 3) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
            </div>

            <p
                class="mt-5 rounded-xl
                       bg-orange-50 px-4 py-3
                       text-sm text-orange-800"
            >
                Products marked as
                <strong>Featured</strong>
                from Products Admin will appear here.
            </p>

        </section>



        {{-- ================= CATEGORIES ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8 shadow-sm"
        >

            <div class="flex items-center justify-between">

                <h2 class="text-xl font-black">
                    Categories Section
                </h2>


                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="show_categories"
                        value="1"
                        @checked(old('show_categories', $homepage->show_categories))
                        class="h-5 w-5 rounded text-orange-600"
                    >

                    <span class="text-sm font-bold">
                        Show Section
                    </span>

                </label>

            </div>


            <div class="mt-6 space-y-6">

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Heading
                    </label>

                    <input
                        name="categories_title"
                        value="{{ old('categories_title', $homepage->categories_title) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Description
                    </label>

                    <textarea
                        name="categories_description"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >{{ old('categories_description', $homepage->categories_description) }}</textarea>

                </div>

            </div>

            <div class="mt-8 grid gap-6 border-t border-slate-100 pt-8 lg:grid-cols-3">
                <div><label class="mb-2 block text-sm font-bold">Badge Text</label><input name="categories_badge" value="{{ old('categories_badge', $homepage->categories_badge) }}" placeholder="Our Products" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                <div><label class="mb-2 block text-sm font-bold">Button Text</label><input name="categories_button_text" value="{{ old('categories_button_text', $homepage->categories_button_text) }}" placeholder="View all categories" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                <div><label class="mb-2 block text-sm font-bold">Number of Categories</label><input type="number" min="1" max="12" name="categories_limit" value="{{ old('categories_limit', $homepage->categories_limit ?? 6) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
            </div>

        </section>



        {{-- ================= CTA ================= --}}

        <section
            class="rounded-3xl
                   border border-slate-200
                   bg-white
                   p-6 sm:p-8 shadow-sm"
        >

            <div class="flex items-center justify-between">

                <h2 class="text-xl font-black">
                    Final CTA
                </h2>


                <label class="flex items-center gap-3">

                    <input
                        type="checkbox"
                        name="show_cta"
                        value="1"
                        @checked(old('show_cta', $homepage->show_cta))
                        class="h-5 w-5 rounded text-orange-600"
                    >

                    <span class="text-sm font-bold">
                        Show Section
                    </span>

                </label>

            </div>


            <div class="mt-6 grid gap-6 lg:grid-cols-2">

                <div class="lg:col-span-2">
                    <label class="mb-2 block text-sm font-bold">CTA Badge</label>
                    <input name="cta_badge" value="{{ old('cta_badge', $homepage->cta_badge) }}" placeholder="LET'S WORK TOGETHER" class="w-full rounded-xl border border-slate-300 px-4 py-3">
                </div>

                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Heading
                    </label>

                    <input
                        name="cta_title"
                        value="{{ old('cta_title', $homepage->cta_title) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div class="lg:col-span-2">

                    <label class="mb-2 block text-sm font-bold">
                        Description
                    </label>

                    <textarea
                        name="cta_description"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >{{ old('cta_description', $homepage->cta_description) }}</textarea>

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Button Text
                    </label>

                    <input
                        name="cta_button_text"
                        value="{{ old('cta_button_text', $homepage->cta_button_text) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>


                <div>

                    <label class="mb-2 block text-sm font-bold">
                        Button Link
                    </label>

                    <input
                        name="cta_button_link"
                        value="{{ old('cta_button_link', $homepage->cta_button_link) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            </div>

        </section>



        {{-- ================= SECTION LIMITS ================= --}}
        <section class="rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm">
            <h2 class="text-xl font-black text-slate-950">Homepage Section Limits</h2>
            <p class="mt-2 text-sm text-slate-500">Control how many items are shown in each homepage section.</p>
            <div class="mt-6 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
                <div><label class="mb-2 block text-sm font-bold">Why Choose</label><input type="number" min="1" max="12" name="why_choose_limit" value="{{ old('why_choose_limit', $homepage->why_choose_limit ?? 3) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                <div><label class="mb-2 block text-sm font-bold">Stats</label><input type="number" min="1" max="12" name="stats_limit" value="{{ old('stats_limit', $homepage->stats_limit ?? 4) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                <div><label class="mb-2 block text-sm font-bold">Process</label><input type="number" min="1" max="12" name="process_limit" value="{{ old('process_limit', $homepage->process_limit ?? 4) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
                <div><label class="mb-2 block text-sm font-bold">Testimonials</label><input type="number" min="1" max="12" name="testimonials_limit" value="{{ old('testimonials_limit', $homepage->testimonials_limit ?? 3) }}" class="w-full rounded-xl border border-slate-300 px-4 py-3"></div>
            </div>
        </section>

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
                Save Homepage Changes
            </button>

        </div>

    </form>

</div>

@endsection