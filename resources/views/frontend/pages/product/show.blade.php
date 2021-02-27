@extends('frontend.layout.master')
@section('content')

<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li>Product Details</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- Single Page -->
<div class="banner-bootom-w3-agileits">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Product Details

        </h3>
        <!-- //tittle heading -->
        <div class="col-md-7 single-right-left ">
            <div class="grid images_3_of_2">
                <div class="flexslider">
                    <ul class="slides">
             
                        @php
                            $image= json_decode($product->product_image)
                        @endphp
                      
              
                            <div class="thumb-image">
                                <img src="{{ asset('upload/product/'.$image[0]) }}" data-imagezoom="true" class="img-responsive" alt=""></div>
                 
                       
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </div>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
          
                  <b>Stoct</b> <a class="pull-right">  
                          @if ($product->product_stockout==1)
                    <span class="badge badge-success">Stock In</span>
                 @else
                 <span class="badge badge-danger">Stock Out</span>
                 @endif</a>
                </li>
    
                <li class="list-group-item">
                  <b>Price</b> <a class="pull-right">${{ $product->product_price }} <strong> </strong> </a>
                </li>
                <li class="list-group-item">
                  <b>Offer Price</b> <a class="pull-right">${{ $product->product_offer_price }}  <strong></strong></a>
                </li>
              </ul>
        </div>
        <div class="col-md-5 single-right-left simpleCart_shelfItem">
            <h3>{{ $product->product_name }}</h3>
            <div class="rating1">
                <span class="starRating">
                    <input id="rating5" type="radio" name="rating" value="5">
                    <label for="rating5">5</label>
                    <input id="rating4" type="radio" name="rating" value="4">
                    <label for="rating4">4</label>
                    <input id="rating3" type="radio" name="rating" value="3" checked="">
                    <label for="rating3">3</label>
                    <input id="rating2" type="radio" name="rating" value="2">
                    <label for="rating2">2</label>
                    <input id="rating1" type="radio" name="rating" value="1">
                    <label for="rating1">1</label>
                </span>
            </div>
            <p>
                @if ($product->product_offer_price)
                <span class="item_price">${{ $product->product_offer_price }}</span>
                <del>${{ $product->product_price }}</del>
                @else 
                <span class="item_price">$${{ $product->product_price }}</span>
          
                @endif

        
               
            </p>
            <div class="list-group">
              
                <a class="list-group-item">  <b>Quantity</b> <span class="pull-right">{{ $product->product_quantity }}</span></a>
                <a class="list-group-item"> <b>Size</b> <span class="pull-right">{{ $product->product_size }}</span></a>
                <a class="list-group-item"> <b>Color</b> <span class="pull-right">{{ $product->product_color }}</span></a>
                <li class="list-group-item">
                    <b>Hot Deal</b> <a class="pull-right">
                   @if ($product->product_hot_deal==1)
                       <span class="badge badge-success">Yes</span>
                   @else 
                   <span class="badge badge-danger">No</span>
                   @endif
                  
                    </a>
                  </li>
                  <li class="list-group-item">
                    <b>Buy one Get one</b> <a class="pull-right">
                   @if ($product->product_buy_one_get_one==1)
                       <span class="badge badge-success">Yes</span>
                   @else 
                   <span class="badge badge-danger">No</span>
                   @endif
                  
                    </a>
                  </li>
                  
              </div>
            <div class="single-infoagile">
                <ul>
                    <li>
                        Cash on Delivery Eligible.
                    </li>
                    <li>
                        Delivery to within 7 - 10 business days.
                    </li>
           
        
                </ul>
            </div>
   
            <div class="occasion-cart">
                <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                    <form action="#" method="post">
                        @include('frontend.pages.product.partials.addcartButton')
                    </form>
                </div>

            </div>

        </div>
        <div class="clearfix"> </div>
    </div>
</div>
@endsection