<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Quotation;
use Illuminate\Support\Facades\Auth;

class ResultController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // public getResult($id){
    //     $result = Result::where('user_id','=', $id)-->get();
    //     return $result;
    // }

    public function cekExamUser($examid){
      $id = Auth::id();
      $exam = DB::table('exam_takens')->whereColumn([
         ['user_id', '=', $id],
         ['id', '=', $examid],
      ])->get();
      if($exam = 1 ){
        return true;
      }
      return false;
    }

    public function getResult($examid){
      $cek = $this->cekExamUser($examid);
      if ($cek){
        $result =
        DB::table('results')
            ->leftJoin('answers', 'results.question_id', '=', 'answers.question_id')
            ->leftJoin('questions', 'results.question_id', '=', 'questions.id')
            ->where('exam_taken_id', $examid)
            ->get();
        return view('pages/result', ['result' => $result]);
      }
      return view('pages/result');
    }

    // array('question' => $result->question, 'isTrue' => $result->isTrue, 'user_answer' => $result->user_answer, 'answer' => $result->answer, 'explanation' => $result->explanation, 'reference' => $result->reference)

    // public lastResult(){
    //   $result = getResult();
    //   end($result);
    //   $key = key($result);
    //   $last = $result[$key];
    //   return view('pages/result', array())
    // }



    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $result =
      DB::table('results')
          ->leftJoin('answers', 'question_id', '=', 'answers.question_id')
          ->leftJoin('questions', 'question_id', '=', 'questions.id')
          ->where('exam_taken_id', 1)
          ->get();
      return view('pages/result', $result);
    }
}
