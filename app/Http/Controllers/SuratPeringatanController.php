<?php

namespace App\Http\Controllers;

use App\Models\SuratPeringatan;
use App\Http\Requests\StoreSuratPeringatanRequest;
use App\Http\Requests\UpdateSuratPeringatanRequest;
use Illuminate\Http\Request;

class SuratPeringatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratPeringatans = SuratPeringatan::with('karyawan')->get();
        return view('hrd.surat_peringatans.index', compact('suratPeringatans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.surat_peringatans.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSuratPeringatanRequest $request)
    {
        SuratPeringatan::create($request->validated());

        return redirect()->route('surat-peringatans.index')->with('success', 'Surat Peringatan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratPeringatan $suratPeringatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuratPeringatan $suratPeringatan)
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.surat_peringatans.edit', compact('suratPeringatan', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuratPeringatanRequest $request, SuratPeringatan $suratPeringatan)
    {
        $suratPeringatan->update($request->validated());

        return redirect()->route('surat-peringatans.index')->with('success', 'Surat Peringatan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuratPeringatan $suratPeringatan)
    {
        $suratPeringatan->delete();
        return redirect()->route('surat-peringatans.index')->with('success', 'Surat Peringatan berhasil dihapus.');
    }
}
