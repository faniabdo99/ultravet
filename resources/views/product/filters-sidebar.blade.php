<div class="col col-lg-3">
    <aside class="sidebar_section">
        <div class="sb_widget">
            <h3 class="sb_widget_title" data-bs-toggle="collapse" data-bs-target="#collapse_filters" aria-expanded="false">Filter</h3>
            <div class="collapse show" id="collapse_filters">
                <form action="{{route('product.all')}}" method="GET">
                    <h3 class="sb_widget_title mt-5">Pet type</h3>
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
                    <h3 class="sb_widget_title mt-4">Categories</h3>
                    <div class="card card-body">
                        <ul class="filter_category_list unorder_list_block">
                            @forelse($AllCategories as $Category)
                                @if(!$Category->is_parent)
                                    @continue
                                @else
                                <li>
                                    <div class="checkbox_item">
                                        <input type="radio" id="category-{{$Category->slug}}" value="{{$Category->id}}" @if(request()->category_id == $Category->id) checked @endif name="category_id">
                                        <label for="category-{{$Category->slug}}"><span>{{$Category->title}}</span><small>{{$Category->Products->count()}}</small></label>
                                    </div>
                                    <ul class="ms-4 mt-3 filter_category_list unorder_list_block">
                                        <li>
                                            @forelse($Category->Children as $ChildCategory)
                                                <div class="checkbox_item">
                                                    <input type="radio" id="category-{{$ChildCategory->slug}}" value="{{$ChildCategory->id}}" @if(request()->category_id == $ChildCategory->id) checked @endif name="category_id">
                                                    <label for="category-{{$ChildCategory->slug}}"><span>{{$ChildCategory->title}}</span><small>{{$ChildCategory->Products->count()}}</small></label>
                                                </div>
                                            @empty
                                            @endforelse
                                        </li>
                                    </ul>
                                </li>
                                @endif
                            @empty
                                <p>No categories</p>
                            @endforelse
                        </ul>
                    </div>
                    <h3 class="sb_widget_title mt-5">Brands</h3>
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
                    <h3 class="sb_widget_title mt-5">Price range</h3>
                    <div class="card card-body">
                        <div class="price-range-area clearfix">
                            <div id="slider-range" class="slider-range"></div>
                            <div class="price-text"><span>Range:</span><input type="text" id="amount" name="price" readonly="readonly"></div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn_primary d-block mt-5"><i class="fas fa-paw"></i> Apply Filters</button>
                </form>
            </div>
        </div>
    </aside>
</div>
