<?php

namespace App\Http\Controllers;

use File;
use App\Banner;
use App\SingleAd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banner=Banner::all();
        return view('admin.banner.showAll-welBanner')->with('banner',$banner);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.welcomeBanner');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if ($request->hasFile('welBanner')) {
             $image = $request->file('welBanner');
            $filenameExtension = $image->getClientOriginalExtension();

            $modifiedImageName=str_random(20).'.'.$filenameExtension;
            $image->move(public_path('images/banner'),$modifiedImageName);
            Banner::create([
                'name' => $modifiedImageName,
                'category_id'=>$request->catId,
                'note' =>$request->note,
             ]);

            return redirect()->route('banner.index');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        //
    }
     public function del($id)
    {
        $image=Banner::find($id);
        $image_path = "images/banner/".$image->name;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->delete();

        return redirect()->back();
    }

    public function singleAd(){
        $singleAd=SingleAd::where('note','single')->latest()->first();
        return view('admin.banner.singleAd')->with('singleAd',$singleAd);
    }


    public function singleAdPost(Request $request){
        
        if ($request->hasFile('singleAd')) {
             $image = $request->file('singleAd');
            $filenameExtension = $image->getClientOriginalExtension();

            $modifiedImageName=str_random(20).'.'.$filenameExtension;
            $image->move(public_path('images/banner'),$modifiedImageName);
            SingleAd::create([
                'name' => $modifiedImageName,
                'note' => 'single',
             ]);
            Session::flash('success', 'Promotion Ads successfully added!'); 
            return redirect()->back();
         }
    }

    public function singleAdDel($id)
    {
        $image=SingleAd::find($id);
        $image_path = "images/banner/".$image->name;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->delete();

        return redirect()->back();
    }

    public function singleAdUpdate(Request $request, $id)
    {
        if ($request->hasFile('singleAd')) {
            $image=SingleAd::find($id);
            $image_path = "images/banner/".$image->name;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            if ($request->hasFile('singleAd')) {
                 $image = $request->file('singleAd');
                $filenameExtension = $image->getClientOriginalExtension();

                $modifiedImageName=str_random(20).'.'.$filenameExtension;
                $image->move(public_path('images/banner'),$modifiedImageName);
                SingleAd::find($id)->update([
                    'name' => $modifiedImageName,
                    'note' => 'single',
                 ]);
                Session::flash('success', 'Promotion Ads successfully updated!'); 
                return redirect()->back();
             }
         }else{
            return redirect()->back();
         }
        

    }







    public function welcomeThin(){
        $singleAd=SingleAd::where('note','Thin')->latest()->first();
        return view('admin.banner.welcome-thin')->with('singleAd',$singleAd);
    }


    public function welcomeThinPost(Request $request){
        
        if ($request->hasFile('singleAd')) {
             $image = $request->file('singleAd');
            $filenameExtension = $image->getClientOriginalExtension();

            $modifiedImageName=str_random(20).'.'.$filenameExtension;
            $image->move(public_path('images/banner'),$modifiedImageName);
            SingleAd::create([
                'name' => $modifiedImageName,
                'note' => 'Thin',
             ]);
            Session::flash('success', 'Promotion Ads successfully added!'); 
            return redirect()->back();
         }
    }

    public function welcomeThinDel($id)
    {
        $image=SingleAd::find($id);
        $image_path = "images/banner/".$image->name;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $image->delete();

        return redirect()->back();
    }

    public function welcomeThinUpdate(Request $request, $id)
    {
        if ($request->hasFile('singleAd')) {
            $image=SingleAd::find($id);
            $image_path = "images/banner/".$image->name;
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            if ($request->hasFile('singleAd')) {
                 $image = $request->file('singleAd');
                $filenameExtension = $image->getClientOriginalExtension();

                $modifiedImageName=str_random(20).'.'.$filenameExtension;
                $image->move(public_path('images/banner'),$modifiedImageName);
                SingleAd::find($id)->update([
                    'name' => $modifiedImageName,
                    'note' => 'Thin',
                 ]);
                Session::flash('success', 'Promotion Ads successfully updated!'); 
                return redirect()->back();
             }
         }else{
            return redirect()->back();
         }
        

    }
}
