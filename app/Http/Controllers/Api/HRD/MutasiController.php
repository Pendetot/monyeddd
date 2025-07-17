<?php

namespace App\Http\Controllers\Api\HRD;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMutasis = \App\Models\Mutasi::all();

        $mutasiKeuangan = $allMutasis->filter(function ($mutasi) {
            return $mutasi->departemen_lama === 'Keuangan' || $mutasi->departemen_baru === 'Keuangan';
        });

        $mutasiOperasional = $allMutasis->filter(function ($mutasi) {
            return $mutasi->departemen_lama === 'Operasional' || $mutasi->departemen_baru === 'Operasional';
        });

        return view('hrd.mutasi.index', compact('mutasiKeuangan', 'mutasiOperasional'));
    }

    public function edit(\App\Models\Mutasi $mutasi)
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

        \App\Models\Mutasi::create($request->all());

        return redirect()->route('superadmin.hrd.mutasi-karyawan')->with('success', 'Mutasi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function update(Request $request, \App\Models\Mutasi $mutasi)
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

        return redirect()->route('superadmin.hrd.mutasi-karyawan')->with('success', 'Mutasi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
