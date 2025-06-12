 <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>@yield('title')</title>
    <meta name="keywords" content="t-shirt">
    <meta name="description" content="{{$generalSettingView->site_name}}">
    <meta name="author" content="{{$generalSettingView->site_name}}">
    <!-- Robots - tells search engines whether to index/follow links -->
    <meta name="robots" content="all">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset($generalSettingView->favicon)}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset($generalSettingView->favicon)}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset($generalSettingView->favicon)}}">
    <link rel="manifest" href="{{asset('/')}}front/assets/images/icons/site.webmanifest">
    <link rel="mask-icon" href="{{asset($generalSettingView->favicon)}}" color="#666666">
    <link rel="shortcut icon" href="{{asset($generalSettingView->favicon)}}">
    <meta name="apple-mobile-web-app-title" content="{{$generalSettingView->site_name}}">
    <meta name="application-name" content="{{$generalSettingView->site_name}}">
    <meta name="msapplication-TileColor" content="#cc9966">
    <meta name="msapplication-config" content="{{asset('/')}}front/assets/images/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    @yield('meta_data')


    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/plugins/owl-carousel/owl.carousel.css">
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/plugins/magnific-popup/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/plugins/jquery.countdown.css">
    <!-- Main CSS File -->
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/style.css">
{{--    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/skins/skin-demo-7.css">--}}
{{--    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/demos/demo-7.css">--}}
    <link rel="stylesheet" href="{{asset('/')}}front/assets/css/plugins/nouislider/nouislider.css">
    <!-- Include Toastr CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    @if(optional($googleAnalytic)->tag_manager_status == 1)
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','{{optional($googleAnalytic)->tag_manager}}');</script>
    <!-- End Google Tag Manager -->
    @endif

    @if(optional($googleAnalytic)->google_analytics_status == 1)
    <!-- Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{optional($googleAnalytic)->google_analytics}}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', '{{optional($googleAnalytic)->google_analytics}}');
        </script>
        <!-- End Google Analytics -->
    @endif

    @if(optional($googleAnalytic)->facebook_pixel_status == 1)
    <!-- Meta Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window, document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '{{optional($googleAnalytic)->facebook_pixel}}');
            fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
                       src="https://www.facebook.com/tr?id={{optional($googleAnalytic)->facebook_pixel}}&ev=PageView&noscript=1"
            /></noscript>
        <!-- End Meta Pixel Code -->
    @endif

    <style>
        #suggestions {
            position: absolute;
            width: 100%;
            max-height: 200px;
            overflow-y: auto;
            background-color: #fff;
            border: 1px solid #ddd;
            z-index: 1000;
            list-style-type: none;
            padding-left: 0;
            margin-top: 0;
        }
        #suggestions li {
            padding: 10px;
            cursor: pointer;
        }
        #suggestions li:hover {
            background-color: #f0f0f0;
        }

        .fixed_whats a {
            width: 42px;
            height: 42px;
            background: #049704;
            text-align: center;
            line-height: 42px;
            font-size: 25px;
            position: fixed;
            bottom: 68px;
            right: 34px;
            border-radius: 50px;
            color: #fff;
            z-index: 9999;
        }
    </style>



</head>

