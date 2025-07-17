<?php

namespace App\Http\Controllers;

use App\Models\Resign;
use App\Http\Requests\StoreResignRequest;
use App\Http\Requests\UpdateResignRequest;
use Illuminate\Http\Request;

class ResignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resigns = Resign::with('karyawan')->get();
        return view('hrd.resigns.index', compact('resigns'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.resigns.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResignRequest $request)
    {
        Resign::create($request->validated());

        return redirect()->route('resigns.index')->with('success', 'Pengajuan resign berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resign $resign)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resign $resign)
    {
        $karyawans = \App\Models\Karyawan::all();
        return view('hrd.resigns.edit', compact('resign', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateResignRequest $request, Resign $resign)
    {
        $resign->update($request->validated());

        return redirect()->route('resigns.index')->with('success', 'Pengajuan resign berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resign $resign)
    {
        $resign->delete();
        return redirect()->route('resigns.index')->with('success', 'Pengajuan resign berhasil dihapus.');
    }

    public function approve(Resign $resign)
    {
        $resign->update(['status' => \App\Enums\StatusResignEnum::Disetujui]);
        return redirect()->route('resigns.index')->with('success', 'Pengajuan resign berhasil disetujui.');
    }

    public function reject(Resign $resign)
    {
        $resign->update(['status' => \App\Enums\StatusResignEnum::Ditolak]);
        return redirect()->route('resigns.index')->with('success', 'Pengajuan resign berhasil ditolak.');
    }
}
