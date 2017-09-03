<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Model\ContactUS;
use Mail;

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
    public function getContact()
    {
        return view('pages/contact');
    }
    public function postContact(Request $request)
     {
         $this->validate($request, [
          'name' => 'required',
          'email' => 'required|email',
          'message' => 'required'
          ]);

         ContactUS::create($request->all());
         $emailfrom = $request->get('email');
         $namefrom = $request->get('name');
         Mail::send('emails.contact',
             array(
                 'name' => $request->get('name'),
                 'email' => $request->get('email'),
                 'user_message' => $request->get('message')
             ), function($message) use ($emailfrom, $namefrom)
                 {
                     $message->from($emailfrom);
                     $message->to('bagasmdputra@gmail.com', 'Admin')->subject('Webexam feedback from '.$namefrom);
                 }
               );


         return back()->with('success', 'Thanks for contacting us!');
     }
}
