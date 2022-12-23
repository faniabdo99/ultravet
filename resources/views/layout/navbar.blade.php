<div class="backtotop"><a href="#" class="scroll"><i class="far fa-arrow-up"></i></a></div>
<header class="header_section @if(request()->route() && request()->route()->getName() == 'home') header_transparent @else header_default @endif">
    @if(request()->route() && request()->route()->getName() != 'home')
        <div class="header_top">
            <div class="container">
                <ul class="social_links unorder_list">
                    <li><a href="https://www.facebook.com/profile.php?id=100032388711484" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                    <li><a href="https://www.instagram.com/ultravetleb/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                </ul>
                <ul class="icon_list unorder_list">
                    <li><a href="tel:{{getSystemSettings('phone_number')}}"><i class="fas fa-phone"></i> <span>{{getSystemSettings('phone_number')}}</span></a></li>
                    <li><a href="mailto:{{getSystemSettings('email')}}"><i class="fas fa-envelope"></i> <span>{{getSystemSettings('email')}}</span></a></li>
                    <li>
                        <a href="{{route('switchCurrency.get' , ['currency' => 'usd'])}}">USD</a>
                        <span class="text-white">|</span>
                        <a href="{{route('switchCurrency.get' , ['currency' => 'lbp'])}}">LBP</a>
                    </li>
                </ul>
            </div>
        </div>
    <div class="header_bottom">
    @endif
        <div class="container">
            <div class="site_logo">
                <a href="{{route('home')}}"><img class="logo_before" src="{{ url('public') }}/images/logo/logo.png" alt="Ultravet Logo">
                    <span class="d-none d-lg-inline d-md-inline">Ultravet Mall</span>
                </a>
            </div>
            <nav class="main_menu navbar navbar-expand-lg">
                <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                    <ul class="main_menu_list unorder_list_center">
                        <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
                        <li><a class="nav-link" href="{{route('product.all')}}">Shop</a></li>
                        <li><a class="nav-link" href="{{route('blog')}}">Blog</a></li>
                        <li class="dropdown">
                            <a class="nav-link" href="#" id="pages_submenu" role="button" data-bs-toggle="dropdown" aria-expanded="false">About</a>
                            <ul class="dropdown-menu" aria-labelledby="pages_submenu">
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('getContact')}}">Contact Us</a></li>
                                <li><a href="{{route('faq')}}">FAQs</a></li>
                            </ul>
                        </li>
                        <li class="dropdown d-block d-lg-none d-md-none">
                            <a class="nav-link" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Currency</a>
                            <ul class="dropdown-menu">
                                <li><a href="{{route('switchCurrency.get' , ['currency' => 'usd'])}}">USD</a></li>
                                <li><a href="{{route('switchCurrency.get' , ['currency' => 'lbp'])}}">LBP</a></li>
                            </ul>
                        </li>
                        <li class="dropdown d-block d-lg-none d-md-none">
                            <a class="nav-link" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">Social Media</a>
                            <ul class="dropdown-menu">
                                <li><a href="https://www.facebook.com/profile.php?id=100032388711484" target="_blank"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                                <li><a href="https://www.instagram.com/ultravetleb/" target="_blank"><i class="fab fa-instagram"></i> Instagram</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <ul class="header_btns_group unorder_list_right">
                <li>
                    <button class="nav-search-toggler"><i class="fa fa-search"></i></button>
                </li>
                <li class="dropdown">
                    <button class="cart_btn" type="button" id="cart_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-shopping-cart"></i>
                        <small class="cart_counter">{{userCart(getUserId())->count()}}</small>
                        <span class="d-none d-lg-inline d-md-inline">item</span>
                    </button>
                    <div class="cart_dropdown dropdown-menu" aria-labelledby="cart_dropdown">
                        <ul class="cart_items_list unorder_list_block">
                            @forelse(userCart(getUserId(), 3) as $CartItem)
                                <li>
                                    <a class="item_image" href="{{route('product.single', [$CartItem->Product->slug, $CartItem->Product->id])}}">
                                        <img src="{{$CartItem->Product->imagePath}}" alt="{{$CartItem->Product->title}}">
                                    </a>
                                    <div class="item_content">
                                        <h3 class="item_title">
                                            <a href="{{route('product.single', [$CartItem->Product->slug, $CartItem->Product->id])}}">
                                                {{$CartItem->title}}
                                            </a>
                                        </h3>
                                        <span class="item_price">{{$CartItem->qty}} × {{$CartItem->Product->finalPrice}}$</span>
                                    </div>
                                    <button class="remove_btn delete-from-cart" data-location="navbar" data-id="{{$CartItem->id}}" data-target="{{route('cart.delete')}}" type="button"><i class="fa fa-times"></i></button>
                                </li>
                            @empty
                                <li class="text-center">You don't have anything in your cart</li>
                            @endforelse
                            @if (userCart(getUserId())->count() > 3 )
                                <li class="text-center">and {{userCart(getUserId())->count() - 3}} more items ...</li>
                            @endif
                        </ul>
                        <hr>
                        <div class="total_price"><span>Total</span> <strong><span class="navbar-cart-total text-dark">{{getCartTotal()}}</span>$</strong></div>
                        <a class="btn border_primary" href="{{route('cart.all')}}">View Cart</a>
                        <a class="btn btn_primary" href="{{route('checkout.get')}}">Checkout</a>
                    </div>
                </li>
                @guest
                    <li><a href="{{route('user.getSignup')}}" class="cart_btn"><i class="fas fa-user"></i> <span class="d-none d-lg-inline d-md-inline">Signup</span></a></li>
                    <li class="d-none d-lg-inline d-md-inline"><a href="{{route('user.getLogin')}}" class="cart_btn"><i class="fas fa-user"></i> <span class="d-none d-lg-inline d-md-inline">Login</span></a></li>
                @endguest
                @auth
                    <li class="dropdown">
                        <button class="cart_btn" type="button" id="cart_dropdown" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i><span class="d-none d-lg-inline d-md-inline">{{auth()->user()->name}}</span>
                        </button>
                    <div class="cart_dropdown dropdown-menu" aria-labelledby="cart_dropdown">
                        <a class="btn border_primary" href="{{route('user.orders')}}">My Orders</a>
                        <a class="btn border_primary" href="{{route('user.wishlist')}}">My Wishlist</a>
                        <a class="btn btn_primary" href="{{route('user.logout')}}">Logout</a>
                    </div>
                </li>
                @endauth
                <li class="d-lg-none">
                    <button class="mobile_menu_btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#main_menu_dropdown" aria-controls="main_menu_dropdown" aria-expanded="false"
                            aria-label="Toggle navigation"><i class="far fa-bars"></i></button>
                </li>
            </ul>
        </div>
    @if(request()->route() && request()->route()->getName() != "home")
        </div>
    @endif
