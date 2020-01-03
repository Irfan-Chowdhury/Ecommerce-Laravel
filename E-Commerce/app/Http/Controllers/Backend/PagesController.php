<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use Image;
use App\Models\ProductImage;
use File;

//Package- http://image.intervention.io/getting_started/installation#laravel

class PagesController extends Controller
{
    public function dashboard()
    {
        return view('backend.pages.dashboard');
    }

    public function addProduct()
    {
        return view('backend.pages.product.addProduct');
    }

    public function product_store(Request $request)
    {   
        //Validate The Form Data
        $request->validate([
            'title'         => 'required|max:225',
            'description'   => 'required|max:1200',
            'quantity'      => 'required', 
            'price'         => 'required', 
            'product_image' => 'required', 
        ]);

        $products = new Product;
        $products->category_id  = 1; 
        $products->brand_id     = 1; 
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

        return redirect()->route('backend.product.addProduct');
        
    }

    public function manage_product()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('backend.pages.product.manageproduct')->with('products',$products);
    }

    public function edit_product($id)
    {   
        $product = Product::find($id);
        //$products = [];
        return view('backend.pages.product.editproduct')->with('product',$product);
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
        $products->title        = $request->title;
        $products->description  = $request->description;
        $products->slug         = str_slug($request->title);
        $products->quantity     = $request->quantity;
        $products->price        = $request->price;
        $products->offer_price   = $request->offer_price;
        //Save all the product data into the Products Table
        $products->update();

        return redirect()->back();
    }

    public function delete_product($id)
    {
        $product = Product::find($id);
        if (!is_null($product)) 
        {
            $product->delete();
        }
        session()->flush('success','Product Succssfully Deleted');
        return redirect()->back();

    }


    // ======================  Categories =================

    // public function create_category()
    // {
    //     $primary_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();
    //     return view('backend.pages.categories.createCategories',compact('primary_categories'));
    // }


    // public function manage_category()
    // {
    //     $categories = Category::orderBy('id','desc')->get();
    //     return view('backend.pages.categories.manageCategories')->with('categories',$categories);
    // }

    // public function store_category(Request $request)
    // {
    //     $request->validate([
    //         'name'         => 'required|max:255',
    //         'description'   => 'required|max:1200',
    //         'image'         => 'nullable|image',
    //     ]);

    //     $category = new Category();
    //     $category->name        = $request->name;
    //     $category->description  = $request->description;
    //     $category->parent_id  = $request->parent_id;
       
    //     //Check if the Category has Single thumbnail image
    //     if ($request->hasFile('image')) 
    //     {
    //         $image = $request->file('image');
    //         $img   = time(). '.' .$image->getClientOriginalExtension();
    //         $location = public_path('image/category-image/'.$img);
    //         Image::make($image)->save($location);

    //         $category->image = $img;
    //     }

    //     $category->save();

    //     session()->flush('success','A New Category Has Been Added');
    //     return redirect()->back();
    // }


    // public function edit_category($id)
    // {
    //     $primary_categories = Category::orderBy('name','desc')->where('parent_id',NULL)->get();

    //     $category = Category::find($id);
    //     // return view('backend.pages.categories.editCategories')->with('category',$category);
    //     return view('backend.pages.categories.editCategories',compact('primary_categories','category'));
    // }


    // public function upadte_category(Request $request, $id)
    // {
    //     $request->validate([
    //         'name'         => 'required',
    //         'description'   => 'required',
    //         'image'         => 'nullable|image',
    //     ]);

    //     $category = Category::find($id);
    //     $category->name        = $request->name;
    //     $category->description  = $request->description;

    //     //Check if the Category has Single thumbnail image
    //     if ($request->hasFile('image')) 
    //     {
    //         $image = $request->file('image');
    //         $img   = time(). '.' .$image->getClientOriginalExtension();
    //         $location = public_path('image/category-image/'.$img);
    //         Image::make($image)->save($location);

    //         $category->image = $img;
    //     }

    //     $category->update();

    //     return redirect()->back();
    // }

    // public function delete_category($id)
    // {
    //     $category = Category::find($id);
    //     if (!is_null($category)) 
    //     {
    //         // If it is Parent Category, Then We will Delete all it's Sub Category
    //         if ($category->parent_id == NULL) 
    //         {
    //             $sub_categories = Category::orderBy('name','asc')->where('parent_id',$category->id)->get();
    //             foreach ($sub_categories as  $sub) 
    //             {
    //                 if (File::exists('image/category-image/'.$sub->image)) 
    //                 {
    //                     File::delete('image/category-image/'.$sub->image);
    //                 }
    //                 $sub->delete();
    //             }
    //         }
    //         if (File::exists('image/category-image/'.$category->image)) 
    //         {
    //             File::delete('image/category-image/'.$category->image);
    //         }
    //         $category->delete();
    //     }
    //     session()->flush('category','Product Succssfully Deleted');
    //     return redirect()->back();
    // }
}
