<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RekeningKaryawan;

class RekeningKaryawanController extends Controller
{
    public function index()
    {
        $rekeningKaryawans = RekeningKaryawan::with('user')->get();
        return view('keuangan.rekening_karyawans.index', compact('rekeningKaryawans'));
    }

    public function create()
    {
        $users = \App\Models\User::all();
        return view('keuangan.rekening_karyawans.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'atas_nama' => 'required|string|max:255',
        ]);

        RekeningKaryawan::create($request->all());

        return redirect()->route('keuangan.rekening-karyawans.index')->with('success', 'Rekening karyawan berhasil ditambahkan.');
    }

    public function show(RekeningKaryawan $rekeningKaryawan)
    {
        return view('keuangan.rekening_karyawans.show', compact('rekeningKaryawan'));
    }

    public function edit(RekeningKaryawan $rekeningKaryawan)
    {
        $users = \App\Models\User::all();
        return view('keuangan.rekening_karyawans.edit', compact('rekeningKaryawan', 'users'));
    }

    public function update(Request $request, RekeningKaryawan $rekeningKaryawan)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'atas_nama' => 'required|string|max:255',
        ]);

        $rekeningKaryawan->update($request->all());

        return redirect()->route('keuangan.rekening-karyawans.index')->with('success', 'Rekening karyawan berhasil diperbarui.');
    }

    public function destroy(RekeningKaryawan $rekeningKaryawan)
    {
        $rekeningKaryawan->delete();
        return redirect()->route('keuangan.rekening-karyawans.index')->with('success', 'Rekening karyawan berhasil dihapus.');
    }
}