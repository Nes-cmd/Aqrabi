<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<?php if (isset($component)) { $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" height="50%" src="<?php echo e(asset('customer/images/slider/img4.jpeg')); ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="50%" src="<?php echo e(asset('customer/images/slider/img2.jpeg')); ?>" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" height="50%" src="<?php echo e(asset('customer/images/slider/img3.jpeg')); ?>" alt="Third slide">
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
<?php echo $__env->make('customer.bloks.collection', ['title' => 'TOP PRODUCTS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('customer.bloks.collection', ['title' => 'TOP PRODUCTS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php echo $__env->make('customer.bloks.collection', ['title' => 'TOP PRODUCTS'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?>
<script>
    $('.carousel').carousel()
</script><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/customer/index.blade.php ENDPATH**/ ?>