@extends('admin.layouts.app')

@section('title', 'Add Category | Admin')

@section('content')

<div class="max-w-4xl">

    <a
        href="{{ route('admin.categories.index') }}"
        class="text-sm font-bold text-slate-500 hover:text-orange-600"
    >
        ← Categories
    </a>

    <h1 class="mt-4 text-3xl font-black text-slate-950">
        Add Category
    </h1>

    <form
        method="POST"
        action="{{ route('admin.categories.store') }}"
        class="mt-8 rounded-3xl border border-slate-200 bg-white p-6 sm:p-8 shadow-sm"
    >

        @csrf

        @include('admin.categories._form')

        <button
            type="submit"
            class="mt-8 rounded-xl bg-orange-600 px-6 py-3.5 font-bold text-white transition hover:bg-orange-500"
        >
            Save Category
        </button>

    </form>

</div>

@endsection