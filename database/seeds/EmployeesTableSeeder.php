<?php
use App\Employee;
use Illuminate\Database\Seeder;

class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();

        $faker = \Faker\Factory::create();

        for ($i=0; $i < 20; $i++) {
          Employee::create([
            'name' => $faker->name,
            'email' => $faker->unique()->email,
            'contact_number' => $faker->phoneNumber,
            'gender' => $faker->randomElement($array = array('male', 'female')),
            'dept_id' => rand(1,5),
          ]);
        }
    }
}
