<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
use App\config\app;
use App\SelectedCandidates;
class StripePaymentController extends Controller
{
	/**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay()
    {   
        if(Auth::user()->unconfirmed_selected_candidates->count() > 10){
            return redirect()->back();
          }
        
       $user=UserInfo::where('user_id',Auth::id())->first();
        return view('stripe',compact('user'));
    }
  
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
       $strip_sk=config('stripe.sk');
    		$user=User::where('id',Auth::id())->with('unconfirmed_selected_candidates')->first();
    	if ($user->unconfirmed_selected_candidates->count() <= 5){
    		$membership=1;
    		$amount=200;
    	}
    	elseif ($user->unconfirmed_selected_candidates->count() <= 10){
    		$membership=2;
    		$amount=300;
    	}
    	
        $amount=1;
    	$description=$user->name.'('.$user->email.') paid $'.$amount.'.';
        Stripe\Stripe::setApiKey($strip_sk);
        Stripe\Charge::create ([
                "amount" => $amount *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $description 
        ]);
        SelectedCandidates::where('client_id',Auth::id())->where('confirmed','=', null)->update(['confirmed'=>date('Y-m-d h:i:s')]);
         // UserInfo::where('user_id',Auth::id())->update(['membership'=>'0']);
  		

        Session::flash('success', 'Payment successful!');
          
        return redirect('/selected_candidates');
    }
}
