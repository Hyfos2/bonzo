<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLoyaltiesTable extends Migration
{
    
    public function up()
    {
        Schema::create('loyalties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('rate');
            $table->integer('numberOfYears');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('loyalties');
    }
}
