<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
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

  public function saveAnswer(Request $request) {

      $this->validate($request, [
        'exam_takens_id' => 'required',
        'question_id' => 'required',
        'next_id' => 'required',
        'url_name' => 'required',
        'user_answer' => 'nullable',
        'isAnswered' => 'nullable',
        'isMarked' => 'nullable',
        'time_taken' => 'nullable',
      ]);

      $next_id = $request->next_id;
      $url_name = $request->url_name;
      $exam_takens_id = $request->exam_takens_id;
      $question_id = $request->question_id;
      $user_answer = $request->user_answer;
      $isAnswered = $request->isAnswered;
      $isMarked = $request->isMarked;
      $time_taken = $request->time_taken;

      $on_opened_question = On_opened_question::where('exam_takens_id', $exam_takens_id)
                                                ->where('question_id', $question_id)
                                                ->update(['user_answer' => $user_answer, 'isMarked' => $isMarked, 'time_taken' => $time_taken, 'isAnswered' => $isAnswered]);

      $next_url = 'exam/' . $url_name . '/' . $next_id;
      return redirect($next_url);
  }

  public function getHistory(Request $request) {
    $id = Auth::id();

    if ($request->isMethod('get')) {
      $history_exam = DB::table('exam_takens')->select()
      ->where('user_id', $id)
      ->get();

      return response()->json(['response' => $history_exam]);
    }
  }

  public function getQuest(Request $request, $url, $id) {
    $user_id = Auth::id();

    $quest_detail = DB::table('on_opened_questions')
    ->join('exam_takens', 'exam_takens.id', '=', 'on_opened_questions.exam_takens_id')
    ->join('examinations', 'examinations.id', '=', 'exam_takens.exam_id')
    ->join('questions', 'questions.id', '=', 'on_opened_questions.question_id')
    ->select( 'on_opened_questions.question_id as question_id')
    ->select( 'on_opened_questions.question_id as id_question', 'on_opened_questions.user_answer as user_answer',
              'on_opened_questions.isMarked as isMarked', 'on_opened_questions.isAnswered as isAnswered',
              'on_opened_questions.time_taken as time_taken', 'on_opened_questions.time_taken as time_taken',
              'examinations.name as name', 'exam_takens.taken_at as taken_at', 'exam_takens.id as exam_takens_id',
              'questions.question as question', 'examinations.url_name as url_name')
    // ->select('examinations.name as name', 'on_opened_questions.question_id as id_question', 'on_opened_questions.user_answer as user_answer',
    //           'on_opened_questions.isMarked as isMarked', 'on_opened_questions.isAnswered as isAnswered',
    //           'on_opened_questions.time_taken as time_taken', 'questions.question as question',
    //           'domains.domain as domain', 'exam_takens.id as exam_takens_id',
    //           'on_opened_questions.time_taken as time_taken', 'exam_takens.taken_at as taken_at')
    ->where('examinations.url_name', '=', $url)
    ->where('exam_takens.user_id', '=', 1)
    ->skip(($id - 1))
    ->take(1)
    ->get();

    $quest_option = DB::table('question_options')
    ->join('on_opened_questions', 'on_opened_questions.question_id', '=', 'question_options.question_id')
    ->select('question_options.option_id as option_number', 'question_options.option as option')
    ->where('on_opened_questions.question_id', '=', $id)
    ->limit(4)
    ->get();

    // return response()->json(['question' => $quest_detail, 'quest_option' => $quest_option]);
    return view('pages/questionblock', ['quest_detail' => $quest_detail, 'quest_option' => $quest_option]);
  }

  public function getExam(Request $request, $url) {
    $user_id = Auth::id();

    $exam_question = DB::table('on_opened_questions')
    ->join('exam_takens', 'exam_takens.id', '=', 'on_opened_questions.exam_takens_id')
    ->join('examinations', 'examinations.id', '=', 'exam_takens.exam_id')
    ->select('on_opened_questions.question_id as questions')
    ->where('examinations.url_name', '=', $url)
    ->where('exam_takens.user_id', '=', 1)
    ->get();

    return view('pages/exam', ['exam_question' => $exam_question]);
    // return response()->json(['questions' => $exam_question]);
  }
}
