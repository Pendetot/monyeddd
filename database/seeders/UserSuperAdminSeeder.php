<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Enums\RoleEnum;
use Illuminate\Support\Facades\Hash;

class UserSuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'superadmin@lazydev.dev'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('racube21'),
                'role' => RoleEnum::SuperAdmin,
            ]
        );
    }
}