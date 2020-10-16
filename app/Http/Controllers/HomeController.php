<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->midd leware('auth','verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function contact_us(Request $request)
    {
      $name=$request->form_name;
      $email=$request->email;
      $message=$request->form_message;

        Mail::send('emails.form_submit', ['name' => $name,'messages'=>$message, 'email'=>$email], function ($m) {
            $m->replyTo('admin@honeybeerecruiting.com.au');
            $m->from('mail@honeybeetech.com.au', 'Honey Bee');
            $m->to('indradeep.mazumdar@gmail.com', 'Indy')->subject('Contact Us form submission');
        });
        // return 1;
    }
}
