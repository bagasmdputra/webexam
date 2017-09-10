<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        DB::unprepared("  
        CREATE TRIGGER exam_takens_before_insert
          BEFORE INSERT
        ON exam_takens FOR EACH ROW
    
        BEGIN
          DECLARE is_on_exams BOOLEAN DEFAULT FALSE;
          DECLARE msg VARCHAR(100) DEFAULT '';
    
          SET is_on_exams = ((SELECT COUNT(id) FROM exam_takens WHERE user_id = new.user_id AND isClosed = 0) <> 0);
          SET new.taken_at = (SELECT NOW());
          SET new.closed_at = (SELECT DATE_ADD(NOW(), INTERVAL 3 HOUR));
          IF is_on_exams = TRUE THEN
            set msg = 'Error: You must have a finish other exam, before enter this one';
            signal sqlstate '45000' set message_text = msg;
          END IF;
        END;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
