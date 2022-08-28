<x-customer-layout>
<!-- main wrapper -->
    <div class="main-wrapper">
        <!-- Page Wrapper -->
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="block text-center">
                            <h3 class="text-center mb-3">Thank you! For your order</h3>
                            <p class="text-color">Your order has been placed and will be processed as soon as possible. Make sure you make note of your order number, which is <span class="text-primary">{{ '#'.$orderId }}</span> You will be receiving an email shortly with confirmation
                                of your order. You can now:</p>
                            <a href="{{ route('shop.list')}}" class="btn btn-primary mt-3 mx-2">Go To Shopping</a>
                            <a href="{{ url('/customer-dashboard/#')}}" class="btn btn-dark mt-3 mx-2">Track order</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.page-warpper -->
    <div>
</x-customer-layout>