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
            $table->string('rejectionReason')->nullable();
            $table->string('approved')->nullable();
            $table->integer('pending')->unsigned();
            $table->date('endDate');
            $table->integer('created_by')->unsigned();
             $table->integer('department');
            $table->integer('approvedBy')->unsigned()->nullable();
            $table->foreign('pending')->references('id')->on('leave_request_statuses');
            $table->foreign('approvedBy')->references('id')->on('users');
            $table->foreign('staffId')->references('id')->on('staff');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('leave_days');
    }
}
