<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Image;
use App\Models\ProductImage;
use File;

class BrandController extends Controller
{

    //Manage All Brand Page
    public function index()
    {
        $brands = Brand::orderBy('id','desc')->get();
        return view('backend.pages.brands.manage',compact('brands'));
    }


    //Add New Brand Page
    public function create()
    {
        return view('backend.pages.brands.create');
    }

    // Brand Store    
    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|max:255',
            'desc'   => 'required|max:1200',
            'image'  => 'nullable|image',
        ]);

        $brand = new Brand();
        $brand->name    = $request->name;
        $brand->desc    = $request->desc;
       
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $img   = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/brand-image/'.$img);
            Image::make($image)->save($location);

            $brand->image = $img;
        }

        $brand->save();

        session()->flash('type','success');
        session()->flush('message','A New Brand Has Been Added');
        return redirect()->back();
    }


    // Brand Edit    
    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('backend.pages.brands.edit',compact('brand'));
    }


    // Brand Update
    public function upadte(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
            'desc'         => 'required',
            'image'        => 'nullable|image',
        ]);

        $brand = Brand::find($id);
        $brand->name  = $request->name;
        $brand->desc  = $request->desc;

        if ($request->hasFile('image')) 
        {
            if (File::exists('image/brand-image/'.$brand->image)) //delete previous image from storage
            {  
                File::delete('image/brand-image/'.$brand->image);
            }
            $image = $request->file('image');
            $img   = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/brand-image/'.$img);
            Image::make($image)->save($location);

            $brand->image = $img;            
        }
        $brand->update();

        session()->flash('type','success');
        session()->flash('message','Brand Updated Succssfully');
        return redirect()->back();
    }

    public function delete($id)
    {
        $brand = Brand::find($id);
        if (!is_null($brand)) 
        {
            
            if (File::exists('image/brand-image/'.$brand->image)) 
            {
                File::delete('image/brand-image/'.$brand->image);
            }
            $brand->delete();
        }
        session()->flush('message','Brand Succssfully Deleted');
        return redirect()->back();
    }
}
