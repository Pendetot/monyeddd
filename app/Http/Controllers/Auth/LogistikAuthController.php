<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogistikAuthController extends Controller
{
    public function showLoginForm()
    {
        $role = 'logistik';
        return view('auth.login', compact('role'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'logistik'])) {
            return redirect()->route('logistik.dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('logistik.showLoginForm');
    }
}