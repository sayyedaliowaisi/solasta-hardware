<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Show Login Page
    |--------------------------------------------------------------------------
    */

    public function showLogin()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()
                ->route('admin.dashboard');
        }

        return view('admin.auth.login');
    }


    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
            ],

            'password' => [
                'required',
                'string',
            ],
        ]);


        /*
        |--------------------------------------------------------------------------
        | Rate Limit Key
        |--------------------------------------------------------------------------
        |
        | Email + IP combination use kar rahe hain.
        |
        */

        $throttleKey = $this->throttleKey(
            $request
        );


        /*
        |--------------------------------------------------------------------------
        | Too Many Login Attempts
        |--------------------------------------------------------------------------
        */

        if (
            RateLimiter::tooManyAttempts(
                $throttleKey,
                5
            )
        ) {
            $seconds = RateLimiter::availableIn(
                $throttleKey
            );

            throw ValidationException::withMessages([
                'email' =>
                    "Too many login attempts. Please try again in {$seconds} seconds.",
            ]);
        }


        /*
        |--------------------------------------------------------------------------
        | Remember Me
        |--------------------------------------------------------------------------
        */

        $remember = $request->boolean(
            'remember'
        );


        /*
        |--------------------------------------------------------------------------
        | Attempt Login
        |--------------------------------------------------------------------------
        */

        if (
            Auth::guard('admin')->attempt(
                $credentials,
                $remember
            )
        ) {

            /*
            | Clear failed login counter
            */

            RateLimiter::clear(
                $throttleKey
            );


            /*
            | Prevent session fixation
            */

            $request->session()
                ->regenerate();


            return redirect()
                ->intended(
                    route('admin.dashboard')
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Failed Login
        |--------------------------------------------------------------------------
        |
        | 5 failed attempts ke baad temporary throttle apply hoga.
        |
        */

        RateLimiter::hit(
            $throttleKey,
            60
        );


        return back()
            ->withErrors([
                'email' =>
                    'Invalid admin email or password.',
            ])
            ->onlyInput('email');
    }


    /*
    |--------------------------------------------------------------------------
    | Logout
    |--------------------------------------------------------------------------
    */

    public function logout(Request $request)
    {
        Auth::guard('admin')
            ->logout();


        /*
        | Destroy current authenticated session
        */

        $request->session()
            ->invalidate();


        /*
        | Generate new CSRF token
        */

        $request->session()
            ->regenerateToken();


        return redirect()
            ->route('admin.login');
    }


    /*
    |--------------------------------------------------------------------------
    | Login Throttle Key
    |--------------------------------------------------------------------------
    */

    private function throttleKey(
        Request $request
    ): string {

        return Str::transliterate(
            Str::lower(
                (string) $request->input('email')
            )
            . '|'
            . $request->ip()
        );
    }
}