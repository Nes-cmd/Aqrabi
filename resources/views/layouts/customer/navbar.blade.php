<nav class="navbar navbar-expand-lg navbar-light bg-white w-100" id="navbar">
  <a class="navbar-brand order-2 order-lg-1 col-md-2 text-center text-md-left" href="{{ route('shop.index') }}"><img src="{{ asset('logo.svg')}}" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-1 order-lg-2" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="{{ route('shop.index') }}">home</a>
      </li>
      <li class="nav-item dropdown view">
        <a class="nav-link" href="{{ route('shop.list')}}" role="button" aria-expanded="false">
          shop
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ url('about')}}">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('shop.contact')}}">Contact Us</a>
      </li>
      @auth
      <li class="nav-item">
        <a class="nav-link" href="{{ route('shop.wishlist')}}">
          <i class="ti-heart"></i> Wishlist
        </a>
      </li>
     @endauth
    </ul>
  </div>
  <div class="order-3 navbar-right-elements">
    <div class="search-cart">
      <!-- search -->
      <div class="search">
        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
        <div class="search-wrapper">
          @livewire('search-component')
        </div>
      </div>
      @livewire('cart')
      <div class="search dropdown">
        <a class="hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="40"alt="Img"loading="lazy"/>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          @auth
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
          @endauth
          @guest
          <li>
            <a class="dropdown-item" href="{{route('login')}}">Login</a>
          </li>
          @endguest
        </ul>
      </div>
    </div>
  </div>
</nav>