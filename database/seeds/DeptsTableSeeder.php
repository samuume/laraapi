<?php
use App\Dept;
use Illuminate\Database\Seeder;

class DeptsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Dept::truncate();

        $faker = \Faker\Factory::create();
        
        for ($i=0; $i < 5; $i++) {
          Dept::create([
            'name' => $faker->sentence,
          ]);
        }
    }
}
