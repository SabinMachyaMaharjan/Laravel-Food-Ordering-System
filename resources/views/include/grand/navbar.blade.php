  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav ms-auto">
      <li class="nav-item ms-auto">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>
    <div class="collapse navbar-collapse justify-content-between me-auto" id="navbarNav" >

    <!-- Right navbar links -->
    <ul class="navbar-nav me-auto">
      <!-- Navbar Search -->
      <li class="nav-item me-auto">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
       <!-- <li class="nav-item dropdown">
        <button type="button" class="btn btn-primary position-relative">
        <i class="fa-sharp fa-solid fa-cart-shopping"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            9
            <span class="visually-hidden"></span>
          </span>
        </button>
      </li>  -->
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown d-flex align-self-center me-auto">
        <a href="#" class="position-relative">
          <i class="fas fa-cart-plus"></i>
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger cart-badge">
            
            <span class="visually-hidden">Cart</span>
          </span>
        </a>
      </li>
      <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ auth()->user()->username }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if (auth()->user()->role->role=='admin')
                                        <a class="dropdown-item" href="/"> 
                                            Home
                                        </a>
                                    @elseif (auth()->user()->role->role=='vendor')  
                                        <a class="dropdown-item" href="/"> 
                                                Home
                                        </a>  
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
    </ul>
    </div>
  </nav>
  <!-- /.navbar -->

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
  