<body>
<div class="page-wrapper">
    <header class="header header-7">
        <div class="header-top">
            <div class="container-fluid">
                <div class="header-left">
                    <div class="header-dropdown">
                        <a href="javascript:void(0)">BDT</a>
                        <div class="header-menu">
                            <ul>
                                <li><a href="javascript:void(0)">USD</a></li>
                                <li><a href="javascript:void(0)">BDT</a></li>
                            </ul>
                        </div><!-- End .header-menu -->
                    </div><!-- End .header-dropdown -->

                    <div class="header-dropdown">
                        <a href="javascript:void(0)">Eng</a>
                        <div class="header-menu">
                            <ul>
                                <li><a href="javascript:void(0)">English</a></li>
                                <li><a href="javascript:void(0)">Bangla</a></li>
                                <li><a href="javascript:void(0)">Spanish</a></li>
                            </ul>
                        </div><!-- End .header-menu -->
                    </div><!-- End .header-dropdown -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <ul class="top-menu">
                        <li>
                            <a href="#">Links</a>
                            <ul>
                                <li><a href="tel:{{$generalSettingView->mobile}}"><i class="icon-phone"></i>Call: {{$generalSettingView->mobile}}</a></li>
{{--                                <li><a href="wishlist.html"><i class="icon-heart-o"></i>My Wishlist <span>(3)</span></a></li>--}}
                                <li><a href="{{route('about.us')}}">About Us</a></li>
                                <li><a href="{{route('contact.us')}}">Contact Us</a></li>
                                <li><a href="{{route('all.products')}}">Products</a></li>
                                @if(Session::get('customer_id'))
                                <li><a href="{{route('customer.dashboard')}}"><i class="icon-user"></i>Dashboard</a></li>
                                @else
                                <li><a href="#signin-modal" data-toggle="modal"><i class="icon-user"></i>Login</a></li>
                                @endif
                            </ul>
                        </li>
                    </ul><!-- End .top-menu -->
                </div><!-- End .header-right -->
            </div><!-- End .container-fluid -->
        </div><!-- End .header-top -->

        <div class="header-middle sticky-header">
            <div class="container-fluid">
                <div class="header-left">
                    <button class="mobile-menu-toggler">
                        <span class="sr-only">Toggle mobile menu</span>
                        <i class="icon-bars"></i>
                    </button>

                    <a href="{{route('home')}}" class="logo">
                        <img src="{{asset($generalSettingView->header_logo)}}" alt="{{$generalSettingView->site_name}} Logo" width="161" height="25">
                    </a>


                    <nav class="main-nav">
                        <ul class="menu sf-arrows">
                            <li class="megamenu-container active">
                                <a href="{{route('home')}}" class="">Home</a>
                            </li>
                            @foreach($menuCategories as $menuCategory)
                            <li>
                                <a href="{{route('category.product', ['id' => $menuCategory->id])}}" class="">{{$menuCategory->category_name}}</a>
                                @if(count($menuCategory->subCategories) > 0)
                                <div class="megamenu megamenu-sm">
                                    <div class="row no-gutters">
                                        <div class="col-md-12">
                                            <div class="menu-col">
                                                <ul>
                                                    @foreach($menuCategory->subCategories as $subCategory)
                                                        <li class="menu-title">
                                                            <a href="{{route('category.product', ['id' => $subCategory->id])}}">{{$subCategory->category_name}}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div><!-- End .menu-col -->
                                        </div><!-- End .col-md-8 -->
                                    </div><!-- End .row -->
                                </div><!-- End .megamenu megamenu-md -->
                                @endif
                            </li>
                            @endforeach
                        </ul><!-- End .menu -->
                    </nav><!-- End .main-nav -->
                </div><!-- End .header-left -->

                <div class="header-right">
                    <div class="header-search header-search-extended header-search-visible">
                        <a href="#" class="search-toggle" role="button"><i class="icon-search"></i></a>
                        <form action="{{ route('product.search') }}" method="get">
                            <div class="header-search-wrapper search-wrapper-wide">
                                <label for="q" class="sr-only">Search</label>
                                <input type="search" class="form-control" name="q" id="q" placeholder="Search product ..." autocomplete="off" required>
                                <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
                            </div><!-- End .header-search-wrapper -->
                            <!-- Suggestions list -->
                            <ul id="suggestions" class="list-group" style="display: none;"></ul>
                        </form>
                    </div><!-- End .header-search -->

                    <style>
                        .dropdown-menu {
                            width: 300px; /* Adjust width as needed */
                            max-height: 400px; /* Set a fixed height */
                            overflow: hidden;
                            display: flex;
                            flex-direction: column;
                        }

                        .dropdown-cart-products {
                            max-height: 250px; /* Height for scrollable area */
                            overflow-y: auto;
                            padding: 10px;
                        }

                        .dropdown-cart-bottom {
                            position: sticky;
                            bottom: 0;
                            background: #fff;
                            padding: 10px;
                            border-top: 1px solid #ddd;
                        }
                    </style>

                    <div class="dropdown cart-dropdown">
                        <a href="#" class="dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                            <i class="icon-shopping-cart"></i>
                            <span class="cart-count">{{count($cartProducts)}}</span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-cart-products">
                                @foreach($cartProducts as $cartProduct)
                                    @php
                                        $product = \App\Models\Product::find($cartProduct->attributes->product_id);
                                    @endphp
                                    <div class="product">
                                        <div class="product-cart-details">
                                            <h4 class="product-title">
                                                <a href="{{route('product.show', ['id' => $cartProduct->attributes->product_id, 'slug' => $product->slug])}}">{{$cartProduct->name}}</a>
                                            </h4>
                                            <span class="cart-product-info">
                            <span class="cart-product-qty">{{$cartProduct->quantity}}</span>
                            x &#2547;{{number_format($cartProduct->price)}}
                        </span>
                                        </div>
                                        <figure class="product-image-container">
                                            <a href="{{route('product.show', ['id' => $cartProduct->attributes->product_id, 'slug' => $product->slug])}}" class="product-image">
                                                <img src="{{asset($cartProduct->attributes->thumbnail_image)}}" alt="product">
                                            </a>
                                        </figure>
                                        <a href="#" class="btn-remove" title="Remove Product" data-product-id="{{$cartProduct->id}}">
                                            <i class="icon-close"></i>
                                        </a>
                                    </div>
                                @endforeach
                            </div>

                            <div class="dropdown-cart-bottom">
                                <div class="dropdown-cart-total">
                                    <span>Total</span>
                                    @php($total = Cart::getTotal())
                                    <span class="cart-total-price">&#2547;{{number_format($total)}}</span>
                                </div>

                                <div class="dropdown-cart-action">
                                    <a href="{{route('cart.index')}}" class="btn btn-primary" style="margin-right: 2%">View Cart</a>
                                    <a href="{{route('checkout')}}" class="btn btn-outline-primary-2">
                                        <span>Checkout</span><i class="icon-long-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End .header-right -->
            </div><!-- End .container-fluid -->
        </div><!-- End .header-middle -->
    </header><!-- End .header -->


    <main class="main">
        @yield('body')
    </main><!-- End .main -->
    <footer class="footer footer-dark">
        <div class="footer-middle">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12 col-lg-4">
                        <div class="widget widget-about">
                            <img src="{{asset($generalSettingView->footer_logo)}}" class="footer-logo" alt="Footer Logo" width="161" height="25">
                            <p>{{$generalSettingView->about_us_short}}</p>

                            <div class="widget-about-info">
                                <div class="row">
                                    <div class="col-sm-6 col-md-4">
                                        <span class="widget-about-title text-light">Got Question? Call us 24/7</span>
                                        <a href="tel:{{$generalSettingView->mobile}}" style="font-size: 85%;">{{$generalSettingView->mobile}}</a>
                                    </div><!-- End .col-sm-6 -->
                                    <div class="col-sm-6 col-md-8">
                                        <span class="widget-about-title text-light">Payment Method</span>
                                        <figure class="footer-payments">
                                            <img src="{{asset($generalSettingView->payment_method_image)}}" alt="Payment methods" style="width: 60%; margin-left: -5%;">
                                        </figure><!-- End .footer-payments -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->
                            </div><!-- End .widget-about-info -->
                        </div><!-- End .widget about-widget -->
                    </div><!-- End .col-sm-12 col-lg-4 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">Useful links</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="{{route('about.us')}}">About {{$generalSettingView->site_name}}</a></li>
                                <li><a href="#">How to shop on {{$generalSettingView->site_name}}</a></li>
                                <li><a href="{{route('contact.us')}}">Contact us</a></li>
                                @if(Session::get('customer_id'))
                                    <li><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
                                @else
                                    <li><a href="#signin-modal" data-toggle="modal">Login</a></li>
                                @endif
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">Customer Service</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                <li><a href="{{route('condition.page')}}">Terms and conditions</a></li>
                                <li><a href="{{route('privacy.page')}}">Privacy Policy</a></li>
                                <li><a href="{{route('return.view')}}">Return & Refund Policies</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->

                    <div class="col-sm-4 col-lg-2">
                        <div class="widget">
                            <h4 class="widget-title">My Account</h4><!-- End .widget-title -->

                            <ul class="widget-list">
                                @if(Session::get('customer_id'))
                                    <li><a href="{{route('customer.dashboard')}}">Dashboard</a></li>
                                @else
                                    <li><a href="#signin-modal" data-toggle="modal">Sign In</a></li>
                                @endif
                                <li><a href="{{route('cart.index')}}">View Cart</a></li>
{{--                                <li><a href="#">My Wishlist</a></li>--}}
                                <li><a href="{{route('track.order')}}">Track My Order</a></li>
                                <li><a href="{{route('contact.us')}}">Help</a></li>
                            </ul><!-- End .widget-list -->
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-4 col-lg-2 -->

                    <div class="col-sm-6 col-lg-2">
                        <div class="widget widget-newsletter">
                            <h4 class="widget-title">Sign up to newsletter</h4><!-- End .widget-title -->

                            <form action="#">
                                <div class="input-group">
                                    <input type="email" class="form-control" placeholder="Enter your Email Address" aria-label="Email Adress" required>
                                    <div class="input-group-append">
                                        <button class="btn btn-dark" type="submit"><i class="icon-long-arrow-right"></i></button>
                                    </div><!-- .End .input-group-append -->
                                </div><!-- .End .input-group -->
                            </form>
                        </div><!-- End .widget -->
                    </div><!-- End .col-sm-6 col-lg-2 -->
                </div><!-- End .row -->
            </div><!-- End .container-fluid -->
        </div><!-- End .footer-middle -->

        <div class="footer-bottom">
            <div class="container-fluid">
                <p class="footer-copyright">Copyright © {{date('Y')}} {{$generalSettingView->site_name}}. All Rights Reserved.&nbsp;Design And Develop By <a href="https://armanalibd.com" target="_blank"><b>Md Arman Ali</b></a></p><!-- End .footer-copyright -->

                <div class="social-icons social-icons-color">
                    <span class="social-label">Social Media</span>
                    <a href="{{$generalSettingView->facebook_url}}" class="social-icon social-facebook" title="Facebook" target="_blank"><i class="icon-facebook-f"></i></a>
                    <a href="{{$generalSettingView->twitter_url}}" class="social-icon social-twitter" title="Twitter" target="_blank"><i class="icon-twitter"></i></a>
                    <a href="{{$generalSettingView->instagram_url}}" class="social-icon social-instagram" title="Instagram" target="_blank"><i class="icon-instagram"></i></a>
                    <a href="{{$generalSettingView->youtube_url}}" class="social-icon social-youtube" title="Youtube" target="_blank"><i class="icon-youtube"></i></a>
{{--                    <a href="{{$generalSettingView->pinterest_url}}" class="social-icon social-pinterest" title="Pinterest" target="_blank"><i class="icon-pinterest"></i></a>--}}
                </div><!-- End .soial-icons -->
            </div><!-- End .container-fluid -->
        </div><!-- End .footer-bottom -->
    </footer><!-- End .footer -->
