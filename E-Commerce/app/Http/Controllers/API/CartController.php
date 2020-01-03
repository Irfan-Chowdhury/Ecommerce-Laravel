<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    // public function index()
    // {
    //     $cart = Cart::all();
    //     // return view('frontend.pages.cart');
    //     return view('frontend.pages.cart',compact('cart'));
    // }

    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required'
        ]);

        if (Auth::check()) //same ইউজার id, product_id আছে কিনা 
        {
            $cart = Cart::where('user_id',Auth::id())
                         ->where('product_id',request()->product_id)
                         ->where('order_id',NULL)
                         ->first();
        }
        else    //নতুবা same ip_address , product_id আছে কিনা 
        {
            $cart = Cart::where('ip_address',request()->ip())
                        ->where('product_id',request()->product_id)
                        ->where('order_id',NULL)        
                        ->first();
        }

        if (!is_null($cart)) 
        {
            $cart->increment('product_quantity'); //ডাটাবেজে যদি ওগুলা অলরেডি থাকে তাহলে ওটার আন্ডারে শুধু প্রোডাক্ট কোয়ান্টিটি শুধু ইনক্রিমেন্ট হবে । 
        }
        else 
        {                       //নতুবা নতুনডাটা এন্ট্রি হবে 
            $cart = new Cart();

            if (Auth::check()) 
            {
                $cart->user_id = Auth::id();
            }
            $cart->ip_address = request()->ip();
            $cart->product_id = $request->product_id;
            $cart->save();
        }

        return json_encode(['status' => 'success', 'Message' => 'Product Added Successfully','totalItems'=> Cart::totalItems() ]);

        // session()->flash('Success','Product Added Successfully');
        //return back();
    }

    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        if ( !is_null($cart)) 
        {
            $cart->product_quantity = $request->product_quantity;
            $cart->update();
        }
        else 
        {
            return redirect()->route('carts');
        }
        session()->flash('Success','Cart Item Updated Succssfully');
        return back();
    }

    public function delete($id)
    {
        $cart = Cart::find($id);
        if ( !is_null($cart)) 
        {
            $cart->delete();
        }
        else 
        {
            // if (is_null($cart)) 
            // {
            //     return redirect()->route('products');
            // }
            // else {
            //     return redirect()->route('carts');
            // }
            return redirect()->route('carts');
        }
        session()->flash('Success','Cart Deleted Succssfully');
        return back();
    }

   

   
    
}
