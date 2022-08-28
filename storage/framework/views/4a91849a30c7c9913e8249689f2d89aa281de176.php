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
  <?php $__currentLoopData = $sliders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $slider): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="carousel-item <?php echo e(!$loop->index?'active':''); ?>">
      <img class="d-block w-100" height="70%" src="<?php echo e(asset('storage/'.$slider->photo_url)); ?>">
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('blocks.collections-slide', ['type' => 'top-collections'])->html();
} elseif ($_instance->childHasBeenRendered('gnvmC1z')) {
    $componentId = $_instance->getRenderedChildComponentId('gnvmC1z');
    $componentTag = $_instance->getRenderedChildComponentTagName('gnvmC1z');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gnvmC1z');
} else {
    $response = \Livewire\Livewire::mount('blocks.collections-slide', ['type' => 'top-collections']);
    $html = $response->html();
    $_instance->logRenderedChild('gnvmC1z', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('blocks.collections', ['type' => 'top-products'])->html();
} elseif ($_instance->childHasBeenRendered('OuhEPMN')) {
    $componentId = $_instance->getRenderedChildComponentId('OuhEPMN');
    $componentTag = $_instance->getRenderedChildComponentTagName('OuhEPMN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('OuhEPMN');
} else {
    $response = \Livewire\Livewire::mount('blocks.collections', ['type' => 'top-products']);
    $html = $response->html();
    $_instance->logRenderedChild('OuhEPMN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?>
<script>
    $('.carousel').carousel()
</script><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/customer/index.blade.php ENDPATH**/ ?>