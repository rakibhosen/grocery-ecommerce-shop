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
@include('frontend.partials.products')
@endsection