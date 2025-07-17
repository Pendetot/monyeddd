<?php

namespace App\Http\Controllers;

use App\Models\Pelamar;
use App\Http\Requests\StorePelamarRequest;
use App\Http\Requests\UpdatePelamarRequest;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelamars = Pelamar::all();
        return view('hrd.pelamars.index', compact('pelamars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hrd.pelamars.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelamarRequest $request)
    {
        Pelamar::create($request->validated());

        return redirect()->route('pelamars.index')->with('success', 'Pelamar berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelamar $pelamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelamar $pelamar)
    {
        return view('hrd.pelamars.edit', compact('pelamar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelamarRequest $request, Pelamar $pelamar)
    {
        $pelamar->update($request->validated());

        return redirect()->route('pelamars.index')->with('success', 'Pelamar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelamar $pelamar)
    {
        $pelamar->delete();
        return redirect()->route('pelamars.index')->with('success', 'Pelamar berhasil dihapus.');
    }
}
