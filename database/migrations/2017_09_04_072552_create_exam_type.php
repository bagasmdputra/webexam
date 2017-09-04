<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('exam_type', function(Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->string('name');
          $table->integer('sub_type_id')->nullable();
          $table->integer('sub_type_id')->references('id')->on('sub_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('exam_type');
    }
}
