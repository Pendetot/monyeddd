<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Pelamar;

class PelamarDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pelamar = Pelamar::where('user_id', $user->id)->first();

        if (!$pelamar) {
            // Fallback to email just in case the user_id was not set correctly.
            $pelamar = Pelamar::where('email', $user->email)->first();
        }

        return view('pelamar.dashboard', ['pelamar' => $pelamar]);
    }
}
