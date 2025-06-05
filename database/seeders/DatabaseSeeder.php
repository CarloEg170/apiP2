<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Usuario;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     * @return void
     */
    public function run(): void
    {

        $this->call(AutorSeeder::class);
        $this->call(GeneroSeeder::class);
        $this->call(LivroSeeder::class);
        $this->call(ReviewSeeder::class);
        $this->call(UsuarioSeeder::class);
    }
}
