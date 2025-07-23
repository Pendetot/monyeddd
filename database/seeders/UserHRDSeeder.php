<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Enums\RoleEnum;

class UserHRDSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'hrd@example.com'],
            [
                'name' => 'HRD User',
                'password' => Hash::make('password'),
                'role' => RoleEnum::HRD,
            ]
        );
    }
}