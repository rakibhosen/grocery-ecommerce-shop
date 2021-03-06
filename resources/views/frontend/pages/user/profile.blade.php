@extends('frontend.layout.master')
@section('title', 'User Profile')
 @section('content')
<!-- page -->
{!! Toastr::message() !!}
<div class="page-head_agile_info_w3l"> </div>
<div class="services-breadcrumb">
	<div class="agile_inner_breadcrumb">
		<div class="container">
			<ul class="w3_short">
				<li> <a href="{{ route('ecommerce.index') }}">Home</a> <i>|</i> </li>
				<li>User Dashboard</li>
			</ul>
		</div>
	</div>
</div>
<div class="banner-bootom-w3-agileits">
	<div class="container">
	<div class="row row align-items-center justify-content-center">
			<div class="col-md-8 col-md-offset-2">
				<ul class="nav nav-tabs">
					<li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
					<li><a data-toggle="tab" href="#allorder">All Orders</a></li>
					<li><a data-toggle="tab" href="#menu2">Settings</a></li>
				</ul>
                <div class="tab-content">
                    <div id="home" class="tab-pane fade in active">
	                 	@include('frontend.pages.user.partials.userInfo')
                    </div>

					<div id="allorder" class="tab-pane fade">
						@include('frontend.pages.user.partials.allOrder')
					</div>
					<div id="menu2" class="tab-pane fade ">
					
						<p style="border-bottom: 1px solid #ddd; margin-top:20px;"> <a href="#"  data-toggle="modal" data-target="#updateProfile"> <span class="fa fa-edit" aria-hidden="true"></span> Edit Info </a></p>
					</div>
				</div>
			</div>
		</div> {{-- modal --}}
@include('frontend.pages.user.partials.userUpdate')
	</div>
</div>
 @endsection