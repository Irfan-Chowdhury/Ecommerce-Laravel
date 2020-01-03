@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Add New Product</h1>

    <div class="row">
        <div class="col-6">
            <form action="{{route('admin.product.storeProduct')}}" method="POST" enctype="multipart/form-data">
                @csrf 

                {{-- স্যারের এই নিয়মটা হচ্ছে না 55:22  --}}

                {{-- <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <select class="form-control" name="category_id" id="category_id">
                        <option value="">--Please Select a Category--</option>
                        @foreach (App\Category::orderBy('name','asc')->where('parent_id',NULL)->get() as $parent)
                            <option value="{{$parent->id}}">{{$parent->name}}</option>
                            @foreach (App\Category::orderBy('name','asc')->where('parent_id',$parent->id)->get() as $child)
                                <option value="{{$child->id}}">-->{{$child->name}}</option>
                            @endforeach
                        @endforeach
                    </select>
                </div> --}}

                <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <select class="form-control" name="category_id">
                        <option value="">--Please Select a Category--</option>
                        @foreach($categories as $parent)
                            @if ($parent->parent_id==NULL)
                                <option value="{{ $parent->id }}">{{ $parent->name }}</option> 
                            @endif

                                @foreach($categories as $child)
                                    @if ($child->parent_id == $parent->id)
                                        <option value="{{ $child->id }}">-->{{ $child->name }}</option>
                                    @endif
                                @endforeach

                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="brand_id">Select Brand</label>
                    <select class="form-control" name="brand_id">
                        <option value="">--Please Select a Brand--</option>
                        @foreach($brands as $brand )
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title"  placeholder="Product Title">
                </div>
            
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="description"></textarea>
                </div>
            
            
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Product Quantity">
                </div>

                
            

                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" placeholder="Product Price">
                </div>
                <div class="form-group">
                    <label for="offer_price">Offer Price</label>
                    <input type="number" class="form-control" id="quantity" name="offer_price" placeholder="Product Offer Price">
                </div>
                
                <div class="form-group">
                    <label for="product_image">Upload Product Image</label>
                    <input type="file" class="form-control" id="quantity" name="product_image[]" multiple placeholder="Product Offer Price">
                </div>
                {{-- <div class="form-group">
                    <label for="product_image">Upload Product Image</label>
                    <input type="file" class="form-control" id="quantity" name="product_image[]" placeholder="Product Offer Price">
                </div>
                <div class="form-group">
                    <label for="product_image">Upload Product Image</label>
                    <input type="file" class="form-control" id="quantity" name="product_image[]" placeholder="Product Offer Price">
                </div>
                <div class="form-group">
                    <label for="product_image">Upload Product Image</label>
                    <input type="file" class="form-control" id="quantity" name="product_image[]" placeholder="Product Offer Price">
                </div>
                <div class="form-group">
                    <label for="product_image">Upload Product Image</label>
                    <input type="file" class="form-control" id="quantity" name="product_image[]" placeholder="Product Offer Price">
                </div> --}}
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

            @include('backend.allinfo.message')

        </div>
    </div>
</div>

@endsection