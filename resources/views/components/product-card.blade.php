<div class="col col-lg-4 col-md-6 col-sm-6">
    <div class="product_item">
        <div class="item_image">
            <a class="image_wrap" href="{{route('product.single' , [$product->slug, $product->id])}}">
                <img src="{{$product->imagePath}}" alt="{{$product->title}}">
            </a>
            <ul class="cart_btns_group">
                @if(isInUserCart(getUserId(), $product->id))
                    <li><a href="javascript:;">In Cart</a></li>
                @else
                    @if($product->CartReady)
                        <li><a class="quick-add-to-cart" data-id="{{$product->id}}" data-user="{{getUserId()}}" data-target="{{route('cart.add')}}" href="javascript:;">Add To Cart</a></li>
                    @endif
                @endif
                @auth
                    <li><a class="@if(isInUserWishlist(getUserId(), $product->id)) active @endif add-to-wishlist" data-target="{{route('wishlist.add')}}" data-id="{{$product->id}}" data-user="{{getUserId()}}" href="javascript:;"><i class="far fa-heart"></i></a></li>
                @endauth
            </ul>
        </div>
        <div class="item_content">
            <h3 class="item_title"><a href="{{route('product.single' , [$product->slug, $product->id])}}">{{$product->title}}</a></h3>
            <ul class="rating_star">
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="fas fa-star"></i></li>
                <li><i class="far fa-star"></i></li>
            </ul>
            <div class="item_price">
                @if($product->hasDiscount)
                    <del>{{convertCurrency($product->price, session()->get('currency')) . getCurrencySymbole(session()->get('currency'))}}</del>
                    <span>{{convertCurrency($product->finalPrice, session()->get('currency')) . getCurrencySymbole(session()->get('currency'))}}</span>
                @else
                    <span>{{convertCurrency($product->finalPrice, session()->get('currency')) . getCurrencySymbole(session()->get('currency'))}}</span>
                @endif
            </div>
        </div>
    </div>
</div>
