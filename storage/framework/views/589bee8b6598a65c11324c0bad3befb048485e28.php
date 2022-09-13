<?php if (isset($component)) { $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <style>
        .phone {
            padding-bottom: 7px;
            border-radius: 0px;
            width: 50%;
            /* margin: 2px; */
        }
    </style>
    <section class="forget-password-page account">
        <div class="container">
            <div class="mb-100"></div>
            <div class="row align-items-center bg-secondary mt-50">
                <div class="col-md-6 d-none d-lg-block">
                    <div class="text-center">
                        <img width="60%" height="auto" src="logo.svg" alt="">
                    </div>
                </div>
                <div class="col-md-6 p-0">
                    <div class="block text-center m-0">
                        <h2 class="text-center">Please enter your phone</h2>
                        <form method="post" action="<?php echo e(route('phone-confirmation')); ?>" class="text-left clearfix">
                            <?php echo csrf_field(); ?>
                            <p>A verification code will be sent to you. Once you have received the verification code, you will be able to proceed for your account.</p>
                            <div class="form-group" style="display:flex">
                                <select name="country_code" value="<?php echo e(old('country_code')); ?>" class="form-control phone">
                                    <option value="+251">Ethiopia (+251)</option>
                                    <option value="+251">Ertria (+252)</option>
                                </select>
                                <input name="phone" value="<?php echo e(old('phone')); ?>" class="form-control" placeholder="09434..." type="text">
                            </div>
                            <?php $__errorArgs = ['phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color:red;padding-left:3px"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <?php $__errorArgs = ['country_code'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color:red;padding-left:3px"><?php echo e($message); ?></span>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                            <div class="text-center">
                                <button type="submit" class="btn btn-dark">Submit</button>
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
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/auth/passwords/reset.blade.php ENDPATH**/ ?>