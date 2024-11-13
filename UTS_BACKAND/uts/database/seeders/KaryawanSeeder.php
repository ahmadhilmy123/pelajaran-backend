<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use Carbon\Carbon;

class KaryawanSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Budi Santoso',
                'gender' => 'L',
                'phone' => '081234567890',
                'address' => 'Jl. Merdeka No. 123',
                'email' => 'budi@example.com',
                'status' => 'active',
                'hired_on' => Carbon::create('2020', '01', '01')
            ],
            [
                'name' => 'Siti Aminah',
                'gender' => 'P',
                'phone' => '081234567891',
                'address' => 'Jl. Sudirman No. 456',
                'email' => 'siti@example.com',
                'status' => 'inactive',
                'hired_on' => Carbon::create('2021', '05', '15')
            ],
            [
                'name' => 'Andi Pratama',
                'gender' => 'L',
                'phone' => '081234567892',
                'address' => 'Jl. Thamrin No. 789',
                'email' => 'andi@example.com',
                'status' => 'terminated',
                'hired_on' => Carbon::create('2019', '03', '10')
            ],
        ];

      
    }
}
