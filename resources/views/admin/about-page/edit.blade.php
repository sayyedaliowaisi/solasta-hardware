@extends('admin.layouts.app')

@section('title', 'About Page CMS')

@section('content')

<div class="max-w-7xl mx-auto">

    {{-- =========================================================
        PAGE HEADER
    ========================================================== --}}
    <div class="mb-8">

        <div class="flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">

            <div>

                <p class="text-sm font-semibold uppercase tracking-[0.18em] text-orange-500">
                    Website Content
                </p>

                <h1 class="mt-2 text-3xl font-black tracking-tight text-slate-900">
                    About Page CMS
                </h1>

                <p class="mt-2 max-w-2xl text-sm leading-6 text-slate-500">
                    Manage About page sections and repeatable content cards.
                </p>

            </div>

        </div>

    </div>


    {{-- =========================================================
        SUCCESS MESSAGE
    ========================================================== --}}
    @if(session('success'))

        <div
            class="mb-6 rounded-2xl
                   border border-emerald-200
                   bg-emerald-50
                   px-5 py-4
                   text-sm font-semibold
                   text-emerald-700"
        >
            {{ session('success') }}
        </div>

    @endif


    {{-- =========================================================
        VALIDATION ERRORS
    ========================================================== --}}
    @if($errors->any())

        <div
            class="mb-6 rounded-2xl
                   border border-red-200
                   bg-red-50
                   px-5 py-4"
        >

            <p class="font-bold text-red-700">
                Please fix the following errors:
            </p>

            <ul class="mt-3 list-disc space-y-1 pl-5 text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    {{-- =========================================================
        SECTION SETTINGS FORM
    ========================================================== --}}
    <form
        action="{{ route('admin.about-page.update') }}"
        method="POST"
    >

        @csrf
        @method('PUT')


        <div class="space-y-6">

            @foreach($sections as $section)

                <div
                    class="overflow-hidden
                           rounded-3xl
                           border border-slate-200
                           bg-white
                           shadow-sm"
                >

                    {{-- SECTION HEADER --}}
                    <div
                        class="flex flex-col gap-4
                               border-b border-slate-100
                               bg-slate-50/70
                               px-5 py-5
                               sm:flex-row
                               sm:items-center
                               sm:justify-between
                               md:px-6"
                    >

                        <div>

                            <div class="flex flex-wrap items-center gap-2">

                                <span
                                    class="inline-flex rounded-full
                                           bg-slate-900
                                           px-3 py-1
                                           text-[10px]
                                           font-bold uppercase
                                           tracking-[0.14em]
                                           text-white"
                                >
                                    {{ str_replace('_', ' ', $section->section) }}
                                </span>


                                <span class="text-xs font-semibold text-slate-400">
                                    Section #{{ $section->sort_order }}
                                </span>

                            </div>


                            <h2 class="mt-3 text-lg font-black text-slate-900">
                                {{
                                    $section->title
                                    ?: ucfirst(
                                        str_replace(
                                            '_',
                                            ' ',
                                            $section->section
                                        )
                                    )
                                }}
                            </h2>

                        </div>


                        {{-- ACTIVE --}}
                        <label class="inline-flex cursor-pointer items-center gap-3">

                            <input
                                type="checkbox"
                                name="sections[{{ $section->id }}][is_active]"
                                value="1"
                                class="h-4 w-4 rounded
                                       border-slate-300
                                       text-orange-600
                                       focus:ring-orange-500"
                                @checked(
                                    old(
                                        'sections.' .
                                        $section->id .
                                        '.is_active',
                                        $section->is_active
                                    )
                                )
                            >

                            <span class="text-sm font-bold text-slate-700">
                                Active
                            </span>

                        </label>

                    </div>


                    {{-- SECTION BODY --}}
                    <div
                        class="grid gap-5
                               p-5
                               md:grid-cols-2
                               md:p-6"
                    >

                        <input
                            type="hidden"
                            name="sections[{{ $section->id }}][id]"
                            value="{{ $section->id }}"
                        >


                        {{-- BADGE --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Badge
                            </label>

                            <input
                                type="text"
                                name="sections[{{ $section->id }}][badge]"
                                value="{{ old(
                                    'sections.' . $section->id . '.badge',
                                    $section->badge
                                ) }}"
                                class="w-full rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >

                        </div>


                        {{-- TITLE --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Title
                            </label>

                            <input
                                type="text"
                                name="sections[{{ $section->id }}][title]"
                                value="{{ old(
                                    'sections.' . $section->id . '.title',
                                    $section->title
                                ) }}"
                                class="w-full rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >

                        </div>


                        {{-- SUBTITLE --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Subtitle
                            </label>

                            <input
                                type="text"
                                name="sections[{{ $section->id }}][subtitle]"
                                value="{{ old(
                                    'sections.' . $section->id . '.subtitle',
                                    $section->subtitle
                                ) }}"
                                class="w-full rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >

                        </div>


                        {{-- SORT ORDER --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Sort Order
                            </label>

                            <input
                                type="number"
                                min="0"
                                name="sections[{{ $section->id }}][sort_order]"
                                value="{{ old(
                                    'sections.' . $section->id . '.sort_order',
                                    $section->sort_order
                                ) }}"
                                class="w-full rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >

                        </div>


                        {{-- DESCRIPTION --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Description
                            </label>

                            <textarea
                                name="sections[{{ $section->id }}][description]"
                                rows="4"
                                class="w-full resize-y rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm leading-6
                                       text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >{{ old(
                                'sections.' . $section->id . '.description',
                                $section->description
                            ) }}</textarea>

                        </div>


                        {{-- IMAGE --}}
                        <div class="md:col-span-2">

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Image Path
                            </label>

                            <input
                                type="text"
                                name="sections[{{ $section->id }}][image]"
                                value="{{ old(
                                    'sections.' . $section->id . '.image',
                                    $section->image
                                ) }}"
                                placeholder="images/about/example.jpg"
                                class="w-full rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >

                            <p class="mt-2 text-xs leading-5 text-slate-400">
                                Example: images/about/hero.jpg
                            </p>

                        </div>


                        {{-- BUTTON TEXT --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Button Text
                            </label>

                            <input
                                type="text"
                                name="sections[{{ $section->id }}][button_text]"
                                value="{{ old(
                                    'sections.' . $section->id . '.button_text',
                                    $section->button_text
                                ) }}"
                                class="w-full rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >

                        </div>


                        {{-- BUTTON LINK --}}
                        <div>

                            <label class="mb-2 block text-xs font-bold uppercase tracking-[0.12em] text-slate-500">
                                Button Link
                            </label>

                            <input
                                type="text"
                                name="sections[{{ $section->id }}][button_link]"
                                value="{{ old(
                                    'sections.' . $section->id . '.button_link',
                                    $section->button_link
                                ) }}"
                                placeholder="/products"
                                class="w-full rounded-xl
                                       border border-slate-200
                                       px-4 py-3
                                       text-sm text-slate-800
                                       outline-none transition
                                       focus:border-orange-400
                                       focus:ring-2
                                       focus:ring-orange-100"
                            >

                        </div>

                    </div>


                    {{-- ITEM STATUS --}}
                    @if(in_array($section->section, [
                        'mission_vision',
                        'why_choose',
                        'journey',
                        'team',
                        'industries',
                        'trusted_brand'
                    ]))

                        <div
                            class="border-t border-slate-100
                                   bg-orange-50/40
                                   px-5 py-4
                                   md:px-6"
                        >

                            <div class="flex items-center justify-between gap-4">

                                <div>

                                    <p class="text-sm font-black text-slate-800">
                                        Repeatable Items
                                    </p>

                                    <p class="mt-1 text-xs text-slate-500">
                                        {{
                                            $section->items->count()
                                        }}
                                        item(s) currently added
                                    </p>

                                </div>

                                <span
                                    class="rounded-full
                                           bg-white
                                           px-3 py-1
                                           text-xs font-bold
                                           text-orange-600
                                           shadow-sm"
                                >
                                    Manage Below
                                </span>

                            </div>

                        </div>

                    @endif

                </div>

            @endforeach

        </div>


        {{-- SAVE SECTION SETTINGS --}}
        <div
            class="sticky bottom-4 z-20
                   mt-8 flex justify-end"
        >

            <button
                type="submit"
                class="inline-flex min-h-[46px]
                       items-center justify-center
                       rounded-xl
                       bg-orange-600
                       px-6
                       text-sm font-bold
                       text-white
                       shadow-lg
                       shadow-orange-600/20
                       transition
                       hover:bg-orange-500"
            >
                Save About Page
            </button>

        </div>

    </form>



    {{-- =========================================================
        REPEATABLE ITEMS MANAGEMENT

        IMPORTANT:
        These forms are intentionally OUTSIDE the main section form.
        This prevents invalid nested HTML forms.
    ========================================================== --}}

    <div class="mt-12 space-y-8">

        @foreach($sections as $section)

            @if(in_array($section->section, [
                'mission_vision',
                'why_choose',
                'journey',
                'team',
                'industries',
                'trusted_brand'
            ]))

                <section
                    class="overflow-hidden
                           rounded-3xl
                           border border-slate-200
                           bg-white
                           shadow-sm"
                >

                    {{-- ITEM SECTION HEADER --}}
                    <div
                        class="border-b border-slate-100
                               bg-slate-900
                               px-5 py-5
                               text-white
                               md:px-6"
                    >

                        <div
                            class="flex flex-col gap-3
                                   sm:flex-row
                                   sm:items-center
                                   sm:justify-between"
                        >

                            <div>

                                <p
                                    class="text-[10px]
                                           font-bold uppercase
                                           tracking-[0.18em]
                                           text-orange-400"
                                >
                                    Repeatable Content
                                </p>

                                <h2 class="mt-2 text-xl font-black">

                                    {{
                                        $section->title
                                        ?: ucfirst(
                                            str_replace(
                                                '_',
                                                ' ',
                                                $section->section
                                            )
                                        )
                                    }}

                                    Items

                                </h2>

                            </div>


                            <span
                                class="w-fit rounded-full
                                       bg-white/10
                                       px-3 py-1
                                       text-xs font-bold
                                       text-slate-200"
                            >
                                {{ $section->items->count() }}
                                Items
                            </span>

                        </div>

                    </div>


                    <div class="p-5 md:p-6">

                        {{-- =========================================
                            EXISTING ITEMS
                        ========================================== --}}

                        @if($section->items->isNotEmpty())

                            <div class="space-y-5">

                                @foreach($section->items as $item)

                                    <div
                                        class="rounded-2xl
                                               border border-slate-200
                                               bg-slate-50/50
                                               p-4
                                               md:p-5"
                                    >

                                        <div
                                            class="mb-4
                                                   flex items-center
                                                   justify-between
                                                   gap-4"
                                        >

                                            <div>

                                                <p
                                                    class="text-xs
                                                           font-bold uppercase
                                                           tracking-wider
                                                           text-orange-500"
                                                >
                                                    Item #{{ $loop->iteration }}
                                                </p>

                                                <p
                                                    class="mt-1
                                                           font-black
                                                           text-slate-800"
                                                >
                                                    {{
                                                        $item->title
                                                        ?: 'Untitled Item'
                                                    }}
                                                </p>

                                            </div>


                                            <span
                                                class="rounded-full
                                                       px-3 py-1
                                                       text-[10px]
                                                       font-bold
                                                       {{
                                                           $item->is_active
                                                           ? 'bg-emerald-100 text-emerald-700'
                                                           : 'bg-slate-200 text-slate-500'
                                                       }}"
                                            >
                                                {{
                                                    $item->is_active
                                                    ? 'ACTIVE'
                                                    : 'INACTIVE'
                                                }}
                                            </span>

                                        </div>


                                        {{-- UPDATE ITEM --}}
                                        <form
                                            action="{{ route(
                                                'admin.about-page.items.update',
                                                $item
                                            ) }}"
                                            method="POST"
                                        >

                                            @csrf
                                            @method('PUT')


                                            <div
                                                class="grid gap-4
                                                       md:grid-cols-2"
                                            >

                                                {{-- TITLE --}}
                                                <div>

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Title
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="title"
                                                        value="{{ $item->title }}"
                                                        class="w-full rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >

                                                </div>


                                                {{-- SUBTITLE --}}
                                                <div>

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Subtitle
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="subtitle"
                                                        value="{{ $item->subtitle }}"
                                                        class="w-full rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >

                                                </div>


                                                {{-- VALUE --}}
                                                <div>

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Value
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="value"
                                                        value="{{ $item->value }}"
                                                        placeholder="Example: 2014"
                                                        class="w-full rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >

                                                </div>


                                                {{-- ICON --}}
                                                <div>

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Icon
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="icon"
                                                        value="{{ $item->icon }}"
                                                        placeholder="Example: 🎯"
                                                        class="w-full rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >

                                                </div>


                                                {{-- IMAGE --}}
                                                <div>

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Image Path
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="image"
                                                        value="{{ $item->image }}"
                                                        placeholder="images/about/example.jpg"
                                                        class="w-full rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >

                                                </div>


                                                {{-- LINK --}}
                                                <div>

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Link
                                                    </label>

                                                    <input
                                                        type="text"
                                                        name="link"
                                                        value="{{ $item->link }}"
                                                        placeholder="/products"
                                                        class="w-full rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >

                                                </div>


                                                {{-- DESCRIPTION --}}
                                                <div class="md:col-span-2">

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Description
                                                    </label>

                                                    <textarea
                                                        name="description"
                                                        rows="3"
                                                        class="w-full resize-y
                                                               rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm leading-6
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >{{ $item->description }}</textarea>

                                                </div>


                                                {{-- SORT ORDER --}}
                                                <div>

                                                    <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                                        Sort Order
                                                    </label>

                                                    <input
                                                        type="number"
                                                        name="sort_order"
                                                        min="0"
                                                        value="{{ $item->sort_order }}"
                                                        class="w-full rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4 py-3
                                                               text-sm
                                                               outline-none
                                                               focus:border-orange-400
                                                               focus:ring-2
                                                               focus:ring-orange-100"
                                                    >

                                                </div>


                                                {{-- ACTIVE --}}
                                                <div class="flex items-end">

                                                    <label
                                                        class="flex min-h-[46px]
                                                               w-full
                                                               cursor-pointer
                                                               items-center
                                                               gap-3
                                                               rounded-xl
                                                               border border-slate-200
                                                               bg-white
                                                               px-4"
                                                    >

                                                        <input
                                                            type="checkbox"
                                                            name="is_active"
                                                            value="1"
                                                            class="h-4 w-4 rounded
                                                                   border-slate-300
                                                                   text-orange-600
                                                                   focus:ring-orange-500"
                                                            @checked($item->is_active)
                                                        >

                                                        <span
                                                            class="text-sm
                                                                   font-bold
                                                                   text-slate-700"
                                                        >
                                                            Active Item
                                                        </span>

                                                    </label>

                                                </div>

                                            </div>


                                            <div class="mt-5">

                                                <button
                                                    type="submit"
                                                    class="inline-flex
                                                           min-h-[42px]
                                                           items-center
                                                           justify-center
                                                           rounded-xl
                                                           bg-slate-900
                                                           px-5
                                                           text-xs
                                                           font-bold
                                                           text-white
                                                           transition
                                                           hover:bg-slate-800"
                                                >
                                                    Update Item
                                                </button>

                                            </div>

                                        </form>


                                        {{-- DELETE ITEM --}}
                                        <form
                                            action="{{ route(
                                                'admin.about-page.items.destroy',
                                                $item
                                            ) }}"
                                            method="POST"
                                            class="mt-3"
                                            onsubmit="return confirm('Are you sure you want to delete this item?')"
                                        >

                                            @csrf
                                            @method('DELETE')

                                            <button
                                                type="submit"
                                                class="text-xs
                                                       font-bold
                                                       text-red-500
                                                       transition
                                                       hover:text-red-700"
                                            >
                                                Delete Item
                                            </button>

                                        </form>

                                    </div>

                                @endforeach

                            </div>

                        @else

                            <div
                                class="rounded-2xl
                                       border border-dashed
                                       border-slate-300
                                       bg-slate-50
                                       px-6 py-8
                                       text-center"
                            >

                                <p class="text-sm font-black text-slate-700">
                                    No items added yet
                                </p>

                                <p class="mt-2 text-xs text-slate-500">
                                    Use the form below to add the first item.
                                </p>

                            </div>

                        @endif


                        {{-- =========================================
                            ADD NEW ITEM
                        ========================================== --}}

                        <div
                            class="mt-6
                                   rounded-2xl
                                   border border-orange-100
                                   bg-orange-50/60
                                   p-4
                                   md:p-5"
                        >

                            <div>

                                <p
                                    class="text-[10px]
                                           font-bold uppercase
                                           tracking-[0.16em]
                                           text-orange-500"
                                >
                                    New Content
                                </p>

                                <h3
                                    class="mt-1
                                           text-base
                                           font-black
                                           text-slate-900"
                                >
                                    Add New Item
                                </h3>

                            </div>


                            <form
                                action="{{ route(
                                    'admin.about-page.items.store'
                                ) }}"
                                method="POST"
                                class="mt-5"
                            >

                                @csrf

                                <input
                                    type="hidden"
                                    name="about_page_setting_id"
                                    value="{{ $section->id }}"
                                >


                                <div
                                    class="grid gap-4
                                           md:grid-cols-2"
                                >

                                    <div>

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Title
                                        </label>

                                        <input
                                            type="text"
                                            name="title"
                                            placeholder="Item title"
                                            class="w-full rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        >

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Subtitle
                                        </label>

                                        <input
                                            type="text"
                                            name="subtitle"
                                            placeholder="Optional subtitle"
                                            class="w-full rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        >

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Value
                                        </label>

                                        <input
                                            type="text"
                                            name="value"
                                            placeholder="Example: 2014"
                                            class="w-full rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        >

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Icon
                                        </label>

                                        <input
                                            type="text"
                                            name="icon"
                                            placeholder="Example: 🎯"
                                            class="w-full rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        >

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Image Path
                                        </label>

                                        <input
                                            type="text"
                                            name="image"
                                            placeholder="images/about/example.jpg"
                                            class="w-full rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        >

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Link
                                        </label>

                                        <input
                                            type="text"
                                            name="link"
                                            placeholder="/products"
                                            class="w-full rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        >

                                    </div>


                                    <div class="md:col-span-2">

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Description
                                        </label>

                                        <textarea
                                            name="description"
                                            rows="3"
                                            placeholder="Item description"
                                            class="w-full resize-y
                                                   rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm leading-6
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        ></textarea>

                                    </div>


                                    <div>

                                        <label class="mb-2 block text-[11px] font-bold uppercase tracking-[0.12em] text-slate-500">
                                            Sort Order
                                        </label>

                                        <input
                                            type="number"
                                            name="sort_order"
                                            value="0"
                                            min="0"
                                            class="w-full rounded-xl
                                                   border border-slate-200
                                                   bg-white
                                                   px-4 py-3
                                                   text-sm
                                                   outline-none
                                                   focus:border-orange-400
                                                   focus:ring-2
                                                   focus:ring-orange-100"
                                        >

                                    </div>

                                </div>


                                <button
                                    type="submit"
                                    class="mt-5
                                           inline-flex
                                           min-h-[42px]
                                           items-center
                                           justify-center
                                           rounded-xl
                                           bg-orange-600
                                           px-5
                                           text-xs
                                           font-bold
                                           text-white
                                           transition
                                           hover:bg-orange-500"
                                >
                                    + Add Item
                                </button>

                            </form>

                        </div>

                    </div>

                </section>

            @endif

        @endforeach

    </div>

</div>

@endsection