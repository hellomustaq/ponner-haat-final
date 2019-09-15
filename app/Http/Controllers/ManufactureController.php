<?php

namespace App\Http\Controllers;

use App\Category;
use App\Manufacture;
use App\SubCategory;
use App\MotherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motherCategories=MotherCategory::all();
        return view('admin.manufacturer.add-manufacturer')->with('motherCategories',$motherCategories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $motherCategories=MotherCategory::all();
        return view('admin.manufacturer.add-manufacturer')->with('motherCategories',$motherCategories);
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
            'subCategory' => 'required',
            'manufacturerName' => 'required',
        ]);

        if ($validator->fails()) {
            Session::flash('error', 'Opps! some field are not properly inserted!!'); 
            return redirect()->back()->withErrors($validator);
        }

        Manufacture::insert([
            'mother_category_id' =>$request->motherCategory,
            'category_id' =>$request->category,
            'sub_category_id' =>$request->subCategory,
            'name'=>$request->manufacturerName,
        ]);
        Session::flash('success', 'Manufacturer successfully added!'); 
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $manufacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacture $manufacture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Manufacture $manufacture)
    {
        $update=Manufacture::find($request->id)->update([
            'name' => $request->name,
        ]);
        Session::flash('success', ' Manufacture Updated!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Manufacture  $manufacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
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
    public function selectSubCategoryAjax(Request $request, $id) {
        if ($request->ajax()) {
            return response()->json([
                'subCategories' => SubCategory::where('category_id', $id)->get()
            ]);
        }
    }

    public function del($id){
        $mc=Manufacture::find($id);
        $mc->delete();

        Session::flash('success', 'Category Deleted!');
        return redirect()->back();
    }
}
