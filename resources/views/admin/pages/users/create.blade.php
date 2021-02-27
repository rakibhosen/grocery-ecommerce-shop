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

            <h4 class="card-title">Create Admin</h4>

             <a href="{{ route('users.index') }}" class="btn btn-primary btn-sm float-right">
               <i class="fa fa-users">
               </i> All Admin</a>
      </div>
          <div class="card-body">


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



{!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
<div class="row">
    <div class=" col-md-6">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>

    <div class=" col-md-6">
      <div class="form-group">
          <strong>Email:</strong>
          {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
      </div>
  </div>
</div>
<div class="row">
    <div class=" col-md-6">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>

    <div class=" col-md-6">
      <div class="form-group">
          <strong>Confirm Password:</strong>
          {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
      </div>
  </div>
</div>

<div class="row">
<div class=" col-md-12">
<div class="form-group">
  <strong>Role:</strong>
  {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
</div>
</div>
</div>

    <div class=" col-md-6 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>

{!! Form::close() !!}
          </div>
        </div>
    </div>
</div>


@endsection