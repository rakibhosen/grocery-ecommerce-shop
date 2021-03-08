@extends('admin.layout.admin_layout')
@section('title', 'Products')


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

              <h4 class="card-title">product Table</h4>
              <button class="btn btn-primary btn-sm float-right rounded-0"  data-toggle="modal" data-target="#createproduct">
                <i class="fa fa-plus">
                </i> product</button>

        </div>
        <div class="card-body">
          
        @include('admin.partials.messages')

<table id="datatable" class="table table-bordered ">
  <thead>
 <tr class="text-center">
   <th>No</th>
   <th>Image</th>
   <th>Name</th>
   <th>Price</th>
   <th>Offer Price</th>
   <th>Category</th>
   <th>Stock</th>
   <th>Quantity</th>

   <th>Action</th>
 </tr>
     
</thead>
<tbody>

 @foreach ($products as $key => $product)
  <tr class="text-center">
    <td>{{ $loop->index+1 }}</td>
    <td>
      @php
        $image = json_decode($product->product_image)
      @endphp
    <img src="{{ asset('upload/product/'.$image[0]) }}" alt="" class="mx-auto" height="60px" width="80px">
    </td>

    
    <td>{{ $product->product_name }}</td>
    <td>{{ $product->product_price }} <strong>&#2547;</strong></td>
    <td>{{ $product->product_offer_price }} <strong>&#2547;</strong></td>
    <td>{{ $product->category->category_name }}</td>
    <td>
      @if ($product->product_stockout==1)
         <span class="badge badge-success">Stock In</span>
      @else
      <span class="badge badge-danger">Stock Out</span>
      @endif
     
    </td>
    <td>{{ $product->product_quantity }}</td>
    <td class="d-flex justify-content-center">
      <button class="btn btn-info btn-sm text-white custom_btn rounded-0" data-toggle="modal" data-target="#showmodal-{{ $product->id }}"><i class="fa fa-eye"></i></button>
      <button class="btn btn-primary btn-sm text-white custom_btn rounded-0 ml-1" data-toggle="modal" data-target="#editmodal-{{ $product->id }}"><i class="fa fa-edit"></i></button>
      <button class="btn btn-danger btn-sm text-white custom_btn rounded-0 ml-1" data-toggle="modal" data-target="#delete-{{ $product->id }}"><i class="fa fa-trash"></i></button>

    </td>
  </tr>
  {{--  show modal  --}}
  <div class="modal" id="showmodal-{{ $product->id }}">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4 class="card-title">Product details</h4>
                </div>
       
            </div>
        </div>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>  

      <div class="modal-body">
        <div class="card">

          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-6">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                  <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
                  <div class="carousel-inner">
                    @foreach (json_decode($product->product_image) as $image)
                        
                 
                    <div class="carousel-item {{ $loop->first ? ' active' : '' }}">
                      <img class="d-block w-100" src="{{ asset('upload/product/'.$image) }}" alt="First slide">
                    </div>
                    @endforeach
                  </div>
                  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                </div>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
            
                    <b>Stoct</b> <a class="float-right">  
                            @if ($product->product_stockout==1)
                      <span class="badge badge-success">Stock In</span>
                   @else
                   <span class="badge badge-danger">Stock Out</span>
                   @endif</a>
                  </li>

                  <li class="list-group-item">
                    <b>Price</b> <a class="float-right">{{ $product->product_price }} <strong>&#2547; </strong> </a>
                  </li>
                  <li class="list-group-item">
                    <b>Offer Price</b> <a class="float-right">{{ $product->product_offer_price }}  <strong>&#2547;</strong></a>
                  </li>
                </ul>
              </div>
              <div class="col-6">
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
            
    
                    <h3 class="profile-username text-center">{{ $product->product_name }}</h3>
    
                    <p class="text-muted text-center">{{ $product->category->category_name }}/{{ $product->subcategory->subcat_name }}</p>
    
                    <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Size</b> <a class="float-right">{{ $product->size->product_size }}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Quantity</b> <a class="float-right">{{ $product->product_quantity }}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Color</b> <a class="float-right">{{ $product->color->product_color }}</a>
                      </li>

                      <li class="list-group-item">
                        <b>Hot Deal</b> <a class="float-right">
                       @if ($product->product_hot_deal==1)
                           <span class="badge badge-success">Yes</span>
                       @else 
                       <span class="badge badge-danger">No</span>
                       @endif
                      
                        </a>
                      </li>

                      <li class="list-group-item">
                        <b>Buy one Get one</b> <a class="float-right">
                       @if ($product->product_buy_one_get_one==1)
                           <span class="badge badge-success">Yes</span>
                       @else 
                       <span class="badge badge-danger">No</span>
                       @endif
                      
                        </a>
                      </li>

                      <strong><i class="far fa-file-alt  mr-1"></i>Description</strong>
                      <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </ul>
    
                    {{--  <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>  --}}
                  </div>
                  <!-- /.card-body -->
                </div>
              </div>
            </div>
 
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

      </div>

    </div>
  </div>
