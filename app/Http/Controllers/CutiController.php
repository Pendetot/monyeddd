<?php

namespace App\Http\Controllers;

use App\Models\Cuti;
use App\Http\Requests\StoreCutiRequest;
use App\Http\Requests\UpdateCutiRequest;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cutis = Cuti::with('karyawan')->get();
        return view('hrd.cutis.index', compact('cutis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.cutis.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCutiRequest $request)
    {
        Cuti::create($request->validated());

        return redirect()->route('cutis.index')->with('success', 'Pengajuan cuti berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.cutis.edit', compact('cuti', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCutiRequest $request, Cuti $cuti)
    {
        $cuti->update($request->validated());

        return redirect()->route('cutis.index')->with('success', 'Pengajuan cuti berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('cutis.index')->with('success', 'Pengajuan cuti berhasil dihapus.');
    }

    public function approve(Cuti $cuti)
    {
        $cuti->update(['status' => \App\Enums\StatusCutiEnum::Disetujui]);
        return redirect()->route('cutis.index')->with('success', 'Pengajuan cuti berhasil disetujui.');
    }

    public function reject(Cuti $cuti)
    {
        $cuti->update(['status' => \App\Enums\StatusCutiEnum::Ditolak]);
        return redirect()->route('cutis.index')->with('success', 'Pengajuan cuti berhasil ditolak.');
    }
}
