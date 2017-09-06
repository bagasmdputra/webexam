<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeyExaminations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('examinations', function (Blueprint $table) {
            $table->integer('exam_type_id')->unsigned();
            $table->foreign('exam_type_id')->references('id')->on('exam_type')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('examinations', function (Blueprint $table) {
          $table->dropForeign(['exam_type_id']);
        });
    }
}
