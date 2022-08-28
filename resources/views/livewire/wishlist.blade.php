<div class="main-wrapper">
    <!-- breadcrumb -->
    <nav class="bg-gray py-3">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
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
                                                <th>Added at</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           
                                            @foreach($wishlists as $wishlist)
                                            <tr>
                                                <td>
                                                    <button wire:click="removeWishlist({{$wishlist->id}})" class="product-remove">&times;</button>
                                                </td>
                                                <td>
                                                    <div class="product-info">
                                                        <img width="60px" class="img-fluid" src="{{ asset('storage/'.$wishlist->product->main_photo) }}" alt="product-img" />
                                                        <a href="#">{{$wishlist->product->name}}</a>
                                                    </div>
                                                </td>
                                                <td>${{$wishlist->product->price}}
                                                    
                                                </td>
                                                <td >
                                                    {{$wishlist->created_at->diffForHumans()}}
                                                </td>
                                                <td>
                                                    <button wire:click="$emit('toCart', {{$wishlist->product_id}})" class="btn btn-dark mb-4">Add to cart</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>