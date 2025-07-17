<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManajemenAbsensiController extends Controller
{
    public function index()
    {
        return view('operasional.manajemen-absensi');
    }
}
