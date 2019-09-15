<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $guarded = [];

    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
