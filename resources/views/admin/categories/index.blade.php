@extends('admin.layouts.app')

@section('title', 'Categories | Admin')

@section('content')

<div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

    <div>

        <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-600">
            Catalogue
        </p>

        <h1 class="mt-2 text-3xl font-black text-slate-950">
            Categories
        </h1>

    </div>


    <a
        href="{{ route('admin.categories.create') }}"
        class="inline-flex items-center justify-center rounded-xl
               bg-orange-600 px-5 py-3 text-sm font-bold text-white
               transition hover:bg-orange-500"
    >
        + Add Category
    </a>

</div>


{{-- SUCCESS --}}

@if(session('success'))

    <div class="mt-6 rounded-xl border border-green-200
                bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">

        {{ session('success') }}

    </div>

@endif


{{-- ERROR --}}

@if(session('error'))

    <div class="mt-6 rounded-xl border border-red-200
                bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">

        {{ session('error') }}

    </div>

@endif


<div class="mt-8 overflow-hidden rounded-2xl border
            border-slate-200 bg-white shadow-sm">

    <div class="overflow-x-auto">

        <table class="min-w-full">

            <thead class="bg-slate-50">

                <tr class="text-left text-xs uppercase tracking-wider text-slate-500">

                    <th class="px-6 py-4">
                        Category
                    </th>

                    <th class="px-6 py-4">
                        Products
                    </th>

                    <th class="px-6 py-4">
                        Page Media
                    </th>

                    <th class="px-6 py-4">
                        Status
                    </th>

                    <th class="px-6 py-4">
                        Order
                    </th>

                    <th class="px-6 py-4 text-right">
                        Actions
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-200">

                @forelse($categories as $category)

                    <tr class="transition hover:bg-slate-50/70">

                        {{-- CATEGORY --}}

                        <td class="px-6 py-5">

                            <p class="font-black text-slate-900">
                                {{ $category->name }}
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                {{ $category->slug }}
                            </p>

                            @if(!empty($category->folder))

                                <p class="mt-1 max-w-xs truncate text-xs text-slate-400">
                                    Folder: {{ $category->folder }}
                                </p>

                            @endif

                        </td>


                        {{-- PRODUCTS --}}

                        <td class="px-6 py-5 text-sm text-slate-600">

                            <span class="font-bold text-slate-800">
                                {{ $category->products_count }}
                            </span>

                        </td>


                        {{-- PAGE MEDIA --}}

                        <td class="px-6 py-5">

                            <div class="flex flex-wrap gap-2">

                                @if(!empty($category->hero_image))

                                    <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                                        Hero ✓
                                    </span>

                                @else

                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-500">
                                        Hero Fallback
                                    </span>

                                @endif


                                @if(!empty($category->banner_image))

                                    <span class="rounded-full bg-purple-50 px-3 py-1 text-xs font-bold text-purple-700">
                                        Banner ✓
                                    </span>

                                @else

                                    <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-500">
                                        Banner Fallback
                                    </span>

                                @endif

                            </div>

                        </td>


                        {{-- STATUS --}}

                        <td class="px-6 py-5">

                            @if($category->is_active)

                                <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-bold text-green-700">
                                    Active
                                </span>

                            @else

                                <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-500">
                                    Hidden
                                </span>

                            @endif

                        </td>


                        {{-- ORDER --}}

                        <td class="px-6 py-5 text-sm text-slate-600">
                            {{ $category->sort_order }}
                        </td>


                        {{-- ACTIONS --}}

                        <td class="px-6 py-5">

                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('admin.categories.edit', $category) }}"
                                    class="rounded-lg border border-slate-300
                                           px-3 py-2 text-xs font-bold
                                           text-slate-700 transition
                                           hover:bg-slate-50"
                                >
                                    Edit
                                </a>


                                <form
                                    method="POST"
                                    action="{{ route('admin.categories.destroy', $category) }}"
                                    onsubmit="return confirm('Delete this category? Categories containing products cannot be deleted.');"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded-lg border border-red-200
                                               px-3 py-2 text-xs font-bold
                                               text-red-600 transition
                                               hover:bg-red-50"
                                    >
                                        Delete
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-12 text-center text-slate-500"
                        >
                            No categories found.
                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

@endsection