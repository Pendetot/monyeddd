<?php

namespace App\Http\Controllers\Api\Operasional;

use App\Http\Controllers\Controller;
use App\Http\Requests\Operasional\KPI\StoreKPIRequest;
use App\Http\Requests\Operasional\KPI\UpdateKPIRequest;
use App\Models\KPI;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class KPIController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kpi = KPI::all();
        return $this->success($kpi, 'Daftar KPI berhasil diambil.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreKPIRequest $request)
    {
        $kpi = KPI::create($request->validated());
        return $this->success($kpi, 'KPI berhasil ditambahkan.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(KPI $kpi)
    {
        return $this->success($kpi, 'Detail KPI berhasil diambil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateKPIRequest $request, KPI $kpi)
    {
        $kpi->update($request->validated());
        return $this->success($kpi, 'KPI berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KPI $kpi)
    {
        $kpi->delete();
        return $this->success([], 'KPI berhasil dihapus.');
    }
}
