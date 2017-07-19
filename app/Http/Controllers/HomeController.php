<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;

use App\Pricing;

class HomeController extends Controller
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
<<<<<<< HEAD
         return view('welcome');
=======

         return view('pages/home');
>>>>>>> 5550d2b2fdad5b124ae763a84900caa77d6158a2
     }
}
