<?php

namespace App\Http\Controllers\HRD;

use App\Enums\AsalHutangEnum;
use App\Enums\StatusHutangEnum;
use App\Http\Controllers\Controller;
use App\Models\HutangKaryawan;
use Illuminate\Http\Request;

class SuratPeringatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suratPeringatans = \App\Models\SuratPeringatan::all();

        foreach ($suratPeringatans as $sp) {
            if ($sp->karyawan_type === 'Keuangan') {
                $karyawan = \App\Models\Keuangan::where('karyawan_code', $sp->karyawan_code)->first();
                $sp->karyawan_nama = $karyawan->nama ?? 'N/A';
            } elseif ($sp->karyawan_type === 'Operasional') {
                $karyawan = \App\Models\Operasional::where('karyawan_code', $sp->karyawan_code)->first();
                $sp->karyawan_nama = $karyawan->nama ?? 'N/A';
            } elseif ($sp->karyawan_type === 'HRD') {
                $karyawan = \App\Models\HRD::where('karyawan_code', $sp->karyawan_code)->first();
                $sp->karyawan_nama = $karyawan->nama ?? 'N/A';
            } else {
                $sp->karyawan_nama = 'N/A';
            }
        }

        return view('hrd.suratperingatan.index', compact('suratPeringatans'));
    }

    public function create()
    {
        $keuangans = \App\Models\Keuangan::all();
        $operasionals = \App\Models\Operasional::all();
        $hrds = \App\Models\HRD::all();
        return view('hrd.suratperingatan.create', compact('keuangans', 'operasionals', 'hrds'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'jenis_sp' => 'required|string|max:255',
            'tanggal_sp' => 'required|date',
            'keterangan' => 'nullable|string',
            'karyawan_type' => 'required|string',
            'karyawan_code' => 'required|string',
            'penalty_amount' => 'nullable|numeric',
        ]);

        $suratPeringatan = \App\Models\SuratPeringatan::create($request->all());

        if (in_array($request->jenis_sp, ['SP1', 'SP2'])) {
            \App\Models\HutangKaryawan::create([
                'karyawan_code' => $request->karyawan_code,
                'karyawan_type' => $request->karyawan_type,
                'jumlah_hutang' => $request->penalty_amount,
                'tanggal_hutang' => $request->tanggal_sp,
                'asal_hutang' => \App\Enums\AsalHutangEnum::PINALTI,
                'status' => \App\Enums\StatusHutangEnum::BELUM_LUNAS,
                'keterangan' => $request->keterangan,
            ]);
        }

        return redirect()->route('superadmin.hrd.surat-peringatan')->with('success', 'Surat Peringatan berhasil ditambahkan dan hutang karyawan telah dicatat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    public function edit(\App\Models\SuratPeringatan $surat_peringatan)
    {
        $karyawan_nama = 'N/A';
        if ($surat_peringatan->karyawan_type === 'Keuangan') {
            $karyawan = \App\Models\Keuangan::where('karyawan_code', $surat_peringatan->karyawan_code)->first();
            $karyawan_nama = $karyawan->nama ?? 'N/A';
        } elseif ($surat_peringatan->karyawan_type === 'Operasional') {
            $karyawan = \App\Models\Operasional::where('karyawan_code', $surat_peringatan->karyawan_code)->first();
            $karyawan_nama = $karyawan->nama ?? 'N/A';
        } elseif ($surat_peringatan->karyawan_type === 'HRD') {
            $karyawan = \App\Models\HRD::where('karyawan_code', $surat_peringatan->karyawan_code)->first();
            $karyawan_nama = $karyawan->nama ?? 'N/A';
        }
        return view('hrd.suratperingatan.edit', compact('surat_peringatan', 'karyawan_nama'));
    }

    public function update(Request $request, \App\Models\SuratPeringatan $surat_peringatan)
    {
        $request->validate([
            'karyawan_id' => 'required|integer',
            'jenis_sp' => 'required|string|max:255',
            'tanggal_sp' => 'required|date',
            'keterangan' => 'nullable|string',
            'karyawan_type' => 'required|string',
            'karyawan_code' => 'required|string',
        ]);

        $surat_peringatan->update($request->all());

        return redirect()->route('superadmin.hrd.surat-peringatan')->with('success', 'Surat Peringatan berhasil diperbarui!');
    }

    public function destroy(\App\Models\SuratPeringatan $surat_peringatan)
    {
        $surat_peringatan->delete();
        return redirect()->route('hrd.surat-peringatan.index')->with('success', 'Surat Peringatan berhasil dihapus!');
    }
}