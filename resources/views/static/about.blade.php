@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="breadcrumb_section">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-7 col-sm-9">
                            <h1 class="page_title">About Us</h1>
                            <p class="page_description mb-0">Tristique nulla aliquet enim tortor at auctor urna nunc.
                                Massa enim nec dui nunc mattis enim ut tellus</p>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb_img"><img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_1.png"
                        alt="Pet Care Service"></div>
            </section>
            <section class="about_section section_space_lg">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col order-last col-lg-6">
                            <div class="about_image_2"><img src="{{url('public')}}/images/about/about_img_6.jpg"
                                    alt="Pet Care Image">
                                <div class="experience_years"
                                    style="background-image: url('{{url('public')}}/images/shape/shape_circle_1.svg');">
                                    <strong>20+</strong> <span>Years Experience</span></div>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="about_content_2">
                                <div class="section_title">
                                    <h2 class="title_text"><span class="sub_title">Our Services</span> About Petopia
                                    </h2>
                                    <p class="mb-0">Justo eget magna fermentum iaculis eu non diam phasellus. Eu
                                        lobortis elementum nibh tellus molestie nunc. Ullamcorper eget nulla facilisi
                                        etiam dignissim diam. Eget felis eget nunc lobortis mattis</p>
                                </div>
                                <ul class="icon_list unorder_list_block">
                                    <li><i class="fas fa-bone"></i> <span>Adipiscing elit pellentesque</span></li>
                                    <li><i class="fas fa-bone"></i> <span>Ornare euismod elementum</span></li>
                                    <li><i class="fas fa-bone"></i> <span>Posuere ac ut consequat</span></li>
                                    <li><i class="fas fa-bone"></i> <span>Sed turpis tinci aliquet risus</span></li>
                                </ul><a class="btn btn_primary" href="service.html"><i class="fas fa-paw"></i> Our
                                    Service</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="consultation_section section_space_lg decoration_wrap">
                <div class="container">
                    <div class="section_title text-center">
                        <h2 class="title_text"><span class="sub_title">Consultation</span> How to Сonsult a Specialist
                        </h2>
                        <p class="mb-0">Auctor augue mauris augue neque gravida in fermentum</p>
                    </div>
                </div>
                <div class="consultation_wrap" style="background-image: url('{{url('public')}}/images/shape/shape_path_6.svg');">
                    <div class="container">
                        <div class="row">
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_centericon">
                                    <div class="item_icon"
                                        style="background-image: url('{{url('public')}}/images/shape/shape_outline.svg');"><i
                                            class="fas fa-comment-dots"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Get in touch</h3>
                                        <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_centericon">
                                    <div class="item_icon"
                                        style="background-image: url('{{url('public')}}/images/shape/shape_outline.svg');"><i
                                            class="fas fa-calendar-check"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Schedule a visit</h3>
                                        <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_centericon">
                                    <div class="item_icon"
                                        style="background-image: url('{{url('public')}}/images/shape/shape_outline.svg');"><i
                                            class="fas fa-clipboard-list"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Pet admission</h3>
                                        <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col col-lg-3 col-md-6 col-sm-6">
                                <div class="iconbox_item iconbox_centericon">
                                    <div class="item_icon"
                                        style="background-image: url('{{url('public')}}/images/shape/shape_outline.svg');"><i
                                            class="fas fa-home-lg"></i></div>
                                    <div class="item_content">
                                        <h3 class="item_title">Take them home</h3>
                                        <p class="mb-0">Duis aute irure dolor in reprehenderit in voluptate</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="decoration_item paw_shape_1"><img src="{{url('public')}}/images/shape/shape_paw_1.png" alt="Pet Paw">
                </div>
                <div class="decoration_item paw_shape_2"><img src="{{url('public')}}/images/shape/shape_paw_2.png" alt="Pet Paw">
                </div>
            </section>
            <section class="about_section section_space_lg pb-0 decoration_wrap">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col col-lg-5">
                            <div class="section_title">
                                <h2 class="title_text">Welcome To Our Family</h2>
                                <p>Tristique nulla aliquet enim tortor at auctor urna nunc. Massa enim nec dui nunc
                                    mattis enim ut tellus. Auctor augue mauris augue neque gravida in fermentum</p>
                            </div>
                            <div class="accordion" id="faq_accordion">
                                <div class="accordion-item"><button class="accordion-button" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq_collapse_1" aria-expanded="true"
                                        aria-controls="faq_collapse_1">How Petopia Pet Care Started</button>
                                    <div id="faq_collapse_1" class="accordion-collapse collapse show"
                                        data-bs-parent="#faq_accordion">
                                        <div class="accordion-body">
                                            <p class="m-0">Vitae et leo duis ut diam. Amet venenatis urna cursus eget
                                                nunc scelerisque. Nec ultrices dui sapien eget. Lectus magna fringilla
                                                urna porttitor rhoncus dolor purus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item"><button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq_collapse_2" aria-expanded="false"
                                        aria-controls="faq_collapse_2">Mission Statement</button>
                                    <div id="faq_collapse_2" class="accordion-collapse collapse"
                                        data-bs-parent="#faq_accordion">
                                        <div class="accordion-body">
                                            <p class="m-0">Vitae et leo duis ut diam. Amet venenatis urna cursus eget
                                                nunc scelerisque. Nec ultrices dui sapien eget. Lectus magna fringilla
                                                urna porttitor rhoncus dolor purus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item"><button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq_collapse_3" aria-expanded="false"
                                        aria-controls="faq_collapse_3">Value Added Services</button>
                                    <div id="faq_collapse_3" class="accordion-collapse collapse"
                                        data-bs-parent="#faq_accordion">
                                        <div class="accordion-body">
                                            <p class="m-0">Vitae et leo duis ut diam. Amet venenatis urna cursus eget
                                                nunc scelerisque. Nec ultrices dui sapien eget. Lectus magna fringilla
                                                urna porttitor rhoncus dolor purus</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item"><button class="accordion-button collapsed" type="button"
                                        data-bs-toggle="collapse" data-bs-target="#faq_collapse_4" aria-expanded="false"
                                        aria-controls="faq_collapse_4">Social Responsability</button>
                                    <div id="faq_collapse_4" class="accordion-collapse collapse"
                                        data-bs-parent="#faq_accordion">
                                        <div class="accordion-body">
                                            <p class="m-0">Vitae et leo duis ut diam. Amet venenatis urna cursus eget
                                                nunc scelerisque. Nec ultrices dui sapien eget. Lectus magna fringilla
                                                urna porttitor rhoncus dolor purus</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="about_image_1">
                                <div class="image_1 p-0"><img src="{{url('public')}}/images/about/about_img_1.jpg"
                                        alt="Pet Doctor"></div>
                                <div class="image_2"><img src="{{url('public')}}/images/about/about_img_2.jpg" alt="Cat Image">
                                </div>
                                <div class="image_3"><img src="{{url('public')}}/images/about/about_img_3.jpg" alt="Dog Image">
                                </div>
                                <div class="shape_img_1"><img src="{{url('public')}}/images/shape/shape_circle_1.svg"
                                        alt="Yellow Circle"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="decoration_item shape_dot_1"><img src="{{url('public')}}/images/shape/shape_dot_group_1.svg"
                        alt="Colorful Dots"></div>
            </section>
            <section class="video_section section_space_lg pb-0">
                <div class="container">
                    <div class="section_title text-center">
                        <h2 class="title_text mb-0"><span class="sub_title">About Us</span> We Care About Your Friends
                        </h2>
                    </div>
                    <div class="video_wrap">
                        <div class="video_poster_wrap"><img src="{{url('public')}}/images/video/video_poster_1.jpg"
                                alt="We Care About Your Friends"></div><a class="popup_video"
                            href="http://www.youtube.com/watch?v=0O2aH4XLbto"
                            style="background-image: url('{{url('public')}}/images/shape/shape_outline_2.svg');"><i
                                class="fas fa-play"></i></a>
                    </div>
                </div>
            </section>
        </main>
        @include('layout.footer')
    </div>
    @include('layout.scripts')
</body>
</html>