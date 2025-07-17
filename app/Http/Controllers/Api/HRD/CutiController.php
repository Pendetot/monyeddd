<?php

namespace App\Http\Controllers\Api\HRD;

use App\Http\Controllers\Controller;
use App\Http\Requests\HRD\Cuti\StoreCutiRequest;
use App\Http\Requests\HRD\Cuti\UpdateCutiRequest;
use App\Models\Cuti;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class CutiController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cuti = Cuti::all();
        return view('hrd.cuti.index', compact('cuti'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCutiRequest $request)
    {
        $cuti = Cuti::create($request->validated());
        return $this->success($cuti, 'Cuti berhasil ditambahkan.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cuti $cuti)
    {
        return $this->success($cuti, 'Detail Cuti berhasil diambil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCutiRequest $request, Cuti $cuti)
    {
        $cuti->update($request->validated());
        return $this->success($cuti, 'Cuti berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cuti $cuti)
    {
        $cuti->delete();
        return $this->success([], 'Cuti berhasil dihapus.');
    }
}
