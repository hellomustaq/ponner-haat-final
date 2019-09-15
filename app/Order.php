<?php

namespace App;

use App\User;
use App\OrderDetail;
use App\OrderStatus;
use App\ShippingMethod;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function user(){
    	return $this->belongsTo(User::class);
    }
    public function orderStatus(){
        return $this->hasOne(OrderStatus::class,'id','order_statuses_id');
    }

    public function orderShippingMethod(){
    	return $this->hasOne(ShippingMethod::class,'id','shipping_method');
    }


    public function orderDetails(){
    	return $this->hasMany(OrderDetail::class,'order_id');
    }
}
