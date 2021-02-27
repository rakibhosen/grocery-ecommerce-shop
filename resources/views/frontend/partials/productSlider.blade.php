
<div class="featured-section" id="projects">

    <div class="container">
        <!-- tittle heading -->
        <h3 class="tittle-w3l">Special Offers
            <span class="heading-style">
              
            </span>
        </h3>
        <!-- //tittle heading -->
        <div class="content-bottom-in">
            <ul id="flexiselDemo1">
                @php
                      $get_one = DB::table('products')->where('product_buy_one_get_one',1)->orderBy('id','DESC')->paginate(3);
                @endphp
                @foreach ($get_one as $product)
                <li>
                    <div class="w3l-specilamk text-center">
                        <div class="speioffer-agile">
                            <a href="single.html">
            
                                @php
                                $image = json_decode($product->product_image)
                              @endphp
                                <img src="{{ asset('upload/product/'.$image[0]) }}" alt="" width="100%">
                            </a>
                        </div>
                        <div class="product-name-w3l">
                            <h4>
                                <a href="single.html">{{ $product->product_name }}</a>
                            </h4>
                            <div class="w3l-pricehkj">
                                <h6>{{ $product->product_price }}</h6>
                                {{-- <p>Save $40.00</p> --}}
                            </div>
                            <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                                <form action="#" method="post">
                                    @include('frontend.pages.product.partials.addcartButton')
                                </form>
                            </div>
                        </div>
                    </div>
                </li>
                @endforeach
      
  
               
            </ul>
        </div>
    </div>
</div>