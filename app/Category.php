<?php

namespace App;

use App\Manufacture;
use App\Product;
use App\SubCategory;
use App\MotherCategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['name','mother_category_id','active','note'];

    public function motherCategory(){
    	return $this->belongsTo(MotherCategory::class);
    }

    public function subCategories(){
    	return $this->hasMany('App\SubCategory','category_id');
    }

    public function manufacturers(){
    	return $this->hasMany('App\Manufacture','category_id');
    }

    public function products(){
    	return $this->hasMany('App\Product','category_id');
    }
}
