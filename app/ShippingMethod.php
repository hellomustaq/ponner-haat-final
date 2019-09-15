<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    protected $guarded=[];

    public function orders(){
    	return $this->hasMany(Order::class,'shipping_method');
    }
}
