<?php

use Carbon\Carbon;
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
            ["name" => "Aiman Faruqy", "username" => "SW0103281", "email" => "aiman@test.com", "password" => Hash::make('123456'), "avatar" => "profilepic.jpg", "department_id" => "1"],
        ]);

        DB::table('vehicles')->insert([
            ["brand" => "Toyota", "model" => "Avanza", "color" => "Green", "icnum" => "identifications\icexample.jpg", "license" => "licenses\licenseexample.jpg", "platenumber" => "BJY6688", "staff_id" => "1", "state" =>"0"],
        ]);
        DB::table('attendances')->insert([
            ["timein" => now(), "timeout" => now()->addHours(5), "locationin" => "CCI", "locationout" => "COE", "vehicle_id" => "1", "staff_id" => "1"],
        ]);
    }
}
