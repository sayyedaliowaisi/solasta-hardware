@extends('admin.layouts.app')

@section('title', 'Edit Product | Admin')

@section('content')

<div class="max-w-5xl">

    <a
        href="{{ route('admin.products.index') }}"
        class="text-sm font-bold text-slate-500 hover:text-orange-600"
    >
        ← Products
    </a>

    <h1 class="mt-4 text-3xl font-black text-slate-950">
        Edit Product
    </h1>

    <form
        action="{{ route('admin.products.update', $product) }}"
        method="POST"
        class="mt-8 rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm"
    >

        @csrf
        @method('PUT')

        @include('admin.products._form')

        <button
            class="mt-8 rounded-xl bg-orange-600 px-6 py-3.5 font-bold text-white hover:bg-orange-500"
        >
            Update Product
        </button>

    </form>

</div>

@endsection