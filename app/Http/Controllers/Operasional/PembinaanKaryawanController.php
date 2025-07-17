<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PembinaanKaryawanController extends Controller
{
    public function index()
    {
        return view('operasional.pembinaan-karyawan');
    }
}
