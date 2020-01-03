@extends('frontend.layouts.maintemplate')



{{-- @section('title')
    {{$product->title}} || E-Commerce
@endsection --}}
@section('bodycontent')

<div class="container">
        <ul class="breadcrumb">
            <li><a href="index.html"><i class="fa fa-home"></i></a></li>
            <li><a href="category.html">Electronics</a></li>
        </ul>
    <div class="row">  

        <!-- Product Left Sidebar -->
    @include('frontend.includes.product-sidebar')
        
    <div id="content" class="col-sm-9">
        <h2 class="category-title">All Products in {{ $category->name }}</h2>
        <div class="row category-banner">
            
        </div>

        <div class="category-page-wrapper">
            <div class="col-md-6 list-grid-wrapper">
                <div class="btn-group btn-list-grid">
                <button type="button" id="list-view" class="btn btn-default list" data-toggle="tooltip" title="List"><i class="fa fa-th-list"></i></button>
                <button type="button" id="grid-view" class="btn btn-default grid" data-toggle="tooltip" title="Grid"><i class="fa fa-th"></i></button>
                </div>
                <a href="#" id="compare-total">Product Compare (0)</a> </div>
            <div class="col-md-1 text-right page-wrapper">
                <label class="control-label" for="input-limit">Show :</label>
                <div class="limit">
                <select id="input-limit" class="form-control">
                    <option value="8" selected="selected">8</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="75">75</option>
                    <option value="100">100</option>
                </select>
                </div>
            </div>
    
            <div class="col-md-2 text-right sort-wrapper">
                <label class="control-label" for="input-sort">Sort By :</label>
                <div class="sort-inner">
                <select id="input-sort" class="form-control">
                    <option value="ASC" selected="selected">Default</option>
                    <option value="ASC">Name (A - Z)</option>
                    <option value="DESC">Name (Z - A)</option>
                    <option value="ASC">Price (Low &gt; High)</option>
                    <option value="DESC">Price (High &gt; Low)</option>
                    <option value="DESC">Rating (Highest)</option>
                    <option value="ASC">Rating (Lowest)</option>
                    <option value="ASC">Model (A - Z)</option>
                    <option value="DESC">Model (Z - A)</option>
                </select>
                </div>
            </div>
            </div>
            <br />

            <div class="grid-list-wrapper">
            
                @php 
                    $products = $category->products()->paginate(12);  //12 টা প্রডাক্ট চলে আসলে পেজিনেট হয়ে যাবে 
                @endphp

                @if ($products->count() > 0 )

                    @foreach ($products as $product)
                        <!-- Single Product Item Start -->
                    <div class="product-layout product-list col-xs-12">
                        <div class="product-thumb">
        
                        <div class="image product-imageblock"> 
                            
                            <a href="{{ route('products.show', $product->slug ) }}"> 
                                @php $i = 1; @endphp 
                                @foreach ($product->images as $image)
                                    @if ($i > 0)
                                        <img src="{{ asset('image/product-image/' . $image->image ) }}" alt="" class="img-responsive" />
                                    @endif
                                    @php $i--; @endphp 
                                @endforeach
                            </a>
        
                            <div class="button-group">
                                <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                                <button type="button" class="addtocart-btn">Add to Cart</button>
                                <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                            </div>
                        </div>
        
                        <div class="caption product-detail">
                            <!-- Product Name -->
                            <h4 class="product-name"> 
        
                            <a href="{{ route('products.show', $product->slug ) }}" title="lorem ippsum dolor dummy"> {{ $product->title }} </a> </h4>
        
                            <!-- Product Description -->
                            <p class="product-desc"> {{ $product->description }} </p>
        
                            <!-- Product Price -->
                            <p class="price product-price">       
                                @if ( is_null( $product->offer_price ) )
                                <span class="price-old"></span>
                                {{ $product->price }}
                                @else
                                <span class="price-old">৳ {{ $product->price }}</span>
                                {{ $product->offer_price }}
                                @endif                  
                            </p>               
        
        
                            <div class="rating"> 
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-2x"></i><i class="fa fa-star-o fa-stack-2x"></i></span> 
                            <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span><span class="fa fa-stack"><i class="fa fa-star-o fa-stack-2x"></i></span>
                            </div>
        
                        </div>
        
                        <div class="button-group">
                            <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                            <button type="button" class="addtocart-btn">Add to Cart</button>
                            <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                        </div>
        
                        </div>
                  </div>
                  
                  <!-- Single Product Item End -->
                    @endforeach
                    
                @else
                    <div class="alert alert-warning">No Product Found in this Category.</div>
                @endif
        
        

            </div>
















        {{-- <div class="row">
          <div class="col-sm-6">
            <div class="thumbnails">
                    
                    @php 
                        $i=1; 
                        $product = $category->products;
                    @endphp
                    @foreach ($product->images as $item)
        
                      <div><a class="thumbnail " href="#" title="lorem ippsum dolor dummy"><img src="{{asset('image/product-image/'.$item->image)}}" title="lorem ippsum dolor dummy" alt="lorem ippsum dolor dummy" /></a></div> 
            
                    @php $i++; @endphp
                    @endforeach 

            </div>
          </div>
          <div class="col-sm-6">
            <h1 class="productpage-title">{{$product->title}}</h1>
            <div class="rating product"> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="fa fa-stack"><i class="fa fa-star-o fa-stack-1x"></i></span> <span class="review-count"> <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">1 reviews</a> / <a href="#" onClick="$('a[href=\'#tab-review\']').trigger('click'); return false;">Write a review</a></span>
              <hr>
              <div class="addthis_toolbox addthis_default_style"><a class="addthis_button_facebook_like" ></a> <a class="addthis_button_tweet"></a> <a class="addthis_button_pinterest_pinit"></a> <a class="addthis_counter addthis_pill_style"></a></div>
            </div>
            <ul class="list-unstyled productinfo-details-top">
              <li>
                <h2 class="productpage-price">৳ {{$product->price}}</h2>
              </li>
            </ul>
            <hr>
            <ul class="list-unstyled product_info">
              <li>
                <label>Brand:</label>
                <span> <a href="#">Apple</a></span></li>
              <li>
                <label>Product Code:</label>
                <span> product 20</span></li>
              <li>
                <label>Availability:</label>
                <span> In Stock: </span><span class="badge badge-secondary">
                    {{$product->quantity < 1 ? "This Product is out of Stock":"$product->quantity"}}
                </span></li>
            </ul>
            <hr>
            <p class="product-desc">{{$product->description}}</p>
            <div id="product">
              <div class="form-group">
                <label class="control-label qty-label" for="input-quantity">Qty</label>
                <input type="text" name="quantity" value="1" size="2" id="input-quantity" class="form-control productpage-qty" />
                <input type="hidden" name="product_id" value="48" />
                <div class="btn-group">
                  <button type="button" data-toggle="tooltip" class="btn btn-default wishlist" title="Add to Wish List" ><i class="fa fa-heart-o"></i></button>
                  <button type="button" id="button-cart" data-loading-text="Loading..." class="btn btn-primary btn-lg btn-block addtocart">Add to Cart</button>
                  <button type="button" data-toggle="tooltip" class="btn btn-default compare" title="Compare this Product" ><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div> --}}


        {{-- <div class="productinfo-tab">
          <ul class="nav nav-tabs">
            <li class="active"><a href="#tab-description" data-toggle="tab">Description</a></li>
            <li><a href="#tab-review" data-toggle="tab">Reviews (1)</a></li>
          </ul>
          <div class="tab-content">
            <div class="tab-pane active" id="tab-description">
              <div class="cpt_product_description ">
                <div>
                  <p> <strong>More room to move.</strong></p>
                  <p> With 80GB or 160GB of storage and up to 40 hours of battery life, the new lorem ippsum dolor dummy lets you enjoy up to 40,000 songs or up to 200 hours of video or any combination wherever you go.</p>
                  <p> <strong>Cover Flow.</strong></p>
                  <p> Browse through your music collection by flipping through album art. Select an album to turn it over and see the track list.</p>
                  <p> <strong>Enhanced interface.</strong></p>
                  <p> Experience a whole new way to browse and view your music and video.</p>
                  <p> <strong>Sleeker design.</strong></p>
                  <p> Beautiful, durable, and sleeker than ever, lorem ippsum dolor dummy now features an anodized aluminum and polished stainless steel enclosure with rounded edges.</p>
                </div>
              </div>
              <!-- cpt_container_end --></div>
            <div class="tab-pane" id="tab-review">
              <form class="form-horizontal">
                <div id="review"></div>
                <h2>Write a review</h2>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-name">Your Name</label>
                    <input type="text" name="name" value="" id="input-name" class="form-control" />
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label" for="input-review">Your Review</label>
                    <textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
                    <div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
                  </div>
                </div>
                <div class="form-group required">
                  <div class="col-sm-12">
                    <label class="control-label">Rating</label>
                    &nbsp;&nbsp;&nbsp; Bad&nbsp;
                    <input type="radio" name="rating" value="1" />
                    &nbsp;
                    <input type="radio" name="rating" value="2" />
                    &nbsp;
                    <input type="radio" name="rating" value="3" />
                    &nbsp;
                    <input type="radio" name="rating" value="4" />
                    &nbsp;
                    <input type="radio" name="rating" value="5" />
                    &nbsp;Good</div>
                </div>
                <div class="buttons clearfix">
                  <div class="pull-right">
                    <button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <h3 class="productblock-title">Related Products</h3>
        <div class="box">
          <div id="related-slidertab" class="row owl-carousel product-slider">
            <div class="item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="#"> <img src="image/product/pro-1-220x294.jpg" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="product.html" title="women's New Wine is an alcoholic">women's New Wine is an alcoholic</a></h4>
                  <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="#"> <img src="image/product/pro-2-220x294.jpg" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="product.html" title="women's New Wine is an alcoholic">women's New Wine is an alcoholic</a></h4>
                  <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="#"> <img src="image/product/pro-3-220x294.jpg" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="product.html" title="women's New Wine is an alcoholic">women's New Wine is an alcoholic</a></h4>
                  <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="#"> <img src="image/product/pro-4-220x294.jpg" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="product.html" title="women's New Wine is an alcoholic">women's New Wine is an alcoholic</a></h4>
                  <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="#"> <img src="image/product/pro-5-220x294.jpg" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="product.html" title="women's New Wine is an alcoholic">women's New Wine is an alcoholic</a></h4>
                  <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="#"> <img src="image/product/pro-6-220x294.jpg" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="product.html" title="women's New Wine is an alcoholic">women's New Wine is an alcoholic</a></h4>
                  <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
            <div class="item">
              <div class="product-thumb transition">
                <div class="image product-imageblock"> <a href="#"> <img src="image/product/pro-7-220x294.jpg" alt="women's New Wine is an alcoholic" title="women's New Wine is an alcoholic" class="img-responsive" /> </a>
                  <div class="button-group">
                    <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                    <button type="button" class="addtocart-btn">Add to Cart</button>
                    <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                  </div>
                </div>
                <div class="caption product-detail">
                  <h4 class="product-name"><a href="product.html" title="women's New Wine is an alcoholic">women's New Wine is an alcoholic</a></h4>
                  <p class="price product-price"> <span class="price-new">$254.00</span> <span class="price-old">$272.00</span> <span class="price-tax">Ex Tax: $210.00</span> </p>
                </div>
                <div class="button-group">
                  <button type="button" class="wishlist" data-toggle="tooltip" title="Add to Wish List"><i class="fa fa-heart-o"></i></button>
                  <button type="button" class="addtocart-btn">Add to Cart</button>
                  <button type="button" class="compare" data-toggle="tooltip" title="Compare this Product"><i class="fa fa-exchange"></i></button>
                </div>
              </div>
            </div>
          </div>
        </div> --}}
      </div>

@endsection
