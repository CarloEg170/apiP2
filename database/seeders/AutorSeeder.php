<?php

namespace Database\Seeders;

use App\Models\Autor;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class AutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        foreach (range(1, 5) as $index) {
            Autor::create([
            'nome' => $faker->nome,
            'data_nascimento' => $faker->date('Y-m-d'),
            'biografia' =>$faker->text(100),
            ]);
        }
    }
}
