<?php

namespace App\Http\Controllers\Api\Operasional;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operasional\Pembinaan\StorePembinaanRequest;
use App\Http\Requests\Operasional\Pembinaan\UpdatePembinaanRequest;
use App\Models\Pembinaan;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class PembinaanController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembinaan = Pembinaan::all();
        return $this->success($pembinaan, 'Daftar Pembinaan berhasil diambil.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePembinaanRequest $request)
    {
        $pembinaan = Pembinaan::create($request->validated());
        return $this->success($pembinaan, 'Pembinaan berhasil ditambahkan.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembinaan $pembinaan)
    {
        return $this->success($pembinaan, 'Detail Pembinaan berhasil diambil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePembinaanRequest $request, Pembinaan $pembinaan)
    {
        $pembinaan->update($request->validated());
        return $this->success($pembinaan, 'Pembinaan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembinaan $pembinaan)
    {
        $pembinaan->delete();
        return $this->success([], 'Pembinaan berhasil dihapus.');
    }
}
