<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status=OrderStatus::all();
        return view('admin.order.status')->with('status',$status);
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
        $status=OrderStatus::create([
            'name' => $request->cname,
            'color' => $request->color,
        ]);

        if ($status) {
            Session::flash('success', 'Order Status successfully added!'); 
            return redirect()->back();
        }else {
            Session::flash('error', 'Oops! Somthing is wrong!! Try agian later!'); 
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function show(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderStatus $orderStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderStatus $orderStatus)
    {
        $status=OrderStatus::find($request->id);
        $status->name=$request->uname;
        $status->save();
        Session::flash('success', 'Order Status Updated'); 
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderStatus  $orderStatus
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderStatus $orderStatus)
    {
        
    }

    public function del($id){
        $status=OrderStatus::find($id);
        $status->delete();

        Session::flash('success', 'Order Status deleted'); 
        return redirect()->back();
    }

    public function delCheckAjax($id){
        $order=Order::where('order_statuses_id',$id)->count();
        if ($order>0) {
            return response()->json(['delete' => false]);
        }else{
            return response()->json(['delete' => true]);
        }
    }
}
