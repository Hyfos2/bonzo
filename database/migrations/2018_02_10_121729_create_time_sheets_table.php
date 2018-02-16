<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSheetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staffName')->unsigned();
            $table->integer('jobNumber')->unsigned();
            $table->string('leave');
            $table->string('surfaceOfOrdinary');
            $table->string('normalOvertime');
            $table->string('doubleOverTime');
            $table->string('standBy');
            $table->string('nightAllowance');
            $table->string('postalCode');
            $table->string('halfShift');
            $table->date('currentDate');
            $table->foreign('staffName')->references('id')->on('staff');
            $table->foreign('jobNumber')->references('id')->on('departments');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('time_sheets');
    }
}
