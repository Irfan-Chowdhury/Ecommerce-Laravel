<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Image;
use App\Models\ProductImage;
use File;

class ProductController extends Controller
{

    public function manage_product()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.manageproduct')->with('products',$products);
    }

    
    public function addProduct()
    {
        $categories = Category::orderBy('name', 'asc')->get(); //স্যারেরটা না হবার কারণে এভাবে লিখা 
        $brands     = Brand::orderBy('name', 'asc')->get(); //স্যারেরটা না হবার কারণে এভাবে লিখা 

        return view('backend.pages.product.addProduct',compact('categories','brands'));
    }

    public function product_store(Request $request)
    {   
        //Validate The Form Data
        $request->validate([
            'category_id'   => 'required|numeric',
            'brand_id'      => 'required|numeric',
            'title'         => 'required|max:225',
            'description'   => 'required|max:1200',
            'quantity'      => 'required', 
            'price'         => 'required', 
            'product_image' => 'required', 
        ]);

        $products = new Product;
        $products->category_id  = $request->category_id; 
        $products->brand_id     = $request->brand_id; 
        $products->title        = $request->title;
        $products->description  = $request->description;
        $products->slug         = str_slug($request->title);
        $products->quantity     = $request->quantity;
        $products->price        = $request->price;
        $products->status       = 1;
        $products->offer_price   = $request->offer_price;
        $products->admin_id     = 1;
        //Save all the product data into the Products Table
        $products->save();

        //Check if the product has Multiple thumbnail image
        ///if (count($request->product_image) >0 ) 
        if ($request->hasFile('product_image')) 
        {
            foreach ($request->product_image as $image) 
            {
                //$image = $image->getClientOriginalName();
                $img   = str_random(10). '.' .$image->getClientOriginalExtension();
    
                //Move the Product Image into the required folder
                $location = public_path('image/product-image/'.$img);
                Image::make($image)->save($location);
    
                //Image Resize Function
                //$image= Image::make($image)->resize(700,430);
    
                //create the productImage Model
                $product_images = new ProductImage;
    
                //Insert the data inside the product_image Table [product id, image name]
                $product_images->product_id= $products->id;
                $product_images->image     = $img;
                $product_images->save();
            }
        }

        // Check if the product has Single thumbnail image
        // if ($request->hasFile('product_image')) 
        // {
        //     $image = $request->file('product_image');
        //     $img   = time(). '.' .$image->getClientOriginalExtension();

        //     //Move the Product Image into the required folder
        //     $location = public_path('image/product-image/'.$img);
        //     Image::make($image)->save($location);

        //     //Image Resize Function
        //     $image= Image::make($image)->resize(700,430);

        //     //create the productImage Model
        //     $product_images = new ProductImage;

        //     //Insert the data inside the product_image Table [product id, image name]
        //     $product_images->product_id= $products->id;
        //     $product_images->image     = $img;
        //     $product_images->save();
        // }

        session()->flush('message','A New Product Has Been Added');
        return redirect()->back();
        
    }

    

    public function edit_product($id)
    {   
        $product = Product::find($id);
        $categories = Category::orderBy('name', 'asc')->get(); //স্যারেরটা না হবার কারণে এভাবে লিখা 
        $brands     = Brand::orderBy('name', 'asc')->get(); //স্যারেরটা না হবার কারণে এভাবে লিখা         
        
        // return view('backend.pages.product.editproduct')->with('product',$product);
        return view('backend.pages.product.editproduct',compact('product','categories','brands'));
    }

    public function upadte_product(Request $request, $id)
    {
         //Validate The Form Data
         $request->validate([
            'title'         => 'required|max:225',
            'description'   => 'required|max:1200',
            'quantity'      => 'required', 
            'price'         => 'required', 
            //'product_image' => 'required', 
        ]);

        $products = Product::find($id);
        $products->category_id  = $request->category_id; 
        $products->brand_id     = $request->brand_id; 
        $products->title        = $request->title;
        $products->description  = $request->description;
        $products->slug         = str_slug($request->title);
        $products->quantity     = $request->quantity;
        $products->price        = $request->price;
        $products->offer_price   = $request->offer_price;
        //Save all the product data into the Products Table
        $products->update();


        // Include New Image
        if ($request->hasFile('product_image_include')) 
        {
            foreach ($request->product_image_include as $image) 
            {
                $product_images = new ProductImage;
                $img   = str_random(10). '.' .$image->getClientOriginalExtension();
                $location = public_path('image/product-image/'.$img);
                Image::make($image)->save($location);
                $product_images->product_id= $products->id;
                $product_images->image     = $img;
                $product_images->save();
            }
        }

        //Update All Old Image By Replacing New Image
        elseif ($request->hasFile('product_image')) 
        {
            $product_images_dlt = ProductImage::orwhere('product_id',$id)->get();
            foreach ($product_images_dlt as $image_dlt) 
            {
                if (File::exists('image/product-image/'.$image_dlt->image)) //delete previous image from storage
                {  
                    File::delete('image/product-image/'.$image_dlt->image);
                    $image_dlt->delete();
                }
            }
            foreach ($request->product_image as $image) 
            {
                $product_images = new ProductImage;
                $img   = str_random(10). '.' .$image->getClientOriginalExtension();
                $location = public_path('image/product-image/'.$img);
                Image::make($image)->save($location);
                $product_images->product_id= $products->id;
                $product_images->image     = $img;
                $product_images->save();
            }
        }

        session()->flash('type','success');
        session()->flash('message','Product Succssfully Updated');
        return redirect()->back();
    }


    public function delete_product($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) 
        {
            $product->delete();
        }
        session()->flash('success','Product Succssfully Deleted');
        return redirect()->back();

    }
}
