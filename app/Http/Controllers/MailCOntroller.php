<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\User;
use App\Mail\EmailVerification;
use App\Mail\PlainMail;

class MailCOntroller extends Controller
{
    public function send()
    {

      $user = User::find(10);

      $email = new EmailVerification($user);
      // $email = new PlainMail();
      Mail::to($user->email)
      ->send($email);
      echo $user->email_token;
      echo $user->email;
    //   Mail::raw($user->email, function ($message){
    //        $message->to('bagasmputra@gmail.com');
    //  });
    }
}
