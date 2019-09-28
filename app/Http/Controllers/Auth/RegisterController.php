<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Refer;
use App\Classes\AppHelper;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/customer/account';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $request = request();
        $profileImageSaveAsName='';

        $referedFrom = User::where('phone',$data['refer_number'])->first();
        if ($referedFrom) {
            return redirect()->back();
        }else{
            return redirect()->back();
        }
        

        if ($request->hasFile('propic')) {
            $profileImage = $request->file('propic');
            $rules = array('profileImage' => 'mimes:png,gif,jpeg,jpg');
            $validator = Validator::make(array('profileImage'=> $profileImage), $rules);
            if($validator->passes()){
             $profileImageSaveAsName = str_random(15).'.'.$profileImage->getClientOriginalExtension();
             $upload_path = 'images/profile';
             $profileImage->move($upload_path, $profileImageSaveAsName);
         }
        }
        
        $user =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
            'address' => $data['address'],
            'shipping_address' => $data['shippingAddress'],
            'city' => $data['city'],
            'country' => $data['country'],
            'post_code' => $data['postalCode'],
            'image' => $profileImageSaveAsName,
        ]);

        $user['refer'] = $data['refer_number'];

        return $user;
    }   
}
