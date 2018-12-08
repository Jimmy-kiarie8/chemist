<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new Bezhanov\Faker\Provider\Science($faker));
        foreach (range(1, 4) as $index) {
            Category::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 10),
                'name' => $faker->chemicalElement,
                'description' => $faker->realText(),
            ]);
        }
    }
}
