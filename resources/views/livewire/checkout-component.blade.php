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
                            <div class="text-center d-inline-block nav-item {{ $page=='shippment'?'active':''}}">
                                <i class="ti-truck d-block mb-2"></i>
                                <span class="d-block h4">Shipping Adress</span>
                            </div>
                            <div class="text-center d-inline-block nav-item {{ $page=='review'?'active':''}}" style="width: 50%;">
                                <i class="ti-eye d-block mb-2"></i>
                                <span class="d-block h4">Review</span>
                            </div>
                            </div>
                        </div>
                        @if($page == 'shippment')
                            @livewire('shippment-component')
                        @elseif($page == 'review')
                            @livewire('review-component', ['shippmentAdress' => $shippmentAdress ])
                        @endif
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="border-box p-4">
                        <h4>Order Summery</h4>
                        <p>Excepteur sint occaecat cupidat non proi dent sunt.officia.</p>
                        <ul class="list-unstyled">
                            <li class="d-flex justify-content-between">
                                <span>Subtotal</span>
                                <span>ETB {{ cartTotal()['total'] }}</span>
                            </li>
                            <li class="d-flex justify-content-between">
                                <span>Estimated Tax</span>
                                <span>0.00</span>
                            </li>
                        </ul>
                        <hr>
                        <div class="d-flex justify-content-between">
                            <span>Total</span>
                            <strong>ETB {{cartTotal()['discounted']}}</strong>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>