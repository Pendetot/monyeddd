<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RekeningKaryawan;
use Illuminate\Http\Request;

class RekeningKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rekeningKaryawans = RekeningKaryawan::all();
        return view('keuangan.rekening_karyawans.index', compact('rekeningKaryawans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = \App\Models\User::all();
        return view('keuangan.rekening_karyawans.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
        ]);

        RekeningKaryawan::create($request->all());

        return redirect()->route('keuangan.rekening-karyawans.index')->with('success', 'Rekening karyawan berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(RekeningKaryawan $rekeningKaryawan)
    {
        return view('keuangan.rekening_karyawans.show', compact('rekeningKaryawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(RekeningKaryawan $rekeningKaryawan)
    {
        $users = \App\Models\User::all();
        return view('keuangan.rekening_karyawans.edit', compact('rekeningKaryawan', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, RekeningKaryawan $rekeningKaryawan)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'nama_bank' => 'required|string|max:255',
            'nomor_rekening' => 'required|string|max:255',
            'nama_pemilik' => 'required|string|max:255',
        ]);

        $rekeningKaryawan->update($request->all());

        return redirect()->route('keuangan.rekening-karyawans.index')->with('success', 'Rekening karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(RekeningKaryawan $rekeningKaryawan)
    {
        $rekeningKaryawan->delete();
        return redirect()->route('keuangan.rekening-karyawans.index')->with('success', 'Rekening karyawan berhasil dihapus.');
    }
