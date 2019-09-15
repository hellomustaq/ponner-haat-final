<?php

namespace App\Http\Controllers;

use App\Category;
use App\MotherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.category.add-category');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motherCategories=MotherCategory::all();
        return view('admin.category.add-category')->with('motherCategories',$motherCategories);
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
            'motherCategory' => 'required',
            'categoryName' => 'required'

        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator);
        }

        Category::insert([
            'mother_category_id' =>$request->motherCategory,
            'name'=>$request->categoryName
        ]);
        Session::flash('success', 'Category successfully added!'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
        ]);
        Session::flash('success', ' Category Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function del($id){
        $mc=Category::find($id);
        $mc->delete();

        Session::flash('success', 'Category Deleted!');
        return redirect()->back();
    }
}
