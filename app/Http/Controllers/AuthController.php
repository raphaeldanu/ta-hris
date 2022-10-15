<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('dashboard');
        }
 
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function userSetting()
    {
        return view('user-setting', [
            'title' => 'User Setting',
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required|current_password',
            'password' => 'required|confirmed|min:8',
        ]);

        $data = [
            'password' => Hash::make($request->password),
        ];

        $user = $request->user();
        $user->update($data);
        $user->refresh();

        return redirect('/dashboard')->with('success', 'Password changed successfully!');
    }
}
