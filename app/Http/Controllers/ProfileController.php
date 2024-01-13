<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
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
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthday' => 'nullable|date',
            'avatar' => 'nullable|image',
            'biography' => 'nullable',
        ]);
    
        if ($request->hasFile('avatar')) {
            $data['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->update($data);

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

    public function promote(Request $request): RedirectResponse
    {
        $user = User::where('email', $request->email)->first();

        if (!$user)
            return Redirect::route('dashboard')->with('status', 'User not found');
        if  ($user->is_admin == 1)
            return Redirect::route('dashboard')->with('status', 'User is already an admin');

        $user->is_admin = 1;
        $user->save();
        return Redirect::route('dashboard')->with('status', 'User promoted successfully');

    }

    public function show(User $user)
    {
        return view('profile.show', ['user' => $user]);
    }
}
