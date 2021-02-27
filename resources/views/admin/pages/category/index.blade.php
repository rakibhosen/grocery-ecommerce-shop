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

              <h4 class="card-title">Category Table</h4>


              <button class="btn btn-primary btn-sm rounded-0 float-right"  data-toggle="modal" data-target="#createcategory">
                <i class="fa fa-plus">
                </i> Main Category</button>

                <a href="{{ route('subcategories.index') }}" class="btn btn-info btn-sm rounded-0 mr-2 float-right" >
         All Sub Category</a>

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

 @foreach ($categories as $key => $category)
  <tr>
    <td>{{ $loop->index }}</td>
    <td>{{ $category->category_name }}</td>


    <td>

      <button class="btn btn-info btn-sm text-white custom_btn rounded-0" data-toggle="modal" data-target="#editmodal-{{ $category->id }}"><i class="fa fa-edit"></i></button>
      <button class="btn btn-danger btn-sm text-white custom_btn rounded-0" data-toggle="modal" data-target="#delete-{{ $category->id }}"><i class="fa fa-trash"></i></button>

    </td>
  </tr>
  {{--  show modal  --}}
  <div class="modal" id="showmodal-{{ $category->id }}">
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

  <div class="modal" id="delete-{{ $category->id }}">
    <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="card-title float-left">Delete Admin</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>   
      <!-- Modal body -->
      <div class="modal-body">
        <form style="display: inline" action="{{ route('categories.destroy',$category->id) }}" method="POST" >
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
    <div class="modal" id="editmodal-{{ $category->id }}">
        <div class="modal-dialog">
        <div class="modal-content">
          <!-- Modal Header -->
          <div class="modal-header">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4 class="card-title">Edit Category</h4>
                    </div>
           
                </div>
            </div>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">

          

<form action="{{ route('categories.update', $category->id) }}" method="POST">
  @method('PUT')
  @csrf
  <div class="row">
    <div class="col-12">
      <div class="form-group">
          <label for="name">category Name</label>
          <input type="text" class="form-control form-control-sm shadow bg-white rounded-0" id="name" name="name" placeholder="Enter category" value="{{ $category->category_name }}">
      </div>
      <button type="submit" class="btn btn-primary btn-sm btn-block rounded-0">Save category</button>
      </div
  </div>




</form>
          
          

 @endforeach
</tbody>
</table>

<div class="modal" id="createcategory">
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

      <div class="modal-body">
        <div class="row">
        
            <div class="col-md-12">
              <div class="card card-primary">
                <div class="card-body">
                    <form action="{{ route('categories.store') }}" method="POST">
                        @csrf
                  <div class="form-group">
                    <label for="inputName">Project Name</label>
                    <input type="text" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="name">
                  </div>
                  <button type="submit" class="btn btn-info btn-sm btn-block">Save</button>
                 
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




{{--  {!! $categorys->render() !!}  --}}

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