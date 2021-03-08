@extends('frontend.layout.master')
@section('title', 'Order Details')
 @section('content')

 <div class="container">
       <h3 class="tittle-w3l">Order Details

        </h3>

 @isset($track_order)

 <table class="table table-hover">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Customer Name</th>
        <th>Cart Qty</th>
        <th>Payment Status</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($track_order as $order)

        <tr>
            <td>{{ $order->order_number }}</td>
            <td>{{$order->user->name}}</td>
            <td>{{ $order->product_quantity }}</td>
            <td>
            @if ($order->is_completed)
                <span class="label badge badge-successs"> Completed</span>
            @else 
         <span class="label badge badge-successs">Processing</span>
            @endif
            </td>
            <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#trackOrder-{{ $order->id }}">View Cart</a></td>
          </tr>
        @endforeach


    </tbody>
  </table>
  <div id="trackOrder-{{ $order->id }}" class="modal fade" role="dialog">
    @include('frontend.pages.cart.cartDetails')
  </div>

@endisset
</div>
 @endsection