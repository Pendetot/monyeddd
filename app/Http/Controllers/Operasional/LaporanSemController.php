<?php

namespace App\Http\Controllers\Operasional;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanSemController extends Controller
{
    public function index()
    {
        return view('operasional.laporan-sem');
    }
}
