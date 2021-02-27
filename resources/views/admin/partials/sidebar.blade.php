@php
    $usr = Auth::guard('admin')->user();
    $RoleName = $usr->getRoleNames()->first();
@endphp

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
      <img src="{{ asset('adminlogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('default.png') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }} <badge class="badge badge-success">{{ $RoleName }}</badge></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               @if($usr->can('dashboard.view'))
          <li class="nav-item">
            <a href="{{route('admin.dashboard')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
               Dashboard
               
              </p>
            </a>
          </li>
          @endif

          @if ($usr->can('role.view') || $usr->can('role.create') ||  $usr->can('role.edit') ||  $usr->can('role.delete')||$usr->can('admin.create') 
          || $usr->can('admin.view') ||  $usr->can('admin.edit') ||  $usr->can('admin.delete'))
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Role & Permission
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
         
              <li class="nav-item"> <a class="nav-link" href="{{ route('roles.index') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Role</p>
               </a> 
               </li>

               <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">
                <i class="far fa-circle nav-icon"></i>
              <p>Admin</p>
            </a>
             </li>
   



            </ul>
          </li>
          @endif



          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>

                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
         
              <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Category</p>
               </a> 
               </li>

               <li class="nav-item"> <a class="nav-link" href="{{ route('subcategories.index') }}">
                <i class="far fa-circle nav-icon"></i>
              <p>Sub Category</p>
            </a>
             </li>
   



            </ul>
          </li> 

          <li class="nav-item"> <a class="nav-link" href="{{ route('brands.index') }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Brand</p>
           </a>
         </li>


         <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Products</p>
         </a>
       </li>

       <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
          <i class="nav-icon fas fa-users"></i>
          <p>
            Products
            <i class="right fas fa-angle-left"></i>
          </p>
        </a>
        <ul class="nav nav-treeview">

          <li class="nav-item"> <a class="nav-link" href="{{ route('products.index') }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Products</p>
           </a>
         </li>
     
          <li class="nav-item"> <a class="nav-link" href="{{ route('categories.index') }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Category</p>
           </a> 
           </li>

           <li class="nav-item"> <a class="nav-link" href="{{ route('brands.index') }}">
            <i class="far fa-circle nav-icon"></i>
            <p>Brand</p>
           </a>
         </li>

         <li class="nav-item"> <a class="nav-link" href="{{ route('colors.index') }}">
          <i class="far fa-circle nav-icon"></i>
          <p>Color</p>
         </a>
       </li>

       <li class="nav-item"> <a class="nav-link" href="{{ route('sizes.index') }}">
        <i class="far fa-circle nav-icon"></i>
        <p>Size</p>
       </a>
     </li>






        </ul>
      </li>

     

   

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>