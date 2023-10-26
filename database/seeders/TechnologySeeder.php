<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Technology;

use Faker\Generator as Faker;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        $tech_types = ['html','css','js','php','C++','mysql'];

        foreach ($tech_types as $tech_type) {

            $technology = new Technology();
            $technology->label = $tech_type;
            $technology->color = $faker->hexColor();
            $technology->save();
        }

    }
}
