<?php

namespace App;

use App\Category;
use App\Product;
use App\Manufacture;
use App\SubCategory;
use Illuminate\Database\Eloquent\Model;

class MotherCategory extends Model
{
    protected $fillable=['name','active','note'];

    public function categories(){
    	return $this->hasMany('App\Category','mother_category_id');
    }

    public function subCategories(){
    	return $this->hasMany('App\SubCategory','mother_category_id');
    }

    public function manufacturers(){
    	return $this->hasMany('App\Manufacture','mother_category_id');
    }

    public function products(){
    	return $this->hasMany('App\Product','mother_category_id');
    }
}
