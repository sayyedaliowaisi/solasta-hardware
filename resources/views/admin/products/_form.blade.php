@php
    $editingProduct = isset($product);
@endphp


<div class="grid gap-6 lg:grid-cols-2">


    {{-- =====================================================
        PRODUCT NAME
    ====================================================== --}}

    <div class="lg:col-span-2">

        <label
            for="name"
            class="mb-2 block text-sm font-bold text-slate-800"
        >
            Product Name
            <span class="text-red-500">*</span>
        </label>

        <input
            id="name"
            type="text"
            name="name"
            value="{{ old('name', $product->name ?? '') }}"
            required
            autocomplete="off"
            placeholder="Enter product name"

            class="w-full rounded-xl border
                   px-4 py-3
                   text-sm text-slate-900
                   outline-none transition
                   placeholder:text-slate-400
                   focus:border-orange-400
                   focus:ring-4
                   focus:ring-orange-100
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



    {{-- =====================================================
        CATEGORY
    ====================================================== --}}

    <div>

        <label
            for="category_id"
            class="mb-2 block text-sm font-bold text-slate-800"
        >
            Category
            <span class="text-red-500">*</span>
        </label>

        <select
            id="category_id"
            name="category_id"
            required

            class="w-full rounded-xl border
                   px-4 py-3
                   text-sm text-slate-900
                   outline-none transition
                   focus:border-orange-400
                   focus:ring-4
                   focus:ring-orange-100
                   @error('category_id')
                       border-red-400 bg-red-50
                   @else
                       border-slate-300 bg-white
                   @enderror"
        >

            <option value="">
                Select Category
            </option>

            @foreach($categories as $category)

                <option
                    value="{{ $category->id }}"
                    @selected(
                        old(
                            'category_id',
                            $product->category_id ?? null
                        ) == $category->id
                    )
                >
                    {{ $category->name }}
                </option>

            @endforeach

        </select>

        @error('category_id')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>



    {{-- =====================================================
        SLUG
    ====================================================== --}}

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
            value="{{ old('slug', $product->slug ?? '') }}"
            autocomplete="off"
            placeholder="Leave blank to generate automatically"

            class="w-full rounded-xl border
                   px-4 py-3
                   text-sm text-slate-900
                   outline-none transition
                   placeholder:text-slate-400
                   focus:border-orange-400
                   focus:ring-4
                   focus:ring-orange-100
                   @error('slug')
                       border-red-400 bg-red-50
                   @else
                       border-slate-300 bg-white
                   @enderror"
        >

        <p class="mt-2 text-xs leading-5 text-slate-500">
            Leave blank and Laravel will generate a unique slug
            from the product name.
        </p>

        @error('slug')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>



    {{-- =====================================================
        DESCRIPTION
    ====================================================== --}}

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
            placeholder="Enter product description"

            class="w-full resize-y rounded-xl border
                   px-4 py-3
                   text-sm leading-6
                   text-slate-900
                   outline-none transition
                   placeholder:text-slate-400
                   focus:border-orange-400
                   focus:ring-4
                   focus:ring-orange-100
                   @error('description')
                       border-red-400 bg-red-50
                   @else
                       border-slate-300 bg-white
                   @enderror"
        >{{ old('description', $product->description ?? '') }}</textarea>

        @error('description')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>



    {{-- =====================================================
        IMAGE PATH
    ====================================================== --}}

    <div class="lg:col-span-2">

        <label
            for="image"
            class="mb-2 block text-sm font-bold text-slate-800"
        >
            Image Path
            <span class="text-red-500">*</span>
        </label>

        <input
            id="image"
            type="text"
            name="image"
            value="{{ old('image', $product->image ?? '') }}"
            placeholder="images/Products/cabinate handles/example.jpg"
            required
            autocomplete="off"

            class="w-full rounded-xl border
                   px-4 py-3
                   font-mono text-sm
                   text-slate-900
                   outline-none transition
                   placeholder:text-slate-400
                   focus:border-orange-400
                   focus:ring-4
                   focus:ring-orange-100
                   @error('image')
                       border-red-400 bg-red-50
                   @else
                       border-slate-300 bg-white
                   @enderror"
        >

        <p class="mt-2 text-xs leading-5 text-slate-500">
            Enter the path relative to the public directory.
            Keep the exact folder and filename capitalization.
        </p>

        @error('image')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror


        {{-- CURRENT IMAGE PREVIEW --}}

        @if(
            isset($product) &&
            !empty($product->image)
        )

            <div
                class="mt-4
                       inline-block
                       overflow-hidden
                       rounded-2xl
                       border border-slate-200
                       bg-white
                       p-2
                       shadow-sm"
            >

                <img
                    src="{{ asset($product->image) }}"
                    alt="{{ $product->name ?? 'Product image' }}"
                    loading="lazy"
                    class="h-48 w-40
                           rounded-xl
                           object-contain
                           bg-slate-50"
                >

            </div>

        @endif

    </div>



    {{-- =====================================================
        VIDEO PATH
    ====================================================== --}}

    <div class="lg:col-span-2">

        <label
            for="video"
            class="mb-2 block text-sm font-bold text-slate-800"
        >
            Video Path
        </label>

        <input
            id="video"
            type="text"
            name="video"
            value="{{ old('video', $product->video ?? '') }}"
            placeholder="images/Products/.../video_web.mp4"
            autocomplete="off"

            class="w-full rounded-xl border
                   px-4 py-3
                   font-mono text-sm
                   text-slate-900
                   outline-none transition
                   placeholder:text-slate-400
                   focus:border-orange-400
                   focus:ring-4
                   focus:ring-orange-100
                   @error('video')
                       border-red-400 bg-red-50
                   @else
                       border-slate-300 bg-white
                   @enderror"
        >

        <p class="mt-2 text-xs leading-5 text-slate-500">
            Optional. Use the web-compatible
            <strong>_web.mp4</strong> file when available.
        </p>

        @error('video')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>



    {{-- =====================================================
        SORT ORDER
    ====================================================== --}}

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
            value="{{ old('sort_order', $product->sort_order ?? 0) }}"

            class="w-full rounded-xl border
                   px-4 py-3
                   text-sm text-slate-900
                   outline-none transition
                   focus:border-orange-400
                   focus:ring-4
                   focus:ring-orange-100
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



    {{-- =====================================================
        PRODUCT STATUS
    ====================================================== --}}

    <div
        class="rounded-2xl
               border border-slate-200
               bg-slate-50
               p-4"
    >

        <p
            class="mb-4 text-xs
                   font-black uppercase
                   tracking-[0.15em]
                   text-slate-500"
        >
            Product Status
        </p>


        <div class="space-y-4">


            {{-- ACTIVE --}}

            <label
                class="flex cursor-pointer
                       items-start gap-3"
            >

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"

                    @checked(
                        old(
                            'is_active',
                            isset($product)
                                ? $product->is_active
                                : true
                        )
                    )

                    class="mt-0.5
                           h-5 w-5
                           rounded
                           border-slate-300
                           text-orange-600
                           focus:ring-orange-500"
                >

                <span>

                    <span
                        class="block text-sm
                               font-bold
                               text-slate-800"
                    >
                        Product Active
                    </span>

                    <span
                        class="mt-1 block text-xs
                               leading-5
                               text-slate-500"
                    >
                        Active products can be displayed
                        on the public website.
                    </span>

                </span>

            </label>



            {{-- FEATURED --}}

            <label
                class="flex cursor-pointer
                       items-start gap-3"
            >

                <input
                    type="checkbox"
                    name="is_featured"
                    value="1"

                    @checked(
                        old(
                            'is_featured',
                            isset($product)
                                ? $product->is_featured
                                : false
                        )
                    )

                    class="mt-0.5
                           h-5 w-5
                           rounded
                           border-slate-300
                           text-orange-600
                           focus:ring-orange-500"
                >

                <span>

                    <span
                        class="block text-sm
                               font-bold
                               text-slate-800"
                    >
                        Featured Product
                    </span>

                    <span
                        class="mt-1 block text-xs
                               leading-5
                               text-slate-500"
                    >
                        Use this for products you want
                        to highlight on the website.
                    </span>

                </span>

            </label>

        </div>

    </div>

</div>