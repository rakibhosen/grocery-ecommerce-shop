



<div class="panel panel-default">
    <div class="panel-heading">Profile Info</div>
    <div class="panel-body">

        <div class="image" style="width:25%; margin:0 auto; margin-top:20px;margin-bottom:20px;">
             @php 
             $image = Auth::user()->avatar;
              @endphp
              <img src="{{ asset('upload/user/'.$image) }}" alt="" width="100%" style="border-radius:50%"> </div>
        <div class="user-info">
            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item"> <b>User Name</b>
                    <a class="pull-right"> <span class="badge badge-success">{{ Auth::user()->name }}</span> </a>
                </li>
                <li class="list-group-item"> <b>Email</b>
                    <a class="pull-right"> <span class="badge badge-success">{{ Auth::user()->email }}</span> </a>
                </li>
                <li class="list-group-item"> <b>Phone</b>
                    <a class="pull-right"> <span class="badge badge-success">{{ Auth::user()->phone }}</span> </a>
                </li>
                <li class="list-group-item"> <b>Division</b>
                    <a class="pull-right"> <span class="badge badge-success">{{ Auth::user()->division->division_name }}</span> </a>
                </li>
                <li class="list-group-item"> <b>District</b>
                    <a class="pull-right"> <span class="badge badge-success">{{ Auth::user()->district->district_name }}</span> </a>
                </li>
            </ul>
           
        </div>
    </div>
</div>
