<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserInfo;
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
    		$user=User::where('id',Auth::id())->with('unconfirmed_selected_candidates')->first();
    	if ($user->unconfirmed_selected_candidates->count() <= 5){
    		$membership=1;
    		$amount=200;
    	}
    	elseif ($user->unconfirmed_selected_candidates->count() <= 10){
    		$membership=2;
    		$amount=300;
    	}
    	
    	$description=$user->name.'('.$user->email.') paid $'.$amount.'.';
        Stripe\Stripe::setApiKey('sk_test_51HUvHvCC6RL731HnadDHgSEWYy0nUFNDLJ93Abv4TyG7CcEl10vGBBGnbIqyoJ83brQqEpExLkg7oeBVUNr5qZlu00nxhmTGub');
        Stripe\Charge::create ([
                "amount" => $amount *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $description 
        ]);
        SelectedCandidates::where('client_id',Auth::id())->where('confirmed','=', null)->update(['confirmed'=>date('Y-m-d h:i:s')]);
         UserInfo::where('user_id',Auth::id())->update(['membership'=>'0']);
  		

        Session::flash('success', 'Payment successful!');
          
        return redirect('/candidate_search_view');
    }
}
