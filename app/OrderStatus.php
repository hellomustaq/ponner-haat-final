<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $guarded = [];

    public function orders(){
    	return $this->hasMany(Order::class,'order_statuses_id');
    }
}
