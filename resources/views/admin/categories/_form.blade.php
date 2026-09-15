<div class="space-y-6">

    <div>

        <label class="mb-2 block text-sm font-bold text-slate-800">
            Category Name
        </label>

        <input
            type="text"
            name="name"
            value="{{ old('name', $category->name ?? '') }}"
            required
            class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-orange-500 focus:ring-4 focus:ring-orange-500/10"
        >

    </div>


    <div>

        <label class="mb-2 block text-sm font-bold text-slate-800">
            Slug
        </label>

        <input
            type="text"
            name="slug"
            value="{{ old('slug', $category->slug ?? '') }}"
            placeholder="cabinet-handles"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-orange-500"
        >

    </div>


    <div>

        <label class="mb-2 block text-sm font-bold text-slate-800">
            Product Folder
        </label>

        <input
            type="text"
            name="folder"
            value="{{ old('folder', $category->folder ?? '') }}"
            placeholder="cabinate handles"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-orange-500"
        >

    </div>


    <div>

        <label class="mb-2 block text-sm font-bold text-slate-800">
            Description
        </label>

        <textarea
            name="description"
            rows="5"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-orange-500"
        >{{ old('description', $category->description ?? '') }}</textarea>

    </div>


    <div>

        <label class="mb-2 block text-sm font-bold text-slate-800">
            Sort Order
        </label>

        <input
            type="number"
            min="0"
            name="sort_order"
            value="{{ old('sort_order', $category->sort_order ?? 0) }}"
            class="w-full rounded-xl border border-slate-300 px-4 py-3 outline-none focus:border-orange-500"
        >

    </div>


    <label class="flex items-center gap-3">

        <input
            type="checkbox"
            name="is_active"
            value="1"
            @checked(old('is_active', $category->is_active ?? true))
            class="h-5 w-5 rounded border-slate-300 text-orange-600 focus:ring-orange-500"
        >

        <span class="text-sm font-bold text-slate-700">
            Category Active
        </span>

    </label>

</div>