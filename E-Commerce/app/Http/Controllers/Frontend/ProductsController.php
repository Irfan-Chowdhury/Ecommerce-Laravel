<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
//use App\Models\Cart;

use DB;

class ProductsController extends Controller
{
    public function products()
    {
        // $products = Product::orderBy('id', 'desc')->get();
        $products = Product::orderBy('id', 'desc')->paginate(24);
        return view('frontend.pages.products.products')->with('products', $products);
    }

    public function show($slug)
    {
        $product = Product::where('slug',$slug)->first();

        if (!is_null($product)) 
        {
            return view('frontend.pages.products.show',compact('product'));
        }
        else 
        {
            session()->flash('errors','No Product Found !!!');
            return redirect()->route('products');
        }
    }

    // public function test()
    // {
    //     return view('frontend.pages.show');
    // }
}
