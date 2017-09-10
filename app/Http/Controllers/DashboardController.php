<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Examination;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use DB;

class DashboardController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $user_id = Auth::id();        
      $result = DB::table('pmp_result')
                    ->leftJoin('exam_takens','exam_takens.id', '=', 'pmp_result.exam_takens_id')
                    ->where('exam_takens.user_id', '=', $user_id)
                    ->get();
      session(['history' => $result]);

        $free = Examination::where('type', 0)->get();
        $paid = Examination::where('type', 1)->get();
        return view('pages.dashboard')->with('history', $result);
    }
}
