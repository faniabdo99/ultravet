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
                                                @auth
                                                    <li><a href="#!"><i class="far fa-heart"></i></a></li>
                                                @endauth
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
                                            <div class="item_price">
                                                @if($Product->hasDiscount)
                                                    <del>{{$Product->price}}$</del>
                                                    <span>{{$Product->finalPrice}}$</span>
                                                @else
                                                    <span>{{$Product->finalPrice}}$</span>
                                                @endif
                                            </div>
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
                                <form action="{{route('product.all')}}" method="GET">
                                    <h3 class="sb_widget_title" data-bs-toggle="collapse" data-bs-target="#collapse_categories" aria-expanded="false">Categories</h3>
                                    <div class="collapse show" id="collapse_categories">
                                        <div class="card card-body">
                                            <ul class="filter_category_list unorder_list_block">
                                                @forelse($AllCategories as $Category)
                                                    <li>
                                                        <div class="checkbox_item">
                                                            <input type="radio" id="category-{{$Category->id}}" value="{{$Category->id}}" @if(request()->category_id == $Category->id) checked @endif name="category_id">
                                                            <label for="category-{{$Category->id}}"><span>{{$Category->title}}</span><small>{{$Category->Products->count()}}</small></label>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <p>No categories</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>

                                    <h3 class="sb_widget_title mt-5" data-bs-toggle="collapse" data-bs-target="#collapse_range" aria-expanded="false">Price range</h3>
                                    <div class="collapse show" id="collapse_range">
                                        <div class="card card-body">
                                            <div class="price-range-area clearfix">
                                                <div id="slider-range" class="slider-range"></div>
                                                <div class="price-text"><span>Range:</span><input type="text" id="amount" name="price" readonly="readonly"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="sb_widget_title mt-5" data-bs-toggle="collapse" data-bs-target="#collapse_product_type" aria-expanded="false">Brands</h3>
                                    <div class="collapse show" id="collapse_product_type">
                                        <div class="card card-body">
                                            <ul class="filter_category_list unorder_list_block">
                                                @forelse($AllBrands as $Brand)
                                                    <li>
                                                        <div class="checkbox_item">
                                                            <input type="radio" id="brand-{{$Brand->id}}" value="{{$Brand->id}}" @if(request()->brand_id == $Brand->id) checked @endif name="brand_id">
                                                            <label for="brand-{{$Brand->id}}"><span>{{$Brand->title}}</span></label>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <p>No pets to show</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                    <h3 class="sb_widget_title mt-5" data-bs-toggle="collapse" data-bs-target="#collapse_product_type" aria-expanded="false">Pet type</h3>
                                    <div class="collapse show" id="collapse_product_type">
                                        <div class="card card-body">
                                            <ul class="filter_category_list unorder_list_block">
                                                @forelse($AllPets as $Pet)
                                                    <li>
                                                        <div class="checkbox_item">
                                                            <input type="radio" id="pet-{{$Pet->id}}" value="{{$Pet->id}}" @if(request()->pet_id == $Pet->id) checked @endif name="pet_id">
                                                            <label for="pet-{{$Pet->id}}"><span>{{$Pet->title}}</span></label>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <p>No pets to show</p>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary d-block mt-5"><i class="fas fa-paw"></i> Apply Filters</button>
                                </form>
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
                                                    <div class="item_price">
                                                        @if($FProduct->hasDiscount)
                                                            <del>{{$FProduct->price}}$</del>
                                                            <span>{{$FProduct->finalPrice}}$</span>
                                                        @else
                                                            <span>{{$FProduct->finalPrice}}$</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        @empty
                                            <p>There are no featured products</p>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </section>
    </main>
    @include('layout.footer')
</div>
@include('layout.scripts')
<script>
    inputNumber($(".input_number")), $("#slider-range").length && ($("#slider-range").slider({
        range: !0,
        min: {{$AllProducts->min('price') ?? 0}},
        max: {{$AllProducts->max('price') ?? 0}},
        values: [{{$AllProducts->min('price') ?? 0}}, {{$AllProducts->max('price') ?? 0}}],
        slide: function (o, e) {
            $("#amount").val("$" + e.values[0] + " - $" + e.values[1])
        }
    }), $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1))),
        $(".ar_top").on("click", function () {
            var o = $(this).next().attr("id"),
                o = document.getElementById(o),
                e = o.value;
            if ($(".proceed_to_checkout .update-cart").removeAttr("disabled"), isNaN(e)) return !1;
            o.value++
        })
</script>
</body>
</html>
