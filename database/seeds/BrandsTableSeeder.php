<?php
use App\Brand;
use Illuminate\Database\Seeder;

class BrandsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('brands')->insert(['name' => 'NIKE']);
        DB::table('brands')->insert(['name' => 'ADIDAS']);
        DB::table('brands')->insert(['name' => 'ARMANI']);
        DB::table('brands')->insert(['name' => 'SELECTED']);
        DB::table('brands')->insert(['name' => 'LEVIS']);
    }
}
