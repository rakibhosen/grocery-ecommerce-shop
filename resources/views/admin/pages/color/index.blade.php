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

              <h4 class="card-title">color Table</h4>
              <button class="btn btn-primary btn-sm float-right"  data-toggle="modal" data-target="#createcolor">
                <i class="fa fa-plus">
                </i> color</button>

        </div>
        <div class="card-body">
          
         

<table id="datatable" class="table table-bordered">
  <thead>
 <tr>
   <th>No</th>
   <th>Name</th>

   <th width="280px">Action</th>
 </tr>
     
</thead>
<tbody>

 @foreach ($colors as $key => $color)
  <tr>
    <td>{{ $loop->index }}</td>
    <td>{{ $color->product_color }}</td>


    <td>

      <button class="btn btn-info btn-sm text-white custom_btn" data-toggle="modal" data-target="#editmodal-{{ $color->id }}"><i class="fa fa-edit"></i></button>
      <button class="btn btn-danger btn-sm text-white custom_btn" data-toggle="modal" data-target="#delete-{{ $color->id }}"><i class="fa fa-trash"></i></button>

    </td>
  </tr>
  {{--  show modal  --}}
  <div class="modal" id="showmodal-{{ $color->id }}">
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

    </div>
  </div>
</div>


{{--  delete modal  --}}

  <div class="modal" id="delete-{{ $color->id }}">
    <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="card-title float-left">Delete Admin</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>   
      <!-- Modal body -->
      <div class="modal-body">
        <form style="display: inline" action="{{ route('colors.destroy',$color->id) }}" method="POST" >
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
    <div class="modal" id="editmodal-{{ $color->id }}">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4 class="card-title">Edit color</h4>
                    </div>
           
                </div>
            </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

          

<form action="{{ route('colors.update', $color->id) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="form-row">
      <div class="form-group col-md-6 col-sm-12 mx-auto">
          <label for="name">color Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter color" value="{{ $color->product_color }}">
      </div>

  </div>


  <p class="text-center">  <button type="submit" class="btn btn-primary btn-sm mt-4 pr-4 pl-4">Save color</button></p>

</form>
          
          

 @endforeach
</tbody>
</table>

<div class="modal" id="createcolor">
    <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4 class="card-title">Add color</h4>
                </div>
       
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>  

      <div class="modal-body">
        <div class="row">
        
            <div class="col-md-12">
              <div class="card card-primary">
  
                <div class="card-body">
                    <form action="{{ route('colors.store') }}" method="POST">
                        @csrf
                  <div class="form-group">
                    <label for="inputName">Project Name</label>
                    <input type="text" id="inputName" class="form-control input-sm" name="name">
                  </div>
                  <p class="text-center"> <button type="submit" class="btn btn-info btn-sm btn-block">Save</button></p>
                 
                </form>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>

        </div>
      </div>

    </div>
  </div>
</div>




{{--  {!! $colors->render() !!}  --}}

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