<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateProfileRequest;
use App\Models\User;


class ProfileController extends Controller
{
    /**
     * Show the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        if (!Auth::check()) {
            return redirect()->route('auth.login')->withErrors(['message' => 'Vous devez être connecté pour accéder à votre profil.']);
        }
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    /**
     * Show the form to edit the user's profile.
     *
     * @return \Illuminate\View\View
     */
    public function update(UpdateProfileRequest $request)
    {
        $user = User::find(Auth::id());
        $user->update($request->only('name', 'email'));

        // if the password fields are filled
        if ($request->filled('current_password') && $request->filled('new_password')) {
            // check if the current password is correct
            if (!Hash::check($request->input('current_password'), $user->password)) {
                return back()->withErrors([
                    'current_password' => 'L\'ancien mot de passe est incorrect.',
                ])->onlyInput('current_password');
            }

            $user->update([
                'password' => Hash::make($request->input('new_password')),
            ]);
        }

        return redirect()->route('profile.show')->with('status', 'Profil mis à jour avec succès.');
    }
}
