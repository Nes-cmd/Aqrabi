<?php if (isset($component)) { $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div>
        <div class="container">
            <div class="mx-auto py-16 sm:w-2/3 md:w-3/5 md:py-20 lg:w-1/2 lg:py-24 xl:w-2/5">
                <form method="post" action="<?php echo e(route('login')); ?>" class="rounded border border-grey-dark py-8 px-10 shadow">
                    <?php echo csrf_field(); ?>
                    <label class="block pb-3 font-hk text-secondary" for="first_name">Phone number</label>
                    <input type="text" placeholder="Enter your Phone" name="phone" id="phone" value="<?php echo e(old('phone')); ?>" class="form-input mb-6" />
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger" style="color:red"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <label class="block pb-3 font-hk text-secondary" for="password">Password</label>
                    <input name="password" type="password" placeholder="Enter your password" name="password" class="form-input mb-6" id="password" />
                    <button type="submit" class="btn btn-primary mb-4 w-full" aria-label="Create account button">
                        Login
                    </button>

                    <a href="<?php echo e(route('register')); ?>" class="mt-2 flex items-center justify-center">
                        <i class="bx bx-chevron-left -mb-1 text-2xl leading-none text-secondary"></i>
                        <span class="ml-1 font-hk leading-none text-secondary">Don' have account?</span>
                    </a>
                </form>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/auth/login.blade.php ENDPATH**/ ?>