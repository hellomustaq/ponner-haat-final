<?php

namespace App;

use App\User;
use App\CouponUser;
use Illuminate\Database\Eloquent\Model;

class UserCoupon extends Model
{
	protected $guarded=[];
   public function users()
   {
        return $this->belongsToMany(User::class,'user_user_coupon','user_coupon_id','user_id')->withTimestamps();
   }
}
