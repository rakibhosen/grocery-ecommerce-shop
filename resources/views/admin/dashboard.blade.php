 @extends('admin.layout.admin_layout')
 @section('content')
 <nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Library</a></li>
    <li class="breadcrumb-item active" aria-current="page">Data</li>
  </ol>
</nav>
          <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-info">
            <div class="inner">
              <h3>2</h3>

              <p>Post</p>
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
             <a href="/admin/post-list" class="small-box-footer">
            More info 
            <i class="fas fa-arrow-circle-right"></i>
        </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-success">
            <div class="inner">
              <h3>33</h3>

              <p>Category</p>
            </div>
            <div class="icon">
              <i class="ion ion-stats-bars"></i>
            </div>
             <a href="/admin/category-list" class="small-box-footer">
            More info 
            <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-warning">
            <div class="inner">
             <h3>22</h3>

              <p>User Registrations</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>

            <a href="/admin/users" class="small-box-footer">
            More info 
            <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
          <!-- small box -->
          <div class="small-box bg-danger">
            <div class="inner">
              <h3>22</h3>

              <p>All Subscriber</p>
            </div>
            <div class="icon">
              <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
            </div>
          </section>
      <!-- /.row -->
      <!-- Main row -->
   
  @endsection