</div><!-- End .page-wrapper -->
@if(!Route::is('product.show'))
<div class="fixed_whats">
    <a href="https://api.whatsapp.com/send/?phone={{$generalSettingView->pinterest_url}}" target="_blank"><i class="icon-whatsapp"></i></a>
</div>
@endif

<button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

<!-- Mobile Menu -->
<div class="mobile-menu-overlay"></div><!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="icon-close"></i></span>

        <form action="{{ route('product.search') }}" method="get" class="mobile-search">
            <label for="mobile-search" class="sr-only">Search</label>
            <input type="search" class="form-control" name="q" id="mobile-search" placeholder="Search in..." required>
            <button class="btn btn-primary" type="submit"><i class="icon-search"></i></button>
        </form>

        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li class="active">
                    <a href="{{route('home')}}">Home</a>
                </li>
                @foreach($menuCategories as $menuCategory)
                <li>
                    <a href="{{route('category.product', ['id' => $menuCategory->id])}}">{{$menuCategory->category_name}}</a>
                    @if(count($menuCategory->subCategories) > 0)
                    <ul>
                        @foreach($menuCategory->subCategories as $subCategory)
                        <li><a href="{{route('category.product', ['id' => $subCategory->id])}}">{{$subCategory->category_name}}</a></li>
                        @endforeach
                    </ul>
                    @endif
                </li>
                @endforeach

                <li class="active">
                    <a href="{{route('all.products')}}">Products</a>
                </li>
            </ul>
        </nav><!-- End .mobile-nav -->

        <div class="social-icons">
            <a href="{{$generalSettingView->facebook_url}}" class="social-icon" target="_blank" title="Facebook"><i class="icon-facebook-f"></i></a>
            <a href="{{$generalSettingView->twitter_url}}" class="social-icon" target="_blank" title="Twitter"><i class="icon-twitter"></i></a>
            <a href="{{$generalSettingView->instagram_url}}" class="social-icon" target="_blank" title="Instagram"><i class="icon-instagram"></i></a>
            <a href="{{$generalSettingView->youtube_url}}" class="social-icon" target="_blank" title="Youtube"><i class="icon-youtube"></i></a>
        </div><!-- End .social-icons -->
    </div><!-- End .mobile-menu-wrapper -->
