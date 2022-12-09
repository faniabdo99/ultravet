@include('layout.header', [
    'PageTitle' => 'Blog',
    'PageDescription' => 'Learn the latest news about Ultravet',
])

<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="breadcrumb_section">
                <div class="container">
                    <div class="row">
                        <div class="col col-lg-4 col-md-7 col-sm-9">
                            <h1 class="page_title">Our Blog</h1>
                            <p class="page_description mb-0">Sed lectus vestibulum mattis ullamcorper velit sed
                                ullamcorper. Amet purus gravida quis blandit turpis</p>
                        </div>
                    </div>
                </div>
                <div class="breadcrumb_img">
                    <img src="{{ url('public') }}/images/breadcrumb/breadcrumb_img_5.png" alt="Ultravet Blog">
                </div>
            </section>
            <section class="blog_section section_space_lg pb-0">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col">
                            <div class="blogs_wrapper">
                                <div class="row">
                                    @forelse ($AllArticles as $Article)
                                        <div class="col col-md-4">
                                            <div class="blog_item">
                                                <a class="item_image" href="{{route('blog.single' , [$Article->slug, $Article->id])}}">
                                                    <img src="{{$Article->ImagePath}}" alt="{{$Article->title}}">
                                                </a>
                                                <div class="item_content">
                                                    <ul class="post_meta unorder_list">
                                                        <li><a href="#!"><i class="fas fa-user"></i> by {{$Article->User->name}}</a></li>
                                                        <li><a href="#!"><i class="fas fa-calendar-day"></i> {{$Article->created_at->format('Y.m.d')}}</a></li>
                                                    </ul>
                                                    <h3 class="item_title">
                                                        <a href="{{route('blog.single' , [$Article->slug, $Article->id])}}">{{$Article->title}}</a>
                                                    </h3>
                                                    <p class="mb-0">{{$Article->description}}</p>
                                                    <div class="details_btn">
                                                        <a class="btn_unfill" href="{{route('blog.single' , [$Article->slug, $Article->id])}}"><span>Read Post</span> <i class="far fa-long-arrow-right"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

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
