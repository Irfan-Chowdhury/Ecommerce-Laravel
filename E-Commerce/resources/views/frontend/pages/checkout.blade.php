@extends('frontend.layouts.maintemplate')


@section('bodycontent')


	<div class="container">
	  <ul class="breadcrumb">
	    <li><a href="index.html"><i class="fa fa-home"></i></a></li>
	    <li><a href="{{route('carts')}}">Add To Cart</a></li>
	    <li><a href="#">Checkout</a></li>
	  </ul>

      <div class="row">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">Total Confirm Items</h5>

                      <table class="table table-dark">
                          <thead>
                              <tr>
                                  <th scope="col"><h1>Product Title</h1></th>
                                  <th scope="col"><h1>Quantity</h1></th>
                                  <th scope="col"><h1>Price</h1></th>
                              </tr>
                          </thead>

                          <tbody>
                              @foreach (App\Models\Cart::totalCarts() as $cart)
                                  <tr>
                                      <td><h4>{{$cart->product->title}}</h4></td>
                                      <td><h4>{{$cart->product_quantity}} Pcs</h4></td>
                                      <td><h4>{{$cart->product->price}} ‎৳</h4></td>
                                  </tr>
                              @endforeach
                          </tbody>
                      </table>
                        <div class="card" style="width: 18rem;float:right">
                            <div class="card-body">
                                <h5 class="card-title">Total Amount</h5>
                                <p class="card-text">
                                    @php
                                        $total_price =0;
                                    @endphp
                                    @foreach(App\Models\Cart::totalCarts() as $item)
                                        @php
                                                $total_price += $cart->product->price * $cart->product_quantity
                                        @endphp
                                    @endforeach
                                    Total Price: <strong>{{$total_price}} BDT</strong>
                                </p>
                            </div>
                        </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="row">
        <h1 style="text-align:center;">Your Shipping Address</h1>
        <div class="col-md-6">
            <form action="" method="POST">
                @csrf

                <div class="form-group">
                  <label for="first_name">First Name</label>
                  <input type="text" name="first_name" class="form-control" value="{{Auth::check() ? Auth::user()->first_name : ''}}" required autofocus>
                </div>
                <div class="form-group">
                  <label for="last_name">Last Name</label>
                  <input type="text" name="last_name" class="form-control" value="{{Auth::check() ? Auth::user()->last_name : ''}}" required autofocus>
                </div>
                <div class="form-group">
                  <label for="email">Email Address</label>
                  <input type="text" name="email" class="form-control" value="{{Auth::check() ? Auth::user()->email : ''}}" required autofocus>
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="text" name="phone" class="form-control" value="{{Auth::check() ? Auth::user()->phone : ''}}" required autofocus>
                </div>
                <div class="form-group">
                  <label for="address">Address</label>
                  <input type="text" name="address" class="form-control" value="{{Auth::check() ? Auth::user()->address : ''}}" required autofocus>
                </div>

                <div class="form-group">
                  <select class="form-control" name="payment_method" id="">
                    <option>Select a Payment Method</option>
                    <option>Cash On Delivery</option>
                    <option>Bank Transfer</option>
                    <option>Bkash Payment</option>
                    <option>Rocket Payment</option>
                  </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Place Your Order Now</button>
                </div>                
            </form>
        </div>
      </div>
    </div>



@endsection

