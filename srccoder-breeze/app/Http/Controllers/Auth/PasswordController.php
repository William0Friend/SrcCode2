<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

// class PasswordController extends Controller
// {
//     /**
//      * Update the user's password.
//      */
//     public function update(Request $request): RedirectResponse
//     {
//         $validated = $request->validateWithBag('updatePassword', [
//             'current_password' => ['required', 'current_password'],
//             'password' => ['required', Password::defaults(), 'confirmed'],
//         ]);

//         $request->user()->update([
//             'password' => Hash::make($validated['password']),
//         ]);

//         return back()->with('status', 'password-updated');
//     }
// }
class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        // Validate the incoming request data, including the current password and the new password
        $validated = $request->validateWithBag('updatePassword', [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        // Update the user's password in the database with the new hashed password
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect back to the previous page with a success message indicating that the password has been updated
        return back()->with('status', 'password-updated');
    }
}