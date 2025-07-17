<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
        $karyawans = Karyawan::all();
        return view('hrd.karyawan.index', compact('karyawans'));
    }

    public function create()
    {
        return view('hrd.karyawan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:karyawans',
            'jabatan' => 'required|string|max:255',
            'tanggal_bergabung' => 'required|date',
        ]);

        Karyawan::create($request->all());

        return redirect()->route('hrd.data-karyawan')->with('success', 'Karyawan berhasil ditambahkan!');
    }

    public function edit(Karyawan $karyawan)
    {
        return view('hrd.karyawan.edit', compact('karyawan'));
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:karyawans,email,' . $karyawan->id,
            'jabatan' => 'required|string|max:255',
            'tanggal_bergabung' => 'required|date',
        ]);

        $karyawan->update($request->all());

        return redirect()->route('hrd.data-karyawan')->with('success', 'Karyawan berhasil diperbarui!');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();
        return redirect()->route('hrd.data-karyawan')->with('success', 'Karyawan berhasil dihapus!');
    }
}
