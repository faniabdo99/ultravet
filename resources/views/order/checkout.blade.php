@include('layout.header')
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="cart_section section_space_lg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <h2 class="title_text">Checkout</h2>
                        <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut
                            consectetur, id ipsa reprehenderit voluptas? Aspernatur deserunt ea eum iure magnam,
                            maiores, modi mollitia officiis perferendis quidem tenetur ut vitae!</p>
                        <form action="{{route('checkout.post')}}" method="post">
                            @csrf
                            <div class="form_item">
                                <label class="input_title" for="input_name">Name<sup>*</sup></label>
                                <input id="input_name" type="text" name="name" placeholder="Type Your Name" required>
                            </div>
                            <div class="form_item">
                                <label class="input_title" for="input_email">Email<sup>*</sup></label>
                                <input id="input_email" type="text" name="email" placeholder="Type Your Email" required>
                            </div>
                            <div class="form_item">
                                <label class="input_title" for="input_phone_number">Phone Number<sup>*</sup></label>
                                <input id="input_phone_number" type="text" name="phone_number"
                                       placeholder="Type Your Phone Number" required>
                            </div>
                            <div class="form_item">
                                <label class="input_title" for="input_address">Address<sup>*</sup></label>
                                <input id="input_address" type="text" name="address" placeholder="Type Your Address"
                                       required>
                            </div>
                            <div class="form_item">
                                <label class="input_title" for="input_notes">Order Notes<sup>*</sup></label>
                                <textarea id="input_notes" name="order_notes"
                                          placeholder="Do you have any notes about your order?"></textarea>
                            </div>
                            <button class="btn btn_primary"><i class="fas fa-paw"></i>Submit</button>
                        </form>
                    </div>
                    <div class="col-lg-4">
                        <div class="checkout-summary">
                            <h3>Order Summary</h3>
                            <div class="cart_dropdown mb-0" aria-labelledby="cart_dropdown">
                                <ul class="cart_items_list unorder_list_block">
                                    @forelse(userCart(getUserId()) as $CartItem)
                                        <li>
                                            <a class="item_image" href="{{route('product.single', [$CartItem->Product->slug, $CartItem->Product->id])}}">
                                                <img src="{{$CartItem->Product->imagePath}}" alt="{{$CartItem->Product->title}}">
                                            </a>
                                            <div class="item_content">
                                                <h3 class="item_title"><a href="{{route('product.single', [$CartItem->Product->slug, $CartItem->Product->id])}}">{{$CartItem->Product->title}}</a></h3>
                                                <span class="item_price">{{$CartItem->qty}} × {{$CartItem->Product->finalPrice}}$</span>
                                            </div>
                                        </li>
                                    @empty
                                        <li>You don't have anything in your cart</li>
                                    @endforelse
                                </ul>
                                <hr>
                                <div class="total_price"><span>Sub Total</span> <strong>{{getCartTotal()}}$</strong></div>
                                <div class="total_price"><span>Shipping</span> <strong>{{getCartTotal()}}$</strong></div>
                                <div class="total_price"><span>Total</span> <strong>{{getCartTotal()}}$</strong></div>
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

