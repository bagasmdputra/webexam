<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResults extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('results', function (Blueprint $table) {
        $table->integer('exam_taken_id')->unsigned();
        $table->foreign('exam_taken_id')->references('id')->on('exam_takens');

        $table->integer('question_id')->unsigned();
        $table->foreign('question_id')->references('id')->on('questions');

        $table->boolean('isTrue');
        $table->tinyInteger('user_answer');
        $table->decimal('time_taken', 5, 2);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
