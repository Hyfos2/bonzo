<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkingStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('working_staffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shiftHoursId')->unsigned();
            $table->integer('staffId')->unsigned();
            $table->foreign('staffId')->references('id')->on('staff');
            $table->foreign('shiftHoursId')->references('id')->on('shift_hours');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('working_staffs');
    }
}
