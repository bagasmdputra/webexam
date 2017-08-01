<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('exam_questions', function (Blueprint $table) {
        $table->integer('exam_id')->unsigned();
        $table->foreign('exam_id')->references('id')->on('examinations') ->onDelete('cascade');;

        $table->integer('question_id')->unsigned();
        $table->foreign('question_id')->references('id')->on('questions') ->onDelete('cascade');;
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('exam_questions');
    }
}
