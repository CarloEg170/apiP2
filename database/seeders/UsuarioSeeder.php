<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        foreach (range(1, 5) as $index) {
            Usuario::create([
            'nome' => $faker->name,
            'email' => $faker->unique()->safeEmail,
            'password' => bcrypt('12345678'),
            ]);
        }
    }
}
