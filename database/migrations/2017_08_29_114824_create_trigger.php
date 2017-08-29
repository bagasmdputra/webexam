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
      DECLARE question_id_cur INT;
      DECLARE cursor_question_id CURSOR FOR SELECT question_id FROM exam_questions WHERE exam_id = new.exam_id ORDER BY RAND();
      DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = TRUE;

      OPEN cursor_question_id;

      insert_question_to_opened_questions: LOOP

        FETCH cursor_question_id INTO question_id_cur;

        IF done THEN
          LEAVE insert_question_to_opened_questions;
        END IF;

        INSERT INTO on_opened_questions VALUES (new.id, question_id_cur, NULL, 0, 0, 0, 0);

      END LOOP insert_question_to_opened_questions;

      CLOSE cursor_question_id;

      INSERT INTO user_result_per_domain VALUES (new.id, 0, 'BP', 0, 'BP', 0, 'BP', 0, 'BP', 0, 'BP');

    END;

    CREATE TRIGGER on_opened_questions_before_update
    BEFORE UPDATE
    ON on_opened_questions FOR EACH ROW

    BEGIN

      DECLARE true_answer INT DEFAULT 0;
      DECLARE isClosed BOOLEAN DEFAULT FALSE;

      SET isClosed = (SELECT (TIMEDIFF(NOW(), (SELECT taken_at FROM exam_takens WHERE id = new.exam_takens_id))) > '3:00:00');
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

      DECLARE initiation_score INT DEFAULT 0;
      DECLARE planning_score INT DEFAULT 0;
      DECLARE excecuting_score INT DEFAULT 0;
      DECLARE monitoring_and_controlling_score INT DEFAULT 0;
      DECLARE closing_score INT DEFAULT 0;
      DECLARE initiation VARCHAR(191);
      DECLARE planning VARCHAR(191);
      DECLARE excecuting VARCHAR(191);
      DECLARE monitoring_and_controlling VARCHAR(191);
      DECLARE closing VARCHAR(191);
      DECLARE isPassed BOOLEAN DEFAULT FALSE;
      DECLARE isClosed BOOLEAN DEFAULT FALSE;

      SET initiation_score = (SELECT COUNT(t1.exam_takens_id) FROM on_opened_questions AS t1
                                JOIN questions AS t2 ON t1.question_id = t2.id
                                WHERE t2.domain_id = 1 AND t1.isTrue = TRUE);

      SET planning_score = (SELECT COUNT(t1.exam_takens_id) FROM on_opened_questions AS t1
                                JOIN questions AS t2 ON t1.question_id = t2.id
                                WHERE t2.domain_id = 2 AND t1.isTrue = TRUE);

      SET excecuting_score = (SELECT COUNT(t1.exam_takens_id) FROM on_opened_questions AS t1
                                JOIN questions AS t2 ON t1.question_id = t2.id
                                WHERE t2.domain_id = 3 AND t1.isTrue = TRUE);

      SET monitoring_and_controlling_score = (SELECT COUNT(t1.exam_takens_id) FROM on_opened_questions AS t1
                                JOIN questions AS t2 ON t1.question_id = t2.id
                                WHERE t2.domain_id = 4 AND t1.isTrue = TRUE);

      SET closing_score = (SELECT COUNT(t1.exam_takens_id) FROM on_opened_questions AS t1
                                JOIN questions AS t2 ON t1.question_id = t2.id
                                WHERE t2.domain_id = 5 AND t1.isTrue = TRUE);

      IF initiation_score <= 13 THEN
        SET initiation = 'BP';
      ELSEIF initiation_score > 13 AND initiation_score <= 18 THEN
        SET initiation = 'MP';
      ELSEIF initiation_score > 18 AND initiation_score <= 23 THEN
        SET initiation = 'P';
      END IF;

      IF planning_score <= 25 THEN
        SET planning = 'BP';
      ELSEIF planning_score > 25 AND planning_score <= 34 THEN
        SET planning = 'MP';
      ELSEIF planning_score > 34 AND planning_score <= 42 THEN
        SET planning = 'P';
      END IF;

      IF excecuting_score <= 32 THEN
        SET excecuting = 'BP';
      ELSEIF excecuting_score > 32 AND excecuting_score <= 43 THEN
        SET excecuting = 'MP';
      ELSEIF excecuting_score > 43 AND excecuting_score <= 54 THEN
        SET excecuting = 'P';
      END IF;

      IF monitoring_and_controlling_score <= 26 THEN
        SET monitoring_and_controlling = 'BP';
      ELSEIF monitoring_and_controlling_score > 26 AND monitoring_and_controlling_score <= 35 THEN
        SET monitoring_and_controlling = 'MP';
      ELSEIF monitoring_and_controlling_score > 35 AND monitoring_and_controlling_score <= 44 THEN
        SET monitoring_and_controlling = 'P';
      END IF;

      IF closing_score <= 7 THEN
        SET closing = 'BP';
      ELSEIF closing_score > 7 AND closing_score <= 10 THEN
        SET closing = 'MP';
      ELSEIF closing_score > 10 AND closing_score <= 12 THEN
        SET closing = 'P';
      END IF;

      UPDATE user_result_per_domain
      SET initiation_score = initiation_score, initiation = initiation,
      planning_score = planning_score, planning = planning,
      excecuting_score = excecuting_score, excecuting = excecuting,
      monitoring_and_controlling_score = monitoring_and_controlling_score, monitoring_and_controlling = monitoring_and_controlling,
      closing_score = closing_score, closing = closing
      WHERE exam_takens_id = new.id;

      IF new.isClosed = 1 THEN
        SET isPassed = (SELECT `isSuccess` FROM `domain_test_exam`
          WHERE `initiation` = initiation AND `planning` = planning AND `excecuting` = excecuting
          AND `monitoring_and_controlling` = monitoring_and_controlling AND `closing` = closing);
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
