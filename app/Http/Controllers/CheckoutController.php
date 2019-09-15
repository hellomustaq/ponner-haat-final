<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use App\User;
use App\Order;
use Carbon\Carbon;
use App\UserCoupon;
use App\OrderDetail;
use App\ShippingMethod;
use App\IndependentCoupon;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Validator;

class CheckoutController extends Controller
{
    public function index(){
    	$login=0;
    	return view('user.checkout1')->with([
    		'login'=>$login,
    	]);
    }


    public function coupon(Request $request){

    	$firstTwoCharacters = substr(strtoupper($request->coupon), 0, 2);
    	if ($firstTwoCharacters=='IC') {

    		$findCoupon=IndependentCoupon::where('coupon_code',strtoupper($request->coupon))->where('start_date','<',Carbon::now()->toDateTimeString())->where('end_date','>',Carbon::now()->toDateTimeString())->where('active',1)->first();
    		if ($findCoupon) {
    			return response()->json(['accept' => true,'row'=>$findCoupon]);
    		}else{
    			return response()->json(['accept' => false]);
    		}

    		
    	}elseif($firstTwoCharacters=='UC'){
    		$user=User::find(Auth::user()->id);
    		$t=$user->coupons->whereIn('coupon_code',$request->coupon)->count();
    		if ($t>0) {
	    		$alreadyUseOrNot=Order::where('user_id',Auth::user()->id)->where('coupon_code',$request->coupon)->count();
	    		$findCoupon=UserCoupon::where('coupon_code',strtoupper($request->coupon))->where('start_date','<',Carbon::now()->toDateTimeString())->where('end_date','>',Carbon::now()->toDateTimeString())->where('active',1)->where('max_uses_user','>',$alreadyUseOrNot)->first();
	    		if ($findCoupon) {
	    			return response()->json(['accept' => true,'row'=>$findCoupon]);
	    		}else{
	    			return response()->json(['accept' => false]);
	    		}
    		}else{
    			return response()->json(['accept' => false]);
    		}
    		
    	}

    }



    public function shipping($id){
    	$method=ShippingMethod::findOrFail($id);
    	if ($method) {
    			return response()->json(['cost' => $method->cost,'name'=>$method->name]);
    		}else{
    			return response()->json(['cost' => 0]);
    		}
    }




    public function doLogin()
		{
		// validate the info, create rules for the inputs
			$rules = array(
			    'email'    => 'required|email', // make sure the email is an actual email
			    'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
			);

			// run the validation rules on the inputs from the form
			$validator = Validator::make(Input::all(), $rules);

			// if the validator fails, redirect back to the form
			if ($validator->fails()) {
			    return Redirect::to('login')
			        ->withErrors($validator) // send back all errors to the login form
			        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
			} else {

			    // create our user data for the authentication
			    $userdata = array(
			        'email'     => Input::get('email'),
			        'password'  => Input::get('password')
			    );

			    // attempt to do the login
			    if (Auth::attempt($userdata)) {

			        // validation successful!
			        // redirect them to the secure section or whatever
			        // return Redirect::to('secure');
			        // for now we'll just echo success (even though echoing in a controller is bad)
			        $login=1;

			    	return view('user.checkout1')->with([
			    		'login'=>$login,
			    	]);
			        //return redirect()->back()->with('login',$login);

			    } else {        

			        // validation not successful, send back to form 
			        $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
			        return Redirect::back()->withErrors($errors)->withInput(Input::except('password'));
			        //return Redirect::to('login');

			    }

			}
		}

