@include('layout.header')
<body>
    <div class="body_wrap">
        @include('layout.navbar')
        <main>
            <section class="details_section blog_details section_space_lg">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col col-lg-9">
                            <div class="details_image"><img src="{{$TheArticle->imagePath}}" alt="{{$TheArticle->title}}"></div>
                            <div class="details_content">
                                <h1 class="item_title">{{$TheArticle->title}}</h1>
                                <ul class="post_meta unorder_list">
                                    <li><a href="#!"><i class="fas fa-user"></i> by {{$TheArticle->User->name}}</a></li>
                                    <li><a href="#!"><i class="fas fa-calendar-day"></i> {{$TheArticle->created_at->format('Y.m.d')}}</a></li>
                                </ul>
                                <p>{{$TheArticle->description}}</p>
                                <div class="article-content">
                                    {!! $TheArticle->content !!}
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