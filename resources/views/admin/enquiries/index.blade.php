@extends('admin.layouts.app')

@section('title', 'Enquiries | Admin')

@section('content')

<div class="max-w-7xl">

    <div class="flex flex-col gap-5 lg:flex-row lg:items-end lg:justify-between">

        <div>
            <p class="text-xs font-bold uppercase tracking-[0.18em] text-orange-600">
                Customer Leads
            </p>

            <h1 class="mt-2 text-3xl font-black text-slate-950">
                Enquiries
            </h1>

            <p class="mt-2 text-slate-500">
                Manage customer and product enquiries.
            </p>
        </div>

        <form
            method="GET"
            action="{{ route('admin.enquiries.index') }}"
            class="flex flex-col sm:flex-row gap-3"
        >

            <input
                type="search"
                name="search"
                value="{{ request('search') }}"
                placeholder="Search customer or product..."
                class="min-w-[260px] rounded-xl border border-slate-300 px-4 py-3"
            >

            <select
                name="status"
                class="rounded-xl border border-slate-300 px-4 py-3"
            >
                <option value="">
                    All Statuses
                </option>

                @foreach([
                    'new' => 'New',
                    'read' => 'Read',
                    'contacted' => 'Contacted',
                    'closed' => 'Closed',
                ] as $value => $label)

                    <option
                        value="{{ $value }}"
                        @selected(request('status') === $value)
                    >
                        {{ $label }}
                    </option>

                @endforeach
            </select>

            <button
                class="rounded-xl bg-slate-950 px-5 py-3 font-bold text-white"
            >
                Filter
            </button>

        </form>

    </div>


    @if(session('success'))

        <div class="mt-6 rounded-xl border border-green-200 bg-green-50 px-5 py-4 text-green-700">
            {{ session('success') }}
        </div>

    @endif


    <div class="mt-8 overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="w-full text-left">

                <thead class="bg-slate-50 text-xs uppercase tracking-wider text-slate-500">

                    <tr>
                        <th class="px-6 py-4">
                            Customer
                        </th>

                        <th class="px-6 py-4">
                            Product
                        </th>

                        <th class="px-6 py-4">
                            Contact
                        </th>

                        <th class="px-6 py-4">
                            Status
                        </th>

                        <th class="px-6 py-4">
                            Date
                        </th>

                        <th class="px-6 py-4 text-right">
                            Action
                        </th>
                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($enquiries as $enquiry)

                        <tr class="hover:bg-slate-50/70">

                            <td class="px-6 py-5">

                                <p class="font-bold text-slate-950">
                                    {{ $enquiry->name }}
                                </p>

                                @if($enquiry->email)
                                    <p class="mt-1 text-xs text-slate-500">
                                        {{ $enquiry->email }}
                                    </p>
                                @endif

                            </td>


                            <td class="px-6 py-5">

                                @if($enquiry->product)

                                    <span class="inline-flex rounded-full bg-orange-50 px-3 py-1 text-xs font-bold text-orange-700">
                                        {{ $enquiry->product }}
                                    </span>

                                @else

                                    <span class="text-sm text-slate-400">
                                        General enquiry
                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-5">

                                <a
                                    href="tel:{{ $enquiry->phone }}"
                                    class="font-semibold text-slate-700 hover:text-orange-600"
                                >
                                    {{ $enquiry->phone }}
                                </a>

                            </td>


                            <td class="px-6 py-5">

                                @php
                                    $statusClasses = [
                                        'new' =>
                                            'bg-orange-100 text-orange-700',

                                        'read' =>
                                            'bg-blue-100 text-blue-700',

                                        'contacted' =>
                                            'bg-purple-100 text-purple-700',

                                        'closed' =>
                                            'bg-green-100 text-green-700',
                                    ];
                                @endphp

                                <span
                                    class="inline-flex rounded-full px-3 py-1 text-xs font-bold capitalize {{ $statusClasses[$enquiry->status] ?? 'bg-slate-100 text-slate-700' }}"
                                >
                                    {{ $enquiry->status }}
                                </span>

                            </td>


                            <td class="px-6 py-5 text-sm text-slate-500">
                                {{ $enquiry->created_at->format('d M Y') }}

                                <div class="mt-1 text-xs">
                                    {{ $enquiry->created_at->format('h:i A') }}
                                </div>
                            </td>


                            <td class="px-6 py-5 text-right">

                                <a
                                    href="{{ route(
                                        'admin.enquiries.show',
                                        $enquiry
                                    ) }}"
                                    class="inline-flex rounded-lg bg-slate-950 px-4 py-2 text-xs font-bold text-white hover:bg-orange-600"
                                >
                                    View
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td
                                colspan="6"
                                class="px-6 py-16 text-center text-slate-500"
                            >
                                No enquiries found.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($enquiries->hasPages())

            <div class="border-t border-slate-200 px-6 py-5">
                {{ $enquiries->links() }}
            </div>

        @endif

    </div>

</div>

@endsection