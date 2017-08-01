<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnAnsweredQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('on_answered_questions', function (Blueprint $table) {
        $table->integer('onexam_id')->unsigned();
        $table->foreign('onexam_id')->references('id')->on('on_exams')->onDelete('cascade');;

        $table->integer('question_id')->unsigned();
        $table->foreign('question_id')->references('id')->on('questions') ->onDelete('cascade');

        $table->tinyInteger('answer');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('on_answered_questions');
    }
}
