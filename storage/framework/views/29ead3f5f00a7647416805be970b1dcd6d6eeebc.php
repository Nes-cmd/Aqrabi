<div>
    <h3>Order Review</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product Name</td>
                    <td>Quantity</td>
                    <td>Sub Total</td>
                </tr>
            </thead>
            <tbody>
            
                <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td class="align-middle"><img width="70px" class="img-fluid" src="<?php echo e(asset('storage/'.$cart->product->main_photo)); ?>" alt="product-img" /></td>
                    <td class="align-middle"><?php echo e($cart->product->productname); ?></td>
                    <td class="align-middle"><?php echo e($cart->quantity); ?></td>
                    <td class="align-middle"><?php echo e($cart->product->price * $cart->quantity); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
            </tbody>
        </table>
    </div>
    <!-- /review -->

    <!-- shipping-information -->
    <?php if($shippmentAdress): ?> 
    <h3 class="mb-5 border-bottom pb-2">Shipping Information</h3>
    <div class="row mb-5">
        <div class="col-md-4">
            <h4 class="mb-3">Shipping Address</h4>
            <ul class="list-unstyled">
                <li><?php echo e($shippmentAdress['fullname']); ?></li>
                <li><?php echo e($shippmentAdress['city_name']); ?>, <?php echo e($shippmentAdress['postal_code']); ?></li>
                <li><?php echo e($shippmentAdress['phone']); ?></li>
                <li><?php echo e($shippmentAdress['email']); ?></li>
            </ul>
        </div>
    </div>
    <?php endif; ?>
    <!-- buttons -->
    <div class="p-4 bg-gray d-flex justify-content-between">
        <button wire:click="$emit('pageSelector', 'shippment')" class="btn btn-dark">Back</button>
        <button wire:click="$emit('placeOrder')" class="btn btn-primary">Place Order</button>
    </div>
</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/review-component.blade.php ENDPATH**/ ?>