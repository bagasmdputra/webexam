<?php

namespace App\Http\Controllers;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Requests;

class CobaController extends Controller
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
        $exam_question = DB::table('exam_question')
                  ->join('question', 'exam_question.question_id', '=', 'question.id')
                  ->select('exam_question.id', 'question.question')
                  ->orderBy('exam_question.id', 'asc')
                  ->get();

        $count = $exam_question->count();

        return view('pages/coba', ['exam_question' => $exam_question]);
    }
}
