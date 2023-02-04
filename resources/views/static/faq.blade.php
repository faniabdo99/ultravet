@include('layout.header', [
    'PageTitle' => 'FAQs',
    'PageDescription' => 'Here are some of the questions we usually get!',
])
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-7 col-sm-9">
                        <h1 class="page_title">FAQ</h1>
                        <p class="page_description">Here are some of the questions we usually get!</p>
                        <a class="btn btn_primary" href="{{route('getContact')}}">Have a question? Ask us!</a>
                    </div>
                </div>
            </div>
            <div class="breadcrumb_img dog_image">
                <img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_8.png" alt="Ultravet FAQs">
            </div>
        </section>
        <section class="faq_section section_space_lg"  style="background-image: url('assets/images/overlay/shapes_overlay_9.svg');">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col col-lg-8">
                        <div class="accordion" id="faq_accordion">
                            @forelse($FAQs as $FAQ)
                                <div class="accordion-item">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#faq_collapse_{{$FAQ->id}}" aria-expanded="false"
                                            aria-controls="faq_collapse_{{$FAQ->id}}">{{$FAQ->question}}
                                    </button>
                                    <div id="faq_collapse_{{$FAQ->id}}" class="accordion-collapse collapse"
                                         data-bs-parent="#faq_accordion">
                                        <div class="accordion-body">
                                            <p class="m-0">
                                                {!! $FAQ->answer !!}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
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
