<x-customer-layout>
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
                        <li class="list-inline-item"><a  href="{{ route('customer.dashboard')}}">Dashboard</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.orders')}}">Orders</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.address')}}">Address</a></li>
                        <li class="list-inline-item"><a class="active" href="{{ route('customer.profile')}}">Profile Details</a></li>
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

</x-customer-layout>