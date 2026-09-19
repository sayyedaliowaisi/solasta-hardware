@php
    $editingCategory = isset($category);
@endphp


<div class="space-y-8">

    {{-- =====================================================
        BASIC INFORMATION
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-6 border-b border-slate-100 pb-4">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                Category
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950">
                Basic Information
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Manage the category name, URL, folder and description.
            </p>

        </div>


        <div class="grid gap-6 lg:grid-cols-2">

            {{-- CATEGORY NAME --}}

            <div class="lg:col-span-2">

                <label
                    for="name"
                    class="mb-2 block text-sm font-bold text-slate-800"
                >
                    Category Name
                    <span class="text-red-500">*</span>
                </label>

                <input
                    id="name"
                    type="text"
                    name="name"
                    value="{{ old('name', $category->name ?? '') }}"
                    required
                    autocomplete="off"
                    placeholder="Enter category name"
                    class="w-full rounded-xl border px-4 py-3 text-sm
                           text-slate-900 outline-none transition
                           placeholder:text-slate-400
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('name')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >

                @error('name')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- SLUG --}}

            <div>

                <label
                    for="slug"
                    class="mb-2 block text-sm font-bold text-slate-800"
                >
                    Slug
                </label>

                <input
                    id="slug"
                    type="text"
                    name="slug"
                    value="{{ old('slug', $category->slug ?? '') }}"
                    autocomplete="off"
                    placeholder="cabinet-handles"
                    class="w-full rounded-xl border px-4 py-3 text-sm
                           text-slate-900 outline-none transition
                           placeholder:text-slate-400
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('slug')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >

                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Leave blank to generate the URL slug automatically.
                </p>

                @error('slug')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- PRODUCT FOLDER --}}

            <div>

                <label
                    for="folder"
                    class="mb-2 block text-sm font-bold text-slate-800"
                >
                    Product Folder
                </label>

                <input
                    id="folder"
                    type="text"
                    name="folder"
                    value="{{ old('folder', $category->folder ?? '') }}"
                    autocomplete="off"
                    placeholder="cabinate handles"
                    class="w-full rounded-xl border px-4 py-3 text-sm
                           text-slate-900 outline-none transition
                           placeholder:text-slate-400
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('folder')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >

                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Existing catalogue folder name. Do not change it unless the physical folder also matches.
                </p>

                @error('folder')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- DESCRIPTION --}}

            <div class="lg:col-span-2">

                <label
                    for="description"
                    class="mb-2 block text-sm font-bold text-slate-800"
                >
                    Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    placeholder="Enter category description"
                    class="w-full resize-y rounded-xl border px-4 py-3
                           text-sm leading-6 text-slate-900 outline-none
                           transition placeholder:text-slate-400
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('description')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >{{ old('description', $category->description ?? '') }}</textarea>

                <p class="mt-2 text-xs leading-5 text-slate-500">
                    This description can be displayed on the category products page.
                </p>

                @error('description')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>

        </div>

    </section>



    {{-- =====================================================
        CATEGORY MEDIA
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-6 border-b border-slate-100 pb-4">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                Media
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950">
                Category Media
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Manage the existing category image and products-page background images.
            </p>

        </div>


        <div class="space-y-7">

            {{-- EXISTING CATEGORY IMAGE --}}

            <div>

                <label
                    for="image"
                    class="mb-2 block text-sm font-bold text-slate-800"
                >
                    Category Image
                </label>

                <input
                    id="image"
                    type="text"
                    name="image"
                    value="{{ old('image', $category->image ?? '') }}"
                    autocomplete="off"
                    placeholder="images/categories/category.jpg"
                    class="w-full rounded-xl border px-4 py-3
                           font-mono text-sm text-slate-900
                           outline-none transition
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('image')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >

                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Existing category image path relative to the public directory.
                </p>

                @error('image')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror


                @if($editingCategory && !empty($category->image))

                    <div class="mt-4 inline-block rounded-2xl border border-slate-200 bg-slate-50 p-2">

                        <img
                            src="{{ asset($category->image) }}"
                            alt="{{ $category->name }}"
                            class="h-40 w-64 rounded-xl bg-white object-contain"
                        >

                    </div>

                @endif

            </div>


            {{-- HERO IMAGE --}}

            <div>

                <div class="mb-2">

                    <label
                        for="hero_image"
                        class="block text-sm font-bold text-slate-800"
                    >
                        Products Page Hero Background Image
                    </label>

                    <p class="mt-1 text-xs leading-5 text-slate-500">
                        Background image displayed in the hero section when this category is selected.
                    </p>

                </div>


                <input
                    id="hero_image"
                    type="text"
                    name="hero_image"
                    value="{{ old('hero_image', $category->hero_image ?? '') }}"
                    autocomplete="off"
                    placeholder="images/product-hero/cabinet-handles.jpg"
                    class="w-full rounded-xl border px-4 py-3
                           font-mono text-sm text-slate-900
                           outline-none transition
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('hero_image')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >

                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Leave empty to use the existing category-slug based fallback image.
                </p>

                @error('hero_image')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror


                @if($editingCategory && !empty($category->hero_image))

                    <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-2">

                        <img
                            src="{{ asset($category->hero_image) }}"
                            alt="{{ $category->name }} hero"
                            class="h-48 w-full rounded-xl bg-white object-cover"
                        >

                    </div>

                @endif

            </div>


            {{-- PREMIUM BANNER --}}

            <div>

                <div class="mb-2">

                    <label
                        for="banner_image"
                        class="block text-sm font-bold text-slate-800"
                    >
                        Premium Banner Background Image
                    </label>

                    <p class="mt-1 text-xs leading-5 text-slate-500">
                        Background image displayed in the premium banner section on the category products page.
                    </p>

                </div>


                <input
                    id="banner_image"
                    type="text"
                    name="banner_image"
                    value="{{ old('banner_image', $category->banner_image ?? '') }}"
                    autocomplete="off"
                    placeholder="images/product-banner/cabinet-handles.jpg"
                    class="w-full rounded-xl border px-4 py-3
                           font-mono text-sm text-slate-900
                           outline-none transition
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('banner_image')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >

                <p class="mt-2 text-xs leading-5 text-slate-500">
                    Leave empty to use the existing category-slug based fallback banner.
                </p>

                @error('banner_image')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror


                @if($editingCategory && !empty($category->banner_image))

                    <div class="mt-4 overflow-hidden rounded-2xl border border-slate-200 bg-slate-50 p-2">

                        <img
                            src="{{ asset($category->banner_image) }}"
                            alt="{{ $category->name }} premium banner"
                            class="h-48 w-full rounded-xl bg-white object-cover"
                        >

                    </div>

                @endif

            </div>

        </div>

    </section>



    {{-- =====================================================
        DISPLAY SETTINGS
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-6 border-b border-slate-100 pb-4">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                Display
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950">
                Category Status
            </h2>

        </div>


        <div class="grid gap-5 md:grid-cols-2">

            {{-- SORT ORDER --}}

            <div>

                <label
                    for="sort_order"
                    class="mb-2 block text-sm font-bold text-slate-800"
                >
                    Sort Order
                </label>

                <input
                    id="sort_order"
                    type="number"
                    min="0"
                    step="1"
                    name="sort_order"
                    value="{{ old('sort_order', $category->sort_order ?? 0) }}"
                    class="w-full rounded-xl border px-4 py-3
                           text-sm text-slate-900 outline-none transition
                           focus:border-orange-400
                           focus:ring-4 focus:ring-orange-100
                           @error('sort_order')
                               border-red-400 bg-red-50
                           @else
                               border-slate-300 bg-white
                           @enderror"
                >

                @error('sort_order')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- ACTIVE STATUS --}}

            <div>

                <p class="mb-2 block text-sm font-bold text-slate-800">
                    Visibility
                </p>

                <label
                    class="flex cursor-pointer items-start gap-3
                           rounded-2xl border border-slate-200
                           bg-slate-50 p-4"
                >

                    <input
                        type="checkbox"
                        name="is_active"
                        value="1"
                        @checked(
                            old(
                                'is_active',
                                $editingCategory
                                    ? $category->is_active
                                    : true
                            )
                        )
                        class="mt-0.5 h-5 w-5 rounded border-slate-300
                               text-orange-600 focus:ring-orange-500"
                    >

                    <span>

                        <strong class="block text-sm text-slate-800">
                            Category Active
                        </strong>

                        <span class="mt-1 block text-xs leading-5 text-slate-500">
                            Display this category on the public website.
                        </span>

                    </span>

                </label>

            </div>

        </div>

    </section>

</div>