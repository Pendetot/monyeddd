<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\RoleEnum;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->hasRole(RoleEnum::SuperAdmin)) {
            return redirect()->route('superadmin.dashboard');
        } elseif ($user->hasRole(RoleEnum::HRD)) {
            return redirect()->route('hrd.dashboard');
        } elseif ($user->hasRole(RoleEnum::Keuangan)) {
            return redirect()->route('keuangan.dashboard');
        } elseif ($user->hasRole(RoleEnum::Operasional)) {
            return redirect()->route('operasional.dashboard');
        } elseif ($user->hasRole(RoleEnum::Guard)) {
            return redirect()->route('guard.dashboard');
        } else {
            return view('home'); // Default dashboard for other roles or if no specific role is matched
        }
    }
}
