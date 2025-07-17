<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HRDDashboardController extends Controller
{
    public function index()
    {
        $totalKaryawan = \App\Models\Karyawan::count();
        $totalPelamar = \App\Models\Pelamar::count();
        $totalCuti = \App\Models\Cuti::count();

        return view('hrd.dashboard', compact('totalKaryawan', 'totalPelamar', 'totalCuti'));
    }
}
