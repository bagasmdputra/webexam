<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserResultPerDomain extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_result_per_domain', function (Blueprint $table) {
          $table->integer('exam_takens_id')->unsigned();
          $table->foreign('exam_takens_id')->references('id')->on('exam_takens');

          $table->integer('initiation_score')->unsigned()->default(0);
          $table->string('initiation')->nullable();
          $table->integer('planning_score')->unsigned()->default(0);
          $table->string('planning')->nullable();
          $table->integer('excecuting_score')->unsigned()->default(0);
          $table->string('excecuting')->nullable();
          $table->integer('monitoring_and_controlling_score')->unsigned()->default(0);
          $table->string('monitoring_and_controlling')->nullable();
          $table->integer('closing_score')->unsigned()->default(0);
          $table->string('closing')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_result_per_domain');
    }
}
