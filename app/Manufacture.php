<?php

namespace App;

use App\Product;
use App\Manufacture;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class Manufacture extends Model
{
    protected $fillable=['name','mother_category_id','category_id','sub_category_id','active','note'];
    
    public function subCategory(){
    	return $this->belongsTo('App\SubCategory');
    }

    public function products(){
    	return $this->hasMany('App\Product','manufactures_id');
    }
}
