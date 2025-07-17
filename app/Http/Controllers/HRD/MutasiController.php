<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\Mutasi;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    public function index()
    {
        $allMutasis = Mutasi::all();

        $mutasiKeuangan = $allMutasis->filter(function ($mutasi) {
            return $mutasi->departemen_lama === 'Keuangan' || $mutasi->departemen_baru === 'Keuangan';
        });

        $mutasiOperasional = $allMutasis->filter(function ($mutasi) {
            return $mutasi->departemen_lama === 'Operasional' || $mutasi->departemen_baru === 'Operasional';
        });

        return view('hrd.mutasi.index', compact('mutasiKeuangan', 'mutasiOperasional'));
    }

    public function edit(Mutasi $mutasi)
    {
        return view('hrd.mutasi.edit', compact('mutasi'));
    }

    public function create()
    {
        return view('hrd.mutasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal_mutasi' => 'required|date',
            'departemen_lama' => 'required|string|max:255',
            'departemen_baru' => 'required|string|max:255',
            'jabatan_lama' => 'required|string|max:255',
            'jabatan_baru' => 'required|string|max:255',
        ]);

        Mutasi::create($request->all());

        return redirect()->route('hrd.mutasi-karyawan')->with('success', 'Mutasi berhasil ditambahkan!');
    }

    public function update(Request $request, Mutasi $mutasi)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'tanggal_mutasi' => 'required|date',
            'departemen_lama' => 'required|string|max:255',
            'departemen_baru' => 'required|string|max:255',
            'jabatan_lama' => 'required|string|max:255',
            'jabatan_baru' => 'required|string|max:255',
        ]);

        $mutasi->update($request->all());

        return redirect()->route('hrd.mutasi-karyawan')->with('success', 'Mutasi berhasil diperbarui!');
    }

    public function destroy(Mutasi $mutasi)
    {
        $mutasi->delete();
        return redirect()->route('hrd.mutasi-karyawan')->with('success', 'Mutasi berhasil dihapus!');
    }
}