<div>
    <!-- /shop -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-lg-0">
                    <!-- categories -->
                    <div class="mb-30">
                        <h4 class="mb-3">Shop by Categories</h4>
                        <ul class="pl-0 shop-list list-unstyled">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <p wire:click="subcategory(<?php echo e($cat->id); ?>)" class="d-flex py-2 text-gray justify-content-between">
                                    <span><?php echo e($cat->name); ?></span>
                                </p>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
                <!-- product-list -->
                <div class="col-lg-9">
                    <div>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product mb-4">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="product-thumb position-relative text-center">
                                        <div class="overflow-hidden position-relative">
                                            <a href="<?php echo e(route('shop.single-product', $product->id)); ?>">
                                                <img style="height: 200px;width: 300px;" class="img-fluid mb-3 img-first" src="<?php echo e(asset('storage/'.$product->main_photo)); ?>" alt="product-img">
                                                <?php if(count($product->photos) > 0): ?>
                                                <img style="height: 200px;width: 300px;" class="img-fluid mb-3 img-second" src="<?php echo e(asset('storage/'.$product->photos[0])); ?>" alt="product-img">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="product-hover-overlay">
                                            <button wire:click="wishlist(<?php echo e($product->id); ?>)" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></button>
                                            <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="View detail"><i class="ti-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="product-info">
                                        <div class="product-info">
                                            <h3 class="mb-md-4 mb-3"><a class="text-color" href="product-single.html"><?php echo e($product->productname); ?></a></h3>
                                            <p class="mb-md-4 mb-3"><?php echo e($product->description); ?></p>
                                            <span class="h4">$<?php echo e($product->price); ?></span>
                                            <ul class="list-inline mt-3">
                                                <li class="list-inline-item"><button wire:click="$emit('toCart' , <?php echo e($product->id); ?> )" class="btn btn-dark btn-sm">Add To Cart</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product label badge -->
                            <?php if($product->discount): ?>
                            <div class="product-label sale">
                                -<?php echo e($product->discount); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-12" style="margin-bottom: 50px;margin-top:15px;background:white">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php echo e($products->links()); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/shop-component.blade.php ENDPATH**/ ?>