<?php

namespace App\Http\Controllers\Api\Pelamar;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pelamar\StorePelamarRequest;
use App\Http\Requests\Pelamar\UpdatePelamarRequest;
use App\Models\Pelamar;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pelamar = Pelamar::all();
        return $this->success($pelamar, 'Daftar Pelamar berhasil diambil.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePelamarRequest $request)
    {
        $pelamar = Pelamar::create($request->validated());
        return $this->success($pelamar, 'Pelamar berhasil ditambahkan.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelamar $pelamar)
    {
        return $this->success($pelamar, 'Detail Pelamar berhasil diambil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelamarRequest $request, Pelamar $pelamar)
    {
        $pelamar->update($request->validated());
        return $this->success($pelamar, 'Pelamar berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelamar $pelamar)
    {
        $pelamar->delete();
        return $this->success([], 'Pelamar berhasil dihapus.');
    }
}
