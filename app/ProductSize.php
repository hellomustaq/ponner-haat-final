<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable=['name','product_id'];

    public function product(){
    	return $this->belongsTo(Product::class);
    }
}
