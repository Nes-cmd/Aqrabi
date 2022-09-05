<x-customer-layout>
    <!-- Page Wrapper -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                        <h3 class="text-center mb-3">How do you want to continue?</h3>
                        <p class="text-color">Your order has been placed and will be processed as soon as possible. Make sure you make note of your order number, which is <span class="text-primary">34VB5540K83</span> You will be receiving an email shortly with confirmation of your order. You can now:</p>
                        <a href="{{route('register-user','customer')}}" class="btn btn-dark btn-sm mt-3 mx-2">Customer Account</a>
                        <a href="{{route('register-user','supplier')}}" class="btn btn-dark btn-sm mt-3 p-2 mx-2">Supplier Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.page-warpper -->
</x-customer-layout>