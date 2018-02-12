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
            $table->integer('daysTaken');
            $table->date('startDate');
            $table->string('reasonForRequest');
            $table->string('approved')->nullable();
            $table->date('endDate');
            $table->integer('created_by')->unsigned();
//          $table->integer('approvedBy')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');
//          $table->foreign('approvedBy')->references('id')->on('user');
            $table->foreign('staffId')->references('id')->on('staff');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('leave_days');
    }
}
