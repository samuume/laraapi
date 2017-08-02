<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $faker = \Faker\Factory::create();

        for ($i=0; $i < 20; $i++) {
          Product::create([
            'name' => $faker->word,
            'title' => $faker->word,
            'description' => $faker->paragraph,
            'price' => $faker->numberBetween(1.00, 2000.00),
            'category_id' => rand(1,5),
          ]);
        }
    }
}
