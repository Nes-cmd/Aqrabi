<section class="section mb-10">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="mb-4 text-center text-7xl"><?php echo e($title); ?></h1>
            </div>
            <!-- product -->
            <?php $__currentLoopData = $values; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0 rounded">
                <div class="product text-center">
                    <div class="product-thumb">
                        <div class="overflow-hidden position-relative">
                            <a href="<?php echo e(route('shop.single-product', $product->id)); ?>">
                                <img class="img-fluid w-100 mb-3 img-first" src="<?php echo e(asset('storage/'.$product->main_photo)); ?>" alt="product-img">
                                <?php if(count($product->photos)): ?>
                                <img class="img-fluid w-100 mb-3 img-second" src="<?php echo e(asset('storage/'.$product->photos[0])); ?>" alt="product-img">
                                <?php endif; ?>
                            </a>
                            <div class="btn-cart">
                                <button wire:click="$emit('toCart', <?php echo e($product->id); ?>)" class="btn btn-dark btn-sm color-indigo-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart" viewBox="0 0 16 16">
                                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                    </svg> To cart
                                </button>
                            </div>
                        </div>
                        <div class="product-hover-overlay">
                            <a href="#" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="" data-original-title="Wishlist"><i class="ti-heart"></i></a>
                            <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="" data-original-title="Compare"><i class="ti-search"></i></a>
                        </div>
                    </div>
                    <div class="product-info">
                        <h3 class="h5"><a class="text-color" href="product-single.html"><?php echo e($product->productname); ?></a></h3>
                        <span class="h5"><?php echo e($product->price.' ETB'); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!-- //end of product -->
        </div>
    </div>
</section><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/blocks/collections.blade.php ENDPATH**/ ?>