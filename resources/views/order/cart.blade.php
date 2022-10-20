@include('layout.header')
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="cart_section section_space_lg">
            <div class="container">
                <div class="section_title">
                    <h2 class="title_text mb-0">Your Cart</h2>
                </div>
                <div class="cart_table_wrap">
                    <div class="table_header d-none d-lg-block">
                        <ul class="table_wrap unorder_list">
                            <li><span class="col_title">Product</span></li>
                            <li><span class="col_title">Price</span></li>
                            <li><span class="col_title">Quantity</span></li>
                            <li><span class="col_title">Total</span></li>
                        </ul>
                    </div>
                    <div class="table_body">
                        @forelse($Cart as $CartItem)
                            <ul class="table_wrap unorder_list">
                                <li>
                                    <div class="small_product_item">
                                        <div class="item_image"><img src="{{$CartItem->Product->imagePath}}" alt="{{$CartItem->Product->title}}"></div>
                                        <div class="item_content">
                                            <h3 class="item_title">{{$CartItem->Product->title}}</h3>
                                        </div>
                                    </div>
                                </li>
                                <li><span class="col_title d-lg-none">Price</span>
                                    <div class="item_price">
                                        @if($CartItem->Product->hasDiscount)
                                            <del>{{$CartItem->Product->price}}$</del><span>{{$CartItem->Product->finalPrice}}$</span>
                                        @else
                                            <span>{{$CartItem->Product->finalPrice}}$</span>
                                        @endif
                                    </div>
                                </li>
                                <li><span class="col_title d-lg-none">Quantity</span>
                                    <div class="item_price"><span>x{{$CartItem->qty}}</span></div>
                                </li>
                                <li><span class="col_title d-lg-none">Total</span>
                                    <div class="item_price"><span>{{$CartItem->TotalPrice}}$</span></div>
                                </li>
                            </ul>
                        @empty
                        @endforelse

                    </div>
                    <div class="table_footer">
                        <div class="row align-items-center">
                            <div class="col col-lg-6">
                                <div class="coupon_form">
                                    <form action="#">
                                        <div class="form_item mb-0"><input type="text" name="coupon" placeholder="Coupon Code"><button type="submit" class="btn border_primary">Apply Coupon</button></div>
                                    </form>
                                </div>
                            </div>
                            <div class="col col-lg-6">
                                <ul class="btns_group unorder_list_right">
                                    <li><a class="btn_unfill" href="{{route('product.all')}}"><span>Continue Shopping</span><i class="far fa-long-arrow-right"></i></a></li>
                                    <li><a class="btn border_primary" href="{{route('cart.all')}}">Update Cart</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="note_form">
                        <div class="row">
                            <div class="col col-lg-6">
                            </div>
                            <div class="col col-lg-6">
                                <ul class="subtotal_info unorder_list_block">
                                    <li>Subtotal before delivery</li>
                                    <li>{{$SubTotal}}$</li>
                                    <li><a class="btn btn_primary" href="{{route('checkout.get')}}"><i class="fas fa-paw"></i> Checkout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="policy_section">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-3 col-md-6">
                        <div class="iconbox_item iconbox_default" style="background-image: url('{{url('public')}}//images/shape/shape_path_1.svg');">
                            <div class="item_icon"><i class="fas fa-shipping-fast"></i></div>
                            <h3 class="policy_title">Trust & Safety</h3>
                            <p class="mb-0">Velit euismod in pellentesque massa placerat duis. Pellentesque habitant morbi tristique senectus</p>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6">
                        <div class="iconbox_item iconbox_default" style="background-image: url('{{url('public')}}//images/shape/shape_path_1.svg');">
                            <div class="item_icon"><i class="fas fa-badge-percent"></i></div>
                            <h3 class="policy_title">Discounts</h3>
                            <p class="mb-0">Leo a diam sollicitudin tempor nisl nunc mi. Magna ac placerat vestibulm lectus mauris</p>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6">
                        <div class="iconbox_item iconbox_default" style="background-image: url('{{url('public')}}//images/shape/shape_path_1.svg');">
                            <div class="item_icon"><i class="fas fa-user-headset"></i></div>
                            <h3 class="policy_title">Support</h3>
                            <p class="mb-0">Bibendum ut tristique et egestas quis ipsum suspendisse ultrices. Convallis tellus id interdum velit</p>
                        </div>
                    </div>
                    <div class="col col-lg-3 col-md-6">
                        <div class="iconbox_item iconbox_default" style="background-image: url('{{url('public')}}//images/shape/shape_path_1.svg');">
                            <div class="item_icon"><i class="fas fa-shield-check"></i></div>
                            <h3 class="policy_title">Guarantee</h3>
                            <p class="mb-0">Dignissim diam quis enim lobortis scelerisque fermentum dui. Turpis in eu mi bibendum neque</p>
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
