@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="details_section product_details section_space_lg pb-0">
                <div class="container">
                    <div class="row mb-5">
                        <div class="col col-lg-6">
                            <div class="product_gallery_carousel">
                                @if($TheProduct->hasDiscount)
                                    <ul class="badge_group unorder_list_right">
                                        <li><a class="badge badge_sale" href="#!">Sale</a></li>
                                    </ul>
                                @endif
                                <div class="product_gallery_for">
                                    <div class="image_wrap">
                                        <img src="{{$TheProduct->imagePath}}" alt="{{$TheProduct->title}}">
                                    </div>
                                    @forelse($TheProduct->attachment()->get() as $Attachment)
                                        <div class="image_wrap"><img src="{{url($Attachment->url())}}" alt="{{$TheProduct->title}}"></div>
                                    @empty
                                    @endforelse
                                </div>
                                <div class="product_gallery_nav">
                                    <div class="image_wrap"><img src="{{$TheProduct->imagePath}}" alt="{{$TheProduct->title}}"></div>
                                    @forelse($TheProduct->attachment()->get() as $Attachment)
                                        <div class="image_wrap"><img src="{{url($Attachment->url())}}" alt="{{$TheProduct->title}}"></div>
                                    @empty
                                    @endforelse
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="details_content">
                                <h2 class="item_title">{{$TheProduct->title}}</h2>
                                <p>{{$TheProduct->description}}</p>
                                <div class="item_review_info d-flex align-items-center">
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="review_counter"><span>2</span> Reviews</div>
                                </div>
                                @if($TheProduct->has_discount)
                                    <div class="item_price"><del>{{$TheProduct->price}}$</del> <span>{{$TheProduct->finalPrice}}$</span></div>
                                @else
                                    <div class="item_price"><span>{{$TheProduct->price}}$</span></div>
                                @endif
                                <ul class="cart_action_wrap unorder_list">
                                    <li>
                                        <div class="quantity_wrap"><span class="quantity_title">Qty:</span>
                                            <div class="quantity_form">
                                                <input class="input_number" name="qty" type="number" min="0" placeholder="1">
                                            </div>
                                        </div>
                                    </li>
                                    @if($TheProduct->cartReady)
                                        <li><a class="btn btn_primary addtocart_btn" data-id="{{$TheProduct->id}}" data-user="{{getUserId()}}" data-target="{{route('cart.add')}}" href="javascript:;"><i class="fas fa-paw"></i> Add to Cart</a></li>
                                    @endif
                                </ul>
                                <ul class="details_item_info icon_list unorder_list_block">
                                    <li><strong>SKU:</strong> <span>{{$TheProduct->sku}}</span></li>
                                    <li class="categories_tags"><strong>Category:</strong> <span><a href="#!">{{$TheProduct->Category->title}}</a></span></li>
                                    <li class="categories_tags"><strong>Brand:</strong> <span><a href="#!">{{$TheProduct->Brand->title}}</a></span></li>
                                    <li class="categories_tags"><strong>For Pet:</strong> <span><a href="#!">{{$TheProduct->Pet->title}}</a></span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="details_info_box">
                        <ul class="nav tabs_nav_pill" role="tablist">
                            <li role="presentation"><button class="active" data-bs-toggle="tab" data-bs-target="#tab_description" type="button" role="tab" aria-selected="true">Description</button></li>
                            <li role="presentation"><button data-bs-toggle="tab" data-bs-target="#tab_additional_info" type="button" role="tab" aria-selected="false">Additional Info</button></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab_description" role="tabpanel">
                                <h3>Product Description</h3>
                                {!! $TheProduct->content !!}
                            </div>
                            <div class="tab-pane fade" id="tab_additional_info" role="tabpanel">
                                <ul class="additional_info_table unorder_list_block">
                                    <li><span>Brand</span> <span>Envato</span></li>
                                    <li><span>Color</span> <span>Black</span></li>
                                    <li><span>Size</span> <span>Medium</span></li>
                                    <li><span>Weight</span> <span>27 KG</span></li>
                                    <li><span>Dimensions</span> <span>16x22x123 CM</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            @include('includes.featured-products')
            <div class="modal fade" id="quick_view_popup" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content"><button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"><i class="fal fa-times"></i></button>
                        <div class="modal-body">
                            <div class="product_details">
                                <div class="row">
                                    <div class="col col-lg-6">
                                        <div class="details_image mb-0"><img src="{{url('public')}}/images/shop/product_img_27.jpg"
                                                alt="{{$TheProduct->title}}"></div>
                                    </div>
                                    <div class="col col-lg-6">
                                        <div class="details_content">
                                            <h2 class="item_title">Cat Collection</h2>
                                            <p>Ornare arcu dui vivamus arcu felis bibendum ut. Auctor neque vitae tempus
                                                quam pellentesque. Nibh ipsum consequat nisl vel pretium lectus quam.
                                            </p>
                                            <div class="item_review_info d-flex align-items-center">
                                                <ul class="rating_star">
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                    <li><i class="fas fa-star"></i></li>
                                                </ul>
                                                <div class="review_counter"><span>2</span> Reviews</div>
                                            </div>
                                            <div class="item_price"><del>$12.39</del> <span>$7.99</span></div>
                                            <ul class="cart_action_wrap unorder_list">
                                                <li>
                                                    <div class="quantity_wrap"><span class="quantity_title">Qty:</span>
                                                        <form action="#">
                                                            <div class="quantity_form"><button type="button"
                                                                    class="input_number_decrement"><i
                                                                        class="far fa-angle-down"></i></button> <input
                                                                    class="input_number" type="text" value="1"> <button
                                                                    type="button" class="input_number_increment"><i
                                                                        class="far fa-angle-up"></i></button></div>
                                                        </form>
                                                    </div>
                                                </li>
                                                <li><a class="btn btn_primary addtocart_btn" href="service.html"><i
                                                            class="fas fa-paw"></i> Add to Cart</a></li>
                                            </ul>
                                            <ul class="details_item_info icon_list unorder_list_block">
                                                <li><strong>SKU:</strong> <span>74141</span></li>
                                                <li class="categories_tags"><strong>Categories:</strong> <span><a
                                                            href="#!">Toys</a> <a href="#!">Other</a></span></li>
                                                <li class="categories_tags"><strong>Tags:</strong> <span><a
                                                            href="#!">Beds</a> <a href="#!">Other</a></span></li>
                                                <li class="share_links"><strong>Share:</strong> <span><a href="#!"><i
                                                                class="fab fa-instagram"></i></a> <a href="#!"><i
                                                                class="fab fa-twitter"></i></a> <a href="#!"><i
                                                                class="fab fa-whatsapp"></i></a></span></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <section class="offer_banner_section">
                <div class="container">
                    <div class="offer_banner_item banner_big align-items-start d-block"
                        style="background-image: url('{{url('public')}}/images/banner/offer_banner_bg_img_1.jpg');">
                        <div class="badge_wrap mb-5">
                            <div class="badge">Up to 40% Off</div>
                        </div>
                        <div class="item_content">
                            <h3 class="item_title">Сheck Out Our Specials</h3>
                            <p>Massa placerat duis ultricies lacus. Aliquet bibendum enim facilisis gravida neque
                                convallis</p><a class="btn_unfill" href="service_details.html"><span>Shop Now</span> <i
                                    class="far fa-long-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        @include('layout.footer')
    </div>
    @include('layout.scripts')
</body>

</html>
