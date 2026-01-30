<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function showLogin()
    {
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Hardcoded credentials - TEMPORARY USE ONLY
        if ($request->username === 'admin' && $request->password === 'admin') {
            // Create a session manually
            Session::put('authenticated', true);
            Session::put('username', 'admin');

            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors([
            'username' => 'Invalid credentials.',
        ])->withInput($request->only('username'));
    }

    public function logout(Request $request)
    {
        Session::flush();

        return redirect()->route('login');
    }

    public function dashboard()
    {
        if (! Session::get('authenticated')) {
            return redirect()->route('login');
        }

        return view('dashboard');
    }
}
