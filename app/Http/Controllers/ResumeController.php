<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Examination;
use App\Http\Requests;


class ResumeController extends Controller
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
        // $free = Examination::where('type', 0)->get();
        // $paid = Examination::where('type', 1)->get();
        return view('pages/resume');
    }
}
