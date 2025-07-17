<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SuratPeringatan;
use App\Models\Karyawan;

class SuratPeringatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $karyawan3 = Karyawan::where('nik', '1122334455')->first();

        SuratPeringatan::create([
            'karyawan_id' => $karyawan3->id,
            'jenis_sp' => 'SP1',
            'tanggal_sp' => '2025-07-10',
            'keterangan' => 'Keterlambatan masuk kerja berulang.',
        ]);
    }
}