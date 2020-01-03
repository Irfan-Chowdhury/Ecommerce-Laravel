{{-- <form class="form-inline" action="{{route('carts.store')}}" method="post"> --}}
<form class="form-inline" action="{{URL::to('carts/store')}}" method="post">
    @csrf

    <input type="hidden" name="product_id" value="{{$product->id}}">
    {{-- <button type="submit" class="addtocart-btn">Add to Cart</button> --}}
    <button type="submit" id="button-cart" onclick="addToCart( {{$product->id}} )" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart">Add to Cart</button>
</form>