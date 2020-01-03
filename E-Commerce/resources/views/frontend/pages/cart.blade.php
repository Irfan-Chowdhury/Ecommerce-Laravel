@extends('frontend.layouts.maintemplate')

@section('bodycontent')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="category.html">Cart Page</a></li>
            </ul>
        </div>
    </div>

    <div class="row">
            <div class="col-md-12">
              <h2>Cart Page</h2>
      
              <table class="table table-striped">
                
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Sl No.</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product Image</th>
                    <th scope="col">Product Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Delete</th>
                  </tr>
                </thead>
              {{-- @if(is_null(App\Models\Cart::totalCarts() ))
                  <h2>No Product Added in your Cart</h2>
              @else --}}
                <tbody>
                  @php
                      $total_price = 0;
                  @endphp

                  @foreach (App\Models\Cart::totalCarts() as $cart)  {{-- প্রত্যেকটা প্রোডাক্টের আন্ডারে টোটাল করে order (Add) আছে --}}
                  <tr>
                      <th scope="row">{{ $loop->index + 1 }}</th>
                      <td>{{ $cart->product->title }}</td>
                      <td>
                        @if( $cart->product->images->count() > 0 )
                          <img src="{{ asset('image/product-image/' . $cart->product->images->first()->image ) }}" width="100">
                        @endif
                      </td>
                      <td>
                        <form action="{{route('carts.update',$cart->id)}}" method="POST">
                          @csrf
                          <input type="number" name="product_quantity" class="form-control" value="{{$cart->product_quantity}}">
                          <button type="submit" class="btn btn-primary btn-sm">Update</button>
                        </form>
                      </td>
                      <td>
                        {{$cart->product->price}} ‎৳
                      </td>
                      <td>
                        {{$cart->product->price * $cart->product_quantity}} ‎৳
                            @php
                                $total_price += $cart->product->price * $cart->product_quantity
                            @endphp 
                      </td>
                      <td>
                        <form action="{{route('carts.delete',$cart->id)}}" method="POST">
                          @csrf
                          <input type="hidden" name="cart_id">
                          <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                  </tr>
      
                  @endforeach
                  <tr>
                    <td colspan="4"></td>
                    <td >Total Amount</td>
                    <td><b>{{ $total_price }} ‎৳</b></td>
                  </tr>
                  
                  <tr>
                    <td colspan="5"></td>
                    {{-- <td><a href="#"><h1 class="text-danger" style="font-size:40px; text-font:italic; background:greenyellow;text-align:center">CHECKOUT</h1></a></td> --}}
                    <td style="float:right"><a href="{{route('products')}}" class="btn btn-info">Continue Shopping</a></td>
                    <td><a href="{{route('checkouts')}}" class="btn btn-warning">Proceed To Checkout</a></td>
                  </tr>
                </tbody>
                {{-- @endif --}}

              </table>
      
            </div>
          </div>
</div>

@endsection