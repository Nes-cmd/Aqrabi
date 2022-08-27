<nav class="navbar navbar-expand-lg navbar-light bg-white w-100" id="navbar">
  <a class="navbar-brand order-2 order-lg-1" href="<?php echo e(route('shop.index')); ?>"><img  src="<?php echo e(asset('logo.svg')); ?>" alt="logo"></a>
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
    </ul>
  </div>
  <div class="order-3 navbar-right-elements">
    <div class="search-cart">
      <!-- search -->
      <div class="search">
        <button id="searchOpen" class="search-btn"><i class="ti-search"></i></button>
        <div class="search-wrapper">
          <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('search-component')->html();
} elseif ($_instance->childHasBeenRendered('BmwiBFI')) {
    $componentId = $_instance->getRenderedChildComponentId('BmwiBFI');
    $componentTag = $_instance->getRenderedChildComponentTagName('BmwiBFI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('BmwiBFI');
} else {
    $response = \Livewire\Livewire::mount('search-component');
    $html = $response->html();
    $_instance->logRenderedChild('BmwiBFI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
        </div>
      </div>
      <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('cart')->html();
} elseif ($_instance->childHasBeenRendered('l5LBAws')) {
    $componentId = $_instance->getRenderedChildComponentId('l5LBAws');
    $componentTag = $_instance->getRenderedChildComponentTagName('l5LBAws');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l5LBAws');
} else {
    $response = \Livewire\Livewire::mount('cart');
    $html = $response->html();
    $_instance->logRenderedChild('l5LBAws', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
    </div>
  </div>
</nav><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/layouts/customer/navbar.blade.php ENDPATH**/ ?>