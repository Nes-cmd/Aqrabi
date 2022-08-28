<div>
    <!-- /shop -->
    <section class="section">
    <div class="container">
        
        <div class="row">  
            <div class="col-lg-3 mb-lg-0">
                <!-- search product -->
                <div class="position-relative mb-5">
                    <form action="#">
                        <input type="search" class="form-control rounded-0" id="search-product" placeholder="Search...">
                        <button type="submit" class="search-icon pr-3 r-0"><i class="ti-search text-color"></i></button>
                    </form>
                </div> 
                <!-- categories -->
                <div class="mb-30">
                    <h4 class="mb-3">Shop by Categories</h4>
                    <ul class="pl-0 shop-list list-unstyled">
                        @foreach ($categories as $cat)
                        <li>
                            <p wire:click="subcategory({{$cat->id}})" class="d-flex py-2 text-gray justify-content-between">
                                <span>{{ $cat->name }}</span>
                            </p>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- product-list -->
            <div class="col-lg-9">
                @if($viewType == 'list')
                <div>
                    @foreach($products as $product)
                    <div class="product mb-4">
                        <div class="row align-items-center">
                            <div class="col-sm-4">
                                <div class="product-thumb position-relative text-center">
                                    <div class="overflow-hidden position-relative">
                                        <a href="{{route('shop.single-product', $product->id)}}">
                                            <img class="img-fluid w-100 mb-3 img-first" src="{{ asset('storage/'.$product->main_photo)}}" alt="product-img">
                                            @if(count($product->photos) > 0)
                                            <img class="img-fluid w-100 mb-3 img-second" src="{{ asset('storage/'.$product->photos[0])}}" alt="product-img">
                                            @endif
                                        </a>
                                    </div>
                                    <div class="product-hover-overlay">
                                        <button wire:click="wishlist({{$product->id}})" class="product-icon favorite" data-toggle="tooltip" data-placement="left"
                                            title="Wishlist"><i class="ti-heart"></i></button>
                                        <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left"
                                            title="View detail"><i class="ti-search"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-8">
                                <div class="product-info">
                                    <div class="product-info">
                                        <h3 class="mb-md-4 mb-3"><a class="text-color" href="product-single.html">{{ $product->productname }}</a></h3>
                                        <p class="mb-md-4 mb-3">{{ $product->description }}</p>
                                        <span class="h4">${{ $product->price }}</span>
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
                @else
                <div class="row">
                    @foreach($products as $product)
                    <!-- product -->
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <div class="product text-center">
                            <div class="product-thumb">
                                <div class="overflow-hidden position-relative">
                                    <a href="{{ route('shop.product-single', $product->id)}}">
                                        <img class="img-fluid w-100 mb-3 img-first" src="{{ asset('storage/'.$product->main_photo)}}" alt="product-img">
                                        @if(count($product->photos) > 0)
                                        <img class="img-fluid w-100 mb-3 img-second" src="{{ asset('storage/'.$product->photos[0])}}" alt="product-img">
                                        @endif
                                    </a>
                                    <div class="btn-cart">
                                        <button wire:click="$emit('toCart' , {{$product->id}} )" class="btn btn-primary btn-sm">Add To Cart</button>
                                    </div>
                                </div>
                                <div class="product-hover-overlay">
                                    <a wire:click="wishlit({{$product->id}})" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></a>
                                    <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><i class="ti-direction-alt"></i></a>
                                    <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                                </div>
                            </div>
                            <div class="product-info">
                                <h3 class="h5">{{ $product->name }}</h3>
                                <span class="h5">${{$product->price}}</span>
                            </div>
                            <!-- product label badge -->
                            @if($product->discount)
                                <div class="product-label sale">
                                -{{$product->discount}}
                                </div>
                            @endif
                        </div>
                    </div>
                    <!-- //end of product -->
                    <!-- product -->
                    @endforeach
                </div>
                @endif
                <div class="col-12 mt-5">
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
    <!--  -->
    <script>
    function priceFilter(){
        var value = document.getElementsByClassName('value');
        Livewire.emit('priceFilter', value[0].innerText);
    }
    </script>

</div>
