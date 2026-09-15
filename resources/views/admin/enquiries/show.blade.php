@extends('admin.layouts.app')

@section('title', 'Enquiry Details | Admin')

@section('content')

<div class="max-w-5xl">

    <a
        href="{{ route('admin.enquiries.index') }}"
        class="text-sm font-bold text-orange-600"
    >
        ← Back to Enquiries
    </a>


    <div class="mt-6 grid gap-8 lg:grid-cols-[1fr_0.7fr]">

        {{-- ENQUIRY --}}
        <div class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm">

            <p class="text-xs font-bold uppercase tracking-[3px] text-orange-600">
                Enquiry #{{ $enquiry->id }}
            </p>

            <h1 class="mt-3 text-3xl font-black text-slate-950">
                {{ $enquiry->name }}
            </h1>


            <div class="mt-8 space-y-6">

                @if($enquiry->product)

                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Product
                        </p>

                        <p class="mt-2 font-bold text-slate-900">
                            {{ $enquiry->product }}
                        </p>
                    </div>

                @endif


                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Phone
                    </p>

                    <a
                        href="tel:{{ $enquiry->phone }}"
                        class="mt-2 inline-block font-bold text-orange-600"
                    >
                        {{ $enquiry->phone }}
                    </a>
                </div>


                @if($enquiry->email)

                    <div>
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                            Email
                        </p>

                        <a
                            href="mailto:{{ $enquiry->email }}"
                            class="mt-2 inline-block break-all font-bold text-orange-600"
                        >
                            {{ $enquiry->email }}
                        </a>
                    </div>

                @endif


                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">
                        Message
                    </p>

                    <div class="mt-3 rounded-2xl bg-slate-50 p-5 leading-8 text-slate-700 whitespace-pre-line">{{ $enquiry->message }}</div>
                </div>


                <div class="text-sm text-slate-500">
                    Received:
                    {{ $enquiry->created_at->format(
                        'd M Y, h:i A'
                    ) }}
                </div>

            </div>

        </div>


        {{-- MANAGEMENT --}}
        <div>

            <form
                action="{{ route(
                    'admin.enquiries.update',
                    $enquiry
                ) }}"
                method="POST"
                class="rounded-3xl border border-slate-200 bg-white p-7 shadow-sm"
            >

                @csrf
                @method('PUT')


                <h2 class="text-xl font-black text-slate-950">
                    Manage Enquiry
                </h2>


                <div class="mt-6">

                    <label class="mb-2 block text-sm font-bold">
                        Status
                    </label>

                    <select
                        name="status"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                        @foreach([
                            'new' => 'New',
                            'read' => 'Read',
                            'contacted' => 'Contacted',
                            'closed' => 'Closed',
                        ] as $value => $label)

                            <option
                                value="{{ $value }}"
                                @selected(
                                    old(
                                        'status',
                                        $enquiry->status
                                    ) === $value
                                )
                            >
                                {{ $label }}
                            </option>

                        @endforeach

                    </select>

                </div>


                <div class="mt-5">

                    <label class="mb-2 block text-sm font-bold">
                        Admin Note
                    </label>

                    <textarea
                        name="admin_note"
                        rows="7"
                        placeholder="Private note..."
                        class="w-full resize-none rounded-xl border border-slate-300 px-4 py-3"
                    >{{ old(
                        'admin_note',
                        $enquiry->admin_note
                    ) }}</textarea>

                </div>


                <button
                    class="mt-6 w-full rounded-xl bg-orange-600 px-6 py-3 font-bold text-white hover:bg-orange-500"
                >
                    Save Changes
                </button>

            </form>


            <form
                action="{{ route(
                    'admin.enquiries.destroy',
                    $enquiry
                ) }}"
                method="POST"
                class="mt-5"
                onsubmit="return confirm('Delete this enquiry?')"
            >

                @csrf
                @method('DELETE')

                <button
                    class="w-full rounded-xl border border-red-200 bg-red-50 px-6 py-3 font-bold text-red-600 hover:bg-red-100"
                >
                    Delete Enquiry
                </button>

            </form>

        </div>

    </div>

</div>

@endsection