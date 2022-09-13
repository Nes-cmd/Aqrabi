<?php if (isset($component)) { $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- Page Wrapper -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                        <h3 class="text-center mb-3">How do you want to continue?</h3>
                        <p class="text-color">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem molestiae sapiente, voluptates esse iste aliquid sequi, inventore quo doloremque modi vitae incidunt animi nam ullam aperiam ad nostrum nulla illum!</p>
                        <a href="<?php echo e(route('register-user','customer')); ?>" class="btn btn-dark mt-3 mx-2">Customer Account</a>
                        <a href="<?php echo e(route('register-user','supplier')); ?>" class="btn btn-dark mt-3 mx-2">Supplier Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.page-warpper -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/customer/choose-user.blade.php ENDPATH**/ ?>