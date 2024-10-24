<?php

namespace Database\Seeders;

use App\Models\Animal;
use Illuminate\Database\Seeder;

class AnimalSeeder extends Seeder
{
    public function run(): void
    {
        $animals = [
            ['name' => 'Kambing'],
            ['name' => 'Sapi'],
            ['name' => 'Domba'],
            ['name' => 'Kerbau'],
            ['name' => 'Ayam'],
        ];

        foreach ($animals as $animal) {
            Animal::create($animal);
        }
    }
}