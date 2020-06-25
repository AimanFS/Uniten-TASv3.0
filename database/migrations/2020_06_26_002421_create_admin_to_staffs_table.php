<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminToStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('staffs')->insert(
            array(
                "name" => "CCI Admin", 
                "username" => "admincci", 
                "email" => "cci@admin.com", 
                "password" => Hash::make('14253678'), 
                "phoneno" => "0100000000", 
                "is_admin" => "1", 
                "avatar" => "admindefault.png", 
                "created_at" => now(), 
                "updated_at" => now(), 
                "department_id" => "1",
            )
            );

        DB::table('staffs')->insert(
            array(
                "name" => "COE Admin", 
                "username" => "admincoe", 
                "email" => "coe@admin.com", 
                "password" => Hash::make('41526387'), 
                "phoneno" => "0111111111", 
                "is_admin" => "1", 
                "avatar" => "admindefault.png", 
                "created_at" => now(), 
                "updated_at" => now(), 
                "department_id" => "2",
            )
            );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_to_staffs');
    }
}
