<?php

use Illuminate\Database\Seeder;

class EmpTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employees')->insert([
            'name' => str_random(10),
            'phone' => rand(1000, 10000),
            'password' => bcrypt('secret'),
            'role' => 3,
            'sex' => rand(1,2)
        ]);
    }
}
