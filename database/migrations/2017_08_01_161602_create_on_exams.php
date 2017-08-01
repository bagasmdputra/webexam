<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOnExams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('on_exams', function (Blueprint $table) {
        $table->increments('id');

        $table->integer('user_id')
        ->unsigned();
        $table->foreign('user_id')
        ->references('id')
        ->on('users')
        ->onDelete('cascade');

        $table->DateTime('started_at');

        $table->integer('exam_id')
        ->unsigned();
        $table->foreign('exam_id')
        ->references('id')
        ->on('examinations')
        ->onDelete('cascade');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('on_exams');
    }
}
