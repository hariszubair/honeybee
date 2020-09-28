<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Stripe;
use Illuminate\Support\Facades\Auth;
use App\UserInfo;
class StripePaymentController extends Controller
{
	/**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function pay()
    {
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
    		$user=Auth::user();
    	if ($request->membership == 1){
    		$membership=1;
    		$amount=200;
    	}
    	elseif ($request->membership == 2){
    		$membership=2;
    		$amount=300;
    	}
    	elseif ($request->membership == 3){
    		$membership=2;
    		$amount=100;	
    	}
    	$description=$user->name.'('.$user->email.') paid $'.$amount.'.';
        Stripe\Stripe::setApiKey('sk_test_51HUvHvCC6RL731HnadDHgSEWYy0nUFNDLJ93Abv4TyG7CcEl10vGBBGnbIqyoJ83brQqEpExLkg7oeBVUNr5qZlu00nxhmTGub');
        Stripe\Charge::create ([
                "amount" => $amount *100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => $description 
        ]);
  		UserInfo::where('user_id','=',$user->id)->update(['membership'=>$membership]);
        Session::flash('success', 'Payment successful!');
          
        return redirect('/candidate_search_view');
    }
}
