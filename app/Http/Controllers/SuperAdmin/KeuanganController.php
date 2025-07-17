<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\Keuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class KeuanganController extends Controller
{
    public function index()
    {
        $keuangans = Keuangan::all();
        return view('superadmin.keuangan.index', compact('keuangans'));
    }

    public function create()
    {
        return view('superadmin.keuangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:keuangans',
            'password' => 'required|string|min:8',
        ]);

        $plainPassword = $request->password;

        $latestKeuangan = Keuangan::latest()->first();
        $nextId = $latestKeuangan ? $latestKeuangan->id + 1 : 1;
        $karyawanCode = 'Lazy-KR' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        $keuangan = Keuangan::create([
            'karyawan_code' => $karyawanCode,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($plainPassword),
        ]);

        $loginLink = route('keuangan.showLoginForm');

        return view('superadmin.keuangan.account_created', [
            'user' => $keuangan,
            'role' => 'keuangan',
            'loginLink' => $loginLink,
            'plainPassword' => $plainPassword,
            'karyawanCode' => $karyawanCode,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Keuangan $keuangan)
    {
        return view('superadmin.keuangan.edit', compact('keuangan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Keuangan $keuangan)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:keuangans,email,' . $keuangan->id,
            'password' => 'nullable|string|min:8',
        ]);

        $keuangan->nama = $request->nama;
        $keuangan->email = $request->email;
        if ($request->filled('password')) {
            $keuangan->password = Hash::make($request->password);
        }
        $keuangan->save();

        return redirect()->route('superadmin.keuangan.index')->with('success', 'Keuangan updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Keuangan $keuangan)
    {
        $keuangan->delete();
        return redirect()->route('superadmin.keuangan.index')->with('success', 'Keuangan deleted successfully!');
    }
}