	public function orderOrReg(Request $request){
		// print_r($request->total_after_shipping);die();
		
		if (isset($request->password)) {
			
			$validator =Validator::make($request->all(), [
	            'name' => 'required',
	            'email' => 'required|email|unique:users',
	            'phone'=>'required|max:15',
	            'gender'=>'required',
	            'address'=>'required',
	            'shipping_address'=>'required',
	            'city'=>'required',
	            'postal_code'=>'required',
	            'password' => 'confirmed|min:6',
	        ]);

	        if ($validator->fails()) {
	            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
	            return redirect()->back()->withErrors($validator);
	        }

	        $user=User::create([
	        	'name' =>$request->name,
	        	'email' =>$request->email,
	        	'phone' =>$request->phone,
	        	'gender' =>$request->gender,
	        	'password' => bcrypt($request->password),
	        	'address' =>$request->address,
	        	'shipping_address' =>$request->shipping_address,
	        	'city' =>$request->city,
	        	'post_code' =>$request->postal_code,
	        	'note'=>$request->note,
	        ]);
	        if ($user) {

	        	$order=Order::create([
	        		'user_id' =>$user->id,
	        		'shipping_address' =>$request->shipping_address,
	        		'phone'=>$request->phone,
	        		'altr_number' =>$request->altr_number,
	        		'shipping_method' =>$request->method,
	        		'payment_method' =>$request->payment_method,
	        		'coupon_code' =>$request->couponCode,
	        		'total' =>$request->total_after_vat,
	        		'total_after_coupon' => $request->total_after_discount,
	        		'total_after_shipping'=>$request->total_after_shipping,
	        		'note' =>$request->note,
	        		'order_tracking_number' => 'OTN'.str_random(6),
	        	]);

	        	foreach(Cart::content() as $index=> $product){

	        		if ($product->options->vat<=0) {

	        				$total_after_vat =$product->price*$product->qty;
        			}else{
        				$total_after_vat =$product->price-(($product->price*$product->options->vat)/100);
        			}
	        		$orderDetails=OrderDetail::create([
	        			'order_id' =>$order->id,
	        			'product_id' =>$product->id,
	        			'quantity' =>$product->qty,
	        			'total_after_discount' =>$tad=($product->price*$product->qty),
	        			'total_after_vat' => $total_after_vat*$product->qty,
	        			'size' =>$product->options->size,
	        			'color' =>$product->options->color,
	        		]);
	        	}

	        	




	        	$userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password')
		    	);

		    	// attempt to do the login
			    if (Auth::attempt($userdata)) {

			        // validation successful!
			        // redirect them to the secure section or whatever
			        // return Redirect::to('secure');
			        $login=1;
			        $reg=1;
			        Session::flash('success', 'Order successfully done! We will back to you soon!');
			        Cart::destroy();
			        alert()->success('We will run to as soon as possible!', 'Order successful')->persistent("Home");
			    	// return view('user.checkout')->with([
			    	// 	'login'=>$login,
			    	// 	'reg'=>$reg,
			    	// ]);
			    	return redirect()->route('home');

		        }else{
		        	Session::flash('error', 'Oops! Somthing wrong!!'); 
		        	return redirect()->back();

		        }

			}else{
				Session::flash('error', 'Oops! Somthing wrong!!'); 
			    return redirect()->back();
			}
		}else{

			$validator =Validator::make($request->all(), [
	            'name' => 'required',
	            'email' => 'required|email',
	            'phone'=>'required|max:15',
	            'shipping_address'=>'required',
	            'city'=>'required',
	            'postal_code'=>'required',
	        ]);

	        if ($validator->fails()) {
	            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
	            return redirect()->back()->withErrors($validator);
	        }

	        $order=Order::create([
        		'user_id' =>Auth::user()->id,
        		'shipping_address' =>$request->shipping_address,
        		'phone'=>$request->phone,
        		'altr_number' =>$request->altr_number,
        		'shipping_method' =>$request->method,
        		'payment_method' =>$request->payment_method,
        		'coupon_code' =>$request->couponCode,
        		'total' =>$request->total_after_vat,
        		'total_after_coupon' => $request->total_after_discount,
        		'total_after_shipping'=>$request->total_after_shipping,
        		'note' =>$request->note,
        		'order_tracking_number' => 'OTN'.str_random(6),
        	]);

        	foreach(Cart::content() as $index=> $product){

        		if ($product->options->vat<=0) {
        			$total_after_vat =$product->price*$product->qty;
    			}else{
    				$total_after_vat =$product->price-(($product->price*$product->options->vat)/100);
    			}
        		$orderDetails=OrderDetail::create([
        			'order_id' =>$order->id,
        			'product_id' =>$product->id,
        			'quantity' =>$product->qty,
        			'total_after_discount' =>$tad=($product->price*$product->qty),
        			'total_after_vat' => $total_after_vat*$product->qty,
        			'size' =>$product->options->size,
        			'color' =>$product->options->color,
        		]);
        	}

        	Session::flash('success', 'Order successfully done! We will back to you soon!'); 
        	alert()->success('We will run to as soon as possible!', 'Order successful')->persistent("Home");


        	$login=1;
			$reg=1;
			Cart::destroy();
			return redirect()->route('home');
	    	// return view('user.checkout1')->with([
	    	// 	'login'=>$login,
	    	// 	'reg'=>$reg,
	    	// ]);
		}
	}



	

}
