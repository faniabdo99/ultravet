<section class="instagram_section section_space_md pb-0">
    <div class="container">
        <div class="section_title">
            <h2 class="title_text mb-0"><span class="sub_title">Brands</span> Our Brands</h2>
        </div>
        <div class="instagram_carousel_wrap">
            <div class="instagram_carousel row">
                @forelse(getBrands(true) as $Brand)
                    <div class="col carousel_item">
                        <a class="instagram_item" href="{{route('product.all')}}?brand_id={{$Brand->id}}">
                            <img src="{{$Brand->imagePath}}" alt="{{$Brand->title}}">
                            <span class="item_title">{{$Brand->title}}</span>
                        </a>
                    </div>
                @empty
                @endforelse
            </div>
            <div class="carousel_arrow">
                <div class="container">
                    <button type="button" class="ic_left_arrow"><i class="far fa-arrow-left"></i></button>
                    <button type="button" class="ic_right_arrow"><i class="far fa-arrow-right"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>
