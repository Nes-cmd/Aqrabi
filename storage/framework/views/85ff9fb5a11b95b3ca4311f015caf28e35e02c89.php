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
                        <li class="list-inline-item"><a class="active" href="<?php echo e(route('customer.address')); ?>">Address</a></li>
                        <li class="list-inline-item"><a href="<?php echo e(route('customer.profile')); ?>">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Company</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Country</th>
                                        <th>Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nokia</td>
                                        <td>Adam Smith</td>
                                        <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                                        <td>Bangladesh</td>
                                        <td>+884 5452 6452</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary"><i class="ti-pencil" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-primary"><i class="ti-close" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Samsung</td>
                                        <td>Adam Smith</td>
                                        <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                                        <td>Bangladesh</td>
                                        <td>+884 5452 6452</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary"><i class="ti-pencil" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-primary"><i class="ti-close" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Motorola</td>
                                        <td>Adam Smith</td>
                                        <td>9/4 C Babor Road, Mohammad Pur, Dhaka</td>
                                        <td>Bangladesh</td>
                                        <td>+884 5452 6452</td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <button type="button" class="btn btn-sm btn-outline-primary"><i class="ti-pencil" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-sm btn-outline-primary"><i class="ti-close" aria-hidden="true"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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
<?php endif; ?><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/customer/address.blade.php ENDPATH**/ ?>