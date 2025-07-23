<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\HRD\Cuti\StoreCutiRequest;
use App\Http\Requests\HRD\Cuti\UpdateCutiRequest;
use App\Models\Cuti;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuti = Cuti::all();
        return view('hrd.cutis.index', compact('cuti'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hrd.cutis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCutiRequest $request)
    {
        Cuti::create($request->validated());
        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Cuti berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        return view('hrd.cutis.show', compact('cuti'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cuti $cuti)
    {
        return view('hrd.cutis.edit', compact('cuti'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCutiRequest $request, Cuti $cuti)
    {
        $cuti->update($request->validated());
        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Cuti berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Cuti berhasil dihapus!');
    }

    public function approve(Cuti $cuti)
    {
        $cuti->update(['status' => 'disetujui']);
        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Cuti berhasil disetujui!');
    }

    public function reject(Cuti $cuti)
    {
        $cuti->update(['status' => 'ditolak']);
        return redirect()->route('hrd.pengajuan-cuti')->with('success', 'Cuti berhasil ditolak!');
    }
}
