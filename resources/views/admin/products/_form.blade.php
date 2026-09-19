@php
    $editingProduct = isset($product);

    $gallery = old(
        'gallery',
        $editingProduct && is_array($product->gallery)
            ? $product->gallery
            : []
    );

    $productTypes = old(
        'product_types',
        $editingProduct && is_array($product->product_types)
            ? $product->product_types
            : ['SS', 'PVD Gold', 'Matt Black', 'Antique Brass']
    );

    $specifications = old(
        'specifications',
        $editingProduct && is_array($product->specifications)
            ? $product->specifications
            : []
    );

    $dimensions = old(
        'dimensions',
        $editingProduct && is_array($product->dimensions)
            ? $product->dimensions
            : [
                'width' => '',
                'height' => '',
                'length' => '',
                'weight' => '',
            ]
    );

    $installationSteps = old(
        'installation_steps',
        $editingProduct && is_array($product->installation_steps)
            ? $product->installation_steps
            : []
    );

    $faqs = old(
        'faqs',
        $editingProduct && is_array($product->faqs)
            ? $product->faqs
            : []
    );

    $detailFeatures = old(
        'detail_features',
        $editingProduct && is_array($product->detail_features)
            ? $product->detail_features
            : []
    );
@endphp


<div
    class="space-y-8"
    x-data="{
        gallery: @js(array_values($gallery)),
        productTypes: @js(array_values($productTypes)),
        specifications: @js(array_values($specifications)),
        installationSteps: @js(array_values($installationSteps)),
        faqs: @js(array_values($faqs)),
        detailFeatures: @js(array_values($detailFeatures))
    }"
