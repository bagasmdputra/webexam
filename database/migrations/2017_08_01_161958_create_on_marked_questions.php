<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnMarkedQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('on_marked_questions', function (Blueprint $table) {
        $table->integer('onexam_id')->unsigned();
        $table->foreign('onexam_id')->references('id')->on('on_exams')->onDelete('cascade');;

        $table->DateTime('started_at');

        $table->integer('question_id')->unsigned();
        $table->foreign('question_id')->references('id')->on('questions') ->onDelete('cascade');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('on_marked_questions');
    }
}
