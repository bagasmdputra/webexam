<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('question', function (Blueprint $table) {
           $table->increments('id')->unsigned();
           $table->string('question');

           $table->integer('domain_id')->unsigned();
           $table->foreign('domain_id')->references('id')->on('domain');

           $table->integer('knowledge_id')->unsigned();
           $table->foreign('knowledge_id')->references('id')->on('knowledge_area');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::dropIfExists('question');
     }
}
