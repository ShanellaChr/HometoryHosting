<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    public function showRequestForm()
    {
        return view('resetPassword.requestResetPage');
    }

    public function sendResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::where('email', $request->email)->first();
        $code = mt_rand(100000, 999999);

        $user->reset_code = $code;
        $user->reset_code_expires_at = now()->addMinutes(2); 
        $user->save();

        Mail::raw("Your password reset code is: $code\n\nTrack Smarter, Waste No More! ~Hometory", function ($message) use ($user) {
            $message->to($user->email)->subject('Hometory Password Reset Code');
        });

        session(['email' => $user->email]);
        return redirect()->route('password.verify');
    }

    public function showVerifyForm()
    {
        $email = session('email');
        if (!$email) {
            return redirect()->route('password.request')->withErrors(['email' => 'Please enter your email first.']);
        }

        return view('resetPassword.verifyResetPage', compact('email'));
    }

    public function verifyResetCode(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'reset_code' => 'required|digits:6',
        ]);

        $user = User::where('email', $request->email)->first();

        if (
            $user &&
            $user->reset_code == $request->reset_code &&
            $user->reset_code_expires_at &&
            now()->lessThanOrEqualTo($user->reset_code_expires_at)
        ) {
            session(['verified_email' => $user->email]);
            return redirect()->route('password.new');
        }

        return redirect()
            ->route('password.verify')
            ->withErrors(['reset_code' => 'Invalid or expired reset code.'])
            ->withInput(['email' => $request->email]);
    }

    public function showNewPasswordForm()
    {
        $email = session('verified_email');
        if (!$email) {
            return redirect()->route('password.request')->withErrors(['email' => 'Verification required.']);
        }

        return view('resetPassword.addNewPasswordPage', compact('email'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        $user->password = Hash::make($request->password);
        $user->reset_code = null;
        $user->reset_code_expires_at = null;
        $user->save();

        session()->forget(['email', 'verified_email']);

        return redirect('/login')->with('success', 'Password has been reset. Please log in.');
    }
}
