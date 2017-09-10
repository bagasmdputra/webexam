<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger2 extends Migration
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
       CREATE TRIGGER exam_takens_before_update
       BEFORE UPDATE
         ON exam_takens FOR EACH ROW
       BEGIN
   
         DECLARE count_true INT;
         DECLARE score_new FLOAT;
   
         IF new.isClosed = 1 THEN
           SET count_true = (SELECT COUNT(question_id) FROM on_opened_questions WHERE exam_takens_id = new.id AND isTrue = 1);
           SET score_new = (count_true / 200);
           UPDATE pmp_result SET `total_true`=count_true,`score`=score_new WHERE `exam_takens_id`= new.id;
         END IF;
       END;
   
       CREATE TRIGGER examinations_before_update
         BEFORE UPDATE
       ON examinations FOR EACH ROW
   
       BEGIN
   
         SET new.url_name = (SELECT LOWER(REPLACE(new.name, ' ', '_')));
   
       END;
   
       CREATE TRIGGER examinations_before_insert
         BEFORE INSERT
       ON examinations FOR EACH ROW
   
       BEGIN
   
         SET new.url_name = (SELECT LOWER(REPLACE(new.name, ' ', '_')));
   
       END;
   
       CREATE TRIGGER exam_takens_before_insert
         BEFORE INSERT
       ON exam_takens FOR EACH ROW
   
       BEGIN
         DECLARE is_on_exams BOOLEAN DEFAULT FALSE;
         DECLARE msg VARCHAR(100) DEFAULT '';
   
         SET is_on_exams = ((SELECT COUNT(id) FROM exam_takens WHERE user_id = new.user_id AND isClosed = 0) <> 0);
         SET new.taken_at = SELECT NOW();
         SET new.closed_at = SELECT DATE_ADD(NOW(), INTERVAL 3 HOUR));
         SET new.isClosed = 1;
         IF is_on_exams = TRUE THEN
           set msg = 'Error: You must have a finish other exam, before enter this one';
           signal sqlstate '45000' set message_text = msg;
         END IF;
       END;
   
       ");
    }
   
     /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       //
        DB::unprepared('
           DROP TRIGGER `exam_takens_before_update`;
           DROP TRIGGER `examinations_before_update`;
           DROP TRIGGER `examinations_before_insert`;
           DROP TRIGGER `exam_takens_before_insert`;
        ');
    }
   
}
