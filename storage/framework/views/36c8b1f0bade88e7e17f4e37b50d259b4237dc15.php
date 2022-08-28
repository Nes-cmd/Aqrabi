<nav class="navbar navbar-expand-lg navbar-light bg-white w-100" id="navbar">
  <a class="navbar-brand order-2 order-lg-1 col-md-2 text-center text-md-left" href="<?php echo e(route('shop.index')); ?>"><img src="<?php echo e(asset('logo.svg')); ?>" alt="logo"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse order-1 order-lg-2" id="navbarSupportedContent">
    <ul class="navbar-nav mx-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?php echo e(route('shop.index')); ?>">home</a>
      </li>
      <li class="nav-item dropdown view">
        <a class="nav-link" href="<?php echo e(route('shop.list')); ?>" role="button" aria-expanded="false">
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
     <?php endif; ?>

    </ul>
  </div>
  <div class="order-3 navbar-right-elements row">
    <div class="search-cart">
      <!-- search -->
      <div class="search">
        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
        <div class="search-wrapper">
          <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('search-component')->html();
} elseif ($_instance->childHasBeenRendered('fF96tEo')) {
    $componentId = $_instance->getRenderedChildComponentId('fF96tEo');
    $componentTag = $_instance->getRenderedChildComponentTagName('fF96tEo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fF96tEo');
} else {
    $response = \Livewire\Livewire::mount('search-component');
    $html = $response->html();
    $_instance->logRenderedChild('fF96tEo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
      </div>
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart')->html();
} elseif ($_instance->childHasBeenRendered('QUmyUz7')) {
    $componentId = $_instance->getRenderedChildComponentId('QUmyUz7');
    $componentTag = $_instance->getRenderedChildComponentTagName('QUmyUz7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('QUmyUz7');
} else {
    $response = \Livewire\Livewire::mount('cart');
    $html = $response->html();
    $_instance->logRenderedChild('QUmyUz7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
     <!-- Right elements -->
     <div class="d-flex align-items-center">
      <!-- Icon -->
      <a class="text-reset me-3" href="#">
        <i class="fas fa-shopping-cart"></i>
      </a>

      <!-- Avatar -->
      <div class="dropdown">
        <a class="d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuAvatar" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
          <img src="https://mdbcdn.b-cdn.net/img/new/avatars/2.webp" class="rounded-circle" height="40"alt="Black and White Portrait of a Man"loading="lazy"/>
        </a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
          <?php if(auth()->guard()->check()): ?>
          <li>
            <a class="dropdown-item" href="#">My profile</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Settings</a>
          </li>
          <li>
            <a class="dropdown-item" href="#">Logout</a>
          </li>
          <?php endif; ?>
          <?php if(auth()->guard()->guest()): ?>
          <li>
            <a class="dropdown-item" href="<?php echo e(route('login')); ?>">Login</a>
          </li>
          <?php endif; ?>
          
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
</nav><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/layouts/customer/navbar.blade.php ENDPATH**/ ?>