<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible" />
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />

    <title>Home | Elyssi Template</title>

    <meta property="og:title" content="Home | Elyssi Template" />
    <meta property="og:locale" content="en_US" />
    <meta name="theme-color" content="#f35627" />
    <link rel="canonical" href="index.html" />
    <meta property="og:url" content="index.html" />
    <meta name="description" content="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua." />
    <meta property="og:site_name" content="Elyssi Template" />
    <meta property="og:image" content="{{ asset('customer/assets/img/social.jpg')}}" />
    <link rel="icon" type="image/png" href="{{ asset('customer/assets/img/favicon.png')}}" />
    <meta name="twitter:card" content="summary_large_image" />

    <meta name="twitter:site" content="@tailwindmade" />
    <link rel="stylesheet" href="{{ asset('customer/assets/cdn_jsdelivr/npm/boxicons2.0.5/css/boxicons.min.css')}}" integrity="sha256-imWjOiEEAcjWdL1+inhBu1dWYFyXuiO9vpJVEQd3y/c=" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('customer/assets/styles/fonts.css')}}" media="screen" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('customer/assets/styles/main.min.css')}}" media="screen" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ asset('customer/assets/cdn_jsdelivr/npm/splidejs/splide3.6.12/dist/css/splide.min.css')}}" />
    <script src="{{ asset('customer/assets/unpkg/alpinejs3.10.2/dist/cdn.min.js')}}" defer></script>


</head>


