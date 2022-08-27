<div class="main-wrapper">
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
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
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td>
                                                    <button wire:click="removeCart(<?php echo e($cart->id); ?>)" class="product-remove">&times;</button>
                                                </td>
                                                <td>
                                                    <div class="product-info">
                                                        <img width="60px" class="img-fluid" src="<?php echo e(asset('storage/'.$cart->product->main_photo)); ?>" alt="product-img" />
                                                        <a href="#"><?php echo e($cart->product->productname); ?></a>
                                                    </div>
                                                </td>
                                                <td>$<?php echo e($cart->product->price); ?>

                                                    
                                                </td>
                                                <td >
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"> 
                                                        <span class="input-group-btn input-group-prepend"><button wire:click="decrement(<?php echo e($cart->id); ?>)" class="btn btn-primary bootstrap-touchspin-down" type="button">-</button></span>
                                                        <input wire:model.lazy="carts.<?php echo e($loop->index); ?>.quantity"  type="text" class="form-control" value="<?php echo e($cart->quantity); ?>" >
                                                        <span class="input-group-btn input-group-append"><button wire:click="increment(<?php echo e($cart->id); ?>)" class="btn btn-primary bootstrap-touchspin-up" type="button">+</button></span>    
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    $<?php echo e($cart->product->price * $cart->quantity); ?>

                                                    
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                               
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-unstyled text-right">
                                            <li>Total <span class="d-inline-block w-100px">$<?php echo e(cartTotal()['total']); ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <a href="<?php echo e('#'); ?>" class="btn btn-dark float-right">Checkout</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- F4C803 yellow -->
<!-- F4C803 red -->
<!-- 162A3C black req -->
<!-- 162A3C black remove -->
</div>

<?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/cart-detail.blade.php ENDPATH**/ ?>