<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Fill the user with validated data from the request
        $request->user()->fill($request->validated());

        // If the email has changed, set email_verified_at to null
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Save the updated user information
        $request->user()->save();

        // Redirect back to the profile edit page with a success message
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validate the request to ensure the current password is provided
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        // Get the authenticated user
        $user = $request->user();

        // Logout the user
        Auth::logout();

        // Delete the user account
        $user->delete();

        // Invalidate the session and regenerate the CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect to the home page
        return Redirect::to('/');
    }
}