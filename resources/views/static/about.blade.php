@include('layout.header', [
    'PageTitle' => 'About Us',
    'PageDescription' => 'Learn more about Ultravet story',
])
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="breadcrumb_section">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-7 col-sm-9">
                            <h1 class="page_title">About Us</h1>
                            <p class="page_description mb-0">Learn more about Ultravet story</p>
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
                                    <strong>{{getSystemSettings('years')}}+</strong> <span>Years Experience</span></div>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="about_content_2">
                                <div class="section_title">
                                    <h2 class="title_text"><span class="sub_title">Our Services</span> About Ultravet
                                    </h2>
                                    <p class="mb-0">
                                        At the end of 2019, right at the beginning of the economical and social problems that began to confront our beloved country Lebanon, we opened a very modest veterinary clinic at almost zero cost. So in September 2019, UltraVet was born.
                                        <br >
                                        We quickly grew from our humble beginning as a small Vet clinic, to a Veterinary Center that contains most of what isneeded to ensure maximum care of your pets:
                                    </p>
                                </div>
                                <ul class="icon_list unorder_list_block">
                                    <li><i class="fas fa-bone"></i> <span>Advanced operating rooms</span></li>
                                    <li><i class="fas fa-bone"></i> <span>Modern laboratory</span></li>
                                    <li><i class="fas fa-bone"></i> <span>Examination rooms equipped with the latest technologies</span></li>
                                    <li><i class="fas fa-bone"></i> <span>A veterinary pharmacy</span></li>
                                    <li><i class="fas fa-bone"></i> <span>An area for grooming and taking care of your pet’s hygiene</span></li>
                                    <li><i class="fas fa-bone"></i> <span>A showroom where everything you may need for your animal is available, including food, accessories and more.</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="about_section section_space_lg pb-0 decoration_wrap">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">
                        <div class="col col-lg-5">
                            <div class="section_title">
                                <h2 class="title_text">Welcome To Our Family</h2>
                                <p>
                                    Our team always ready to place whatever time, energy, and care in order to ensure that our center keeps expanding, while getting out of our comfort zone to always improve the service we provide.
                                    <br><br>
                                    We published our website because we believe that everyone has the right to develop fact-based knowledge related to their pets, and to obtain the best quality veterinary services wherever they are.
                                    <br><br>
                                    Our goal remains the same: permanent development and providing what is necessary for your pet to live a healthy and effective life!
                                    Ultra -from our name UltraVet- means beyond, this simple Latin word is our trigger to always expand and seek progression no matter what!
                                    At UltraVet, we treat your pet like family!
                                </p>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="about_image_1">
                                <div class="image_1 p-0">
                                    <img src="{{url('public')}}/images/about/about_img_1.jpg" alt="Pet Doctor">
                                </div>
                                <div class="image_2">
                                    <img src="{{url('public')}}/images/about/about_img_2.jpg" alt="Cat Image">
                                </div>
                                <div class="image_3">
                                    <img src="{{url('public')}}/images/about/about_img_3.jpg" alt="Dog Image">
                                </div>
                                <div class="shape_img_1">
                                    <img src="{{url('public')}}/images/shape/shape_circle_1.svg" alt="Yellow Circle">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="decoration_item shape_dot_1">
                    <img src="{{url('public')}}/images/shape/shape_dot_group_1.svg" alt="Colorful Dots">
                </div>
            </section>
        </main>
        @include('layout.footer')
    </div>
    @include('layout.scripts')
</body>
</html>