>

    {{-- =====================================================
        BASIC INFORMATION
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-6 border-b border-slate-100 pb-4">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                Product
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950">
                Basic Information
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Manage the main product information displayed on the website.
            </p>

        </div>


        <div class="grid gap-6 lg:grid-cols-2">

            {{-- NAME --}}

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
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
                >

                @error('name')
                    <p class="mt-2 text-sm font-medium text-red-600">
                        {{ $message }}
                    </p>
                @enderror

            </div>


            {{-- CATEGORY --}}

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
                    class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none transition focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
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


            {{-- PRICE --}}

<div>

    <label
        for="price"
        class="mb-2 block text-sm font-bold text-slate-800"
    >
        Product Price
        <span class="text-red-500">*</span>
    </label>

    <div
        class="flex overflow-hidden rounded-xl
               border border-slate-300 bg-white
               transition
               focus-within:border-orange-400
               focus-within:ring-4
               focus-within:ring-orange-100"
    >

        {{-- RUPEE PREFIX --}}

        <div
            class="flex min-w-[52px] items-center
                   justify-center border-r border-slate-200
                   bg-slate-50 px-4
                   text-base font-black text-slate-700"
        >
            ₹
        </div>


        {{-- PRICE INPUT --}}

        <input
            id="price"
            type="number"
            name="price"
            value="{{ old('price', $product->price ?? 1000) }}"
            min="0"
            step="0.01"
            required
            placeholder="1000"
            class="min-w-0 flex-1 border-0
                   bg-white px-4 py-3
                   text-sm font-bold text-slate-900
                   outline-none ring-0
                   focus:border-0
                   focus:outline-none
                   focus:ring-0"
        >


        {{-- UNIT --}}

        <div
            class="flex shrink-0 items-center
                   border-l border-slate-200
                   bg-slate-50 px-4
                   text-xs font-semibold text-slate-500"
        >
            / Piece
        </div>

    </div>


    <p class="mt-2 text-xs text-slate-500">
        Enter the selling price per piece.
    </p>


    @error('price')

        <p class="mt-2 text-sm font-medium text-red-600">
            {{ $message }}
        </p>

    @enderror

</div>


            {{-- SLUG --}}

            <div class="lg:col-span-2">

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
                    placeholder="Leave blank to generate automatically"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
                >

                <p class="mt-2 text-xs text-slate-500">
                    Leave blank to generate automatically.
                </p>

            </div>


            {{-- DESCRIPTION --}}

            <div class="lg:col-span-2">

                <label
                    for="description"
                    class="mb-2 block text-sm font-bold text-slate-800"
                >
                    Short Description
                </label>

                <textarea
                    id="description"
                    name="description"
                    rows="5"
                    class="w-full resize-y rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
                    placeholder="Enter product description"
                >{{ old('description', $product->description ?? '') }}</textarea>

            </div>

        </div>

    </section>



    {{-- =====================================================
    PRODUCT MEDIA
====================================================== --}}

<section
    class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6"
    x-data="{
        mainPreview: null,
        galleryPreviews: [],
        videoPreview: null,

        previewMain(event) {
            const file = event.target.files[0];

            if (!file) {
                this.mainPreview = null;
                return;
            }

            if (this.mainPreview) {
                URL.revokeObjectURL(this.mainPreview);
            }

            this.mainPreview = URL.createObjectURL(file);
        },

        previewGallery(event) {
            this.galleryPreviews.forEach(item => {
                URL.revokeObjectURL(item.url);
            });

            this.galleryPreviews = [];

            Array.from(event.target.files).forEach(file => {
                this.galleryPreviews.push({
                    name: file.name,
                    url: URL.createObjectURL(file)
                });
            });
        },

        previewVideo(event) {
            const file = event.target.files[0];

            if (!file) {
                this.videoPreview = null;
                return;
            }

            if (this.videoPreview) {
                URL.revokeObjectURL(this.videoPreview);
            }

            this.videoPreview = URL.createObjectURL(file);
        }
    }"
>

    {{-- HEADER --}}

    <div class="mb-6 border-b border-slate-100 pb-4">

        <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
            Media
        </p>

        <h2 class="mt-1 text-xl font-black text-slate-950">
            Product Media
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Upload new media or continue using existing files from public/images.
        </p>

    </div>


    {{-- =====================================================
         MAIN IMAGE
    ====================================================== --}}

    <div>

        <div class="flex flex-wrap items-center justify-between gap-3">

            <div>

                <label class="block text-sm font-bold text-slate-800">
                    Main Product Image
                    <span class="text-red-500">*</span>
                </label>

                <p class="mt-1 text-xs text-slate-500">
                    Main image displayed on product cards and product detail page.
                </p>

            </div>

            <span
                class="rounded-full bg-orange-50 px-3 py-1
                       text-[10px] font-black uppercase tracking-wider
                       text-orange-700"
            >
                Required
            </span>

        </div>


        {{-- CURRENT IMAGE --}}

        @if(
            $editingProduct
            && !empty($product->image)
        )

            <div
                class="mt-5 rounded-2xl border border-slate-200
                       bg-slate-50 p-4"
            >

                <div class="flex flex-col gap-4 sm:flex-row sm:items-center">

                    <div
                        class="flex h-40 w-40 shrink-0 items-center
                               justify-center overflow-hidden rounded-xl
                               border border-slate-200 bg-white"
                    >

                        <img
                            src="{{ asset($product->image) }}"
                            alt="{{ $product->name }}"
                            class="h-full w-full object-contain"
                        >

                    </div>


                    <div class="min-w-0">

                        <p
                            class="text-xs font-black uppercase
                                   tracking-wider text-green-600"
                        >
                            Current Main Image
                        </p>

                        <p
                            class="mt-2 break-all font-mono
                                   text-xs leading-5 text-slate-500"
                        >
                            {{ $product->image }}
                        </p>

                        <p class="mt-3 text-xs leading-5 text-slate-500">
                            Uploading a new image below will replace this image
                            for this product. The old physical file will not be deleted.
                        </p>

                    </div>

                </div>

            </div>

        @endif


        {{-- NEW MAIN IMAGE PREVIEW --}}

        <div
            x-show="mainPreview"
            x-cloak
            class="mt-5 rounded-2xl border border-orange-200
                   bg-orange-50/40 p-4"
        >

            <p
                class="mb-3 text-xs font-black uppercase
                       tracking-wider text-orange-700"
            >
                New Image Preview
            </p>

            <div
                class="flex h-48 w-48 items-center justify-center
                       overflow-hidden rounded-xl border
                       border-orange-200 bg-white"
            >

                <img
                    x-bind:src="mainPreview"
                    alt="New main image preview"
                    class="h-full w-full object-contain"
                >

            </div>

        </div>


        {{-- UPLOAD MAIN IMAGE --}}

        <div class="mt-5">

            <label
                for="image_upload"
                class="mb-2 block text-xs font-black uppercase
                       tracking-wider text-slate-500"
            >
                Upload {{ $editingProduct ? 'New' : '' }} Main Image
            </label>

            <input
                id="image_upload"
                type="file"
                name="image_upload"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                x-on:change="previewMain($event)"
                class="block w-full rounded-xl border border-slate-300
                       bg-white px-4 py-3 text-sm text-slate-700
                       file:mr-4 file:rounded-lg file:border-0
                       file:bg-orange-50 file:px-4 file:py-2
                       file:font-bold file:text-orange-700"
            >

            <p class="mt-2 text-xs text-slate-500">
                JPG, JPEG, PNG or WEBP. Maximum file size: 10 MB.
            </p>

            @error('image_upload')
                <p class="mt-2 text-sm font-medium text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- MANUAL EXISTING PATH --}}

        <div class="mt-5">

            <label
                for="image"
                class="mb-2 block text-xs font-black uppercase
                       tracking-wider text-slate-500"
            >
                Existing Image Path
            </label>

            <input
                id="image"
                type="text"
                name="image"
                value="{{ old('image', $product->image ?? '') }}"
                placeholder="images/Products/category/product.jpg"
                class="w-full rounded-xl border border-slate-300
                       px-4 py-3 font-mono text-sm outline-none
                       focus:border-orange-400
                       focus:ring-4 focus:ring-orange-100"
            >

            <p class="mt-2 text-xs leading-5 text-slate-500">
                Use this when the image already exists inside
                <strong>public/images</strong>. Path must be relative to public/.
            </p>

            @error('image')
                <p class="mt-2 text-sm font-medium text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>

    </div>


    {{-- =====================================================
         GALLERY
    ====================================================== --}}

    <div class="mt-8 border-t border-slate-100 pt-8">

        <div class="mb-5 flex flex-wrap items-start justify-between gap-4">

            <div>

                <h3 class="text-sm font-bold text-slate-800">
                    Product Gallery
                </h3>

                <p class="mt-1 text-xs leading-5 text-slate-500">
                    Maximum 7 additional images.
                    Main image + gallery = maximum 8 product images.
                </p>

            </div>

            <span
                class="rounded-full bg-slate-100 px-3 py-1
                       text-[10px] font-black text-slate-600"
            >
                <span x-text="gallery.length"></span>/7 Existing
            </span>

        </div>


        {{-- EXISTING GALLERY --}}

        <div
            x-show="gallery.length > 0"
            class="grid gap-4 md:grid-cols-2"
        >

            <template
                x-for="(image, index) in gallery"
                :key="index"
            >

                <div
                    class="overflow-hidden rounded-2xl border
                           border-slate-200 bg-slate-50"
                >

                    {{-- IMAGE PREVIEW --}}

                    <div
                        class="flex h-44 items-center justify-center
                               overflow-hidden border-b
                               border-slate-200 bg-white"
                    >

                        <img
                            x-bind:src="'/' + image.replace(/^\/+/, '')"
                            alt="Gallery image"
                            class="h-full w-full object-contain"
                        >

                    </div>


                    <div class="p-3">

                        <div class="flex items-center gap-2">

                            <div
                                class="flex h-9 w-9 shrink-0 items-center
                                       justify-center rounded-lg bg-white
                                       text-xs font-black text-slate-500"
                            >
                                <span x-text="index + 1"></span>
                            </div>

                            <input
                                type="text"
                                x-model="gallery[index]"
                                x-bind:name="'gallery[' + index + ']'"
                                placeholder="images/Products/.../image.jpg"
                                class="min-w-0 flex-1 rounded-xl
                                       border border-slate-300 bg-white
                                       px-3 py-2.5 font-mono text-xs
                                       outline-none focus:border-orange-400"
                            >

                            <button
                                type="button"
                                x-on:click="gallery.splice(index, 1)"
                                title="Remove image"
                                class="flex h-10 w-10 shrink-0 items-center
                                       justify-center rounded-xl border
                                       border-red-200 bg-red-50
                                       text-red-600 transition
                                       hover:bg-red-100"
                            >
                                <i class="fa-solid fa-trash"></i>
                            </button>

                        </div>

                    </div>

                </div>

            </template>

        </div>


        {{-- ADD EXISTING PATH --}}

        <button
            type="button"
            x-show="gallery.length < 7"
            x-on:click="if (gallery.length < 7) gallery.push('')"
            class="mt-4 inline-flex items-center gap-2 rounded-xl
                   border border-slate-300 px-4 py-2.5
                   text-xs font-black text-slate-600
                   transition hover:bg-slate-50"
        >
            <i class="fa-solid fa-plus"></i>

            Add Existing Image Path
        </button>


        {{-- NEW GALLERY UPLOADS --}}

        <div
            class="mt-6 rounded-2xl border border-orange-100
                   bg-orange-50/50 p-4"
        >

            <label
                for="gallery_uploads"
                class="block text-sm font-bold text-slate-800"
            >
                Upload New Gallery Images
            </label>

            <p class="mt-1 text-xs leading-5 text-slate-500">
                You can select multiple images together.
            </p>


            <input
                id="gallery_uploads"
                type="file"
                name="gallery_uploads[]"
                accept=".jpg,.jpeg,.png,.webp,image/jpeg,image/png,image/webp"
                multiple
                x-on:change="previewGallery($event)"
                class="mt-4 block w-full rounded-xl border
                       border-slate-300 bg-white px-4 py-3
                       text-sm file:mr-4 file:rounded-lg
                       file:border-0 file:bg-orange-100
                       file:px-4 file:py-2 file:font-bold
                       file:text-orange-700"
            >


            {{-- NEW GALLERY PREVIEWS --}}

            <div
                x-show="galleryPreviews.length > 0"
                x-cloak
                class="mt-5"
            >

                <div class="mb-3 flex items-center justify-between">

                    <p
                        class="text-xs font-black uppercase
                               tracking-wider text-orange-700"
                    >
                        Selected Images
                    </p>

                    <span
                        class="text-xs font-bold text-slate-500"
                        x-text="galleryPreviews.length + ' selected'"
                    ></span>

                </div>


                <div
                    class="grid grid-cols-2 gap-3
                           sm:grid-cols-3 lg:grid-cols-4"
                >

                    <template
                        x-for="(item, index) in galleryPreviews"
                        :key="item.url"
                    >

                        <div
                            class="overflow-hidden rounded-xl border
                                   border-orange-200 bg-white"
                        >

                            <div class="aspect-square overflow-hidden">

                                <img
                                    x-bind:src="item.url"
                                    x-bind:alt="item.name"
                                    class="h-full w-full object-contain"
                                >

                            </div>

                            <div class="border-t border-slate-100 p-2">

                                <p
                                    class="truncate text-[10px]
                                           font-semibold text-slate-500"
                                    x-text="item.name"
                                ></p>

                            </div>

                        </div>

                    </template>

                </div>

            </div>


            <p class="mt-3 text-xs leading-5 text-slate-500">
                JPG, JPEG, PNG or WEBP. Maximum 10 MB per image.
                Existing gallery + new uploads cannot exceed 7 images.
            </p>

        </div>


        @error('gallery')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

        @error('gallery.*')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

        @error('gallery_uploads')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

        @error('gallery_uploads.*')
            <p class="mt-2 text-sm font-medium text-red-600">
                {{ $message }}
            </p>
        @enderror

    </div>


    {{-- =====================================================
         VIDEO
    ====================================================== --}}

    <div class="mt-8 border-t border-slate-100 pt-8">

        <div>

            <h3 class="text-sm font-bold text-slate-800">
                Product Video
            </h3>

            <p class="mt-1 text-xs text-slate-500">
                Optional product demonstration or installation video.
            </p>

        </div>


        {{-- CURRENT VIDEO --}}

        @if(
            $editingProduct
            && !empty($product->video)
        )

            <div
                class="mt-5 rounded-2xl border border-slate-200
                       bg-slate-50 p-4"
            >

                <p
                    class="text-xs font-black uppercase
                           tracking-wider text-green-600"
                >
                    Current Video
                </p>

                <p
                    class="mt-2 break-all font-mono
                           text-xs leading-5 text-slate-500"
                >
                    {{ $product->video }}
                </p>


                <video
                    controls
                    preload="metadata"
                    class="mt-4 max-h-80 w-full rounded-xl bg-black"
                >
                    <source src="{{ asset($product->video) }}">

                    Your browser does not support video playback.
                </video>


                {{-- REMOVE VIDEO --}}

                <label
                    class="mt-4 inline-flex cursor-pointer
                           items-center gap-3 rounded-xl
                           border border-red-200 bg-red-50
                           px-4 py-3"
                >

                    <input
                        type="checkbox"
                        name="remove_video"
                        value="1"
                        @checked(old('remove_video'))
                        class="h-4 w-4 rounded border-red-300
                               text-red-600 focus:ring-red-500"
                    >

                    <span>

                        <strong
                            class="block text-sm font-bold text-red-700"
                        >
                            Remove Current Video
                        </strong>

                        <span
                            class="mt-0.5 block text-[11px]
                                   text-red-600"
                        >
                            Removes video from this product only.
                        </span>

                    </span>

                </label>

            </div>

        @endif


        {{-- NEW VIDEO --}}

        <div class="mt-5">

            <label
                for="video_upload"
                class="mb-2 block text-xs font-black uppercase
                       tracking-wider text-slate-500"
            >
                Upload {{ $editingProduct ? 'New' : '' }} Video
            </label>

            <input
                id="video_upload"
                type="file"
                name="video_upload"
                accept=".mp4,.webm,video/mp4,video/webm"
                x-on:change="previewVideo($event)"
                class="block w-full rounded-xl border
                       border-slate-300 bg-white px-4 py-3
                       text-sm file:mr-4 file:rounded-lg
                       file:border-0 file:bg-blue-50
                       file:px-4 file:py-2 file:font-bold
                       file:text-blue-700"
            >

            <p class="mt-2 text-xs text-slate-500">
                MP4 or WEBM. Maximum file size: 100 MB.
            </p>


            @error('video_upload')
                <p class="mt-2 text-sm font-medium text-red-600">
                    {{ $message }}
                </p>
            @enderror

        </div>


        {{-- NEW VIDEO PREVIEW --}}

        <div
            x-show="videoPreview"
            x-cloak
            class="mt-5 rounded-2xl border
                   border-blue-200 bg-blue-50/50 p-4"
        >

            <p
                class="text-xs font-black uppercase
                       tracking-wider text-blue-700"
            >
                New Video Preview
            </p>

            <video
                x-bind:src="videoPreview"
                controls
                preload="metadata"
                class="mt-4 max-h-80 w-full rounded-xl bg-black"
            ></video>

        </div>


        {{-- EXISTING VIDEO PATH --}}

        <div class="mt-5">

            <label
                for="video"
                class="mb-2 block text-xs font-black uppercase
                       tracking-wider text-slate-500"
            >
                Existing Video Path
            </label>

            <input
                id="video"
                type="text"
                name="video"
                value="{{ old('video', $product->video ?? '') }}"
                placeholder="images/Products/category/video_web.mp4"
                class="w-full rounded-xl border border-slate-300
                       px-4 py-3 font-mono text-sm outline-none
                       focus:border-orange-400
                       focus:ring-4 focus:ring-orange-100"
            >

            <p class="mt-2 text-xs leading-5 text-slate-500">
                Example:
                <code class="font-mono">
                    images/Products/cabinate handles/video_web.mp4
                </code>.
                Path is relative to public/.
            </p>

            @error('video')
                <p class="mt-2 text-sm font-medium text-red-600">
                    {{ $message }}
                </p>
            @enderror

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
                Product Display
            </h2>

        </div>


        <div class="grid gap-6 md:grid-cols-3">

            <div>

                <label class="mb-2 block text-sm font-bold text-slate-800">
                    Rating
                </label>

                <input
                    type="number"
                    name="rating"
                    min="0"
                    max="5"
                    step="0.1"
                    value="{{ old('rating', $product->rating ?? 5) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-bold text-slate-800">
                    Review Count
                </label>

                <input
                    type="number"
                    name="review_count"
                    min="0"
                    value="{{ old('review_count', $product->review_count ?? 0) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-bold text-slate-800">
                    Sort Order
                </label>

                <input
                    type="number"
                    name="sort_order"
                    min="0"
                    value="{{ old('sort_order', $product->sort_order ?? 0) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
                >

            </div>

        </div>


        {{-- TYPES --}}

        <div class="mt-7">

            <div class="mb-3 flex items-center justify-between gap-4">

                <div>

                    <p class="text-sm font-bold text-slate-800">
                        Product Types / Finishes
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Example: SS, PVD Gold, Matt Black, Antique Brass.
                    </p>

                </div>

                <button
                    type="button"
                    x-on:click="productTypes.push('')"
                    class="rounded-xl border border-orange-200 bg-orange-50 px-4 py-2 text-xs font-black text-orange-700"
                >
                    + Add Type
                </button>

            </div>


            <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">

                <template
                    x-for="(type, index) in productTypes"
                    :key="index"
                >

                    <div class="flex gap-2">

                        <input
                            type="text"
                            x-model="productTypes[index]"
                            x-bind:name="'product_types[' + index + ']'"
                            placeholder="Finish name"
                            class="min-w-0 flex-1 rounded-xl border border-slate-300 px-3 py-2.5 text-sm outline-none focus:border-orange-400"
                        >

                        <button
                            type="button"
                            x-on:click="productTypes.splice(index, 1)"
                            class="h-11 w-11 shrink-0 rounded-xl border border-red-200 bg-red-50 text-red-600"
                        >
                            <i class="fa-solid fa-xmark"></i>
                        </button>

                    </div>

                </template>

            </div>

        </div>

    </section>



    {{-- =====================================================
        DETAIL TAB
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-6 border-b border-slate-100 pb-4">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                Detail Page
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950">
                Product Detail Tab
            </h2>

        </div>


        <label class="mb-2 block text-sm font-bold text-slate-800">
            Product Detail Content
        </label>

        <textarea
            name="detail_content"
            rows="7"
            placeholder="Enter detailed product information..."
            class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm leading-6 outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
        >{{ old('detail_content', $product->detail_content ?? '') }}</textarea>


        <div class="mt-7">

            <div class="mb-3 flex items-center justify-between gap-4">

                <div>

                    <p class="text-sm font-bold text-slate-800">
                        Detail Features
                    </p>

                    <p class="mt-1 text-xs text-slate-500">
                        Example: Premium Quality, Multiple Finishes, Modern Design.
                    </p>

                </div>

                <button
                    type="button"
                    x-on:click="detailFeatures.push({title: '', description: ''})"
                    class="rounded-xl border border-orange-200 bg-orange-50 px-4 py-2 text-xs font-black text-orange-700"
                >
                    + Add Feature
                </button>

            </div>


            <div class="space-y-3">

                <template
                    x-for="(feature, index) in detailFeatures"
                    :key="index"
                >

                    <div class="grid gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4 md:grid-cols-[1fr_2fr_auto]">

                        <input
                            type="text"
                            x-model="feature.title"
                            x-bind:name="'detail_features[' + index + '][title]'"
                            placeholder="Feature title"
                            class="rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-orange-400"
                        >

                        <input
                            type="text"
                            x-model="feature.description"
                            x-bind:name="'detail_features[' + index + '][description]'"
                            placeholder="Feature description"
                            class="rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-orange-400"
                        >

                        <button
                            type="button"
                            x-on:click="detailFeatures.splice(index, 1)"
                            class="h-11 w-11 rounded-xl border border-red-200 bg-red-50 text-red-600"
                        >
                            <i class="fa-solid fa-trash"></i>
                        </button>

                    </div>

                </template>

            </div>

        </div>

    </section>



    {{-- =====================================================
        SPECIFICATIONS
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-5 flex flex-wrap items-center justify-between gap-4">

            <div>

                <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                    Information
                </p>

                <h2 class="mt-1 text-xl font-black text-slate-950">
                    Specifications
                </h2>

            </div>

            <button
                type="button"
                x-on:click="specifications.push({label: '', value: ''})"
                class="rounded-xl bg-slate-950 px-4 py-2.5 text-xs font-black text-white hover:bg-orange-600"
            >
                + Add Specification
            </button>

        </div>


        <div class="space-y-3">

            <template
                x-for="(spec, index) in specifications"
                :key="index"
            >

                <div class="grid gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4 md:grid-cols-[1fr_1.5fr_auto]">

                    <input
                        type="text"
                        x-model="spec.label"
                        x-bind:name="'specifications[' + index + '][label]'"
                        placeholder="Label e.g. Material"
                        class="rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-orange-400"
                    >

                    <input
                        type="text"
                        x-model="spec.value"
                        x-bind:name="'specifications[' + index + '][value]'"
                        placeholder="Value"
                        class="rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-orange-400"
                    >

                    <button
                        type="button"
                        x-on:click="specifications.splice(index, 1)"
                        class="h-11 w-11 rounded-xl border border-red-200 bg-red-50 text-red-600"
                    >
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </div>

            </template>

        </div>

    </section>



    {{-- =====================================================
        DIMENSIONS
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-6 border-b border-slate-100 pb-4">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                Measurements
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950">
                Product Dimensions
            </h2>

        </div>


        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">

            @foreach([
                'width' => 'Width',
                'height' => 'Height',
                'length' => 'Length',
                'weight' => 'Weight'
            ] as $key => $label)

                <div>

                    <label class="mb-2 block text-sm font-bold text-slate-800">
                        {{ $label }}
                    </label>

                    <input
                        type="text"
                        name="dimensions[{{ $key }}]"
                        value="{{ old('dimensions.' . $key, $dimensions[$key] ?? '') }}"
                        placeholder="e.g. 120 mm"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm outline-none focus:border-orange-400 focus:ring-4 focus:ring-orange-100"
                    >

                </div>

            @endforeach

        </div>

    </section>



    {{-- =====================================================
        INSTALLATION
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-5 flex flex-wrap items-center justify-between gap-4">

            <div>

                <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                    Installation
                </p>

                <h2 class="mt-1 text-xl font-black text-slate-950">
                    Installation Guide
                </h2>

            </div>

            <button
                type="button"
                x-on:click="installationSteps.push({title: '', description: ''})"
                class="rounded-xl bg-slate-950 px-4 py-2.5 text-xs font-black text-white hover:bg-orange-600"
            >
                + Add Step
            </button>

        </div>


        <div class="space-y-3">

            <template
                x-for="(step, index) in installationSteps"
                :key="index"
            >

                <div class="grid gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4 md:grid-cols-[50px_1fr_2fr_auto]">

                    <div class="flex h-11 items-center justify-center rounded-xl bg-orange-100 text-sm font-black text-orange-700">
                        <span x-text="String(index + 1).padStart(2, '0')"></span>
                    </div>

                    <input
                        type="text"
                        x-model="step.title"
                        x-bind:name="'installation_steps[' + index + '][title]'"
                        placeholder="Step title"
                        class="rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-orange-400"
                    >

                    <input
                        type="text"
                        x-model="step.description"
                        x-bind:name="'installation_steps[' + index + '][description]'"
                        placeholder="Step description"
                        class="rounded-xl border border-slate-300 bg-white px-3 py-2.5 text-sm outline-none focus:border-orange-400"
                    >

                    <button
                        type="button"
                        x-on:click="installationSteps.splice(index, 1)"
                        class="h-11 w-11 rounded-xl border border-red-200 bg-red-50 text-red-600"
                    >
                        <i class="fa-solid fa-trash"></i>
                    </button>

                </div>

            </template>

        </div>

    </section>



    {{-- =====================================================
        FAQs
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-5 flex flex-wrap items-center justify-between gap-4">

            <div>

                <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                    Help
                </p>

                <h2 class="mt-1 text-xl font-black text-slate-950">
                    Product FAQs
                </h2>

            </div>

            <button
                type="button"
                x-on:click="faqs.push({question: '', answer: ''})"
                class="rounded-xl bg-slate-950 px-4 py-2.5 text-xs font-black text-white hover:bg-orange-600"
            >
                + Add FAQ
            </button>

        </div>


        <div class="space-y-4">

            <template
                x-for="(faq, index) in faqs"
                :key="index"
            >

                <div class="rounded-2xl border border-slate-200 bg-slate-50 p-4">

                    <div class="flex items-start justify-between gap-4">

                        <strong class="text-sm text-slate-800">
                            FAQ <span x-text="index + 1"></span>
                        </strong>

                        <button
                            type="button"
                            x-on:click="faqs.splice(index, 1)"
                            class="text-sm font-bold text-red-600"
                        >
                            Remove
                        </button>

                    </div>


                    <div class="mt-4 space-y-3">

                        <input
                            type="text"
                            x-model="faq.question"
                            x-bind:name="'faqs[' + index + '][question]'"
                            placeholder="Question"
                            class="w-full rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-400"
                        >

                        <textarea
                            x-model="faq.answer"
                            x-bind:name="'faqs[' + index + '][answer]'"
                            rows="3"
                            placeholder="Answer"
                            class="w-full resize-y rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm outline-none focus:border-orange-400"
                        ></textarea>

                    </div>

                </div>

            </template>

        </div>

    </section>



    {{-- =====================================================
        STATUS
    ====================================================== --}}

    <section class="rounded-3xl border border-slate-200 bg-white p-5 sm:p-6">

        <div class="mb-5">

            <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
                Visibility
            </p>

            <h2 class="mt-1 text-xl font-black text-slate-950">
                Product Status
            </h2>

        </div>


        <div class="grid gap-4 md:grid-cols-2">

            <label class="flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    @checked(
                        old(
                            'is_active',
                            $editingProduct
                                ? $product->is_active
                                : true
                        )
                    )
                    class="mt-0.5 h-5 w-5 rounded border-slate-300 text-orange-600 focus:ring-orange-500"
                >

                <span>

                    <strong class="block text-sm text-slate-800">
                        Product Active
                    </strong>

                    <span class="mt-1 block text-xs leading-5 text-slate-500">
                        Display this product on the public website.
                    </span>

                </span>

            </label>


            <label class="flex cursor-pointer items-start gap-3 rounded-2xl border border-slate-200 bg-slate-50 p-4">

                <input
                    type="checkbox"
                    name="is_featured"
                    value="1"
                    @checked(
                        old(
                            'is_featured',
                            $editingProduct
                                ? $product->is_featured
                                : false
                        )
                    )
                    class="mt-0.5 h-5 w-5 rounded border-slate-300 text-orange-600 focus:ring-orange-500"
                >

                <span>

                    <strong class="block text-sm text-slate-800">
                        Featured Product
                    </strong>

                    <span class="mt-1 block text-xs leading-5 text-slate-500">
                        Prioritize this product in featured/related areas.
                    </span>

                </span>

            </label>

        </div>

    </section>

</div>