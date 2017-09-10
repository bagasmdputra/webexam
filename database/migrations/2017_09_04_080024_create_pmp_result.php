<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePmpResult extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pmp_result', function (Blueprint $table) {
            $table->integer('exam_takens_id')->unsigned();
            $table->foreign('exam_takens_id')->references('id')->on('exam_takens')->onDelete('cascade');
            $table->integer('total_true')->default(0);

            $table->float('score',3,2)->default(0.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pmp_result');
    }
}
