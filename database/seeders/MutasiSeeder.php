<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mutasi;
use App\Models\Karyawan;
use Carbon\Carbon;

class MutasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan ada karyawan yang tersedia untuk mutasi
        $karyawanIds = Karyawan::pluck('id')->toArray();

        if (empty($karyawanIds)) {
            $this->command->info('Tidak ada karyawan yang ditemukan. Silakan jalankan KaryawanSeeder terlebih dahulu.');
            return;
        }

        Mutasi::create([
            'karyawan_id' => $karyawanIds[array_rand($karyawanIds)],
            'tanggal_mutasi' => Carbon::now()->subMonths(2),
            'departemen_lama' => 'Karyawan',
            'departemen_baru' => 'Keuangan',
            'jabatan_lama' => 'Staff Karyawan',
            'jabatan_baru' => 'Staff Keuangan',
            'alasan' => 'Rotasi internal untuk pengembangan karir.',
        ]);

        Mutasi::create([
            'karyawan_id' => $karyawanIds[array_rand($karyawanIds)],
            'tanggal_mutasi' => Carbon::now()->subMonth(),
            'departemen_lama' => 'Keuangan',
            'departemen_baru' => 'Karyawan',
            'jabatan_lama' => 'Staff Keuangan',
            'jabatan_baru' => 'Staff Karyawan',
            'alasan' => 'Kebutuhan tim karyawan yang meningkat.',
        ]);

        Mutasi::create([
            'karyawan_id' => $karyawanIds[array_rand($karyawanIds)],
            'tanggal_mutasi' => Carbon::now(),
            'departemen_lama' => 'Staff Karyawan',
            'departemen_baru' => 'Manager Karyawan',
            'jabatan_lama' => 'Staff Karyawan',
            'jabatan_baru' => 'Manager Karyawan',
            'alasan' => 'Promosi jabatan.',
        ]);

        $this->command->info('MutasiSeeder berhasil dijalankan!');
    }
}