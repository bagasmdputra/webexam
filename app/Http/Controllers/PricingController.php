<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class PricingController extends Controller
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
    $prices =   DB::table('pricings')
          ->get();
        return view('pages/pricing')->with('prices', $prices);
    }
}
