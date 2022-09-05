<div class="main-wrapper">
    <!-- breadcrumb -->
    <nav class="bg-gray">
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
                    <div class="col-md-10 ">
                        <div class="">
                            <div class="product-list">

                                <div class="table-responsive">
                                    <table class="table cart-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Product Name</th>
                                                <th>Price( ETB )</th>
                                                <th>Quantity</th>
                                                <th>Sub Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($carts as $cart)
                                            <tr>
                                                <td>
                                                    <button wire:click="removeCart({{$cart->id}})" class="product-remove"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                            <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                                        </svg></button>
                                                </td>
                                                <td>
                                                    <div class="product-info">
                                                        <img width="60px" class="img-fluid" src="{{ asset('storage/'.$cart->product->main_photo) }}" alt="product-img" />
                                                        <a href="#">{{ $cart->product->productname }}</a>
                                                    </div>
                                                </td>
                                                <td>{{$cart->product->price }}

                                                </td>
                                                <td>
                                                    <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
                                                        <span class="input-group-btn input-group-prepend"><button wire:click="decrement({{$cart->id }})" class="btn btn-primary bootstrap-touchspin-down" type="button">-</button></span>
                                                        <input wire:model.lazy="carts.{{$loop->index}}.quantity" type="text" class="form-control" value="{{$cart->quantity}}">
                                                        <span class="input-group-btn input-group-append"><button wire:click="increment({{$cart->id}})" class="btn btn-primary bootstrap-touchspin-up" type="button">+</button></span>
                                                    </div>
                                                </td>
                                                <td>

                                                    {{$cart->product->price * $cart->quantity .' birr'}}

                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <ul class="list-unstyled text-right">
                                            <li>Total <span class="d-inline-block w-100px">{{ cartTotal()['total'] .'  ETB' }}</span></li>
                                        </ul>
                                    </div>
                                </div>

                                <hr>
                                <a href="{{ route('shop.checkout') }}" class="btn btn-dark float-right">Checkout</a>
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