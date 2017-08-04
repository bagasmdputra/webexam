<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionOptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('question_options', function (Blueprint $table) {
        $table->integer('question_id')->unsigned();
        $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');;

        $table->tinyInteger('option_id');
        $table->string('option');

      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_options');
    }
}
