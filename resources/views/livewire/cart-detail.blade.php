<div class="main-wrapper">
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->
    <div class="section">
        <div class="cart shopping"> 
            <div class="container">
                <div class="row">
                    <div class="col-md-10 mx-auto">
                        <div class="block">
                            <div class="product-list">
                                
                                <div class="table-responsive">
                                    <table class="table cart-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product Name</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $cart)
                                            <tr>
                                                <td>
                                                    <button wire:click="removeCart({{$cart->id}})" class="product-remove">&times;</button>
                                                </td>
                                                <td>
                                                    <div class="product-info">
                                                        <img width="60px" class="img-fluid" src="{{ asset('storage/'.$cart->product->main_photo) }}" alt="product-img" />
                                                        <a href="#">{{ $cart->product->productname }}</a>
                                                    </div>
                                                </td>
                                                <td>${{$cart->product->price }}
                                                    
                                                </td>
                                                <td >
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"> 
                                                        <span class="input-group-btn input-group-prepend"><button wire:click="decrement({{$cart->id }})" class="btn btn-primary bootstrap-touchspin-down" type="button">-</button></span>
                                                        <input wire:model.lazy="carts.{{$loop->index}}.quantity"  type="text" class="form-control" value="{{$cart->quantity}}" >
                                                        <span class="input-group-btn input-group-append"><button wire:click="increment({{$cart->id}})" class="btn btn-primary bootstrap-touchspin-up" type="button">+</button></span>    
                                                    </div>
                                                </td>
                                                <td>
                                                    
                                                    ${{$cart->product->price * $cart->quantity}}
                                                    
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                               
                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-unstyled text-right">
                                            <li>Total <span class="d-inline-block w-100px">${{ cartTotal()['total'] }}</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <hr>
                                <a href="{{ '#' }}" class="btn btn-dark float-right">Checkout</a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- F4C803 yellow -->
<!-- F4C803 red -->
<!-- 162A3C black req -->
<!-- 162A3C black remove -->
</div>

