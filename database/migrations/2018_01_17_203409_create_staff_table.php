<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
   
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('employeeNumber')->unique();
            $table->date('dob');
            $table->string('salary');
            $table->date('dateOfEmployment');
            $table->integer('annualLeaveDays')->default(30);
            $table->integer('employmentTypeId')->unsigned();
            $table->integer('positionId')->unsigned();
            $table->string('loyalty');
            $table->integer('departmentId')->unsigned();
            $table->integer('gradeId')->unsigned();
            $table->foreign('employmentTypeId')->references('id')->on('employment_types');
            $table->foreign('gradeId')->references('id')->on('grades');
            $table->foreign('positionId')->references('id')->on('positions');
            $table->foreign('departmentId')->references('id')->on('departments');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('staff');
    }
}
