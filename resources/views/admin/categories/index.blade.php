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
        class="inline-flex items-center justify-center rounded-xl bg-orange-600 px-5 py-3 text-sm font-bold text-white hover:bg-orange-500"
    >
        + Add Category
    </a>

</div>


@if(session('success'))

    <div class="mt-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
        {{ session('success') }}
    </div>

@endif


<div class="mt-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

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

                    <tr>

                        <td class="px-6 py-5">

                            <p class="font-black text-slate-900">
                                {{ $category->name }}
                            </p>

                            <p class="mt-1 text-xs text-slate-400">
                                {{ $category->slug }}
                            </p>

                        </td>

                        <td class="px-6 py-5 text-sm text-slate-600">
                            {{ $category->products_count }}
                        </td>

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

                        <td class="px-6 py-5 text-sm text-slate-600">
                            {{ $category->sort_order }}
                        </td>

                        <td class="px-6 py-5">

                            <div class="flex justify-end gap-2">

                                <a
                                    href="{{ route('admin.categories.edit', $category) }}"
                                    class="rounded-lg border border-slate-300 px-3 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50"
                                >
                                    Edit
                                </a>

                                <form
                                    method="POST"
                                    action="{{ route('admin.categories.destroy', $category) }}"
                                    onsubmit="return confirm('Delete this category and all its products?')"
                                >

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        class="rounded-lg border border-red-200 px-3 py-2 text-xs font-bold text-red-600 hover:bg-red-50"
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
                            colspan="5"
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