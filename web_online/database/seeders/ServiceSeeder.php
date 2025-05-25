<?php
namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        Service::create([
            'name' => 'Instalasi Komputer',
            'description' => 'Jasa instalasi sistem operasi dan software komputer',
            'price' => 150000,
            'duration_hours' => 2,
        ]);

        Service::create([
            'name' => 'Perbaikan Hardware',
            'description' => 'Jasa perbaikan komponen hardware komputer',
            'price' => 200000,
            'duration_hours' => 3,
        ]);

        Service::create([
            'name' => 'Maintenance Berkala',
            'description' => 'Jasa maintenance dan pembersihan komputer berkala',
            'price' => 100000,
            'duration_hours' => 1,
        ]);
    }
}