<body x-data="{
        modal: false,
        mobileMenu: false,
        mobileSearch: false,
        mobileCart: false
    }" :class="{ 'overflow-hidden max-h-screen': modal || mobileMenu }" @keydown.escape="modal = false">


    <div id="main">
        <div class="container relative">
            <div class="relative z-50 py-6 shadow-xs lg:py-10">
                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <div class="block lg:hidden">
                            <i class="bx bx-menu text-4xl text-primary" @click="mobileMenu = !mobileMenu"></i>
                        </div>

                        <a href="search.html" class="group ml-2 hidden cursor-pointer rounded-full border-2 border-transparent p-2 transition-colors hover:border-primary focus:outline-none sm:ml-3 sm:p-4 md:ml-5 lg:mr-8 lg:block">
                            <img src="{{ asset('customer/assets/img/icons/icon-search.svg')}}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon search" />
                            <img src="customer/assets/img/icons/icon-search-hover.svg" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon search hover" />
                        </a>

                        <button @click="mobileSearch = !mobileSearch" class="group ml-2 block cursor-pointer rounded-full border-2 border-transparent p-2 transition-colors hover:border-primary focus:outline-none sm:ml-3 sm:p-4 md:ml-5 lg:mr-8 lg:hidden">
                            <img src="{{ asset('customer/assets/img/icons/icon-search.svg')}}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon search" />
                            <img src="{{ asset('customer/assets/img/icons/icon-search-hover.svg')}}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon search hover" />
                        </button>

                        <a href="account/wishlist.html" class="group hidden rounded-full border-2 border-transparent p-2 transition-all hover:border-primary sm:p-4 lg:block">
                            <img src="{{ asset('customer/assets/img/icons/icon-heart.svg')}}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon heart" />
                            <img src="{{ asset('customer/assets/img/icons/icon-heart-hover.svg')}}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon heart hover" />
                        </a>
                    </div>
                    
                    <div class="flex items-center">
                        <a href="account/dashboard.html" class="group rounded-full border-2 border-transparent p-2 transition-all hover:border-primary sm:p-4">
                            <img src="{{ asset('customer/assets/img/icons/icon-user.svg')}}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon user" />
                            <img src="{{ asset('customer/assets/img/icons/icon-user-hover.svg')}}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon user hover" />
                        </a>

                        <a href="cart/index.html" class="group ml-2 hidden rounded-full border-2 border-transparent p-2 transition-all hover:border-primary sm:ml-3 sm:p-4 md:ml-5 lg:ml-8 lg:block">
                            <img src="{{ asset('customer/assets/img/icons/icon-cart.svg')}}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon cart" />
                            <img src="{{ asset('customer/assets/img/icons/icon-cart-hover.svg')}}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon cart hover" />
                        </a>

                        <span @click="mobileCart = !mobileCart" class="group ml-2 block rounded-full border-2 border-transparent p-2 transition-all hover:border-primary sm:ml-3 sm:p-4 md:ml-5 lg:ml-8 lg:hidden">
                            <img src="{{ asset('customer/assets/img/icons/icon-cart.svg')}}" class="block h-5 w-5 group-hover:hidden sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon cart" />
                            <img src="{{ asset('customer/assets/img/icons/icon-cart-hover.svg')}}" class="hidden h-5 w-5 group-hover:block sm:h-6 sm:w-6 md:h-8 md:w-8" alt="icon cart hover" />
                        </span>
                    </div>
                    <div class="hidden">
                        <i class="bx bx-menu text-3xl text-primary" @click="mobileMenu = true"></i>
                    </div>
                </div>
                <div class="hidden justify-center lg:flex lg:pt-8">
                    <ul class="list-reset flex items-center">

                        <li class="mr-10">
                            <a href="index.html" class="block border-b-2 border-white px-2 font-hk text-lg text-secondary transition-all hover:border-primary hover:font-bold hover:text-primary">Home</a>
                        </li>

                        <li class="mr-10">
                            <a href="about.html" class="block border-b-2 border-white px-2 font-hk text-lg text-secondary transition-all hover:border-primary hover:font-bold hover:text-primary">About</a>
                        </li>

                        <li class="group mr-10 hidden lg:block">
                            <div class="flex items-center border-b-2 border-white transition-colors group-hover:border-primary">
                                <span class="cursor-pointer px-2 font-hk text-lg text-secondary transition-all group-hover:font-bold group-hover:text-primary">Collections</span>
                                <i class="bx bx-chevron-down px-2 pl-2 text-secondary transition-colors group-hover:text-primary"></i>
                            </div>
                            <div class="pointer-events-none absolute top-0 left-0 right-0 z-50 mx-auto mt-40 w-2/3 pt-10 opacity-0 group-hover:pointer-events-auto group-hover:opacity-100">
                                <div class="relative flex rounded-b bg-white p-8 shadow-lg transition-all">

                                    <div class="relative z-20 flex-1">
                                        <h4 class="font-hkbold mb-2 text-base text-secondary">
                                            Man
                                        </h4>
                                        <ul>
                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Boots</a>
                                            </li>
                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Blutcher Boot</a>
                                            </li>
                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Chelsea Boot</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Chukka Boot</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Dress Boot</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Work Boot</a>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="relative z-20 flex-1">
                                        <h4 class="font-hkbold mb-2 text-base text-secondary">
                                            Woman
                                        </h4>
                                        <ul>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Accessories</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Belts</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Caps</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Laces</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Socks</a>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="relative z-20 flex-1">
                                        <h4 class="font-hkbold mb-2 text-base text-secondary">
                                            Kids
                                        </h4>
                                        <ul>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Shoes</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Derby Shoes</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Belts</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Caps</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Laces</a>
                                            </li>

                                            <li>
                                                <a href="collection-grid.html" class="border-b border-transparent font-hk text-sm leading-loose text-secondary-lighter hover:border-secondary-lighter">Socks</a>
                                            </li>

                                        </ul>
                                    </div>

                                    <div class="flex-1">
                                        <div class="absolute inset-0 z-0 bg-contain bg-right-bottom bg-no-repeat" style="background-image: url({{ asset('customer/assets/img/unlicensed/bg-mega-menu.png')}})"></div>
                                    </div>
                                </div>
                            </div>
                        </li>

                        <li class="mr-10">
                            <a href="blog.html" class="block border-b-2 border-white px-2 font-hk text-lg text-secondary transition-all hover:border-primary hover:font-bold hover:text-primary">Blog</a>
                        </li>

                        <li class="mr-10">
                            <a href="contact.html#faq" class="block border-b-2 border-white px-2 font-hk text-lg text-secondary transition-all hover:border-primary hover:font-bold hover:text-primary">FAQ</a>
                        </li>

                        <li class="mr-10">
                            <a href="contact.html" class="block border-b-2 border-white px-2 font-hk text-lg text-secondary transition-all hover:border-primary hover:font-bold hover:text-primary">Contact</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        <div class="pointer-events-none fixed inset-x-0 z-50 pt-20 opacity-0 transition-all md:top-28" :class="{ 'opacity-100 pointer-events-auto': mobileMenu }">
            <div class="absolute left-0 top-0 z-40 w-full bg-white px-6 shadow-sm sm:w-1/2">
                <a href="index.html" class="block w-full cursor-pointer border-b border-grey-dark py-3 font-hk font-medium text-secondary">Home
                </a>
                <a href="account/wishlist-2.html" class="block w-full cursor-pointer border-b border-grey-dark py-3 font-hk font-medium text-secondary">Wishlist
                </a>
                <div class="block w-full border-b border-grey-dark py-3" x-data="{
                isParentAccordionOpen: false
            }">
                    <div class="flex items-center justify-between" @click="isParentAccordionOpen = !isParentAccordionOpen">
                        <span class="block font-hk font-medium transition-colors" :class="isParentAccordionOpen ? 'text-primary' : 'text-secondary'">Collections</span>
                        <i class="bx text-xl text-secondary" :class="isParentAccordionOpen ? 'bx-chevron-down' : 'bx-chevron-left'"></i>
                    </div>
                    <div class="transition-all" :class="isParentAccordionOpen ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                        <div x-data="{
                    isAccordionOpen: false
                }">
                            <div class="flex items-center pt-3" @click="isAccordionOpen = !isAccordionOpen">
                                <i class="bx pr-3 text-xl transition-colors" :class="isAccordionOpen ? 'bx-chevron-down text-secondary' : 'bx-chevron-right text-grey-darkest'"></i>
                                <a href="collection-grid-2.html" class="font-hk font-medium transition-colors" :class="isAccordionOpen ? 'text-primary' : 'text-grey-darkest'">Men's Fashion</a>
                            </div>
                            <div class="pl-12 transition-all" :class="isAccordionOpen ? 'max-h-infinite' : 'max-h-0 overflow-hidden'">
                                <a href="collection-grid-2.html" class="mt-2 block font-hk font-medium text-secondary">T-Shirts</a>
                                <a href="collection-grid-2.html" class="mt-2 block font-hk font-medium text-secondary">Shirts</a>
                                <a href="collection-grid-2.html" class="mt-2 block font-hk font-medium text-secondary">Men’s Bags</a>
                                <a href="collection-grid-2.html" class="mt-2 block font-hk font-medium text-secondary">Travel Essentials</a>
                            </div>
                        </div>
                        <div class="flex items-center pt-3">
                            <i class="bx bx-chevron-right pr-3 text-xl text-grey-darkest"></i>
                            <a href="collection-grid-2.html" class="font-hk font-medium text-grey-darkest">Women's Fashion</a>
                        </div>
                        <div class="flex items-center pt-3">
                            <i class="bx bx-chevron-right pr-3 text-xl text-grey-darkest"></i>
                            <a href="collection-grid-2.html" class="font-hk font-medium text-grey-darkest">Baggage</a>
                        </div>
                        <div class="flex items-center pt-3">
                            <i class="bx bx-chevron-right pr-3 text-xl text-grey-darkest"></i>
                            <a href="collection-grid-2.html" class="font-hk font-medium text-grey-darkest">Camp</a>
                        </div>
                        <div class="flex items-center pt-3">
                            <i class="bx bx-chevron-right pr-3 text-xl text-grey-darkest"></i>
                            <a href="collection-grid-2.html" class="font-hk font-medium text-grey-darkest">Personal Care</a>
                        </div>
                        <div class="flex items-center pt-3">
                            <i class="bx bx-chevron-right pr-3 text-xl text-grey-darkest"></i>
                            <a href="collection-grid-2.html" class="font-hk font-medium text-grey-darkest">Backpacks</a>
                        </div>
                        <div class="flex items-center pt-3">
                            <i class="bx bx-chevron-right pr-3 text-xl text-grey-darkest"></i>
                            <a href="collection-grid-2.html" class="font-hk font-medium text-grey-darkest">Pullovers</a>
                        </div>
                    </div>
                </div>
                <a href="about-2.html" class="block w-full cursor-pointer border-b border-grey-dark py-3 font-hk font-medium text-secondary">About
                </a>
                <a href="contact.html#faq" class="block w-full cursor-pointer border-b border-grey-dark py-3 font-hk font-medium text-secondary">FAQ
                </a>
                <a href="blog-2.html" class="block w-full cursor-pointer border-b border-grey-dark py-3 font-hk font-medium text-secondary">Blog
                </a>
                <a href="contact-2.html" class="block w-full cursor-pointer border-b border-grey-dark py-3 font-hk font-medium text-secondary">Contact
                </a>
                <div class="my-8">
                    <a href="login.html" class="btn btn-primary mb-4 w-full" aria-label="Login button">Login Account</a>

                    <a href="register.html" class="block pl-3 text-center font-hk text-secondary underline md:text-lg">Create your account</a>
                </div>
            </div>
        </div>

        <div class="pointer-events-none absolute inset-x-0 top-20 z-50 opacity-0 lg:top-28" :class="{ 'opacity-100 pointer-events-auto': mobileSearch }">
            <div class="container">
                <div class="z-10 w-full rounded bg-white shadow-sm sm:w-1/2 lg:w-1/4">
                    <form action="https://elyssi.redpixelthemes.com/search" class="flex items-center rounded-md border border-grey-dark px-4 py-3">
                        <input type="text" name="search" class="w-full border-grey-dark font-hk font-medium text-secondary placeholder-grey-darkest outline-none focus:border-primary focus:outline-none focus:ring focus:ring-primary" placeholder="Search for a product" />
                        <button class="flex items-center focus:border-transparent focus:outline-none">
                            <i class="bx bx-search ml-4 text-xl text-primary"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="pointer-events-none absolute inset-x-0 z-50 opacity-0" :class="{ 'opacity-100 pointer-events-auto': mobileCart }">
            <div class="absolute right-0 top-0 z-10 w-full rounded bg-white px-6 py-6 shadow-sm sm:w-1/2">
                <div class="flex items-center justify-between border-b border-grey-dark pb-2">
                    <div class="flex items-center">
                        <i class="bx bx-x mr-2 cursor-pointer text-2xl text-grey-darkest sm:text-3xl"></i>
                        <div class="mx-0 flex h-20 w-20 items-center justify-center rounded">
                            <div class="mx-auto h-16 w-16 bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset('customer/assets/img/unlicensed/backpack-1.png')}})"></div>
                        </div>
                        <div class="pl-2">
                            <span class="block font-hk text-base text-grey-darkest">Winter Bag</span>
                            <span class="mt-2 font-hk text-base text-secondary">$19</span>
                        </div>
                    </div>
                    <div class="flex items-center pl-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full border border-primary"><i class="bx bx-minus text-primary"></i></span>
                        <span class="font-hkbold block px-2 text-lg text-primary">1</span>
                        <span class="flex h-6 w-6 items-center justify-center rounded-full border border-primary"><i class="bx bx-plus text-primary"></i></span>
                    </div>
                </div>
                <div class="flex items-center justify-between border-b border-grey-dark pb-2">
                    <div class="flex items-center">
                        <i class="bx bx-x mr-2 cursor-pointer text-2xl text-grey-darkest sm:text-3xl"></i>
                        <div class="mx-0 flex h-20 w-20 items-center justify-center rounded">
                            <div class="mx-auto h-16 w-16 bg-cover bg-center bg-no-repeat" style="background-image: url({{ asset('customer/assets/img/unlicensed/backpack-1.png')}})"></div>
                        </div>
                        <div class="pl-2">
                            <span class="block font-hk text-base text-grey-darkest">Winter Bag</span>
                            <span class="mt-2 font-hk text-base text-secondary">$19</span>
                        </div>
                    </div>
                    <div class="flex items-center pl-3">
                        <span class="flex h-6 w-6 items-center justify-center rounded-full border border-primary"><i class="bx bx-minus text-primary"></i></span>
                        <span class="font-hkbold block px-2 text-lg text-primary">1</span>
                        <span class="flex h-6 w-6 items-center justify-center rounded-full border border-primary"><i class="bx bx-plus text-primary"></i></span>
                    </div>
                </div>
                <div class="flex justify-between pt-4">
                    <span class="font-hkbold text-lg text-secondary">Total</span>
                    <span class="font-hkbold text-lg text-secondary">$38</span>
                </div>
                <button type="submit" class="btn btn-primary mt-5 w-full" aria-label="Login button">
                    Checkout
                </button>
                <a href="cart/index.html" class="mt-4 block pl-3 text-center font-hk text-secondary underline md:text-lg">Go to cart page</a>
            </div>
        </div>

        <div>

            {{$slot}}

            

        </div>
        @include('layouts.customer.footer')

    </div>
    <script src="{{ asset('customer/assets/cdn_jsdelivr/npm/splidejs/splide3.6.12/dist/js/splide.min.js')}}" crossorigin="anonymous"></script>
    <script src="{{ asset('customer/assets/js/main.js')}}"></script>
    <script src="{{ asset('customer/assets/guanaco/script.js')}}" data-site="NUAESTQS" defer></script>
</body>

</html>