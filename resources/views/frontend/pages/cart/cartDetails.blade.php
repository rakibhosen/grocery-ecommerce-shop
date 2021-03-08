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