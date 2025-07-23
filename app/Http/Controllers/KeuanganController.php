<?php

namespace App\Http\Controllers;

use App\Models\PenaltiSP;
use App\Models\HutangKaryawan;
use App\Models\SuratPeringatan;
use Illuminate\Http\Request;


class KeuanganController extends Controller
{
    public function indexPenalti()
    {
        $suratPeringatans = SuratPeringatan::whereNotNull('penalty_amount')->with(['user', 'hutangKaryawans'])->get();
        return view('hrd.surat_peringatans.index', compact('suratPeringatans'));
    }

    public function indexHutang()
    {
        $hutangKaryawans = HutangKaryawan::with('user', 'suratPeringatan')->latest()->get();
        return view('keuangan.hutang.index', compact('hutangKaryawans'));
    }

    public function showHutang(HutangKaryawan $hutangKaryawan)
    {
        $hutangKaryawan->load('user', 'suratPeringatan');
        return view('keuangan.hutang.show', compact('hutangKaryawan'));
    }

    public function dashboard()
    {
        $totalHutangKaryawan = HutangKaryawan::sum('jumlah');
        $totalHutangBelumLunas = HutangKaryawan::where('status', 'belum_lunas')->sum('jumlah');
        $totalPenaltiSP = PenaltiSP::sum('jumlah_penalti');
        $jumlahKaryawanBerhutang = HutangKaryawan::distinct('karyawan_id')->count('karyawan_id');
        $jumlahKaryawanTerkenaSP = SuratPeringatan::distinct('karyawan_id')->count('karyawan_id');

        return view('keuangan.dashboard', compact('totalHutangKaryawan', 'totalHutangBelumLunas', 'totalPenaltiSP', 'jumlahKaryawanBerhutang', 'jumlahKaryawanTerkenaSP'));
    }
}