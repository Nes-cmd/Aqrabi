<x-customer-layout>
    <!-- Page Wrapper -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="block text-center">
                        <h3 class="text-center mb-3">How do you want to continue?</h3>
                        <p class="text-color">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem molestiae sapiente, voluptates esse iste aliquid sequi, inventore quo doloremque modi vitae incidunt animi nam ullam aperiam ad nostrum nulla illum!</p>
                        <a href="{{route('register-user','customer')}}" class="btn btn-dark btn-sm mt-3 mx-2">Customer Account</a>
                        <a href="{{route('register-user','supplier')}}" class="btn btn-dark btn-sm mt-3 p-2 mx-2">Supplier Account</a>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.page-warpper -->
</x-customer-layout>