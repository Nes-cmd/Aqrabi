<nav class="navbar navbar-expand-lg navbar-light bg-white w-100" id="navbar">
  <a class="navbar-brand order-2 pl-0 ml-0 order-lg-1 col-md-2 text-center text-md-left" href="{{ route('shop.index') }}"><img height="32px" src="{{ asset('logo.svg')}}" alt="logo"></a>
  <button class="navbar-toggler pr-0 mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-1 order-lg-2" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link text-primary" href="{{ route('shop.index') }}">home</a>
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
      <li class="nav-item">
        <a class="nav-link" href="{{ route('customer.profile')}}">
          <i class="ti-user"></i> Profile
        </a>
      </li>
      @endauth
      @guest
      <li class="nav-item">
        <a class="nav-link" href="{{route('choose-acccount-type')}}">
          <i class="ti-user"></i> Signup
        </a>
      </li>
      @endguest
    </ul>
  </div>
  <div class="order-3 navbar-right-elements">
    <div class="search-cart">
      <!-- search -->
      <div class="search">
        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
        <div class="search-wrapper col-md-4">
          @livewire('search-component')
        </div>
      </div>
      @livewire('cart')
    </div>
  </div>
</nav>