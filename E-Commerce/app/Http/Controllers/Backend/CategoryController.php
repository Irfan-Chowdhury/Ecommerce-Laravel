<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Image;
use App\Models\ProductImage;
use File;

class CategoryController extends Controller
{
    public function create_category()
    {
        $primary_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();
        return view('backend.pages.categories.createCategories',compact('primary_categories'));
    }


    public function manage_category()
    {
        $categories = Category::orderBy('id','desc')->get();
        return view('backend.pages.categories.manageCategories')->with('categories',$categories);
    }

    public function store_category(Request $request)
    {
        $request->validate([
            'name'         => 'required|max:255',
            'description'   => 'required|max:1200',
            'image'         => 'nullable|image',
        ]);

        $category = new Category();
        $category->name        = $request->name;
        $category->description  = $request->description;
        $category->parent_id  = $request->parent_id;
       
        //Check if the Category has Single thumbnail image
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $img   = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/category-image/'.$img);
            Image::make($image)->save($location);

            $category->image = $img;
        }

        $category->save();

        session()->flush('success','A New Category Has Been Added');
        return redirect()->back();
    }


    public function edit_category($id)
    {
        $primary_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();

        $category = Category::find($id);
        // return view('backend.pages.categories.editCategories')->with('category',$category);
        return view('backend.pages.categories.editCategories',compact('primary_categories','category'));
    }


    public function upadte_category(Request $request, $id)
    {
        $request->validate([
            'name'         => 'required',
            'description'   => 'required',
            'image'         => 'nullable|image',
        ]);

        $category = Category::find($id);
        $category->name        = $request->name;
        $category->description  = $request->description;

        //Check if the Category has Single thumbnail image
        if ($request->hasFile('image')) 
        {
            $image = $request->file('image');
            $img   = time(). '.' .$image->getClientOriginalExtension();
            $location = public_path('image/category-image/'.$img);
            Image::make($image)->save($location);

            $category->image = $img;
        }

        $category->update();

        return redirect()->back();
    }

    public function delete_category($id)
    {
        $category = Category::find($id);
        if (!is_null($category)) 
        {
            // If it is Parent Category, Then We will Delete all it's Sub Category
            if ($category->parent_id == NULL) 
            {
                $sub_categories = Category::orderBy('name','asc')->where('parent_id',$category->id)->get();
                foreach ($sub_categories as  $sub) 
                {
                    if (File::exists('image/category-image/'.$sub->image)) 
                    {
                        File::delete('image/category-image/'.$sub->image);
                    }
                    $sub->delete();
                }
            }
            if (File::exists('image/category-image/'.$category->image)) 
            {
                File::delete('image/category-image/'.$category->image);
            }
            $category->delete();
        }
        session()->flush('category','Product Succssfully Deleted');
        return redirect()->back();
    }
}
