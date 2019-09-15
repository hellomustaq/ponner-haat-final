<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Manufacture;
use App\SubCategory;
use App\MotherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class WelcomeController extends Controller
{
    public function subCategory($id){
        $subCategory=SubCategory::find($id);
    	$products = Product::where('sub_category_id',$id)->orderBy('created_at', 'desc')->get();
        $brands=Manufacture::where('sub_category_id',$id)->get();
    	return view('shop')->with([
            'products'=>$products,
            'subCategory' =>$subCategory,
            'cType' =>'Sub',
            'id' =>$id,
            'brands' =>$brands
        ]);
    }

    public function category($id){
        $category=Category::find($id);
    	$products = Product::where('category_id',$id)->orderBy('created_at', 'desc')->get();
        $brands=Manufacture::where('category_id',$id)->get();
    	return view('shop')->with([
            'products'=>$products,
            'category' =>$category,
            'cType' =>'Cat',
            'id' =>$id,
            'brands' =>$brands
        ]);
    }
    public function mCategory($id){
        $mCategory=MotherCategory::find($id);
    	$products = Product::where('mother_category_id',$id)->orderBy('created_at', 'desc')->get();
        $brands=Manufacture::where('mother_category_id',$id)->get();
    	return view('shop')->with([
            'products'=>$products,
            'mCategory' =>$mCategory,
            'cType' =>'Mother',
            'id' =>$id,
            'brands' =>$brands
        ]);
    }

    public function filter(Request $request){
        if ($request->cType=='Sub') {
            $subCategory=SubCategory::find($request->id);
            $products = Product::where('sub_category_id',$request->id)->whereBetween('price_per_unit', array($request->minP, $request->maxP))->orderBy('created_at', 'desc')->get();

            return view('shop')->with([
                'products'=>$products,
                'subCategory' =>$subCategory,
                'cType' =>'Sub',
                'id' =>$request->id,
            ]);
        }else if ($request->cType=='Cat') {
            $category=Category::find($request->id);
            $products = Product::where('category_id',$request->id)->whereBetween('price_per_unit', array($request->minP, $request->maxP))->orderBy('created_at', 'desc')->get();

            return view('shop')->with([
                'products'=>$products,
                'category' =>$category,
                'cType' =>'Cat',
                'id' =>$request->id,
            ]);
        }else{
            $mCategory=MotherCategory::find($request->id);
            $products = Product::where('mother_category_id',$request->id)->whereBetween('price_per_unit', array($request->minP, $request->maxP))->orderBy('created_at', 'desc')->get();

            return view('shop')->with([
                'products'=>$products,
                'mCategory' =>$mCategory,
                'cType' =>'Mother',
                'id' =>$request->id,
            ]);
        }
    }



    public function filterBrand($cType,$bid,$id){
        if ($cType=='Mother') {
            $mCategory=MotherCategory::find($id);
            $products = Product::where('manufactures_id',$bid)->orderBy('created_at', 'desc')->get();
            $brands=Manufacture::where('mother_category_id',$id)->get();

            return view('shop')->with([
                'products'=>$products,
                'mCategory' =>$mCategory,
                'cType' =>'Mother',
                'id' =>$id,
                'brands' =>$brands
            ]);
            
        }elseif($cType=='Cat'){
            $category=Category::find($id);
            $products = Product::where('manufactures_id',$bid)->orderBy('created_at', 'desc')->get();
            $brands=Manufacture::where('category_id',$id)->get();

            return view('shop')->with([
                'products'=>$products,
                'category' =>$category,
                'cType' =>'Cat',
                'id' =>$id,
                'brands' =>$brands
            ]);
        }elseif($cType=='Sub'){
            $subCategory=SubCategory::find($id);
            $products = Product::where('manufactures_id',$bid)->orderBy('created_at', 'desc')->get();
            $brands=Manufacture::where('sub_category_id',$id)->get();

            return view('shop')->with([
                'products'=>$products,
                'subCategory' =>$subCategory,
                'cType' =>'Sub',
                'id' =>$id,
                'brands' =>$brands
            ]);
        }
    }


    public function filterColor($cType,$id,$name){
        if ($cType=='Mother') {
            $mCategory=MotherCategory::find($id);
            $products =Product::where('mother_category_id',$id)
                                ->whereHas('colors', function ($query) use ($name) {
                                    $query->where('name', 'like', '%'.$name.'%');
                                    })
                                ->get();
            $brands=Manufacture::where('mother_category_id',$id)->get();

            return view('shop')->with([
                'products'=>$products,
                'mCategory' =>$mCategory,
                'cType' =>'Mother',
                'id' =>$id,
                'brands' =>$brands
            ]);
            
        }elseif($cType=='Cat'){
            $category=Category::find($id);
            $products = Product::where('category_id',$id)
                                ->whereHas('colors', function ($query) use ($name) {
                                    $query->where('name', 'like', '%'.$name.'%');
                                    })
                                ->get();
            $brands=Manufacture::where('category_id',$id)->get();

            return view('shop')->with([
                'products'=>$products,
                'category' =>$category,
                'cType' =>'Cat',
                'id' =>$id,
                'brands' =>$brands
            ]);
        }else{
            $subCategory=SubCategory::find($id);
            $products = Product::where('sub_category_id',$id)
                                ->whereHas('colors', function ($query) use ($name) {
                                    $query->where('name', 'like', '%'.$name.'%');
                                    })
                                ->get();
            $brands=Manufacture::where('sub_category_id',$id)->get();

            return view('shop')->with([
                'products'=>$products,
                'subCategory' =>$subCategory,
                'cType' =>'Sub',
                'id' =>$id,
                'brands' =>$brands
            ]);
        }
    }

    public function search(Request $request){
        $products=Product::where('id',$request->search)->orWhere('name', 'like', '%' . Input::get('search') . '%')->get();
        return view('searchResult')->with('products',$products);
    }
}
