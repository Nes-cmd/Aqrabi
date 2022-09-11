<nav class="navbar navbar-expand-lg navbar-light bg-white w-100" id="navbar">
  <a class="navbar-brand order-2 pl-0 ml-0 order-lg-1 col-md-2 text-center text-md-left" href="<?php echo e(route('shop.index')); ?>"><img height="32px" src="<?php echo e(asset('logo.svg')); ?>" alt="logo"></a>
  <button class="navbar-toggler pr-0 mr-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-1 order-lg-2" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link <?php echo e(Route::currentRouteName()=='shop.index'?'text-primary':''); ?>" href="<?php echo e(route('shop.index')); ?>">home</a>
      </li>
      <li class="nav-item dropdown view">
        <a class="nav-link <?php echo e(Route::currentRouteName()=='shop.list'?'text-primary':''); ?>" href="<?php echo e(route('shop.list')); ?>" role="button" aria-expanded="false">
          shop
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('about')); ?>">About Us</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('shop.contact')); ?>">Contact Us</a>
      </li>
      <?php if(auth()->guard()->check()): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('shop.wishlist')); ?>">
          <i class="ti-heart"></i> Wishlist
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('customer.dashboard')); ?>">
          <i class="ti-user"></i> Profile 
        </a>
      </li>
      <?php endif; ?>
      <?php if(auth()->guard()->guest()): ?>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('login')); ?>">
          <i class="ti-user"></i> Account
        </a>
      </li>
      <?php endif; ?>
    </ul>
  </div>
  <div class="order-3 navbar-right-elements">
    <div class="search-cart">
      <!-- search -->
      <div class="search" style="position:relative;">
        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
        <div class="search-wrapper float-left my-search">
          <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('search-component')->html();
} elseif ($_instance->childHasBeenRendered('rUgswUS')) {
    $componentId = $_instance->getRenderedChildComponentId('rUgswUS');
    $componentTag = $_instance->getRenderedChildComponentTagName('rUgswUS');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rUgswUS');
} else {
    $response = \Livewire\Livewire::mount('search-component');
    $html = $response->html();
    $_instance->logRenderedChild('rUgswUS', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
      </div>
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart')->html();
} elseif ($_instance->childHasBeenRendered('7BYGTXs')) {
    $componentId = $_instance->getRenderedChildComponentId('7BYGTXs');
    $componentTag = $_instance->getRenderedChildComponentTagName('7BYGTXs');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('7BYGTXs');
} else {
    $response = \Livewire\Livewire::mount('cart');
    $html = $response->html();
    $_instance->logRenderedChild('7BYGTXs', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
  </div>
</nav><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/layouts/customer/navbar.blade.php ENDPATH**/ ?>