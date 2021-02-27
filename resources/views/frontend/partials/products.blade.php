
    <div class="wrapper">
        <!-- first section (nuts) -->
        <div class="product-sec1">

        {{-- @if ($search)
            <p>For-<b> {{ $search }}</b></p>
        @endif --}}
        @isset($search)
        <p class="text-center">For-<b> {{ $search }}</b></p>
@endisset

            @if(count($products) > 0)
            @foreach ($products as $product)

            <div class="col-md-4 product-men">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item">
                        @php
                        $image = json_decode($product->product_image)
                      @endphp
                        <img src="{{ asset('upload/product/'.$image[0]) }}" alt="" width="100%">
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="{!! route('product.show',$product->product_slug) !!}" class="link-product-add-cart">Quick View</a>
                            </div>
                        </div>
                        @if ($product->product_offer_price)
                        <span class="product-new-top">Offer</span>
                        @endif
                    
                    </div>
                    <div class="item-info-product ">
                        <h4>
                            <a href="single.html">{{ $product->product_name }}</a>
                        </h4>
                        <div class="info-product-price">
                            <span class="item_price">${{ $product->product_price }}</span>
                            <del>${{ $product->product_offer_price }}</del>
                        </div>
                        <div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                         
               @include('frontend.pages.product.partials.addcartButton')
                      
                        </div>

                    </div>
                </div>
            </div>
            @endforeach
 
            {{ $products->links() }}
            @else
        <p class="alert alert-danger text-center"> No product Found</p>
            @endif
           
            <div class="clearfix"></div>
        </div>
    </div>
