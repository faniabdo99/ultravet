<div id="added-to-cart-success">
    <div class="container-fluid">
        <div class="row">
            <div class="col-3">
                <i class="fas fa-shopping-cart"></i>
            </div>
            <div class="col-9">
                <h4>Item Added to Cart</h4>
                <p>This item has been added to your shopping cart</p>
                <a href="{{route('product.all')}}" id="close-added-to-cart">Continue Shopping</a>
                <a href="{{route('cart.all')}}">View Cart</a>
            </div>
        </div>
    </div>
</div>
<footer class="footer_section">
    <div class="footer_widget_area section_space_lg">
        <div class="container">
            <div class="row justify-content-lg-between">
                <div class="col col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget footer_about">
                        <div class="site_logo"><a href="{{route('home')}}"><img class="logo_before"
                                    src="{{url('public')}}/images/logo/logo.png" alt="Petopia Logo"> Ultravet Mall</a></div>
                        <p>Tristique nulla aliquet enim tortor at auctor urna nunc. Massa enim nec dui nunc
                            mattis enim ut tellus. Sed ut perspiciatis unde ...</p>
                        <div class="footer_hotline iconbox_item iconbox_lefticon">
                            <div class="item_icon"><i class="fas fa-phone"></i></div>
                            <div class="item_content">
                                <h3 class="item_title"><a href="tel:(913)756-3126">(913) 756-3126</a></h3>
                                <p class="mb-0">Got Questions? Call us 24/7</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3 class="footer_widget_title">Working Hours</h3>
                        <div class="office_hour">
                            <ul class="unorder_list_block">
                                <li><span>Mon - Fri:</span> <span>7am – 6pm</span></li>
                                <li><span>Saturday:</span> <span>9am – 4pm</span></li>
                                <li><span>Sunday:</span> <span><strong>Closed</strong></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-2 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3 class="footer_widget_title">Useful Links</h3>
                        <div class="page_list">
                            <ul class="unorder_list_block">
                                <li><a href="{{route('home')}}"><i class="fas fa-circle"></i>Home</a></li>
                                <li><a href="{{route('about')}}"><i class="fas fa-circle"></i>About</a></li>
                                <li><a href="service.html"><i class="fas fa-circle"></i>Services</a></li>
                                <li><a href="{{route('product.all')}}"><i class="fas fa-circle"></i>Shop</a></li>
                            </ul>
                            <ul class="unorder_list_block">
                                <li><a href="faq.html"><i class="fas fa-circle"></i>FAQ</a></li>
                                <li><a href="gallery.html"><i class="fas fa-circle"></i>Gallery</a></li>
                                <li><a href="shipping_info.html"><i class="fas fa-circle"></i>Delivery</a></li>
                                <li><a href="deals.html"><i class="fas fa-circle"></i>Sales</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3 col-md-6 col-sm-6">
                    <div class="footer_widget">
                        <h3 class="footer_widget_title">Find Us</h3>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d208.22360958292492!2d35.4793335!3d33.3820881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151e95dad2776bfb%3A0xd1d5e689073ffa18!2sUltraVet%20Veterinary%20Center!5e0!3m2!1sen!2seg!4v1668121471431!5m2!1sen!2seg" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer_bottom">
        <div class="container">
            <p class="copyrights_text text-center">© UltraVet 2022 | Developed By <a href="https://productions.naqrah.net" target="_blank">Naqrah Productions</a></p>
        </div>
    </div>
</footer>
