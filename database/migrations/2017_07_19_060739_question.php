<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Question extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('question', function (Blueprint $table) {
          $table->increments('id');
          $table->string('question');
          $table->string('domain_id')->unsigned();

          $table->foreign('domain_id')->references('id')->on('domain');

          $table->string('knowledge_id')->unsigned();
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
