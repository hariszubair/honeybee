<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Rules\Captcha;
use Mail;
use Jenssegers\Agent\Agent;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;
    protected $redirectTo = '/profile';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users', 'confirmed'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role_id' => ['required'],
            'phone_number' => ['required'],
            'g-recaptcha-response'=>new Captcha(),

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $agent = new Agent();
            if($agent->isMobile()){
                $device='Mobile';
            }
            elseif($agent->isTablet()){
                $device='Tablet';
            }
            else{
                $device='Desktop';
            }
        $user=User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone_number'=>$data['phone_number'],
            'device'=>$device,
        ]);
        if($data['role_id']=='3'){
            $role='Client';
            $user->assignRole('Client');
        }
        else if($data['role_id']=='4'){
            $role='Candidate';
            $user->assignRole('Candidate');
        }
          Mail::send('emails.new_registration', ['name' => $data['name'],'role'=>$role, 'email'=>$data['email']], function ($m) {
            $m->replyTo('admin@honeybeerecruiting.com.au');
            $m->from('mail@honeybeetech.com.au', 'Honey Bee');
            $m->to('indradeep.mazumdar@gmail.com', 'Indy')->subject('Registration done');
        });
        return $user;
    }
}
