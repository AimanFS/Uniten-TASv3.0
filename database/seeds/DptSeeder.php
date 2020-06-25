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

        DB::table('staffs')->insert([
            ["name" => "CCI Admin", "username" => "admincci", "email" => "cci@admin.com", "password" => Hash::make('14253678'), "phoneno" => "0123456789", "is_admin" => "1", "avatar" => "admindefault.png", "created_at" => now(), "updated_at" => now(), "department_id" => "1"],
            ["name" => "COE Admin", "username" => "admincoe", "email" => "coe@admin.com", "password" => Hash::make('41526387'), "phoneno" => "0987654321", "is_admin" => "1", "avatar" => "admindefault.png", "created_at" => now(), "updated_at" => now(), "department_id" => "2"],
            ["name" => "Aiman Faruqy", "username" => "9003281", "email" => "aiman@test.com", "password" => Hash::make('12345678'), "phoneno" => "01161033995", "is_admin" => "0", "avatar" => "staffdefault.png", "created_at" => now(), "updated_at" => now(), "department_id" => "1"],
            ["name" => "Muhammad Syamirul", "username" => "9009865", "email" => "syamirul@test.com", "password" => Hash::make('87654321'), "phoneno" => "01987654321", "is_admin" => "0", "avatar" => "staffdefault.png", "created_at" => now(), "updated_at" => now(), "department_id" => "2"],
        ]);

        DB::table('vehicles')->insert([
            ["brand" => "Toyota", "model" => "Avanza", "color" => "Green", "ic" => "990708-05-4152", "license" => "80047512", "icpic" => "identifications\icexample.jpg", "licensepic" => "licenses\licenseexample.jpg", "licenseexpiry" => now(), "address" => "No. 39 Jln 1/2 Seksyen 1 Petaling Jaya 46000 Selangor", "platenumber" => "BJY6688", "staff_id" => "3", "state" =>"0", "created_at" => now(), "updated_at" => now()],
            ["brand" => "Honda", "model" => "City", "color" => "Black", "ic" => "980504-06-5874", "license" => "70049875", "icpic" => "identifications\icexample.jpg", "licensepic" => "licenses\licenseexample.jpg", "licenseexpiry" => now(), "address" => "07 Blok 7 Jln 2/109C Taman Abadi Indah Kuala Lumpur 58100 Wilayah Persekutuan", "platenumber" => "BTS9090", "staff_id" => "4", "state" =>"0", "created_at" => now(), "updated_at" => now()],
        ]);
        DB::table('attendances')->insert([
            ["timein" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-15 08:59:12')->toDateTimeString(),"timeout" => NULL, "locationin" => "CCI","locationout" => NULL, "vehicle_id" => "1", "staff_id" => "3", "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-15 08:59:12')->toDateTimeString(), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-15 08:59:12')->toDateTimeString()],
            ["timein" => NULL,"timeout" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-16 14:45:30')->toDateTimeString(),"locationin" => NULL,"locationout" => "COE", "vehicle_id" => "1", "staff_id" => "3", "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-16 14:45:30')->toDateTimeString(), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-16 14:45:30')->toDateTimeString()],
            ["timein" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-17 07:55:45')->toDateTimeString(),"timeout" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-17 12:20:35')->toDateTimeString(), "locationin" => "COE","locationout" => "CCI", "vehicle_id" => "1", "staff_id" => "3", "created_at" =>  Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-17 07:55:45'), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-17 12:20:35')->toDateTimeString()],
            ["timein" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-18 10:05:24')->toDateTimeString(),"timeout" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-18 17:45:28')->toDateTimeString(),"locationin" => "CCI","locationout" => "COE", "vehicle_id" => "1", "staff_id" => "3", "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-18 10:05:24')->toDateTimeString(), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-18 17:45:28')->toDateTimeString()],
            
            ["timein" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-04 08:59:12')->toDateTimeString(),"timeout" => NULL, "locationin" => "CES","locationout" => NULL, "vehicle_id" => "2", "staff_id" => "4", "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-04 08:59:12')->toDateTimeString(), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-04 08:59:12')->toDateTimeString()],
            ["timein" => NULL,"timeout" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-05 14:45:30')->toDateTimeString(),"locationin" => NULL,"locationout" => "CCI", "vehicle_id" => "2", "staff_id" => "4", "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-05 14:45:30')->toDateTimeString(), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-05 14:45:30')->toDateTimeString()],
            ["timein" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-06 07:55:45')->toDateTimeString(),"timeout" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-06 12:20:35')->toDateTimeString(), "locationin" => "CES","locationout" => "CCI", "vehicle_id" => "2", "staff_id" => "4", "created_at" =>  Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-06 07:55:45'), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-06 12:20:35')->toDateTimeString()],
            ["timein" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-07 10:05:24')->toDateTimeString(),"timeout" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-07 17:45:28')->toDateTimeString(),"locationin" => "COE","locationout" => "CES", "vehicle_id" => "2", "staff_id" => "4", "created_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-07 10:05:24')->toDateTimeString(), "updated_at" => Carbon::createFromFormat('Y-m-d H:i:s', '2020-06-07 17:45:28')->toDateTimeString()],
        ]);
    }
}
