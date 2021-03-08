<!-- js-files -->

	<!-- jquery -->
	{{-- <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script> --}}
	<script src="{{ asset('frontend/js/jquery-2.1.4.min.js')}}"></script>
	<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
	<!-- //jquery -->

	<!-- popup modal (for signin & signup)-->
	<script src="{{ asset('frontend/js/jquery.magnific-popup.js')}}"></script>
	<script>
		$(document).ready(function () {
			$('.popup-with-zoom-anim').magnificPopup({
				type: 'inline',
				fixedContentPos: false,
				fixedBgPos: true,
				overflowY: 'auto',
				closeBtnInside: true,
				preloader: false,
				midClick: true,
				removalDelay: 300,
				mainClass: 'my-mfp-zoom-in'
			});

		});
	</script>
	<!-- Large modal -->
	<!-- <script>
		$('#').modal('show');
	</script> -->
	<!-- //popup modal (for signin & signup)-->

	<!-- cart-js -->
	<script src="{{ asset('frontend/js/minicart.js')}}"></script>
	{{-- <script>
		paypalm.minicartk.render(); //use only unique class names other than paypalm.minicartk.Also Replace same class name in css and minicart.min.js

		paypalm.minicartk.cart.on('checkout', function (evt) {
			var items = this.items(),
				len = items.length,
				total = 0,
				i;

			// Count the number of each item in the cart
			for (i = 0; i < len; i++) {
				total += items[i].get('quantity');
			}

			if (total < 3) {
				alert('The minimum order quantity is 3. Please add more to your shopping cart before checking out');
				evt.preventDefault();
			}
		});
	</script> --}}
	<!-- //cart-js -->

	<!-- price range (top products) -->
	<script src="{{ asset('frontend/js/jquery-ui.js')}}"></script>


	<script>
		//<![CDATA[ 
		$(window).load(function () {
			$("#slider-range").slider({
				range: true,
				min: 10,
				max: 10000,
				values: [10, 60],
				slide: function (event, ui) {
					$("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
				var value1 = ui.values[0];
				var value2 = ui.values[1];
					$.ajax({
				type: "GET",
				url: "filterprice",
				data: "min="+value1+"&max="+value2,
				cache: false,
				success: function(products){
				$('#updateDiv').html(products);
					}
				});

				}
			});
			$("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1));

		}); //]]>
	</script>
	<!-- //price range (top products) -->

	<!-- flexisel (for special offers) -->
	<script src="{{ asset('frontend/js/jquery.flexisel.js')}}"></script>
	<script>
		$(window).load(function () {
			$("#flexiselDemo1").flexisel({
				visibleItems: 3,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
				responsiveBreakpoints: {
					portrait: {
						changePoint: 480,
						visibleItems: 1
					},
					landscape: {
						changePoint: 640,
						visibleItems: 2
					},
					tablet: {
						changePoint: 768,
						visibleItems: 2
					}
				}
			});

		});
	</script>
	<!-- //flexisel (for special offers) -->

	<!-- password-script -->
	<script>
		window.onload = function () {
			document.getElementById("password1").onchange = validatePassword;
			document.getElementById("password2").onchange = validatePassword;
		}

		function validatePassword() {
			var pass2 = document.getElementById("password2").value;
			var pass1 = document.getElementById("password1").value;
			if (pass1 != pass2)
				document.getElementById("password2").setCustomValidity("Passwords Don't Match");
			else
				document.getElementById("password2").setCustomValidity('');
			//empty string means no validation error
		}
	</script>
	<!-- //password-script -->

	<!-- smoothscroll -->
	{{-- <script src="{{ asset('frontend/js/SmoothScroll.min.js')}}"></script> --}}
	<!-- //smoothscroll -->

	<!-- start-smooth-scrolling -->
	{{-- <script src="{{ asset('frontend/js/move-top.js')}}"></script>
	<script src="{{ asset('frontend/js/easing.js')}}"></script> --}}
	{{-- <script>
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script> --}}
	<!-- //end-smooth-scrolling -->

	<!-- smooth-scrolling-of-move-up -->
	<script>
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/
			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>
	<!-- //smooth-scrolling-of-move-up -->

	<!-- for bootstrap working -->
	<script src="{{ asset('frontend/js/bootstrap.js')}}"></script>
	<!-- //for bootstrap working -->
	<!-- //js-files -->
	{{-- add to cart ajax request --}}


	<script>
	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	function addToCart(product_id){
	event.preventDefault();

	let id = product_id;


	$.ajax({
	  url: "{{ route('cart.store') }}",
	  type:"POST",
	  data:{
		id:id,

	  },
	  success:function(response){
	
		  if(response.success){
		
			$('#total_item').html(response.total_item);
			console.log('total_item',response.total_item);
			toastr.success('Product added to your cart');
		  }else{
			toastr.info('Please login first');
		  }


		

	  },
	 });
		}
</script>
{{-- remove cart item --}}
<script>
	$.ajaxSetup({
		headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
	function RemoveCartItem(product_id){
	event.preventDefault();

	let id = product_id;


	$.ajax({
	  url: "{{ route('cartitem.delete') }}",
	  type:"POST",
	  data:{
		id:id,

	  },
	  success:function(response){
		console.log(response);
		  let carts = response;
		$('#delete_item').html(carts);
		
		toastr.success('Product deleted from cart', {timeOut: 1000})

		if(response) {
		//   $('.success').text(response.success);
		//   $("#ajaxform")[0].reset();
		
		}
	  },
	 });
		}

</script>


{!! Toastr::message() !!}
@yield('script')





     
			
