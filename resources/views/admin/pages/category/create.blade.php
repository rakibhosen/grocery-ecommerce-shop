@extends('admin.layout.admin_layout')
@push('style')
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>>
@endpush
@section('content')
{{-- <div class="row">
    <div class="col-md-12">
        <div class="card-body">
            @include('admin.partials.messages')
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="text" class="form-control"  placeholder="Enter Title" name="title">
                      
                    </div>
                    <div class="form-group col-md-4">
                        <label for="exampleInputEmail1">Image</label>
                        <input type="file" name="image" class="form-control" accept="image/*" required onchange="readURL(this);">
                        
                      
                    </div>
                    <img id="image" class="col-md-2" src="#">
          
                </div>
 

                <div class="form-group">
                    <label for="exampleInputEmail1">Description</label>
                    <textarea id="summernote" class="form-control summernote" rows="3" name="description"></textarea>
                </div>
               
                
        
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>


    </div>
</div> --}}

<div class="container">
  
    @if(Session::has('message'))
    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data"  >
        @csrf
        <div class="row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Title</label>
                <input type="text" class="form-control"  placeholder="Enter Title" name="title">
              
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Image</label>
                <input type="file" name="image" placeholder="Choose image" id="image">
             
              
            </div>


            <img id="image_preview_container" src="{{ asset('storage/image/image-preview.png') }}"
            alt="preview image" style="max-height: 150px;">
  
        </div>


        <div class="form-group">
            <label for="exampleInputEmail1">Description</label>
            <textarea id="summernote" class="form-control summernote" rows="3" name="description" id="description"></textarea>
        </div>
       
        

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
  
  </div>
 @endsection

 @push('script')
 <script>

    function readURL(input){
      if(input.files && input.files[0]){
        var render = new FileReader();
        render.onload= function(e){
          $('#image')
          .attr('src', e.target.result)
          .width(80)
          .height(100);
    
     
        };
        render.readAsDataURL(input.files[0]);
      }
    }
    
      </script>
 @endpush