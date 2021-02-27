<div class="side-bar col-md-3">
    <div class="search-hotel">
        <h3 class="agileits-sear-head">Search Here..</h3>
        <form action="{{ route('product.search') }}" method="get">
            <input type="search" placeholder="Product name..." name="search" required="">
            <input type="submit" value=" ">
        </form>

    </div>
    <!-- price range -->
    <div class="range">
        <h3 class="agileits-sear-head">Price range</h3>
        <ul class="dropdown-menu6">
            <li>

                <div id="slider-range"></div>
                <input type="text" id="amount" style="border: 0; color: #ffffff; font-weight: normal;" />
            </li>
        </ul>
    </div>
    <!-- //price range -->
    <!-- food preference -->
    <div class="left-side">
        <h3 class="agileits-sear-head">Food Preference</h3>
        <ul>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">Vegetarian</span>
            </li>
            <li>
                <input type="checkbox" class="checked">
                <span class="span">Non-Vegetarian</span>
            </li>
        </ul>
    </div>
    <!-- //food preference -->
    <!-- discounts -->
    <div class="left-side">
        <h3 class="agileits-sear-head">Product Category</h3>

<div class="panel-group">
    @foreach ($categories as $category)
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a style="text-decoration: none" data-toggle="collapse" href="#collapse-{{ $category->id }}"><i class="fa fa-plus"></i> {{ $category->category_name }}</a>
        </h4>
      </div>
      <div id="collapse-{{ $category->id }}" class="panel-collapse collapse" style="padding-left: 10px!important">
        <ul class="list-group">
         
  @foreach ($category->subcategory as $subcat)
  <li class="list-group-item"><i class="fa fa-arrow-right"></i> <a href="{{ route('subcategory.product',$subcat->id) }}">{{ $subcat->subcat_name }}</a> </li>
  @endforeach
        </ul>
 
      </div>
    </div>
    @endforeach
  </div>


    </div>

    <!-- //cuisine -->
    <!-- deals -->
    <div class="deal-leftmk left-side">
        <h3 class="agileits-sear-head">Special Deals</h3>
@php
       $recentProduct = DB::table('products')->orderBy('id','DESC')->limit(5)->get();
@endphp
        @foreach ($recentProduct as $product)
        <div class="special-sec1">
            <div class="col-xs-4 img-deals">
                @php
                $image = json_decode($product->product_image)
              @endphp
                <img src="{{ asset('upload/product/'.$image[0]) }}" class="img-responsive">
            </div>
            <div class="col-xs-8 img-deal1">
                <h3>{{ $product->product_name }}</h3>
                <a href="single.html">${{ $product->product_price }}</a>
            </div>
            <div class="clearfix"></div>
        </div>
        @endforeach



    </div>
    <!-- //deals -->
</div>