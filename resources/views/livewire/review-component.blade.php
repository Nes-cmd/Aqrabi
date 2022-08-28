<div>
    <h3>Order Review</h3>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <td>Image</td>
                    <td>Product Name</td>
                    <td>Quantity</td>
                    <td>Sub Total</td>
                </tr>
            </thead>
            <tbody>
            
                @foreach($carts as $cart)
                <tr>
                    <td class="align-middle"><img width="70px" class="img-fluid" src="{{ asset('storage/'.$cart->product->main_photo)}}" alt="product-img" /></td>
                    <td class="align-middle">{{$cart->product->productname}}</td>
                    <td class="align-middle">{{ $cart->quantity }}</td>
                    <td class="align-middle">{{ $cart->product->price * $cart->quantity }}</td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>
    <!-- /review -->

    <!-- shipping-information -->
    @if($shippmentAdress) 
    <h3 class="mb-5 border-bottom pb-2">Shipping Information</h3>
    <div class="row mb-5">
        <div class="col-md-4">
            <h4 class="mb-3">Shipping Address</h4>
            <ul class="list-unstyled">
                <li>{{$shippmentAdress['fullname'] }}</li>
                <li>{{$shippmentAdress['city_name']}}, {{$shippmentAdress['postal_code']}}</li>
                <li>{{$shippmentAdress['phone']}}</li>
                <li>{{$shippmentAdress['email']}}</li>
            </ul>
        </div>
    </div>
    @endif
    <!-- buttons -->
    <div class="p-4 bg-gray d-flex justify-content-between">
        <button wire:click="$emit('pageSelector', 'shippment')" class="btn btn-dark">Back</button>
        <button wire:click="$emit('placeOrder')" class="btn btn-primary">Place Order</button>
    </div>
</div>