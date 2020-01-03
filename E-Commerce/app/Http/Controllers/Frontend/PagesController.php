<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Call the Product Model to show the products into the products page
use App\Models\Product;
//use App\Models\Cart;
class PagesController extends Controller
{
    //This is Home Page
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
    	return view('frontend.pages.index',compact('products'));
    }

    public function login()
    {
    	return view('frontend.pages.login');
    }

    public function register()
    {
    	return view('frontend.pages.register');
    }


    // public function products()
    // {
    //     $products = Product::orderBy('id', 'desc')->get();
    //     return view('frontend.pages.products')->with('products', $products);
    // }

    public function search(Request $request)
    {
        $search = $request->search;

        $products = Product::orWhere('title','like','%'.$search.'%') //all are Products table Fields
                            ->orWhere('description','like','%'.$search.'%')
                            ->orWhere('slug','like','%'.$search.'%')
                            ->orWhere('price','like','%'.$search.'%')
                            ->orWhere('quantity','like','%'.$search.'%')
                            ->orWhere('id','like','%'.$search.'%')
                            ->paginate(12);
       
        return view('frontend.pages.products.search',compact('search','products'));                    
                    
    }
}
