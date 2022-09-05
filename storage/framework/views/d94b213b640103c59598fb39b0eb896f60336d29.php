<?php if (isset($component)) { $__componentOriginal9bf5f254b2098a37a58c641b2483bb17f45f92d2 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\CustomerLayout::class, [] + (isset($attributes) ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('customer-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $constructor = (new ReflectionClass(App\View\Components\CustomerLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">My Accounts</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->

    <section class="user-dashboard section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <ul class="list-inline dashboard-menu text-center">
                        <li class="list-inline-item"><a  href="<?php echo e(route('customer.dashboard')); ?>">Dashboard</a></li>
                        <li class="list-inline-item"><a href="<?php echo e(route('customer.orders')); ?>">Orders</a></li>
                        <li class="list-inline-item"><a href="<?php echo e(route('customer.address')); ?>">Address</a></li>
                        <li class="list-inline-item"><a class="active" href="<?php echo e(route('customer.profile')); ?>">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper dashboard-user-profile">
                        <div class="media">
                            <div class="text-center">
                                <img class="media-object user-img" src="images/avater.jpg" alt="Image">
                                <a href="#" class="btn btn-sm mt-3 d-block">Change Image</a>
                            </div>
                            <div class="media-body">
                                <ul class="user-profile-list">
                                    <li><span>Full Name:</span>Johanna Doe</li>
                                    <li><span>Country:</span>USA</li>
                                    <li><span>Email:</span>mail@gmail.com</li>
                                    <li><span>Phone:</span>+880123123</li>
                                    <li><span>Date of Birth:</span>Dec , 22 ,1991</li>
                                </ul>
                            </div>
                        </div>
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
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/customer/profile.blade.php ENDPATH**/ ?>