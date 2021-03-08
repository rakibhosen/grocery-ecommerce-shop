@extends('frontend.layout.master')
@section('title', 'Products')
@section('content')
@include('frontend.partials.slider')


	<!-- top Products -->
	<div class="ads-grid">
		<div class="container">
			<!-- tittle heading -->
			<h3 class="tittle-w3l">Our Top Products
				<span class="heading-style">
					<i></i>
					<i></i>
					<i></i>
				</span>
			</h3>
			<!-- //tittle heading -->
			<!-- product left -->
@include('frontend.partials.sidebar')
			<!-- //product left -->
			<!-- product right -->
			<div class="agileinfo-ads-display col-md-9" id="updateDiv">
	@include('frontend.partials.products')
			</div>
        </div>
    </div>
    @include('frontend.partials.productSlider')

<!-- special offers -->
@endsection