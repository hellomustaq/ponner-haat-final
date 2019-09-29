<?php

namespace App\Http\Controllers;

use File;
use App\Image;
use App\Product;
use App\Category;
use App\Manufacture;
use App\ProductSize;
use App\SubCategory;
use App\ProductColor;
use App\MotherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::orderBy('created_at', 'desc')->get();
        return view('admin.product.show-product')->with('products',$products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motherCategorys=MotherCategory::all();
        return view('admin.product.add-product')->with('motherCategorys',$motherCategorys);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'name' => 'required',
            'quantity' => 'required',
            'motherCategory' => 'required',
            'category' => 'required',
            'subCategory' => 'required',
            'price' => 'required | numeric',
            'purchasePrice' => 'required | numeric',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product=Product::create([
            'name' =>$request->name,
            'mother_category_id' =>$request->motherCategory,
            'category_id' =>$request->category,
            'sub_category_id' =>$request->subCategory,
            'manufactures_id' =>$request->manufacturer,
            'quantity' =>$request->quantity,
            'price_per_unit' =>$request->price,
            'purchase_price' =>$request->purchasePrice,
            'discount' =>$request->discount,
            'vat' =>$request->vat,
            'new'=>$request->new,
            'availability' =>$request->productAvailable,
            'details' =>$request->description,
            'specification' =>$request->specification,
            'warranty' =>$request->warrenty,
            'active'=>1,
        ]);


        $lastId = $product->id;

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            // Making counting of uploaded images
            $file_count = count($files);

            // start count how many uploaded
            $uploadcount = 0;

            foreach($files as $file) {
                $rules = array('file' => 'mimes:png,gif,jpeg,jpg');

                //'required|mimes:png,gif,jpeg,txt,pdf,doc'

                $validator = Validator::make(array('file'=> $file), $rules);

                if($validator->passes()){
                     $destinationPath = 'uploads';
                     $filenameExtension = $file->getClientOriginalExtension();
                     $fileSize=$file->getClientSize()/1024;
                     $fileSize=round($fileSize,2);
                     $modifiedImageName=str_random(20).'.'.$filenameExtension;
                    $file->move(public_path('images/product'),$modifiedImageName);
                     $uploadcount ++;
                     Image::create([
                        'product_id' => $lastId,
                        'name' => $modifiedImageName,
                        'size' =>$fileSize,
                        'type' =>$filenameExtension,
                     ]);

                 }
            }
        }

        $sizes=Input::get('size');
        $sizes=implode(',',$sizes);
        $sizes=explode(',', $sizes);
        
        $colors=Input::get('color');
        $colors=implode(',',$colors);
        $colors=explode(',', $colors);

        if (!empty($sizes)) {
            foreach ($sizes as $key => $size) {
                if ($size=="") {
                    
                }else{
                    ProductSize::insert([
                    'product_id' => $lastId,
                    'name' => $size
                    ]);
                }
                
            }
        }
        
        if (!empty($colors)) {
             foreach ($colors as $key => $color) {
                if ($color=="") {
                    
                }else{
                    ProductColor::insert([
                    'product_id' => $lastId,
                    'name' => $color
                    ]);
                }
                
            }
        }
        
        Session::flash('success', 'Product successfully added!'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        $motherCategorys=MotherCategory::all();
        $category_id_edit=$product->category_id;
        return view('admin.product.edit-product')->with('product',$product)->with('motherCategorys',$motherCategorys)->with('category_id_edit',$category_id_edit);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $validator =Validator::make($request->all(), [
            'name' => 'required',
            'quantity' => 'required',
            'motherCategory' => 'required',
            'category' => 'required',
            'subCategory' => 'required',
            'price' => 'required',
            'purchasePrice' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator);
        }

        $product=Product::find($request->id)->update([
            'name' =>$request->name,
            'mother_category_id' =>$request->motherCategory,
            'category_id' =>$request->category,
            'sub_category_id' =>$request->subCategory,
            'manufactures_id' =>$request->manufacturer,
            'quantity' =>$request->quantity,
            'price_per_unit' =>$request->price,
            'purchase_price' =>$request->purchasePrice,
            'discount' =>$request->discount,
            'vat' =>$request->vat,
            'active' =>1,
            'availability' =>$request->productAvailable,
            'new'=>$request->new,
            'details' =>$request->description,
            'specification' =>$request->specification,
            'warranty' =>$request->warrenty,
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);


        $lastId = $request->id;

        if ($request->hasFile('files')) {
            $files = $request->file('files');

            // Making counting of uploaded images
            $file_count = count($files);

            // start count how many uploaded
            $uploadcount = 0;

            foreach($files as $file) {
                $rules = array('file' => 'mimes:png,gif,jpeg,jpg');

                //'required|mimes:png,gif,jpeg,txt,pdf,doc'

                $validator = Validator::make(array('file'=> $file), $rules);

                if($validator->passes()){
                     $destinationPath = 'uploads';
                     $filenameExtension = $file->getClientOriginalExtension();
                     $fileSize=$file->getClientSize()/1024;
                     $fileSize=round($fileSize,2);
                     $modifiedImageName=str_random(20).'.'.$filenameExtension;
                    $file->move(public_path('images/product'),$modifiedImageName);
                     $uploadcount ++;
                     Image::insert([
                        'product_id' => $lastId,
                        'name' => $modifiedImageName,
                        'size' =>$fileSize,
                        'type' =>$filenameExtension,
                     ]);

                 }
            }
        }

        ProductSize::where('product_id',$request->id)->delete();
        ProductColor::where('product_id',$request->id)->delete();

        $sizes=Input::get('size');
        $sizes=implode(',',$sizes);
        $sizes=explode(',', $sizes);
        
        $colors=Input::get('color');
        $colors=implode(',',$colors);
        $colors=explode(',', $colors);

        if (!empty($sizes)) {
            foreach ($sizes as $key => $size) {
                if ($size=="") {
                    
                }else{
                    ProductSize::insert([
                    'product_id' => $lastId,
                    'name' => $size
                    ]);
                }
                
            }
        }
        
        if (!empty($colors)) {
             foreach ($colors as $key => $color) {
                if ($color=="") {
                    
                }else{
                    ProductColor::insert([
                    'product_id' => $lastId,
                    'name' => $color
                    ]);
                }
                
            }
        }
        
        Session::flash('success', 'Product successfully Updated!'); 
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }


    public function selectCategoryAjax(Request $request) {
        if ($request->ajax()) {
            return response()->json([
                'categories' => Category::where('mother_category_id', $request->id)->get()
            ]);
        }
    }
    public function selectsubCategoryAjax(Request $request) {
        if ($request->ajax()) {
            return response()->json([
                'subCategories' => SubCategory::where('category_id', $request->id)->get()
            ]);
        }
    }
    public function selectManufacturerAjax(Request $request) {
        if ($request->ajax()) {
            return response()->json([
                'manufacturers' => Manufacture::where('sub_category_id', $request->id)->get()
            ]);
        }
    }

    public function hot(Request $request){
        $count=Product::where('hot',1)->count();
        if ($count<6) {
            $addhot=Product::find($request->id)->update(['hot'=>true]);
            return response()->json(['id' => $request->id,'index'=>$request->index]);
        }else{
            $hotProduct=Product::where('hot',1)->orderBy('updated_at','ASC')->first();
            $hotProduct->update(['hot'=>false]);
            $addhot=Product::find($request->id)->update(['hot'=>true]);
            return response()->json(['id' => $request->id,'index'=>$request->index]);
        }
        
    }
    public function delHot(Request $request){

        $hotProduct=Product::find($request->id);
        $hotProduct->update(['hot'=>false]);
        return response()->json(['id' => $request->id,'index'=>$request->index]);
    }

    public function deleteHot($id){

        $hotProduct=Product::find($id);
        $hotProduct->update(['hot'=>false]);
        Session::flash('success', 'Product successfully Un Hoted!'); 
        return redirect()->back();
    }

    public function editDeleteImage(Request $request){
        $image=Image::find($request->id);
        $image_path = "images/product/".$image->name;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->delete();
        return redirect()->back();
    }

    public function deactive($id){
        $product=Product::find($id);
        $product->update(['active'=>false]);
        Session::flash('success', 'Product successfully Deactiveted!'); 
        return redirect()->back();

    }
    public function active($id){
        $product=Product::find($id);
        $product->update(['active'=>true]);
        Session::flash('success', 'Product successfully activeted!'); 
        return redirect()->back();

    }

    public function hotShow(){
        $hots=Product::where('hot',true)->get();
        return view('admin.product.viewHot')->with('hots',$hots);
    }
}
