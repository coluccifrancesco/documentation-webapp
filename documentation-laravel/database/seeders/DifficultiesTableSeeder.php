<?php

namespace Database\Seeders;

use App\Models\Difficulty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class DifficultiesTableSeeder extends Seeder {

    // Run the database seeds.
    public function run(Faker $faker): void {
        
        for ($i = 0; $i < 5; $i++) { 
            
            $newDifficulty = new Difficulty();
    
            $newDifficulty->grade_name = $faker->word();
            $newDifficulty->grade_numerical = $faker->numberBetween(1, 3);
    
            $newDifficulty->save();
        }
    }
}
