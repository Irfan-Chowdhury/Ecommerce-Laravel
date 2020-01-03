<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Auth;

class CartController extends Controller
{
    
  

    
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
        // return back();
    }

   

   
    
}
