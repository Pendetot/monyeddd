<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KPIKaryawanController extends Controller
{
    public function index()
    {
        return view('operasional.kpi-karyawan');
    }
}
