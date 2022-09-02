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

        <section class="page-404 section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <a href="index.html">
                            <!-- <img src="images/logo.png" alt="site logo" /> -->
                            <h2>Aqrabi</h2>
                        </a>
                        <h1>404</h1>
                        <h2>Page Not Found</h2>
                        <a href="<?php echo e(url('/')); ?>" class="btn btn-primary mt-4"><i class="ti-angle-double-left"></i> Go Home</a>
                        
                    </div>
                </div>
            </div>
        </section>

    </div>
    <!-- /main wrapper -->
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/errors/404.blade.php ENDPATH**/ ?>