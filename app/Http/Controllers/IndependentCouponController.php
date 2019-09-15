<?php

namespace App\Http\Controllers;

use App\UserCoupon;
use App\IndependentCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class IndependentCouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icoupons=IndependentCoupon::all();
        $ucoupons=UserCoupon::all();
        return view('admin.promotion.show-all')->with('icoupons',$icoupons)->with('ucoupons',$ucoupons);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.promotion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $couponDub=IndependentCoupon::where('coupon_code','IC'.$request->coupon_code)->count();
        // print_r($couponDub);die();

        if ($couponDub>0) {
            Session::flash('errors', 'Coupon Duplication!! Try to give unique Coupon code!'); 
            return redirect()->back();
        }
        $validator =Validator::make($request->all(), [
            'coupon_code' => 'unique:independent_coupons|required|max:6',
            'discount' => 'required',
            'max_uses' => 'required',
            'max_uses_user' => 'required',
            'start_date' => 'date_format:"Y-m-d h:i:s"|required',
            'end_date' => 'date_format:"Y-m-d h:i:s"|required',
        ]);

        if ($validator->fails()) {
            Session::flash('errors', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator);
        }

        $icoupon=IndependentCoupon::create([
            'coupon_code' =>'IC'.$request->coupon_code,
            'discount' =>$request->discount,
            'max_uses' =>$request->max_uses,
            'max_uses_user' =>$request->max_uses_user,
            'start_date' =>$request->start_date,
            'end_date' =>$request->end_date,
            'active' =>true,
        ]);
        Session::flash('success', 'Independent Coupon Created!'); 
        return redirect()->route('icoupon.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\IndependentCoupon  $independentCoupon
     * @return \Illuminate\Http\Response
     */
    public function show(IndependentCoupon $independentCoupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\IndependentCoupon  $independentCoupon
     * @return \Illuminate\Http\Response
     */
    public function edit(IndependentCoupon $independentCoupon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\IndependentCoupon  $independentCoupon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IndependentCoupon $independentCoupon)
    {
        //
    }


    public function up($id){
        $icoupon=IndependentCoupon::find($id);
        $icoupon->active=0;
        $icoupon->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\IndependentCoupon  $independentCoupon
     * @return \Illuminate\Http\Response
     */
    public function destroy(IndependentCoupon $independentCoupon)
    {
        //
    }
}
