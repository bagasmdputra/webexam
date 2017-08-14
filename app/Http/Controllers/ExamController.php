<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

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
}
