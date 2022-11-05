@include('layout.header')
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-7 col-sm-9">
                        <h1 class="page_title">Your Wishlist</h1>
                    </div>
                </div>
            </div>
            <div class="breadcrumb_img dog_image"><img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_4.png" alt="Pet Care Service"></div>
        </section>
        <section class="product_section section_space_lg">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-12">
                        <div class="row">
                            @forelse(auth()->user()->Wishlist as $WishlistItem)
                                <div class="col col-lg-4 col-md-6 col-sm-6">
                                    <div class="product_item">
                                        <div class="item_image">
                                            <a class="image_wrap" href="{{route('product.single' , [$WishlistItem->Product->slug, $WishlistItem->Product->id])}}">
                                                <img src="{{$WishlistItem->Product->imagePath}}" alt="{{$WishlistItem->Product->title}}">
                                            </a>
                                            <ul class="cart_btns_group">
                                                <li><a href="#!">Add To Cart</a></li>
                                                @auth
                                                    <li><a class="@if(isInUserWishlist(getUserId(), $WishlistItem->Product->id)) active @endif add-to-wishlist" data-target="{{route('wishlist.add')}}" data-id="{{$WishlistItem->Product->id}}" data-user="{{getUserId()}}" href="javascript:;"><i class="far fa-heart"></i></a></li>
                                                @endauth
                                            </ul>
                                        </div>
                                        <div class="item_content">
                                            <h3 class="item_title"><a href="{{route('product.single' , [$WishlistItem->Product->slug, $WishlistItem->Product->id])}}">{{$WishlistItem->Product->title}}</a></h3>
                                            <ul class="rating_star">
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="fas fa-star"></i></li>
                                                <li><i class="far fa-star"></i></li>
                                            </ul>
                                            <div class="item_price">
                                                @if($WishlistItem->Product->hasDiscount)
                                                    <del>{{$WishlistItem->Product->price}}$</del>
                                                    <span>{{$WishlistItem->Product->finalPrice}}$</span>
                                                @else
                                                    <span>{{$WishlistItem->Product->finalPrice}}$</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <p class="text-center">There are no products to show at the moment</p>
                            @endforelse
                        </div>
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
