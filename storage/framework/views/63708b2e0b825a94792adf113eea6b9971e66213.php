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
  <?php echo \Livewire\Livewire::styles(); ?>

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
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body style="position: relative; min-height: 100vh;">

  <main>
    <!-- navigation -->
    <?php echo $__env->make('layouts.customer.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <!-- navigation -->
    <?php echo e($slot); ?>


  </main>
  <?php $__env->startPush('scripts'); ?>
  <?php if(session()->has('alert')): ?>
  <?php ($alert = session()->get('alert')); ?>
  <?php ($message = array_key_exists('message', $alert)?$alert['message']:'' ); ?>
  <script>
    Swal.fire({
      position: "<?php echo e($alert['position']); ?>",
      icon: "<?php echo e($alert['icon']); ?>",
      title: "<?php echo e($alert['title']); ?>",
      message: "<?php echo e($message); ?>",
      showConfirmButton: "<?php echo e($alert['showConfirmButton']); ?>",
      timer: "<?php echo e($alert['timer']); ?>",
    })
  </script>
  <?php endif; ?>
  <!-- footer -->
  <footer class="bg-light" style="position:absolute;bottom:0px;width:100%;margin-top:10px">
    <div class="bg-dark py-4">
      <div class="container">
        <div class="row">
          <div class="col-md-5 text-center text-md-left mb-4 mb-md-0 align-self-center">
            <p class="mb-0">Aqrabi &copy; 2022 all right reserved</p>
          </div>
          <div class="col-md-2 text-center text-md-left mb-4 mb-md-0">
            <img height="35px" src="<?php echo e(asset('logo.svg')); ?>" alt="logo">
          </div>
          <!--  -->
          <div class="col-md-5 text-center text-md-right mb-4 mb-md-0">
            <ul class="list-inline social-icon-alt">
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
  <?php echo \Livewire\Livewire::scripts(); ?>

  <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'livewire-alert::components.scripts','data' => []] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('livewire-alert::scripts'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
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