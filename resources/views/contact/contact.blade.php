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
                            <p class="page_description mb-0">Our team is always pleased to respond to your inquiries!</p>
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
                                            <li>{{getSystemSettings('phone_number')}}</li>
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
                                            <li>{{getSystemSettings('email')}}</li>
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
                                            <li>{{getSystemSettings('address')}}</li>
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
                                            <li>{{getSystemSettings('working_hours_label_1')}} {{getSystemSettings('working_hours_value_1')}}</li>
                                            <li>{{getSystemSettings('working_hours_label_2')}} {{getSystemSettings('working_hours_value_2')}}</li>
                                            <li>{{getSystemSettings('working_hours_label_3')}} {{getSystemSettings('working_hours_value_3')}}</li>
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
                                <p class="mb-0">If you need any help or you want to learn more about our services, email us and our team will respond to you ASAP</p>
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
                                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d208.22360958292492!2d35.4793335!3d33.3820881!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151e95dad2776bfb%3A0xd1d5e689073ffa18!2sUltraVet%20Veterinary%20Center!5e0!3m2!1sen!2seg!4v1668121471431!5m2!1sen!2seg" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
