<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Mail\ResetPasswordMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /**
     * Show the form to request a password reset link.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('auth.passwords.email');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
        $request->validate(['email' => 'required|email']);
        $user = Password::getUser($request->only('email'));
        $token = Password::getRepository()->create($user);

        Mail::to($request->email)->send(new ResetPasswordMail($token, $request->email));

        return back()->with('status', __('passwords.sent'));
    }
}

