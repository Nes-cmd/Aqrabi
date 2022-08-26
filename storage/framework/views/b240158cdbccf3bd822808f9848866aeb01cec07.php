<div class="cart">
    <button id="cartOpen" class="cart-btn"><i class="ti-bag"></i><span class="d-xs-none">CART</span> <?php echo e($cart_size); ?></button>
    <div class="cart-wrapper">
        <i id="cartClose" class="ti-close cart-close"></i>
        <h4 class="mb-4">Your Cart</h4>
        <?php if($cart_size): ?>
        <ul class="pl-0 mb-3">
      
        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cart): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li class="d-flex border-bottom">
            <img width="70px" src="<?php echo e(asset('storage/'.json_decode($cart['photos'])[0])); ?>" alt="product-img">
            <div class="mx-3">
            <h6><?php echo e($cart['name']); ?></h6>
            <span><?php echo e($cart['quantity']); ?></span> X <span>$<?php echo e($cart['price']); ?></span>
            </div>
            <i wire:click="remove(<?php echo e($cart['id']); ?>)" class="ti-close"></i>
        </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
        <div class="mb-3">
        <span>Cart Total</span>
        <span class="float-right">$<?php echo e(cartTotal()['discounted']); ?></span>
        </div>
        <div class="text-center">
        <a href="<?php echo e(route('shop.cart')); ?>" class="btn btn-dark btn-mobile rounded-0">view cart</a>
        <a href="<?php echo e(route('shop.checkout')); ?>" class="btn btn-dark btn-mobile rounded-0">check out</a>
        </div>
        <?php else: ?>
        <h4>Your cart is empty!</h4>
        <?php endif; ?>
    </div>
</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/cart.blade.php ENDPATH**/ ?>