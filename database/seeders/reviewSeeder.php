<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class reviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('pt_BR');
        foreach (range(1, 5) as $index) {
            Review::create([
            'text' =>$faker->text(100),
            'nota' =>$faker->float(0, 5),
            ]);
        }
    }
}
