<?php

namespace App;

use App\Image;
use App\Category;
use App\Manufacture;
use App\OrderDetail;
use App\ProductSize;
use App\SubCategory;
use App\ProductColor;
use App\MotherCategory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function motherCategory(){
    	return $this->belongsTo(MotherCategory::class,'mother_category_id');
    }

    public function category(){
    	return $this->belongsTo(Category::class,'category_id');
    }

    public function subCategory(){
    	return $this->belongsTo(SubCategory::class,'sub_category_id');
    }

    public function manufacture(){
    	return $this->belongsTo(Manufacture::class,'manufactures_id');
    }

    public function images(){
        return $this->hasMany(Image::class,'product_id');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'product_id');
    }

    public function sizes(){
        return $this->hasMany(ProductSize::class,'product_id');
    }
    public function colors(){
        return $this->hasMany(ProductColor::class,'product_id');
    }
}
