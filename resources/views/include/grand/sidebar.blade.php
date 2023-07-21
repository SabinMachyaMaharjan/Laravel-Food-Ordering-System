  
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('dashboard')}}" class="brand-link">
      <img src="{{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Food Ordering System</span>
    </a>


  <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{auth()->user()->username}}</a>
        </div>
      </div>


      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          {{-- <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="./index.html" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v1</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index2.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v2</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="./index3.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Dashboard v3</p>
                </a>
              </li>
            </ul>
          </li> --}}
          <li class="nav-header">DASHBOARD</li>
          @if (auth()->check() && auth()->user()->role->role=='admin')
          <li class="nav-item" id="sliders">
            <a href="{{route('slider.index')}}" class="nav-link" id="slider">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slider
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item" id="products">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item active">
                <a href="{{route('product-item.index')}}" class="nav-link" id="product-item">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product-size.index')}}" class="nav-link" id="product-size">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Sizes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item" id="vendors">
            <a href="#/admin/pending-vendors" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Vendors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('approvedVendorIndex')}}" class="nav-link" id="approved-vendors">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pendingVendorIndex')}}" class="nav-link" id="pending-vendors">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Vendors</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(auth()->check() && auth()->user()->role->role=='vendor')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fa-solid fa-user"></i>
                <p>
                  Welcome
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('product.index')}}" class="nav-link ">
                <i class="nav-icon fa-solid fa-gift"></i>
                <p>
                  Products
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>