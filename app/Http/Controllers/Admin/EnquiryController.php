<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function index(Request $request)
    {
        $query = Enquiry::query()
            ->latest();

        if ($request->filled('status')) {
            $query->where(
                'status',
                $request->status
            );
        }

        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($query) use ($search) {

                $query
                    ->where('name', 'like', "%{$search}%")
                    ->orWhere(
                        'phone',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'email',
                        'like',
                        "%{$search}%"
                    )
                    ->orWhere(
                        'product',
                        'like',
                        "%{$search}%"
                    );

            });
        }

        $enquiries = $query->paginate(25)
            ->withQueryString();

        return view(
            'admin.enquiries.index',
            compact('enquiries')
        );
    }


    public function show(Enquiry $enquiry)
    {
        if ($enquiry->status === 'new') {
            $enquiry->update([
                'status' => 'read',
            ]);
        }

        return view(
            'admin.enquiries.show',
            compact('enquiry')
        );
    }


    public function update(
        Request $request,
        Enquiry $enquiry
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:new,read,contacted,closed',
            ],

            'admin_note' => [
                'nullable',
                'string',
                'max:5000',
            ],
        ]);

        $enquiry->update($validated);

        return back()->with(
            'success',
            'Enquiry updated successfully.'
        );
    }


    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();

        return redirect()
            ->route('admin.enquiries.index')
            ->with(
                'success',
                'Enquiry deleted successfully.'
            );
    }
}