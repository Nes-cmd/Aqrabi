<?php if (isset($component)) { $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <section class="forget-password-page account">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                        <a class="logo" href="index.html">
                            <img src="images/logo.png" alt="logo">
                        </a>
                        <h2 class="text-center">Please confirm your phone</h2>
                        <form action="<?php echo e(route('check-verification')); ?>" method="post" class="text-left clearfix">
                        <?php echo csrf_field(); ?>    
                        <p>A verification code sent to your phone <i><?php echo e(auth()->user()->phone); ?></i>. Once you have received the verification code, please entr that code here to verify the phone.</p>
                            <div class="form-group">
                                <input type="text" name="confirmation_code" class="form-control" id="exampleInputEmail1" placeholder="Enter the code">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <p class="mt-3"><a href="<?php echo e(route('login')); ?>">Back to log in</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/auth/confirm-phone.blade.php ENDPATH**/ ?>