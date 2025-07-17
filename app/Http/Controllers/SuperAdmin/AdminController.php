<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SuperAdmin;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admins = SuperAdmin::all();
        return view('superadmin.admin.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('superadmin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:super_admins',
            'password' => 'required|string|min:8',
        ]);

        $plainPassword = $request->password;

        $admin = SuperAdmin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($plainPassword),
        ]);

        $loginLink = url('/superadmin/auth/login');

        return view('superadmin.admin.account_created', compact('admin', 'plainPassword', 'loginLink'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SuperAdmin $admin)
    {
        return view('superadmin.admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SuperAdmin $admin)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:super_admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8',
        ]);

        $admin->nama = $request->nama;
        $admin->email = $request->email;
        if ($request->filled('password')) {
            $admin->password = bcrypt($request->password);
        }
        $admin->save();

        return redirect()->route('superadmin.admin.index')->with('success', 'Admin updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SuperAdmin $admin)
    {
        $admin->delete();
        return redirect()->route('superadmin.admin.index')->with('success', 'Admin deleted successfully!');
    }
}
