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
        return view('hrd.administrasipelamar.index', compact('pelamars'));
    }

    public function create()
    {
        return view('hrd.administrasipelamar.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelamars',
            'posisi_dilamar' => 'required|string|max:255',
            'tanggal_lamar' => 'required|date',
        ]);

        Pelamar::create($request->all());

        return redirect()->route('hrd.administrasi-pelamar')->with('success', 'Pelamar berhasil ditambahkan!');
    }

    public function edit(Pelamar $administrasi_pelamar)
    {
        return view('hrd.administrasipelamar.edit', compact('administrasi_pelamar'));
    }

    public function update(Request $request, Pelamar $administrasi_pelamar)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:pelamars,email,' . $administrasi_pelamar->id,
            'posisi_dilamar' => 'required|string|max:255',
            'tanggal_lamar' => 'required|date',
        ]);

        $administrasi_pelamar->update($request->all());

        return redirect()->route('hrd.administrasi-pelamar')->with('success', 'Pelamar berhasil diperbarui!');
    }

    public function destroy(Pelamar $administrasi_pelamar)
    {
        $administrasi_pelamar->delete();
        return redirect()->route('hrd.administrasi-pelamar')->with('success', 'Pelamar berhasil dihapus!');
    }
}
