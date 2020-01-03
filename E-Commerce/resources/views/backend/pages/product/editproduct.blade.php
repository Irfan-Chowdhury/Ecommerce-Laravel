@extends('backend.layouts.mastertemplate')

@section('backendPageContent')

<div class="container">
    <h1 class="text-center pt-5">Edit Product</h1>

    @include('backend.allinfo.message')


    
    <div class="row">
        <div class="col-6">
            <form action="{{route('updateProduct',$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="category_id">Select Category</label>
                    <select class="form-control" name="category_id">
                        <option selected>--Please Select a Category--</option>
                        @foreach($categories as $parent)
                            @if ($parent->parent_id==NULL)
                                <option value="{{$parent->id}}" {{ $parent->id == $product->category_id ? 'selected': '' }}>{{$parent->name}}</option>
                            @endif

                                @foreach($categories as $child)
                                    @if ($child->parent_id == $parent->id)
                                        <option value="{{$child->id}}" {{ $child->id == $product->category_id ? 'selected': '' }}>{{$child->name}}</option>
                                    @endif
                                @endforeach

                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="brand_id">Select Brand</label>
                    <select class="form-control" name="brand_id">
                        <option selected>--Please Select a Brand--</option>
                        @foreach($brands as $brand )
                            <option value="{{$brand->id}}" {{ $brand->id == $product->brand_id ? 'selected': '' }}>{{$brand->name}}</option>
                        @endforeach
                    </select>
                </div>


                
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title"  value="{{$product->title}}">
                </div>
            
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" rows="5" name="description" id="description">{{$product->description}}</textarea>
                </div>
            
            
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="number" class="form-control" id="quantity" name="quantity" value="{{$product->quantity}}">
                </div>
            
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{$product->price}}">
                </div>
                <div class="form-group">
                    <label for="offer_price">Offer Price</label>
                    <input type="number" class="form-control" id="quantity" name="offer_price" value="{{$product->offer_price}}">
                </div>
                
                {{-- Multiple Image --}}
                
                 <div class="form-group">
                    <label for="product_image">Upload Product Image</label><br>
                    @php $i=1; @endphp
                    @foreach ($product->images as $item)
                        <img src="{{asset('image/product-image/'.$item->image)}}" height="60px" width="80px">
                        @php $i++; @endphp
                    @endforeach
                    <br>
                    <br>
                    <label for="product_image">Include New Image</label><br> 
                    <input type="file" class="form-control" name="product_image_include[]" multiple>
                    <br>
                    <br>
                    <label for="product_image">Or, Update All Old Image By Replacing New Image</label><br> 
                    <input type="file" class="form-control" name="product_image[]" multiple>
                </div>
                
                {{-- <div class="form-group">
                    <label for="product_image">Upload Product Image</label><br>
                    @php $i=1; @endphp
                    @foreach ($product->images as $item)
                        <div class="row">
                            <div class="col-md-6">
                                <img src="{{asset('image/product-image/'.$item->image)}}" height="60px" width="80px"> 
                            </div>
                            <div class="col-md-6">
                                <input type="file" class="form-control" name="product_image_single">
                            </div>
                        </div>                    
                        @php $i++; @endphp
                    @endforeach  
                    <input type="file" class="form-control" name="product_image[]" multiple>
                </div> --}}
                

                <button type="submit" class="btn btn-primary">Update</button>
            </form>

            {{-- @include('backend.allinfo.message') --}}

        </div>
    </div>
</div>

@endsection