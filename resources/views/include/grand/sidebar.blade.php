    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Alexander Pierce</a>
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
          <li class="nav-item">
            <a href="{{route('slider.index')}}" class="nav-link active">
              <i class="nav-icon fas fa-images"></i>
              <p>
                Slider
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link ">
              <i class="nav-icon fas fa-gift"></i>
              <p>
                Product
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Items</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('product-size.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Product Sizes</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#/admin/pending-vendors" class="nav-link ">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Vendors
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('approvedVendorIndex')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Approved Vendors</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('pendingVendorIndex')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Pending Vendors</p>
                </a>
              </li>
            </ul>
          </li>
          @elseif(auth()->check() && auth()->user()->role->role=='vendor')
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fad fa-user"></i>
                <p>
                  Welcome
                  <span class="badge badge-info right"></span>
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('product.index')}}" class="nav-link ">
                <i class="nav-icon fad fa-gift"></i>
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