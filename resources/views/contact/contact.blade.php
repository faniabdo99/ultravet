@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="breadcrumb_section">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-7 col-sm-9">
                            <h1 class="page_title">Contact Us</h1>
                            <p class="page_description mb-0">Tristique nulla aliquet enim tortor at auctor urna nunc. Massa enim nec dui nunc mattis enim ut tellus</p>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb_img">
                    <img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_10.png" alt="Pet Care Service">
                </div>
            </section>
            <section class="contact_section section_space_lg pb-0">
                <div class="container">
                    <div class="section_space_lg pt-0">
                        <div class="row justify-content-center">
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_overicon">
                                    <div class="item_icon"><i class="fas fa-phone"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Phone</h3>
                                        <ul class="item_info_list unorder_list_block">
                                            <li>(913) 756-3126</li>
                                            <li>(921) 557-1203</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_overicon">
                                    <div class="item_icon"><i class="fas fa-envelope"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Email</h3>
                                        <ul class="item_info_list unorder_list_block">
                                            <li>petopia@example.com</li>
                                            <li>petopia@email.com</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_overicon">
                                    <div class="item_icon"><i class="fas fa-map-marker-alt"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Address</h3>
                                        <ul class="item_info_list unorder_list_block">
                                            <li>17 Parkman Place, 2122</li>
                                            <li>United States</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_overicon">
                                    <div class="item_icon"><i class="fas fa-clock"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Open Hours</h3>
                                        <ul class="item_info_list unorder_list_block">
                                            <li>Mon - Fri: 7am - 6pm</li>
                                            <li>Saturday: 9am - 4pm</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col col-lg-6">
                            <div class="section_title">
                                <h2 class="title_text"><span class="sub_title">Our Contacts</span> Contact Us</h2>
                                <p class="mb-0">Massa enim nec dui nunc mattis enim ut tellus. Auctor augue mauris augue
                                    neque gravida in fermentum</p>
                            </div>
                            <div class="contact_form">
                                <form action="{{route('postContact')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item mb-0">
                                                <label class="input_title" for="input_name">Name<sup>*</sup></label> 
                                                <input id="input_name" type="text" name="name" placeholder="Type Your Name" required>
                                            </div>
                                        </div>
                                        <div class="col col-md-6 col-sm-6">
                                            <div class="form_item mb-0">
                                                <label class="input_title" for="input_email">Email<sup>*</sup></label> 
                                                <input id="input_email" type="email" name="email" placeholder="Type Your Email" required>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form_item">
                                                <label class="input_title" for="input_message">Your message<sup>*</sup></label>
                                                <textarea name="message" id="input_message" placeholder="Type your message"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn_primary"><i class="fas fa-paw"></i> Send</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="mapouter">
                                <div class="gmap_canvas">
                                    <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=2880%20Broadway,%20New%20York&t=&z=13&ie=UTF8&iwloc=&output=embed"></iframe>
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