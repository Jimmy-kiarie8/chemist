<?php

use Illuminate\Database\Seeder;
use App\Product;

class ProductTableSeeder extends Seeder
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
        foreach (range(1, 30) as $index) {
            Product::create([
                'user_id' => $faker->numberBetween($min = 1, $max = 10),
                'subcategory_id' => $faker->numberBetween($min = 1, $max = 10),
                'quantity' => $faker->numberBetween($min = 4, $max = 80),
                'price' => $faker->numberBetween($min = 500, $max = 5000),
                'name' => $faker->medicine,
                'description' => $faker->text,
                'image' => $faker->imageUrl(),
            ]);
        }
    }
}
