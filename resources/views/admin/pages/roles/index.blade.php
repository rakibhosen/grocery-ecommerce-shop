
@extends('admin.layout.admin_layout')
@section('css')

@endsection
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

    <div class="card">
        <div class="card-header">

          <h4 class="card-title">Roles Table</h4>

           <button class="btn btn-primary btn-sm float-right"  data-toggle="modal" data-target="#myModal">
             <i class="fa fa-plus">
             </i> Roles</button>
    </div>

    <!-- /.card-header -->
    <div class="card-body">
        <table id="userdatatable" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>Sl</th>
                    <th>Name</th>
                    <th>Action</th>
        
                </tr>
            </thead>
            <tbody>

  
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $loop->index+1 }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm text-white custom_btn" data-toggle="modal" data-target="#showmodal-{{ $role->id }}"><i class="fa fa-eye"></i></a>
                   @if(@Auth::guard('admin')->user()->can('role.edit')) 
             
                        <a class="btn btn-primary btn-sm text-white custom_btn" data-toggle="modal" data-target="#myModal-{{ $role->id }}"><i class="fa fa-edit"></i></a>
                    @endif
                    @if(@Auth::guard('admin')->user()->can('role.delete')) 
                    <a class="btn btn-danger btn-sm text-white custom_btn" data-toggle="modal" data-target="#delete-{{ $role->id }}"><i class="fa fa-trash"></i></a>
                    @endif
                </td>
        {{--  show modal  --}}

        <div class="modal" id="showmodal-{{ $role->id }}">
            <div class="modal-dialog modal-lg">
            <div class="modal-content">
        
              <!-- Modal Header -->
              <div class="modal-header">
                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h4 class="card-title">Role details</h4>
                        </div>
               
                    </div>
                </div>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
              </div>
              @php
              $role = DB::table('roles')->where('id',$role->id)->first();
              $rolePermissions = DB::table('permissions')->join("role_has_permissions","role_has_permissions.permission_id","=","permissions.id")
                  ->where("role_has_permissions.role_id",$role->id)
                  ->get();
              @endphp
              
              <!-- Modal body -->
              <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $role->name }}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <label class="label label-success">{{ $v->name }},</label>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                
              </div>
            </div>
          </div>
        </div>

        {{--  delete modal  --}}

<div class="modal" id="delete-{{ $role->id }}">
<div class="modal-dialog ">
<div class="modal-content">

  <!-- Modal Header -->
  <div class="modal-header">
 <h4 class="card-title float-left">Delete Role</h4>
    <button type="button" class="close" data-dismiss="modal">&times;</button>
  </div>  
  <!-- Modal body -->
  <div class="modal-body">
    <form style="display: inline" action="{{ route('roles.destroy',$role->id) }}" method="POST" >
      @csrf
      @method('DELETE')
      <button style="margin: auto;display:flex" type="submit" class="btn btn-danger btn-sm">Confirm Delete</button>
  </form>

  
  </div>

</div>
</div>
</div>
        

        {{--  edit role modal  --}}
                <div class="modal" id="myModal-{{ $role->id }}">
                    <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                
                      <!-- Modal Header -->
                      <div class="modal-header">
                        <div class="row">
                            <div class="col-lg-12 margin-tb">
                                <div class="pull-left">
                                    <h4 class="card-title">Edit Role</h4>
                                </div>
                       
                            </div>
                        </div>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>
                
                      <!-- Modal body -->
                      <div class="modal-body">
    
                        
                        @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif

                    @php
                    $role = DB::table('roles')->where('id',$role->id)->first();
                    $permission = DB::table('permissions')->get();
                    $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id",$role->id)
                        ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
                        ->all();
                    
                    @endphp

                    
                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                        
                      </div>
                
             
                
                    </div>
                  </div>
                </div>
            </tr>
            
            @endforeach
    

        </tbody>
        <tfoot>
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
        </tr>
        </tfoot>
      </table>


            {{--  create modal  --}}
            <!-- The Modal -->
            <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                <div class="modal-content">
            
                  <!-- Modal Header -->
                  <div class="modal-header">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="pull-left">
                                <h2>Create New Role</h2>
                            </div>
                   
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
            
                  <!-- Modal body -->
                  <div class="modal-body">

                    
                    
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    
                    
                    {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                            </div>
                        </div>
                    </div>
    
                        
                   
                              <div class="form-group ">
                                  
                                    <label for="name">Permissions</label>
        
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                                        <label class="form-check-label" for="checkPermissionAll">All</label>
                                    </div>
                                    <hr>  
                                    <div class="row">
                                    @php $i = 1; @endphp
                                    @foreach ($permission_groups as $group)
                                    
                                            <div class="col-3">
                                           
                                                    <div class="form-check alert-info">
                                                        <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                        <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                                    </div>
                                              
            
                                                <div class="role-{{ $i }}-management-checkbox">
                                                    @php
                                                        $permissions = App\Models\Admin::getpermissionsByGroupName($group->name);
                                                        $j = 1;
                                                    @endphp
                                                    @foreach ($permissions as $permission)
                                                        <div class="form-check">
                                                            <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                                            <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                        </div>
                                                        @php  $j++; @endphp
                                                    @endforeach
                                                    <br>
                                                </div>
                                            </div>
                                
        
                                
                                        @php  $i++; @endphp
                                    @endforeach
        
                                    
                                </div>
                         
                        </div>
                   

                        {{--    --}}
                        <div class="col-xs-12 col-sm-12 col-md-12 text-left">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
             
                    {!! Form::close() !!}
                    
                  </div>
            
         
            
                </div>
              </div>
            </div>

            {!! $roles->render() !!}
    </div>
    <!-- /.card-body -->
  </div>
    </div>
</div>




  @endsection

@section('script')
     @include('admin.pages.roles.partials.script')

          {{--  <script>
            $(document).ready(function() {
                $('#datatable').DataTable();
            } );
          </script>  --}}

          <script>
            $(function () {

              $('#userdatatable').DataTable({
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