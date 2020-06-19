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
            ["name" => "Admin", "username" => "420admin", "email" => "admin@admin.com", "password" => Hash::make('142536'), "phoneno" => "0123456789", "is_admin" => "1", "avatar" => "testprofile.jpg", "created_at" => now(), "updated_at" => now(), "department_id" => "1"],
            ["name" => "Aiman Faruqy", "username" => "420XX2020", "email" => "aiman@test.com", "password" => Hash::make('123456'), "phoneno" => "0123987654", "is_admin" => "0", "avatar" => "profilepic.jpg", "created_at" => now(), "updated_at" => now(), "department_id" => "1"],
        ]);

        DB::table('vehicles')->insert([
            ["brand" => "Toyota", "model" => "Avanza", "color" => "Green", "icnum" => "identifications\icexample.jpg", "license" => "licenses\licenseexample.jpg", "platenumber" => "BJY6688", "staff_id" => "2", "state" =>"0", "created_at" => now(), "updated_at" => now()],
        ]);
        DB::table('attendances')->insert([
            ["timein" => now(), "timeout" => now()->addHours(5), "locationin" => "CCI", "locationout" => "COE", "vehicle_id" => "1", "staff_id" => "2", "created_at" => now(), "updated_at" => now()],
        ]);
    }
}
