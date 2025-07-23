<?php

namespace App\Http\Controllers\HRD;

use App\Http\Controllers\Controller;
use App\Models\Resign;
use Illuminate\Http\Request;

class ResignController extends Controller
{
    public function index()
    {
        $resigns = Resign::with('user')->get();
        return view('hrd.resign.index', compact('resigns'));
    }

    public function create()
    {
        return view('hrd.resign.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_efektif' => 'required|date|after_or_equal:tanggal_pengajuan',
            'alasan' => 'required|string',
        ]);

        Resign::create($request->all());

        return redirect()->route('hrd.data-resign')->with('success', 'Pengajuan resign berhasil ditambahkan!');
    }

    public function edit(Resign $resign)
    {
        return view('hrd.resign.edit', compact('resign'));
    }

    public function update(Request $request, Resign $resign)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:users,id',
            'tanggal_pengajuan' => 'required|date',
            'tanggal_efektif' => 'required|date|after_or_equal:tanggal_pengajuan',
            'alasan' => 'required|string',
        ]);

        $resign->update($request->all());

        return redirect()->route('hrd.data-resign')->with('success', 'Pengajuan resign berhasil diperbarui!');
    }

    public function destroy(Resign $resign)
    {
        $resign->delete();
        return redirect()->route('hrd.data-resign')->with('success', 'Pengajuan resign berhasil dihapus!');
    }
}
