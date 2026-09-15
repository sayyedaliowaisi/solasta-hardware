@extends('admin.layouts.app')

@section('title', 'Edit Homepage Item | Admin')

@section('content')

<div class="max-w-4xl">

    <a
        href="{{ route('admin.homepage.sections', [
            'section' => $item->section
        ]) }}"
        class="text-sm font-bold text-slate-500"
    >
        ← Back
    </a>


    <h1 class="mt-4 text-3xl font-black">
        Edit Homepage Item
    </h1>


    <form
        method="POST"
        action="{{ route(
            'admin.homepage.items.update',
            $item
        ) }}"
        class="mt-8 rounded-3xl border border-slate-200 bg-white p-8"
    >

        @csrf
        @method('PUT')


        <input
            type="hidden"
            name="section"
            value="{{ $item->section }}"
        >


        <div class="grid gap-6 lg:grid-cols-2">

            @foreach([
                'title' => 'Title',
                'subtitle' => 'Subtitle',
                'value' => 'Value',
                'icon' => 'Icon',
                'image' => 'Image Path',
                'link' => 'Link',
            ] as $field => $label)

                <div>

                    <label class="mb-2 block text-sm font-bold">
                        {{ $label }}
                    </label>

                    <input
                        name="{{ $field }}"
                        value="{{ old(
                            $field,
                            $item->$field
                        ) }}"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

            @endforeach


            <div>

                <label class="mb-2 block text-sm font-bold">
                    Sort Order
                </label>

                <input
                    type="number"
                    name="sort_order"
                    min="0"
                    value="{{ old(
                        'sort_order',
                        $item->sort_order
                    ) }}"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >

            </div>


            <label class="flex items-center gap-3">

                <input
                    type="checkbox"
                    name="is_active"
                    value="1"
                    @checked(
                        old(
                            'is_active',
                            $item->is_active
                        )
                    )
                    class="h-5 w-5 rounded text-orange-600"
                >

                <span class="font-bold">
                    Active
                </span>

            </label>


            <div class="lg:col-span-2">

                <label class="mb-2 block text-sm font-bold">
                    Description
                </label>

                <textarea
                    name="description"
                    rows="6"
                    class="w-full rounded-xl border border-slate-300 px-4 py-3"
                >{{ old(
                    'description',
                    $item->description
                ) }}</textarea>

            </div>

        </div>


        <button
            class="mt-8 rounded-xl bg-orange-600 px-6 py-3 font-bold text-white"
        >
            Update Item
        </button>

    </form>

</div>

@endsection