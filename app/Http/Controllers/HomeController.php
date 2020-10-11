<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth','verified');
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
            $m->from('notifications@honeybeetech.com.au', 'Honey Bee');

            $m->to('notifications@honeybeetech.com.au', 'Honey Bee')->subject('New Registration');
        });
    }
}
