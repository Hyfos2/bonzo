<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTimeSheetFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_sheet_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('staffName')->unsigned();
            $table->integer('department')->unsigned();
            $table->string('fileName');
            $table->string('filePath');
            $table->foreign('staffName')->references('id')->on('staff');
            $table->foreign('department')->references('id')->on('departments');
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
        Schema::dropIfExists('time_sheet_files');
    }
}
