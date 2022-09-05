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
                        <li class="list-inline-item"><a class="active" href="{{ route('customer.address')}}">Address</a></li>
                        <li class="list-inline-item"><a href="{{ route('customer.profile')}}">Profile Details</a></li>
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
</x-customer-layout>