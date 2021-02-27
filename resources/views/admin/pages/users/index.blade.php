@extends('admin.layout.admin_layout')


@section('content')

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>
<div class="row">
  <div class="col-lg-12 p-3">
      <div class="card">
        <div class="card-header">

              <h4 class="card-title">Admin Table</h4>
 
               <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm float-right"><i class="fa fa-plus">
                 </i> Admin</a>
        </div>
        <div class="card-body">
          
          @include('admin.partials.messages')


<table id="datatable" class="table table-bordered">
  <thead>
 <tr>
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
     
</thead>
<tbody>

 @foreach ($data as $key => $user)
  <tr>
    <td>{{ ++$i }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
        @if ($v=='Super Admin')
        <label class="badge badge-success">{{ $v }}</label>
        @else
    
            {{ $v }}
        @endif
         
        @endforeach
      @endif
    </td>
    <td>

      <button class="btn btn-info btn-sm text-white custom_btn" data-toggle="modal" data-target="#showmodal-{{ $user->id }}"><i class="fa fa-eye"></i></button>
      <button class="btn btn-info btn-sm text-white custom_btn" data-toggle="modal" data-target="#editmodal-{{ $user->id }}"><i class="fa fa-edit"></i></button>
      <button class="btn btn-danger btn-sm text-white custom_btn" data-toggle="modal" data-target="#delete-{{ $user->id }}"><i class="fa fa-trash"></i></button>

    </td>
  </tr>
  {{--  show modal  --}}
  <div class="modal" id="showmodal-{{ $user->id }}">
    <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4 class="card-title">Admin details</h4>
                </div>
       
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>  
      <!-- Modal body -->
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12 d-flex align-items-stretch">
            <div class="card bg-light">
              <div class="card-header text-muted border-bottom-0">
                @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                 {{ $v }}
                @endforeach
              @endif
              </div>
              <div class="card-body pt-0">
                <div class="row">
                  <div class="col-7">
                    <h2 class="lead text-uppercase"><b> {{ $user->name }}</b></h2>
                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee Lover </p>
                    <ul class="ml-4 mb-0 fa-ul text-muted">
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: + 800 - 12 12 23 52</li>
                      <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> Email: {{ $user->email }}</li>

                    </ul>
                  </div>
                  <div class="col-5 text-center">
                    <img src="{{ asset('default.png') }}"  alt="" class="img-circle img-fluid">
                  </div>
                </div>
              </div>
              <div class="card-footer">
                <div class="text-right">
                  <a href="#" class="btn btn-sm bg-teal">
                    <i class="fas fa-comments"></i>
                  </a>
                  <a href="#" class="btn btn-sm btn-primary">
                    <i class="fas fa-user"></i> View Profile
                  </a>
                </div>
              </div>
            </div>
          </div>

      </div>
        
      </div>
    </div>
  </div>
</div>


{{--  delete modal  --}}

  <div class="modal" id="delete-{{ $user->id }}">
    <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="card-title float-left">Delete Admin</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>   
      <!-- Modal body -->
      <div class="modal-body">
        <form style="display: inline" action="{{ route('users.destroy',$user->id) }}" method="POST" >
          @csrf
          @method('DELETE')
          <p class="text-center"><button type="submit" class="btn btn-danger btn-sm">Confirm Delete</button></p>
          
      </form>

      
      </div>

    </div>
  </div>
</div>

{{--  edit modal  --}}

    <!-- The Modal -->
    <div class="modal" id="editmodal-{{ $user->id }}">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4 class="card-title">Edit Admin</h4>
                    </div>
           
                </div>
            </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

          
          
@include('admin.partials.messages')
          

<form action="{{ route('users.update', $user->id) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-row">
      <div class="form-group col-md-6 col-sm-12">
          <label for="name">User Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" value="{{ $user->name }}">
      </div>
      <div class="form-group col-md-6 col-sm-12">
          <label for="email">User Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" value="{{ $user->email }}">
      </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6 col-sm-12">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
      </div>
      <div class="form-group col-md-6 col-sm-12">
          <label for="password_confirmation">Confirm Password</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Enter Password">
      </div>
  </div>

  <div class="form-row">
      <div class="form-group col-md-6 col-sm-12">
          <label for="password">Assign Roles</label>
          <select name="roles[]" id="roles" class="form-control select2" multiple>
              @foreach ($roles as $role)
                  <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
              @endforeach
          </select>
      </div>
  </div>
  <p class="text-center">  <button type="submit" class="btn btn-primary btn-sm mt-4 pr-4 pl-4">Save User</button></p>

</form>
          
          

 @endforeach
</tbody>
</table>




{!! $data->render() !!}

      </div>
    </div>
</div>
</div>

      
@endsection

@section('script')
    

          {{--  <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            } );
          </script>  --}}

          <script>
            $(function () {

              $('#datatable').DataTable({
                "paging": true,
                "lengthChange": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth":true,
              });
            });
          </script>


@endsection