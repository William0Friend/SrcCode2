<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

// class ConfirmablePasswordController extends Controller
// {
//     /**
//      * Show the confirm password view.
//      */
//     public function show(): View
//     {
//         return view('auth.confirm-password');
//     }

//     /**
//      * Confirm the user's password.
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         if (! Auth::guard('web')->validate([
//             'email' => $request->user()->email,
//             'password' => $request->password,
//         ])) {
//             throw ValidationException::withMessages([
//                 'password' => __('auth.password'),
//             ]);
//         }

//         $request->session()->put('auth.password_confirmed_at', time());

//         return redirect()->intended(RouteServiceProvider::HOME);
//     }
// }
class ConfirmablePasswordController extends Controller
{
    /**
     * Show the confirm password view.
     */
    public function show(): View
    {
        // Display the view for confirming the user's password
        return view('auth.confirm-password');
    }

    /**
     * Confirm the user's password.
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate the user's password by checking if it matches 
        // the email associated with the user
        if (! Auth::guard('web')->validate([
            'email' => $request->user()->email,
            'password' => $request->password,
        ])) {
            // If the password is invalid, throw a validation exception 
            // with an error message
            throw ValidationException::withMessages([
                'password' => __('auth.password'),
            ]);
        }

        // Store the current timestamp as the time when the password was confirmed
        $request->session()->put('auth.password_confirmed_at', time());

        // Redirect the user to the intended URL after successful password confirmation
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
