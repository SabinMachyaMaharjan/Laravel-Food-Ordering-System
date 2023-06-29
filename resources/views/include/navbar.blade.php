@php
if(auth()->check())
{
 $cart_count = getCartItemsCount();
}
@endphp
<!-- //getCartItemsCount(auth()->user()->id); -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">
      <!-- {{config('app.name')}} -->
      <img src="{{asset('image/OIP.png')}}" alt="logo" width="60px" height="40px">
    </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('restaurant')}}">Restaurants</a>
        </li>
        <!-- <li class="nav-item active">
            <a class="nav-link" href="{{route('dashboard')}}">Dashboard</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{route('logout')}}">Logout</a>
        </li> -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="#">Pricing</a>
        </li>
        <li class="nav-item">
            <a class="nav-link disabled" href="#">Disabled</a>
        </li> -->
        </ul>
        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav ms-auto" style="float:right;">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                        <li class="nav-item dropdown d-flex align-self-center me-2">
                            <a href="#" class="position-relative">
                              <i class="fa-solid fa-cart-plus"></i>
                              <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                              {{$cart_count}}
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
                                        <a class="dropdown-item" href="{{ route('dashboard') }}"> 
                                            Dashboard
                                        </a>
                                    @elseif (auth()->user()->role->role=='vendor')  
                                        <a class="dropdown-item" href="{{ route('vendor.dashboard') }}"> 
                                                Dashboard
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
                        @endguest
                    </ul>
  </div>
</nav>
