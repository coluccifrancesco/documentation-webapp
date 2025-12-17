<?php

namespace Database\Seeders;

use App\Models\Argument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ArgumentsTableSeeder extends Seeder {
    
    // Run the database seeds.
    public function run(Faker $faker): void {
        
        for ($i = 0; $i < 5; $i++) { 

            $newArgument = new Argument();
    
            $newArgument->name = $faker->word();
            $newArgument->resume = $faker->paragraph(2);
            $newArgument->md_text = $faker->paragraph(5);
            $newArgument->difficulty_id = $faker->numberBetween(1, 3);
            $newArgument->documentation_link = $faker->url();
    
            $newArgument->save();
        }
    }
}
