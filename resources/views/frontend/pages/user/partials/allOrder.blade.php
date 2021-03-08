<div class="panel panel-default">
    <div class="panel-heading">All Order</div>
    <div class="panel-body">
@isset($orders)

 <table class="table table-hover">
    <thead>
      <tr>
        <th>Order Number</th>
        <th>Customer Name</th>
        <th>Order status</th>
        <th>Carts</th>
        <th>View</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->order_number }}</td>
            <td>{{ $order->name }}</td>
            <td>
          @if ($order->is_completed)
                <span class="label badge badge-successs"> Completed</span>
            @else 
         <span class="label badge badge-successs">Processing</span>
            @endif
            
            </td>
            <td>
              @if ($order->carts_count)
                 {{ $order->carts_count }} 
              @endif
            </td>
            <td><a href="" class="btn btn-info" data-toggle="modal" data-target="#order-{{ $order->id }}">View Cart</a></td>
          </tr>
        @endforeach


    </tbody>
  </table>
  <div id="order-{{ $order->id }}" class="modal fade" role="dialog">
    <div class="modal-dialog">
  
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Cart Details</h4>
        </div>
        <div class="modal-body">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Product Name</th>
        <th>Qty</th>
        <th>Price</th>
        <th>Sub Total</th>

      </tr>
    </thead>
    <tbody>
    @php
        $total_amount =0;
    @endphp
    @if (($order->carts))
        

       @foreach ($order->carts as $cart)
       @php
          $total_amount =$total_amount+$cart->sub_total;  
       @endphp

        <tr>
            <td>{{ $cart->product_name }}</td>
            <td>{{ $cart->qty}}</td>
              <td>{{ $cart->product_price}}</td>
            <td>{{$cart->sub_total}}</td>
           
          </tr>
 
         
        @endforeach
        @endif
         <tr>
          <td></td>
            <td></td>
          <td>total</td>
          <td>{{$total_amount}}</td>
          </tr>

    </tbody>
  </table>
        

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
  
    </div>

  </div>

@endisset
    </div>
  </div>





