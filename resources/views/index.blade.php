@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="banner_section banner_style_2 decoration_wrap"
                style="background-image: url('{{url('public')}}/images/banner/shape_banner_bg.svg');">
                <div class="section_overlay"
                    style="background-image: url('{{url('public')}}/images/overlay/shapes_overlay_2.svg');"></div>
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col order-last col-lg-6">
                            <div class="banner_image"><img src="{{url('public')}}/images/banner/dogs_img_1.png" alt="Pet Dogs Image"></div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="banner_content">
                                <h1 class="banner_title"><span class="banner_sub_title">{{getSystemSettings('homepage_slogan') ?? 'We treat your pet like family'}}</span>
                                    {{getSystemSettings('homepage_header') ?? 'We Help You Care for Animals with Nutrition'}}</h1>
                                <p class="banner_description">{{getSystemSettings('homepage_description') ?? 'Welcome to Ultravet'}}</p>
                                <div class="banner_policy_items row">
                                    @if(getSystemSettings('card_one_icon') && getSystemSettings('card_one_title') && getSystemSettings('card_one_description'))
                                        <div class="col">
                                            <div class="iconbox_item iconbox_lefticon">
                                                <div class="item_icon"><i class="{{getSystemSettings('card_one_icon')}}"></i></div>
                                                <div class="item_content">
                                                    <h3 class="item_title mb-0">{{getSystemSettings('card_one_title')}}</h3>
                                                    <p class="mb-0">{{getSystemSettings('card_one_description')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(getSystemSettings('card_two_icon') && getSystemSettings('card_two_title') && getSystemSettings('card_two_description'))
                                        <div class="col">
                                            <div class="iconbox_item iconbox_lefticon">
                                                <div class="item_icon"><i class="{{getSystemSettings('card_two_icon')}}"></i></div>
                                                <div class="item_content">
                                                    <h3 class="item_title mb-0">{{getSystemSettings('card_two_title')}}</h3>
                                                    <p class="mb-0">{{getSystemSettings('card_two_description')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(getSystemSettings('card_three_icon') && getSystemSettings('card_three_title') && getSystemSettings('card_three_description'))
                                        <div class="col">
                                            <div class="iconbox_item iconbox_lefticon">
                                                <div class="item_icon"><i class="{{getSystemSettings('card_three_icon')}}"></i></div>
                                                <div class="item_content">
                                                    <h3 class="item_title mb-0">{{getSystemSettings('card_three_title')}}</h3>
                                                    <p class="mb-0">{{getSystemSettings('card_three_description')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                    @if(getSystemSettings('card_four_icon') && getSystemSettings('card_four_title') && getSystemSettings('card_four_description'))
                                        <div class="col">
                                            <div class="iconbox_item iconbox_lefticon">
                                                <div class="item_icon"><i class="{{getSystemSettings('card_four_icon')}}"></i></div>
                                                <div class="item_content">
                                                    <h3 class="item_title mb-0">{{getSystemSettings('card_four_title')}}</h3>
                                                    <p class="mb-0">{{getSystemSettings('card_four_description')}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="funfact_section section_space_md">
                <div class="container">
                    <div class="funfact_wrapper decoration_wrap"
                        style="background-image: url('{{url('public')}}/images/overlay/shapes_overlay_3.svg');">
                        <div class="section_overlay"
                            style="background-image: url('{{url('public')}}/images/overlay/shapes_overlay_4.svg');"></div>
                        <div class="funfact_item">
                            <div class="item_icon"><img src="{{url('public')}}/images/icon/icon_pets.svg" alt="Pets Icon"></div>
                            <div class="item_content">
                                <h3 class="counter_text text-white"><span class="counter_value">{{getSystemSettings('happy_clients')}}</span> <span
                                        class="plus_text">+</span></h3>
                                <p class="item_title text-white mb-0">Happy Clients</p>
                            </div>
                        </div>
                        <div class="funfact_item">
                            <div class="item_icon"><img src="{{url('public')}}/images/icon/icon_medal.svg" alt="Pets Icon"></div>
                            <div class="item_content">
                                <h3 class="counter_text text-white"><span class="counter_value">{{getSystemSettings('years')}}</span> <span
                                        class="plus_text">+</span></h3>
                                <p class="item_title text-white mb-0">Years Experience</p>
                            </div>
                        </div>
                        <div class="funfact_item">
                            <div class="item_icon"><img src="{{url('public')}}/images/icon/icon_canned_food.svg" alt="Pets Icon">
                            </div>
                            <div class="item_content">
                                <h3 class="counter_text text-white"><span class="counter_value">{{getSystemSettings('brands')}}</span> <span
                                        class="plus_text">+</span></h3>
                                <p class="item_title text-white mb-0">Brands Available</p>
                            </div>
                        </div>
                        <div class="funfact_item">
                            <div class="item_icon"><img src="{{url('public')}}/images/icon/icon_shopping_bag.svg" alt="Pets Icon">
                            </div>
                            <div class="item_content">
                                <h3 class="counter_text text-white"><span class="counter_value">{{getSystemSettings('products')}}</span> <span
                                        class="plus_text">+</span></h3>
                                <p class="item_title text-white mb-0">Products for pets</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="category_section section_space_md">
                <div class="container">
                    <div class="section_title text-center">
                        <h2 class="title_text mb-0"><span class="sub_title">Our Category</span> Explore by Pet Type</h2>
                    </div>
                    <div class="row category_items_wrap">
                        <div class="col col-lg-2"></div>
                        @forelse($FeaturedPets as $Pet)
                            <div class="col col-lg-4">
                                <div class="category_item" style="background-image: url('{{url('public')}}/images/shape/shape_path_2.svg');">
                                    <div class="item_image"><img src="{{$Pet->imagePath}}" alt="{{$Pet->title}}"></div>
                                    <div class="item_content">
                                        <a href="{{route('product.pet' , $Pet->slug)}}">
                                            <h3 class="item_title">{{$Pet->title}}</h3>
                                        </a>
                                        <div class="page_list">
                                            <ul class="unorder_list_block">
                                                @php
                                                    $Categories = App\Models\Category::featured()->where('pet_id', $Pet->id)->get();
                                                @endphp
                                                @forelse($Categories as $Category)
                                                    <li><a href="{{route('product.category-brand' , [$Category->slug, $Pet->slug])}}"><i class="fas fa-circle"></i> {{$Category->title}}</a></li>
                                                @empty
                                                    <li>There are no categories at the moment!</li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>There are no pets in the system at the moment.</p>
                        @endforelse
                        <div class="col col-lg-2"></div>
                    </div>
                </div>
            </section>
            @include('includes.featured-products')
            <section class="offer_banner_section section_space_md">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-8">
                            <div class="offer_banner_item banner_big align-items-start d-block"
                                style="background-image: url('{{url('public')}}/images/banner/offer_banner_bg_img_1.jpg');">
                                <div class="badge_wrap text-end">
                                    <div class="badge">Up to 40% Off</div>
                                </div>
                                <div class="item_content">
                                    <h3 class="item_title">Сheck Out Our Specials</h3>
                                    <p>Massa placerat duis ultricies lacus. Aliquet bibendum enim facilisis gravida
                                        neque convallis</p><a class="btn_unfill" href="service_details.html"><span>Shop
                                            Now</span> <i class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-4">
                            <div class="offer_banner_item">
                                <div class="item_image"><img src="{{url('public')}}/images/banner/dogs_img_2.png"
                                        alt="Pet Dog Image"></div>
                                <div class="item_content">
                                    <h3 class="item_title">Luxury Fashion Collection</h3><a class="btn_unfill"
                                        href="service_details.html"><span>Shop Now</span> <i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                            <div class="offer_banner_item">
                                <div class="item_image"><img src="{{url('public')}}/images/banner/dogs_img_3.png"
                                        alt="Pet Dog Image"></div>
                                <div class="item_content">
                                    <h3 class="item_title">Luxury Fashion Collection</h3><a class="btn_unfill"
                                        href="service_details.html"><span>Shop Now</span> <i
                                            class="far fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
{{--            <section class="more_products_section section_space_md">--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col col-lg-4">--}}
{{--                            <div class="small_products_wrap">--}}
{{--                                <h3 class="wrap_title">Featured Products</h3>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_6.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Detachable Gravity Bowl Food--}}
{{--                                                Feeder</a></h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$20.12</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_7.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Dog Collar for Small, Medium,--}}
{{--                                                Large Dogs</a></h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$16.88</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_8.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Pink Embossed Spiked--}}
{{--                                                Collar</a></h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$34.98</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col col-lg-4">--}}
{{--                            <div class="small_products_wrap">--}}
{{--                                <h3 class="wrap_title">On Sale Products</h3>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_9.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Black Leather Spike Dog--}}
{{--                                                Collar, Small</a></h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$23.55</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_10.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Dog Chew Toys for Chewers</a>--}}
{{--                                        </h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$8.99</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_11.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Duck Jerky Strips Dog--}}
{{--                                                Treats</a></h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$32.99</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col col-lg-4">--}}
{{--                            <div class="small_products_wrap">--}}
{{--                                <h3 class="wrap_title">Top Rated Products</h3>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_12.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Carrying Bag for Cats--}}
{{--                                                Weighing up to 6 kg</a></h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$70.43</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_13.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Rhinestone Pet Collar</a>--}}
{{--                                        </h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$35.66</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                                <div class="small_product_item"><a class="item_image" href="shop_details.html"><img--}}
{{--                                            src="{{url('public')}}/images/shop/product_img_14.png" alt="Pet Accessories"></a>--}}
{{--                                    <div class="item_content">--}}
{{--                                        <h3 class="item_title"><a href="shop_details.html">Teeth Cleaning Toy for--}}
{{--                                                Dogs</a></h3>--}}
{{--                                        <ul class="rating_star">--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                            <li><i class="fas fa-star"></i></li>--}}
{{--                                        </ul>--}}
{{--                                        <div class="item_price"><span>$12.98</span></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </section>--}}
            @include('includes.newsletter')
            <section class="blog_section section_space_md">
                <div class="container">
                    <div class="section_title text-center">
                        <h2 class="title_text mb-0"><span class="sub_title">Our Blog</span> Latest Posts</h2>
                    </div>
                    <div class="row justify-content-center mt-5">
                        @forelse($LatestArticles as $Article)
                            <div class="col col-lg-4 col-md-6 col-sm-6">
                                <div class="blog_item">
                                    <a class="item_image" href="{{route('blog.single', [$Article->slug, $Article->id])}}"><img src="{{$Article->imagePath}}" alt="{{$Article->title}}"></a>
                                    <div class="item_content">
                                        <ul class="post_meta unorder_list">
                                            <li><a href="#!"><i class="fas fa-user"></i> by {{$Article->User->name}}</a></li>
                                            <li><a href="#!"><i class="fas fa-calendar-day"></i> {{$Article->created_at->format('Y.m.d')}}</a></li>
                                        </ul>
                                        <h3 class="item_title"><a href="{{route('blog.single', [$Article->slug, $Article->id])}}">{{$Article->title}}</a></h3>
                                        <p class="mb-0">{{$Article->description}}</p>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">Looks like there are no articles!</p>
                        @endforelse
                    </div>
                </div>
            </section>
            @include('includes.our-brands')
        </main>
        @include('layout.footer')
    </div>
    @include('layout.scripts')
</body>

</html>
