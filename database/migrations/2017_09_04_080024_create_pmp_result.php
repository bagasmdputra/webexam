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
            $table->foreign('exam_takens_id')->reference('id')->on('exam_takens')->onDelete('cascade');
            $table->integer('score')->default(0);
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
