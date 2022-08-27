<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<x-customer-layout>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="50%" src="{{ asset('customer/images/slider/img4.jpeg')}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="50%" src="{{ asset('customer/images/slider/img2.jpeg')}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="50%" src="{{ asset('customer/images/slider/img3.jpeg')}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@include('customer.bloks.collection', ['title' => 'TOP PRODUCTS'])

@include('customer.bloks.collection', ['title' => 'TOP PRODUCTS'])

@include('customer.bloks.collection', ['title' => 'TOP PRODUCTS'])
</x-customer-layout>
<script>
    $('.carousel').carousel()
</script>