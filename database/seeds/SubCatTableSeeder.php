<?php

use Illuminate\Database\Seeder;
use App\SupCategory;

class SubCatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $faker->addProvider(new Bezhanov\Faker\Provider\Medicine($faker));
        foreach (range(1, 10) as $index) {
            SupCategory::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 4),
                'category_id' => $faker->numberBetween($min = 1, $max = 4),
                'name' => $faker->medicine,
                // 'description' => $faker->realText(),
            ]);
        }
    }
}
