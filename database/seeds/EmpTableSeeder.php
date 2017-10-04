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
            'name' => 'Admin',
            'phone' => '0888837046',
            'password' => bcrypt('123456'),
            'role' => 1,
            'sex' => 1
        ]);
    }
}
