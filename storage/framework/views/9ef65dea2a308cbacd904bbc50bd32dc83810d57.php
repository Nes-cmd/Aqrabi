<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />
    <!-- Bootstrap -->
    <?php if(Route::currentRouteName() != 'welcome'): ?>
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/bootstrap/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/themify-icons/themify-icons.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/slick/slick.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/venobox/venobox.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/animate/animate.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/aos/aos.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/bootstrap-touchspin-master/jquery.bootstrap-touchspin.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/nice-select/nice-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('customer/plugins/bootstrap-slider/bootstrap-slider.min.css')); ?>">

    <!-- Main Stylesheet -->
    <link href="<?php echo e(URL::to('customer/css/style.css')); ?>" rel="stylesheet">
    <!-- Custom style -->
    <link rel="stylesheet" href="<?php echo e(URL::to('customer/css/custom.css')); ?>">
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
    <?php endif; ?>
    <title>Document</title>
</head>

<body>
    <nav id="header" class="w-full z-30 py-1 bg-white shadow-lg border-b border-blue-400">
        <div class="w-full flex items-center justify-between mt-0 px-6 py-2">
            <label for="menu-toggle" class="cursor-pointer md:hidden block">
                <svg class="fill-current text-blue-600" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <title>menu</title>
                    <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
                </svg>
            </label>
            <input class="hidden" type="checkbox" id="menu-toggle">
            <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
                <nav>
                    <ul class="md:flex items-center justify-between text-base text-blue-600 pt-4 md:pt-0">
                        <li><img src="<?php echo e(asset('logo.svg')); ?>" alt="Aqrabi" width="120px"></li>
                        <li></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="#">Home</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="#">Products</a></li>
                        <li><a class="inline-block no-underline hover:text-black font-medium text-lg py-2 px-4 lg:-ml-2" href="#">About</a></li>
                    </ul>
                </nav>
            </div>

            <div class="order-2 md:order-3 flex flex-wrap items-center justify-end mr-0 md:mr-4" id="nav-content">
                <div class="auth flex items-center w-full md:w-full">
                    <input type="text" class="h-2/3 rounded-lg p-3 border-gray-700" placeholder="Search ..">
                    <button class="text-blue-600  p-2 m-3 rounded bg-gray-200 hover:bg-blue-500 hover:text-gray-100">My cart <sup class="bg-red-500 rounded-full text-sm text-white">5</sup></button>
                    <button class="text-blue-600  p-2 rounded  bg-gray-200  hover:bg-blue-500 hover:text-gray-100">Sign up</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- component -->

    <?php echo e($slot); ?>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('slider', () => ({
                currentIndex: 1,
                images: [
                    'https://source.unsplash.com/1600x900/?beach',
                    'https://source.unsplash.com/1600x900/?cat',
                    'https://source.unsplash.com/1600x900/?dog',
                    'https://source.unsplash.com/1600x900/?lego',
                    'https://source.unsplash.com/1600x900/?textures&patterns'
                ],
                back() {
                    if (this.currentIndex > 1) {
                        this.currentIndex = this.currentIndex - 1;
                    }
                },
                next() {
                    if (this.currentIndex < this.images.length) {
                        this.currentIndex = this.currentIndex + 1;
                    } else if (this.currentIndex <= this.images.length) {
                        this.currentIndex = this.images.length - this.currentIndex + 1
                    }
                },
            }))
        })
    </script>
</body>

</html><?php /**PATH /home/nesren/Project/web/laravel/Aqrabi-Ecommerce/resources/views/layouts/customer/newapp.blade.php ENDPATH**/ ?>