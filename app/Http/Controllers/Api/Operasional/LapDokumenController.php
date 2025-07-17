<?php

namespace App\Http\Controllers\Api\Operasional;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operasional\LapDokumen\StoreLapDokumenRequest;
use App\Http\Requests\Operasional\LapDokumen\UpdateLapDokumenRequest;
use App\Models\LapDokumen;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class LapDokumenController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lapDokumen = LapDokumen::all();
        return $this->success($lapDokumen, 'Daftar Laporan Dokumen berhasil diambil.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLapDokumenRequest $request)
    {
        $lapDokumen = LapDokumen::create($request->validated());
        return $this->success($lapDokumen, 'Laporan Dokumen berhasil ditambahkan.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(LapDokumen $lapDokumen)
    {
        return $this->success($lapDokumen, 'Detail Laporan Dokumen berhasil diambil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLapDokumenRequest $request, LapDokumen $lapDokumen)
    {
        $lapDokumen->update($request->validated());
        return $this->success($lapDokumen, 'Laporan Dokumen berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(LapDokumen $lapDokumen)
    {
        $lapDokumen->delete();
        return $this->success([], 'Laporan Dokumen berhasil dihapus.');
    }
}
