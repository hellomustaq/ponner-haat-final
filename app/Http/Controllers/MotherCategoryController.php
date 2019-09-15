<?php

namespace App\Http\Controllers;

use App\MotherCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class MotherCategoryController extends Controller
{

    public function index()
    {
        return view('admin.category.add-motherCategory');
    }

    public function create()
    {
        return view('admin.category.add-motherCategory');
    }



    public function store(Request $request)
    {
        $validator =Validator::make($request->all(), [
            'name' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        MotherCategory::insert([
            'name'=>$request->name
        ]);
        Session::flash('success', 'Mother Category successfully added!'); 
        return redirect()->back();
    }


    public function show(MotherCategory $motherCategory)
    {
        //
    }


    public function edit(MotherCategory $motherCategory)
    {
        //
    }


    public function update(Request $request, MotherCategory $motherCategory)
    {
        $motherCategory->update([
            'name' => $request->name,
        ]);
        Session::flash('success', 'Mother Category Updated!');
        return redirect()->back();
    }


    public function destroy(MotherCategory $motherCategory)
    {
        //
    }

    public function del($id){
        $mc=MotherCategory::find($id);
        $mc->delete();

        Session::flash('success', 'Mother Category Deleted!');
        return redirect()->back();
    }
}
