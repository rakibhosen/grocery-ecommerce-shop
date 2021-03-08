@extends('frontend.layout.master')
@section('title', 'Checkout')
 @section('content')



 <div class="container">
  <div class="panel panel-default">
    <div class="panel-heading text-center"> <b>Total Items</b> </div>
    <div class="panel-body">
      <div class="card card-body">
  
      

        <div class="row"">
          <div class="col-md-8 col-md-offset-2">

            <table class="table table-striped">
              <thead>
             
                <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Subtotal</th>
                </tr>
     
              </thead>
              <tbody>
                @foreach (App\Models\Cart::totalCarts() as $cart)
                <tr>
                  <td>{{ $cart->product->product_name }}</td>
                  <td>{{ $cart->product->product_price }}</td>
                  <td>{{ $cart->qty }}</td>
                  <td>{{ $cart->sub_total }}</td>
                </tr>
                @endforeach
              
                <tr>
            
                  @php 
                  $shipping = DB::table('settings')->where('active',1)->first();
                  $total_price = 0;
                  @endphp
                  @foreach (App\Models\Cart::totalCarts() as $cart)
                    @php
                    $total_price += $cart->product->product_price * $cart->qty;
                    $total_with_shipping =($total_price)+($shipping->shipping_cost);
                    @endphp
                  @endforeach

                  <td></td>
                  <td></td>
                  <td>Total</td>
                  <td><span class="label label-primary">{{ $total_price }}</span></td>
                </tr>
                <tr>
         
                  <td></td>
                  <td></td>
                  <td>Total with shipping</td>
                  <td><span class="label label-primary">{{  $total_with_shipping }}</span></td>
                </tr>
      
              </tbody>
            </table>
            <p class="text-center">
              <a class="btn btn-info border-0" href="{{ route('cart.index') }}">Change Cart items</a>
            </p>
          </div>
     
     
        </div>

      </div>



    </div>
  </div>


  <div class="panel panel-default">
    <div class="panel-heading text-center"> <b>Shipping Address</b> </div>
    <div class="panel-body">
   <div class="row">
    <div class="col-md-8 col-md-offset-2">

      <form method="POST" action="{{ route('order.store') }}">
        {{csrf_field()}}

        <div class="form-group row">
          <label for="name" class="col-md-4 col-form-label text-md-right">Receiver Name</label>

          <div class="col-md-8">
            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ Auth::check() ? Auth::user()->name: '' }}"required autofocus>

            @if ($errors->has('name'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('name') }}</strong>
              </span>
            @endif
          </div>
        </div>


        <div class="form-group row">
          <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

          <div class="col-md-8">
            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ Auth::check() ? Auth::user()->email : '' }}" required>

            @if ($errors->has('email'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('email') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="phone" class="col-md-4 col-form-label text-md-right">Phone No</label>

          <div class="col-md-8">
            <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ Auth::check() ? Auth::user()->phone : '' }}" required>

            @if ($errors->has('phone'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('phone') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="message" class="col-md-4 col-form-label text-md-right">Additional Message (optional)</label>

          <div class="col-md-8">
            <textarea id="message" class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" rows="4" name="message"></textarea>

            @if ($errors->has('message'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('message') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="shipping_address" class="col-md-4 col-form-label text-md-right">Shipping Address (*)</label>

          <div class="col-md-8">
            <textarea id="shipping_address" class="form-control{{ $errors->has('shipping_address') ? ' is-invalid' : '' }}" rows="4" name="shipping_address"></textarea>

            @if ($errors->has('shipping_address'))
              <span class="invalid-feedback">
                <strong>{{ $errors->first('shipping_address') }}</strong>
              </span>
            @endif
          </div>
        </div>

        <div class="form-group row">
          <label for="payment_method" class="col-md-4 col-form-label text-md-right">Select a payment method</label>

          <div class="col-md-8">
            <select class="form-control" name="payment_name" required id="payments">
              <option value="">Select a payment method please</option>
              @foreach ($payments as $payment)
                <option value="{{ $payment->short_name }}">{{ $payment->name }}</option>
              @endforeach
            </select>

  </div>



        </div>
        <div class="form-group row">
          <div class="col-md-12">
            @foreach ($payments as $payment)
            @if ($payment->short_name == "cash_in")
          
          
          
              <div id="payment_{{ $payment->short_name }}" class="alert alert-success  text-center hidden" style="margin-top: 10px;">
          <h3>Cash on delivery<br>
          <small>For Cash in there is nothing necessary. Just click Finish Order.</small></h3>
          
          
          
          
          </div>
            @else
              <div id="payment_{{ $payment->short_name }}" class="alert alert-success  text-center hidden" style="margin-top: 10px;">
                <h3>{{ $payment->name }} Payment</h3>
                <p>
                  <strong>{{ $payment->name }} No :  {{ $payment->no }}</strong>
                  <br>
                  <strong>Account Type: {{ $payment->type }}</strong>
                </p>
                <div class="alert alert-success">
                  Please send the above money to this Bkash No and write your transaction code below there..
                </div>
          
              </div>
            @endif
          @endforeach
          <input type="text" name="transaction_id" id="transaction_id" class="form-control hidden" placeholder="Enter transaction code">
          </div>
        </div>
       
            <button type="submit" class="btn btn-info btn-lg btn-block">
              Order Now
            </button>
   

    



    </form>
  </div>
</div>
     </div>
   </div>



  </div>



@endsection

@section('script')
  <script type="text/javascript">
  $("#payments").change(function(){
    $payment_method = $("#payments").val();
    if ($payment_method == "cash_in") {
      $("#payment_cash_in").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
      $("#transaction_id").addClass('hidden');
    }else if ($payment_method == "bkash") {
      $("#payment_bkash").removeClass('hidden');
      $("#payment_cash_in").addClass('hidden');
      $("#payment_rocket").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }else if ($payment_method == "rocket") {
      $("#payment_rocket").removeClass('hidden');
      $("#payment_bkash").addClass('hidden');
      $("#payment_cash_in").addClass('hidden');
      $("#transaction_id").removeClass('hidden');
    }
  })
  </script>
@endsection