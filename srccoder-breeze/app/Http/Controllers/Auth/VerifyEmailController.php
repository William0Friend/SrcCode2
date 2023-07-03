<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;

// class VerifyEmailController extends Controller
// {
//     /**
//      * Mark the authenticated user's email address as verified.
//      */
//     public function __invoke(EmailVerificationRequest $request): RedirectResponse
//     {
//         if ($request->user()->hasVerifiedEmail()) {
//             return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
//         }

//         if ($request->user()->markEmailAsVerified()) {
//             event(new Verified($request->user()));
//         }

//         return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
//     }
// }
class VerifyEmailController extends Controller
{
    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        // Check if the user's email has already been verified
        if ($request->user()->hasVerifiedEmail()) {
            // If the email is already verified, redirect the user to the intended URL with a verification flag
            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        }

        // Mark the user's email as verified and fire the Verified event
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        // Redirect the user to the intended URL with a verification flag
        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
    }
}
