<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductSize;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{

    public function index()
    {
        return view('user.cart-details');
    }


    public function create()
    {
        //
    }

    public function add($id)
    {
        $product=Product::find($id);
        $sizes=ProductSize::where('product_id',$id)->pluck('name');
        $colors=$product->colors->pluck('name');

        $add=Cart::add([
            'id' => $product->id, 
            'name' => $product->name, 
            'qty' => 1, 
            'price' => $product->price_per_unit-(($product->price_per_unit*$product->discount)/100), 
            'options' => [
                'vat'=>$product->vat,
                'size' => '',
                'color' => ''
            ]
        ]);
        // Cart::destroy();
        return redirect()->back();
    }


    public function addWithSize(Request $request)
    {
    	$product=Product::find($request->id);
        if ($request->has('size')) {
            $sizes=$request->size;
        }else{
            $sizes=NULL;
        }
        if ($request->has('color')) {
            $colors=$request->color;
        }else{
            $colors=NULL;
        }
    	
    	
        $qty=$request->qty;


        $add=Cart::add([
        	'id' => $product->id, 
        	'name' => $product->name, 
        	'qty' => $qty, 
        	'price' => $product->price_per_unit-(($product->price_per_unit*$product->discount)/100), 
        	'options' => [
                'vat'=>$product->vat,
        		'size' => $sizes,
        		'color' => $colors
        	]
        ]);
        // Cart::destroy();
        return redirect()->back();
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function delete(Request $request){
        Cart::remove($request->rowId);
        return ['success' => true, 'message' => 'Delete successfull !!'];
    }

    public function qtyUpdate(Request $request){
        Cart::update($request->rowId, $request->qty);
        return ['success' => true, 'message' => 'Update successfull !!'];
    }


    public function destroy($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back();
         
    }
}
