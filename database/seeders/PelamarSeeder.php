<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pelamar;

class PelamarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelamar::create([
            'nama' => 'Budi Santoso',
            'email' => 'budi.santoso@example.com',
            'telepon' => '081234567890',
            'alamat' => 'Jl. Merdeka No. 10, Jakarta',
            'status_aplikasi' => 'pending',
            'tanggal_interview' => null,
            'catatan_hrd' => null,
        ]);

        Pelamar::create([
            'nama' => 'Siti Aminah',
            'email' => 'siti.aminah@example.com',
            'telepon' => '081298765432',
            'alamat' => 'Jl. Sudirman No. 20, Bandung',
            'status_aplikasi' => 'diterima',
            'tanggal_interview' => '2025-07-20',
            'catatan_hrd' => 'Lulus interview, siap bergabung.',
        ]);

        Pelamar::create([
            'nama' => 'Joko Susilo',
            'email' => 'joko.susilo@example.com',
            'telepon' => '087654321098',
            'alamat' => 'Jl. Gatot Subroto No. 30, Surabaya',
            'status_aplikasi' => 'ditolak',
            'tanggal_interview' => '2025-07-10',
            'catatan_hrd' => 'Tidak memenuhi kualifikasi.',
        ]);
    }
}