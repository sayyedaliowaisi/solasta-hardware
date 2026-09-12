<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => ['required', 'string', 'max:100'],
            'email'    => ['nullable', 'email', 'max:150'],
            'phone'    => ['required', 'string', 'max:20'],
            'product'  => ['nullable', 'string', 'max:150'],
            'category' => ['nullable', 'string', 'max:150'],
            'message'  => ['nullable', 'string', 'max:2000'],
        ]);

        Enquiry::create($validated);

        return redirect()
            ->back()
            ->with('success', 'Your enquiry has been submitted successfully.');
    }
}