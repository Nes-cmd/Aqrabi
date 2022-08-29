<div class="main-wrapper">
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Shipping Information</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->

    <!-- shipping method -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="inner-wrapper border-box">
                        <!-- navbar -->
                        <div class="justify-content-between mb-5">
                            <div class="row">
                            <div class="text-center d-inline-block nav-item <?php echo e($page=='shippment'?'active':''); ?>">
                                <i class="ti-truck d-block mb-2"></i>
                                <span class="d-block h4">Shipping Adress</span>
                            </div>
                            <div class="text-center d-inline-block nav-item <?php echo e($page=='review'?'active':''); ?>" style="width: 50%;">
                                <i class="ti-eye d-block mb-2"></i>
                                <span class="d-block h4">Review</span>
                            </div>
                            </div>
                        </div>
                        <?php if($page == 'shippment'): ?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('shippment-component')->html();
} elseif ($_instance->childHasBeenRendered('l1388016148-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l1388016148-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1388016148-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1388016148-0');
} else {
    $response = \Livewire\Livewire::mount('shippment-component');
    $html = $response->html();
    $_instance->logRenderedChild('l1388016148-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php elseif($page == 'review'): ?>
                            <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('review-component', ['shippmentAdress' => $shippmentAdress ])->html();
} elseif ($_instance->childHasBeenRendered('l1388016148-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l1388016148-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l1388016148-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l1388016148-1');
} else {
    $response = \Livewire\Livewire::mount('review-component', ['shippmentAdress' => $shippmentAdress ]);
    $html = $response->html();
    $_instance->logRenderedChild('l1388016148-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-box p-4">
                        <h4>Order Summery</h4>
                        <p>Excepteur sint occaecat cupidat non proi dent sunt.officia.</p>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>ETB <?php echo e(cartTotal()['total']); ?></span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Estimated Tax</span>
                                <span>0.00</span>
                            </li>
                        </ul>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <strong>ETB <?php echo e(cartTotal()['discounted']); ?></strong>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/checkout-component.blade.php ENDPATH**/ ?>