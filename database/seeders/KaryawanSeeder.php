<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Karyawan::create([
            'nama' => 'Agus Setiawan',
            'nik' => '1234567890',
            'alamat' => 'Jl. Kebon Jeruk No. 1, Jakarta',
            'telepon' => '081122334455',
            'jabatan' => 'Manager HRD',
            'penempatan' => 'Kantor Pusat',
            'status' => 'aktif',
        ]);

        Karyawan::create([
            'nama' => 'Dewi Lestari',
            'nik' => '0987654321',
            'alamat' => 'Jl. Pahlawan No. 2, Bandung',
            'telepon' => '085544332211',
            'jabatan' => 'Staff Keuangan',
            'penempatan' => 'Kantor Cabang Bandung',
            'status' => 'aktif',
        ]);

        Karyawan::create([
            'nama' => 'Cahyo Nugroho',
            'nik' => '1122334455',
            'alamat' => 'Jl. Diponegoro No. 3, Surabaya',
            'telepon' => '087766554433',
            'jabatan' => 'Staff Operasional',
            'penempatan' => 'Gudang Surabaya',
            'status' => 'aktif',
        ]);
    }
}