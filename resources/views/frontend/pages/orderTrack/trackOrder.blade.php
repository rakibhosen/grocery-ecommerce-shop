
<!-- Trigger the modal with a button -->


<!-- Modal -->
<div id="track_order" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">

      <div class="modal-body">
        <div class="search-hotel">
          <h3 class="agileits-sear-head">Order Number</h3>
          <form action="{{ route('order.track') }}" method="get">
              <input type="search" placeholder="Order Number..."  name="order_number" required="">
              <input type="submit" value=" ">
          </form>
  
      </div>

      </div>

    </div>
p
  </div>
</div>
