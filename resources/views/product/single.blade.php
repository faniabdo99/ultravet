@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="details_section product_details section_space_md pb-0">
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
                                @if($TheProduct->Brand->slug != 'deleted-brand')
                                    <p class="product-meta-data">By <a href="{{route('product.brand' , $TheProduct->Brand->slug)}}">{{$TheProduct->Brand->title}}</a></p>
                                @endif
                                @if($TheProduct->has_discount)
                                    <div class="item_price"><del>{{convertCurrency($TheProduct->finalPrice, session()->get('currency')) . getCurrencySymbole(session()->get('currency'))}}</del> <span>{{convertCurrency($TheProduct->finalPrice, session()->get('currency')) . getCurrencySymbole(session()->get('currency'))}}</span></div>
                                @else
                                    <div class="item_price"><span>{{convertCurrency($TheProduct->finalPrice, session()->get('currency')) . getCurrencySymbole(session()->get('currency'))}}</span></div>
                                @endif
                                <form class="addtocart_form" data-target="{{route('cart.add')}}">
                                    <input type="hidden" name="product_id" value="{{$TheProduct->id}}" />
                                    <input type="hidden" name="user_id" value="{{getUserId()}}" />
                                    @if($TheProduct->Variations->count())
                                        {{-- Display all possible variations --}}
                                        @forelse($TheProduct->Variations->groupBy('label') as $ProductVariation)
                                            <label class="d-block" for="{{$ProductVariation[0]->label}}">{{$ProductVariation[0]->label}}: </label>
                                            <select id="{{$ProductVariation[0]->label}}" class="w-100 mb-2" name="variation_{{$ProductVariation[0]->label}}">
                                                <option value="">Choose {{$ProductVariation[0]->label}}</option>
                                                @forelse($ProductVariation as $Variation)
                                                    <option value="{{$Variation->value}}">{{$Variation->value}}</option>
                                                @empty
                                                @endforelse
                                            </select>
                                        @empty
                                        @endforelse
                                    @endif
                                    <ul class="cart_action_wrap unorder_list">
                                        <li>
                                            <div class="quantity_wrap"><span class="quantity_title">Qty:</span>
                                                <div class="quantity_form">
                                                    <input class="input_number" name="qty" type="number" min="0" value="1">
                                                </div>
                                            </div>
                                        </li>
                                        @if($TheProduct->cartReady)
                                            <li><button class="btn btn_primary" type="submit"><i class="fas fa-paw"></i> Add to Cart</button></li>
                                        @else
                                            <li><b><i>Out of Stock</i></b></li>
                                        @endif
                                    </ul>
                                </form>
                                <p>{{$TheProduct->description}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="details_info_box">
                        <ul class="nav tabs_nav_pill" role="tablist">
                            <li role="presentation"><button class="active" data-bs-toggle="tab" data-bs-target="#tab_additional_info" type="button" role="tab" aria-selected="false">Additional Info</button></li>
                            <li role="presentation"><button data-bs-toggle="tab" data-bs-target="#tab_description" type="button" role="tab" aria-selected="true">Description</button></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab_additional_info" role="tabpanel">
                                <ul class="additional_info_table unorder_list_block">
                                    <li><span>Brand</span> <span>{{$TheProduct->Brand->title}}</span></li>
                                    <li><span>Category</span> <span>{{$TheProduct->Category->title}}</span></li>
                                </ul>
                            </div>
                            <div class="tab-pane fade" id="tab_description" role="tabpanel">
                                <h3>Product Description</h3>
                                {!! $TheProduct->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section class="product_section section_space_md">
                <div class="container">
                    <div class="section_title">
                        <h2 class="title_text mb-0 on-top"><span class="sub_title">Our Products</span> Products in <a class="text-brand" href="{{route('product.category', $TheProduct->Category->slug)}}">{{$TheProduct->Category->title}}</a></h2>
                    </div>
                </div>
                <div class="product_carousel">
                    <div class="row common_carousel_4col" data-slick='{"dots": false, "centerMode": true}'>
                        @forelse($TheProduct->Related() as $Product)
                            <div class="col carousel_item">
                                <div class="product_item">
                                    <div class="item_image">
                                        <a class="image_wrap" href="{{route('product.single' , [$Product->slug, $Product->id])}}">
                                            <img src="{{$Product->imagePath}}" alt="{{$Product->title}}">
                                        </a>
                                        <ul class="cart_btns_group">
                                            @if(isInUserCart(getUserId(), $Product->id))
                                                <li><a href="javascript:;">In Cart</a></li>
                                            @else
                                                @if($Product->CartReady)
                                                    <li><a class="quick-add-to-cart" data-id="{{$Product->id}}" data-user="{{getUserId()}}" data-target="{{route('cart.add')}}" href="javascript:;">Add To Cart</a></li>
                                                @endif
                                            @endif
                                            @auth
                                                <li><a class="@if(isInUserWishlist(getUserId(), $Product->id)) active @endif add-to-wishlist" data-target="{{route('wishlist.add')}}" data-id="{{$Product->id}}" data-user="{{getUserId()}}" href="javascript:;"><i class="far fa-heart"></i></a></li>
                                            @endauth
                                        </ul>
                                    </div>
                                    <div class="item_content">
                                        <h3 class="item_title"><a href="{{route('product.single' , [$Product->slug, $Product->id])}}">{{$Product->title}}</a></h3>
                                        <div class="item_price"><span>{{convertCurrency($Product->finalPrice, session()->get('currency')) . getCurrencySymbole(session()->get('currency'))}}</span></div>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                    <div class="carousel_arrow">
                        <div class="container">
                            <button type="button" class="cc4c_left_arrow"><i class="far fa-arrow-left"></i></button>
                            <button type="button" class="cc4c_right_arrow"><i class="far fa-arrow-right"></i></button>
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
