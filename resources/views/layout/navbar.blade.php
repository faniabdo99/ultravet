<div class="backtotop"><a href="#" class="scroll"><i class="far fa-arrow-up"></i></a></div>
<header class="header_section header_transparent">
    <div class="container">
        <div class="site_logo"><a href="index.html"><img class="logo_before" src="{{ url('public') }}/images/logo/logo.svg" alt="Petopia Logo"></a></div>
        <nav class="main_menu navbar navbar-expand-lg">
            <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                <ul class="main_menu_list unorder_list_center">
                    <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    <li><a class="nav-link" href="{{route('product.all')}}">Shop</a></li>
                    <li><a class="nav-link" href="{{route('blog')}}">Blog</a></li>
                    <li class="dropdown"><a class="nav-link" href="#" id="pages_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                        <ul class="dropdown-menu" aria-labelledby="pages_submenu">
                            <li><a href="{{route('about')}}">About Us</a></li>
                            <li><a href="{{route('getContact')}}">Contact Us</a></li>
                            <li><a href="faq.html">FAQ</a></li>
                            <li><a href="error.html">Error 404</a></li>
                            <li><a href="team.html">Our Team</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
        <ul class="header_btns_group unorder_list_right">
            <li><button class="mobile_menu_btn" type="button" data-bs-toggle="collapse"
                    data-bs-target="#main_menu_dropdown" aria-controls="main_menu_dropdown" aria-expanded="false"
                    aria-label="Toggle navigation"><i class="far fa-bars"></i></button>
            </li>
            @guest
            <li><a href="{{route('user.getSignup')}}" class="cart_btn"><i class="fas fa-user"></i> Signup</a></li>
            <li><a href="{{route('user.getLogin')}}" class="cart_btn"><i class="fas fa-user"></i> Login</a></li>
            @endguest
            @auth
                <li class="dropdown"><button class="cart_btn" type="button" id="cart_dropdown" data-bs-toggle="dropdown"
                        aria-expanded="false"><i class="fas fa-shopping-cart"></i> <small class="cart_counter">2</small>
                        <span>item</span></button>
                    <div class="cart_dropdown dropdown-menu" aria-labelledby="cart_dropdown">
                        <ul class="cart_items_list unorder_list_block">
                            <li>
                                <a class="item_image" href="shop_details.html">
                                    <img src="{{ url('public') }}/images/cart/cart_img_2.jpg" alt="Pet Care Service">
                                </a>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Pet Bed</a></h3>
                                    <span class="item_price">1 × $58.16</span>
                                </div>
                                <button class="remove_btn" type="button"><i class="fal fa-times"></i></button>
                            </li>
                        </ul>
                        <hr>
                        <div class="total_price"><span>Total</span> <strong>$70.51</strong></div>
                        <a class="btn border_primary" href="cart.html">Update Cart</a> <a class="btn btn_primary" href="cart.html">Checkout</a>
                    </div>
                </li>
                <li class="dropdown">
                    <button class="cart_btn" type="button" id="cart_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-user"></i><span>{{auth()->user()->name}}</span>
                    </button>
                <div class="cart_dropdown dropdown-menu" aria-labelledby="cart_dropdown">
                    <a class="btn border_primary" href="cart.html">View Profile</a>
                    <a class="btn btn_primary" href="{{route('user.logout')}}">Logout</a>
                </div>
            </li>
            @endauth
        </ul>
    </div>
</header>
<!-- notifications -->
@if(session()->has('success'))
    <div class="notification success-notification">
        <div class="notification-icon">
            <i class="fas fa-check"></i>
        </div>
        <div class="notification-content">
            <b>Success!</b>
            <p class="mb-0">{{session('success')}}</p>
        </div>
    </div>
@endif
@if($errors->any())
    <div class="notification error-notification">
        <div class="notification-icon">
            <i class="fas fa-times"></i>
        </div>
        <div class="notification-content">
            <b>Error!</b>
            @foreach ($errors->all() as $error)
                <p class="mb-0">{{$error}}</p>
            @endforeach
        </div>
    </div>
@endif
