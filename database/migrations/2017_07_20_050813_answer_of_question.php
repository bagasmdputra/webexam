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
       Schema::create('answer', function (Blueprint $table) {
           $table->increments('id')->unsigned();

           $table->integer('question_id')->unsigned();
           $table->foreign('question_id')->references('id')->on('question');

           $table->string('answer')->nullable();
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
         Schema::dropIfExists('answer');
     }
}
