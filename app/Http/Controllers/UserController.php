<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use App\Order;
use App\Classes\RawQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Services\ProfitCalculation;
use App\Http\Requests\UserStoreRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $user = auth()->user();
        $orders=$user->orders->sortByDesc('created_at');;
        $coupons=$user->coupons->sortByDesc('created_at');

        $earnings = $user->earnings->sum('amount');
        $withdraws = $user->withdraws->where('status','complete')->sum('amount');
        $available = $earnings - $withdraws;
        $pendingRequest = $user->withdraws->where('status','pending')->count();

        $usedCoupons=Order::where('user_id',$user->id)->whereNotNull('coupon_code')->get();
        return view('user.profile',compact('available','withdraws','pendingRequest','user','earnings'))->with('user',$user)->with('orders',$orders)->with('coupons',$coupons)->with('usedCoupons',$usedCoupons);
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
    public function store(UserStoreRequest $request)
    {
        
        $validator = $request->validated();
        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user=User::find($id);

        $profileImageSaveAsName=$user->image;
        

        if ($request->hasFile('image')) {
            $profileImage = $request->file('image');
            $rules = array('profileImage' => 'mimes:png,gif,jpeg,jpg');
            $validator = Validator::make(array('profileImage'=> $profileImage), $rules);
            if($validator->passes()){
                
             $profileImageSaveAsName = str_random(15).'.'.$profileImage->getClientOriginalExtension();
             $upload_path = 'images/profile';
             $profileImage->move($upload_path, $profileImageSaveAsName);
         }


        }
        
         User::find($id)->update([
            'email' => $request->email,
            'phone' => $request->phone,
            'alt_phone' =>$request->altr_phone,
            'address' => $request->address,
            'shipping_address' => $request->shipping_address,
            'city' => $request->city,
            'country' => $request->country,
            'post_code' => $request->postalCode,
            'image' => $profileImageSaveAsName,
            'country' =>'Bangladesh'
        ]);

        $earnings = $user->earnings->sum('amount');
        $withdraws = $user->withdraws->where('status','complete')->sum('amount');
        $available = $earnings - $withdraws;
        $pendingRequest = $user->withdraws->where('status','pending')->count();

        Session::flash('success', 'Your Details successfully updated!'); 
        $user=User::find(Auth::user()->id);
        $orders=$user->orders->sortByDesc('created_at');
        $usedCoupons=Order::where('user_id',$user->id)->whereNotNull('coupon_code')->get();
        return view('user.profile',compact('available','withdraws','pendingRequest','user','earnings'))->with('user',$user)->with('orders',$orders)->with('usedCoupons',$usedCoupons);
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function account(){
        $user=Auth::user()->id;
        return view('user.profile')->with('user',$user);
    }
    public function showAll(){
        $users=User::where('role_id',2)->get();
        return view('admin.users.index')->with('users',$users);
    }
}
