<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CheckUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::where('email', 'superadmin@example.com')->first();

        if ($user) {
            echo "User: " . $user->name . "\n";
            echo "Email: " . $user->email . "\n";
            echo "Role: " . $user->role->value . "\n";
        } else {
            echo "User superadmin@example.com not found.\n";
        }
    }
}