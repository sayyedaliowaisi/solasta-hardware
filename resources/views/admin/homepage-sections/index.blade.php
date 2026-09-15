@extends('admin.layouts.app')

@section('title', 'Homepage Sections | Admin')

@section('content')

<div class="max-w-7xl">

    <div>

        <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-600">
            Homepage CMS
        </p>

        <h1 class="mt-2 text-3xl font-black text-slate-950">
            Homepage Sections
        </h1>

        <p class="mt-2 text-slate-500">
            Manage homepage cards, stats, brands,
            process and testimonials.
        </p>

    </div>


    {{-- SECTION TABS --}}
    <div class="mt-8 flex gap-3 overflow-x-auto pb-2">

        @php
            $labels = [
                'why_choose' => 'Why Choose Us',
                'stats' => 'Stats',
                'brands' => 'Brands',
                'process' => 'Process',
                'testimonials' => 'Testimonials',
            ];
        @endphp


        @foreach($allowedSections as $tab)

            <a
                href="{{ route('admin.homepage.sections', [
                    'section' => $tab
                ]) }}"
                class="
                    whitespace-nowrap
                    rounded-xl
                    px-5 py-3
                    text-sm font-bold
                    transition

                    {{ $sectionName === $tab
                        ? 'bg-orange-600 text-white'
                        : 'border border-slate-300 bg-white text-slate-600 hover:bg-slate-50'
                    }}
                "
            >
                {{ $labels[$tab] }}
            </a>

        @endforeach

    </div>


    @if(session('success'))

        <div class="mt-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-bold text-green-700">
            {{ session('success') }}
        </div>

    @endif


    {{-- SECTION SETTINGS --}}
    <form
        method="POST"
        action="{{ route(
            'admin.homepage.sections.update',
            $section
        ) }}"
        class="mt-8 rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm"
    >

        @csrf
        @method('PUT')


        <div class="flex items-center justify-between">

            <h2 class="text-xl font-black">
                Section Settings
            </h2>


            <label class="flex items-center gap-3">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    @checked($section->is_active)
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
                    name="badge"
                    value="{{ old('badge', $section->badge) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div>

                <label class="mb-2 block text-sm font-bold">
                    Sort Order
                </label>

                <input
                    type="number"
                    name="sort_order"
                    value="{{ old(
                        'sort_order',
                        $section->sort_order
                    ) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-bold">
                    Heading
                </label>

                <input
                    name="title"
                    value="{{ old('title', $section->title) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-bold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="4"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >{{ old(
                    'description',
                    $section->description
                ) }}</textarea>

            </div>

        </div>


        <button
            class="mt-6 rounded-xl bg-slate-950 px-6 py-3 font-bold text-white"
        >
            Save Section
        </button>

    </form>



    {{-- ADD ITEM --}}
    <form
        method="POST"
        action="{{ route('admin.homepage.items.store') }}"
        class="mt-8 rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm"
    >

        @csrf

        <input
            type="hidden"
            name="section"
            value="{{ $sectionName }}"
        >


        <h2 class="text-xl font-black">
            Add New Item
        </h2>


        <div class="mt-6 grid gap-5 lg:grid-cols-2">

            <input
                name="title"
                placeholder="Title"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >

            <input
                name="subtitle"
                placeholder="Subtitle / Role"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >

            <input
                name="value"
                placeholder="Value e.g. 500+ / Step 1"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >

            <input
                name="icon"
                placeholder="Icon / Symbol"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >

            <input
                name="image"
                placeholder="Image path"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >

            <input
                name="link"
                placeholder="Optional link"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >

            <input
                type="number"
                name="sort_order"
                value="0"
                min="0"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >


            <label class="flex items-center gap-3">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    checked
                    class="h-5 w-5 rounded text-orange-600"
                >

                <span class="font-bold">
                    Active
                </span>

            </label>


            <textarea
                name="description"
                rows="4"
                placeholder="Description / testimonial"
                class="lg:col-span-2 rounded-xl border border-slate-300 px-4 py-3"
            ></textarea>

        </div>


        <button
            class="mt-6 rounded-xl bg-orange-600 px-6 py-3 font-bold text-white hover:bg-orange-500"
        >
            + Add Item
        </button>

    </form>



    {{-- EXISTING ITEMS --}}
    <div class="mt-8">

        <h2 class="text-xl font-black text-slate-950">
            Existing Items
        </h2>


        <div class="mt-5 grid gap-5 md:grid-cols-2 xl:grid-cols-3">

            @forelse($items as $item)

                <div class="rounded-2xl border border-slate-200 bg-white p-5 shadow-sm">

                    @if($item->image)

                        <img
                            src="{{ asset($item->image) }}"
                            class="mb-4 h-32 w-full rounded-xl object-contain bg-slate-50"
                            alt=""
                        >

                    @endif


                    @if($item->value)

                        <p class="text-3xl font-black text-orange-600">
                            {{ $item->value }}
                        </p>

                    @endif


                    <h3 class="mt-2 text-lg font-black text-slate-900">
                        {{ $item->title ?: 'Untitled item' }}
                    </h3>


                    @if($item->subtitle)

                        <p class="mt-1 text-sm font-semibold text-slate-500">
                            {{ $item->subtitle }}
                        </p>

                    @endif


                    @if($item->description)

                        <p class="mt-3 line-clamp-3 text-sm leading-6 text-slate-500">
                            {{ $item->description }}
                        </p>

                    @endif


                    <div class="mt-5 flex items-center justify-between">

                        <span
                            class="rounded-full px-3 py-1 text-xs font-bold
                            {{ $item->is_active
                                ? 'bg-green-50 text-green-700'
                                : 'bg-slate-100 text-slate-500'
                            }}"
                        >
                            {{ $item->is_active
                                ? 'Active'
                                : 'Hidden'
                            }}
                        </span>


                        <div class="flex gap-2">

                            <a
                                href="{{ route(
                                    'admin.homepage.items.edit',
                                    $item
                                ) }}"
                                class="rounded-lg border border-slate-300 px-3 py-2 text-xs font-bold"
                            >
                                Edit
                            </a>


                            <form
                                method="POST"
                                action="{{ route(
                                    'admin.homepage.items.destroy',
                                    $item
                                ) }}"
                                onsubmit="return confirm('Delete this item?')"
                            >

                                @csrf
                                @method('DELETE')


                                <button
                                    class="rounded-lg border border-red-200 px-3 py-2 text-xs font-bold text-red-600"
                                >
                                    Delete
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            @empty

                <div class="md:col-span-2 xl:col-span-3 rounded-2xl border border-dashed border-slate-300 bg-white p-10 text-center text-slate-500">
                    No items added yet.
                </div>

            @endforelse

        </div>

    </div>

</div>

@endsection