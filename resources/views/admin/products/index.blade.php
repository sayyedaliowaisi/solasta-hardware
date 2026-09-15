@extends('admin.layouts.app')

@section('title', 'Products | Admin')

@section('content')

<div class="flex flex-col gap-5 sm:flex-row sm:items-center sm:justify-between">

    <div>

        <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-600">
            Catalogue
        </p>

        <h1 class="mt-2 text-3xl font-black text-slate-950">
            Products
        </h1>

    </div>

    <a
        href="{{ route('admin.products.create') }}"
        class="inline-flex items-center justify-center rounded-xl bg-orange-600 px-5 py-3 text-sm font-bold text-white hover:bg-orange-500"
    >
        + Add Product
    </a>

</div>


@if(session('success'))

    <div class="mt-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-sm font-semibold text-green-700">
        {{ session('success') }}
    </div>

@endif


<form method="GET" class="mt-7">

    <select
        name="category"
        onchange="this.form.submit()"
        class="rounded-xl border border-slate-300 bg-white px-4 py-3 text-sm font-bold text-slate-700"
    >

        <option value="">
            All Categories
        </option>

        @foreach($categories as $category)

            <option
                value="{{ $category->id }}"
                @selected(request('category') == $category->id)
            >
                {{ $category->name }}
            </option>

        @endforeach

    </select>

</form>


<div class="mt-7 grid gap-5 sm:grid-cols-2 xl:grid-cols-3 2xl:grid-cols-4">

    @forelse($products as $product)

        <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">

            <div class="aspect-[4/5] overflow-hidden bg-slate-100">

                <img
                    src="{{ asset($product->image) }}"
                    alt="{{ $product->name }}"
                    class="h-full w-full object-cover object-center"
                >

            </div>

            <div class="p-5">

                <p class="text-xs font-bold uppercase tracking-wider text-orange-600">
                    {{ $product->category?->name }}
                </p>

                <h2 class="mt-2 line-clamp-2 text-lg font-black text-slate-950">
                    {{ $product->name }}
                </h2>

                <div class="mt-4 flex flex-wrap gap-2">

                    @if($product->is_active)

                        <span class="rounded-full bg-green-50 px-3 py-1 text-xs font-bold text-green-700">
                            Active
                        </span>

                    @else

                        <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-500">
                            Hidden
                        </span>

                    @endif

                    @if($product->is_featured)

                        <span class="rounded-full bg-orange-50 px-3 py-1 text-xs font-bold text-orange-700">
                            Featured
                        </span>

                    @endif

                    @if($product->video)

                        <span class="rounded-full bg-blue-50 px-3 py-1 text-xs font-bold text-blue-700">
                            Video
                        </span>

                    @endif

                </div>

                <div class="mt-5 flex gap-2">

                    <a
                        href="{{ route('admin.products.edit', $product) }}"
                        class="flex-1 rounded-lg border border-slate-300 px-3 py-2.5 text-center text-xs font-bold text-slate-700 hover:bg-slate-50"
                    >
                        Edit
                    </a>

                    <form
                        method="POST"
                        action="{{ route('admin.products.destroy', $product) }}"
                        onsubmit="return confirm('Delete this product?')"
                    >

                        @csrf
                        @method('DELETE')

                        <button
                            class="rounded-lg border border-red-200 px-3 py-2.5 text-xs font-bold text-red-600 hover:bg-red-50"
                        >
                            Delete
                        </button>

                    </form>

                </div>

            </div>

        </div>

    @empty

        <div class="col-span-full rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center text-slate-500">
            No products found.
        </div>

    @endforelse

</div>


<div class="mt-8">
    {{ $products->links() }}
</div>

@endsection