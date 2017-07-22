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
       $exam_question = DB::table('answer')
                 ->join('question', 'question.id', '=', 'answer.question_id')
                 ->join('exam_question', 'exam_question.question_id', '=', 'question.id')
                 ->select('exam_question.id as id_question', 'question.question as question', 'answer.answer as answer')
                 ->orderBy('id_question', 'asc')
                 ->get();

       return view('pages/exam', ['exam_question' => $exam_question]);
     }
}