</div>


{{--  delete modal  --}}

  <div class="modal" id="delete-{{ $product->id }}">
    <div class="modal-dialog ">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="card-title float-left">Delete Product</h4>
           <button type="button" class="close" data-dismiss="modal">&times;</button>
         </div>   
      <!-- Modal body -->
      <div class="modal-body">
        <form style="display: inline" action="{{ route('products.destroy',$product->id) }}" method="POST" >
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
    <div class="modal" id="editmodal-{{ $product->id }}">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
    
          <!-- Modal Header -->
          <div class="modal-header">
            
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h4 class="card-title">Edit Product</h4>
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
                        <form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                          @method('PUT')
                          @csrf
                          <div class="row">
                            <div class="form-group col-12">
                              <label for="inputName">Name</label>
                              <input type="text" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0 shadow bg-white" name="name" value="{{ $product->product_name }}">
                            </div>
                          </div>
                            <div class="row">
   

                                  <div class="form-group col-6">
                                    <label for="inputStatus">Brand</label>
                            
                                    <select class="form-control form-control-sm shadow bg-white rounded-0" name="brand_id">
                                      <option selected disabled>Select one</option>
                                      @foreach ($brands as $brand)
                                          <option {{ $brand->id==$product->brand_id ? 'selected' :''  }} value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                      @endforeach
                       
                
                                    </select>
                                  </div>
    
                                  <div class="form-group col-6">
                                    <label for="inputName">Price</label>
                                    <input type="number" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="price" value="{{ $product->product_price }}">
                                  </div>
                            </div>
             

      
    
                            <div class="row">
                                    <div class="form-group col-6">
                                <label for="inputName">Color</label>
                                <select class="form-control form-control-sm shadow bg-white rounded-0" name="color_id" id="ccolor_id">
                                  <option selected disabled>Chose One</option>
                                  @foreach ($colors as $color)
                                   <option {{ $color->id==$product->color_id ? 'selected' :''  }} value="{{ $color->id }}">{{ $color->product_color }}</option>
                                  @endforeach
            
                                </select>
                              </div>
    
                                  <div class="form-group col-6">
                                    <label for="inputName">Offer Price</label>
                                    <input type="number" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="offer_price" value="{{ $product->product_offer_price }}">
                                  </div>
                            </div>
                            <div class="row">
                              <div class="form-group col-6">
                                <label for="inputStatus">Size</label>
                     
       
    
                                <select class="form-control form-control-sm shadow bg-white rounded-0" name="size_id" id="cat_id">
                                  <option selected disabled>Chose One</option>
                                  @foreach ($sizes as $size)
                                   <option {{ $size->id==$product->size_id ? 'selected' :''  }} value="{{ $size->id }}">{{ $size->product_size }}</option>
                                  @endforeach
            
                                </select>
                              </div>
    
                                  <div class="form-group col-6">
                                    <label for="inputName">Quantity</label>
                                    <input type="number" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="quantity" value="{{ $product->product_quantity }}">
                                  </div>
                            </div>
    
                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="inputStatus">Category</label>
                         
                                    <select class="form-control form-control-sm shadow bg-white rounded-0" name="cat_id" id="edit_cat_id">
                                      <option selected disabled>Select one</option>
                                      @foreach ($categories as $category)
                                       <option {{ $category->id==$product->cat_id ? 'selected' :''  }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                      @endforeach
                
                                    </select>
                                  </div>
    
    
    
                                  <div class="form-group col-6">
                                    <label for="inputStatus">Sub Category</label>
                            
                                    <select class="form-control form-control-sm shadow bg-white rounded-0" name="subcat_id" id="edit_subcat_id">
                                      <option selected disabled>Select one</option>
                                      @foreach ($sub_categories as $sub_category)
                                      <option {{ $sub_category->id==$product->subcat_id ? 'selected' :''  }} value="{{ $sub_category->id }}">{{ $sub_category->subcat_name }}</option>
                                     @endforeach
                       
                
                                    </select>
                                  </div>
                            </div>
    
  

                            <div class="row">

                              <div class="form-group col-12">
                                <div class="input-group hdtuto control-group lst increment" >
                                  <input type="file" name="images[]" class="myfrm form-control form-control-sm shadow bg-white rounded-0">
                                  <div class="input-group-btn"> 
                                    <button class="btn btn-success btn-sm rounded-0" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                                  </div>
                                </div>
                                <div class="clone hide">
                                  <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                                    <input type="file" name="images[]" class="myfrm form-control form-control-sm shadow bg-white rounded-0">
                                    <div class="input-group-btn"> 
                                      <button class="btn btn-danger btn-sm rounded-0" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                                    </div>
                                  </div>
                                </div>
                              </div>


                            </div>
    
        
    
                            <div class="form-group col-12">
                                <label for="inputName">Description</label>
                                <textarea type="text" class="form-control form-control-sm shadow bg-white rounded-0" name="description" id="summernote">{{ $product->product_description }}</textarea>
                              </div>
    
    
        
    
                       
                            <hr>
                            <p class="text-center"><b>Others Option</b></p>
                            <div class="row d-flex">
                                <div class="form-group col-3">
                                    <div class="form-check ">
                                      <input  type="hidden" name="stockout" value="0">
                                      <input class="form-check-input" type="checkbox" name="stockout" value="1" {{ $product->product_stockout==1 ? 'checked=""' : '' }}>
                                      <label class="form-check-label">Stock Available</label>
                                    </div>
                                  </div>
                                
    
                                  <div class="form-group col-3">
                                    <div class="form-check">
                                      <input  type="hidden" name="hot_deal" value="0">
                                      <input class="form-check-input" type="checkbox" name="hot_deal" value="1" {{ $product->product_hot_deal==1? 'checked=""' : '' }}>
                                      <label class="form-check-label">Hot Deal</label>
                                    </div>
                                  </div>
    
                                  <div class="form-group col-3">
                                    <div class="form-check">
                                      <input  type="hidden" name="buy_one_get_one" value="0">
                                      <input class="form-check-input" type="checkbox" name="buy_one_get_one" value="1" {{ $product->product_buy_one_get_one ==1? 'checked=""' : '' }}>
                                      <label class="form-check-label">Buy one Get one</label>
                                    </div>
                                  </div>
                    
                            </div>
    
                     
    
    
                      <button type="submit" class="btn btn-info btn-block btn-sm">Save</button>
                     
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
          
          

 @endforeach
</tbody>
</table>
{{--  create modal  --}}
<div class="modal" id="createproduct">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h4 class="card-title">Add Product</h4>
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
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                          <div class="form-group col-12">
                            <label for="inputName">Name</label>
                            <input type="text" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="name">
                          </div>

            
                        </div>
                          <div class="row">
 

                                <div class="form-group col-6">
                                  <label for="inputStatus">Brand</label>
                          
                                  <select class="form-control form-control-sm shadow bg-white rounded-0" name="brand_id">
                                    <option selected disabled>Select one</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                    @endforeach
                     
              
                                  </select>
                                </div>
  
                                <div class="form-group col-6">
                                  <label for="inputName">Price</label>
                                  <input type="number" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="price">
                                </div>
                          </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="inputName">Color</label>
                                <select class="form-control form-control-sm shadow bg-white rounded-0" name="color_id" id="ccolor_id">
                                  <option selected disabled>Chose One</option>
                                  @foreach ($colors as $color)
                                   <option value="{{ $color->id }}">{{ $color->product_color }}</option>
                                  @endforeach
            
                                </select>
                              </div>

                              <div class="form-group col-6">
                                <label for="inputName">Offer Price</label>
                                <input type="number" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="offer_price">
                              </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-6">
                            <label for="inputStatus">Size</label>
                 
   

                            <select class="form-control form-control-sm shadow bg-white rounded-0" name="size_id" id="cat_id">
                              <option selected disabled>Chose One</option>
                              @foreach ($sizes as $size)
                               <option value="{{ $size->id }}">{{ $size->product_size }}</option>
                              @endforeach
        
                            </select>
                          </div>

                              <div class="form-group col-6">
                                <label for="inputName">Quantity</label>
                                <input type="number" id="inputName" class="form-control form-control-sm shadow bg-white rounded-0" name="quantity">
                              </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="inputStatus">Category</label>
                     
       

                                <select class="form-control form-control-sm shadow bg-white rounded-0" name="cat_id" id="cat_id">
                                  <option selected disabled>Select one</option>
                                  @foreach ($categories as $category)
                                   <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                  @endforeach
            
                                </select>
                              </div>



                              <div class="form-group col-6">
                                <label for="inputStatus">Sub Category</label>
                        
                                {{--  <select class="form-control form-control-sm shadow bg-white rounded-0" name="subcat_id" id="subcat_id">
                                  <option selected disabled>Select one</option>
                   
            
                                </select>  --}}
                                <select class="form-control form-control-sm shadow bg-white rounded-0" name="subcat_id" id="subcat_id">
                                  <option selected disabled>Select one</option>
                                  @foreach ($sub_categories as $sub_category)
                                  <option value="{{ $sub_category->id }}">{{ $sub_category->subcat_name }}</option>
                                 @endforeach
                                </select> 
                              </div>
                        </div>




                        <div class="input-group hdtuto control-group lst increment" >
                          <input type="file" name="images[]" class="myfrm form-control form-control-sm shadow bg-white rounded-0">
                          <div class="input-group-btn"> 
                            <button class="btn btn-success btn-sm rounded-0" type="button"><i class="fldemo glyphicon glyphicon-plus"></i>Add</button>
                          </div>
                        </div>
                        <div class="clone hide">
                          <div class="hdtuto control-group lst input-group" style="margin-top:10px">
                            <input type="file" name="images[]" class="myfrm form-control form-control-sm shadow bg-white rounded-0">
                            <div class="input-group-btn"> 
                              <button class="btn btn-danger btn-sm rounded-0" type="button"><i class="fldemo glyphicon glyphicon-remove"></i> Remove</button>
                            </div>
                          </div>
                        </div>

                        <div class="form-group col-12">
                            <label for="inputName">Description</label>
                            <textarea type="text" class="form-control form-control-sm shadow bg-white rounded-0" name="description" id="summernote"></textarea>
                          </div>


    

                   
                        <hr>
                        <p class="text-center"><b>Others Option</b></p>
                        <div class="row d-flex">
                            <div class="form-group col-3">
                                <div class="form-check ">
                                  <input  type="hidden" name="stockout" value="0">
                                  <input class="form-check-input" type="checkbox" name="stockout" value="1" checked="">
                                  <label class="form-check-label">Stock Available</label>
                                </div>
                              </div>
                            

                              <div class="form-group col-3">
                                <div class="form-check">
                                  <input  type="hidden" name="hot_deal" value="0">
                                  <input class="form-check-input" type="checkbox" name="hot_deal" value="1">
                                  <label class="form-check-label">Hot Deal</label>
                                </div>
                              </div>

                              <div class="form-group col-3">
                                <div class="form-check">
                                  <input  type="hidden" name="buy_one_get_one" value="0">
                                  <input class="form-check-input" type="checkbox" name="buy_one_get_one" value="1">
                                  <label class="form-check-label">Buy one Get one</label>
                                </div>
                              </div>
                
                        </div>

                 


                        <button type="submit" class="btn btn-info btn-block btn-sm">Save</button>
                 
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




{{--  {!! $products->render() !!}  --}}

      </div>
    </div>
</div>
</div>

      
@endsection

@section('script')

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

{{-- subcategory ajax  request --}}

<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function () {
   
      $('#cat_id').on('change',function(e) {
       
       var cat_id = e.target.value;

       $.ajax({
             
             url:"{{ url('admin/get/subcat/') }}/"+cat_id,
             type:"GET",
             dataType:"json",
             data: {
                 cat_id: cat_id
              },
            
             success:function (data) {

              $('#subcat_id').empty();

              $.each(data,function(index,subcategory){
                  $('#subcat_id').append('<option value="'+subcategory.id+'">'+subcategory.subcat_name+'</option>');
              })

             }
         })
      });

  });
</script>


<script type="text/javascript">
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $(document).ready(function () {
   
      $('#edit_cat_id').on('change',function(e) {
       
       var cat_id = e.target.value;

       $.ajax({
             
             url:"{{ url('admin/get/subcat/') }}/"+cat_id,
             type:"GET",
             dataType:"json",
             data: {
                 cat_id: cat_id
              },
            
             success:function (data) {

              $('#edit_subcat_id').empty();

              $.each(data,function(index,subcategory){
                  $('#edit_subcat_id').append('<option value="'+subcategory.id+'">'+subcategory.subcat_name+'</option>');
              })

             }
         })
      });

  });
</script>



{{--  multiple image  --}}
          <script type="text/javascript">
            $(document).ready(function() {
              $(".btn-success").click(function(){ 
                  var lsthmtl = $(".clone").html();
                  $(".increment").after(lsthmtl);
              });
              $("body").on("click",".btn-danger",function(){ 
                  $(this).parents(".hdtuto control-group lst").remove();
              });
            });
        </script>


@endsection