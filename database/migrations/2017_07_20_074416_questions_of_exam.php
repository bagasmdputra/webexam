<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class QuestionsOfExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('exam_question', function (Blueprint $table) {
         $table->increments('id');
         $table->integer('question_id')->unsigned();
         $table->foreign('question_id')->references('id')->on('question');



       });

     }
}
