<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginForm()
    {
        return view('login');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function changePasswordForm()
    {
        return view('change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => [
                'required',
                function ($attribute, $value, $fail) {
                    if (! Hash::check($value, Auth::user()->password)) {
                        $fail('Incorrect password');
                    }
                }
            ],
            'new_password' => ['required', 'min:6'],
        ]);

        Auth::user()->password = Hash::make($request->new_password);

        Auth::user()->save();

        return back()->with([
            'message' => 'Password was changed successfully!'
        ]);

    }

    public function login(Request $request)
    {
         $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
 
    }
}
