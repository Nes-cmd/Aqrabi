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
                        <li class="list-inline-item"><a class="active" href="{{ route('customer.orders')}}">Orders</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.address')}}">Address</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.profile')}}">Profile Details</a></li>
                    </ul>
                    <div class="dashboard-wrapper user-dashboard">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Items</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>#451231</td>
                                        <td>Mar 25, 2016</td>
                                        <td>2</td>
                                        <td>$99.00</td>
                                        <td><span class="badge badge-primary">Processing</span></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#451231</td>
                                        <td>Mar 25, 2016</td>
                                        <td>3</td>
                                        <td>$150.00</td>
                                        <td><span class="badge badge-success">Completed</span></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#451231</td>
                                        <td>Mar 25, 2016</td>
                                        <td>3</td>
                                        <td>$150.00</td>
                                        <td><span class="badge badge-danger">Canceled</span></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#451231</td>
                                        <td>Mar 25, 2016</td>
                                        <td>2</td>
                                        <td>$99.00</td>
                                        <td><span class="badge badge-info">On Hold</span></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                    <tr>
                                        <td>#451231</td>
                                        <td>Mar 25, 2016</td>
                                        <td>3</td>
                                        <td>$150.00</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                        <td><a href="#" class="btn btn-sm btn-outline-primary">View</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-customer-layout>