<div class="backtotop"><a href="#" class="scroll"><i class="far fa-arrow-up"></i></a></div>
<header class="header_section header_transparent">
    <div class="container">
        <div class="site_logo"><a href="index.html"><img class="logo_before" src="{{ url('public') }}/images/logo/logo.svg" alt="Petopia Logo"></a></div>
        <nav class="main_menu navbar navbar-expand-lg">
            <div class="main_menu_inner collapse navbar-collapse" id="main_menu_dropdown">
                <ul class="main_menu_list unorder_list_center">
                    <li><a class="nav-link" href="{{route('home')}}">Home</a></li>
                    <li class="dropdown"><a class="nav-link" href="#" id="service_submenu" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Services</a>
                        <ul class="dropdown-menu" aria-labelledby="service_submenu">
                            <li><a href="service.html">Our Service</a></li>
                            <li><a href="service_details.html">Service Details</a></li>
                            <li><a href="gallery.html">Our Gallery</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link" href="#" id="shop_submenu" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                        <ul class="dropdown-menu" aria-labelledby="shop_submenu">
                            <li><a href="shop.html">Our Shop</a></li>
                            <li><a href="shop_details.html">Shop Details</a></li>
                            <li><a href="sales.html">Sales Page</a></li>
                            <li><a href="cart.html">Shopping Cart</a></li>
                            <li><a href="shipping_info.html">Shipping Info</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link" href="#" id="blog_submenu" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                        <ul class="dropdown-menu" aria-labelledby="blog_submenu">
                            <li><a href="blog.html">Our Blogs</a></li>
                            <li><a href="blog_details.html">Blog Details</a></li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="nav-link" href="#" id="pages_submenu" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                        <ul class="dropdown-menu" aria-labelledby="pages_submenu">
                            <li><a href="about.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
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
            <li class="dropdown"><button class="cart_btn" type="button" id="cart_dropdown" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-shopping-cart"></i> <small class="cart_counter">2</small>
                    <span>item</span></button>
                <div class="cart_dropdown dropdown-menu" aria-labelledby="cart_dropdown">
                    <ul class="cart_items_list unorder_list_block">
                        <li><a class="item_image" href="shop_details.html"><img
                                    src="{{ url('public') }}/images/cart/cart_img_1.jpg"
                                    alt="Pet Care Service"></a>
                            <div class="item_content">
                                <h3 class="item_title"><a href="shop_details.html">Flying Fish Cat
                                        Scratching</a></h3><span class="item_price">1 × $12.35</span>
                            </div><button class="remove_btn" type="button"><i class="fal fa-times"></i></button>
                        </li>
                        <li><a class="item_image" href="shop_details.html"><img
                                    src="{{ url('public') }}/images/cart/cart_img_2.jpg"
                                    alt="Pet Care Service"></a>
                            <div class="item_content">
                                <h3 class="item_title"><a href="shop_details.html">Pet Bed</a></h3><span
                                    class="item_price">1 × $58.16</span>
                            </div><button class="remove_btn" type="button"><i class="fal fa-times"></i></button>
                        </li>
                    </ul>
                    <hr>
                    <div class="total_price"><span>Total</span> <strong>$70.51</strong></div><a
                        class="btn border_primary" href="cart.html">Update Cart</a> <a class="btn btn_primary"
                        href="cart.html">Checkout</a>
                </div>
            </li>
        </ul>
    </div>
</header>
