<?php

namespace App\Http\Controllers\Api\Keuangan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Keuangan\Hutang\StoreHutangKaryawanRequest;
use App\Http\Requests\Keuangan\Hutang\UpdateHutangKaryawanRequest;
use App\Models\HutangKaryawan;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class HutangController extends Controller
{
    use ApiResponseTrait;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hutang = HutangKaryawan::all();
        return $this->success($hutang, 'Daftar Hutang Karyawan berhasil diambil.');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreHutangKaryawanRequest $request)
    {
        $hutang = HutangKaryawan::create($request->validated());
        return $this->success($hutang, 'Hutang Karyawan berhasil ditambahkan.', 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(HutangKaryawan $hutang)
    {
        return $this->success($hutang, 'Detail Hutang Karyawan berhasil diambil.');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateHutangKaryawanRequest $request, HutangKaryawan $hutang)
    {
        $hutang->update($request->validated());
        return $this->success($hutang, 'Hutang Karyawan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HutangKaryawan $hutang)
    {
        $hutang->delete();
        return $this->success([], 'Hutang Karyawan berhasil dihapus.');
    }
}
