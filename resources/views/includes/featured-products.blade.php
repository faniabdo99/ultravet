<section class="product_section section_space_lg">
    <div class="container">
        <div class="section_title">
            <h2 class="title_text mb-0"><span class="sub_title">Our Products</span> Top Products</h2>
        </div>
    </div>
    <div class="product_carousel">
        <div class="row common_carousel_4col" data-slick='{"dots": false, "centerMode": true}'>
            @forelse(getFeaturedProducts() as $Product)
                <div class="col carousel_item">
                    <div class="product_item">
                        <div class="item_image">
                            <a class="image_wrap" href="{{route('product.single' , [$Product->slug, $Product->id])}}">
                            <img src="{{$Product->imagePath}}" alt="{{$Product->title}}"></a>
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
                            <div class="item_price"><span>${{$Product->price}}</span></div>
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
