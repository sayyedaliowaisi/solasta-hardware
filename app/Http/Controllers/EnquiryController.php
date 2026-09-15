<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class EnquiryController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Store Enquiry
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        /*
        |--------------------------------------------------------------------------
        | Spam / Rate Limit Protection
        |--------------------------------------------------------------------------
        |
        | Per IP maximum 5 enquiry submissions per 10 minutes.
        |
        */

        $throttleKey = 'enquiry:' . $request->ip();

        if (
            RateLimiter::tooManyAttempts(
                $throttleKey,
                5
            )
        ) {
            $seconds = RateLimiter::availableIn(
                $throttleKey
            );

            $minutes = max(
                1,
                (int) ceil($seconds / 60)
            );

            throw ValidationException::withMessages([
                'message' =>
                    "Too many enquiries have been submitted. Please try again in about {$minutes} minute(s).",
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Validation
        |--------------------------------------------------------------------------
        */

        $validated = $request->validate([
            'product' => [
                'nullable',
                'string',
                'max:255',
            ],

            'name' => [
                'required',
                'string',
                'max:255',
            ],

            'phone' => [
                'required',
                'string',
                'max:30',
            ],

            'email' => [
                'nullable',
                'email',
                'max:255',
            ],

            'message' => [
                'required',
                'string',
                'max:5000',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Normalize User Input
        |--------------------------------------------------------------------------
        */

        $product = isset($validated['product'])
            ? trim($validated['product'])
            : null;

        $name = trim(
            $validated['name']
        );

        $phone = trim(
            $validated['phone']
        );

        $email = !empty($validated['email'])
            ? strtolower(trim($validated['email']))
            : null;

        $message = trim(
            $validated['message']
        );


        /*
        |--------------------------------------------------------------------------
        | Store Enquiry
        |--------------------------------------------------------------------------
        */

        Enquiry::create([
            'product' => $product ?: null,

            'name' => $name,

            'phone' => $phone,

            'email' => $email,

            'message' => $message,

            'status' => 'new',
        ]);


        /*
        |--------------------------------------------------------------------------
        | Count Successful Submission
        |--------------------------------------------------------------------------
        |
        | Sirf successfully validated/saved enquiry ko count karenge.
        | 600 seconds = 10 minutes.
        |
        */

        RateLimiter::hit(
            $throttleKey,
            600
        );


        /*
        |--------------------------------------------------------------------------
        | Success Response
        |--------------------------------------------------------------------------
        */

        return back()->with(
            'success',
            'Thank you. Your enquiry has been submitted successfully.'
        );
    }
}