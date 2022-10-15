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
                                @if($TheProduct->hasDiscount())
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
                                <div class="item_price"><span>{{$TheProduct->price}}$</span></div>
                                {{-- <div class="item_price"><del>$12.39</del> <span>$7.99</span></div> --}}
                                <ul class="cart_action_wrap unorder_list">
                                    <li>
                                        <div class="quantity_wrap"><span class="quantity_title">Qty:</span>
                                            <form action="#">
                                                <div class="quantity_form">
                                                        <button type="button" class="input_number_decrement"><i class="far fa-angle-down"></i></button>
                                                        <input class="input_number" type="text" value="1"> 
                                                        <button type="button" class="input_number_increment"><i class="far fa-angle-up"></i></button>
                                                    </div>
                                            </form>
                                        </div>
                                    </li>
                                    <li><a class="btn btn_primary addtocart_btn" href="javascript:;"><i class="fas fa-paw"></i> Add to Cart</a></li>
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
                            <li role="presentation"><button data-bs-toggle="tab" data-bs-target="#tab_reviews" type="button" role="tab" aria-selected="false">Reviews</button></li>
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
                            <div class="tab-pane fade" id="tab_reviews" role="tabpanel">
                                <div class="row">
                                    <div class="col col-lg-6">
                                        <div class="comments_wrap">
                                            <h3>Customer Questions & Answers</h3>
                                            <ul class="comments_list unorder_list_block">
                                                <li>
                                                    <div class="comment_item">
                                                        <div class="thumbnail_wrap text-center">
                                                            <div class="commenter_thumbnail"><img
                                                                    src="{{url('public')}}/images/meta/thumbnail_img_5.jpg"
                                                                    alt="commenter Image"></div>
                                                            <h4 class="commenter_name">Melissa</h4>
                                                        </div>
                                                        <div class="comment_content">
                                                            <div
                                                                class="mb-3 d-md-flex align-items-center justify-content-md-between">
                                                                <span class="comment_date">February 5, 2022, at 11:22
                                                                    am</span>
                                                                <ul class="rating_star">
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                            <p class="mb-0">Ultrices eros in cursus turpis massa
                                                                tincidunt. Magna eget est lorem ipsum dolor sit amet. Eu
                                                                tincidunt tortor aliquam nulla facilisi cras. Ipsum
                                                                dolor sit amet consectetur adipiscing elit. Id venenatis
                                                                a condimentum</p>
                                                        </div>
                                                    </div>
                                                    <ul class="comments_list unorder_list_block">
                                                        <li>
                                                            <div class="comment_item">
                                                                <div class="thumbnail_wrap text-center">
                                                                    <div class="commenter_thumbnail"><img
                                                                            src="{{url('public')}}/images/meta/thumbnail_img_6.jpg"
                                                                            alt="commenter Image"></div>
                                                                    <h4 class="commenter_name">Luvleen</h4>
                                                                </div>
                                                                <div class="comment_content">
                                                                    <div
                                                                        class="mb-3 d-md-flex align-items-center justify-content-md-between">
                                                                        <span class="comment_date">February 5, 2022, at
                                                                            01:01 pm</span>
                                                                        <ul class="rating_star">
                                                                            <li><i class="fas fa-star"></i></li>
                                                                            <li><i class="fas fa-star"></i></li>
                                                                            <li><i class="fas fa-star"></i></li>
                                                                            <li><i class="fas fa-star"></i></li>
                                                                            <li><i class="fas fa-star"></i></li>
                                                                        </ul>
                                                                    </div>
                                                                    <p class="mb-0">Tincidunt nunc pulvinar sapien et
                                                                        ligula ullamcorper malesuada. Placerat orci
                                                                        nulla pellentesque dignissim. Bibendum est
                                                                        ultricies integer quis auctor elit sed vulputate
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="comment_item">
                                                        <div class="thumbnail_wrap text-center">
                                                            <div class="commenter_thumbnail"><img
                                                                    src="{{url('public')}}/images/meta/thumbnail_img_7.jpg"
                                                                    alt="commenter Image"></div>
                                                            <h4 class="commenter_name">Fabiana</h4>
                                                        </div>
                                                        <div class="comment_content">
                                                            <div
                                                                class="mb-3 d-md-flex align-items-center justify-content-md-between">
                                                                <span class="comment_date">February 9, 2022, at 09:34
                                                                    am</span>
                                                                <ul class="rating_star">
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                    <li><i class="fas fa-star"></i></li>
                                                                </ul>
                                                            </div>
                                                            <p class="mb-0">Ultrices eros in cursus turpis massa
                                                                tincidunt. Magna eget est lorem ipsum dolor sit amet. Eu
                                                                tincidunt tortor aliquam nulla facilisi cras. Ipsum
                                                                dolor sit amet consectetur adipiscing elit. Id venenatis
                                                                a condimentum</p>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col col-lg-6">
                                        <div class="review_form">
                                            <h3>Add a review</h3>
                                            <div class="review_star_wrap mb-4">
                                                <h4 class="input_title">Your rating <sup>*</sup></h4>
                                                <ul class="rating_star">
                                                    <li><a href="#!"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#!"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#!"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#!"><i class="fas fa-star"></i></a></li>
                                                    <li><a href="#!"><i class="fas fa-star"></i></a></li>
                                                </ul>
                                            </div>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="form_item mb-0"><label class="input_title"
                                                                for="review_comment">Your review <sup>*</sup></label>
                                                            <textarea id="review_comment" name="comment"
                                                                placeholder="Type your review"></textarea></div>
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <div class="form_item mb-0"><label class="input_title"
                                                                for="reviewer_name">Name <sup>*</sup></label> <input
                                                                id="reviewer_name" type="text" name="name"
                                                                placeholder="Type your Name"></div>
                                                    </div>
                                                    <div class="col col-md-6">
                                                        <div class="form_item mb-0"><label class="input_title"
                                                                for="reviewer_name">Email <sup>*</sup></label> <input
                                                                id="reviewer_email" type="text" name="email"
                                                                placeholder="Type your Email"></div>
                                                    </div>
                                                    <div class="col"><button type="submit" class="btn btn_primary"><i
                                                                class="fas fa-paw"></i> Send a review</button></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="product_section section_space_lg">
                <div class="container">
                    <div class="section_title">
                        <h2 class="title_text mb-0"><span class="sub_title">Our Products</span> Top Products</h2>
                    </div>
                </div>
                <div class="product_carousel">
                    <div class="row common_carousel_4col" data-slick='{"dots": false, "centerMode": true}'>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_1.jpg" alt="Pink Spiked Collar"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Pink Spiked Collar</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$22.99</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <ul class="badge_group unorder_list_right">
                                    <li><a class="badge badge_sale" href="#!">Sale</a></li>
                                </ul>
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_2.jpg" alt="Squeezz Ball Dog Toy"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Squeezz Ball Dog Toy</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><del>$12.39</del> <span>$7.99</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_3.jpg"
                                            alt="Hydrolyzed Dry Dog Food"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Hydrolyzed Dry Dog Food</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$12.39</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_4.jpg"
                                            alt="Flying Fish Cat Scratching "></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Flying Fish Cat Scratching</a>
                                    </h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$25.89</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_5.jpg" alt="Tug Dog Toy"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Tug Dog Toy</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$99.99</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_1.jpg" alt="Pink Spiked Collar"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Pink Spiked Collar</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$22.99</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <ul class="badge_group unorder_list_right">
                                    <li><a class="badge badge_sale" href="#!">Sale</a></li>
                                </ul>
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_2.jpg" alt="Squeezz Ball Dog Toy"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Squeezz Ball Dog Toy</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><del>$12.39</del> <span>$7.99</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_3.jpg"
                                            alt="Hydrolyzed Dry Dog Food"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Hydrolyzed Dry Dog Food</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$12.39</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_4.jpg"
                                            alt="Flying Fish Cat Scratching "></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Flying Fish Cat Scratching</a>
                                    </h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$25.89</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="col carousel_item">
                            <div class="product_item">
                                <div class="item_image"><a class="image_wrap" href="shop_details.html"><img
                                            src="{{url('public')}}/images/shop/product_img_5.jpg" alt="Tug Dog Toy"></a>
                                    <ul class="cart_btns_group">
                                        <li><a href="#!">Add To Cart</a></li>
                                        <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                        <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i
                                                    class="far fa-eye"></i></a></li>
                                    </ul>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title"><a href="shop_details.html">Tug Dog Toy</a></h3>
                                    <ul class="rating_star">
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                        <li><i class="fas fa-star"></i></li>
                                    </ul>
                                    <div class="item_price"><span>$99.99</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel_arrow">
                        <div class="container"><button type="button" class="cc4c_left_arrow"><i
                                    class="far fa-arrow-left"></i></button> <button type="button"
                                class="cc4c_right_arrow"><i class="far fa-arrow-right"></i></button></div>
                    </div>
                </div>
            </section>
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
