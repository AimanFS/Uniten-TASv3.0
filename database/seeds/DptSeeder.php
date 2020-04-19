<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();

        DB::table('departments')->insert([
            ["name" => "College of Computing and Informatics"],
            ["name" => "College of Engineering"],
            ["name" => "College of Business Management & Accounting"],
            ["name" => "College of Energy Economics & Social Sciences"],
            ["name" => "College of Graduate Studies"]
        ]);

        DB::table('staffs')->insert([
            ["name" => "Aiman Faruqy", "username" => "SW0103281", "email" => "aiman@test.com", "password" => Hash::make('123456'), "avatar" => "/images/profilepic.jpg", "department_id" => "1"],
        ]);
    }
}
