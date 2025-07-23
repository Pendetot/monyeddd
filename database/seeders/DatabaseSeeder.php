<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call(UserSuperAdminSeeder::class);
        $this->call(UserHRDSeeder::class);
        $this->call(PelamarSeeder::class);
        $this->call(KaryawanSeeder::class);
        $this->call(CutiSeeder::class);
        $this->call(ResignSeeder::class);
        $this->call(SuratPeringatanSeeder::class);
        $this->call(MutasiSeeder::class);
        $this->call(MutasiTambahanSeeder::class);
    }
}
