<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExamTakens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('exam_takens', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('user_id')->unsigned();
        $table->foreign('user_id')->references('id')->on('users');

        $table->integer('exam_id')->unsigned();
        $table->foreign('exam_id')->references('id')->on('examinations');

        $table->DateTime('taken_at');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_takens');
    }
}
