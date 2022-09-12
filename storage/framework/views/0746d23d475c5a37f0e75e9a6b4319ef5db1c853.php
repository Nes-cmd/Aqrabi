<div>
    <style>
        .wrapper {
            width: 300px;
            background: #fff;
            border-radius: 1px;
            /* padding: 20px 25px 40px; */
            /* box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1); */
        }

        header h2 {
            font-size: 20px;
            font-weight: 500;
        }

        header p {
            margin-top: 5px;
            font-size: 16px;
        }

        .price-input {
            width: 70%;
            display: flex;
            margin: 30px 0 35px;
        }

        .price-input .field {
            display: flex;
            width: 100%;
            height: 25px;
            align-items: center;
        }

        .field input {
            width: 100%;
            height: 70%;
            outline: none;
            font-size: 19px;
            /* margin-left: 12px; */
            border-radius: 5px;
            text-align: center;
            border: 1px solid #999;
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .price-input .separator {
            width: 150px;
            display: flex;
            font-size: 19px;
            align-items: center;
            justify-content: center;
        }

        .slider {
            height: 5px;
            position: relative;
            width: 80%;
            background: #ddd;
            border-radius: 5px;
        }

        .slider .progress {
            height: 100%;
            /* left: 20%;
            right: 20%; */
            position: absolute;
            border-radius: 5px;
            background: #17A2B8;
        }

        .range-input {
            position: relative;
        }

        .range-input input {
            position: absolute;
            width: 80%;
            height: 5px;
            top: -24px;
            background: none;
            pointer-events: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 17px;
            width: 17px;
            border-radius: 50%;
            background: #17A2B8;
            pointer-events: auto;
            -webkit-appearance: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
        }

        input[type="range"]::-moz-range-thumb {
            height: 17px;
            width: 17px;
            border: none;
            border-radius: 50%;
            background: #17A2B8;
            pointer-events: auto;
            -moz-appearance: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
        }
    </style>
    <!-- /shop -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-lg-0">
                    <!-- categories -->
                    <div class="mb-30">
                        <header>
                            <h2 class="mb-3">Shop by category</h2>
                        </header>
                        <ul class="pl-0 shop-list list-unstyled">
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <p wire:click="categoryFilter(<?php echo e($cat->id); ?>)" class="pl-2 justify-content-between <?php echo e($myFilters['category_id']==$cat->id?'text-primary':''); ?>">
                                    <span><?php echo e($cat->name); ?></span>
                                </p>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <div class="mb-30">
                        <header>
                            <h2 class="mb-3">Filter by supplier</h2>
                        </header>
                        <ul class="pl-0 shop-list list-unstyled">
                            <?php $__currentLoopData = $suppliers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $supplier): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li>
                                <p wire:click="supplierFilter(<?php echo e($supplier->id); ?>)" class="pl-2 justify-content-between <?php echo e($myFilters['supplier_id']==$supplier->id?'text-primary':''); ?>">
                                    <span><?php echo e($supplier->fullname); ?></span>
                                </p>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                    <!-- // -->
                    <div class="wrapper">
                        <header>
                            <h2>Price Range</h2>
                        </header>
                        <div class="price-input">
                            <div class="field">
                                <input value="<?php echo e($price_filter['priceMin']); ?>" id="minval" type="text">
                            </div>
                            <div class="separator">-</div>
                            <div class="field">
                                <input value="<?php echo e($price_filter['priceMax']); ?>" id="maxval" type="text">
                            </div>
                        </div>
                        <div class="slider">
                            <div class="progress"></div>
                        </div>
                        <div class="range-input">
                            <input wire:model.lazy="price_filter.priceMin" type="range" class="range-min" min="200" max="90000" step="200">
                            <input wire:model.lazy="price_filter.priceMax" type="range" class="range-max" min="200" max="90000" step="200">
                        </div>
                        <div>
                            <button wire:click="priceFilter" class="btn btn-sm rounded-0 btn-dark" style="width:80%">Apply filter</button>
                        </div>
                    </div>
                    <!-- // -->
                </div>

                <!-- product-list -->
                <div class="col-lg-9">
                    <div>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="product mb-4">
                            <div class="row align-items-center">
                                <div class="col-sm-4">
                                    <div class="product-thumb position-relative text-center">
                                        <div class="overflow-hidden position-relative">
                                            <a href="<?php echo e(route('shop.single-product', $product->id)); ?>">
                                                <img style="height: 200px;width: 300px;" class="img-fluid mb-3 img-first" src="<?php echo e(asset('storage/'.$product->main_photo)); ?>" alt="product-img">
                                                <?php if(count($product->photos) > 0): ?>
                                                <img style="height: 200px;width: 300px;" class="img-fluid mb-3 img-second" src="<?php echo e(asset('storage/'.$product->photos[0])); ?>" alt="product-img">
                                                <?php endif; ?>
                                            </a>
                                        </div>
                                        <div class="product-hover-overlay">
                                            <button wire:click="wishlist(<?php echo e($product->id); ?>)" class="product-icon favorite" data-toggle="tooltip" data-placement="left" title="Wishlist"><i class="ti-heart"></i></button>
                                            <a href="<?php echo e(route('shop.single-product', $product->id)); ?>" class="product-icon cart" data-toggle="tooltip" data-placement="left" title="View detail"><i class="ti-search"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <div class="product-info">
                                        <div class="product-info">
                                            <h3 class="mb-md-4 mb-3"><a class="text-color" href="product-single.html"><?php echo e($product->productname); ?></a></h3>
                                            <p class="mb-md-4 mb-3"><?php echo e($product->description); ?></p>
                                            <span class="h4"><?php echo e($product->price); ?> ETB</span>
                                            <ul class="list-inline mt-3">
                                                <li class="list-inline-item"><button wire:click="$emit('toCart' , <?php echo e($product->id); ?> )" class="btn btn-dark btn-sm">Add To Cart</button></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product label badge -->
                            <?php if($product->discount): ?>
                            <div class="product-label sale">
                                -<?php echo e($product->discount); ?>

                            </div>
                            <?php endif; ?>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="col-12" style="margin-bottom: 50px;margin-top:15px;background:white">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <?php echo e($products->links()); ?>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;
        priceInput.forEach(input => {
            input.addEventListener("input", e => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if ((maxPrice - minPrice >= priceGap) && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = ((minPrice / rangeInput[0].max) * 100) + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });
        rangeInput.forEach(input => {
            input.addEventListener("input", e => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);
                if ((maxVal - minVal) < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap
                        var element1 = document.getElementById('minval');
                        element1.dispatchEvent(new Event('input'));

                        var element2 = document.getElementById('maxval');
                        element2.dispatchEvent(new Event('input'));


                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = ((minVal / rangeInput[0].max) * 100) + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
    </script>

</div><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/livewire/shop-component.blade.php ENDPATH**/ ?>