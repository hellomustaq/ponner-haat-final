<?php

namespace App;

use App\Product;
use App\Category;
use App\Manufacture;
use App\MotherCategory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable=['name','mother_category_id','category_id','active','note'];

    public function motherCategory(){
        return $this->belongsTo('App\MotherCategory');
    }
    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function manufacturers(){
    	return $this->hasMany('App\Manufacture','sub_category_id');
    }

    public function products(){
    	return $this->hasMany('App\Product','sub_category_id');
    }
}
