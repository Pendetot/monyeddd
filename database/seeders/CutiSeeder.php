<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Cuti;
use App\Models\Karyawan;

class CutiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawan1 = Karyawan::where('nik', '1234567890')->first();
        $karyawan2 = Karyawan::where('nik', '0987654321')->first();

        Cuti::create([
            'karyawan_id' => $karyawan1->id,
            'tanggal_mulai' => '2025-08-01',
            'tanggal_selesai' => '2025-08-05',
            'jenis_cuti' => 'tahunan',
            'status' => 'pending',
            'alasan' => 'Liburan keluarga',
        ]);

        Cuti::create([
            'karyawan_id' => $karyawan2->id,
            'tanggal_mulai' => '2025-07-20',
            'tanggal_selesai' => '2025-07-22',
            'jenis_cuti' => 'sakit',
            'status' => 'disetujui',
            'alasan' => 'Demam tinggi',
        ]);
    }
}