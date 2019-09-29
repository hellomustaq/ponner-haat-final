<?php

namespace App;

use App\Order;
use Illuminate\Database\Eloquent\Model;

class UserProfit extends Model
{
    protected $guarded= ['id'];

    public function order(){
    	return $this->belongsTo(Order::class);
    }
}
