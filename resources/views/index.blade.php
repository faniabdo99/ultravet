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
            @include('includes.featured-products')
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
                                    <div class="item_image">
                                        <a href="{{route('product.all')}}?pet_id={{$Pet->id}}">
                                            <img src="{{$Pet->imagePath}}" alt="{{$Pet->title}}">
                                        </a>
                                    </div>
                                    <div class="item_content">
                                        <a href="{{route('product.all')}}?pet_id={{$Pet->id}}">
                                            <h3 class="item_title">{{$Pet->title}}</h3>
                                        </a>
                                        <div class="page_list">
                                            <ul class="unorder_list_block">
                                                @php
                                                    $Categories = App\Models\Category::featured()->where('pet_id', $Pet->id)->get();
                                                @endphp
                                                @forelse($Categories as $Category)
                                                    <li><a href="{{route('product.all')}}?pet_id={{$Pet->id}}&category_id={{$Category->id}}"><i class="fas fa-circle"></i> {{$Category->title}}</a></li>
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
            @include('includes.our-brands')
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
        </main>
        @include('layout.footer')
    </div>
    @include('layout.scripts')
</body>

</html>
