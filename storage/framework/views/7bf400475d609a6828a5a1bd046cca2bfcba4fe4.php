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
                                                <th>Price( ETB )</th>
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
                                                <td><?php echo e($cart->product->price); ?>

                                                    
                                                </td>
                                                <td >
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"> 
                                                        <span class="input-group-btn input-group-prepend"><button wire:click="decrement(<?php echo e($cart->id); ?>)" class="btn btn-primary bootstrap-touchspin-down" type="button">-</button></span>
                                                        <input wire:model.lazy="carts.<?php echo e($loop->index); ?>.quantity"  type="text" class="form-control" value="<?php echo e($cart->quantity); ?>" >
                                                        <span class="input-group-btn input-group-append"><button wire:click="increment(<?php echo e($cart->id); ?>)" class="btn btn-primary bootstrap-touchspin-up" type="button">+</button></span>    
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    <?php echo e($cart->product->price * $cart->quantity .' birr'); ?>

                                                    
                                                </td>
                                            </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex flex-column flex-md-row align-items-center mb-2">
                                    <input wire:model="promocode" type="text" class="form-control text-md-left text-center mb-3 mb-md-0" name="coupon" id="coupon" placeholder="I have a discout coupon">
                                    
                                    <button wire:click="applyCupon" class="btn btn-outline-primary ml-md-3 w-100 mb-3 mb-md-0">Apply Coupon</button>
                                </div>
                                <?php $__errorArgs = ['promocode'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                        <span style="color:red"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-unstyled text-right">
                                            <li>Total <span class="d-inline-block w-100px"><?php echo e(cartTotal()['total'] .'  ETB'); ?></span></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <a href="<?php echo e(route('shop.checkout')); ?>" class="btn btn-dark float-right">Checkout</a>
                                
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