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
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/bootstrap/bootstrap.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/themify-icons/themify-icons.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/slick/slick.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/venobox/venobox.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/animate/animate.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/aos/aos.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/nice-select/nice-select.css')); ?>">
  <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/bootstrap-slider/bootstrap-slider.min.css')); ?>">

  <!-- Main Stylesheet -->
  <link href="<?php echo e(URL::to('customer/css/style.css')); ?>" rel="stylesheet">
  <!-- Custom style -->
  <link rel="stylesheet" href="<?php echo e(URL::to('customer/css/custom.css')); ?>">

  <!--Favicon-->
  <link rel="shortcut icon" href="" type="image/x-icon">
  <link rel="icon" href="" type="image/x-icon">
  <?php echo \Livewire\Livewire::styles(); ?>

</head>
<body>

<!-- navigation -->
<?php echo $__env->make('layouts.customer.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- navigation -->
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('alert-component')->html();
} elseif ($_instance->childHasBeenRendered('1UjudBv')) {
    $componentId = $_instance->getRenderedChildComponentId('1UjudBv');
    $componentTag = $_instance->getRenderedChildComponentTagName('1UjudBv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1UjudBv');
} else {
    $response = \Livewire\Livewire::mount('alert-component');
    $html = $response->html();
    $_instance->logRenderedChild('1UjudBv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php echo e($slot); ?>


<!-- footer -->
<footer class="bg-light">
  <div class="bg-dark py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-5 text-center text-md-left mb-4 mb-md-0 align-self-center">
          <p class="text-white mb-0">Aqrabi &copy; 2022 all right reserved</p>
        </div>
        <div class="col-md-2 text-center text-md-left mb-4 mb-md-0">
          <img src="<?php echo e(asset('logo.svg')); ?>" alt="logo">
        </div>
        <div class="col-md-5 text-center text-md-right mb-4 mb-md-0">
          <ul class="list-inline">
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="<?php echo e(asset('customer/images/payment-card/card-1.jpg')); ?>" alt="card"></li>
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="<?php echo e(asset('customer/images/payment-card/card-3.jpg')); ?>" alt="card"></li>
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="<?php echo e(asset('customer/images/payment-card/card-2.jpg')); ?>" alt="card"></li>
            <li class="list-inline-item"><img class="img-fluid rounded atm-card-img" src="<?php echo e(asset('customer/images/payment-card/card-4.jpg')); ?>" alt="card"></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>
<!-- /footer -->

</div>
<!-- /main wrapper -->
<?php echo \Livewire\Livewire::scripts(); ?>

<!-- jQuery -->
<script src="<?php echo e(asset('customer/plugins/jQuery/jquery.min.js')); ?>"></script>
<!-- Bootstracustomer/p JS -->
<script src="<?php echo e(asset('customer/plugins/bootstrap/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/slick/slick.min.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/venobox/venobox.min.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/aos/aos.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/syotimer/jquery.syotimer.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/instafeed/instafeed.min.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/zoom-master/jquery.zoom.min.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/nice-select/jquery.nice-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('customer/plugins/bootstrap-slider/bootstrap-slider.min.js')); ?>"></script>
<!-- google map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU&amp;libraries=places"></script>
<script src="<?php echo e(asset('customer/plugins/google-map/gmap.js')); ?>"></script>
<!-- Main Script -->
<script src="<?php echo e(asset('customer/js/script.js')); ?>"></script>
</body>

</html><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/layouts/customer/app.blade.php ENDPATH**/ ?>