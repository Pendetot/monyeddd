<?php

namespace App\Http\Controllers;

use App\Models\Mutasi;
use App\Http\Requests\StoreMutasiRequest;
use App\Http\Requests\UpdateMutasiRequest;
use Illuminate\Http\Request;

class MutasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mutasis = Mutasi::with('karyawan')->get();
        return view('hrd.mutasis.index', compact('mutasis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.mutasis.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMutasiRequest $request)
    {
        Mutasi::create($request->validated());

        return redirect()->route('mutasis.index')->with('success', 'Mutasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mutasi $mutasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mutasi $mutasi)
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.mutasis.edit', compact('mutasi', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMutasiRequest $request, Mutasi $mutasi)
    {
        $mutasi->update($request->validated());

        return redirect()->route('mutasis.index')->with('success', 'Mutasi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mutasi $mutasi)
    {
        $mutasi->delete();
        return redirect()->route('mutasis.index')->with('success', 'Mutasi berhasil dihapus.');
    }
}
