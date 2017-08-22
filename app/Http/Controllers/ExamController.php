<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Model\On_opened_question;
use App\Http\Requests;

class ExamController extends Controller
{
  /**
  * Create a new controller instance.
  *
  * @return void
  */
  public function __construct()
  {
    // $this->middleware('auth');
  }

  /**
  * Show the application dashboard.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    $exam_question = DB::table('answers')
    ->join('questions', 'questions.id', '=', 'answers.question_id')
    ->join('exam_questions', 'exam_questions.question_id', '=', 'answers.question_id')
    ->select('exam_questions.question_id as id_question', 'questions.question as question', 'answers.answer as answer')
    ->orderBy('id_question', 'asc')
    ->get();

    return view('pages/exam', ['exam_question' => $exam_question]);
  }

  public function indexBackup() {
    $history_exam = DB::table('exam_takens')
      ->join('users', 'users.id', '=', 'exam_takens.user_id')
      ->join('examinations', 'examinations.id', '=', 'exam_takens.exam_id')
      ->select('examinations.name as name')
      ->where('users.id', '=', '1')
      ->get();

      return view('pages/exam', ['history_exam' => $history_exam]);
  }

  public function saveAnswer(Request $request) {
    if ($request->isMethod('post')){
      $exam_takens_id = $request->exam_takens_id;
      $question_id = $request->question_id;

      $on_opened_question = On_opened_question::where(['exam_takens_id' => $exam_takens_id, 'question_id' => $question_id]);

      if (isset($on_opened_question)) {
        return response()->json(['response' => 'This is get method']);
      } else {
        
      }
    }
  }
}
