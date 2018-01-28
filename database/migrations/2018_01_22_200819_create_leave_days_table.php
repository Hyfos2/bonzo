<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeaveDaysTable extends Migration
{
   
    public function up()
    {
        Schema::create('leave_days', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staffId')->unsigned();
            $table->integer('approvedBy')->unsigned();
            $table->integer('offDays');
            $table->dateTime('startDate');
            $table->dateTime('endDate');
            $table->foreign('staffId')->references('id')->on('staff');
            $table->foreign('approvedBy')->references('id')->on('users');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('leave_days');
    }
}
