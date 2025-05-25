<?php
namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'display_name' => 'Administrator',
            'description' => 'System Administrator with full access'
        ]);

        Role::create([
            'name' => 'teknisi',
            'display_name' => 'Teknisi',
            'description' => 'Technical staff for service execution'
        ]);

        Role::create([
            'name' => 'pelanggan',
            'display_name' => 'Pelanggan',
            'description' => 'Customer who requests services'
        ]);
    }
}