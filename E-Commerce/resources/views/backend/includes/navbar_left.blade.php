<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">I R F A N</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - All Categories Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoriesPages" aria-expanded="true" aria-controls="categoriesPages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Category</span>
        </a>
        <div id="categoriesPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('createCategory')}}">Add Category</a>
            <a class="collapse-item" href="{{route('manageCategory')}}">Manage Category</a>
          </div>
        </div>
      </li>
      
      <!-- Nav Item - All Brands Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#brandsPages" aria-expanded="true" aria-controls="brandsPages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Brands</span>
        </a>
        <div id="brandsPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="{{route('admin.brand.create')}}">Add Brand</a>
            <a class="collapse-item" href="{{route('admin.brand')}}">Manage Brand</a>
          </div>
        </div>
      </li>


      <!-- Nav Item - All Products Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#productsPages" aria-expanded="true" aria-controls="productsPages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Product</span>
          </a>
          <div id="productsPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{route('admin.product.addProduct')}}">Add Product</a>
              <a class="collapse-item" href="{{route('admin.product.manageProduct')}}">Manage Product</a>
            </div>
          </div>
        </li>

      <!-- Nav Item - All Divisions Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#divisionsPages" aria-expanded="true" aria-controls="divisionsPages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Division</span>
          </a>
          <div id="divisionsPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{route('admin.divisions.create')}}">Add Division</a>
              <a class="collapse-item" href="{{route('admin.divisions')}}">Manage Division</a>
            </div>
          </div>
        </li>

      <!-- Nav Item - All Districts Collapse Menu -->
      <li class="nav-item">
          <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#districtsPages" aria-expanded="true" aria-controls="districtsPages">
            <i class="fas fa-fw fa-folder"></i>
            <span>District</span>
          </a>
          <div id="districtsPages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <a class="collapse-item" href="{{route('admin.districts.create')}}">Add District</a>
              <a class="collapse-item" href="{{route('admin.districts')}}">Manage District</a>
            </div>
          </div>
        </li>

      
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">