</div><!-- End .mobile-menu-container -->

<!-- Sign in / Register Modal -->
<div class="modal fade @if(!in_array(Route::currentRouteName(), ['set.password', 'checkout', 'customer.dashboard'])) @if ($errors->has('name') || $errors->has('email') || $errors->has('mobile') || $errors->has('password')) show @endif @endif"
     id="signin-modal"
     tabindex="-1"
     role="dialog"
     aria-hidden="true"
     @if(!in_array(Route::currentRouteName(), ['set.password', 'checkout', 'customer.dashboard'])) @if ($errors->has('name') || $errors->has('email') || $errors->has('mobile') || $errors->has('password')) style="display: block;" @endif @endif>
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="icon-close"></i></span>
                </button>

                <div class="form-box">
                    <div class="form-tab">
                        <ul class="nav nav-pills nav-fill" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link @if(!$errors->has('email') && !$errors->has('mobile') && !$errors->has('password')) active @endif" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Sign In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link @if($errors->has('name') || $errors->has('email') || $errors->has('mobile') || $errors->has('password')) active @endif" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">Register</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="tab-content-5">
                            <div class="tab-pane fade @if(!$errors->has('email') && !$errors->has('mobile') && !$errors->has('password')) show active @endif" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                <form action="{{route('customer.login')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="singin-email">Mobile or email address *</label>
                                        <input type="text" class="form-control" id="singin-email" name="email" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="singin-password">Password *</label>
                                        <input type="password" class="form-control" id="singin-password" name="password" required>
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>LOG IN</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="signin-remember">
                                            <label class="custom-control-label" for="signin-remember">Remember Me</label>
                                        </div><!-- End .custom-checkbox -->

                                        <a href="{{route('forget.password')}}" class="forgot-link">Forgot Your Password?</a>
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                            <div class="tab-pane fade @if($errors->has('name') || $errors->has('email') || $errors->has('mobile') || $errors->has('password')) show active @endif" id="register" role="tabpanel" aria-labelledby="register-tab">
                                <form action="{{route('customer.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label for="register-name">Name *</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="register-name" value="{{old('name')}}" name="name" required>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-email">Your email address *</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="register-email" value="{{old('email')}}" name="email" required>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-mobile">Mobile *</label>
                                        <input type="tel" class="form-control @error('mobile') is-invalid @enderror" id="register-mobile" value="{{old('mobile')}}" name="mobile" required>
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-group">
                                        <label for="register-password">Password *</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="register-password" name="password" required>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div><!-- End .form-group -->

                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-outline-primary-2">
                                            <span>SIGN UP</span>
                                            <i class="icon-long-arrow-right"></i>
                                        </button>

                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" value="1" name="policy" id="register-policy" required>
                                            <label class="custom-control-label" for="register-policy">I agree to the <a href="#">privacy policy</a> *</label>
                                        </div><!-- End .custom-checkbox -->
                                    </div><!-- End .form-footer -->
                                </form>
                            </div><!-- .End .tab-pane -->
                        </div><!-- End .tab-content -->
                    </div><!-- End .form-tab -->
                </div><!-- End .form-box -->
            </div><!-- End .modal-body -->
        </div><!-- End .modal-content -->
    </div><!-- End .modal-dialog -->
