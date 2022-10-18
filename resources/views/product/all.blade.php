@include('layout.header')
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-7 col-sm-9">
                        <h1 class="page_title">Shop</h1>
                        <p class="page_description mb-0">Nisl rhoncus mattis rhoncus urna neque. Montes nascetur ridiculus mus mauris vitae ultricies</p>
                    </div>
                </div>
            </div>
            <div class="breadcrumb_img dog_image"><img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_4.png" alt="Pet Care Service"></div>
        </section>
        <section class="product_section section_space_lg">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-9">
                        <div class="filter_topdar">
                            <div class="filter_search_result">Showing <span>1-9</span> of <span>20</span> results</div>
                            <div class="select_option mb-0"><select>
                                    <option data-display="Sorting The Products">Select A Option</option>
                                    <option value="1" selected="selected">Default Sorting</option>
                                    <option value="2">Sort By Date</option>
                                    <option value="3">Sort By Price</option>
                                    <option value="4">Sort Category</option>
                                </select></div>
                        </div>
                        <div class="row">
                            @forelse($AllProducts as $Product)
                                <div class="col col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_item">
                                        <div class="item_image">
                                            <a class="image_wrap" href="{{route('product.single' , [$Product->slug, $Product->id])}}">
                                                <img src="{{$Product->imagePath}}" alt="{{$Product->title}}">
                                            </a>
                                            <ul class="cart_btns_group">
                                                <li><a href="#!">Add To Cart</a></li>
                                                <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                <li><a href="#!" data-bs-toggle="modal" data-bs-target="#quick_view_popup"><i class="far fa-eye"></i></a></li>
                                            </ul>
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title"><a href="{{route('product.single' , [$Product->slug, $Product->id])}}">{{$Product->title}}</a></h3>
                                            <ul class="rating_star">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <div class="item_price"><span>{{$Product->price}}$</span></div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p>There are no products to show at the moment</p>
                            @endforelse
                        </div>
                        <div class="pagination_wrap">
                            <ul class="pagination_nav unorder_list">
                                <li class="active"><a href="#!">1</a></li>
                                <li><a href="#!">2</a></li>
                                <li><a href="#!">3</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col col-lg-3">
                        <aside class="sidebar_section">
                            <div class="sb_widget">
                                <h3 class="sb_widget_title" data-bs-toggle="collapse" data-bs-target="#collapse_categories" aria-expanded="false">Categories</h3>
                                <div class="collapse show" id="collapse_categories">
                                    <div class="card card-body">
                                        <form action="#!">
                                            <ul class="filter_category_list unorder_list_block">
                                                @forelse($AllCategories as $Category)
                                                    {{-- TODO: Add links--}}
                                                    <li>
                                                        <div class="checkbox_item"><input type="checkbox" id="checkbox_parrot"><label for="checkbox_parrot"><span>{{$Category->title}}</span><small>{{$Category->Products->count()}}</small></label></div>
                                                    </li>
                                                @empty
                                                    <p>No categories</p>
                                                @endforelse

                                            </ul>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sb_widget">
                                <h3 class="sb_widget_title" data-bs-toggle="collapse" data-bs-target="#collapse_range" aria-expanded="false">Price range</h3>
                                <div class="collapse show" id="collapse_range">
                                    <div class="card card-body">
                                        <form action="#">
                                            <div class="price-range-area clearfix">
                                                <div id="slider-range" class="slider-range"></div>
                                                <div class="price-text"><span>Range:</span><input type="text" id="amount" readonly="readonly"></div><button type="button" class="price_filter_btn">Apply Filter</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="sb_widget">
                                <h3 class="sb_widget_title" data-bs-toggle="collapse" data-bs-target="#collapse_product_type" aria-expanded="false">Pet type</h3>
                                <div class="collapse show" id="collapse_product_type">
                                    <div class="card card-body">
                                        <ul class="page_list unorder_list_block">
                                            @forelse($AllPets as $Pet)
                                                {{-- TODO: Add urls to filter --}}
                                                <li><a href="#!"><i class="fas fa-circle"></i> {{$Pet->title}}</a></li>
                                            @empty
                                                <p>No pets to show</p>
                                            @endforelse
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="sb_widget">
                                <h3 class="sb_widget_title" data-bs-toggle="collapse" data-bs-target="#collapse_related_products" aria-expanded="false">Featured products</h3>
                                <div class="collapse show" id="collapse_related_products">
                                    <div class="card card-body">
                                        @forelse($FeaturedProducts as $FProduct)
                                            <div class="small_product_item"><a class="item_image" href="{{route('product.single' , [$FProduct->slug, $FProduct->id])}}">
                                                    <img src="{{$FProduct->imagePath}}" alt="{{$FProduct->title}}">
                                                </a>
                                                <div class="item_content">
                                                    <h3 class="item_title"><a href="{{route('product.single' , [$FProduct->slug, $FProduct->id])}}">{{$FProduct->title}}</a></h3>
                                                    <div class="item_price"><span>{{$FProduct->price}}$</span></div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>THere are no featured products</p>
                                        @endforelse

                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
        <div class="modal fade" id="quick_view_popup" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content"><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fal fa-times"></i></button>
                    <div class="modal-body">
                        <div class="product_details">
                            <div class="row">
                                <div class="col col-lg-6">
                                    <div class="details_image mb-0"><img src="{{url('public')}}/images/shop/product_img_27.jpg" alt="Dog Residence Mat"></div>
                                </div>
                                <div class="col col-lg-6">
                                    <div class="details_content">
                                        <h2 class="item_title">Cat Collection</h2>
                                        <p>Ornare arcu dui vivamus arcu felis bibendum ut. Auctor neque vitae tempus quam pellentesque. Nibh ipsum consequat nisl vel pretium lectus quam.</p>
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
                                        <div class="item_price"><del>$12.39</del><span>$7.99</span></div>
                                        <ul class="cart_action_wrap unorder_list">
                                            <li>
                                                <div class="quantity_wrap"><span class="quantity_title">Qty:</span>
                                                    <form action="#">
                                                        <div class="quantity_form"><button type="button" class="input_number_decrement"><i class="far fa-angle-down"></i></button><input class="input_number" type="text" value="1"><button type="button" class="input_number_increment"><i class="far fa-angle-up"></i></button></div>
                                                    </form>
                                                </div>
                                            </li>
                                            <li><a class="btn btn_primary addtocart_btn" href="service.html"><i class="fas fa-paw"></i> Add to Cart</a></li>
                                        </ul>
                                        <ul class="details_item_info icon_list unorder_list_block">
                                            <li><strong>SKU:</strong><span>74141</span></li>
                                            <li class="categories_tags"><strong>Categories:</strong><span><a href="#!">Toys</a><a href="#!">Other</a></span></li>
                                            <li class="categories_tags"><strong>Tags:</strong><span><a href="#!">Beds</a><a href="#!">Other</a></span></li>
                                            <li class="share_links"><strong>Share:</strong><span><a href="#!"><i class="fab fa-instagram"></i></a><a href="#!"><i class="fab fa-twitter"></i></a><a href="#!"><i class="fab fa-whatsapp"></i></a></span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.newsletter')
    </main>
    @include('layout.footer')
</div>
@include('layout.scripts')
</body>
</html>
