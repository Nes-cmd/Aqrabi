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
    <section class="signin-page account">
        <div class="container">
            <div style="height: 1100px;margin-top:60px;">
                <div class="row align-items-center bg-secondary">
                    <div class="col-md-6 d-none d-lg-block p-0">
                        <div class="text-center">
                            <img width="60%" height="auto" src="logo.svg" alt="">
                        </div>
                    </div>
                    <div class="col-md-6 p-0">
                        <div class="block text-center m-0">
                            <h2 class="text-center">Create Account</h2>
                            <form class="text-left clearfix" method="post" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="user_type" value="<?php echo e(session()->get('type')); ?>">
                                <div class="form-group">
                                    <input type="text" name="fullname" value="<?php echo e(old('fullname')); ?>" class="form-control" placeholder="Full Name">
                                </div>
                                <?php $__errorArgs = ['fullname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span style="color:red;padding-left:3px"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-group">
                                    <input type="email" name="email" value="<?php echo e(old('email')); ?>" class="form-control" placeholder="Email">
                                </div>
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span style="color:red;padding-left:3px"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-group" style="display:flex">
                                    <select name="country_code" value="<?php echo e(old('country_code')); ?>" class="form-control phone">
                                        <option value="+251">Ethiopia (+251)</option>
                                        <option value="+251">Ertria (+252)</option>
                                    </select>
                                    <input name="phone" value="<?php echo e(old('phone')); ?>" class="form-control" placeholder="09434..." type="text">
                                </div>
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

                                <div class="form-group">
                                    <input type="text" name="tin_number" value="<?php echo e(old('tin_number')); ?>" class="form-control" placeholder="Tin number eg 54522">
                                </div>
                                <?php $__errorArgs = ['tin_number'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span style="color:red;padding-left:3px"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                                <div class="form-group">
                                    <input type="password" name="password" class="form-control" placeholder="Password">
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span style="color:red;padding-left:3px"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="form-group">
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="Re enter password">
                                </div>

                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="inputGroupFileAddon01">Your document</span>
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" name="document_url" class="custom-file-input" value="<?php echo e(old('document_url')); ?>" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                                        <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                                    </div>
                                </div>
                                <?php $__errorArgs = ['document_url'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <span style="color:red;padding-left:3px;"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <div class="text-center m-5">
                                    <button type="submit" class="btn btn-dark">Register</button>
                                </div>
                            </form>
                            <p class="mt-3">Already hava an account ?<a href="<?php echo e(route('login')); ?>"> Login</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        })
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2)): ?>
<?php $component = $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2; ?>
<?php unset($__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2); ?>
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/auth/register.blade.php ENDPATH**/ ?>