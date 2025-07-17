<?php

namespace App\Http\Controllers\Keuangan;

use App\Http\Controllers\Controller;
use App\Models\SuratPeringatan;
use Illuminate\Http\Request;

class PenaltiSPController extends Controller
{
    public function index()
    {
        return view('keuangan.penalti-sp');
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|exists:karyawans,id',
            'alasan' => 'required|string',
            'tanggal' => 'required|date',
        ]);

        try {
            SuratPeringatan::create([
                'karyawan_id' => $request->karyawan_id,
                'jenis_sp' => 'Penalti', // Assuming 'Penalti' as a default type for SP
                'tanggal_sp' => $request->tanggal,
                'keterangan' => $request->alasan,
            ]);

            return redirect()->back()->with('success', 'Surat Peringatan berhasil disimpan!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menyimpan Surat Peringatan: ' . $e->getMessage());
        }
    }
}
