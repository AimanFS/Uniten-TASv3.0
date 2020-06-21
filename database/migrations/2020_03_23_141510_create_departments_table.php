<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        DB::table('departments')->insert(
            array(
                'name' => 'College of Computing and Informatics',
                'created_at' => now(),
                'updated_at' => now()
            )
            );

        DB::table('departments')->insert(
            array(
                'name' => 'College of Engineering',
                'created_at' => now(),
                'updated_at' => now()
            )
            );
        DB::table('departments')->insert(
            array(
                'name' => 'College of Business Management & Accounting',
                'created_at' => now(),
                'updated_at' => now()
            )
            );
        DB::table('departments')->insert(
            array(
                'name' => 'College of Energy Economics & Social Sciences',
                'created_at' => now(),
                'updated_at' => now()
            )
            );
        DB::table('departments')->insert(
            array(
                'name' => 'College of Graduate Studies',
                'created_at' => now(),
                'updated_at' => now()
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
        Schema::dropIfExists('departments');
    }
}
