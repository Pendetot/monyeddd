<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\HutangKaryawan;
use Illuminate\Http\Request;

class HutangKaryawanController extends Controller
{
    public function index()
    {
        // Eager load the karyawan relationship to avoid N+1 queries
        $hutangKaryawans = HutangKaryawan::with('user')->latest()->get();

        return view('keuangan.hutang-karyawan', compact('hutangKaryawans'));
    }
}
