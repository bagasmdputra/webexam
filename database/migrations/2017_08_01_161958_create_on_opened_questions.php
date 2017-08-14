<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnOpenedQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('on_opened_questions', function (Blueprint $table) {
        $table->integer('onexam_id')->unsigned();
        $table->foreign('onexam_id')->references('id')->on('on_exams')->onDelete('cascade');;

        $table->DateTime('started_at');

        $table->integer('question_id')->unsigned();
        $table->foreign('question_id')->references('id')->on('questions') ->onDelete('cascade');

        $table->tinyInteger('user_answer')->nullable();
        $table->boolean('isMarked')->default(0);
        $table->decimal('time_taken', 5, 2)->default(0);


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
        Schema::dropIfExists('on_answered_questions');
        Schema::dropIfExists('on_opened_questions');
    }
}
