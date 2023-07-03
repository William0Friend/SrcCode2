<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

// class EmailVerificationPromptController extends Controller
// {
//     /**
//      * Display the email verification prompt.
//      */
//     public function __invoke(Request $request): RedirectResponse|View
//     {
//         return $request->user()->hasVerifiedEmail()
//                     ? redirect()->intended(RouteServiceProvider::HOME)
//                     : view('auth.verify-email');
//     }
// }
class EmailVerificationPromptController extends Controller
{
    /**
     * Display the email verification prompt.
     */
    public function __invoke(Request $request): RedirectResponse|View
    {
        // Check if the user's email has already been verified
        if ($request->user()->hasVerifiedEmail()) {
            // If the email is already verified, redirect the user to the intended URL
            return redirect()->intended(RouteServiceProvider::HOME);
        } else {
            // If the email is not verified, display the view for email verification
            return view('auth.verify-email');
        }
    }
}
