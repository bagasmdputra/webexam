<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationPackages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('examination_packages', function (Blueprint $table) {
        $table->integer('exam_id')->unsigned();
        $table->foreign('exam_id')->references('id')->on('examinations') ->onDelete('cascade');;

        $table->integer('pricing_id')->unsigned();
        $table->foreign('pricing_id')->references('id')->on('pricings') ->onDelete('cascade');;
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examination_packages');
    }
}