</div><!-- End .modal -->


@if(!in_array(Route::currentRouteName(), ['set.password', 'checkout', 'customer.dashboard']))
    <script>
        $(document).ready(function () {
            // Check if any validation errors exist and show the modal if necessary
            @if ($errors->any())
            $('#signin-modal').modal('show');
            @endif
        });
    </script>
@endif

<!-- Cart Modal -->
<div id="cartModal" style="display: none; position: fixed; z-index: 1000; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 450px; background: white; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); border-radius: 8px; text-align: center; padding: 20px; animation: fadeIn 0.5s;">
    <span id="closeModal" style="position: absolute; top: 10px; right: 15px; font-size: 22px; cursor: pointer;">&times;</span>
    <div class="text-center text-success">
        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 36 36">
            <g id="Group_23957" data-name="Group 23957" transform="translate(-6269 7766)">
                <path id="Path_28713" data-name="Path 28713" d="M12.8,32.8a3.6,3.6,0,1,0,3.6,3.6A3.584,3.584,0,0,0,12.8,32.8ZM2,4V7.6H5.6l6.471,13.653-2.43,4.41A3.659,3.659,0,0,0,9.2,27.4,3.6,3.6,0,0,0,12.8,31H34.4V27.4H13.565a.446.446,0,0,1-.45-.45.428.428,0,0,1,.054-.216L14.78,23.8H28.19a3.612,3.612,0,0,0,3.15-1.854l6.435-11.682A1.74,1.74,0,0,0,38,9.4a1.8,1.8,0,0,0-1.8-1.8H9.587L7.877,4H2ZM30.8,32.8a3.6,3.6,0,1,0,3.6,3.6A3.584,3.584,0,0,0,30.8,32.8Z" transform="translate(6267 -7770)" fill="#85b567"></path>
                <rect id="Rectangle_18068" data-name="Rectangle 18068" width="9" height="3" rx="1.5" transform="translate(6284.343 -7757.879) rotate(45)" fill="#fff"></rect>
                <rect id="Rectangle_18069" data-name="Rectangle 18069" width="3" height="13" rx="1.5" transform="translate(6295.657 -7760.707) rotate(45)" fill="#fff"></rect>
            </g>
        </svg>
        <h3 class="fs-28 text-success">আইটেমটি আপনার কার্টে যোগ করা হয়েছে!</h3>
    </div>
    <!-- Product Info -->
    <div style="display: flex; gap: 10px; margin-top: 15px; justify-content: center;">
        <!-- Product Image -->
        <img id="modalImage" src="" alt="Product Image" style="width: 100px; height: auto; border: 1px solid #ddd; border-radius: 4px;">
        <!-- Product Details -->
        <div style="text-align: left;">
            <p id="modalProductTitle" style="font-weight: bold; font-size: 16px; margin: 0;"></p>
            <p style="color: red; font-size: 18px; margin: 5px 0;">৳<span id="modalProductPrice"></span></p>
        </div>
    </div>
    <!-- Buttons -->
    <div style="margin-top: 20px; display: flex; justify-content: space-around;">
        <button id="closeModalBack" style="background-color: green; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">শপিং এ ফিরে যান</button>
        <button onclick="location.href='{{route('checkout')}}'" style="background-color: red; color: white; border: none; padding: 10px 20px; border-radius: 4px; cursor: pointer;">এখনই কিনুন</button>
    </div>
