<?php
namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $teknisiRole = Role::where('name', 'teknisi')->first();
        $pelangganRole = Role::where('name', 'pelanggan')->first();

        // Admin User
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'phone' => '081234567890',
            'address' => 'Jl. Admin No. 1',
            'role_id' => $adminRole->id,
        ]);

        // Teknisi User
        User::create([
            'name' => 'Teknisi 1',
            'email' => 'teknisi@example.com',
            'password' => Hash::make('password'),
            'phone' => '081234567891',
            'address' => 'Jl. Teknisi No. 1',
            'role_id' => $teknisiRole->id,
        ]);

        // Pelanggan User
        User::create([
            'name' => 'Customer 1',
            'email' => 'customer@example.com',
            'password' => Hash::make('password'),
            'phone' => '081234567892',
            'address' => 'Jl. Customer No. 1',
            'role_id' => $pelangganRole->id,
        ]);
    }
}