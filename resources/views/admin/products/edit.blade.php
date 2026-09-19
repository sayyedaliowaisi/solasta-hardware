@extends('admin.layouts.app')

@section('title', 'Edit Product | Admin')

@section('content')

<div class="max-w-5xl">

    <a
        href="{{ route('admin.products.index') }}"
        class="inline-flex items-center gap-2 text-sm font-bold
               text-slate-500 transition hover:text-orange-600"
    >
        <i class="fa-solid fa-arrow-left text-xs"></i>
        Products
    </a>


    <div class="mt-4">

        <p class="text-xs font-black uppercase tracking-[0.18em] text-orange-600">
            Catalogue
        </p>

        <h1 class="mt-1 text-3xl font-black text-slate-950">
            Edit Product
        </h1>

        <p class="mt-2 text-sm text-slate-500">
            Update product information, media and product detail content.
        </p>

    </div>


    {{-- VALIDATION ERROR SUMMARY --}}

    @if($errors->any())

        <div
            class="mt-6 rounded-2xl border border-red-200
                   bg-red-50 px-5 py-4"
        >

            <div class="flex items-start gap-3">

                <i class="fa-solid fa-circle-exclamation mt-0.5 text-red-600"></i>

                <div>

                    <p class="text-sm font-black text-red-700">
                        Please check the form.
                    </p>

                    <p class="mt-1 text-xs leading-5 text-red-600">
                        Some fields contain invalid or missing information.
                    </p>

                </div>

            </div>

        </div>

    @endif


    <form
        action="{{ route('admin.products.update', $product) }}"
        method="POST"
        enctype="multipart/form-data"
        class="mt-8 rounded-3xl border border-slate-200
               bg-white p-6 shadow-sm sm:p-8"
    >

        @csrf
        @method('PUT')


        @include('admin.products._form')


        <div
            class="mt-8 flex flex-col gap-3 border-t
                   border-slate-200 pt-6 sm:flex-row
                   sm:items-center sm:justify-between"
        >

            <a
                href="{{ route('admin.products.index') }}"
                class="inline-flex items-center justify-center
                       rounded-xl border border-slate-300
                       px-6 py-3.5 text-sm font-bold
                       text-slate-700 transition hover:bg-slate-50"
            >
                Cancel
            </a>


            <button
                type="submit"
                class="inline-flex items-center justify-center gap-2
                       rounded-xl bg-orange-600 px-6 py-3.5
                       text-sm font-bold text-white transition
                       hover:bg-orange-500
                       focus:outline-none focus:ring-4
                       focus:ring-orange-200"
            >
                <i class="fa-solid fa-floppy-disk"></i>

                Update Product
            </button>

        </div>

    </form>

</div>

@endsection