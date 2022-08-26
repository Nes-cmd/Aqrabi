<div>
    <!-- /shop -->
    <section class="section">
    <div class="container">
        <div class="row">
            <!-- top bar -->
            <div class="col-lg-12 mb-50">
                <div class="d-flex border">
                    <div class="flex-basis-15 p-2 p-sm-4 border-right text-center">
                        <button wire:click="$set('viewType', 'grid')" class="text-gray d-inline-block px-1" href="shop.html"><i class="ti-layout-grid3-alt"></i></button>
                        <button wire:click="$set('viewType', 'list')" class="text-color d-inline-block px-1" href="shop-list.html"><i class="ti-view-list-alt"></i></button>
                    </div>
                    <div class="flex-basis-55 p-2 p-sm-4 align-self-sm-center">
                        <p class="text-gray mb-0">Showing <span class="text-color">1-9 of 20</span> Results</p>
                    </div>
                </div>
            </div>
            <!-- sidebar -->
            <div class="col-lg-3 mb-lg-0 mb-5">
                <!-- search product -->
                <div class="position-relative mb-5">
                    <form action="#">
                        <input type="search" class="form-control rounded-0" id="search-product" placeholder="Search...">
                        <button type="submit" class="search-icon pr-3 r-0"><i class="ti-search text-color"></i></button>
                    </form>
                </div>
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
                <?php if($viewType == 'list'): ?>
                <div>
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="product mb-4">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <div class="product-thumb position-relative text-center">
                                    <div class="overflow-hidden position-relative">
                                        <a href="#">
                                            <img class="img-fluid w-100 mb-3 img-first" src="<?php echo e(asset('storage/'.$product->main_photo)); ?>" alt="product-img">
                                            <?php if(count($product->photos) > 0): ?>
                                            <img class="img-fluid w-100 mb-3 img-second" src="<?php echo e(asset('storage/'.$product->photos[0])); ?>" alt="product-img">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                    <div class="product-hover-overlay">
                                        <button wire:click="wishlit(<?php echo e($product->id); ?>)" class="product-icon favorite" data-toggle="tooltip" data-placement="left"
                                            title="Wishlist"><i class="ti-heart"></i></button>
                                        <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left"
                                            title="Compare"><i class="ti-direction-alt"></i></a>
                                        <a data-vbtype="inline" href="#quickView" class="product-icon view venobox"
                                            data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
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
                                            <li class="list-inline-item"><button wire:click="wishlit(<?php echo e($product->id); ?>)" class="btn btn-dark btn-sm">Add To
                                                Favorite</button></li>
                                            <li class="list-inline-item"><button wire:click="$emit('toCart' , <?php echo e($product->id); ?> )" class="btn btn-primary btn-sm">Add To cart</button></li>
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
                <?php else: ?>
                <div class="row">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!-- product -->
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="product text-center">
                            <div class="product-thumb">
                                <div class="overflow-hidden position-relative">
                                    <a href="<?php echo e(route('shop.product-single', $product->id)); ?>">
                                        <img class="img-fluid w-100 mb-3 img-first" src="<?php echo e(asset('storage/'.$product->main_photo)); ?>" alt="product-img">
                                        <?php if(count($product->photos) > 0): ?>
                                        <img class="img-fluid w-100 mb-3 img-second" src="<?php echo e(asset('storage/'.$product->photos[0])); ?>" alt="product-img">
                                        <?php endif; ?>
                                    </a>
                                    <div class="btn-cart">
                                        <button wire:click="$emit('toCart' , <?php echo e($product->id); ?> )" class="btn btn-primary btn-sm">Add To Cart</button>
                                    </div>
                                </div>
                                <div class="product-hover-overlay">
                                    <a wire:click="wishlit(<?php echo e($product->id); ?>)" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></a>
                                    <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><i class="ti-direction-alt"></i></a>
                                    <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="h5"><?php echo e($product->name); ?></h3>
                                <span class="h5">$<?php echo e($product->price); ?></span>
                            </div>
                            <!-- product label badge -->
                            <?php if($product->discount): ?>
                                <div class="product-label sale">
                                -<?php echo e($product->discount); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- //end of product -->
                    <!-- product -->
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
                <div class="col-12 mt-5">
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
    <!--  -->
    <script>
    function priceFilter(){
        var value = document.getElementsByClassName('value');
        Livewire.emit('priceFilter', value[0].innerText);
    }
    </script>

</div>
<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/shop-component.blade.php ENDPATH**/ ?>