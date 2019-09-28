<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Refer;
use Illuminate\Http\Request;
use App\Services\ProfitCalculation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function register(Request $request){


        $myreferrelUsers = ProfitCalculation::myreferrelUsers(User::find(31));

        $validator =Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'refer_number' => 'required',
            'phone' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $profileImageSaveAsName='';


        

        if ($request->hasFile('propic')) {
            $this->imageUpload($request);
        }
        
        $user =  User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'shipping_address' => $request->shippingAddress,
            'city' => $request->city,
            'country' => $request->country,
            'post_code' => $request->postalCode,
            'image' => $profileImageSaveAsName,
        ]);

        $referedFromUser = User::where('phone',$request->refer_number)->first();
        if (!is_null($referedFromUser)) {
            Refer::create([
                'user_id' => $user->id,
                'path' => ProfitCalculation::newUserReferralPath($user, $referedFromUser->referDetails),
            ]);
        }else{
            Refer::create([
                'user_id' => $user->id,
                'path' => 0,
            ]);
        }

        Auth::login($user);

        return redirect()->route('customer.account.index');

    } 

    private function imageUpload(Request $request) {
        $profileImage = $request->file('propic');
            $rules = array('profileImage' => 'mimes:png,gif,jpeg,jpg');
            $validator = Validator::make(array('profileImage'=> $profileImage), $rules);
            if($validator->passes()){
             $profileImageSaveAsName = str_random(15).'.'.$profileImage->getClientOriginalExtension();
             $upload_path = 'images/profile';
             $profileImage->move($upload_path, $profileImageSaveAsName);
         }
    } 
}
