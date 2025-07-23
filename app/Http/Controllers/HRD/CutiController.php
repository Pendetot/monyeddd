<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    public function index()
    {
        $cuti = Cuti::all();
        return view('hrd.cuti.index', compact('cuti'));
    }

    public function create()
    {
        return view('hrd.cuti.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'status' => 'required|string',
        ]);

        Cuti::create($request->all());

        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Pengajuan cuti berhasil ditambahkan!');
    }

    public function edit(Cuti $cuti)
    {
        return view('hrd.cuti.edit', compact('cuti'));
    }

    public function update(Request $request, Cuti $cuti)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
            'status' => 'required|string',
        ]);

        $cuti->update($request->all());

        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Pengajuan cuti berhasil diperbarui!');
    }

    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Pengajuan cuti berhasil dihapus!');
    }
}