</div>

<!-- Overlay -->
<div id="modalOverlay" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.5); z-index: 999; animation: fadeIn 0.5s;"></div>

<!-- CSS for fadeIn animation and mobile responsiveness -->
<style>
    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @media screen and (max-width: 768px) {
        #cartModal {
            width: 98% !important; /* Adjust width for mobile devices */
            padding: 15px;
        }

        #modalImage {
            width: 80px; /* Resize image for smaller screens */
        }

        #modalProductTitle {
            font-size: 14px; /* Adjust font size for smaller screens */
        }

        #modalProductPrice {
            font-size: 16px; /* Adjust font size for smaller screens */
        }

        .button-container {
            flex-direction: column;
            gap: 10px;
        }

        .button-container button {
            width: 100%; /* Make buttons full width on small screens */
        }
    }
</style>



{{--<div class="container newsletter-popup-container mfp-hide" id="newsletter-popup-form">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-10">--}}
{{--            <div class="row no-gutters bg-white newsletter-popup-content">--}}
{{--                <div class="col-xl-3-5col col-lg-7 banner-content-wrap">--}}
{{--                    <div class="banner-content text-center">--}}
{{--                        <img src="{{asset('/')}}front/assets/images/popup/newsletter/logo.png" class="logo" alt="logo" width="60" height="15">--}}
{{--                        <h2 class="banner-title">get <span>25<light>%</light></span> off</h2>--}}
{{--                        <p>Subscribe to the {{$generalSettingView->site_name}} eCommerce newsletter to receive timely updates from your favorite products.</p>--}}
{{--                        <form action="#">--}}
{{--                            <div class="input-group input-group-round">--}}
{{--                                <input type="email" class="form-control form-control-white" placeholder="Your Email Address" aria-label="Email Adress" required>--}}
{{--                                <div class="input-group-append">--}}
{{--                                    <button class="btn" type="submit"><span>go</span></button>--}}
{{--                                </div><!-- .End .input-group-append -->--}}
{{--                            </div><!-- .End .input-group -->--}}
{{--                        </form>--}}
{{--                        <div class="custom-control custom-checkbox">--}}
{{--                            <input type="checkbox" class="custom-control-input" id="register-policy-2" required>--}}
{{--                            <label class="custom-control-label" for="register-policy-2">Do not show this popup again</label>--}}
{{--                        </div><!-- End .custom-checkbox -->--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-xl-2-5col col-lg-5 ">--}}
{{--                    <img src="{{asset('/')}}front/assets/images/popup/newsletter/img-1.jpg" class="newsletter-img" alt="newsletter">--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        const removeUrl = "{{ route('cart.remove', ['productId' => 'PRODUCT_ID_PLACEHOLDER']) }}";

        document.querySelectorAll('.btn-remove').forEach(function (button) {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                const productId = this.getAttribute('data-product-id');
                const url = removeUrl.replace('PRODUCT_ID_PLACEHOLDER', productId);

                fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': csrfToken
                    },
                })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Remove the product from the DOM
                            this.closest('.product').remove();

                            // Update the cart total
                            document.querySelector('.cart-count').textContent = data.cartCount;
                            document.querySelector('.cart-total-price').textContent = '৳' + number_format(data.total);
                        } else {
                            alert('Error removing product from cart.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            });
        });

        // Helper function to format numbers (optional)
        function number_format(number) {
            return parseFloat(number).toFixed(2).replace(/\d(?=(\d{3})+\.)/g, '$&,');
        }
    });
</script>

@include('flash-toastr::message')

<style>
    /* Customize toastr text size */
    #toast-container > .toast {
        font-size: 16px; /* Adjust this to the desired size */
    }
</style>

<!-- Toastr CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<!-- jQuery (Toastr নির্ভর করে) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Toastr JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script>
    // Toastr configuration options
    toastr.options = {
        "closeButton": true,
        "progressBar": true,
        "positionClass": "toast-top-right",
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    // Display toastr based on session messages
    @if(session('success'))
    toastr.success("{{ session('success') }}");
    @elseif(session('error'))
    toastr.error("{{ session('error') }}");
    @elseif(session('info'))
    toastr.info("{{ session('info') }}");
    @elseif(session('warning'))
    toastr.warning("{{ session('warning') }}");
    @endif
</script>


@if(optional($googleAnalytic)->tag_manager_status == 1)
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id={{optional($googleAnalytic)->tag_manager}}"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
@endif

<!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var debounceTimer;

        $('#q').on('keyup', function() {
            var query = $(this).val();

            clearTimeout(debounceTimer); // Clear the previous timer
            debounceTimer = setTimeout(function() { // Set a new timer
                if (query.length > 0) {
                    $.ajax({
                        url: "{{ route('product.ajaxSearch') }}",
                        type: 'GET',
                        data: {'q': query},
                        success: function(data) {
                            $('#suggestions').empty().show(); // Clear previous suggestions
                            if (data.length > 0) {
                                $.each(data, function(index, product) {
                                    var productUrl = "{{ route('product.show', [':id', ':slug']) }}"
                                        .replace(':id', product.id)
                                        .replace(':slug', product.slug); // Ensure `slug` is present here

                                    $('#suggestions').append(
                                        '<a href="' + productUrl + '">' +
                                        '<li class="list-group-item" role="option" data-product-id="' + product.id + '" data-product-slug="' + product.slug + '">' +
                                        product.name +
                                        '</li>' +
                                        '</a>'
                                    );
                                });
                            } else {
                                $('#suggestions').append('<li class="list-group-item">No results found</li>');
                            }
                        }
                    });
                } else {
                    $('#suggestions').empty().hide(); // Hide suggestions when input is empty
                }
            }, 300); // Debounce delay in milliseconds
        });

        // Handle click event on <li> elements (if needed to intercept the link click)
        $(document).on('click', '#suggestions li', function() {
            var productId = $(this).data('product-id');
            var productSlug = $(this).data('product-slug');
            if (productId && productSlug) {
                var url = "{{ route('product.show', [':id', ':slug']) }}"
                    .replace(':id', productId)
                    .replace(':slug', productSlug);

                window.location.href = url;
            }
        });

        // Hide suggestions when clicking outside the input field
        $(document).click(function(event) {
            if (!$(event.target).closest('#q, #suggestions').length) {
                $('#suggestions').empty().hide();
            }
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const header = document.querySelector('.header-middle'); // Select the header

        window.addEventListener('scroll', function () {
            let scrollTop = window.scrollY || document.documentElement.scrollTop;

            if (scrollTop > 0) {
                // When not at the top of the page
                header.classList.add('fixed');
            } else {
                // At the top of the page
                header.classList.remove('fixed');
            }
        });
    });
</script>


<!-- Plugins JS File -->
<script src="{{asset('/')}}front/assets/js/jquery.min.js"></script>
<script src="{{asset('/')}}front/assets/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('/')}}front/assets/js/jquery.hoverIntent.min.js"></script>
<script src="{{asset('/')}}front/assets/js/jquery.waypoints.min.js"></script>
<script src="{{asset('/')}}front/assets/js/superfish.min.js"></script>
<script src="{{asset('/')}}front/assets/js/bootstrap-input-spinner.js"></script>
<script src="{{asset('/')}}front/assets/js/owl.carousel.min.js"></script>
<script src="{{asset('/')}}front/assets/js/jquery.plugin.min.js"></script>
<script src="{{asset('/')}}front/assets/js/jquery.magnific-popup.min.js"></script>
<script src="{{asset('/')}}front/assets/js/jquery.countdown.min.js"></script>
<!-- Main JS File -->
<script src="{{asset('/')}}front/assets/js/main.js"></script>
<script src="{{asset('/')}}front/assets/js/demos/demo-7.js"></script>

<script src="{{asset('/')}}front/assets/js/jquery.elevateZoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</body>

</html>
