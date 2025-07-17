<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Resign;
use App\Models\Karyawan;

class ResignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawan1 = Karyawan::where('nik', '1234567890')->first();

        Resign::create([
            'karyawan_id' => $karyawan1->id,
            'tanggal_pengajuan' => '2025-07-15',
            'tanggal_efektif' => '2025-08-15',
            'alasan' => 'Menerima tawaran pekerjaan lain.',
            'status' => 'pending',
        ]);
    }
}