<?php

namespace App\Http\Controllers;

use App\User;
use App\Money_withdraw;
use Illuminate\Http\Request;

class UserProfitController extends Controller
{
    public function index(){

    	$date = \Carbon\Carbon::today()->subDays(7);

    	$transactions = Money_withdraw::latest()->get();
    	$last7days = $transactions->where('status','complete')->where('created_at', '>=', $date)->sum('amount');
    	return view('admin.payment.index',compact('transactions','last7days'));
    }

    public function users(){

    	$users = User::with('earnings','withdraws','referDetails')->get();
    	return view('admin.payment.users',compact('users'));
    }

    public function userDetails($id){
    	$user = User::with('earnings','withdraws')->find($id);
    	$earnings = $user->earnings;
    	return view('admin.payment.income-details',compact('user','earnings'));
    }
}
