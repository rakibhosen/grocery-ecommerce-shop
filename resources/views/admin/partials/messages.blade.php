@if ($errors->any())
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('success'))
  <div class="alert alert-success">
    <p class="text-center">{{ Session::get('success') }}</p>
  </div>
@endif

@if (Session::has('error'))
  <div class="alert alert-danger">
    <p class="text-center">{{ Session::get('error') }}</p>
  </div>
@endif
