@include('layout.header')
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="cart_section">
            <div class="container">
                <div class="row mt-5 pt-5">
                    @forelse($Cart as $CartItem)
                      <div class="col-lg-6 col-11">
                          <div class="cart-item">
                              <div class="cart-item__image">
                                  <img src="{{$CartItem->Product->imagePath}}" >
                              </div>
                              <div class="cart-item__content">
                                    <p>{{$CartItem->Product->title}}</p>
                                    <ul class="cart-item__content__metadata">
                                        <li>
                                            @if($CartItem->Product->hasDiscount)
                                                <i class="fas fa-usd-circle"></i> <del class="text-danger">{{convertCurrency($CartItem->Product->price, session()->get('currency')) . getCurrencySymbol(session()->get('currency'))}}</del>
                                                <span>{{convertCurrency($CartItem->Product->finalPrice, session()->get('currency')) . getCurrencySymbol(session()->get('currency'))}}</span>
                                            @else
                                                <i class="fas fa-usd-circle"></i> <span>{{convertCurrency($CartItem->Product->finalPrice, session()->get('currency')) . getCurrencySymbol(session()->get('currency'))}}</span>
                                            @endif

                                        </li>
                                    </ul>
                                    <button class="remove_btn delete-from-cart" data-location="cart-page" data-id="{{$CartItem->id}}" data-target="{{route('cart.delete')}}" type="button">
                                        <i class="fa fa-trash"></i> Remove
                                    </button>
                                      <div class="qty-container">
                                        <button data-id="{{$CartItem->id}}" data-target="{{route('cart.addOneQty')}}" class="add-one-qty">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                        <span class="qty-total">{{$CartItem->qty}}</span>
                                        <button data-id="{{$CartItem->id}}" data-target="{{route('cart.removeOneQty')}}"  class="remove-one-qty">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                  </div>
                              </div>
                          </div>
                      </div>
                    @empty
                        <p class="text-center">Your cart is empty!</p>
                    @endforelse
                </div>
                <div class="cart_table_wrap">
                    <div class="table_footer">
                        <div class="row align-items-center">
                            <div class="col col-lg-6">
                                <div class="coupon_form">
                                    <form action="{{route('checkout.applyCoupon')}}" method="post">
                                        @csrf
                                        <div class="form_item mb-0">
                                            <input type="text" name="coupuon_code" placeholder="Coupon Code" @if($CartHasCoupon) disabled value="Coupon: {{$AppliedCoupon}} (-{{convertCurrency($CouponDiscount, session()->get('currency')) . getCurrencySymbol(session()->get('currency'))}})" @endif>
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
                                    <li><span class="cart-page-total">{{$SubTotal}}</span>$</li>
                                    @if($CartHasCoupon)
                                        <li class="text-success">{{$AppliedCoupon}} (-{{$CouponDiscount}}$)</li>
                                        <li>Total</li>
                                        <li>{{$Total}}</li>$
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
