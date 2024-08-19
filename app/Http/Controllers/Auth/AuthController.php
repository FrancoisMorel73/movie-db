<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    /**
     * Show the login form.
     *
     * @return \Illuminate\View\View
     */
    public function login()
    {
        return view('auth.login');
    }

    /**
     * Logout the user.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout() {
        Auth::logout();
        return to_route('auth.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param \App\Http\Requests\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function dologin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();

            $favoriteIds = json_decode(Cookie::get('favorites', '[]'), true);
            if (!empty($favoriteIds)) {
                Cookie::queue('favorites', json_encode($favoriteIds), 60 * 24 * 365);
            }

            return redirect()->intended(route('home'));
        }

        return to_route('auth.login')->withErrors([
            'email' => 'Les éléments d\'identifications sont incorrects',
        ])->onlyInput('email');
    }
}
