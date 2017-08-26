<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainTestExam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('domain_test_exam', function (Blueprint $table) {
          $table->increments('id')->unsigned();
          $table->string('initiation');
          $table->string('planning');
          $table->string('excecuting');
          $table->string('monitoring_and_controlling');
          $table->string('closing');
          $table->boolean('isSuccess');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('domain_test_exam');
    }
}
