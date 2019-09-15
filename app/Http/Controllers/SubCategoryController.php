<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use App\MotherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motherCategories=MotherCategory::all();
        return view('admin.category.add-subCategory')->with('motherCategories',$motherCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motherCategories=MotherCategory::all();
        return view('admin.category.add-subCategory')->with('motherCategories',$motherCategories);
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
            'category' => 'required',
            'subCategoryName' => 'required'

        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator);
        }

        SubCategory::insert([
            'mother_category_id' =>$request->motherCategory,
            'category_id' =>$request->category,
            'name'=>$request->subCategoryName
        ]);
        Session::flash('success', 'Category successfully added!'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $subCategory->update([
            'name' => $request->name,
        ]);
        Session::flash('success', 'Sub Category Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }

    public function selectCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'categories' => Category::where('mother_category_id', $id)->get()
            ]);
        }
    }

    public function del($id){
        $mc=SubCategory::find($id);
        $mc->delete();

        Session::flash('success', 'Sub Category Deleted!');
        return redirect()->back();
    }
}
