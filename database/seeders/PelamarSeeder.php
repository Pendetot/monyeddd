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
        Pelamar::firstOrCreate(
            ['email' => 'budi.santoso@example.com'],
            [
                'nama' => 'Budi Santoso',
                'nik' => '1234567890123456',
                'no_kk' => '6543210987654321',
                'telepon' => '081234567890',
                'alamat' => 'Jl. Merdeka No. 10, Jakarta',
                'pengalaman' => '5 tahun sebagai software engineer',
                'foto_formal' => 'public/foto_formal/default.jpg',
                'penempatan' => 'Jakarta',
                'nama_pt' => 'PT Sejahtera',
                'ijazah_sma' => 'public/ijazah_sma/default.pdf',
                'status_aplikasi' => 'pending',
            ]
        );

        Pelamar::firstOrCreate(
            ['email' => 'siti.aminah@example.com'],
            [
                'nama' => 'Siti Aminah',
                'nik' => '0987654321098765',
                'no_kk' => '5678901234567890',
                'telepon' => '081298765432',
                'alamat' => 'Jl. Sudirman No. 20, Bandung',
                'pengalaman' => '2 tahun sebagai marketing',
                'foto_formal' => 'public/foto_formal/default.jpg',
                'penempatan' => 'Bandung',
                'nama_pt' => 'PT Maju Jaya',
                'ijazah_sma' => 'public/ijazah_sma/default.pdf',
                'status_aplikasi' => 'diterima',
                'tanggal_interview' => '2025-07-20',
                'catatan_hrd' => 'Lulus interview, siap bergabung.',
            ]
        );

        Pelamar::firstOrCreate(
            ['email' => 'joko.susilo@example.com'],
            [
                'nama' => 'Joko Susilo',
                'nik' => '1122334455667788',
                'no_kk' => '8877665544332211',
                'telepon' => '087654321098',
                'alamat' => 'Jl. Gatot Subroto No. 30, Surabaya',
                'pengalaman' => 'Tidak ada',
                'foto_formal' => 'public/foto_formal/default.jpg',
                'penempatan' => 'Surabaya',
                'nama_pt' => 'PT Abadi',
                'ijazah_sma' => 'public/ijazah_sma/default.pdf',
                'status_aplikasi' => 'ditolak',
                'tanggal_interview' => '2025-07-10',
                'catatan_hrd' => 'Tidak memenuhi kualifikasi.',
            ]
        );
    }
}