<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Operasional;

class OperasionalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $operasionals = Operasional::all();
        return view('superadmin.operasional.index', compact('operasionals'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.operasional.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:operasionals',
            'password' => 'required|string|min:8',
        ]);

        $plainPassword = $request->password;

        $latestOperasional = Operasional::latest()->first();
        $nextId = $latestOperasional ? $latestOperasional->id + 1 : 1;
        $karyawanCode = 'Lazy-KR' . str_pad($nextId, 3, '0', STR_PAD_LEFT);

        $operasional = Operasional::create([
            'karyawan_code' => $karyawanCode,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($plainPassword),
        ]);

        $loginLink = url('/operasional/auth/login');

        return view('superadmin.operasional.account_created', compact('operasional', 'plainPassword', 'loginLink', 'karyawanCode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Operasional $operasional)
    {
        return view('superadmin.operasional.edit', compact('operasional'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Operasional $operasional)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:operasionals,email,' . $operasional->id,
            'password' => 'nullable|string|min:8',
        ]);

        $operasional->nama = $request->nama;
        $operasional->email = $request->email;
        if ($request->filled('password')) {
            $operasional->password = bcrypt($request->password);
        }
        $operasional->save();

        return redirect()->route('superadmin.operasional.index')->with('success', 'Operasional updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operasional $operasional)
    {
        $operasional->delete();
        return redirect()->route('superadmin.operasional.index')->with('success', 'Operasional deleted successfully!');
    }
}
