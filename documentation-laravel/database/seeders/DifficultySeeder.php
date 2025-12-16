<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DifficultySeeder extends Seeder {

    // Run the database seeds.
    public function run(Faker $faker): void {
        
        $newDifficulty = new Difficulty();

        $newDifficulty->grade_name = $faker->word();
        $newDifficulty->grade_numerical = $faker->numberBetween(1, 3);

        $newDifficulty->save();
    }
}
