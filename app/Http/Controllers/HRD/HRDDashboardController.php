<?php

namespace App\Http\Controllers\HRD;

use Illuminate\Http\Request;

class HRDDashboardController extends Controller
{
    public function index()
    {
        $totalPelamar = \App\Models\Pelamar::count();
        $totalCuti = \App\Models\Cuti::count();

        return view('hrd.dashboard', compact('totalPelamar', 'totalCuti'));
    }
}
