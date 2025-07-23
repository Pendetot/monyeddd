<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PengajuanBarangService;
use Illuminate\Support\Facades\Auth;

class HrdPengajuanBarangController extends Controller
{
    protected $pengajuanBarangService;

    public function __construct(PengajuanBarangService $pengajuanBarangService)
    {
        $this->pengajuanBarangService = $pengajuanBarangService;
    }

    public function create()
    {
        return view('hrd.pengajuan_barang.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string',
        ]);

        $data = [
            'hrd_id' => Auth::id(),
            'item_name' => $request->input('item_name'),
            'quantity' => $request->input('quantity'),
            'notes' => $request->input('notes'),
        ];

        $this->pengajuanBarangService->createPengajuan($data);

        return redirect()->back()->with('success', 'Pengajuan barang berhasil diajukan ke Logistik.');
    }
}