<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'nama' => 'ahmad hilmy',
            'nim' => '0110223148',
            'email' => 'ahmadhilmy@gmail.com',
            'jurusan' => 'Teknik Informatika',
        ]);

        Student::create([
            'nama' => 'Ahmad Muaz',
            'nim' => '0917927083',
            'email' => 'ahmadmuaz@gmail.com',
            'jurusan' => 'Sistem Informasi',
        ]);

    }
}
