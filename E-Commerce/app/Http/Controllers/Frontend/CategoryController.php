<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryController extends Controller
{
    
    public function index()
    {
        //
    }

   
    public function show($id)
    {
        $category = Category::find($id);

        // $products = $category->products();

        if ( !is_null($category)) {
            return view('frontend.pages.categories.show',compact('category'));
        }
        else {
            session()->flash('error','Sorry, No Product Found');
            return redirect('/');
        }
    }

   
   

    
    
}
