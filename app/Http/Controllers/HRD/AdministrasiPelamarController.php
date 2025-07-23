<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class AdministrasiPelamarController extends Controller
{
    public function index()
    {
        $pelamars = Pelamar::all();
        return view('hrd.administrasi_pelamar.index', compact('pelamars'));
    }

    public function show(Pelamar $pelamar)
    {
        return view('hrd.administrasi_pelamar.show', compact('pelamar'));
    }

    public function approve(Pelamar $pelamar)
    {
        $pelamar->status = 'diterima';
        $pelamar->save();
        return redirect()->back()->with('success', 'Pelamar berhasil diterima.');
    }

    public function reject(Pelamar $pelamar)
    {
        $pelamar->status = 'ditolak';
        $pelamar->save();
        return redirect()->back()->with('success', 'Pelamar berhasil ditolak.');
    }

    public function destroy(Pelamar $pelamar)
    {
        $pelamar->delete();
        return redirect()->back()->with('success', 'Pelamar berhasil dihapus.');
    }
}