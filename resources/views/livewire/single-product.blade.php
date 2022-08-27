<section>
    <div class="main-wrapper">
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Single</li>
            </ol>
        </div>
    </nav>
    <!-- /breadcrumb -->
    <div id="quickView" class="quickview">
        <div class="row w-100">
            <div class="col-lg-6 col-md-6 mb-5 mb-md-0 pl-5 pt-4 pt-lg-0 pl-lg-0">
                <img src="customer/images/feature/product.png" alt="product-img" class="img-fluid">
            </div>
            <div class="col-lg-5 col-md-6 text-center text-md-left align-self-center pl-5">
                <h3 class="mb-lg-2 mb-2">{{ $product->productname }}</h3>
                <span class="mb-lg-4 mb-3 h5">${{$product->price}}</span>
                <p class="mb-lg-4 mb-3 text-gray">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. sed ut perspic atis unde omnis iste natus</p>
            </div> 
        </div>
    </div>
    <!-- product-single -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <!-- product image slider -->
                    <div class="product-slider">
                        <div data-image="{{ asset($product->main_photo) }}">
                            <img class="img-fluid w-100 h-50 image-zoom" src="{{ asset('storage/'.$product->main_photo) }}" alt="product-img" data-zoom="{{ asset('storage/'.$product->main_photo) }}">
                        </div>
                        @if(count($product->photos) > 0 )
                        <div data-image="{{ asset($product->photos[0]) }}">
                            <img class="img-fluid w-100 image-zoom" src="{{ asset('storage/'.$product->photos[0]) }}" alt="product-img" data-zoom="{{ asset('storage/'.$product->photos[0]) }}">
                        </div>
                        @endif
                        @if(count($product->photos) > 1 )
                        <div data-image="{{ asset($product->photos[1]) }}">
                            <img class="img-fluid w-100 image-zoom" src="{{ asset('storage/'.$product->photos[1]) }}" alt="product-img" data-zoom="{{ asset('storage/'.$product->photos[1]) }}">
                        </div>
                        @endif
                        @if(count($product->photos) > 2 )
                        <div data-image="{{ asset($product->photos[2]) }}">
                            <img class="img-fluid w-100 image-zoom" src="{{ asset('storage/'.$product->photos[2]) }}" alt="product-img" data-zoom="{{ asset('storage/'.$product->photos[2]) }}">
                        </div>
                        @endif
                    </div>
                </div>
                <!-- produt details -->
                <div class="col-lg-6 mb-100">
                    <h2>{{ $product->productname }}</h2>
                    <i class="ti-check-box text-{{ $product->instock?'success':'danger'}}"></i>
                    <span class="text-{{ $product->instock?'success':'danger'}}">{{ $product->instock?'Instock':'Outofstock'}}</span>
                    <ul class="list-inline mb-4">
                        <li class="list-inline-item mx-0"><a href="#" class="rated"><i class="ti-star"></i></a></li>
                        <li class="list-inline-item mx-0"><a href="#" class="rated"><i class="ti-star"></i></a></li>
                        <li class="list-inline-item mx-0"><a href="#" class="rated"><i class="ti-star"></i></a></li>
                        <li class="list-inline-item mx-0"><a href="#" class="rated"><i class="ti-star"></i></a></li>
                        <li class="list-inline-item mx-0"><a href="#" class="rated"><i class="ti-star"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="text-gray ml-3">( 3 Reviews )</a></li>
                    </ul>
                    <h4 class="text-primary h3">${{ $product->price }} @if($product->discount != 0)<s class="text-color ml-2">${{$product->discount + $product->price}}</s>@endif</h4>
                    @if($product->discount != 0)
                    <h6 class="mb-4">You save: <span class="text-primary">${{$product->discount}} USD ({{ round(($product->discount)/($product->price + $product->discount)*100,2) }}%)</span></h6>
                    @endif
                    <div class="d-flex flex-column flex-sm-row justify-content-between mb-4">
                        <div>
                            <input wire:model="specific.quantity"  class="quantity mr-sm-2 mb-3 mb-sm-0" type="text" name="quantity">
                           
                        </div>
                        
                        <select wire:model="specific.color" class="form-control mx-sm-2 mb-3 mb-sm-0" >
                            <option value="brown">Brown Color</option>
                            <option value="gray">Gray Color</option>
                            <option value="black">Black Color</option>
                        </select>
                        <select wire:model="specific.size" class="form-control ml-sm-2 mb-3 mb-sm-0">
                            <option class="form-control" value="small">Small Size</option>
                            <option value="medium">Medium Size</option>
                            <option value="large">Large Size</option>
                        </select>
                    </div>
                    <button wire:click="toCart" class="btn btn-primary mb-4">Add to cart</button>
                    <h4 class="mb-3"><span class="text-primary">Harry up!</span> Sale ends in</h4>
                    <!-- syo-timer -->
                    
                   
                </div>
                <div class="col-lg-12">
                    <h3 class="mb-3">Product Description</h3>
                    <p class="text-gray mb-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                        Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis
                        unde omnis iste natus error sit voluptatem accusantium doloremque laudantium.</p>
                    <h4>Product Features</h4>
                    <ul class="features-list">
                        <li>Mapped with 3M™ Thinsulate™ Insulation [40G Body / Sleeves / Hood]</li>
                        <li>Embossed Taffeta Lining</li>
                        <li>DRYRIDE Durashell™ 2-Layer Oxford Fabric [10,000MM, 5,000G]</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- /product-single -->

    <!-- testimonial -->
    
    <!-- /testimonial -->

    <!-- related products -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="mb-4">Related Products</h2>
                </div>
                <!-- product -->
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <div class="product text-center">
                        <div class="product-thumb">
                            <div class="overflow-hidden position-relative">
                                <a href="product-single.html">
                                    <img class="img-fluid w-100 mb-3 img-first" src="{{ asset('customer/images/collection/product-2.jpg')}}" alt="product-img">
                                    <img class="img-fluid w-100 mb-3 img-second" src="{{ asset('customer/images/collection/product-5.jpg')}}" alt="product-img">
                                </a>
                                <div class="btn-cart">
                                    <a href="#" class="btn btn-primary btn-sm">Add To Cart</a>
                                </div>
                            </div>
                            <div class="product-hover-overlay">
                                <a href="#" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i
                  class="ti-heart"></i></a>
                                <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><i
                  class="ti-direction-alt"></i></a>
                                <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="h5"><a class="text-color" href="product-single.html">Box Leather Shoulder Bag</a></h3>
                            <span class="h5">$520.79</span>
                        </div>
                        <!-- product label badge -->
                        <div class="product-label new">
                            new
                        </div>
                    </div>
                </div>
                <!-- //end of product -->
                <!-- product -->
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <div class="product text-center">
                        <div class="product-thumb">
                            <div class="overflow-hidden position-relative">
                                <a href="product-single.html">
                                    <img class="img-fluid w-100 mb-3 img-first" src="{{ asset('customer/images/collection/product-3.jpg')}}" alt="product-img">
                                    <img class="img-fluid w-100 mb-3 img-second" src="{{ asset('customer/images/collection/product-6.jpg')}}" alt="product-img">
                                </a>
                                <div class="btn-cart">
                                    <a href="#" class="btn btn-primary btn-sm">Add To Cart</a>
                                </div>
                            </div>
                            <div class="product-hover-overlay">
                                <a href="#" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><iclass="ti-heart"></i></a>
                                <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><iclass="ti-direction-alt"></i></a>
                                <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="h5"><a class="text-color" href="product-single.html">Sneaky Leather Sneakers</a></h3>
                            <span class="h5">$270.79</span>
                        </div>
                        <!-- product label badge -->
                        <div class="product-label sale">
                            -10%
                        </div>
                    </div>
                </div>
                <!-- //end of product -->
                <!-- product -->
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <div class="product text-center">
                        <div class="product-thumb">
                            <div class="overflow-hidden position-relative">
                                <a href="product-single.html">
                                    <img class="img-fluid w-100 mb-3 img-first" src="{{ asset('customer/images/collection/product-4.jpg')}}" alt="product-img">
                                    <img class="img-fluid w-100 mb-3 img-second" src="{{ asset('customer/images/collection/product-2.jpg')}}" alt="product-img">
                                </a>
                                <div class="btn-cart">
                                    <a href="#" class="btn btn-primary btn-sm">Add To Cart</a>
                                </div>
                            </div>
                            <div class="product-hover-overlay">
                                <a href="#" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><iclass="ti-heart"></i></a>
                                <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><iclass="ti-direction-alt"></i></a>
                                <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="h5"><a class="text-color" href="product-single.html">Puzzle leather shoulder bag</a></h3>
                            <span class="h5">$400.79</span>
                        </div>
                        <!-- product label badge -->
                        <div class="product-label new">
                            new
                        </div>
                    </div>
                </div>
                <!-- //end of product -->
                <!-- product -->
                <div class="col-lg-3 col-sm-6 mb-5 mb-lg-0">
                    <div class="product text-center">
                        <div class="product-thumb">
                            <div class="overflow-hidden position-relative">
                                <a href="product-single.html">
                                    <img class="img-fluid w-100 mb-3 img-first" src="{{ asset('customer/images/collection/product-6.jpg')}}" alt="product-img">
                                    <img class="img-fluid w-100 mb-3 img-second" src="{{ asset('customer/images/collection/product-1.jpg')}}" alt="product-img">
                                </a>
                                <div class="btn-cart">
                                    <button wire:click="toCart({{$product->id}})" class="btn btn-primary btn-sm">Add To Cart</button>
                                </div>
                            </div>
                            <div class="product-hover-overlay">
                                <a href="#" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><iclass="ti-heart"></i></a>
                                <a href="#" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="Compare"><iclass="ti-direction-alt"></i></a>
                                <a data-vbtype="inline" href="#quickView" class="product-icon view venobox" data-toggle="tooltip" data-placement="left" title="Quick View"><i class="ti-search"></i></a>
                            </div>
                        </div>
                        <div class="product-info">
                            <h3 class="h5"><a class="text-color" href="product-single.html">Puzzle leather shoulder bag</a></h3>
                            <span class="h5">$400.79</span>
                        </div>
                    </div>
                </div>
                <!-- //end of product -->
            </div>
        </div>
    </div>
</section>