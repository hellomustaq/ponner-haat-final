<?php

namespace App\Http\Controllers;

use App\ShippingMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShippingMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods=ShippingMethod::all();
        return view('admin.shipping_method.show')->with('methods',$methods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping_method.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $method=ShippingMethod::create([
            'name'=>$request->name,
            'cost'=>$request->cost,
        ]);
        if ($method) {
            Session::flash('success', 'Shipping method added!'); 
            return redirect()->route('shipping-method.index');
        }else{
            Session::flash('error', 'Somting went wrong!'); 
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingMethod $shippingMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method=ShippingMethod::find($id);
        return view('admin.shipping_method.edit')->with('method',$method);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShippingMethod $shippingMethod)
    {
        $method=ShippingMethod::find($request->id);
        $method->name=$request->name;
        $method->cost=$request->cost;

        $method->save();
        Session::flash('success', 'Shipping method Updated!'); 
        return redirect()->route('shipping-method.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShippingMethod  $shippingMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $method=ShippingMethod::find($id);
        $method->delete();

        Session::flash('success', 'Shipping method Deleted!'); 
        return redirect()->route('shipping-method.index');

    }
}
