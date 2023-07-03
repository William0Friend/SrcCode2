<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

// class EmailVerificationNotificationController extends Controller
// {
//     /**
//      * Send a new email verification notification.
//      */
//     public function store(Request $request): RedirectResponse
//     {
//         if ($request->user()->hasVerifiedEmail()) {
//             return redirect()->intended(RouteServiceProvider::HOME);
//         }

//         $request->user()->sendEmailVerificationNotification();

//         return back()->with('status', 'verification-link-sent');
//     }
// }
class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        // Check if the user's email has already been verified
        if ($request->user()->hasVerifiedEmail()) {
            // If the email is already verified, redirect the user to the intended URL
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        // Send a new email verification notification to the user
        $request->user()->sendEmailVerificationNotification();

        // Redirect the user back to the previous page with a status message indicating that the verification link has been sent
        return back()->with('status', 'verification-link-sent');
    }
}
