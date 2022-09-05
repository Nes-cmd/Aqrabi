<x-customer-layout>
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->
    <section class="user-dashboard section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="list-inline dashboard-menu text-center">
                        <li class="list-inline-item"><a class="active" href="{{ route('customer.dashboard')}}">Dashboard</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.orders')}}">Orders</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.address')}}">Address</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.profile')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="media">
                            <div class="pull-left mr-3">
                                <img class="media-object user-img" src="{{asset('customer/images/avater.jpg')}}" alt="Image">
                            </div>
                            <div class="media-body align-self-center">
                                <h2 class="media-heading">Welcome {{auth()->user()->fullname}}</h2>
                                <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, iure, est. Sit mollitia est maxime! Eos cupiditate tempore, tempora omnis. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, nihil. </p>
                            </div>
                        </div>
                        <div class="total-order mt-4">
                            <h4>Total Orders</h4>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Date</th>
                                            <th>Items</th>
                                            <th>Total Price</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><a href="#">#252125</a></td>
                                            <td>Mar 25, 2016</td>
                                            <td>2</td>
                                            <td>$ 99.00</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">#252125</a></td>
                                            <td>Mar 25, 2016</td>
                                            <td>2</td>
                                            <td>$ 99.00</td>
                                        </tr>
                                        <tr>
                                            <td><a href="#">#252125</a></td>
                                            <td>Mar 25, 2016</td>
                                            <td>2</td>
                                            <td>$ 99.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div>
                            <form method="post" action="{{route('logout')}}">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-dark">Sign out</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>