<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
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
    CREATE TRIGGER exam_takens_after_insert
    AFTER INSERT
      ON exam_takens FOR EACH ROW

    BEGIN

      DECLARE done INT DEFAULT FALSE;
      DECLARE number INT DEFAULT 0;
      DECLARE question_id_cur INT;
      DECLARE exam_type INT;
      DECLARE cursor_question_id CURSOR FOR SELECT id FROM questions ORDER BY RAND() LIMIT 200;
      DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

      OPEN cursor_question_id;

      insert_question_to_opened_questions: LOOP

        FETCH cursor_question_id INTO question_id_cur;

        IF done THEN
          LEAVE insert_question_to_opened_questions;
        END IF;

        SET number = (number + 1);
        INSERT INTO on_opened_questions VALUES (new.id, question_id_cur, NULL, 0, 0, 0, 0, number);

      END LOOP insert_question_to_opened_questions;

      CLOSE cursor_question_id;

      SET exam_type = (SELECT exam_type_id FROM `examinations` WHERE id = new.exam_id);

      IF exam_type = 0 THEN
        INSERT INTO pmp_result VALUES (new.id, '0', '0');
      END IF;
    END;

    CREATE TRIGGER on_opened_questions_before_update
    BEFORE UPDATE
    ON on_opened_questions FOR EACH ROW

    BEGIN

      DECLARE true_answer INT DEFAULT 0;
      DECLARE isClosed BOOLEAN DEFAULT FALSE;

      SET isClosed = (SELECT (TIMEDIFF(NOW(), (SELECT closed_at FROM exam_takens WHERE id = new.exam_takens_id))) = '00:00:00');
      SET true_answer = (SELECT COUNT(question_id) FROM answers WHERE question_id = new.question_id AND answer = new.user_answer);

      IF isClosed THEN
        UPDATE exam_takens SET isClosed = TRUE WHERE id = new.exam_takens_id;
        SET new.user_answer = old.user_answer;
        SET new.isMarked = old.isMarked;
        set new.isAnswered = old.isAnswered;
        set new.time_taken = old.time_taken;
        set new.isTrue = old.isTrue;
      ELSE
        SET new.isTrue = true_answer;
      END IF;

    END;

    CREATE TRIGGER exam_takens_before_update
    BEFORE UPDATE
      ON exam_takens FOR EACH ROW
    BEGIN

      DECLARE count_true INT;
      DECLARE score FLOAT;

      IF new.isClosed = 1 THEN
        SET count_true = (SELECT COUNT(question_id) FROM on_opened_questions WHERE exam_takens_id	= new.id AND isTrue = 1);
        SET score_new = (count_true / 200);
        UPDATE pmp_result SET ,`total_true`=count_true,`score`=score_new WHERE `exam_takens_id`= new.id;
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
        DROP TRIGGER `exam_takens_after_insert`;
        DROP TRIGGER `on_opened_questions_before_update`;
        DROP TRIGGER `exam_takens_before_update`;
        DROP TRIGGER `examinations_before_update`;
        DROP TRIGGER `examinations_before_insert`;
        DROP TRIGGER `exam_takens_before_insert`;
     ');
  }
}
