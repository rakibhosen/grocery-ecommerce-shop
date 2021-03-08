@extends('frontend.layout.master')
@section('title', 'Cart')
 @section('content')

<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li>All Cart</li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- checkout page -->
<div class="privacy">
    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">All Cart
            <span class="heading-style">
                <i></i>
                <i></i>
                <i></i>
            </span>
        </h3>
        <!-- //tittle heading -->
        @if (Auth::user())
            
        
        <div class="checkout-right">

         

            @php
          $carts= App\Models\Cart::totalCarts();
            $count =count($carts);
        @endphp

        @if($count>0)
                    <h4>Your shopping cart contains:
                <span>{{$count}} Products</span>
            </h4>

            <div class="table-responsive">
                <table class="timetable_sub">
                    <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Product</th>
                            <th>Quantity</th>
                            <th>Product Name</th>

                            <th>Price</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody>

               
           
                   @foreach ($carts as $cart)
         
                        <tr class="rem1">
                            <td class="invert">{{ $loop->index+1 }}</td>
                            <td class="invert-image">
                                <a href="single2.html">
                                    @php
                                    $image = json_decode($cart->product->product_image);
                                    @endphp
                                    <img src="{{asset('upload/product/'.$image[0])}}" alt=" " class="img-responsive" style="height:80px;width:100px;">
                                </a>
                            </td>
                            <td class="invert">
                                <div class="quantity">
                                    <div class="quantity-select">
                                        <div class="entry value-minus">&nbsp;</div>
                                        <div class="entry value">
                                            <span>{{ $cart->qty }}</span>
                                        </div>
                                        <div class="entry value-plus active">&nbsp;</div>
                                    </div>
                                </div>
                            </td>
                            <td class="invert">{{ $cart->product_name }}</td>
                            <td class="invert">{{ $cart->product_price }}</td>
                            <td class="invert">
                                <div class="rem">
                                    <div class="close1"> </div>
                                </div>
                            </td>
                        </tr>
              @endforeach
            </tbody>
  
        </table>
                           <p class="text-center" style="margin-top:20px;">
                     <a href="{{ route('ecommerce.index') }}" class="btn btn-info" href="" style="margin-left:10px" >Continue shopping....</a>
              <a href="{{ route('checkout.index') }}" class="btn btn-success" href="">Checkout</a>
              </p>
      
            </div>

   

          


            @else
            <div class="alert alert-danger text-center">Your cart is empty</div>
     
              @endif
        </div>
    
   
        @else
        <div class="alert alert-danger text-center">Please login first</div>
        @endif
    </div>
</div>
<!-- //checkout page -->
@endsection
@section('script')
    
@endsection