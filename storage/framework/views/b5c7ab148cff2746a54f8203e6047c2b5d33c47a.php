<div class="main-wrapper">
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->
    <div class="section">
        <div class="cart shopping"> 
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="block">
                            <div class="product-list">
                                
                                <div class="table-responsive">
                                    <table class="table cart-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Added at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            <?php $__currentLoopData = $wishlists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wishlist): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <button wire:click="removeWishlist(<?php echo e($wishlist->id); ?>)" class="product-remove">&times;</button>
                                                </td>
                                                <td>
                                                    <div class="product-info">
                                                        <img width="60px" class="img-fluid" src="<?php echo e(asset('storage/'.$wishlist->product->main_photo)); ?>" alt="product-img" />
                                                        <a href="#"><?php echo e($wishlist->product->name); ?></a>
                                                    </div>
                                                </td>
                                                <td>$<?php echo e($wishlist->product->price); ?>

                                                    
                                                </td>
                                                <td >
                                                    <?php echo e($wishlist->created_at->diffForHumans()); ?>

                                                </td>
                                                <td>
                                                    <button wire:click="$emit('toCart', <?php echo e($wishlist->product_id); ?>)" class="btn btn-dark mb-4">Add to cart</button>
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/wishlist.blade.php ENDPATH**/ ?>