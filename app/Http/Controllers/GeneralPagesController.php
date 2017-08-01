<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralPagesController extends Controller
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
    public function about()
    {
        return view('pages/about');
    }
    public function contact()
    {
        return view('pages/contact');
    }
}
