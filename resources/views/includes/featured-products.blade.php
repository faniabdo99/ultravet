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
                                <li><i class="fas fa-star"></i></li>
                            </ul>
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
