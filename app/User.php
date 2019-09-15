<?php

namespace App;

use App\Order;
use App\UserCoupon;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'gender',
        'address',
        'shipping_address',
        'city',
        'post_code',
        'country',
        'image',
        'note',
        'provider', 
        'provider_id',

        ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    public function orders(){
        return $this->hasMany('App\Order','user_id');
    }

    public function isAdmin(){
        if ($this->role_id==1) {
            return true;
        }else{
            return false;
        }
    }

    public function coupons(){
        return $this->belongsToMany(UserCoupon::class,'user_user_coupon','user_id','user_coupon_id')->withTimestamps();
    }
}