</header>
<!-- notifications -->

@if(session()->has('success'))
    <div class="notification notification-success">
        <button class="close-notification-button"><i class="fas fa-times"></i></button>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 notification-icon">
                    <i class="fas fa-check"></i>
                </div>
                <div class="col-9">
                    <h4>Success!</h4>
                    <p>{{session('success')}}</p>
                </div>
            </div>
        </div>
    </div>
@endif
@if($errors->any())
    <div class="notification notification-danger">
        <button class="close-notification-button"><i class="fas fa-times"></i></button>
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 notification-icon">
                    <i class="fas fa-times"></i>
                </div>
                <div class="col-9">
                    <h4>Error!</h4>
                    @foreach ($errors->all() as $error)
                        <p>{{$error}}</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endif
<div id="added-to-cart-success">
    <button class="close-notification-button"><i class="fas fa-times"></i></button>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 notification-icon">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="col-9">
                <h4>Item Added to Cart</h4>
                <p>This item has been added to your shopping cart</p>
                <a href="#!" id="close-added-to-cart">Continue Shopping</a>
                <a href="{{route('cart.all')}}">View Cart</a>
            </div>
        </div>
    </div>
</div>
<div class="navbar-search-overlay">
    <a href="javascript:;" id="close-search-form"><i class="fas fa-times"></i></a>
    <div class="search-form-group">
        <div class="mb-5">
            <form action="{{route('product.search')}}" method="get" class="d-flex search-form-element">
                <input type="text" id="search-box" class="mr-2" name="search" placeholder="What are you looking for?" autofocus required>
                <button type="submit" class="navbar-search-button"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div id="navbar-search-results"></div>
    </div>
</div>
