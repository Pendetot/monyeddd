<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use App\Models\Karyawan;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalKaryawan = Karyawan::count();
        $totalPelamar = Pelamar::count();
        $totalCuti = Cuti::count();

        return view('hrd.dashboard', compact('totalKaryawan', 'totalPelamar', 'totalCuti'));
    }
}
