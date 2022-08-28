<?php if (isset($component)) { $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<!-- main wrapper -->
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="block text-center">
                            <h3 class="text-center mb-3">Thank you! For your order</h3>
                            <p class="text-color">Your order has been placed and will be processed as soon as possible. Make sure you make note of your order number, which is <span class="text-primary"><?php echo e('#'.$orderId); ?></span> You will be receiving an email shortly with confirmation
                                of your order. You can now:</p>
                            <a href="<?php echo e(route('shop.list')); ?>" class="btn btn-primary mt-3 mx-2">Go To Shopping</a>
                            <a href="<?php echo e(url('/customer-dashboard/#')); ?>" class="btn btn-dark mt-3 mx-2">Track order</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.page-warpper -->
    <div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/customer/order-success.blade.php ENDPATH**/ ?>