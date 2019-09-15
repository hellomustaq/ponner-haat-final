<?php

namespace App\Http\Controllers;

use App\UserCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $couponDub=UserCoupon::where('coupon_code','UC'.$request->coupon_code_uc)->count();
        // print_r($couponDub);die();

        if ($couponDub>0) {
            Session::flash('errors', 'Coupon Duplication!! Try to give unique Coupon code!'); 
            return redirect()->back();
        }
        $validator =Validator::make($request->all(), [
            'coupon_code_uc' => 'required|max:6',
            'discount_uc' => 'required',
            'max_uses_user_uc' => 'required',
            'start_date_uc' => 'date_format:"Y-m-d h:i:s"|required',
            'end_date_uc' => 'date_format:"Y-m-d h:i:s"|required',
            'users' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('errors', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator);
        }

        $ucoupon=UserCoupon::create([
            'coupon_code' =>'UC'.$request->coupon_code_uc,
            'discount' =>$request->discount_uc,
            'max_uses_user' =>$request->max_uses_user_uc,
            'start_date' =>$request->start_date_uc,
            'end_date' =>$request->end_date_uc,
            'active' =>true,
        ]);

        foreach ($request->users as $key => $user) {
            $coupon = UserCoupon::find($ucoupon->id);
            $coupon->users()->attach($user);
        }
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserCoupon  $userCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(UserCoupon $userCoupon)
    {
        //
    }

    public function up($id){
        $ucoupon=UserCoupon::find($id);
        $ucoupon->active=0;
        $ucoupon->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserCoupon  $userCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(UserCoupon $userCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserCoupon  $userCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserCoupon $userCoupon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserCoupon  $userCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserCoupon $userCoupon)
    {
        //
    }
}
