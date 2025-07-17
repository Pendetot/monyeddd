<?php

namespace App\Http\Controllers\Api\Operasional;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operasional\Absensi\StoreAbsensiRequest;
use App\Http\Requests\Operasional\Absensi\UpdateAbsensiRequest;
use App\Models\Absensi;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensi = Absensi::all();
        return $this->success($absensi, 'Daftar Absensi berhasil diambil.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsensiRequest $request)
    {
        $absensi = Absensi::create($request->validated());
        return $this->success($absensi, 'Absensi berhasil ditambahkan.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        return $this->success($absensi, 'Detail Absensi berhasil diambil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAbsensiRequest $request, Absensi $absensi)
    {
        $absensi->update($request->validated());
        return $this->success($absensi, 'Absensi berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();
        return $this->success([], 'Absensi berhasil dihapus.');
    }
}
