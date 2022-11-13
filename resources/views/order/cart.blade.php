@include('layout.header')
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="cart_section">
            <div class="container">
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
                                    <button class="remove_btn delete-from-cart" data-id="{{$CartItem->id}}" data-target="{{route('cart.delete')}}" type="button"><i class="fa fa-times"></i></button>
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
                                    <form class="d-flex" action="{{route('cart.updateQty', $CartItem->id)}}" method="post">
                                        @csrf
                                        <input class="input_number mr-3" min="1" name="qty" style="border: 1px solid #ccc;border-radius: 5px;" type="number" value="{{$CartItem->qty}}">
                                        <button class="update-qty-cart-button">Save</button>
                                    </form>
                                </li>
                                <li><span class="col_title d-lg-none">Total</span>
                                    <div class="item_price"><span>{{$CartItem->TotalPrice}}$</span></div>
                                </li>
                            </ul>
                        @empty
                            <p class="text-center my-3">There are no items in your cart</p>
                        @endforelse
                    </div>
                    <div class="table_footer">
                        <div class="row align-items-center">
                            <div class="col col-lg-6">
                                <div class="coupon_form">
                                    <form action="{{route('checkout.applyCoupon')}}" method="post">
                                        @csrf
                                        <div class="form_item mb-0">
                                            <input type="text" name="coupuon_code" placeholder="Coupon Code" @if($CartHasCoupon) disabled value="Coupon: {{$AppliedCoupon}} (-{{$CouponDiscount}}$)" @endif>
                                            @if(!$CartHasCoupon)
                                                <button type="submit" class="btn border_primary">Apply Coupon</button>
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col col-lg-6">
                                <ul class="btns_group unorder_list_right">
                                    <li><a class="btn btn_primary" href="{{route('checkout.get')}}"><i class="fas fa-paw"></i> Checkout</a></li>
                                    <li><a class="btn_unfill" href="{{route('product.all')}}"><span>Continue Shopping</span><i class="far fa-long-arrow-right"></i></a></li>
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
                                    <li>Subtotal</li>
                                    <li>{{$SubTotal}}$</li>
                                    @if($CartHasCoupon)
                                        <li class="text-success">{{$AppliedCoupon}} (-{{$CouponDiscount}}$)</li>
                                        <li>Total</li>
                                        <li>{{$Total}}$</li>
                                    @endif
                                </ul>
                            </div>
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
