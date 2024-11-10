<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Services\StorageService;
use Illuminate\Support\Str;

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
    public function update(ProfileUpdateRequest $request, StorageService $storageService)
    {
        $user = $request->user();

        $user->fill($request->validated());

        if ($request->hasFile('profile_photo')) {
            // Create a custom name using user ID and current timestamp
            $customName = 'profile_' . $user->id . '_' . Str::slug($user->name) . '_' . time();

            // Use StorageService to update the profile photo with a custom name
            $path = $storageService->updateFile(
                $request->file('profile_photo'), // Uploaded file instance
                'profile-photos',                // Directory in storage
                $user->profile_photo,            // Existing path (if any) for deletion
                $customName                      // Custom file name
            );

            // Save the new path to the user's profile_photo field
            $user->profile_photo = $path;
        }

        // Handle other updates and save to the database
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $user->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}