<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script defer src="https://unpkg.com/alpinejs@3.2.3/dist/cdn.min.js"></script>
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
                        <li><img src="{{asset('logo.png')}}" alt="Aqrabi"></li>
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

    <article x-data="slider" class="relative w-full flex flex-shrink-0 overflow-hidden shadow-2xl">
        <div class="rounded-full bg-gray-600 text-white absolute top-5 right-5 text-sm px-2 text-center z-10">
            <span x-text="currentIndex"></span>/
            <span x-text="images.length"></span>
        </div>
        <template x-for="(image, index) in images">
            <figure class="h-96" x-show="currentIndex == index + 1" x-transition:enter="transition transform duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition transform duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                <img :src="image" alt="Image" class="absolute inset-0 z-10 h-full w-full object-cover opacity-70" />
                <figcaption class="absolute inset-x-0 bottom-1 z-20 w-96 mx-auto p-4 font-light text-sm text-center tracking-widest leading-snug bg-gray-300 bg-opacity-25">
                    Any kind of content here!
                    Primum in nostrane potestate est, quid meminerimus? Nulla erit controversia. Vestri haec verecundius, illi fortasse constantius.
                </figcaption>
            </figure>
        </template>

        <button @click="back()" class="absolute left-14 top-1/2 -translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:-translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </button>

        <button @click="next()" class="absolute right-14 top-1/2 translate-y-1/2 w-11 h-11 flex justify-center items-center rounded-full shadow-md z-10 bg-gray-100 hover:bg-gray-200">
            <svg class=" w-8 h-8 font-bold transition duration-500 ease-in-out transform motion-reduce:transform-none text-gray-500 hover:text-gray-600 hover:translate-x-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 5l7 7-7 7"></path>
            </svg>
        </button>
    </article>


    <!-- component -->
    <link rel="stylesheet" href="https://cdn.tailgrids.com/tailgrids-fallback.css" />

    <!-- ====== Cards Section Start -->
    <div class="flex pt-20 mb-10 justify-center"><h2 class="text-5xl font-extrabold">FEATURED PRODUCTS</h2></div>
    <section class="lg:pt-[120px] lg:pb-20 bg-[#F3F4F6]">
        <div class="container">
            <div class="flex flex-wrap  -mx-4">
                <div class="w-full md:w-1/2 xl:w-1/4 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10  hover:bg-yellow-200" style="position:relative">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg" alt="image" class="w-full"/>
                        <span class="" style="position: absolute; ">Text</span>
                        <div class="text-left mt-2 flex justify-between">
                            <h4>
                                <p href="javascript:void(0)" class="
                                    font-semibold
                                    text-dark text-xl
                                    sm:text-[22px]
                                    md:text-xl
                                    lg:text-[22px]
                                    xl:text-xl
                                    2xl:text-[22px]
                                    mb-4
                                    block
                                    hover:text-primary
                                    ">
                                    Name of product
                                </p>
                            </h4>
                            <h4 class="mr-4 ">
                                <p class="">$433.54</p>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-02.jpg" alt="image" class="w-full" />
                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                            <h3>
                                <a href="javascript:void(0)" class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        ">
                                    The ultimate UX and UI guide to card design
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-03.jpg" alt="image" class="w-full" />
                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                            <h3>
                                <a href="javascript:void(0)" class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        ">
                                    Creative Card Component designs graphic elements
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/4 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg" alt="image" class="w-full" />
                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                            <h3>
                                <a href="javascript:void(0)" class="
                                    font-semibold
                                    text-dark text-xl
                                    sm:text-[22px]
                                    md:text-xl
                                    lg:text-[22px]
                                    xl:text-xl
                                    2xl:text-[22px]
                                    mb-4
                                    block
                                    hover:text-primary
                                    ">
                                    50+ Best creative website themes & templates
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Cards Section End -->

    <!-- ====== Cards Section Start -->
    <div class="flex pt-20 mb-10 justify-center"><h2 class="text-5xl font-extrabold">LATEST PRODUCTS</h2></div>
    <div>
        <div class="flex justify-center m-6 space-x-10">
            <a class="text-blue-400 font-bold hover:text-yellow-500 ">New arival</a>
            <a class="font-bold hover:text-yellow-500 ">Best seller</a>
            <a class="font-bold hover:text-yellow-500 ">Featured</a>
            <a class="font-bold hover:text-yellow-500 ">Special offer</a>
        </div>
    </div>
    <section class=" lg:pt-[120px] pb-10 lg:pb-20 bg-[#F3F4F6]">
        <div class="container">
            <div class="flex flex-wrap  -mx-4">
                <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg" alt="image" class="w-full" />
                        <div class="text-left mt-2 flex justify-between">
                            <h4>
                                <p href="javascript:void(0)" class="
                                    font-semibold
                                    text-dark text-xl
                                    sm:text-[22px]
                                    md:text-xl
                                    lg:text-[22px]
                                    xl:text-xl
                                    2xl:text-[22px]
                                    mb-4
                                    block
                                    hover:text-primary
                                    ">
                                    Name of product
                                </p>
                            </h4>
                            <h4 class="mr-4 flex justify space-x-1">
                                <p class="">$433.54</p>
                                <p class="line-through text-blue-500">$455</p>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-02.jpg" alt="image" class="w-full" />
                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                            <h3>
                                <a href="javascript:void(0)" class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        ">
                                    The ultimate UX and UI guide to card design
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-03.jpg" alt="image" class="w-full" />
                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                            <h3>
                                <a href="javascript:void(0)" class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        ">
                                    Creative Card Component designs graphic elements
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Cards Section End -->
    <div class="flex pt-20 mb-10 justify-center"><h2 class="text-5xl font-extrabold">DISCOVER THE MOST RECENT ITEMS</h2></div>
    <section class=" lg:pt-[120px] pb-10 lg:pb-20 bg-[#F3F4F6]">
        <div class="container">
            <div class="flex flex-wrap  -mx-4">
                <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-01.jpg" alt="image" class="w-full" />
                        <div class="text-left mt-2 flex justify-between">
                            <h4>
                                <p href="javascript:void(0)" class="
                                    font-semibold
                                    text-dark text-xl
                                    sm:text-[22px]
                                    md:text-xl
                                    lg:text-[22px]
                                    xl:text-xl
                                    2xl:text-[22px]
                                    mb-4
                                    block
                                    hover:text-primary
                                    ">
                                    Name of product
                                </p>
                            </h4>
                            <h4 class="mr-4 flex justify space-x-1">
                                <p class="">$433.54</p>
                                <p class="line-through text-blue-500">$455</p>
                            </h4>

                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-02.jpg" alt="image" class="w-full" />
                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                            <h3>
                                <a href="javascript:void(0)" class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        ">
                                    The ultimate UX and UI guide to card design
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 xl:w-1/3 px-4">
                    <div class="bg-white rounded-lg overflow-hidden mb-10">
                        <img src="https://cdn.tailgrids.com/1.0/assets/images/cards/card-01/image-03.jpg" alt="image" class="w-full" />
                        <div class="p-8 sm:p-9 md:p-7 xl:p-9 text-center">
                            <h3>
                                <a href="javascript:void(0)" class="
                        font-semibold
                        text-dark text-xl
                        sm:text-[22px]
                        md:text-xl
                        lg:text-[22px]
                        xl:text-xl
                        2xl:text-[22px]
                        mb-4
                        block
                        hover:text-primary
                        ">
                                    Creative Card Component designs graphic elements
                                </a>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Cards Section End -->

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

</html>