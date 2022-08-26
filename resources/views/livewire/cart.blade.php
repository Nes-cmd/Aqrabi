<div class="cart">
    <button id="cartOpen" class="cart-btn"><i class="ti-bag"></i><span class="d-xs-none">CART</span> {{ $cart_size }}</button>
    <div class="cart-wrapper">
        <i id="cartClose" class="ti-close cart-close"></i>
        <h4 class="mb-4">Your Cart</h4>
        @if($cart_size)
        <ul class="pl-0 mb-3">
      
        @foreach($carts as $cart)
        <li class="d-flex border-bottom">
            <img width="70px" src="{{ asset('storage/'.json_decode($cart['photos'])[0])}}" alt="product-img">
            <div class="mx-3">
            <h6>{{$cart['name']}}</h6>
            <span>{{ $cart['quantity'] }}</span> X <span>${{$cart['price']}}</span>
            </div>
            <i wire:click="remove({{ $cart['id'] }})" class="ti-close"></i>
        </li>
        @endforeach
        </ul>
        <div class="mb-3">
        <span>Cart Total</span>
        <span class="float-right">${{cartTotal()['discounted']}}</span>
        </div>
        <div class="text-center">
        <a href="{{ route('shop.cart')}}" class="btn btn-dark btn-mobile rounded-0">view cart</a>
        <a href="{{ route('shop.checkout')}}" class="btn btn-dark btn-mobile rounded-0">check out</a>
        </div>
        @else
        <h4>Your cart is empty!</h4>
        @endif
    </div>
</div>