<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PengajuanBarangService;
use App\Models\PengajuanBarang;

class SuperadminPengajuanBarangController extends Controller
{
    protected $pengajuanBarangService;

    public function __construct(PengajuanBarangService $pengajuanBarangService)
    {
        $this->pengajuanBarangService = $pengajuanBarangService;
    }

    public function index()
    {
        $pendingRequests = PengajuanBarang::where('status', 'pending_superadmin_approval')->get();
        return view('superadmin.pengajuan_barang.index', compact('pendingRequests'));
    }

    public function approve(Request $request, PengajuanBarang $pengajuan)
    {
        $request->validate([
            'superadmin_notes' => 'nullable|string',
        ]);

        $this->pengajuanBarangService->approveBySuperadmin($pengajuan, $request->input('superadmin_notes'));

        return redirect()->back()->with('success', 'Pengajuan barang berhasil disetujui.');
    }

    public function reject(Request $request, PengajuanBarang $pengajuan)
    {
        $request->validate([
            'superadmin_notes' => 'required|string',
        ]);

        $this->pengajuanBarangService->rejectBySuperadmin($pengajuan, $request->input('superadmin_notes'));

        return redirect()->back()->with('success', 'Pengajuan barang ditolak dan notifikasi dikirim ke Logistik.');
    }
}