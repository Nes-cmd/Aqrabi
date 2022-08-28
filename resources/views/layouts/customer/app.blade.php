<!DOCTYPE html>
<html lang="zxx">

<head>
  <meta charset="utf-8">
  <title>Aqrabi</title>

  <!-- mobile responsive meta -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <!-- ** Plugins Needed for the Project ** -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('customer/plugins/bootstrap/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/themify-icons/themify-icons.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/slick/slick.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/venobox/venobox.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/animate/animate.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/aos/aos.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/nice-select/nice-select.css')}}">
  <link rel="stylesheet" href="{{ asset('customer/plugins/bootstrap-slider/bootstrap-slider.min.css')}}">

  <!-- Main Stylesheet -->
  <link href="{{ URL::to('customer/css/style.css')}}" rel="stylesheet">
  <!-- Custom style -->
  <link rel="stylesheet" href="{{URL::to('customer/css/custom.css')}}">

  <!--Favicon-->
  <link rel="shortcut icon" href="" type="image/x-icon">
  <link rel="icon" href="" type="image/x-icon">
  @livewireStyles
</head>

<body>

  <!-- navigation -->
  @include('layouts.customer.navbar')
  <!-- navigation -->
  @livewire('alert-component')
  {{ $slot }}

  <!-- footer -->
  <footer class="bg-light">
    <div class="bg-dark py-4">
      <div class="container">
        <div class="row" style="color: red">
          <div class="col-md-5 text-center text-md-left mb-4 mb-md-0 align-self-center">
            <p class="mb-0">Aqrabi &copy; 2022 all right reserved</p>
          </div>
          <div class="col-md-2 text-center text-md-left mb-4 mb-md-0">
            <img src="{{ asset('logo.svg')}}" alt="logo">
          </div>
          <!--  -->
          <div class="col-md-5 text-center text-md-right mb-4 mb-md-0">
            <ul class="list-inline social-icon-alt" >
              <li class="list-inline-item"><a href="#"><i class="ti-facebook"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-twitter-alt"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-vimeo-alt"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="ti-google"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>
  <!-- /footer -->

  </div>
  <!-- /main wrapper -->
  @livewireScripts
  <!-- jQuery -->
  <script src="{{ asset('customer/plugins/jQuery/jquery.min.js')}}"></script>
  <!-- Bootstracustomer/p JS -->
  <script src="{{ asset('customer/plugins/bootstrap/bootstrap.min.js')}}"></script>
  <script src="{{ asset('customer/plugins/slick/slick.min.js')}}"></script>
  <script src="{{ asset('customer/plugins/venobox/venobox.min.js')}}"></script>
  <script src="{{ asset('customer/plugins/aos/aos.js')}}"></script>
  <script src="{{ asset('customer/plugins/syotimer/jquery.syotimer.js')}}"></script>
  <script src="{{ asset('customer/plugins/instafeed/instafeed.min.js')}}"></script>
  <script src="{{ asset('customer/plugins/zoom-master/jquery.zoom.min.js')}}"></script>
  <script src="{{ asset('customer/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.js')}}"></script>
  <script src="{{ asset('customer/plugins/nice-select/jquery.nice-select.min.js')}}"></script>
  <script src="{{ asset('customer/plugins/bootstrap-slider/bootstrap-slider.min.js')}}"></script>
  <!-- google map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&amp;libraries=places"></script>
  <script src="{{ asset('customer/plugins/google-map/gmap.js')}}"></script>
  <!-- Main Script -->
  <script src="{{ asset('customer/js/script.js')}}"></script>
</body>

</html>