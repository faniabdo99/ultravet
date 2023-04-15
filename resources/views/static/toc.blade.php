@include('layout.header', [
    'PageTitle' => 'Terms & Conditions',
    'PageDescription' => 'This is how Ultravet manages your information',
])
<body>
<div class="body_wrap">
    @include('layout.navbar')
    <main>
        <section class="breadcrumb_section">
            <div class="container">
                <div class="row">
                    <div class="col col-lg-4 col-md-7 col-sm-9">
                        <h1 class="page_title">Terms & Conditions</h1>
                        <p class="page_description mb-0">This is how Ultravet manages your information</p>
                    </div>
                </div>
            </div>
            <div class="breadcrumb_img">
                <img src="{{url('public')}}/images/breadcrumb/breadcrumb_img_1.png" alt="Ultravet TOC">
            </div>
        </section>
        <section class="about_section section_space_lg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col">
                        {!! getSystemSettings('toc') !!}
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
