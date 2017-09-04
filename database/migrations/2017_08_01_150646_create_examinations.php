<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('examinations', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->string('name',30);
          $table->string('url_name');
          $table->integer('exam_type_id')->unsigned();
          $table->foreign('exam_type_id')->references('id')->on('exam_type')->onDelete('cascade');
          $table->smallInteger('type')->default(0);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinations');
    }
}
