<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run()
    {
     
        User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin123'), 
        ]);

        User::create([
            'name' => 'Karyawan',
            'email' => 'karyawan@example.com',
            'password' => bcrypt('karyawan123'),
        ]);
    }
}
