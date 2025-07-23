<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PengajuanBarangService;
use App\Models\PengajuanBarang;

class LogisticPengajuanBarangController extends Controller
{
    protected $pengajuanBarangService;

    public function __construct(PengajuanBarangService $pengajuanBarangService)
    {
        $this->pengajuanBarangService = $pengajuanBarangService;
    }

    public function index()
    {
        $pendingRequests = PengajuanBarang::where('status', 'pending_logistic_approval')->get();
        $approvedBySuperadmin = PengajuanBarang::where('status', 'approved')->get();
        $itemStatusUpdates = PengajuanBarang::whereIn('status', ['item_not_ready', 'item_ready'])->get();

        return view('logistik.pengajuan_barang.index', compact('pendingRequests', 'approvedBySuperadmin', 'itemStatusUpdates'));
    }

    public function approve(Request $request, PengajuanBarang $pengajuan)
    {
        $request->validate([
            'logistic_notes' => 'nullable|string',
        ]);

        $this->pengajuanBarangService->approveByLogistic($pengajuan, $request->input('logistic_notes'));

        return redirect()->back()->with('success', 'Pengajuan barang diteruskan ke Superadmin untuk otorisasi.');
    }

    public function reject(Request $request, PengajuanBarang $pengajuan)
    {
        $request->validate([
            'logistic_notes' => 'required|string',
        ]);

        $this->pengajuanBarangService->rejectByLogistic($pengajuan, $request->input('logistic_notes'));

        return redirect()->back()->with('success', 'Pengajuan barang ditolak dan notifikasi dikirim ke HRD.');
    }

    public function setItemStatus(Request $request, PengajuanBarang $pengajuan)
    {
        $request->validate([
            'status_barang' => 'required|in:item_ready,item_not_ready',
            'logistic_notes' => 'nullable|string',
        ]);

        $this->pengajuanBarangService->setItemStatus($pengajuan, $request->input('status_barang'), $request->input('logistic_notes'));

        return redirect()->back()->with('success', 'Status barang berhasil diperbarui dan notifikasi dikirim ke HRD.');
    }
}