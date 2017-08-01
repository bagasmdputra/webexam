<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AnswerOfQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('answers', function (Blueprint $table) {
           $table->integer('question_id')->unsigned();
           $table->foreign('question_id')->references('id')->on('question');

           $table->tinyInteger('answer')->nullable();
           $table->string('explanation')->nullable();
           $table->string('reference')->nullable();

       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('answers');
     }
}
