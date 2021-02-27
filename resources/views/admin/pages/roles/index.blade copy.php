@extends('admin.layout.admin_layout')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
<div class="row pt-5">
    <div class="col-lg-11 mx-auto">
        <div class="card">
            <div class="card-header">
              <div class="float-left"><h4>Role Manage</h4></div>
              <div class="float-right">
                @if(@Auth::guard('admin')->user()->can('role.create')) 
                <!-- Button to Open the Modal -->
        
  
                 <p class="text-right" style="color: white"><a class="btn btn-success" data-toggle="modal" data-target="#myModal"> Create New Role</a></p> 
                    @endif
              </div>
          
                </div>
            <div class="card-body">    

            @include('admin.partials.messages')
            <table class="table table-bordered">
              <tr>
                 <th>No</th>
                 <th>Name</th>
                 <th width="280px">Action</th>
              </tr>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>1</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-info text-white" data-toggle="modal" data-target="#showmodal-{{ $role->id }}">Show</a>
                       @if(@Auth::guard('admin')->user()->can('role.edit')) 
                            <a class="btn btn-primary text-white" data-toggle="modal" data-target="#myModal-{{ $role->id }}">Edit</a>
                        @endif
                        @if(@Auth::guard('admin')->user()->can('role.delete')) 
                        <a class="btn btn-danger text-white" data-toggle="modal" data-target="#delete-{{ $role->id }}"><i class="fa fa-trash"></i></a>
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
                                <h2>Role details</h2>
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
     
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>  
      <!-- Modal body -->
      <div class="modal-body">
        <form style="display: inline" action="{{ route('roles.destroy',$role->id) }}" method="POST" >
          @csrf
          @method('DELETE')
          <button style="margin: auto;display:flex" type="submit" class="btn btn-danger">Confirm Delete</button>
      </form>

      
      </div>

    </div>
  </div>
</div>
            

            {{--  edit modal  --}}
                    <div class="modal" id="myModal-{{ $role->id }}">
                        <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                    
                          <!-- Modal Header -->
                          <div class="modal-header">
                            <div class="row">
                                <div class="col-lg-12 margin-tb">
                                    <div class="pull-left">
                                        <h2>Edit Role</h2>
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
                        {{--  <div class="col-md-6">
                            <div class="form-group">
                                <strong>Permission:</strong>
                                <br/>
                                @foreach($permission as $value)
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->name }}</label>
                                <br/>
                                @endforeach
                            </div>
                        </div>  --}}
                        
                   
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
                                                        $permissions = App\User::getpermissionsByGroupName($group->name);
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
         </div>
    </div>
</div>


 




@endsection

@section('script')
     @include('admin.pages.roles.partials.script')
@endsection