<?php

namespace App\Http\Controllers;

use App\Money_withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MoneyWithdrawController extends Controller
{
    public function store(Request $request){

    	$validator =Validator::make($request->all(), [
            'amount' => 'required | integer | min:500',
        ]);

        if ($validator->fails()) {
            alert()->error('Your input invalid', 'Oops!')->persistent("Got it !");
            return redirect()->back()->withErrors($validator)->withInput();
        }

    	$user = auth()->user();
    	$pendRequest = $user->withdraws->where('status','pending')->count();
    	if ($pendRequest > 0) {
    		alert()->error('You have already pending withdraw request!', 'Oops!')->persistent("Got it !");
    		return redirect()->back();
    	}

    	$earnings = $user->earnings->sum('amount');
    	$withdraws = $user->withdraws->where('status','complete')->sum('amount');
    	$avilable = $earnings - $withdraws;

    	if ($request->amount > $avilable) {
    		alert()->error('Insufficient balance', 'Oops!')->persistent("Got it !");
    		return redirect()->back();
    	}
    	Money_withdraw::create([
    		'user_id' => $user->id,
    		'amount' => $request->amount,
    	]);

    	alert()->success('Your withdrawal request is successfully done! we will prossed it within 7 working days!', 'Successfull!')->persistent("Got it !");
    	return redirect()->back();
    }

    public function changeStatus(Request $request,$id){
        Money_withdraw::find($id)->update(['status' => $request->transaction_status]);
        Session::flash('success', 'Transaction status updated!'); 
        return redirect()->back();
    }
}
