<div>
    <!-- /shop -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-lg-0">
                    <!-- categories -->
                    <div class="mb-30">
                        <h4 class="mb-3">Shop by Categories</h4>
                        <ul class="pl-0 shop-list list-unstyled">
                            @foreach ($categories as $cat)
                            <li>
                                <p  wire:click="categoryFilter({{$cat->id}})" class="pl-2 justify-content-between {{$categoryFilterId==$cat->id?'text-primary':''}}">
                                    <span>{{ $cat->name }}</span>
                                </p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- product-list -->
                <div class="col-lg-9">
                    <div>
                        @foreach($products as $product)
                        <div class="product mb-4">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="product-thumb position-relative text-center">
                                        <div class="overflow-hidden position-relative">
                                            <a href="{{route('shop.single-product', $product->id)}}">
                                                <img style="height: 200px;width: 300px;" class="img-fluid mb-3 img-first" src="{{ asset('storage/'.$product->main_photo)}}" alt="product-img">
                                                @if(count($product->photos) > 0)
                                                <img style="height: 200px;width: 300px;" class="img-fluid mb-3 img-second" src="{{ asset('storage/'.$product->photos[0])}}" alt="product-img">
                                                @endif
                                            </a>
                                        </div>
                                        <div class="product-hover-overlay">
                                            <button wire:click="wishlist({{$product->id}})" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></button>
                                            <a href="{{route('shop.single-product', $product->id)}}" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="View detail"><i class="ti-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="product-info">
                                        <div class="product-info">
                                            <h3 class="mb-md-4 mb-3"><a class="text-color" href="product-single.html">{{ $product->productname }}</a></h3>
                                            <p class="mb-md-4 mb-3">{{ $product->description }}</p>
                                            <span class="h4">{{ $product->price }}  ETB</span>
                                            <ul class="list-inline mt-3">
                                                <li class="list-inline-item"><button wire:click="$emit('toCart' , {{$product->id}} )" class="btn btn-dark btn-sm">Add To Cart</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product label badge -->
                            @if($product->discount)
                            <div class="product-label sale">
                                -{{$product->discount}}
                            </div>
                            @endif
                        </div>
                        @endforeach
                    </div>
                    <div class="col-12" style="margin-bottom: 50px;margin-top:15px;background:white">
                        <nav>
                            <ul class="pagination justify-content-center">
                                {{$products->links()}}
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>