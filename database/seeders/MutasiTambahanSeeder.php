<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Mutasi;
use App\Models\Karyawan;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;

class MutasiTambahanSeeder extends Seeder
{
    use WithFaker;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->setUpFaker();
        // Pastikan ada mutasi yang tersedia untuk diperbarui
        $mutasis = Mutasi::all();

        if ($mutasis->isEmpty()) {
            $this->command->info('Tidak ada mutasi yang ditemukan. Silakan jalankan MutasiSeeder terlebih dahulu.');
            return;
        }

        // Contoh pembaruan data mutasi yang sudah ada
        foreach ($mutasis as $mutasi) {
            $mutasi->update([
                'data_personal_berubah' => $this->faker->boolean(),
                'jaminan_seragam_mutasi' => $this->faker->boolean(),
                'seragam_mutasi' => $this->faker->randomElement(['sudah_diberikan', 'belum_diberikan', 'tidak_ada']),
            ]);
        }

        $this->command->info('MutasiTambahanSeeder berhasil dijalankan!');
    }

    protected function faker()
    {
        return \Faker\Factory::create();
    }
}
